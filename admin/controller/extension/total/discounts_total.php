<?php
/*
@author  nikifalex
@skype   logoffice1
@email    nikifalex@yandex.ru
*/

class ControllerExtensionTotalDiscountsTotal extends Controller {
    private $error = array();

    private static function cmpd($a, $b)
    {
        if ($a["summ"]==$b["summ"]) {
            return 0;
        }
        return ($a["summ"]<$b["summ"]) ? -1 : 1;
    }


    public function index() {
        $this->load->language('extension/total/discounts_total');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('setting/setting');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
            $this->model_setting_setting->editSetting('total_discounts_total', $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=total', 'SSL'));
        }

        $data['heading_title'] = $this->language->get('heading_title');
        $data['text_edit'] = $this->language->get('text_edit');

        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');
        $data['text_yes'] = $this->language->get('text_yes');
        $data['text_no'] = $this->language->get('text_no');

        $data['entry_status'] = $this->language->get('entry_status');
        $data['entry_sum_cart'] = $this->language->get('entry_sum_cart');
        $data['entry_coupon_reward_no_discount'] = $this->language->get('entry_coupon_reward_no_discount');
        $data['entry_sort_order'] = $this->language->get('entry_sort_order');
        $data['entry_min_total'] = $this->language->get('entry_min_total');
        $data['entry_discounts_table'] = $this->language->get('entry_discounts_table');
        $data['entry_discounts_add'] = $this->language->get('entry_discounts_add');
        $data['entry_discounts_from'] = $this->language->get('entry_discounts_from');
        $data['entry_discounts_name'] = $this->language->get('entry_discounts_name');
        $data['entry_discounts_group'] = $this->language->get('entry_discounts_group');
        $data['entry_discounts_discount'] = $this->language->get('entry_discounts_discount');
        $data['entry_discounts_delete'] = $this->language->get('entry_discounts_delete');
        $data['entry_order_status'] = $this->language->get('entry_order_status');
        $data['entry_manufacturer'] = $this->language->get('entry_manufacturer');
        $data['entry_last_days'] = $this->language->get('entry_last_days');
        $data['entry_customer_group'] = $this->language->get('entry_customer_group');

        $data['entry_calc_type'] = $this->language->get('entry_calc_type');
        $data['entry_calc_total_summa'] = $this->language->get('entry_calc_total_summa');
        $data['calc_types'] = explode('|',$this->language->get('calc_types'));
        $data['calc_total_summa'] = explode('|',$this->language->get('calc_total_summa'));
        $data['note'] = $this->language->get('note');

        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->error['complete_status'])) {
            $data['error_complete_status'] = $this->error['complete_status'];
        } else {
            $data['error_complete_status'] = '';
        }


        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=total', true)
        );


        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('extension/total/discounts_total', 'user_token=' . $this->session->data['user_token'], 'SSL'),
            'separator' => ' :: '
        );

        $data['action'] = $this->url->link('extension/total/discounts_total', 'user_token=' . $this->session->data['user_token'], 'SSL');

        $data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=total', 'SSL');


        $this->load->model('localisation/order_status');
        $data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();


        $this->load->model('catalog/manufacturer');
        $data['manufacturers'] = $this->model_catalog_manufacturer->getManufacturers();

        if (isset($this->request->post['total_discounts_total_customer_groups'])) {
            $data['total_discounts_total_customer_groups'] = $this->request->post['total_discounts_total_customer_groups'];
        } elseif ($this->config->get('total_discounts_total_customer_groups')) {
            $data['total_discounts_total_customer_groups'] = $this->config->get('total_discounts_total_customer_groups');
        } else {
            $data['total_discounts_total_customer_groups'] = array();
        }


        $this->load->model('customer/customer_group');

        $data['customer_groups'] = $this->model_customer_customer_group->getCustomerGroups();





        if (isset($this->request->post['total_discounts_total_status'])) {
            $data['total_discounts_total_status'] = $this->request->post['total_discounts_total_status'];
        } else {
            $data['total_discounts_total_status'] = $this->config->get('total_discounts_total_status');
        }
        if (isset($this->request->post['total_discounts_total_sum_cart'])) {
            $data['total_discounts_total_sum_cart'] = $this->request->post['total_discounts_total_sum_cart'];
        } else {
            $data['total_discounts_total_sum_cart'] = $this->config->get('total_discounts_total_sum_cart');
        }
        if (isset($this->request->post['total_discounts_total_coupon_reward_no_discount'])) {
            $data['total_discounts_total_coupon_reward_no_discount'] = $this->request->post['total_discounts_total_coupon_reward_no_discount'];
        } else {
            $data['total_discounts_total_coupon_reward_no_discount'] = $this->config->get('total_discounts_total_coupon_reward_no_discount');
        }

        if (isset($this->request->post['total_discounts_total_manufacturer_id'])) {
            $data['total_discounts_total_manufacturer_id'] = $this->request->post['total_discounts_total_manufacturer_id'];
        } elseif ($this->config->get('total_discounts_total_manufacturer_id')) {
            $data['total_discounts_total_manufacturer_id'] = $this->config->get('total_discounts_total_manufacturer_id');
        } else {
            $data['total_discounts_total_manufacturer_id']=array();
        }


        if (isset($this->request->post['total_discounts_total_order_status_id'])) {
            $data['total_discounts_total_order_status_id'] = $this->request->post['total_discounts_total_order_status_id'];
        } else {
            $data['total_discounts_total_order_status_id'] = $this->config->get('total_discounts_total_order_status_id');
        }

        if (!is_array($data['total_discounts_total_order_status_id']))
            $data['total_discounts_total_order_status_id']=array($data['total_discounts_total_order_status_id']);

        if (isset($this->request->post['total_discounts_total_calc_type_id'])) {
            $data['total_discounts_total_calc_type_id'] = $this->request->post['total_discounts_total_calc_type_id'];
        } else {
            $data['total_discounts_total_calc_type_id'] = $this->config->get('total_discounts_total_calc_type_id');
        }

        if (isset($this->request->post['total_discounts_total_calc_total_summa'])) {
            $data['total_discounts_total_calc_total_summa'] = $this->request->post['total_discounts_total_calc_total_summa'];
        } else {
            $data['total_discounts_total_calc_total_summa'] = $this->config->get('total_discounts_total_calc_total_summa');
        }


        if (isset($this->request->post['total_discounts_total_sort_order'])) {
            $data['total_discounts_total_sort_order'] = $this->request->post['total_discounts_total_sort_order'];
        } else {
            $data['total_discounts_total_sort_order'] = $this->config->get('total_discounts_total_sort_order');
        }

        if (isset($this->request->post['total_discounts_total_min_total'])) {
            $data['total_discounts_total_min_total'] = $this->request->post['total_discounts_total_min_total'];
        } else {
            $data['total_discounts_total_min_total'] = $this->config->get('total_discounts_total_min_total');
        }

        if (isset($this->request->post['total_discounts_total_last_days'])) {
            $data['total_discounts_total_last_days'] = $this->request->post['total_discounts_total_last_days'];
        } else {
            $data['total_discounts_total_last_days'] = $this->config->get('total_discounts_total_last_days');
        }


        if (isset($this->request->post['discounts_table'])) {
            $data['discounts_table'] = $this->request->post['total_discounts_total_discounts_table'];
        } else {
            $d=$this->config->get('total_discounts_total_discounts_table');
            if (is_array($d)) {
                usort($d, array('ControllerExtensionTotalDiscountsTotal', 'cmpd'));
                $data['discounts_table'] = $d;
            } else {
                $data['discounts_table'] = array();
            }
        }

        if (count($data['discounts_table'])==0)
            $data['discounts_table'][]=array('summ'=>'0', 'value'=>'0', 'name'=>'', 'group'=>'0');

        foreach ($data['discounts_table'] as &$d) {
            if (!isset($d['name']))
                $d['name']='';
            if (!isset($d['group']))
                $d['group']='0';
        }

        uasort($data['discounts_table'],array($this, 'sortTable'));

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/total/discounts_total', $data));

    }

    private function validate() {
        if (!$this->user->hasPermission('modify', 'extension/total/discounts_total')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (!isset($this->request->post['total_discounts_total_order_status_id']) ||  count($this->request->post['total_discounts_total_order_status_id'])==0) {
            $this->error['complete_status'] = $this->language->get('error_complete_status');
        }


        return !$this->error;
    }

    function sortTable($a, $b) {
        if ($a['group']==$b['group']) {
            return $a['summ']>$b['summ'];
        } else {
            return $a['group']>$b['group'];
        }
    }

    public function install() {
        $qu = $this->db->query("DESCRIBE " . DB_PREFIX . "customer `start_balance`");
        if ($qu->num_rows == 0) {
            $this->db->query("ALTER TABLE " . DB_PREFIX ."customer ADD `start_balance` DECIMAL(15,4) NOT NULL");
        }
    }


}
?>