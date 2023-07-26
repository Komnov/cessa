<?php
/*
@author  nikifalex
@skype   logoffice1
@email    nikifalex@yandex.ru
*/


class ControllerAccountDiscountsTotal extends Controller {
	public function index() {
		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('account/order', '', true);

			$this->response->redirect($this->url->link('account/login', '', true));
		}

		$this->load->language('account/discounts_total');

		$this->document->setTitle($this->language->get('heading_title'));
		

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_account'),
			'href' => $this->url->link('account/account', '', true)
		);
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('account/discounts_total', '', true)
		);

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_empty'] = $this->language->get('text_empty');
        $data['text_from'] = $this->language->get('text_from');

        $data['column_name'] = $this->language->get('column_name');
		$data['column_total'] = $this->language->get('column_total');
		$data['column_discount'] = $this->language->get('column_discount');

		$data['entry_discount'] = $this->language->get('entry_discount');
        $data['entry_orders_total'] = $this->language->get('entry_orders_total');
        $data['entry_discount_table'] = $this->language->get('entry_discount_table');
        $data['entry_next_level'] = $this->language->get('entry_next_level');
        $data['entry_next2_level'] = $this->language->get('entry_next2_level');
        $data['entry_date_max'] = $this->language->get('entry_date_max');
        $data['entry_date_diff'] = $this->language->get('entry_date_diff');

		$data['button_continue'] = $this->language->get('button_continue');

        $this->load->model('extension/total/discounts_total');

        $data['discounts']=$this->model_extension_total_discounts_total->getInfo();
        $data['use_name']=false;
        foreach ($data['discounts']['discounts_table'] as &$d) {
            if (!isset($d['name']))
                $d['name']='';
            if ($d['name']!='')
                $data['use_name']=true;

        }

		$data['continue'] = $this->url->link('account/account', '', true);

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('account/discounts_total', $data));
	}


}