<?php
# Разработчик: Кузнецов Богдан
# ipol.ru
# ozon - служба доставки

class ModelExtensionShippingOzon extends Model
{
    private $code;

    public function __construct($registry)
    {
        parent::__construct($registry);
        if (VERSION >= '3.0.0.0') {
            $this->code = 'shipping_ozon';
        } elseif (VERSION >= '2.3.0.0') {
            $this->code = 'ozon';
        }
    }

    # Получение цены доставки
    public function getPriceShipping($order_id)
    {
        $query = $this->db->query("SELECT value FROM `" . DB_PREFIX . "order_total` WHERE code = 'shipping' AND order_id = '" . (int)$order_id . "'");

        return $query->row['value'];
    }

    # Получить вариант
    public function getCashForbidden()
    {
        if ($this->session->data['shipping_method']['code'] == 'ozon.ozoncourier') {
            $deliveryId = $this->session->data['ozon']['courier']['deliveryId'];
        } elseif ($this->session->data['shipping_method']['code'] == 'ozon.ozonterminal') {
            $deliveryId = $this->session->data['ozon']['pvz']['deliveryId'];
        } elseif ($this->session->data['shipping_method']['code'] == 'ozon.ozonpostomat') {
            $deliveryId = $this->session->data['ozon']['postamat']['deliveryId'];
        }

        $query = $this->db->query("SELECT isCashForbidden FROM ipol_ozon_delivery_variants WHERE deliveryId = '" . $this->db->escape($deliveryId) . "'");

        return $query->row['isCashForbidden'];
    }

