<?php
use Dolyame\Payment\Client;

class DolyameLib
{
	protected $registry;
	private $prefix = '';
	private $logger = null;

	public function __construct($registry)
	{
		$this->prefix   = version_compare(VERSION, '3.0.0.0') == -1 ? '' : 'payment_';
		$this->registry = $registry;
		include_once DIR_APPLICATION . '/../system/library/dolyame_lib/Client.php';
		$this->logger = new \Log('dolyme.log');
	}

	public function __get($key)
	{
		return $this->registry->get($key);
	}

	public function __set($key, $value)
	{
		$this->registry->set($key, $value);
	}

	public function is23()
	{
		return version_compare(VERSION, '3.0.0.0') == -1;
	}

	public function getTokenKey()
	{
		return $this->is23() ? 'token' : 'user_token';
	}

	public function getConfig($name)
	{
		return $this->config->get($this->prefix . $name);
	}

	public function prepareData($orderInfo)
	{
		$amount = $this->currency->format($orderInfo['total'], $orderInfo['currency_code'], $orderInfo['currency_value'], false);

		$items = $this->getOrderItems($orderInfo['order_id']);

		$prepaid = $this->calcPrepaidAmount($amount, $items);
		$items   = $this->normalize($items, $amount + $prepaid);
		$items   = $this->correctDimmensoin($items);

		$data = [
			'order'            => [
				'id'             => $orderInfo['order_id'],
				'amount'         => $amount,
				'prepaid_amount' => $prepaid,
				'items'          => $items,
			],
			'client_info'      => [
				'first_name' => $orderInfo['payment_firstname'],
				'last_name'  => $orderInfo['payment_lastname'],
				'phone'      => $this->clearPhone($orderInfo['telephone']),
				'email'      => $orderInfo['email'],
			],
			'notification_url' => str_replace('&amp;', '&', $this->url->link('extension/payment/dolyame/callback', 'order_id=' . $orderInfo['order_id'], true)),
			'fail_url'         => str_replace('&amp;', '&', $this->url->link('checkout/checkout', '', true)),
			'success_url'      => str_replace('&amp;', '&', $this->url->link('checkout/success', 'order_id=' . $orderInfo['order_id'], true)),
		];
		return $data;
	}

