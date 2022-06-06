<?php
# Разработчик: Кузнецов Богдан
# ipol.ru
# ozon - служба доставки

class ModelExtensionShippingOzon extends Model
{
    public function getCurrencies()
    {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "currency ORDER BY title");

        return $query->rows;
    }

    public function getExtensions($type)
    {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "extension WHERE `type` = '" . $this->db->escape($type) . "'");

        return $query->rows;
    }

    public function getCountPlaced()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM ipol_ozon_placed");

        return $query->row['COUNT(*)'];
    }

    public function getPlaced($filter_name)
    {
        $query = $this->db->query("SELECT * FROM ipol_ozon_placed WHERE name LIKE '%" . $this->db->escape($filter_name) . "%'");

        return $query->rows;
    }

    public function getPlacedOrder($filter_name)
    {
        $query = $this->db->query("SELECT * FROM ipol_ozon_placed WHERE placedId LIKE '%" . $this->db->escape($filter_name) . "%'");

        return $query->rows;
    }

    public function getRegion($name, $city)
    {
        $code = '';

        if (!empty($name)) {
            $query = $this->db->query("SELECT code FROM " . DB_PREFIX . "zone WHERE name LIKE '%" . $this->db->escape($name) . "%'");

            if ($query->num_rows) {
                return $query->row['code'];
            } else {
                if ($name == 'Кемеровская область - Кузбасс' or $name == 'Кемеровская область - Кузбасс -') {
                    $code = 'KEM';
                } elseif ($name == 'Кабардино-Балкарская') {
                    $code = 'KB';
                } elseif ($name == 'Карачаево-Черкесская') {
                    $code = 'KC';
                } elseif ($name == 'Ханты-Мансийский Автономный округ - Югра' or $name == 'Ханты-Мансийский-Югра') {
                    $code = 'KHM';
                } elseif ($name == 'Северная Осетия - Алания') {
                    $code = 'SE';
                }
            }
        } else {
            if ($city == 'Москва') {
                $code = 'MOW';
            } elseif ($city == 'Саратов') {
                $code = 'SAR';
            } elseif ($city == 'Санкт-Петербург') {
                $code = 'SPE';
            } elseif ($city == 'Донецк') {
                $code = 'ROS';
            } elseif ($city == 'Дубна' or $city == 'Королев' or $city == 'Жуковский' or $city == 'Одинцово' or $city == 'Орехово-Зуево') {
                $code = 'MOS';
            } elseif ($city == 'Кириллов') {
                $code = 'VLG';
            } elseif ($city == 'Ижевск') {
                $code = 'UD';
            } elseif ($city == 'Казань') {
                $code = 'TA';
            } elseif ($city == 'Кемерово' or $city == 'Топки') {
                $code = 'KEM';
            } elseif ($city == 'Михайловск' or $city == 'Нижний Тагил') {
                $code = 'SVE';
            } elseif ($city == 'Омск') {
                $code = 'OMS';
            } elseif ($city == 'Пенза') {
                $code = 'PNZ';
            }
        }

        return $code;
    }

    public function getDeliveryAddress($deliveryId)
    {
        $query = $this->db->query("SELECT address FROM ipol_ozon_delivery_variants WHERE deliveryId = '" . $this->db->escape($deliveryId) . "'");

        return $query->row['address'];
    }

    public function getOrderOzon($order_id)
    {
        $query = $this->db->query("SELECT * FROM ipol_ozon_orders WHERE order_id = '" . (int)$order_id . "'");

        return $query->row;
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

    public function getOrders()
    {
        $query = $this->db->query("SELECT * FROM ipol_ozon_orders WHERE posting_id > 0 AND ozonStatusId <> 50 AND ozonStatusId <> 120");

        return $query->rows;
    }

    public function getDocuments()
    {
        $query = $this->db->query("SELECT posting_id FROM ipol_ozon_orders WHERE document_id = 0 AND posting_id > 0");

        return $query->rows;
    }

    public function getDocument($posting_id)
    {
        $query = $this->db->query("SELECT document_id FROM ipol_ozon_orders WHERE posting_id = '" . (int)$posting_id . "'");

        return $query->row['document_id'];
    }

    public function addPlaced($data)
    {
        $this->db->query("INSERT INTO ipol_ozon_placed SET placedId = '" . (int)$data['id'] . "', name = '" . $this->db->escape($data['name']) . "', city = '" . $this->db->escape($data['city']) . "', 
		address = '" . $this->db->escape($data['address']) . "'");
    }

    public function addDeliveryVariant($data)
    {
        $this->deleteDeliveryVariantId($data['id']);

        $data['settlement'] = isset($data['settlement']) ? $data['settlement'] : '';
        $data['region'] = isset($data['region']) ? $data['region'] : '';
        $data['description'] = isset($data['description']) ? $data['description'] : '';
        $data['howToGet'] = isset($data['howToGet']) ? $data['howToGet'] : '';
        $data['phone'] = isset($data['phone']) ? $data['phone'] : '';
        $data['minWeight'] = isset($data['minWeight']) ? $data['minWeight'] : '';
        $data['maxWeight'] = isset($data['maxWeight']) ? $data['maxWeight'] : '';
        $data['minPrice'] = isset($data['minPrice']) ? $data['minPrice'] : '';
        $data['maxPrice'] = isset($data['maxPrice']) ? $data['maxPrice'] : '';
        $data['restrictionWidth'] = isset($data['restrictionWidth']) ? $data['restrictionWidth'] : '';
        $data['restrictionLength'] = isset($data['restrictionLength']) ? $data['restrictionLength'] : '';
        $data['restrictionHeight'] = isset($data['restrictionHeight']) ? $data['restrictionHeight'] : '';
        $data['restrictionAccessMessage'] = isset($data['restrictionAccessMessage']) ? $data['restrictionAccessMessage'] : '';
        $data['workingHours'] = isset($data['workingHours']) ? $data['workingHours'] : '';

        $code = $this->getRegion($data['region'], $data['settlement']);

        $this->db->query("INSERT INTO ipol_ozon_delivery_variants SET deliveryId = '" . (int)$data['id'] . "', objectTypeId = '" . (int)$data['objectTypeId'] . "', 
		settlement = '" . $this->db->escape($data['settlement']) . "', code = '" . $this->db->escape($code) . "', region = '" . $this->db->escape($data['region']) . "', 
		objectTypeName = '" . $this->db->escape($data['objectTypeName']) . "', address = '" . $this->db->escape($data['address']) . "', addressElementId = '" . (int)$data['addressElementId'] . "', 
		description = '" . $this->db->escape($data['description']) . "', howToGet = '" . $this->db->escape($data['howToGet']) . "',	phone = '" . $this->db->escape($data['phone']) . "', 
		minWeight = '" . (int)$data['minWeight'] . "', maxWeight = '" . (int)$data['maxWeight'] . "', minPrice = '" . (int)$data['minPrice'] . "', maxPrice = '" . (int)$data['maxPrice'] . "', 
		isCashForbidden = '" . (int)$data['isCashForbidden'] . "', cardPaymentAvailable = '" . (int)$data['cardPaymentAvailable'] . "', isPartialPrepaymentForbidden = '" . (int)$data['isPartialPrepaymentForbidden'] . "', 
		fittingShoesAvailable = '" . (int)$data['fittingShoesAvailable'] . "', fittingClothesAvailable = '" . (int)$data['fittingClothesAvailable'] . "', returnAvailable = '" . (int)$data['returnAvailable'] . "', 
		partialGiveOutAvailable = '" . (int)$data['partialGiveOutAvailable'] . "', dangerousAvailable = '" . (int)$data['dangerousAvailable'] . "', wifiAvailable = '" . (int)$data['wifiAvailable'] . "', 
		legalEntityNotAvailable = '" . (int)$data['legalEntityNotAvailable'] . "', isRestrictionAccess = '" . (int)$data['isRestrictionAccess'] . "', 
		restrictionAccessMessage = '" . $this->db->escape($data['restrictionAccessMessage']) . "', restrictionWidth = '" . (int)$data['restrictionWidth'] . "', restrictionLength = '" . (int)$data['restrictionLength'] . "',
		restrictionHeight = '" . (int)$data['restrictionHeight'] . "', lat = '" . (double)$data['lat'] . "', `long` = '" . (double)$data['long'] . "', workingHours = '" . serialize($data['workingHours']) . "'");
    }

    public function setDocument($document_id, $posting_id)
    {
        $this->db->query("UPDATE ipol_ozon_orders SET document_id = '" . (int)$document_id . "' WHERE posting_id = '" . (int)$posting_id . "'");
    }

    public function saveOrder($data, $order_id)
    {
        $this->db->query("UPDATE ipol_ozon_orders SET 
		firstMileTransferFromPlaceId = '" . $this->db->escape($data['firstMileTransferFromPlaceId']) . "',
		allowUncovering = '" . (int)$data['allowUncovering'] . "',
		allowPartialDelivery = '" . (int)$data['allowPartialDelivery'] . "',
		goods = '" . serialize($data['goods']) . "',
		buyerName = '" . $this->db->escape($data['buyerName']) . "',
		buyerPhone = '" . $this->db->escape($data['buyerPhone']) . "',
		buyerEmail = '" . $this->db->escape($data['buyerEmail']) . "',
		buyerType = '" . $this->db->escape($data['buyerType']) . "',
		deliveryAddress = '" . $this->db->escape($data['deliveryAddress']) . "',
		paymentType = '" . $this->db->escape($data['paymentType']) . "',
		paymentDeliveryPrice = '" . (double)$data['paymentDeliveryPrice'] . "',
		paymentDeliveryVatRate = '" . (int)$data['paymentDeliveryVatRate'] . "',
		paymentPrepaymentAmount = '" . (double)$data['paymentPrepaymentAmount'] . "',
		items = '" . serialize($data['items']) . "',
		estimated = '" . (double)$data['estimated'] . "'
		WHERE order_id = '" . (int)$order_id . "'");

        if (isset($data['comment'])) {
            $this->db->query("UPDATE " . DB_PREFIX . "order SET comment = '" . $this->db->escape($data['comment']) . "' WHERE order_id = '" . (int)$order_id . "'");
        }
    }

    public function saveOrderOzon($data, $order_id)
    {
        $this->db->query("UPDATE ipol_ozon_orders SET
		ok = '" . $this->db->escape($data['ok']) . "',
		ozonStatus = '" . $this->db->escape($data['ozonStatus']) . "',
		ozonStatusId = '" . $this->db->escape($data['ozonStatusId']) . "',
		ozon_id = '" . (int)$data['ozon_id'] . "',
		posting_number = '" . $this->db->escape($data['posting_number']) . "',
		posting_id = '" . (int)$data['posting_id'] . "'
		WHERE order_id = '" . (int)$order_id . "'");
    }

    public function setMessage($message, $order_id)
    {
        $this->db->query("UPDATE ipol_ozon_orders SET message = '" . $this->db->escape($message) . "' WHERE order_id = '" . (int)$order_id . "'");
    }

    public function newOrder($data, $order_id)
    {
        $this->db->query("INSERT INTO `ipol_ozon_orders` SET 
			order_id = '" . (int)$order_id . "', 
			allowUncovering = '" . (int)$data['allowUncovering'] . "',
			allowPartialDelivery = '" . (int)$data['allowPartialDelivery'] . "', 
			buyerName = '" . $this->db->escape($data['buyerName']) . "', 
			buyerPhone = '" . $this->db->escape($data['buyerPhone']) . "',
			buyerEmail = '" . $this->db->escape($data['buyerEmail']) . "', 
			buyerType = '" . $this->db->escape($data['buyerType']) . "', 
			buyerLegalName = '" . $this->db->escape($data['buyerLegalName']) . "',
			recipientName = '" . $this->db->escape($data['recipientName']) . "', 
			recipientPhone = '" . $this->db->escape($data['recipientPhone']) . "', 
			recipientEmail = '" . $this->db->escape($data['recipientEmail']) . "',
			recipientType = '" . $this->db->escape($data['recipientType']) . "', 
			recipientLegalName = '" . $this->db->escape($data['recipientLegalName']) . "',
			firstMileTransferFromPlaceId = '" . $this->db->escape($data['firstMileTransferFromPlaceId']) . "', 
			paymentType = '" . $this->db->escape($data['paymentType']) . "', 
			paymentPrepaymentAmount = '" . (double)$data['paymentPrepaymentAmount'] . "', 
			paymentRecipientPaymentAmount = '" . (double)$data['paymentRecipientPaymentAmount'] . "',
			paymentDeliveryPrice = '" . (double)$data['paymentDeliveryPrice'] . "', 
			estimated = '" . (double)$data['estimated'] . "', 
			deliveryVariantId = '" . $this->db->escape($data['deliveryVariantId']) . "',
			deliveryAddress = '" . $this->db->escape($data['deliveryAddress']) . "', 
			goods = '" . serialize($data['goods']) . "', 
			items = '" . serialize($data['items']) . "', 
			ok = 'N', uptime = '" . time() . "'
		");
    }

    public function updateStatus($data, $order_id)
    {
        $this->db->query("UPDATE ipol_ozon_orders SET ozonStatus = '" . $this->db->escape($data['ozonStatus']) . "', ozonStatusId = '" . (int)$data['ozonStatusId'] . "' WHERE order_id = '" . (int)$order_id . "'");
    }

    public function updateStatusPI($data, $posting_id)
    {
        $this->db->query("UPDATE ipol_ozon_orders SET ozonStatus = '" . $this->db->escape($data['ozonStatus']) . "', ozonStatusId = '" . (int)$data['ozonStatusId'] . "' WHERE posting_id = '" . (int)$posting_id . "'");
    }

    public function updateStatusMainOrder($order_status_id, $order_id)
    {
        $this->db->query("UPDATE " . DB_PREFIX . "order SET order_status_id = '" . (int)$order_status_id . "' WHERE order_id = '" . (int)$order_id . "'");
    }

    public function deletePlaced()
    {
        $query = $this->db->query("DELETE FROM ipol_ozon_placed");
    }

    public function clearOzon()
    {
        $query = $this->db->query("DELETE FROM ipol_ozon_placed");
        $query = $this->db->query("DELETE FROM ipol_ozon_delivery_variants");
    }

    public function deleteDeliveryVariantId($deliveryId)
    {
        $query = $this->db->query("DELETE FROM ipol_ozon_delivery_variants WHERE deliveryId = '" . $this->db->escape($deliveryId) . "'");
    }
}