    # Сохранить заказ ozon
    public function saveOrder($order_info)
    {
        if ($this->session->data['shipping_method']['code'] == 'ozon.ozoncourier') {
            $ozon['deliveryVariantId'] = $this->session->data['ozon']['courier']['deliveryId'];
            $ozon['deliveryAddress'] = !empty($order_info['shipping_address_1']) ? $this->session->data['ozon']['c']['address'] . ', ' . $order_info['shipping_address_1'] : $this->session->data['ozon']['c']['address'] . ', ' . $order_info['payment_address_1'];
        } elseif ($this->session->data['shipping_method']['code'] == 'ozon.ozonterminal') {
            $ozon['deliveryVariantId'] = $this->session->data['ozon']['pvz']['deliveryId'];

            if (isset($this->session->data['ozon']['p']['address'])) {
                $ozon['deliveryAddress'] = $this->session->data['ozon']['p']['address'];
            } else {
                $ozon['deliveryAddress'] = '';
            }
        } elseif ($this->session->data['shipping_method']['code'] == 'ozon.ozonpostomat') {
            $ozon['deliveryVariantId'] = $this->session->data['ozon']['postamat']['deliveryId'];

            if (isset($this->session->data['ozon']['p']['address'])) {
                $ozon['deliveryAddress'] = $this->session->data['ozon']['p']['address'];
            } else {
                $ozon['deliveryAddress'] = '';
            }
        }

        $ozon['allowUncovering'] = false;

        if ($this->config->get($this->code . '_uncovering')) {
            $ozon['allowUncovering'] = true;
        }

        $ozon['allowPartialDelivery'] = false;

        if ($this->config->get($this->code . '_partial_delivery')) {
            $ozon['allowPartialDelivery'] = true;
        }

        $ozon['buyerName'] = '';

        if (!empty($order_info['firstname']) && !empty($order_info['lastname'])) {
            $ozon['buyerName'] = $order_info['firstname'] . ' ' . $order_info['lastname'];
        } else {
            $ozon['buyerName'] = $order_info['firstname'];
        }

        $ozon['buyerPhone'] = '';

        if (!empty($order_info['telephone'])) {
            $ozon['buyerPhone'] = $order_info['telephone'];
        }

        $ozon['buyerEmail'] = '';

        if (!empty($order_info['email'])) {
            $ozon['buyerEmail'] = $order_info['email'];
        }

        $ozon['buyerType'] = 'NaturalPerson';

        if ($this->config->get($this->code . '_face_type_' . $order_info['customer_group_id'])) {
            $ozon['buyerType'] = 'LegalPerson';
        }

        $ozon['buyerLegalName'] = '';

        if (!empty($order_info['company'])) {
            $ozon['buyerLegalName'] = $order_info['company'];
        }

        $ozon['recipientName'] = '';

        if (!empty($order_info['firstname']) && !empty($order_info['lastname'])) {
            $ozon['recipientName'] = $order_info['firstname'] . ' ' . $order_info['lastname'];
        } else {
            $ozon['recipientName'] = $order_info['firstname'];
        }

        $ozon['recipientPhone'] = '';

        if (!empty($order_info['telephone'])) {
            $ozon['recipientPhone'] = $order_info['telephone'];
        }

        $ozon['recipientEmail'] = '';

        if (!empty($order_info['email'])) {
            $ozon['recipientEmail'] = $order_info['email'];
        }

        $ozon['recipientType'] = 'NaturalPerson';

        if (!empty($this->config->get($this->code . '_type'))) {
            $ozon['recipientType'] = 'LegalPerson';
        }

        $ozon['recipientLegalName'] = '';

        if (!empty($this->config->get($this->code . '_company'))) {
            $ozon['recipientLegalName'] = $this->config->get($this->code . '_company');
        } elseif (!empty($this->config->get('config_name'))) {
            $ozon['recipientLegalName'] = $this->config->get('config_name');
        }

        $ozon['firstMileTransferFromPlaceId'] = $this->config->get($this->code . '_warehouse_id');

        $ozon['paymentRecipientPaymentAmount'] = 0;

        $order_products_ozon = $this->getOrderProducts($order_info['order_id']);

        foreach ($order_products_ozon as $product_ozon) {
            $ozon['paymentRecipientPaymentAmount'] += (int)$product_ozon['price'] * (int)$product_ozon['quantity'];
            $ozon['paymentRecipientPaymentAmount'] += (int)$product_ozon['tax'];
        }

        $ozon['paymentDeliveryPrice'] = $this->getPriceShipping($order_info['order_id']);

        $ozon['paymentType'] = 'FullPrepayment';
        $ozon['paymentPrepaymentAmount'] = $ozon['paymentRecipientPaymentAmount'] + $ozon['paymentDeliveryPrice'];

        if (!empty($this->config->get($this->code . '_bind_payment_' . $order_info['customer_group_id']))) {
            $keyPayment = array_search($order_info['payment_code'], $this->config->get($this->code . '_bind_payment_' . $order_info['customer_group_id']));

            if ($keyPayment !== false) {
                $ozon['paymentType'] = 'Postpay';
                $ozon['paymentPrepaymentAmount'] = 0;
            }
        }

        $ozon['estimated'] = 0;

        if ($this->config->get($this->code . '_insurance')) {
            $ozon['estimated'] += $ozon['paymentRecipientPaymentAmount'];
        }

        $ozon['items'] = array();

        $widthOzon = 0;
        $lengthOzon = 0;
        $heightOzon = 0;

        foreach ($this->cart->getProducts() as $key => $product) {
            $ozon['items'][$key]['product_id'] = $product['product_id'];
            $ozon['items'][$key]['name'] = $product['name'];
            $ozon['items'][$key]['model'] = $product['model'];

            $ozon['items'][$key]['quantity'] = (int)$product['quantity'];

            $ozon['items'][$key]['price'] = (int)$order_products_ozon[$key]['tax'] + (int)$order_products_ozon[$key]['price'];

            $ozon['items'][$key]['estimated'] = 0;

            if ($this->config->get($this->code . '_insurance')) {
                $ozon['items'][$key]['estimated'] = (int)$order_products_ozon[$key]['tax'] + (int)$order_products_ozon[$key]['price'];
            }

            $ozon['items'][$key]['tax'] = (int)$order_products_ozon[$key]['tax'];
            $ozon['items'][$key]['nds'] = ($ozon['items'][$key]['tax'] * 100) / (int)$order_products_ozon[$key]['price'];

            $ozon['items'][$key]['IsDangerous'] = 0;

            $ozon['items'][$key]['width'] = ($product['width'] > 0) ? $this->length->convert($product['width'], $product['length_class_id'], 2) : $this->config->get($this->code . '_width');
            $ozon['items'][$key]['height'] = ($product['height'] > 0) ? $this->length->convert($product['height'], $product['length_class_id'], 2) : $this->config->get($this->code . '_height');
            $ozon['items'][$key]['length'] = ($product['length'] > 0) ? $this->length->convert($product['length'], $product['length_class_id'], 2) : $this->config->get($this->code . '_length');
            $ozon['items'][$key]['weight'] = ($product['weight'] > 0) ? $this->weight->convert($product['weight'], $this->config->get('config_weight_class_id'), 2) : $this->config->get($this->code . '_weight');

            $widthOzon += $this->length->convert($product['width'], $product['length_class_id'], 2);
            $lengthOzon += $this->length->convert($product['length'], $product['length_class_id'], 2);
            $heightOzon += $this->length->convert($product['height'], $product['length_class_id'], 2);
        }

        $ozon['goods']['width'] = ($widthOzon > 0) ? $widthOzon : $this->config->get($this->code . '_width');
        $ozon['goods']['length'] = ($lengthOzon > 0) ? $lengthOzon : $this->config->get($this->code . '_length');
        $ozon['goods']['height'] = ($heightOzon > 0) ? $heightOzon : $this->config->get($this->code . '_height');
        $ozon['goods']['weight'] = $this->cart->getWeight() ? $this->weight->convert($this->cart->getWeight(), $this->config->get('config_weight_class_id'), 2) : $this->config->get($this->code . '_weight');

        $this->db->query("INSERT INTO `ipol_ozon_orders` SET 
		order_id = '" . (int)$order_info['order_id'] . "', 
		allowUncovering = '" . (int)$ozon['allowUncovering'] . "',
		allowPartialDelivery = '" . (int)$ozon['allowPartialDelivery'] . "', 
		buyerName = '" . $this->db->escape($ozon['buyerName']) . "', 
		buyerPhone = '" . $this->db->escape($ozon['buyerPhone']) . "',
		buyerEmail = '" . $this->db->escape($ozon['buyerEmail']) . "', 
		buyerType = '" . $this->db->escape($ozon['buyerType']) . "', 
		buyerLegalName = '" . $this->db->escape($ozon['buyerLegalName']) . "',
		recipientName = '" . $this->db->escape($ozon['recipientName']) . "', 
		recipientPhone = '" . $this->db->escape($ozon['recipientPhone']) . "', 
		recipientEmail = '" . $this->db->escape($ozon['recipientEmail']) . "',
		recipientType = '" . $this->db->escape($ozon['recipientType']) . "', 
		recipientLegalName = '" . $this->db->escape($ozon['recipientLegalName']) . "',
		firstMileTransferFromPlaceId = '" . $this->db->escape($ozon['firstMileTransferFromPlaceId']) . "', 
		paymentType = '" . $this->db->escape($ozon['paymentType']) . "', 
		paymentPrepaymentAmount = '" . (double)$ozon['paymentPrepaymentAmount'] . "', 
		paymentRecipientPaymentAmount = '" . (double)$ozon['paymentRecipientPaymentAmount'] . "',
		paymentDeliveryPrice = '" . (double)$ozon['paymentDeliveryPrice'] . "', 
		estimated = '" . (double)$ozon['estimated'] . "', 
		deliveryVariantId = '" . $this->db->escape($ozon['deliveryVariantId']) . "',
		deliveryAddress = '" . $this->db->escape($ozon['deliveryAddress']) . "', 
		goods = '" . serialize($ozon['goods']) . "', 
		items = '" . serialize($ozon['items']) . "', 
		ok = 'N', uptime = '" . time() . "'
		");
    }

    # Получение группы покупаля
    public function selectCustomerGroup($customer_id)
    {
        $sql = "SELECT customer_group_id FROM " . DB_PREFIX . "customer WHERE customer_id = '" . (int)$customer_id . "'";
        $query = $this->db->query($sql);

        return $query->row['customer_group_id'];
    }

    # Подключение Application
    public function getApp()
    {

        require DIR_SYSTEM . 'library/lib/autoload.php';

        $app = new Ipol\Ozon\Ozon\OzonApplication(
            $this->config->get($this->code . '_client_id') ? $this->config->get($this->code . '_client_id') : 'TestIpol_19eec072-e561-48e1-96bf-35440dc93616', //client_id
            $this->config->get($this->code . '_client_secret') ? $this->config->get($this->code . '_client_secret') : 'dEZOJUb97kKGG0LwkInjO/ac8v/K8o+ve5II7/wSzx4=', //client_secret
            $this->config->get($this->code . '_test') ? true : false, //true – for test api, false, for production
            60, //timeout for curl (sec)
            null, //implement of Ipol\Ozon\Api\Entity\EncoderInterface – used if site can work not in UTF-8
            null, // implement of  Ipol\Ozon\Core\Entity \CacheInterface – cache or die :[
            null//new Ipol\Ozon\Admin\ToFileLoggerController() // implement of  Ipol\Ozon\Api\Entity\LoggerInterface – used for logging
        );

        return $app;
    }

    # Получение габаритов
    public function getDimensions()
    {
        $dimensions = array();

        $length = 0;
        $width = 0;
        $height = 0;

        foreach ($this->cart->getProducts() as $product) {
            $width += $this->length->convert($product['width'], $product['length_class_id'], 2);
            $length += $this->length->convert($product['length'], $product['length_class_id'], 2);
            $height += $this->length->convert($product['height'], $product['length_class_id'], 2);
        }

        $dimensions['width'] = ($width > 0) ? $width : $this->config->get($this->code . '_width');
        $dimensions['length'] = ($length > 0) ? $length : $this->config->get($this->code . '_length');
        $dimensions['height'] = ($height > 0) ? $height : $this->config->get($this->code . '_height');

        return $dimensions;
    }

    # Варианты доставки
    public function getDeliveryVariants($deliveryIds, $cityTo, $zoneCode, $mainWeight, $totalPrice, $dimansions)
    {
        $implodeDeliveryIds = implode(",", $deliveryIds);

        $query = $this->db->query("SELECT * FROM ipol_ozon_delivery_variants WHERE deliveryId IN (" . $this->db->escape($implodeDeliveryIds) . ") AND maxWeight >=  '" . (int)$mainWeight . "' AND (maxPrice >= '" . (int)$totalPrice . "' OR maxPrice = '0') AND (code = '" . $this->db->escape($zoneCode) . "' OR code = '') AND (restrictionWidth >= '" . (int)$dimansions['width'] . "' OR restrictionWidth = '0') AND (restrictionLength >= '" . (int)$dimansions['length'] . "' OR restrictionLength = '0') AND (restrictionHeight >= '" . (int)$dimansions['height'] . "' OR restrictionHeight = '0')");

        $deliveryVariants = array();

        if ($query->num_rows) {
            foreach ($query->rows as $deliveryInfo) {
                $deliveryVariants[] = array(
                    'deliveryId' => $deliveryInfo['deliveryId'],
                    'objectTypeId' => $deliveryInfo['objectTypeId'],
                    'address' => $deliveryInfo['address'],
                    'description' => $deliveryInfo['description'],
                    'howToGet' => $deliveryInfo['howToGet'],
                    'phone' => $deliveryInfo['phone'],
                    'lat' => $deliveryInfo['lat'],
                    'long' => $deliveryInfo['long']
                );
            }
        }

        return $deliveryVariants;
    }

    # Варианты доставки
    public function getDeliveryVariant($deliveryId, $cityTo, $zoneCode, $mainWeight, $totalPrice, $dimansions)
    {
        $query = $this->db->query("SELECT * FROM ipol_ozon_delivery_variants WHERE deliveryId = '" . $this->db->escape($deliveryId) . "' AND maxWeight >=  '" . (int)$mainWeight . "' AND (maxPrice >= '" . (int)$totalPrice . "' OR maxPrice = '0') AND (code = '" . $this->db->escape($zoneCode) . "' OR code = '') AND (restrictionWidth >= '" . (int)$dimansions['width'] . "' OR restrictionWidth = '0') AND (restrictionLength >= '" . (int)$dimansions['length'] . "' OR restrictionLength = '0') AND (restrictionHeight >= '" . (int)$dimansions['height'] . "' OR restrictionHeight = '0')");

        $deliveryVariant = array();

        if ($query->num_rows) {
            $deliveryVariant = array(
                'deliveryId' => $query->row['deliveryId'],
                'objectTypeId' => $query->row['objectTypeId'],
                'address' => $query->row['address'],
                'description' => $query->row['description'],
                'howToGet' => $query->row['howToGet'],
                'phone' => $query->row['phone'],
                'lat' => $query->row['lat'],
                'long' => $query->row['long']
            );
        }

        return $deliveryVariant;
    }

    # Варианты доставки ПВЗ
    public function getDeliveryVariantsPvz($deliveryIds, $cityTo, $zoneCode, $mainWeight, $totalPrice, $dimansions, $objectTypeId = 52895552000)
    {
        $implodeDeliveryIds = implode(",", $deliveryIds);

        $query = $this->db->query("SELECT * FROM ipol_ozon_delivery_variants WHERE deliveryId IN (" . $this->db->escape($implodeDeliveryIds) . ") AND objectTypeId = '" . $this->db->escape($objectTypeId) . "' AND maxWeight >=  '" . (int)$mainWeight . "' AND (maxPrice >= '" . (int)$totalPrice . "' OR maxPrice = '0') AND (code = '" . $this->db->escape($zoneCode) . "' OR code = '') AND (restrictionWidth >= '" . (int)$dimansions['width'] . "' OR restrictionWidth = '0') AND (restrictionLength >= '" . (int)$dimansions['length'] . "' OR restrictionLength = '0') AND (restrictionHeight >= '" . (int)$dimansions['height'] . "' OR restrictionHeight = '0')");

        $deliveryVariants = array();

        if ($query->num_rows) {
            foreach ($query->rows as $deliveryInfo) {
                $deliveryVariants[] = array(
                    'deliveryId' => $deliveryInfo['deliveryId'],
                    'objectTypeId' => $deliveryInfo['objectTypeId'],
                    'address' => $deliveryInfo['address'],
                    'description' => $deliveryInfo['description'],
                    'howToGet' => $deliveryInfo['howToGet'],
                    'phone' => $deliveryInfo['phone'],
                    'lat' => $deliveryInfo['lat'],
                    'long' => $deliveryInfo['long'],
                    'workingHours' => $deliveryInfo['workingHours'],
                );
            }
        }

        return $deliveryVariants;
    }

    # Варианты доставки ПВЗ
    public function getDeliveryVariantsPostamat($deliveryIds, $cityTo, $zoneCode, $mainWeight, $totalPrice, $dimansions, $objectTypeId = 4635044131000)
    {
        $implodeDeliveryIds = implode(",", $deliveryIds);

        $query = $this->db->query("SELECT * FROM ipol_ozon_delivery_variants WHERE deliveryId IN (" . $this->db->escape($implodeDeliveryIds) . ") AND objectTypeId = '" . $this->db->escape($objectTypeId) . "' AND maxWeight >=  '" . (int)$mainWeight . "' AND (maxPrice >= '" . (int)$totalPrice . "' OR maxPrice = '0') AND (code = '" . $this->db->escape($zoneCode) . "' OR code = '') AND (restrictionWidth >= '" . (int)$dimansions['width'] . "' OR restrictionWidth = '0') AND (restrictionLength >= '" . (int)$dimansions['length'] . "' OR restrictionLength = '0') AND (restrictionHeight >= '" . (int)$dimansions['height'] . "' OR restrictionHeight = '0')");

        $deliveryVariants = array();

        if ($query->num_rows) {
            foreach ($query->rows as $deliveryInfo) {
                $deliveryVariants[] = array(
                    'deliveryId' => $deliveryInfo['deliveryId'],
                    'objectTypeId' => $deliveryInfo['objectTypeId'],
                    'address' => $deliveryInfo['address'],
                    'description' => $deliveryInfo['description'],
                    'howToGet' => $deliveryInfo['howToGet'],
                    'phone' => $deliveryInfo['phone'],
                    'lat' => $deliveryInfo['lat'],
                    'long' => $deliveryInfo['long'],
                    'workingHours' => $deliveryInfo['workingHours'],
                );
            }
        }

        return $deliveryVariants;
    }

    # Доставка
    function getQuote($address)
    {
        $this->load->language('extension/shipping/ozon');
        $this->load->model('tool/image');

        $method_data = array();

        # Основной статус модуля
        if ($this->config->get($this->code . '_status')) {
            $status = true;
        } else {
            $status = false;
        }

        # Группа пользователя
        if (isset($this->session->data['guest'])) {
            $customer_group_id = $this->session->data['guest']['customer_group_id'];
        } elseif (isset($this->session->data['customer_id'])) {
            $customer_group_id = $this->selectCustomerGroup($this->session->data['customer_id']);
        } else {
            $customer_group_id = $this->config->get('config_customer_group_id');
        }

        # Application load
        $app = $this->getApp();

        if ($app->getErrorCollection()) {
            $error = $app->getErrorCollection()->getFirst();
            if (!empty($error)) {
                $this->log->write($error->getMessage());
                return $method_data;
            }
        }

        # Общий вес в гр.
        $mainWeight = $this->cart->getWeight() ? $this->weight->convert($this->cart->getWeight(), $this->config->get('config_weight_class_id'), 2) : $this->config->get($this->code . '_weight');

        # Итоговая цена
        $totalPrice = 0;

        # Габариты
        $dimansions = $this->getDimensions();

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

        # Статусы типов доставки
        $status_courier = false;
        $status_pvz = false;
        $status_postomat = false;

        $shipment = new \Ipol\Ozon\Core\Delivery\Shipment();

        $location = new \Ipol\Ozon\Core\Delivery\Location('cms');
        $location->setName($locationName);

        $shipment->setTo($location)
            ->setTariff(array('Courier', 'Postamat', 'PickPoint'));

        $cargoList = new \Ipol\Ozon\Core\Delivery\CargoCollection();

        $cargoBox = new \Ipol\Ozon\Core\Delivery\Cargo();

        foreach ($this->cart->getProducts() as $product) { //loop for processing multiple goods in order, obviously, there must be CMS basketItem collection in place of [1]
            $item = new \Ipol\Ozon\Core\Delivery\CargoItem();

            $width = ($product['width'] > 0) ? $this->length->convert($product['width'], $product['length_class_id'], 2) : $this->config->get($this->code . '_width');
            $height = ($product['height'] > 0) ? $this->length->convert($product['height'], $product['length_class_id'], 2) : $this->config->get($this->code . '_height');
            $length = ($product['length'] > 0) ? $this->length->convert($product['length'], $product['length_class_id'], 2) : $this->config->get($this->code . '_length');
            $weight = ($product['weight'] > 0) ? $this->weight->convert(($product['weight'] / $product['quantity']), $product['weight_class_id'], 2) : $this->config->get($this->code . '_weight');

            $product['price'] = (int)$product['price'];
            $product['quantity'] = (int)$product['quantity'];
            $price_q = $product['quantity'] * $product['price'];
            $totalPrice += $price_q;

            $item->setWidth(floatval($width)) // mm
            ->setHeight(floatval($height)) // mm
            ->setLength(floatval($length)) // mm
            ->setCost(new \Ipol\Ozon\Core\Entity\Money(($this->config->get($this->code . '_insurance') ? $product['price'] : 0))) //estimated price for insurance
            ->setPrice(new \Ipol\Ozon\Core\Entity\Money($product['price'])) //estimated price for insurance
            ->setQuantity($product['quantity'])
                ->setWeight($weight); //gram

            $cargoBox->add($item);
        }

        $cargoList->add($cargoBox);

        $shipment->setCargoes($cargoList);

        # Cache params
        $params = array();
        $params['locationName'] = $locationName;
        $params['totalPrice'] = $totalPrice;
        $params['weight'] = $mainWeight;
        $params['length'] = $dimansions['length'];
        $params['width'] = $dimansions['width'];
        $params['height'] = $dimansions['height'];
        $params['warehouse_id'] = $this->config->get($this->code . '_warehouse_id');

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

            $deliveryInfoPickPoint = array();
            $deliveryInfoPostamat = array();
            $deliveryInfoCourier = array();

            $deliveryInfoList = $this->getDeliveryVariants($deliveryVariants['deliveryVariantIds'], $cityTo, $zoneCode, $mainWeight, $totalPrice, $dimansions);

            foreach ($deliveryInfoList as $deliveryInfo) {
                if (!empty($deliveryInfo)) {
                    if ($deliveryInfo['objectTypeId'] == 52895552000) {
                        $deliveryInfoPickPoint[$i] = $deliveryInfo;
                        $i++;
                    } elseif ($deliveryInfo['objectTypeId'] == 4635044131000) {
                        $deliveryInfoPostamat[$k] = $deliveryInfo;
                        $k++;
                    } elseif ($deliveryInfo['objectTypeId'] == 52895497000) {
                        $deliveryInfoCourier[$j] = $deliveryInfo;
                        $j++;
                    }
                }
            }


            ### КУРЬЕР ###
            if (isset($deliveryInfoCourier[0])) {
                # Cache params
                $params['deliveryId'] = $deliveryInfoCourier[0]['deliveryId'];
                $this->session->data['ozon']['courier']['deliveryId'] = $params['deliveryId'];
                $this->session->data['ozon']['c']['address'] = $deliveryInfoCourier[0]['address'];

                $cache = 'ozon.shipping.calculateDoor.' . md5(implode('', $params));

                $status_courier = true;

                # Калькуляция курьера
                if (!$amount_courier = $this->cache->get($cache)) {
                    $calculateCourier = $app->deliveryCalculateForShipment($deliveryInfoCourier[0]['deliveryId'], $shipment, $this->config->get($this->code . '_warehouse_id'));

                    if ($calculateCourier->isSuccess() == false) {
                        $status_courier = false;
                        $this->log->write('КурьерКалькулятор: ' . $calculateCourier->getResponse()->getMessage());
                    } else {
                        $amount_courier = $calculateCourier->getResponse()->getAmount();
                        $this->cache->set($cache, $amount_courier);
                    }
                }

                $cacheDays = 'ozon.shipping.calculateDoorDays.' . md5(implode('', $params));

                if (!$days_door = $this->cache->get($cacheDays)) {
                    $calculateDoorDay = $app->deliveryTime($this->config->get($this->code . '_warehouse_id'), $deliveryInfoCourier[0]['deliveryId']);

                    if ($calculateDoorDay->isSuccess() == false) {
                        $this->log->write('КурьерКалькуляторДни: ' . $calculateDoorDay->getResponse()->getMessage());
                    } else {
                        $days_door = $calculateDoorDay->getResponse()->getDays();
                        $this->cache->set($cacheDays, $days_door);
                    }
                }
            }

            ### ПВЗ ###
            if (isset($deliveryInfoPickPoint[0])) {
                # Cache params
                $params['deliveryId'] = $deliveryInfoPickPoint[0]['deliveryId'];
                $this->session->data['ozon']['pvz']['deliveryId'] = $params['deliveryId'];

                $cache = 'ozon.shipping.calculateTerminal.' . md5(implode('', $params));

                $status_pvz = true;

                # Калькуляция ПВЗ
                if (!$amount_pvz = $this->cache->get($cache)) {
                    $calculateTerminal = $app->deliveryCalculateForShipment($deliveryInfoPickPoint[0]['deliveryId'], $shipment, $this->config->get($this->code . '_warehouse_id'));

                    if ($calculateTerminal->isSuccess() == false) {
                        $status_pvz = false;
                        $this->log->write('ПВЗКалькулятор: ' . $calculateTerminal->getResponse()->getMessage());
                    } else {
                        $amount_pvz = $calculateTerminal->getResponse()->getAmount();
                        $this->cache->set($cache, $amount_pvz);
                    }
                }

                $cacheDays = 'ozon.shipping.calculateTerminalDays.' . md5(implode('', $params));

                if (!$days_terminal = $this->cache->get($cacheDays)) {
                    $calculateTerminalDay = $app->deliveryTime($this->config->get($this->code . '_warehouse_id'), $deliveryInfoPickPoint[0]['deliveryId']);

                    if ($calculateTerminalDay->isSuccess() == false) {
                        $this->log->write('ПВЗКалькуляторДни: ' . $calculateTerminalDay->getResponse()->getMessage());
                    } else {
                        $days_terminal = $calculateTerminalDay->getResponse()->getDays();
                        $this->cache->set($cacheDays, $days_terminal);
                    }
                }
            }

            ### Почтомат ###
            if (isset($deliveryInfoPostamat[0])) {
                # Cache params
                $params['deliveryId'] = $deliveryInfoPostamat[0]['deliveryId'];
                $this->session->data['ozon']['postamat']['deliveryId'] = $params['deliveryId'];

                $cache = 'ozon.shipping.calculatePostamat.' . md5(implode('', $params));

                $status_postomat = true;

                # Калькуляция Почтомат
                if (!$amount_postomat = $this->cache->get($cache)) {
                    $calculatePostamat = $app->deliveryCalculateForShipment($deliveryInfoPostamat[0]['deliveryId'], $shipment, $this->config->get($this->code . '_warehouse_id'));

                    if ($calculatePostamat->isSuccess() == false) {
                        $status_postomat = false;
                        $this->log->write('ПочтоматКалькулятор: ' . $calculatePostamat->getResponse()->getMessage());
                    } else {
                        $amount_postomat = $calculatePostamat->getResponse()->getAmount();
                        $this->cache->set($cache, $amount_postomat);
                    }
                }

                $cacheDays = 'ozon.shipping.calculatePostamatDays.' . md5(implode('', $params));

                if (!$days_postomat = $this->cache->get($cacheDays)) {
                    $calculatePostamatDay = $app->deliveryTime($this->config->get($this->code . '_warehouse_id'), $deliveryInfoPostamat[0]['deliveryId']);

                    if ($calculatePostamatDay->isSuccess() == false) {
                        $this->log->write('ПочтоматКалькуляторДни: ' . $calculatePostamatDay->getResponse()->getMessage());
                    } else {
                        $days_postomat = $calculatePostamatDay->getResponse()->getDays();
                        $this->cache->set($cacheDays, $days_postomat);
                    }
                }
            }
        }

        if ($status) {
            $quote_data = array();

            if ($this->config->get($this->code . '_door_status') && $status_courier) {

                # Наценка курьера
                if (($this->config->get($this->code . '_markup_type_door') == 1) && ($this->config->get($this->code . '_markup_door') > 0)) {
                    $percent = $amount_courier * $this->config->get($this->code . '_markup_door') / 100;
                    $amount_courier = $percent + $amount_courier;
                } elseif (($this->config->get($this->code . '_markup_type_door') == 0) && ($this->config->get($this->code . '_markup_door') > 0)) {
                    $amount_courier = $this->config->get($this->code . '_markup_door') + $amount_courier;
                }

                # Thumb
                $image_door_path = $this->config->get($this->code . '_image_door');

                if (isset($image_door_path) and $image_door_path && file_exists(DIR_IMAGE . $image_door_path)) {
                    $thumb_door = $this->model_tool_image->resize($image_door_path, 28, 28);
                } else {
                    $thumb_door = $this->model_tool_image->resize('catalog/ozon/courier.png', 40, 35);
                }

                # Image
                $image_door = '<img style="margin-top: -7px; padding: 2px;" src="' . $thumb_door . '" align="middle">';

                # Text
                if (isset($days_door)) {
                    $amount_door_text = $this->currency->format($this->tax->calculate($amount_courier, 0, $this->config->get('config_tax')), $this->session->data['currency']) . ', срок ' . $days_door . ' дн.';
                } else {
                    $amount_door_text = $this->currency->format($this->tax->calculate($amount_courier, 0, $this->config->get('config_tax')), $this->session->data['currency']);
                }

                $quote_data['ozon' . 'courier'] = array(
                    'code' => 'ozon.ozon' . 'courier',
                    'title' => $this->config->get($this->code . '_name_door'),
                    'img' => $image_door,
                    'image' => $thumb_door,
                    'ozon_description' => html_entity_decode($this->config->get($this->code . '_description_door'), ENT_QUOTES, 'UTF-8'),
                    'description' => html_entity_decode($this->config->get($this->code . '_description_door'), ENT_QUOTES, 'UTF-8'),
                    'pvz' => false,
                    'postomat' => false,
                    'cost' => $amount_courier,
                    'tax_class_id' => 0,
                    'text' => $amount_door_text
                );
            }

            if ($this->config->get($this->code . '_terminal_status') && $status_pvz) {

                # Наценка курьера
                if (($this->config->get($this->code . '_markup_type_terminal') == 1) && ($this->config->get($this->code . '_markup_terminal') > 0)) {
                    $percent = $amount_pvz * $this->config->get($this->code . '_markup_terminal') / 100;
                    $amount_pvz = $percent + $amount_pvz;
                } elseif (($this->config->get($this->code . '_markup_type_terminal') == 0) && ($this->config->get($this->code . '_markup_terminal') > 0)) {
                    $amount_pvz = $this->config->get($this->code . '_markup_terminal') + $amount_pvz;
                }

                # Thumb
                $image_door_path = $this->config->get($this->code . '_image_terminal');

                if (isset($image_door_path) and $image_door_path && file_exists(DIR_IMAGE . $image_door_path)) {
                    $thumb_terminal = $this->model_tool_image->resize($image_door_path, 28, 28);
                } else {
                    $thumb_terminal = $this->model_tool_image->resize('catalog/ozon/pickup.png', 40, 35);
                }

                # Image
                $image_terminal = '<img style="margin-top: -7px; padding: 2px;" src="' . $thumb_terminal . '" align="middle">';

                # Text
                if (isset($days_terminal)) {
                    $amount_terminal_text = $this->currency->format($this->tax->calculate($amount_pvz, 0, $this->config->get('config_tax')), $this->session->data['currency']) . ', срок ' . $days_terminal . ' дн.';
                } else {
                    $amount_terminal_text = $this->currency->format($this->tax->calculate($amount_pvz, 0, $this->config->get('config_tax')), $this->session->data['currency']);
                }

                $quote_data['ozon' . 'terminal'] = array(
                    'code' => 'ozon.ozon' . 'terminal',
                    'title' => $this->config->get($this->code . '_name_terminal'),
                    'img' => $image_terminal,
                    'image' => $thumb_terminal,
                    'ozon_description' => html_entity_decode($this->config->get($this->code . '_description_terminal'), ENT_QUOTES, 'UTF-8'),
                    'description' => html_entity_decode($this->config->get($this->code . '_description_terminal'), ENT_QUOTES, 'UTF-8'),
                    'pvz' => true,
                    'postomat' => false,
                    'cost' => $amount_pvz,
                    'tax_class_id' => 0,
                    'text' => $amount_terminal_text
                );
            }

            if ($this->config->get($this->code . '_postomat_status') && $status_postomat) {

                # Наценка курьера
                if (($this->config->get($this->code . '_markup_type_postomat') == 1) && ($this->config->get($this->code . '_markup_postomat') > 0)) {
                    $percent = $amount_postomat * $this->config->get($this->code . '_markup_postomat') / 100;
                    $amount_postomat = $percent + $amount_postomat;
                } elseif (($this->config->get($this->code . '_markup_type_postomat') == 0) && ($this->config->get($this->code . '_markup_postomat') > 0)) {
                    $amount_postomat = $this->config->get($this->code . '_markup_postomat') + $amount_postomat;
                }

                # Thumb
                $image_door_path = $this->config->get($this->code . '_image_postomat');

                if (isset($image_door_path) and $image_door_path && file_exists(DIR_IMAGE . $image_door_path)) {
                    $thumb_postomat = $this->model_tool_image->resize($image_door_path, 28, 28);
                } else {
                    $thumb_postomat = $this->model_tool_image->resize('catalog/ozon/postamat.png', 40, 35);
                }

                # Image
                $image_postomat = '<img style="margin-top: -7px; padding: 2px;" src="' . $thumb_postomat . '" align="middle">';

                # Text
                if (isset($days_postomat)) {
                    $amount_postomat_text = $this->currency->format($this->tax->calculate($amount_postomat, 0, $this->config->get('config_tax')), $this->session->data['currency']) . ', срок ' . $days_postomat . ' дн.';
                } else {
                    $amount_postomat_text = $this->currency->format($this->tax->calculate($amount_postomat, 0, $this->config->get('config_tax')), $this->session->data['currency']);
                }

                $quote_data['ozon' . 'postomat'] = array(
                    'code' => 'ozon.ozon' . 'postomat',
                    'title' => $this->config->get($this->code . '_name_postomat'),
                    'img' => $image_postomat,
                    'image' => $thumb_postomat,
                    'ozon_description' => html_entity_decode($this->config->get($this->code . '_description_postomat'), ENT_QUOTES, 'UTF-8'),
                    'description' => html_entity_decode($this->config->get($this->code . '_description_postomat'), ENT_QUOTES, 'UTF-8'),
                    'pvz' => false,
                    'postamat' => true,
                    'cost' => $amount_postomat,
                    'tax_class_id' => 0,
                    'text' => $amount_postomat_text
                );
            }

            if (!empty($quote_data)) {
                $method_data = array(
                    'code' => 'ozon',
                    'title' => 'Доставка OZON',
                    'quote' => $quote_data,
                    'sort_order' => $this->config->get($this->code . '_sort_order'),
                    'error' => false
                );
            }
        }

        return $method_data;
    }

    public function getOrders()
    {
        $query = $this->db->query("SELECT * FROM ipol_ozon_orders WHERE posting_id > 0 AND ozonStatusId <> 50 AND ozonStatusId <> 120");

        return $query->rows;
    }

    public function updateStatusPI($data, $posting_id)
    {
        $this->db->query("UPDATE ipol_ozon_orders SET ozonStatus = '" . $this->db->escape($data['ozonStatus']) . "', ozonStatusId = '" . (int)$data['ozonStatusId'] . "' WHERE posting_id = '" . (int)$posting_id . "'");
    }

    public function getOrderPI($posting_id)
    {
        $query = $this->db->query("SELECT order_id FROM ipol_ozon_orders WHERE posting_id = '" . (int)$posting_id . "'");

        if ($query->num_rows) {
            return $query->row['order_id'];
        } else {
            return 0;
        }
    }

    public function updateStatusMainOrder($order_status_id, $order_id)
    {
        $this->db->query("UPDATE " . DB_PREFIX . "order SET order_status_id = '" . (int)$order_status_id . "' WHERE order_id = '" . (int)$order_id . "'");
    }

    public function getOrderProducts($order_id)
    {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_product WHERE order_id = '" . (int)$order_id . "'");

        return $query->rows;
    }
}
