<?php
class ControllerExtensionModuleIshiSpecialBlock extends Controller {
	public function index($setting) {
		$this->load->language('extension/module/special');
		$this->load->language('product/quickview');

		$this->load->model('catalog/product');

		$this->load->model('tool/image');
		
		$language_id = $this->config->get('config_language_id');
		$data['ishi_randomnumer'] = "ishispecialblock-" . rand();
		
		if(isset($setting['title'][$language_id])){
			$data['heading'] = $setting['title'][$language_id];
		}
		$data['subtitle'] = (isset($setting['subtitle'][$language_id])) ? $setting['subtitle'][$language_id] : '' ;
		$data['desktop_column'] = $setting['desktop_column'] ? $setting['desktop_column'] : 4;
		$data['laptop_column'] = $setting['laptop_column'] ? $setting['laptop_column'] : 3;
		$data['tablet_column'] = $setting['tablet_column'] ? $setting['tablet_column'] : 2;
		$data['mobile_column'] = $setting['mobile_column'] ? $setting['mobile_column'] : 1;
		$data['product_row'] = $setting['product_row'] ? $setting['product_row'] : 1;		
		$data['hover_image'] = (isset($setting['hover_image']) && $setting['hover_image'] == 1) ? $setting['hover_image'] : 0;
		$data['product_counter'] = (isset($setting['counter']) && $setting['counter'] == 1) ? $setting['counter'] : 0;
		
		$data['products'] = array();

		$filter_data = array(
			'sort'  => 'pd.name',
			'order' => 'ASC',
			'start' => 0,
			'limit' => $setting['limit']
		);
		$results = $this->model_catalog_product->getProductSpecials($filter_data);

		if ($results) {
			foreach ($results as $result) {
				$extraimage = '';
				
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
				}

				$images = $this->model_catalog_product->getProductImages($result['product_id']);

				if(!empty($images) && isset($images[0]['image'])){
				 $extraimage = $this->model_tool_image->resize($images[0]['image'], $setting['width'], $setting['height']);
				}

				if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
					$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$price = false;
				}

				if ((float)$result['special']) {
					$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$special = false;
				}

				if ($this->config->get('config_tax')) {
					$tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
				} else {
					$tax = false;
				}

				if ($this->config->get('config_review_status')) {
					$rating = $result['rating'];
				} else {
					$rating = false;
				}

				$stock_status = ($result['quantity'] <= 0) ? $this->language->get('text_out_of_stock') : '';
				$specialDates = $this->model_catalog_product->getProductSpecialsDate($result['product_id']);
				
				if($specialDates['date_end'] != '0000-00-00'){
					$date_end  = $specialDates['date_end'];
				}else{
					$date_end = '';
				}		

				$data['products'][] = array(
					'product_id'  => $result['product_id'],
					'thumb'       => $image,
					'name'        => $result['name'],
					'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
					'price'       => $price,
					'special'     => $special,
					'date_end'    => $date_end,
					'tax'         => $tax,
					'rating'      => $rating,
					'extra'		  => $extraimage,
					'stock_status'=> $stock_status,
					'quick'        => $this->url->link('product/quick_view','&product_id=' . $result['product_id']),
					'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id'])
				);
			}

			return $this->load->view('extension/module/ishispecialblock', $data);
		}
	}
}