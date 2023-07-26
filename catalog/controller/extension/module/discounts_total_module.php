<?php
/*
@author  nikifalex
@skype   logoffice1
@email    nikifalex@yandex.ru
*/

class ControllerExtensionModuleDiscountsTotalModule extends Controller {
	public function index($setting) {
        $this->load->language('extension/module/discounts_total_module');

		$data['heading_title'] = $this->language->get('heading_title');
        $data['text_empty'] = $this->language->get('text_empty');
        $data['text_from'] = $this->language->get('text_from');

        $data['column_total'] = $this->language->get('column_total');
        $data['column_discount'] = $this->language->get('column_discount');
        $data['column_name'] = $this->language->get('column_name');

        $data['entry_discount'] = $this->language->get('entry_discount');
        $data['entry_orders_total'] = $this->language->get('entry_orders_total');
        $data['entry_discount_table'] = $this->language->get('entry_discount_table');
        $data['entry_next_level'] = $this->language->get('entry_next_level');
        $data['entry_next2_level'] = $this->language->get('entry_next2_level');
        $data['entry_date_max'] = $this->language->get('entry_date_max');
        $data['entry_date_diff'] = $this->language->get('entry_date_diff');

        $this->load->model('extension/total/discounts_total');
        $data['discounts']=$this->model_extension_total_discounts_total->getInfo();

        $data['use_name']=false;
        foreach ($data['discounts']['discounts_table'] as &$d) {
            if (!isset($d['name']))
                $d['name']='';
            if ($d['name']!='')
                $data['use_name']=true;

        }


    	return $this->load->view('extension/module/discounts_total_module', $data);
	}




}