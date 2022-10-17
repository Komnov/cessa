<?php
/*
@author  nikifalex
@skype   logoffice1
@email    nikifalex@yandex.ru
*/

class ModelExtensionTotalDiscountsTotal extends Model {

    private $customer_id=0;

    public function __construct($registry) {
        parent::__construct($registry);
        if (!empty($this->session->data['original_customer_id'])) {
            $this->customer_id=$this->session->data['original_customer_id'];
        } else {
            $this->customer_id=$this->customer->getId();
        }
    }

    public function getTotal($total) {
        if (!$this->config->get('total_discounts_total_status')) {
            return;
        }

        if ($this->customer_id==0)
            return;

        if ($this->config->get('total_discounts_total_coupon_reward_no_discount') &&
            (
                isset($this->session->data['coupon']) ||
                isset($this->session->data['reward'])
            )
           ) {
            return;
        }
        $discounts_table = $this->config->get('total_discounts_total_discounts_table');
        if (!is_array($discounts_table)) {
            return;
        }
        $discounts_total_customer_groups = $this->config->get('total_discounts_total_customer_groups');
        if (is_array($discounts_total_customer_groups) && count($discounts_total_customer_groups)>0) {
            $customer_group_id=$this->config->get('config_customer_group_id');
            if (!in_array($customer_group_id,$discounts_total_customer_groups)) {
                return;
            }
        }


        $min_total = $this->config->get('total_discounts_total_min_total');
        if ($min_total > 0 && $min_total > $this->cart->getSubTotal()) {
            return;
        }
        $last_days = $this->config->get('total_discounts_total_last_days');
        if ($last_days == '')
            $last_days = 0;
        $this->language->load('extension/total/discounts_total');
        if ($this->customer->isLogged()) {
            if (isset($this->session->data['order_id']))
                $order_id = $this->session->data['order_id'];
            else
                $order_id = '';
            $total_orders = $this->getOrdersTotal($order_id, $last_days);
            if ($total_orders == '')
                $total_orders = 0;
        } else {
            $total_orders = 0;
        }
        $title = array();
        if ($total_orders > 0) {
            $title[] = $this->language->get('text_title');
        }
        if ($this->config->get('total_discounts_total_sum_cart')) {
            $total_orders += $this->cart->getTotal();
            if ($total_orders > 0)
                $title[] = $this->language->get('text_title2');
        }
        $title = implode(' ' . $this->language->get('text_and') . ' ', $title);
        $title = $this->mb_ucfirst($title);
        if ($total_orders == 0)
            return;
        usort($discounts_table, array('ModelExtensionTotalDiscountsTotal', 'cmpd'));
        $manufacturers = $this->config->get('total_discounts_total_manufacturer_id');
        if (!is_array($manufacturers))
            $manufacturers = array();
        $discount = 0;
        $customer_group_id=$this->config->get('config_customer_group_id');
        foreach ($discounts_table as $d) {
            if (!isset($d['name']))
                $d['name']='';
            if (!isset($d['group']))
                $d['group']='0';

            if ($d['group']==$customer_group_id || $d['group']==0 || $d['group']=='') {
                if ($total_orders >= $d['summ'])
                    $discount = $d['value'];
            }
        }
        $discounts_total_calc_type_id = $this->config->get('total_discounts_total_calc_type_id');
        if ($discounts_total_calc_type_id == 0) {
            $discount_total = $total['total'] * ($discount / 100);
        } elseif (in_array($discounts_total_calc_type_id, array(1, 2))) {
            $products = $this->cart->getProducts();
            $discount_total = 0;
            $this->load->model('catalog/product');
            foreach ($products as $product) {
                $productb = $this->model_catalog_product->getProduct($product['product_id']);
                if (!in_array($productb['manufacturer_id'], $manufacturers)) {
                    if ($discounts_total_calc_type_id == 1) {
                        $productd = $this->model_catalog_product->getProductDiscounts($product['product_id']);
                        if (!$productb['special'] && count($productd) == 0) {
                            $discount_total += $product['total'] * ($discount / 100);
                        }
                    }
                    if ($discounts_total_calc_type_id == 2) {
                        $discount_total += $product['total'] * ($discount / 100);
                    }
                }
            }
        } else {
            $discount_total = 0;
        }
        if ($discount_total > 0) {
            $total['totals'][] = array(
                'code'       => 'discounts_total',
                'title'      => $title . ' (' . $discount . '%)',
                'value'      => -$discount_total,
                'sort_order' => $this->config->get('total_discounts_total_sort_order'),
            );
            $total['total'] -= $discount_total;
        }
    }

