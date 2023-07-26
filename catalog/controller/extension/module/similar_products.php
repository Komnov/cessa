<?php
class ControllerExtensionModuleSimilarProducts extends Controller {
	private $products = 0;

	public function __construct($registry) {
		parent::__construct($registry);
	}

	public function index($settings) {
		$this->load->helper('sp');

		if (empty($settings) || !$this->validateRequest() || !(int)$this->config->get('module_similar_products_status')) { // Ignore empty calls
			return;
		}

		$this->load->language('extension/module/similar_products');
		$this->load->model('extension/module/similar_products');

		$data['heading_title'] = isset($settings['names'][$this->config->get('config_language_id')]) ? $settings['names'][$this->config->get('config_language_id')] : $this->language->get('heading_title');

		$data['error_ajax_request'] = addslashes($this->language->get('error_ajax_request'));

		$data['products'] = '';
		$data['show_similar'] = 0;
		$data['product_id'] = 0;
		$data['show_in_tab'] = (int)$settings['show_in_tab'];
		$data['position'] = (isset($settings['position'])) ? $settings['position'] : "content_bottom";
		$data['column_left_selector'] = $this->config->get('module_similar_products_column_left_selector');
		$data['column_right_selector'] = $this->config->get('module_similar_products_column_right_selector');

		if (isset($this->request->get['product_id'])) {
			$this->document->addScript('catalog/view/javascript/sp/custom.min.js');

			$data['product_id'] = $this->request->get['product_id'];
			$data['mid'] = $settings['module_id'];
			$data['path'] = isset($this->request->get['path']) ? "&_path=" . $this->request->get['path'] : '';

			$product_info = $this->model_extension_module_similar_products->getPlainProduct($data['product_id']);

			$categories = isset($this->request->get['path']) ? explode('_', $this->request->get['path']) : array();

			if (((int)$product_info['sp_auto_select'] == 1 || (int)$product_info['sp_auto_select'] == 8) && !$categories) {
				$this->load->model('catalog/product');
				$p_categories = $this->model_catalog_product->getCategories($data['product_id']);

				if ((int)$product_info['sp_leaves_only']) {
					$this->load->model('catalog/category');
					$cc = array();
					if (method_exists($this->model_catalog_category, "getCategoriesByParentId")) {
						foreach ($p_categories as $c) {
							$cc[$c['category_id']] = $this->model_catalog_category->getCategoriesByParentId($c['category_id']);
						}
					}
					foreach ($cc as $k => $c) {
						if (!count(array_intersect(array_keys($cc), $c))) {
							$categories[] = $k;
						}
					}
				} else {
					foreach ($p_categories as $c) {
						$categories[] = $c['category_id'];
					}
				}
				$categories = implode(",", $categories);
			} else {
				$categories = end($categories);
			}

			list($usec, $sec) = explode(' ', microtime());
			$this->session->data['sp_seed'] = (float) $sec + ((float) $usec * 100000);

			$data['lazy_load'] = $settings['lazy_load'];

			if (!$settings['lazy_load']) {
				$data['products'] = $this->get($data['product_id'], $product_info, $settings, $categories);
				$data['show_similar'] = $this->products;
			} else {
				$filter_data = array(
					"auto_select"     => $product_info['sp_auto_select'],
					"sort_order"      => $product_info['sp_product_sort_order'],
					"substr_start"    => $product_info['sp_substr_start'],
					"substr_length"   => $product_info['sp_substr_length'],
					"custom_string"   => $product_info['sp_custom_string'],
					"categories"      => $categories,
					"manufacturer"    => $product_info['manufacturer_id'],
					"stock_only"      => $settings['stock_only'],
				);

				$data['show_similar'] = $this->model_extension_module_similar_products->similarProductsExist($data['product_id'], $filter_data);
			}
		}

		$template = 'extension/module/similar_products';

		return $this->load->view($template, $data);
	}

