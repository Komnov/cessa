<?php
# Разработчик: Кузнецов Богдан
# ipol.ru
# ozon - служба доставки

class ControllerExtensionShippingOzon extends Controller
{
    private $code;

    public function __construct($registry)
    {
        parent::__construct($registry);
        // Module Constants
        if (VERSION >= '3.0.0.0') {
            $this->code = 'shipping_ozon';
        } elseif (VERSION >= '2.3.0.0') {
            $this->code = 'ozon';
        }
    }

    #Получение списка ПВЗ
    public function getTerminalPvz()
    {
        ini_set('error_reporting', E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);

        $start = microtime(true);

        $this->load->model('extension/shipping/ozon');

        $json = array();

        # Application load
        $app = $this->model_extension_shipping_ozon->getApp();

        if ($app->getErrorCollection()) {
            $error = $app->getErrorCollection()->getFirst();

            if (!empty($error)) {
                $this->log->write($error->getMessage());
                $this->response->addHeader('Content-Type: application/json');
                $this->response->setOutput(json_encode($json));
            }
        }

        # Общий вес в гр.
        $mainWeight = $this->cart->getWeight() ? $this->weight->convert($this->cart->getWeight(), $this->config->get('config_weight_class_id'), 2) : $this->weight->convert($this->config->get($this->code .' _weight'), 2, 2);

        # Итоговая цена
        $totalPrice = 0;

        # Габариты
        $dimansions = $this->model_extension_shipping_ozon->getDimensions();

        # Город получателя
        if (isset($this->session->data['shipping_address']['city'])) {
            $cityTo = $this->session->data['shipping_address']['city'];
            $countryTo = $this->session->data['shipping_address']['country'];
            $zoneTo = $this->session->data['shipping_address']['zone'];
            $zoneCode = $this->session->data['shipping_address']['zone_code'];
        } elseif (isset($this->session->data['payment_address']['city'])) {
            $cityTo = $this->session->data['payment_address']['city'];
            $countryTo = $this->session->data['payment_address']['country'];
            $zoneTo = $this->session->data['payment_address']['zone'];
            $zoneCode = $this->session->data['payment_address']['zone_code'];
        }

        if (isset($countryTo) && isset($cityTo) && isset($zoneTo)) {
            $locationName = $countryTo . ', ' . $zoneTo . ', ' . $cityTo;
        } elseif (isset($countryTo) && isset($cityTo)) {
            $locationName = $countryTo . ', ' . $cityTo;
        }

        $shipment = new \Ipol\Ozon\Core\Delivery\Shipment();

        $location = new \Ipol\Ozon\Core\Delivery\Location('cms');
        $location->setName($locationName);

        $shipment->setTo($location)
            ->setTariff(array('Courier', 'Postamat', 'PickPoint'));

        $cargoList = new \Ipol\Ozon\Core\Delivery\CargoCollection();

        $cargoBox = new \Ipol\Ozon\Core\Delivery\Cargo();

        foreach ($this->cart->getProducts() as $product) { //loop for processing multiple goods in order, obviously, there must be CMS basketItem collection in place of [1]
            $item = new \Ipol\Ozon\Core\Delivery\CargoItem();

            $width = ($product['width'] > 0) ? $this->length->convert($product['width'], $product['length_class_id'], 2) : $this->config->get($this->code .'_width');
            $height = ($product['height'] > 0) ? $this->length->convert($product['height'], $product['length_class_id'], 2) : $this->config->get($this->code . '_height');
            $length = ($product['length'] > 0) ? $this->length->convert($product['length'], $product['length_class_id'], 2) : $this->config->get($this->code . '_length');
            $weight = ($product['weight'] > 0) ? $this->weight->convert($product['weight'], $product['weight_class_id'], 2) : $this->config->get($this->code . '_weight');

            $product['price'] = (int)$product['price'];
            $product['quantity'] = (int)$product['quantity'];
            $price_q = $product['quantity'] * $product['price'];
            $totalPrice += $price_q;

            $item->setWidth(floatval($width)) // mm
            ->setHeight(floatval($height)) // mm
            ->setLength(floatval($length)) // mm
            ->setCost(new \Ipol\Ozon\Core\Entity\Money(($this->config->get($this->code .' _insurance') ? $product['price'] : 0))) //estimated price for insurance
            ->setPrice(new \Ipol\Ozon\Core\Entity\Money($product['price'])) //estimated price for insurance
            ->setQuantity($product['quantity'])
                ->setWeight($weight); //gram

            $cargoBox->add($item);
        }

        // Сделать для всех ваших товаров в порядке
        $cargoList->add($cargoBox); // CargoList технически является сборным, но пока мы не разделяем один заказ на несколько грузов

        $shipment->setCargoes($cargoList);

        # Cache params
        $params = array();
        $params['locationName'] = $locationName;
        $params['totalPrice'] = $totalPrice;
        $params['weight'] = $mainWeight;
        $params['length'] = $dimansions['length'];
        $params['width'] = $dimansions['width'];
        $params['height'] = $dimansions['height'];
        $params['warehouse_id'] = $this->config->get($this->code .'_warehouse_id');

        $cacheShort = 'ozon.shipping.deliveryVariantsForShipmentShort.' . md5(implode('', $params));

        if (!$deliveryVariants = $this->cache->get($cacheShort)) {
            $ans = $app->deliveryVariantsForShipmentShort($shipment, 25);

            if ($ans->isSuccess() == false) {
                $status = false;
                $this->log->write('СписокДоставок: ' . $ans->getResponse()->getMessage());
                return $method_data;
            } else {
                $deliveryVariants = $ans->getResponse()->getFields();
                $this->cache->set($cacheShort, $deliveryVariants);
            }
        }

        if (isset($deliveryVariants['deliveryVariantIds'][0])) {
            $i = 0;
            $k = 0;
            $j = 0;

            $items = array();

            $deliveryInfoList = $this->model_extension_shipping_ozon->getDeliveryVariantsPvz($deliveryVariants['deliveryVariantIds'], $cityTo, $zoneCode, $mainWeight, $totalPrice, $dimansions);

            foreach ($deliveryInfoList as $deliveryInfo) {
                if (!empty($deliveryInfo)) {
                    $items[$i] = $deliveryInfo;
                    $i++;
                }
            }
        }

        if ($items) {
            $json['type'] = 'FeatureCollection';

            $position = $items[0];

            $json['position'] = array();

            $json['position']['location'] = array($position['lat'], $position['long']);

            $json['features'] = array();

            foreach ($items as $item) {
                $workingHours = array();
                $workingHoursHtml = '';

                $days = [
                    'Вс', 'Пн', 'Вт', 'Ср',
                    'Чт', 'Пт', 'Сб'
                ];

                $countDays = 0;


                if (!empty($item['workingHours'])) {
                    $item['workingHours'] = unserialize($item['workingHours']);

                    if (empty($item['workingHours'])) {
                        $item['workingHours'] = array();
                    }

                    foreach ($item['workingHours'] as $key => $row) {
                        if ($key == 0 or $countDays > 7) {
                            continue;
                        }

                        $countDays++;

                        $period = $row['periods'][0]['min']['hours'] . ':00' . ' - ' . $row['periods'][0]['max']['hours'] . ':00';

                        if ($days[date("w", strtotime($row['date']))] == 'Пн') {
                            $workingHours[0]['day'] = $days[date("w", strtotime($row['date']))] . ".:" . $period;
                        } elseif ($days[date("w", strtotime($row['date']))] == 'Вт') {
                            $workingHours[1]['day'] = $days[date("w", strtotime($row['date']))] . ".:" . $period;
                        } elseif ($days[date("w", strtotime($row['date']))] == 'Ср') {
                            $workingHours[2]['day'] = $days[date("w", strtotime($row['date']))] . ".:" . $period;
                        } elseif ($days[date("w", strtotime($row['date']))] == 'Чт') {
                            $workingHours[3]['day'] = $days[date("w", strtotime($row['date']))] . ".:" . $period;
                        } elseif ($days[date("w", strtotime($row['date']))] == 'Пт') {
                            $workingHours[4]['day'] = $days[date("w", strtotime($row['date']))] . ".:" . $period;
                        } elseif ($days[date("w", strtotime($row['date']))] == 'Сб') {
                            $workingHours[5]['day'] = $days[date("w", strtotime($row['date']))] . ".:" . $period;
                        } elseif ($days[date("w", strtotime($row['date']))] == 'Вс') {
                            $workingHours[6]['day'] = $days[date("w", strtotime($row['date']))] . ".:" . $period;
                        }
                    }

                    ksort($workingHours);
                }

                $json['features'][] = array(
                    'type' => 'Feature',
                    'id' => $item['deliveryId'],
                    'geometry' => array('type' => 'Point', 'coordinates' => array($item['lat'], $item['long'])),
                    'properties' => array(
                        'address' => $item['address'],
                        'workingHours' => $workingHours,
                        'description' => $item['description'],
                        'howToGet' => $item['howToGet'],
                        'id' => $item['deliveryId'],
                    ),
                    'options' => array(
                        'iconLayout' => 'default#imageWithContent',
                        'iconImageHref' => '../../../../image/catalog/ozon/pickup_chosen.svg',
                        'iconImageSize' => array(30, 40),
                        'iconImageOffset' => array(-5, -38)
                    )
                );
            }
        }

        //$this->log->write('Время выполнения скрипта: '.round(microtime(true) - $start, 4).' сек.');

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    #Получение списка Почтомат
    public function getTerminalPostamat()
    {
        $this->load->model('extension/shipping/ozon');

        $json = array();

        # Application load
        $app = $this->model_extension_shipping_ozon->getApp();

        if ($app->getErrorCollection()) {
            $error = $app->getErrorCollection()->getFirst();
            if (!empty($error)) {
                $this->log->write($error->getMessage());
                $this->response->addHeader('Content-Type: application/json');
                $this->response->setOutput(json_encode($json));
            }
        }

        # Общий вес в гр.
        $mainWeight = $this->cart->getWeight() ? $this->weight->convert($this->cart->getWeight(), $this->config->get('config_weight_class_id'), 2) : $this->weight->convert($this->config->get($this->code .' _weight'), 2, 2);

        # Итоговая цена
        $totalPrice = 0;

        # Габариты
        $dimansions = $this->model_extension_shipping_ozon->getDimensions();

        # Город получателя
        if (isset($this->session->data['shipping_address']['city'])) {
            $cityTo = $this->session->data['shipping_address']['city'];
            $countryTo = $this->session->data['shipping_address']['country'];
            $zoneTo = $this->session->data['shipping_address']['zone'];
            $zoneCode = $this->session->data['shipping_address']['zone_code'];
        } elseif (isset($this->session->data['payment_address']['city'])) {
            $cityTo = $this->session->data['payment_address']['city'];
            $countryTo = $this->session->data['payment_address']['country'];
            $zoneTo = $this->session->data['payment_address']['zone'];
            $zoneCode = $this->session->data['payment_address']['zone_code'];
        }

        if (isset($countryTo) && isset($cityTo) && isset($zoneTo)) {
            $locationName = $countryTo . ', ' . $zoneTo . ', ' . $cityTo;
        } elseif (isset($countryTo) && isset($cityTo)) {
            $locationName = $countryTo . ', ' . $cityTo;
        }

        $shipment = new \Ipol\Ozon\Core\Delivery\Shipment();

        $location = new \Ipol\Ozon\Core\Delivery\Location('cms');
        $location->setName($locationName);

        $shipment->setTo($location)
            ->setTariff(array('Courier', 'Postamat', 'PickPoint'));

        $cargoList = new \Ipol\Ozon\Core\Delivery\CargoCollection();

        $cargoBox = new \Ipol\Ozon\Core\Delivery\Cargo();

        foreach ($this->cart->getProducts() as $product) { //loop for processing multiple goods in order, obviously, there must be CMS basketItem collection in place of [1]
            $item = new \Ipol\Ozon\Core\Delivery\CargoItem();

            $width = ($product['width'] > 0) ? $this->length->convert($product['width'], $product['length_class_id'], 2) : $this->config->get($this->code .'_width');
            $height = ($product['height'] > 0) ? $this->length->convert($product['height'], $product['length_class_id'], 2) : $this->config->get($this->code .'_height');
            $length = ($product['length'] > 0) ? $this->length->convert($product['length'], $product['length_class_id'], 2) : $this->config->get($this->code .'_length');
            $weight = ($product['weight'] > 0) ? $this->weight->convert($product['weight'], $product['weight_class_id'], 2) : $this->config->get($this->code .'_weight');

            $product['price'] = (int)$product['price'];
            $product['quantity'] = (int)$product['quantity'];
            $price_q = $product['quantity'] * $product['price'];
            $totalPrice += $price_q;

            $item->setWidth(floatval($width)) // mm
            ->setHeight(floatval($height)) // mm
            ->setLength(floatval($length)) // mm
            ->setCost(new \Ipol\Ozon\Core\Entity\Money(($this->config->get($this->code .' _insurance') ? $product['price'] : 0))) //estimated price for insurance
            ->setPrice(new \Ipol\Ozon\Core\Entity\Money($product['price'])) //estimated price for insurance
            ->setQuantity($product['quantity'])
                ->setWeight($weight); //gram

            $cargoBox->add($item);
        }

        // Сделать для всех ваших товаров в порядке
        $cargoList->add($cargoBox); // CargoList технически является сборным, но пока мы не разделяем один заказ на несколько грузов

        $shipment->setCargoes($cargoList);

        # Cache params
        $params = array();
        $params['locationName'] = $locationName;
        $params['totalPrice'] = $totalPrice;
        $params['weight'] = $mainWeight;
        $params['length'] = $dimansions['length'];
        $params['width'] = $dimansions['width'];
        $params['height'] = $dimansions['height'];
        $params['warehouse_id'] = $this->config->get($this->code .'_warehouse_id');

        $cacheShort = 'ozon.shipping.deliveryVariantsForShipmentShort.' . md5(implode('', $params));

        if (!$deliveryVariants = $this->cache->get($cacheShort)) {
            $ans = $app->deliveryVariantsForShipmentShort($shipment, 25);

            if ($ans->isSuccess() == false) {
                $status = false;
                $this->log->write('СписокДоставок: ' . $ans->getResponse()->getMessage());
                return $method_data;
            } else {
                $deliveryVariants = $ans->getResponse()->getFields();
                $this->cache->set($cacheShort, $deliveryVariants);
            }
        }

        if (isset($deliveryVariants['deliveryVariantIds'][0])) {
            $i = 0;
            $k = 0;
            $j = 0;

            $items = array();

            $deliveryInfoList = $this->model_extension_shipping_ozon->getDeliveryVariantsPostamat($deliveryVariants['deliveryVariantIds'], $cityTo, $zoneCode, $mainWeight, $totalPrice, $dimansions);

            foreach ($deliveryInfoList as $deliveryInfo) {
                if (!empty($deliveryInfo)) {
                    $items[$i] = $deliveryInfo;
                    $i++;
                }
            }
        }

        if ($items) {
            $json['type'] = 'FeatureCollection';

            $position = $items[0];

            $json['position'] = array();

            $json['position']['location'] = array($position['lat'], $position['long']);

            $json['features'] = array();

            foreach ($items as $item) {
                $workingHours = array();
                $workingHoursHtml = '';

                $days = [
                    'Вс', 'Пн', 'Вт', 'Ср',
                    'Чт', 'Пт', 'Сб'
                ];

                $countDays = 0;


                if (!empty($item['workingHours'])) {
                    $item['workingHours'] = unserialize($item['workingHours']);

                    if (empty($item['workingHours'])) {
                        $item['workingHours'] = array();
                    }

                    foreach ($item['workingHours'] as $key => $row) {
                        if ($key == 0 or $countDays > 7) {
                            continue;
                        }

                        $countDays++;

                        $period = $row['periods'][0]['min']['hours'] . ':00' . ' - ' . $row['periods'][0]['max']['hours'] . ':00';

                        if ($days[date("w", strtotime($row['date']))] == 'Пн') {
                            $workingHours[0]['day'] = $days[date("w", strtotime($row['date']))] . ".:" . $period;
                        } elseif ($days[date("w", strtotime($row['date']))] == 'Вт') {
                            $workingHours[1]['day'] = $days[date("w", strtotime($row['date']))] . ".:" . $period;
                        } elseif ($days[date("w", strtotime($row['date']))] == 'Ср') {
                            $workingHours[2]['day'] = $days[date("w", strtotime($row['date']))] . ".:" . $period;
                        } elseif ($days[date("w", strtotime($row['date']))] == 'Чт') {
                            $workingHours[3]['day'] = $days[date("w", strtotime($row['date']))] . ".:" . $period;
                        } elseif ($days[date("w", strtotime($row['date']))] == 'Пт') {
                            $workingHours[4]['day'] = $days[date("w", strtotime($row['date']))] . ".:" . $period;
                        } elseif ($days[date("w", strtotime($row['date']))] == 'Сб') {
                            $workingHours[5]['day'] = $days[date("w", strtotime($row['date']))] . ".:" . $period;
                        } elseif ($days[date("w", strtotime($row['date']))] == 'Вс') {
                            $workingHours[6]['day'] = $days[date("w", strtotime($row['date']))] . ".:" . $period;
                        }
                    }

                    ksort($workingHours);
                }

                $json['features'][] = array(
                    'type' => 'Feature',
                    'id' => $item['deliveryId'],
                    'geometry' => array('type' => 'Point', 'coordinates' => array($item['lat'], $item['long'])),
                    'properties' => array(
                        'address' => $item['address'],
                        'workingHours' => $workingHours,
                        'description' => $item['description'],
                        'howToGet' => $item['howToGet'],
                        'id' => $item['deliveryId'],
                    ),
                    'options' => array(
                        'iconLayout' => 'default#imageWithContent',
                        'iconImageHref' => '../../../../image/catalog/ozon/postamat_chosen.svg',
                        'iconImageSize' => array(30, 40),
                        'iconImageOffset' => array(-5, -38)
                    )
                );
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }


    public function save()
    {
        $this->load->model('extension/shipping/ozon');

        $json = array();

        if (isset($this->request->post['address'])) {
            $this->session->data['ozon']['p']['address'] = $this->request->post['address'];
        }

        # Сохраняем id пункта
        if (isset($this->request->post['id'])) {
            $app = $this->model_extension_shipping_ozon->getApp();

            if ($this->request->post['type'] == 'terminal') {
                $this->session->data['ozon']['pvz']['deliveryId'] = $this->request->post['id'];
                $this->session->data['ozon']['pvz']['yes'] = true;
            } elseif ($this->request->post['type'] == 'postomat') {
                $this->session->data['ozon']['postamat']['deliveryId'] = $this->request->post['id'];
                $this->session->data['ozon']['postamat']['yes'] = true;
            }

            # Общий вес в гр.
            $mainWeight = $this->cart->getWeight() ? $this->weight->convert($this->cart->getWeight(), $this->config->get('config_weight_class_id'), 2) : $this->weight->convert($this->config->get($this->code .' _weight'), 2, 2);

            # Город получателя
            if (isset($this->session->data['shipping_address']['city'])) {
                $cityTo = $this->session->data['shipping_address']['city'];
                $countryTo = $this->session->data['shipping_address']['country'];
                $zoneTo = $this->session->data['shipping_address']['zone'];
                $zoneCode = $this->session->data['shipping_address']['zone_code'];
            } elseif (isset($this->session->data['payment_address']['city'])) {
                $cityTo = $this->session->data['payment_address']['city'];
                $countryTo = $this->session->data['payment_address']['country'];
                $zoneTo = $this->session->data['payment_address']['zone'];
                $zoneCode = $this->session->data['payment_address']['zone_code'];
            }

            if (isset($countryTo) && isset($cityTo) && isset($zoneTo)) {
                $locationName = $countryTo . ', ' . $zoneTo . ', ' . $cityTo;
            } elseif (isset($countryTo) && isset($cityTo)) {
                $locationName = $countryTo . ', ' . $cityTo;
            }

            # Shipment
            $shipment = new \Ipol\Ozon\Core\Delivery\Shipment();

            $location = new \Ipol\Ozon\Core\Delivery\Location('cms');
            $location->setName($locationName);

            $shipment->setTo($location)
                ->setTariff(array('Courier', 'Postamat', 'PickPoint'));

            $cargoList = new \Ipol\Ozon\Core\Delivery\CargoCollection();

            $cargoBox = new \Ipol\Ozon\Core\Delivery\Cargo();

            foreach ($this->cart->getProducts() as $product) { //loop for processing multiple goods in order, obviously, there must be CMS basketItem collection in place of [1]
                $item = new \Ipol\Ozon\Core\Delivery\CargoItem();

                $width = ($product['width'] > 0) ? $this->length->convert($product['width'], $product['length_class_id'], 2) : $this->config->get($this->code .' _width');
                $height = ($product['height'] > 0) ? $this->length->convert($product['height'], $product['length_class_id'], 2) : $this->config->get($this->code .' _height');
                $length = ($product['length'] > 0) ? $this->length->convert($product['length'], $product['length_class_id'], 2) : $this->config->get($this->code .' _length');
                $weight = ($product['weight'] > 0) ? $this->weight->convert($product['weight'], $product['weight_class_id'], 2) : $this->config->get($this->code .' _weight');

                $product['price'] = (int)$product['price'];
                $product['quantity'] = (int)$product['quantity'];

                $item->setWidth(floatval($width)) // mm
                ->setHeight(floatval($height)) // mm
                ->setLength(floatval($length)) // mm
                ->setCost(new \Ipol\Ozon\Core\Entity\Money(($this->config->get($this->code .' _insurance') ? $product['price'] : 0))) //estimated price for insurance
                ->setPrice(new \Ipol\Ozon\Core\Entity\Money($product['price'])) //estimated price for insurance
                ->setQuantity($product['quantity'])
                    ->setWeight($weight); //gram

                $cargoBox->add($item);
            }

            $cargoList->add($cargoBox);

            $shipment->setCargoes($cargoList);

            # Cache params
            $params = array();
            $params['deliveryId'] = $this->request->post['id'];

            $cache = 'ozon.shipping.calculate' . $this->request->post['typeTitle'] . '.' . md5(implode('', $params));

            # Калькуляция
            if (!$amount = $this->cache->get($cache)) {
                $calculate = $app->deliveryCalculateForShipment($this->request->post['id'], $shipment, $this->config->get($this->code .'_warehouse_id'));

                if ($calculate->getResponse()->getSuccess() == false) {
                    $this->log->write($calculate);
                } else {
                    $amount = $calculate->getResponse()->getAmount();
                    $this->cache->set($cache, $amount);
                }
            }

            # Наценка
            if (($this->config->get($this->code .' _markup_type_' . $this->request->post['type']) == 1) && ($this->config->get($this->code .' _markup_' . $this->request->post['type']) > 0)) {
                $percent = $amount * $this->config->get($this->code .' _markup_' . $this->request->post['type']) / 100;
                $amount = $percent + $amount;
            } elseif (($this->config->get($this->code .' _markup_type_' . $this->request->post['type']) == 0) && ($this->config->get($this->code .' _markup_' . $this->request->post['type']) > 0)) {
                $amount = $this->config->get($this->code .' _markup_' . $this->request->post['type']) + $amount;
            }

            $json['price'] = $this->currency->format($this->tax->calculate($amount, 0, $this->config->get('config_tax')), $this->session->data['currency']);

        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    # Получение статусов
    public function getStatus()
    {

        if ($this->config->get($this->code .' _track_status')) {
            $this->load->model('extension/shipping/ozon');

            $app = $this->model_extension_shipping_ozon->getApp();

            $postingIds = array();

            $orders = $this->model_extension_shipping_ozon->getOrders();

            foreach ($orders as $key => $row) {
                $postingIds[$key] = $row['posting_id'];
            }

            $checkStatuses = $app->trackingList($postingIds);

            $this->log->write($checkStatuses->getResponse()->getItems()->getFields());

            if ($checkStatuses->isSuccess() == false) {
                echo $checkStatuses->getResponse()->getMessage() . '<br/>';

                if ($checkStatuses->getResponse()->getArguments()) {
                    foreach ($checkStatuses->getResponse()->getArguments() as $row) {
                        echo $row[0] . '<br/>';
                    }
                }
                die();
            } else {
                foreach ($checkStatuses->getResponse()->getItems()->getFields() as $row) {
                    $posting_id = $row['postingBarcode'];

                    $keyLast = array_pop(array_keys($row['events']));

                    $ozon['ozonStatus'] = $row['events'][$keyLast]['action'];
                    $ozon['ozonStatusId'] = $row['events'][$keyLast]['eventId'];

                    $this->model_extension_shipping_ozon->updateStatusPI($ozon, $posting_id);

                    if ($this->config->get($this->code .' _status_numb_' . $ozon['ozonStatusId'])) {
                        $order_id = $this->model_extension_shipping_ozon->getOrderPI($posting_id);

                        if ($order_id > 0) {
                            $this->model_extension_shipping_ozon->updateStatusMainOrder($this->config->get($this->code .' _status_numb_' . $ozon['ozonStatusId']), $order_id);
                        }
                    }
                }

                echo 'Синхронизация статусов завершена!';
            }
        } else {
            return false;
        }
    }
}