    public function getOrdersTotal($order_id, $last_days) {

        $status = $this->config->get('total_discounts_total_order_status_id');
        $discounts_total_calc_total_summa = $this->config->get('total_discounts_total_calc_total_summa');
        if ($discounts_total_calc_total_summa==1) {
            $code = 'sub_total';
        } else {
            $code='total';
        }
        if (!is_array($status))
            $status = array($status);
        $status = implode(',', $status);
        if ($status == '') {
            $total1 = 0;
        } else {
            if ((int)$last_days > 0) {
                $sql = "SELECT sum(ot.value) total FROM `" . DB_PREFIX . "order` o JOIN `" . DB_PREFIX . "order_total` ot on ot.order_id=o.order_id  WHERE ot.code='".$code."' AND o.date_added >= NOW() - INTERVAL " . (int)$last_days . " DAY AND o.customer_id = '" . (int)$this->customer_id . "' AND o.order_status_id  in (" . $status . ")  ";
            } else {
                $sql = "SELECT sum(ot.value) total FROM `" . DB_PREFIX . "order` o JOIN `" . DB_PREFIX . "order_total` ot on ot.order_id=o.order_id  WHERE ot.code='".$code."' AND o.customer_id = '" . (int)$this->customer_id . "' AND o.order_status_id in (" . $status . ")  ";
            }
            if ($order_id != '')
                $sql .= " AND o.order_id<>'" . $order_id . "'";
            $query = $this->db->query($sql);
            $total1 = $query->row['total'];
        }
        $total2 = $this->getStartbalance();
        return $total1 + $total2;
    }


    public function getRawOrders($order_id = '', $last_days) {

        $status = $this->config->get('total_discounts_total_order_status_id');
        $discounts_total_calc_total_summa = $this->config->get('total_discounts_total_calc_total_summa');
        if ($discounts_total_calc_total_summa==1) {
            $code = 'sub_total';
        } else {
            $code='total';
        }
        if (!is_array($status))
            $status = array($status);
        $status = implode(',', $status);
        if ($status != '') {
            if ((int)$last_days > 0) {
                $sql = "SELECT ot.value total, o.date_added FROM `" . DB_PREFIX . "order` o JOIN `" . DB_PREFIX . "order_total` ot on ot.order_id=o.order_id  WHERE ot.code='".$code."' AND o.date_added >= NOW() - INTERVAL " . (int)$last_days . " DAY AND o.customer_id = '" . (int)$this->customer_id . "' AND o.order_status_id  in (" . $status . ") ORDER BY o.date_added DESC";
            } else {
                $sql = "SELECT ot.value total, o.date_added FROM `" . DB_PREFIX . "order` o JOIN `" . DB_PREFIX . "order_total` ot on ot.order_id=o.order_id  WHERE ot.code='".$code."' AND o.customer_id = '" . (int)$this->customer_id . "' AND o.order_status_id in (" . $status . ")  ORDER BY o.date_added DESC";
            }
            if ($order_id != '')
                $sql .= " AND o.order_id<>'" . $order_id . "'";
            $query = $this->db->query($sql);
            return $query->rows;            
        }
        return false;
    }

    private function getStartbalance() {
        $sql = "SELECT start_balance FROM `" . DB_PREFIX . "customer` c  WHERE c.customer_id = '" . (int)$this->customer_id . "'";
        $query = $this->db->query($sql);
        if ($query->num_rows)
            return (float)$query->row['start_balance'];
        else
            return 0;
    }
    
    private static function cmpd($a, $b) {
        if ($a["summ"] == $b["summ"]) {
            return 0;
        }
        return ($a["summ"] < $b["summ"]) ? -1 : 1;
    }


