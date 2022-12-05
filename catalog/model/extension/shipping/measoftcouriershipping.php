<?php
class ModelExtensionShippingMeasoftcouriershipping extends Model
{

    public function getQuote($address)
    {
        $method_data = array();

        $this->load->language('extension/shipping/measoftcouriershipping');

        if (!(isset($address['city']) && $address['city'])) {
            return $method_data;
        }

            $ksProductWeight = $this->getWeight();
            
            $quote_data = array();

            $html = "<input type='hidden' name='pvz_id' class='pvzcode'><input type='text' readonly name='pvz_name' id='pvzname' placeholder='Нажмите кнопку справа для выбора ПВЗ'>";
            $html .= "<input type='hidden' readonly name='pvz_city' id='pvz_city'>";
            // $html .= "<button type='button' id='ks2008_clean_pvz' class='btn clearPvz' title='Очистить ПВЗ'><img style='width:10px' src='/admin/view/image/measoftcourier/cross.png'></button>";

            $cost = 0;
            if (isset($this->session->data['pvz_cost'])) {
                $cost = $this->session->data['pvz_cost'];
            }
            
            $description = $this->config->get('shipping_measoftcourier_pvz_description');
            if (isset($this->session->data['pvz_name'])) {
                $description = $this->session->data['pvz_name'];
            }
            //Вес корзины изменился
            if (isset($this->session->data['cart_weight']) && $this->session->data['cart_weight'] != $ksProductWeight ) {
                $cost = $this->calculate($address);
                $this->session->data['cart_weight'] = $ksProductWeight;
            }

            //При запросе из админки
        
            if (isset($this->session->data['api_id']) && isset($this->request->get['order_id'])) {
                
                $this->load->model('checkout/order');
                $order_info = $this->model_checkout_order->getOrder($this->request->get['order_id']);
                $pvz_id = $order_info['pvz_id'];
                if (isset($this->request->get['pvz_id'])) {
                    $pvz_id = $this->request->get['pvz_id'];
                }

                if ($pvz_id) {
                    $api_query = $this->getAdminQuote($address, $pvz_id,$order_info['order_id']);
                    if (isset($api_query['cost'])) {
                        $cost = $api_query['cost'];
                        $description = $api_query['pvz_name'];
                    }
                } else {
                    return $method_data;
                }
            }
            
            if ($cost) {
                $cost_formated = $this->currency->format($this->tax->calculate($cost, $this->config->get('shipping_measoftcourier_tax_class_id'), $this->config->get('config_tax')), $this->session->data['currency']);
            } else {
                $cost_formated = $this->language->get('no_tariff');
                if (!isset($this->session->data['pvz_cost'])) {
                    $cost_formated = $this->language->get('choose_point');
                }
            }
			
			if (!$this->config->get('shipping_measoftcourier_pvz_off')){
			
            $quote_data['standard'] = array(
                'code'         => 'measoftcouriershipping.standard',
                'title'        => $description,
                'title_html'   => '<span id="mea_description" onclick="showModalMea()">'.$description. ' - ' . $cost_formated . "</span><input type='hidden' name='ksProductWeight' id='ksProductWeight' value='".$ksProductWeight."' />".$html,
				'description'   => '<span id="mea_description" onclick="showModalMea()">'.$description. ' - ' . $cost_formated . "</span><input type='hidden' name='ksProductWeight' id='ksProductWeight' value='".$ksProductWeight."' />".$html,
                'cost'         => $cost,
                'tax_class_id' => $this->config->get('shipping_measoftcourier_tax_class_id'),
                'sort_order'   => $this->config->get('shipping_measoftcourier_sort_order'),
                'text'         => isset($this->session->data['api_id']) && isset($this->request->get['order_id']) ? $cost_formated : '',
            );

            $method_data = array(
                'code'       => 'measoftcouriershipping',
                'title'      => $this->config->get('shipping_measoftcourier_pvz_title'),
                'quote'      => $quote_data,
                'sort_order' => $this->config->get('shipping_measoftcourier_sort_order'),
                'error'      => false
            );
			}
			
			

        return $method_data;
    }