	public function getOrderItems($orderId)
	{
		$this->load->language('extension/payment/dolyame');
		$items   = [];
		$orderId = intval($orderId);
		$query   = $this->db->query("
			SELECT op.*, p.sku FROM " . DB_PREFIX . "order_product as op
			LEFT JOIN " . DB_PREFIX . "product as p on p.product_id=op.product_id
			WHERE op.order_id = '" . $orderId . "'
			");

		foreach ($query->rows as $product) {
			$name = htmlspecialchars_decode($product['name']);
			$item = [
				'name'     => $name,
				'price'    => number_format($product['price'], 2, '.', ''),
				'quantity' => $product['quantity'],
			];
			if ($product['sku']) {
				$item['sku'] = $product['sku'];
			}
			$items[] = $item;
		}
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_voucher WHERE order_id = '" . $orderId . "'");
		foreach ($query->rows as $product) {
			$item = [
				'name'     => $product['description'],
				'price'    => number_format($product['amount'], 2, '.', ''),
				'quantity' => 1,
			];
			$items[] = $item;
		}
		$query = $this->db->query("SELECT value FROM " . DB_PREFIX . "order_total WHERE order_id = '" . $orderId . "' and code='shipping'");
		if (isset($query->row['value']) && $query->row['value']) {
			$item = [
				'name'     => $this->language->get('text_item_delivery'),
				'price'    => number_format($query->row['value'], 2, '.', 0),
				'quantity' => 1,
			];
			$items[] = $item;
		}
		return $items;
	}

	public function createPayment($data)
	{
		$client              = $this->initClient();
		$data['order']['id'] = $this->getConfig('dolyame_prefix') . $data['order']['id'];
		$response            = $client->create($data);
		return $response;
	}

	public function initClient()
	{
		$api = new Client($this->getConfig('dolyame_login'), $this->getConfig('dolyame_password'));
		$api->setCertPath(DIR_APPLICATION . '/../' . $this->getConfig('dolyame_cert_path'));
		$api->setKeyPath(DIR_APPLICATION . '/../' . $this->getConfig('dolyame_key_path'));
		if ($this->getConfig('dolyame_logging')) {
			$api->setLogger($this);
		}
		return $api;
	}

	public function clearPhone($phone)
	{
		$phone = preg_replace("#[^\d]#", "", $phone);
		if (!preg_match("#[7|8]{0,1}(\d{10})#", $phone, $match)) {
			return '';
		}
		return '+7' . $match[1];
	}

	public function saveTransaction($data, $paymentData)
	{
		$data = [
			'order_id'         => $data['order']['id'],
			'status'           => $paymentData['status'],
			'items'            => json_encode($data['order']['items'], JSON_UNESCAPED_UNICODE),
			'date'             => date('Y-m-d H:i:s'),
			'amount'           => $data['order']['amount'],
			'payment_schedule' => '',
		];
		$db          = $this->db;
		$escapedData = array_map(function ($item) use ($db) {
			return '"' . $db->escape($item) . '"';
		}, $data);

		$this->db->query("REPLACE " . DB_PREFIX . "dolyame (" . implode(',', array_keys($escapedData)) . ") VALUES (" . implode(',', $escapedData) . ")");
	}

	public function commitPayment($orderInfo)
	{
		$client  = $this->initClient();
		$amount  = $this->currency->format($orderInfo['total'], $orderInfo['currency_code'], $orderInfo['currency_value'], false);
		$items   = $this->getOrderItems($orderInfo['order_id']);
		$prepaid = $this->calcPrepaidAmount($amount, $items);
		$items   = $this->normalize($items, $amount + $prepaid);
		$items   = $this->correctDimmensoin($items);

		$data = [
			'amount'         => $amount,
			'items'          => $items,
			'prepaid_amount' => $prepaid,
		];
		$client->commit($this->getConfig('dolyame_prefix') . $orderInfo['order_id'], $data);
	}

	public function updateTransaction($orderInfo, $orderId)
	{
		$paymentSchedule = json_encode(isset($orderInfo['payment_schedule']) ? $orderInfo['payment_schedule'] : null);
		$this->db->query("UPDATE " . DB_PREFIX . "dolyame set status='" . $this->db->escape($orderInfo['status']) . "',
			payment_schedule='" . $this->db->escape($paymentSchedule) . "' where order_id=" . intval($orderId));
	}

	public function getOrderInfo($orderId)
	{
		$client = $this->initClient();
		$info   = $client->info($this->getConfig('dolyame_prefix') . $orderId);
		return $info;
	}

	public function calcPrepaidAmount($amount, $items)
	{
		$itemsSum = array_reduce($items, function ($carry, $item) {
			$carry += $item['price'] * $item['quantity'];
			return $carry;
		});
		$diff = $itemsSum - $amount;
		if ($diff < 0) {
			return 0;
		}
		return number_format($diff, 2, '.', '');
	}

	private function normalize($items, $resultTotal)
	{
		$resultTotal = intval($resultTotal * 100);
		$currentSum  = 0;
		foreach ($items as $index => &$item) {
			$currentSum += $item['price'] * $item['quantity'];
			$item['price'] = intval(round($item['price'] * 100));
		}
		unset($item);
		$currentSum = intval(round($currentSum * 100));

		if ($resultTotal != 0 && $resultTotal != $currentSum) {
			$coefficient = $resultTotal / $currentSum;
			$realprice   = 0;
			$aloneId     = null;
			foreach ($items as $index => &$item) {
				$item['price'] = intval(round($coefficient * $item['price']));
				$realprice += $item['price'] * $item['quantity'];
				if ($aloneId === null && $item['quantity'] == 1) {
					$aloneId = $index;
				}

			}
			unset($item);
			if ($aloneId === null) {
				foreach ($items as $index => $item) {
					if ($aloneId === null && $item['quantity'] > 1) {
						$aloneId = $index;
						break;
					}
				}
			}
			if ($aloneId === null) {
				$aloneId = 0;
			}

			$diff = $resultTotal - $realprice;

			if (abs($diff) >= 0.001) {
				if ($items[$aloneId]['quantity'] == 1) {
					$items[$aloneId]['price'] = intval(round($items[$aloneId]['price'] + $diff));
				} elseif (
					count($items) == 1
					&& abs(round($realprice / $items[$aloneId]['quantity']) - $resultTotal / $items[$aloneId]['quantity']) < 0.001
				) {
					$items[$aloneId]['price'] = intval(round($resultTotal / $items[$aloneId]['quantity']));
				} elseif ($items[$aloneId]['quantity'] > 1) {
					$tmpItem = $items[$aloneId];
					$item    = array(
						"quantity" => 1,
						"price"    => intval(round($tmpItem['price'] + $diff)),
						"name"     => $tmpItem['name'],
					);
					if (isset($tmpItem['sku'])) {
						$item['sku'];
					}
					$items[$aloneId]['quantity'] -= 1;
					array_splice($items, $aloneId + 1, 0, array($item));
				} else {
					$items[$aloneId]['price'] = intval(round($items[$aloneId]['price'] + $diff / $items[$aloneId]['quantity']));
				}
			}
		}
		return $items;
	}

	private function correctDimmensoin($items)
	{
		foreach ($items as &$item) {
			$item['price'] = number_format(round($item['price'] / 100, 2), 2, '.', '');
		}
		return $items;
	}

	public function info($msg)
	{
		$this->logger->write($msg);
	}

}