    public function getInfo() {
        $customer_group_id=$this->config->get('config_customer_group_id');
        $discount = 0;
        $total_orders = 0;
        $discounts_table = $this->config->get('total_discounts_total_discounts_table');
        $next = '';
        if (is_array($discounts_table)) {
            $last_days = $this->config->get('total_discounts_total_last_days');
            if ($last_days == '')
                $last_days = 0;
            if ($this->config->get('total_discounts_total_status')) {
                if ($this->customer->isLogged()) {
                    $this->language->load('total/discounts_total');
                    $total_orders = $this->getOrdersTotal('', $last_days);
                    if ($total_orders == '')
                        $total_orders = 0;
                    $total_orders = round($total_orders, 2);
                    usort($discounts_table, array($this, 'cmpd'));
                    $discount = 0;
                    foreach ($discounts_table as $d) {
                        if (!isset($d['name']))
                            $d['name']='';
                        if (!isset($d['group']))
                            $d['group']='0';

                        if ($d['group']==$customer_group_id || $d['group']==0 || $d['group']=='') {
                            if ($total_orders >= $d['summ'])
                                $discount = $d['value'];
                            if ($total_orders < $d['summ'] && $next == '')
                                $next = $d['summ'] - $total_orders;
                        }
                    }

                }
            }
        }
        $total_orders_str = $this->currency->format($total_orders, $this->session->data['currency']);
        if ($next != '')
            $next = $this->currency->format($next, $this->session->data['currency']);
        foreach ($discounts_table as &$dt) {
            $dt['summ_str'] = $this->currency->format($dt['summ'], $this->session->data['currency']);
        }
        $date_diff='';
        $date_max='';
        $next2='';
        if ($last_days>0) {
            $orders = $this->getRawOrders('', $last_days);
            if (is_array($orders)) {
                $start_balance = $this->getStartbalance();
                while ($orders) {
                    $order_pop = array_pop($orders);
                    $total2 = 0;
                    $total2 += $start_balance;
                    foreach ($orders as $o) {
                        $total2 += $o['total'];
                    }
                    $discount2 = 0;
                    $next2 = '';
                    foreach ($discounts_table as $d) {
                        if ($d['group']==$customer_group_id || $d['group']==0 || $d['group']=='') {
                            if ($total2 >= $d['summ']) {
                                $discount2 = $d['value'];
                            }
                            if ($total2 < $d['summ'] && $next2 == '')
                                $next2 = $d['summ'] - $total2;
                        }
                    }
                    if ($discount2 < $discount) {
                        $date_off = $order_pop['date_added'];
                        $date_current = date("d-m-Y");
                        $date_diff = ceil($last_days - ((strtotime($date_current) - strtotime($date_off)) / 3600 / 24));
                        $date_max = strtotime($date_current) + $date_diff * 3600 * 24;
                        $date_max = date($this->language->get('date_format_short'), $date_max);
                        if ($next2 != '')
                            $next2 = $this->currency->format($next2, $this->session->data['currency']);
                        break;
                    }
                }
            }
        }
        $discounts_table2=array();
        foreach ($discounts_table as $d) {
            if (!isset($d['name']))
                $d['name']='';
            if (!isset($d['group']))
                $d['group']='0';

            if ($d['group']==$customer_group_id || $d['group']==0 || $d['group']=='') {
                $discounts_table2[]=$d;
            }
        }
        uasort($discounts_table2,array($this, 'sortTable'));
        return array(
            'next2' => $next2,
            'date_max' => $date_max,
            'date_diff' => $date_diff,
            'discount' => $discount,
            'next' => $next,
            'total_orders' => $total_orders_str,
            'discounts_table' => $discounts_table2,
            'discounts_table_count' => count($discounts_table2)
        );
    }

    function sortTable($a, $b) {
        if ($a['group']==$b['group']) {
            return $a['summ']>$b['summ'];
        } else {
            return $a['group']>$b['group'];
        }
    }


    private function mb_ucfirst($string, $encoding='UTF8')
    {
        $strlen = mb_strlen($string, $encoding);
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_substr($string, 1, $strlen - 1, $encoding);
        return mb_strtoupper($firstChar, $encoding) . $then;
    }

}

?>