    private function getWeight() 
	{
        $weight = $this->cart->getWeight();
		if (!$weight) {
			$weight = 0.1;
		}
		return round($weight, 2);
	}


    private function calculate($address)
    {
        $cost = 0;
        require_once(DIR_SYSTEM.'library/measoft/measoftcourier.class.php');

        $measoft = new Measoft(
            $this->config->get('shipping_measoftcourier_login'),
            $this->config->get('shipping_measoftcourier_password'),
            $this->config->get('shipping_measoftcourier_extra')
        );

        $town = '';
        if (isset($address['city']) && $address['city']) {
            $town = $address['city'];
        } else {
            return $cost;
        }

        $weight = $this->getWeight();

        $result = $measoft->calculatorRequest([
            'townto' => $town,
            'townfrom' => $this->config->get('shipping_measoftcourier_city'),
            'mass' => $weight,
            'zipcode' => isset($address['postcode']) ? $address['postcode'] : '',
        ]);

        if ($result) {
            $cost = (double)$result->price
                * $this->config->get('shipping_measoftcourier_shipping_rate')
                + $this->config->get('shipping_measoftcourier_shipping_add_sum');
        }

        return $cost;
    }

	private function getAdminQuote($address, $pvz_id, $order_id) 
	{

		$quoted = [];

		require_once(DIR_SYSTEM.'library/measoft/measoftcourier.class.php');

        $measoft = new Measoft(
            $this->config->get('shipping_measoftcourier_login'),
            $this->config->get('shipping_measoftcourier_password'),
            $this->config->get('shipping_measoftcourier_extra')
			);
	
		$townfrom = $this->config->get('shipping_measoftcourier_city');
		if ($this->config->get('shipping_measoftcourier_city_code')) {
			$townfrom = $this->config->get('shipping_measoftcourier_city_code');	
		}
			
        $townto = '';
        $pvz_name = '';
        
        $pvzInfo = $measoft->getPVZ($pvz_id);

        if (isset($pvzInfo->pvz)) {
            if (isset($pvzInfo->pvz->town)) {
                $attrs = $pvzInfo->pvz->town->attributes();
                $townto = $attrs->code->__toString();
            }
            if (isset($pvzInfo->pvz->name)) {
                $pvz_name .= $pvzInfo->pvz->name->__toString() . ' ';
            }

            if (isset($pvzInfo->pvz->address)) {
                $pvz_name .= $pvzInfo->pvz->address->__toString();
            }            
        } else {
            return $quoted;
        }

		if (!$townto) {
			$townto = $address['city'];
        } 

		$zipcode = isset($address['zipcode']) ? $address['zipcode'] : '';
		$zipcode = '';			

        $weight_query = $this->db->query("SELECT SUM(p.weight*op.quantity) as weight, p.weight_class_id FROM `" . DB_PREFIX . "order_product` op LEFT JOIN `" . DB_PREFIX . "product` p ON p.product_id = op.product_id WHERE op.order_id =" .(int)$order_id);

        $weight = 0;
        if ($weight_query->rows) {
            $weight = $weight_query->row['weight'];
            if ($weight_query->row['weight_class_id'] == 2) {
                $weight = $weight/1000;
            }
        }

		$result = $measoft->calculatorRequest([
				'townto' => $townto,
				'townfrom' => $townfrom,
				'mass' => $weight,
				'zipcode' => $zipcode,
				'pvzid'	=> $pvz_id,
		]);
        $cost = 0;

		if ($result) {
				$cost = (double)$result->price
                * $this->config->get('shipping_measoftcourier_shipping_rate')
                + $this->config->get('shipping_measoftcourier_shipping_add_sum');

                $quoted['cost'] = $cost;
                $quoted['pvz_name'] = $pvz_name;
		}			
		

		return $quoted;

	}  
}