	public function get($product = null, $product_info = null, $settings = null, $categories = null) {
		$this->load->helper('sp');
		$this->load->language('extension/module/similar_products');
		$this->load->model('extension/module/similar_products');

		$this->load->model('catalog/product');
		$this->load->model('tool/image');
		$this->load->model('setting/module');

		$data['products'] = array();
		$data['show_in_tab'] = 0;
		$data['position'] = "content_bottom";

		$results = array();
		$products_total = 0;
		$product_id = 0;
		$per_page = 0;
		$page = 0;

		if ($product) {
			$product_id = $product;
		} else if (isset($this->request->get['pid'])) {
			$product_id = $this->request->get['pid'];
		}

		if (is_null($settings) && isset($this->request->get['mid'])) {
			$settings = $this->model_setting_module->getModule($this->request->get['mid']);
		}

		if ($product_id && $settings && $this->validateRequest()) {
			$data['show_in_tab'] = (int)$settings['show_in_tab'];
			$data['position'] = (isset($settings['position'])) ? $settings['position'] : (isset($this->request->get['pos']) ? $this->request->get['pos'] : "content_bottom");

			$per_page = (int)$settings['products_per_page'];

			if (is_null($product_info)) {
				$product_info = $this->model_extension_module_similar_products->getPlainProduct($product_id);
			}

			switch ($product_info['sp_product_sort_order']) {
				case '7':
					$s_sort = 'random';
					$s_order = 'ASC';
					break;
				case '6':
					$s_sort = 'p.date_modified';
					$s_order = 'DESC';
					break;
				case '5':
					$s_sort = 'p.date_added';
					$s_order = 'DESC';
					break;
				case '4':
					$s_sort = 'p.viewed';
					$s_order = 'DESC';
					break;
				case '3':
					$s_sort = 'p.quantity';
					$s_order = 'DESC';
					break;
				case '2':
					$s_sort = 'pd.name';
					$s_order = 'ASC';
					break;
				case '1':
					$s_sort = 'p.model';
					$s_order = 'ASC';
					break;
				case '0':
				default:
					$s_sort = 'p.sort_order';
					$s_order = 'ASC';
					break;
			}

			if (is_null($categories)) {
				$categories = isset($this->request->get['path']) ? explode('_', $this->request->get['path']) : (isset($this->request->get['_path']) ? explode('_', $this->request->get['_path']) : array());

				if (((int)$product_info['sp_auto_select'] == 1 || (int)$product_info['sp_auto_select'] == 8) && !$categories) {
					$this->load->model('catalog/product');
					$p_categories = $this->model_catalog_product->getCategories($product_id);

					if ((int)$product_info['sp_leaves_only']) {
						$this->load->model('catalog/category');
						$cc = array();
						if (method_exists($this->model_catalog_category, "getCategoriesByParentId")) {
							foreach ($p_categories as $c) {
								$cc[$c['category_id']] = $this->model_catalog_category->getCategoriesByParentId($c['category_id']);
							}
						}
						foreach ($cc as $k => $c) {
							if (!count(array_intersect(array_keys($cc), $c))) {
								$categories[] = $k;
							}
						}
					} else {
						foreach ($p_categories as $c) {
							$categories[] = $c['category_id'];
						}
					}
					$categories = implode(",", $categories);
				} else {
					$categories = end($categories);
				}
			}

			if (isset($this->request->get['spp'])) {
				$page = (int)$this->request->get['spp'];
			} else {
				$page = 1;
			}

			if ($page < 0) {
				$page = 1;
			}

			$filter_data = array(
				"limit"         => $settings['limit'],
				"sort"          => $s_sort,
				"order"         => $s_order,
				"auto_select"   => $product_info['sp_auto_select'],
				"sort_order"    => $product_info['sp_product_sort_order'],
				"substr_start"  => $product_info['sp_substr_start'],
				"substr_length" => $product_info['sp_substr_length'],
				"custom_string" => $product_info['sp_custom_string'],
				"categories"    => $categories,
				"manufacturer"  => $product_info['manufacturer_id'],
				"stock_only"    => $settings['stock_only'],
				"start"         => ($page - 1) * $per_page,
				"per_page"      => $per_page,
				"seed"          => isset($this->session->data['sp_seed']) ? $this->session->data['sp_seed'] : (int)date("Ymd")
			);

			$results = $this->model_extension_module_similar_products->getSimilarProducts($product_id, $filter_data);

			$products_total = $this->model_extension_module_similar_products->getProductCount();
		}

		foreach ($results as $result) {
			if ($result['image']) {
				$image = $this->model_tool_image->resize($result['image'], $settings['image_width'], $settings['image_height']);
			} else {
				$image = $this->model_tool_image->resize('placeholder.png', $settings['image_width'], $settings['image_height']);
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

			$data['products'][] = array(
				'product_id' => $result['product_id'],
				'thumb'      => $image,
				'name'       => $result['name'],
				'description'=> utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
				'price'      => $price,
				'special'    => $special,
				'tax'        => $tax,
				'rating'     => $rating,
				'href'       => $this->url->link('product/product', 'product_id=' . $result['product_id'], true),
			);
		}

		$url = '&spp={page}';

		if (isset($this->request->get['path'])) {
			$url .= "&_path=" . $this->request->get['path'];
		} else if (isset($this->request->get['_path'])) {
			$url .= "&_path=" . $this->request->get['_path'];
		}

		$limit = ($per_page) ? $per_page : $products_total;

		$pagination = new Pagination();
		$pagination->page_var = "spp";
		$pagination->total = $products_total;
		$pagination->page = $page;
		$pagination->limit = $limit;
		$pagination->url = $this->url->link('extension/module/similar_products/get', 'pid=' . $product_id . '&mid=' . (isset($settings['module_id']) ? $settings['module_id'] : 0) . '&pos=' . $data['position'] . $url, true);

		$data['pagination'] = $pagination->render();
		$data['show_pagination'] = count($data['products']) != $products_total;
		$data['results'] = sprintf($this->language->get('text_pagination'), ($products_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($products_total - $limit)) ? $products_total : ((($page - 1) * $limit) + $limit), $products_total, $limit ? ceil($products_total / $limit) : 0);

		$data['column_left'] = (isset($this->request->get['cl'])) ? (int)$this->request->get['cl'] : !empty($this->session->data['column_left']);
		$data['column_right'] = (isset($this->request->get['cr'])) ? (int)$this->request->get['cr'] : !empty($this->session->data['column_right']);

		$template = 'extension/module/similar_products_products';

		if ($product) {
			$this->products = $products_total;
			return $this->load->view($template, $data);
		} else {
			$this->response->setOutput($this->load->view($template, $data));
		}
	}

	protected function validateRequest() {
		return in_array($this->config->get('config_store_id'), bdecode($this->config->get('module_similar_products_as')));
	}
}
