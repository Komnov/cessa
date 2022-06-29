<?php
defined('EXTENSION_NAME')			|| define('EXTENSION_NAME',            'Similar Products');
defined('EXTENSION_VERSION')		|| define('EXTENSION_VERSION',         '4.1.14');
defined('EXTENSION_ID')				|| define('EXTENSION_ID',              '3449');
defined('EXTENSION_COMPATIBILITY')	|| define('EXTENSION_COMPATIBILITY',   'OpenCart 3.0.0.x, 3.0.1.x, 3.0.2.x and 3.0.3.x');
defined('EXTENSION_STORE_URL')		|| define('EXTENSION_STORE_URL',       'https://www.opencart.com/index.php?route=marketplace/extension/info&extension_id=' . EXTENSION_ID);
defined('EXTENSION_PURCHASE_URL')	|| define('EXTENSION_PURCHASE_URL',    'https://www.opencart.com/index.php?route=marketplace/purchase&extension_id=' . EXTENSION_ID);
defined('EXTENSION_RATE_URL')		|| define('EXTENSION_RATE_URL',        'https://www.opencart.com/index.php?route=account/rating/add&extension_id=' . EXTENSION_ID);
defined('EXTENSION_SUPPORT_EMAIL')	|| define('EXTENSION_SUPPORT_EMAIL',   'support@opencart.ee');
defined('EXTENSION_SUPPORT_LINK')	|| define('EXTENSION_SUPPORT_LINK',    'https://www.opencart.com/index.php?route=support/seller&extension_id=' . EXTENSION_ID);
defined('EXTENSION_SUPPORT_FORUM')	|| define('EXTENSION_SUPPORT_FORUM',   'https://forum.opencart.com/viewtopic.php?f=123&t=42624');
defined('OTHER_EXTENSIONS')			|| define('OTHER_EXTENSIONS',          'https://www.opencart.com/index.php?route=marketplace/extension&filter_member=bull5-i');
defined('EXTENSION_MIN_PHP_VERSION')|| define('EXTENSION_MIN_PHP_VERSION', '5.3.0');

class ControllerExtensionModuleSimilarProducts extends Controller {
	private $error = array();
	protected $alert = array(
		'error'     => array(),
		'warning'   => array(),
		'success'   => array(),
		'info'      => array()
	);

	private static $config_defaults = array(
		'module_similar_products_installed'              => 1,
		'module_similar_products_installed_version'      => EXTENSION_VERSION,
		'module_similar_products_status'                 => 0,
		'module_similar_products_auto_select'            => 0,
		'module_similar_products_product_sort_order'     => 0,
		'module_similar_products_leaves_only'            => 1,
		'module_similar_products_substr_start'           => 0,
		'module_similar_products_substr_length'          => 5,
		'module_similar_products_custom_string'          => "",
		'module_similar_products_remove_sql_changes'     => 1,
		'module_similar_products_apply_to'               => array(),
		'module_similar_products_column_left_selector'   => '#column-left',
		'module_similar_products_column_right_selector'  => '#column-right',
		'module_similar_products_services'               => "W10=",
		'module_similar_products_as'                     => "WyIwIl0=",
	);

	private static $module_defaults = array(
		'module_id'           => '',
		'name'                => '',
		'names'               => array(),
		'show_in_tab'         => '0',
		'products_per_page'   => '4',
		'limit'               => '24',
		'image_width'         => '200',
		'image_height'        => '200',
		'stock_only'          => '0',
		'lazy_load'           => '1',
		'status'              => '0',
	);

	private static $event_hooks = array(
		'admin_module_similar_products_product_add'     => array('trigger' => 'admin/model/catalog/product/addProduct/after',           'action' => 'extension/module/similar_products/product_add_hook'),
		'admin_module_similar_products_product_edit'    => array('trigger' => 'admin/model/catalog/product/editProduct/after',          'action' => 'extension/module/similar_products/product_edit_hook'),
		'admin_module_similar_products_product_copy'    => array('trigger' => 'admin/model/catalog/product/copyProduct/after',          'action' => 'extension/module/similar_products/product_copy_hook'),
		'admin_module_similar_products_product_delete'  => array('trigger' => 'admin/model/catalog/product/deleteProduct/after',        'action' => 'extension/module/similar_products/product_delete_hook'),
		'admin_module_similar_products_language_add'    => array('trigger' => 'admin/model/localisation/language/addLanguage/after',    'action' => 'extension/module/similar_products/language_add_hook'),
		'admin_module_similar_products_language_delete' => array('trigger' => 'admin/model/localisation/language/deleteLanguage/after', 'action' => 'extension/module/similar_products/language_delete_hook'),
	);

	public function __construct($registry) {
		parent::__construct($registry);
		$this->config->load('sp');
	}

	public function index() {
		$this->load->helper('sp');
		$this->load->language('extension/module/similar_products');
		$this->load->model('extension/module/similar_products');

		$this->document->setTitle($this->language->get('extension_name'));

		$this->load->model('setting/setting');
		$this->load->model('setting/module');

		$ajax_request = isset($this->request->server['HTTP_X_REQUESTED_WITH']) && !empty($this->request->server['HTTP_X_REQUESTED_WITH']) && strtolower($this->request->server['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

		if (isset($this->request->get['module_id'])) {
			$module_id = $this->request->get['module_id'];
		} else {
			$module_id = null;
		}

		if ($this->request->server['REQUEST_METHOD'] == 'POST' && !$ajax_request) {
			if (!is_null($module_id)) {
				if ($this->validateModuleForm($this->request->post)) {
					$this->model_setting_module->editModule($module_id, $this->request->post);

					$this->session->data['success'] = sprintf($this->language->get('text_success_update_module'), $this->request->post['name']);

					$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
				}
			} else {
				if ($this->validateForm($this->request->post)) {
					$original_settings = $this->model_setting_setting->getSetting('module_similar_products');

					foreach (self::$config_defaults as $setting => $default) {
						$value = $this->config->get($setting);
						if ($value === null) {
							$original_settings[$setting] = $default;
						}
					}

					$modules = isset($this->request->post['modules']) ? $this->request->post['modules'] : array();
					unset($this->request->post['modules']);

					if (isset($this->request->post['module_similar_products_apply_to']['products']) && $this->request->post['module_similar_products_apply_to']['products'] != "") {
						$this->model_extension_module_similar_products->applyMassChange($this->request->post);
					}

					$settings = array_merge($original_settings, $this->request->post);
					$settings['module_similar_products_installed_version'] = $original_settings['module_similar_products_installed_version'];
					$settings['module_similar_products_apply_to'] = array();

					$this->model_setting_setting->editSetting('module_similar_products', $settings);

					$previous_modules = $this->model_setting_module->getModulesByCode('similar_products');
					$previous_modules = array_remap_key_to_id('module_id', $previous_modules);

					foreach ($modules as $module) {
						if (!empty($module['module_id'])) {
							$module_id = $module['module_id'];
							unset($previous_modules[$module_id]);
							$this->model_setting_module->editModule($module_id, $module);
						} else {
							$this->model_setting_module->addModule('similar_products', $module);

							$module_id = $this->db->getLastId();
							$module['module_id'] = $module_id;
							$this->model_setting_module->editModule($module_id, $module);
						}
					}

					// Delete any modules left over
					foreach ($previous_modules as $module_id => $module) {
						$this->model_setting_module->deleteModule($module_id);
					}

					$this->session->data['success'] = $this->language->get('text_success_update');

					$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
				}
			}
		} else if ($this->request->server['REQUEST_METHOD'] == 'POST' && $ajax_request) {
			$response = array();

			if (!is_null($module_id)) {
				if ($this->validateModuleForm($this->request->post)) {
					$this->model_setting_module->editModule($module_id, $this->request->post);

					$this->alert['success']['updated'] = sprintf($this->language->get('text_success_update_module'), $this->request->post['name']);
				}
			} else {
				if ($this->validateForm($this->request->post)) {
					$original_settings = $this->model_setting_setting->getSetting('module_similar_products');

					foreach (self::$config_defaults as $setting => $default) {
						$value = $this->config->get($setting);
						if ($value === null) {
							$original_settings[$setting] = $default;
						}
					}

					$modules = isset($this->request->post['modules']) ? $this->request->post['modules'] : array();
					unset($this->request->post['modules']);

					if (isset($this->request->post['module_similar_products_apply_to']['products']) && $this->request->post['module_similar_products_apply_to']['products'] != "") {
						$this->model_extension_module_similar_products->applyMassChange($this->request->post);
					}

					$settings = array_merge($original_settings, $this->request->post);
					$settings['module_similar_products_installed_version'] = $original_settings['module_similar_products_installed_version'];
					$settings['module_similar_products_apply_to'] = array();

					$this->model_setting_setting->editSetting('module_similar_products', $settings);

					$previous_modules = $this->model_setting_module->getModulesByCode('similar_products');
					$previous_modules = array_remap_key_to_id('module_id', $previous_modules);

					foreach ($modules as $idx => $module) {
						if (!empty($module['module_id'])) {
							$module_id = $module['module_id'];
							unset($previous_modules[$module_id]);
							$this->model_setting_module->editModule($module_id, $module);
						} else {
							$this->model_setting_module->addModule('similar_products', $module);

							$module_id = $this->db->getLastId();

							$module['module_id'] = $module_id;
							$this->model_setting_module->editModule($module_id, $module);

							$response['values']['modules'][$idx]['module_id'] = $module_id;
						}
					}

					// Delete any modules left over
					foreach ($previous_modules as $module_id => $module) {
						$this->model_setting_module->deleteModule($module_id);
					}

					$this->alert['success']['updated'] = $this->language->get('text_success_update');
				} else {
					if (!$this->checkVersion()) {
						$response['reload'] = true;
					}
				}
			}

			$response = array_merge($response, array("errors" => $this->error), array("alerts" => $this->alert));

			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_enc($response, JSON_UNESCAPED_SLASHES));
			return;
		}

		$data['heading_title'] = $this->language->get('extension_name');
		$data['text_other_extensions'] = sprintf($this->language->get('text_other_extensions'), OTHER_EXTENSIONS);

		$data['ext_name'] = EXTENSION_NAME;
		$data['ext_version'] = EXTENSION_VERSION;
		$data['ext_id'] = EXTENSION_ID;
		$data['ext_compatibility'] = EXTENSION_COMPATIBILITY;
		$data['ext_store_url'] = EXTENSION_STORE_URL;
		$data['ext_rate_url'] = EXTENSION_RATE_URL;
		$data['ext_purchase_url'] = EXTENSION_PURCHASE_URL;
		$data['ext_support_email'] = EXTENSION_SUPPORT_EMAIL;
		$data['ext_support_link'] = EXTENSION_SUPPORT_LINK;
		$data['ext_support_forum'] = EXTENSION_SUPPORT_FORUM;
		$data['other_extensions_url'] = OTHER_EXTENSIONS;
		$data['oc_version'] = VERSION;
		$data['php_version'] = phpversion();
		$data['installed_extensions'] = (array)$this->config->get('sp_extensions');

		if (!is_null($module_id) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$module_info = $this->model_setting_module->getModule($module_id);
			if (!$module_info) {
				$this->response->redirect($this->url->link('extension/module/similar_products', 'user_token=' . $this->session->data['user_token'], true));
				return;
			}
		} else {
			$module_info = null;
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true),
			'active'    => false
		);

		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_extension'),
			'href'      => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true),
			'active'    => false
		);

		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('extension_name'),
			'href'      => $this->url->link('extension/module/similar_products', 'user_token=' . $this->session->data['user_token'], true),
			'active'    => is_null($module_id)
		);

		if (!is_null($module_id)) {
			$module_name = (!empty($module_info['name'])) ? $module_info['name'] : ((!empty($this->request->post['name'])) ? $this->request->post['name'] : EXTENSION_NAME);
			$data['breadcrumbs'][] = array(
				'text'      => $module_name,
				'href'      => $this->url->link('extension/module/similar_products', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $module_id, true),
				'active'    => true
			);
		}

		$data['save'] = $this->url->link('extension/module/similar_products', 'user_token=' . $this->session->data['user_token'] . (!is_null($module_id) ? '&module_id=' . $module_id : ''), true);
		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);
		$data['delete'] = $this->url->link('extension/module/delete', 'user_token=' . $this->session->data['user_token'] . (!is_null($module_id) ? '&module_id=' . $module_id : ''), true);
		$data['upgrade'] = $this->url->link('extension/module/similar_products/upgrade', 'user_token=' . $this->session->data['user_token'], true);
		$data['general_settings'] = $this->url->link('extension/module/similar_products', 'user_token=' . $this->session->data['user_token'], true);
		$data['extension_installer'] = $this->url->link('marketplace/installer', 'user_token=' . $this->session->data['user_token'], true);
		$data['modifications'] = $this->url->link('marketplace/modification', 'user_token=' . $this->session->data['user_token'], true);
		$data['events'] = $this->url->link('marketplace/event', 'user_token=' . $this->session->data['user_token'], true);
		$data['services'] = html_entity_decode($this->url->link('extension/module/similar_products/services', 'user_token=' . $this->session->data['user_token'], true));
		$data['autocomplete'] = html_entity_decode($this->url->link('extension/module/similar_products/autocomplete', 'type=%TYPE%&query=%QUERY&user_token=' . $this->session->data['user_token'], true));

		if (!$this->checkPrerequisites()) {
			$this->showErrorPage($data);
			return;
		}

		$db_structure_ok = $this->checkVersion() && $this->model_extension_module_similar_products->checkDatabaseStructure($this->alert);

		$this->checkVersion(true);

		$this->alert = array_merge($this->alert, $this->model_extension_module_similar_products->getAlerts());

		$data['update_pending'] = !$this->checkVersion();

		if (!$data['update_pending']) {
			$this->updateEventHooks();
		} else if (!is_null($module_id)) {
			$this->response->redirect($this->url->link('extension/module/similar_products', 'user_token=' . $this->session->data['user_token'], true));
			return;
		}

		$data['ssl'] = (
				(int)$this->config->get('config_secure') ||
				isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ||
				!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' ||
				!empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on'
			) ? 's' : '';

		$this->load->model('localisation/language');
		$languages = $this->model_localisation_language->getLanguages();
		foreach ($languages as $key => $value) {
			unset($languages[$key]['image']);
		}
		$data['languages'] = array_remap_key_to_id('language_id', $languages);
		$data['default_language'] = $this->config->get('config_language_id');

		$data['default_image_width'] = $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_width');
		$data['default_image_height'] = $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_height');

		$this->load->model('catalog/category');
		$categories = $this->model_catalog_category->getCategories(array('sort' => 'name'));
		$data['categories'] = array_remap_key_to_id('category_id', $categories);

		$this->load->model('catalog/manufacturer');
		$manufacturers = $this->model_catalog_manufacturer->getManufacturers(array('sort' => 'name'));
		$data['manufacturers'] = array_remap_key_to_id('manufacturer_id', $manufacturers);

		$data['installed_version'] = $this->installedVersion();

		if (is_null($module_id)) {
			# Loop through all settings for the post/config values
			foreach (array_keys(self::$config_defaults) as $setting) {
				if (isset($this->request->post[$setting])) {
					$data[$setting] = $this->request->post[$setting];
				} else {
					$data[$setting] = $this->config->get($setting);
					if ($data[$setting] === null) {
						if (!isset($this->alert['warning']['unsaved']) && $this->checkVersion())  {
							$this->alert['warning']['unsaved'] = $this->language->get('error_unsaved_settings');
						}
						if (isset(self::$config_defaults[$setting])) {
							$data[$setting] = self::$config_defaults[$setting];
						}
					}
				}
			}
			if (isset($this->request->post['modules'])) {
				$data['modules'] = $this->request->post['modules'];
			} else {
				$modules = $this->model_setting_module->getModulesByCode('similar_products');

				foreach ($modules as $idx => $module) {
					$module_settings = json_decode($module['setting'], true);
					unset($module['setting']);
					$module = array_merge($module, $module_settings);

					foreach (array_keys(self::$module_defaults) as $setting) {
						if (!isset($module[$setting])) {
							$module[$setting] = self::$module_defaults[$setting];

							if (!isset($this->alert['warning']['unsaved']) && $this->checkVersion())  {
								$this->alert['warning']['unsaved'] = $this->language->get('error_unsaved_settings');
							}
						}
						$modules[$idx] = $module;
					}
				}

				$data['modules'] = $modules;
			}

			foreach (array_keys(self::$module_defaults) as $setting) {
				$data["module_similar_products_m_$setting"] = self::$module_defaults[$setting];
			}

			$this->load->model('setting/store');

			$stores = $this->model_setting_store->getStores();

			$data['stores'] = array();

			$data['stores'][0] = array(
				'name' => $this->config->get('config_name'),
				'url'  => HTTP_CATALOG
			);

			foreach ($stores as $store) {
				$data['stores'][$store['store_id']] = array(
					'name' => $store['name'],
					'url'  => $store['url']
				);
			}
		} else {
			foreach (array_keys(self::$module_defaults) as $setting) {
				if (isset($this->request->post[$setting])) {
					$data[$setting] = $this->request->post[$setting];
				} else if (isset($module_info[$setting])) {
					$data[$setting] = $module_info[$setting];
				} else {
					$data[$setting] = self::$module_defaults[$setting];
					if (!isset($this->alert['warning']['unsaved']) && $this->checkVersion())  {
						$this->alert['warning']['unsaved'] = $this->language->get('error_unsaved_settings');
					}
				}
			}
			$data['module_id'] = $module_id;

			$modules = $this->model_setting_module->getModulesByCode('similar_products');

			$tab_position_used = 0;

			foreach ($modules as $idx => $module) {
				$module_settings = json_decode($module['setting'], true);

				if ((int)$module_settings['show_in_tab'] && $module_id != $module['module_id']) {
					$tab_position_used = 1;
					break;
				}
			}
			$data['tab_position_used'] = $tab_position_used;
		}

		if (isset($this->session->data['error'])) {
			$this->error = $this->session->data['error'];

			unset($this->session->data['error']);
		}

		if (isset($this->error['warning'])) {
			$this->alert['warning']['warning'] = $this->error['warning'];
		}

		if (isset($this->error['error'])) {
			$this->alert['error']['error'] = $this->error['error'];
		}

		if (isset($this->session->data['success'])) {
			$this->alert['success']['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		}

		$this->document->addStyle('view/stylesheet/sp/custom.min.css?v=' . EXTENSION_VERSION);

		$this->document->addScript('view/javascript/sp/custom.min.js?v=' . EXTENSION_VERSION);

		$data['errors'] = $this->error;

		$data['user_token'] = $this->session->data['user_token'];

		$data['alerts'] = $this->alert;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		if (is_null($module_id)) {
			$template = 'extension/module/similar_products';
		} else {
			$template = 'extension/module/similar_products_module';
		}

		$this->response->setOutput($this->load->view($template, $data));
	}

	public function install() {
		$this->load->helper('sp');
		$this->load->language('extension/module/similar_products');
		$this->load->model('extension/module/similar_products');

		$this->registerEventHooks();

		$this->model_extension_module_similar_products->applyDatabaseChanges();

		$this->load->model('setting/setting');
		$this->model_setting_setting->editSetting('module_similar_products', self::$config_defaults);
	}

	public function uninstall() {
		$this->load->helper('sp');
		$this->load->language('extension/module/similar_products');
		$this->load->model('extension/module/similar_products');

		$this->removeEventHooks();

		if ($this->config->get("module_similar_products_remove_sql_changes")) {
			$this->model_extension_module_similar_products->revertDatabaseChanges();
		}

		$this->load->model('setting/setting');
		$this->model_setting_setting->deleteSetting('module_similar_products');

		$this->load->model('setting/module');
		$this->model_setting_module->deleteModulesByCode('similar_products');
	}

	public function upgrade() {
		$this->load->helper('sp');
		$this->load->language('extension/module/similar_products');
		$this->load->model('extension/module/similar_products');

		$ajax_request = isset($this->request->server['HTTP_X_REQUESTED_WITH']) && !empty($this->request->server['HTTP_X_REQUESTED_WITH']) && strtolower($this->request->server['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

		$response = array();

		if ($this->request->server['REQUEST_METHOD'] == 'POST' && $this->validateUpgrade()) {
			$this->load->model('setting/setting');

			if ($this->model_extension_module_similar_products->upgradeDatabaseStructure($this->installedVersion(), $this->alert)) {
				$settings = array();

				// Go over all settings, add new values and remove old ones
				foreach (self::$config_defaults as $setting => $default) {
					$value = $this->config->get($setting);
					if ($value === null) {
						$settings[$setting] = $default;
					} else {
						$settings[$setting] = $value;
					}
				}

				$settings['module_similar_products_installed_version'] = EXTENSION_VERSION;

				$this->model_setting_setting->editSetting('module_similar_products', $settings);

				$this->session->data['success'] = sprintf($this->language->get('text_success_upgrade'), EXTENSION_VERSION);
				$this->alert['success']['upgrade'] = sprintf($this->language->get('text_success_upgrade'), EXTENSION_VERSION);

				$response['success'] = true;
				$response['reload'] = true;
			} else {
				$this->alert = array_merge($this->alert, $this->model_extension_module_similar_products->getAlerts());
				$this->alert['error']['database_upgrade'] = $this->language->get('error_upgrade_database');
			}
		}

		$response = array_merge($response, array("errors" => $this->error), array("alerts" => $this->alert));

		if (!$ajax_request) {
			$this->session->data['errors'] = $this->error;
			$this->session->data['alerts'] = $this->alert;
			$this->response->redirect($this->url->link('extension/module/similar_products', 'user_token=' . $this->session->data['user_token'], true));
		} else {
			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_enc($response, JSON_UNESCAPED_SLASHES));
			return;
		}
	}

	public function services() {
		$this->load->helper('sp');
		$this->load->language('extension/module/similar_products');
		$this->load->model('extension/module/similar_products');

		$services = base64_decode($this->config->get('module_similar_products_services'));
		$response = json_decode($services, true);
		$force = isset($this->request->get['force']) && (int)$this->request->get['force'];

		if ($response && isset($response['expires']) && $response['expires'] >= strtotime("now") && !$force) {
			$response['cached'] = true;
		} else {
			$url = "https://www.opencart.ee/services/?eid=" . EXTENSION_ID . "&info=true&general=true&currency=" . $this->config->get('config_currency');
			$hostname = (!empty($_SERVER['HTTP_HOST'])) ? $_SERVER['HTTP_HOST'] : '' ;

			if (function_exists('curl_init')) {
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
				curl_setopt($ch, CURLOPT_TIMEOUT, 60);
				curl_setopt($ch, CURLOPT_USERAGENT, base64_encode("curl " . EXTENSION_ID));
				curl_setopt($ch, CURLOPT_REFERER, $hostname);
				$json = curl_exec($ch);
			} else {
				$json = false;
			}

			if ($json !== false) {
				$this->load->model('setting/setting');
				$settings = $this->model_setting_setting->getSetting('module_similar_products');
				$settings['module_similar_products_services'] = base64_encode($json);
				$this->model_setting_setting->editSetting('module_similar_products', $settings);
				$response = json_decode($json, true);
			} else {
				$response = array();
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_enc($response, JSON_UNESCAPED_SLASHES));
	}

	public function autocomplete() {
		$this->load->helper('sp');
		$this->load->language('extension/module/similar_products');
		$this->load->model('extension/module/similar_products');

		if ($this->request->server['REQUEST_METHOD'] == 'GET' && isset($this->request->get['type'])) {
			$response = array();
			switch ($this->request->get['type']) {
				case 'product':
					$this->load->model('catalog/product');

					$results = array();

					if (isset($this->request->get['query'])) {
						$filter_data = array(
							'filter_name'   => $this->request->get['query'],
							'sort'          => 'pd.name',
							'start'         => 0,
							'limit'         => 20,
						);

						$results = $this->model_catalog_product->getProducts($filter_data);
					}

					foreach ($results as $result) {
						$result['name'] = html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8');
						$response[] = array(
							'value'     => $result['name'],
							'user_tokens'    => explode(' ', $result['name']),
							'id'        => $result['product_id'],
							'model'     => $result['model']
						);
					}
					break;
				case 'category':
					$this->load->model('catalog/category');

					$results = array();

					if (isset($this->request->get['query'])) {
						$filter_data = array(
							'filter_name'   => $this->request->get['query'],
						);

						$results = $this->model_catalog_category->getCategories($filter_data);

						if (stripos($this->language->get('text_none'), $this->request->get['query']) !== false) {
							$response[] = array(
									'value'     => $this->language->get('text_none'),
									'user_tokens'    => explode(' ', trim(str_replace('---', '', $this->language->get('text_none')))),
									'id'        => '*',
									'path'      => '',
									'full_name' => $this->language->get('text_none')
								);
						}
					}

					foreach ($results as $result) {
						$result['name'] = html_entity_decode(str_replace('&nbsp;', '', $result['name']), ENT_QUOTES, 'UTF-8');
						$parts = explode('>', $result['name']);
						$last_part = array_pop($parts);

						$response[] = array(
							'value'     => $last_part,
							'user_tokens'    => explode('>', $result['name']),
							'id'        => $result['category_id'],
							'path'      => $parts ? implode(' > ', $parts) . ' > ' : '',
							'full_name' => $result['name']
						);
					}
					break;
				default:
					break;
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_enc($response, JSON_UNESCAPED_SLASHES));
	}

	// Event hooks
	public function product_add_hook($route='', $data=array(), $output=null) {
		$product_id = (int)$output;

		if (is_array($data) && !empty($data[0])) {
			$data = $data[0];
		} else {
			$data = array();
		}

		if ($product_id && $this->config->get('module_similar_products_status')) {
			$this->db->query("UPDATE " . DB_PREFIX . "product SET sp_auto_select = '" . (int)$data['sp_auto_select'] . "', sp_product_sort_order = '" . (int)$data['sp_product_sort_order'] . "', sp_leaves_only = '" . (int)$data['sp_leaves_only'] . "', sp_substr_start = '" . (int)$data['sp_substr_start'] . "', sp_substr_length = '" . (int)$data['sp_substr_length'] . "', sp_custom_string = '" . $this->db->escape($data['sp_custom_string']) . "' WHERE product_id = '" . (int)$product_id . "'");

			if (isset($data['sp_similar_products'])) {
				foreach ((array)$data['sp_similar_products'] as $similar_id) {
					if ((int)$product_id != (int)$similar_id) {
						$this->db->query("DELETE FROM " . DB_PREFIX . "product_similar WHERE product_id = '" . (int)$product_id . "' AND similar_id = '" . (int)$similar_id . "' OR product_id = '" . (int)$similar_id . "' AND similar_id = '" . (int)$product_id . "'");
						$this->db->query("INSERT INTO " . DB_PREFIX . "product_similar SET product_id = '" . (int)$product_id . "', similar_id = '" . (int)$similar_id . "'");
						$this->db->query("INSERT INTO " . DB_PREFIX . "product_similar SET product_id = '" . (int)$similar_id . "', similar_id = '" . (int)$product_id . "'");
					}
				}
			}
		}
	}

	public function product_edit_hook($route='', $data=array(), $output=null) {
		if (is_array($data) && !empty($data[0])) {
			$product_id = (int)$data[0];
		} else {
			$product_id = null;
		}

		if (is_array($data) && !empty($data[1])) {
			$data = $data[1];
		} else {
			$data = null;
		}

		if ($product_id && $this->config->get('module_similar_products_status')) {
			$this->db->query("DELETE FROM " . DB_PREFIX . "product_similar WHERE product_id = '" . (int)$product_id . "' OR similar_id = '" . (int)$product_id . "'");

			$this->db->query("UPDATE " . DB_PREFIX . "product SET sp_auto_select = '" . (int)$data['sp_auto_select'] . "', sp_product_sort_order = '" . (int)$data['sp_product_sort_order'] . "', sp_leaves_only = '" . (int)$data['sp_leaves_only'] . "', sp_substr_start = '" . (int)$data['sp_substr_start'] . "', sp_substr_length = '" . (int)$data['sp_substr_length'] . "', sp_custom_string = '" . $this->db->escape($data['sp_custom_string']) . "' WHERE product_id = '" . (int)$product_id . "'");

			if (isset($data['sp_similar_products'])) {
				foreach ((array)$data['sp_similar_products'] as $similar_id) {
					if ((int)$product_id != (int)$similar_id) {
						$this->db->query("DELETE FROM " . DB_PREFIX . "product_similar WHERE product_id = '" . (int)$product_id . "' AND similar_id = '" . (int)$similar_id . "' OR product_id = '" . (int)$similar_id . "' AND similar_id = '" . (int)$product_id . "'");
						$this->db->query("INSERT INTO " . DB_PREFIX . "product_similar SET product_id = '" . (int)$product_id . "', similar_id = '" . (int)$similar_id . "'");
						$this->db->query("INSERT INTO " . DB_PREFIX . "product_similar SET product_id = '" . (int)$similar_id . "', similar_id = '" . (int)$product_id . "'");
					}
				}
			}
		}
	}

	public function product_copy_hook($route='', $data=array(), $output=null) {
		$product_id = (int)$output;

		if (is_array($data) && !empty($data[0])) {
			$copy_product_id = $data[0];
		} else {
			$copy_product_id = array();
		}


		if ($product_id && $copy_product_id && $this->config->get('module_similar_products_status')) {
			$this->load->model('catalog/product');

			$copy_product = $this->model_catalog_product->getProduct($copy_product_id);

			$data = array();

			if ($copy_product != null) {
				$data['sp_auto_select'] = $copy_product['sp_auto_select'];
				$data['sp_product_sort_order'] = $copy_product['sp_product_sort_order'];
				$data['sp_leaves_only'] = $copy_product['sp_leaves_only'];
				$data['sp_substr_start'] = $copy_product['sp_substr_start'];
				$data['sp_substr_length'] = $copy_product['sp_substr_length'];
				$data['sp_custom_string'] = $copy_product['sp_custom_string'];
			}


			$data['sp_similar_products'] = $this->model_catalog_product->getSimilarProducts($copy_product_id);

			$this->product_edit_hook('', array($product_id, $data));
		}
	}

	public function product_delete_hook($route='', $data=array(), $output=null) {
		if (is_array($data) && !empty($data[0])) {
			$product_id = (int)$data[0];
		} else {
			$product_id = (int)$data;
		}

		if ($product_id && $this->config->get('module_similar_products_installed')) {
			$this->db->query("DELETE FROM " . DB_PREFIX . "product_similar WHERE product_id = '" . (int)$product_id . "' OR similar_id = '" . (int)$product_id . "'");
		}
	}

	public function language_add_hook($route='', $data=array(), $output=null) {
		$language_id = (int)$output;

		if ($language_id && $this->config->get('module_similar_products_installed')) {
			$this->load->model('setting/module');

			$sp_modules = $this->model_setting_module->getModulesByCode('similar_products');

			foreach((array)$sp_modules as $module) {
				$module_settings = json_decode($module['setting'], true);

				if (isset($module_settings['names'][$this->config->get('config_language_id')])) {
					$module_settings['names'][$language_id] = $module_settings['names'][$this->config->get('config_language_id')];
				} else {
					$module_settings['names'][$language_id] = '';
				}

				$module_settings['name'] = $module['name'];

				$this->model_setting_module->editModule($module['module_id'], $module_settings);
			}
		}
	}

	public function language_delete_hook($route='', $data=array(), $output=null) {
		if (is_array($data) && !empty($data[0])) {
			$language_id = (int)$data[0];
		} else {
			$language_id = (int)$data;
		}

		if ($language_id && $this->config->get('module_similar_products_installed')) {
			$this->load->model('setting/module');

			$sp_modules = $this->model_setting_module->getModulesByCode('similar_products');

			foreach((array)$sp_modules as $module) {
				$module_settings = json_decode($module['setting'], true);

				unset($module_settings['names'][$language_id]);

				$module_settings['name'] = $module['name'];

				$this->model_setting_module->editModule($module['module_id'], $module_settings);
			}
		}
	}

	protected function showErrorPage($data = array()) {
		$this->document->addStyle('view/stylesheet/sp/custom.min.css?v=' . EXTENSION_VERSION);

		$data['alerts'] = $this->alert;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$template = 'extension/module/similar_products_error';

		$this->response->setOutput($this->load->view($template, $data));
	}

	// Private methods
	private function registerEventHooks() {
		$this->load->model('setting/event');

		if (isset($this->model_setting_event->getEventByCodeTriggerAction) && is_callable($this->model_setting_event->getEventByCodeTriggerAction)) {
			foreach (self::$event_hooks as $code => $hook) {
				$event = $this->model_setting_event->getEventByCodeTriggerAction($code, $hook['trigger'], $hook['action']);

				if (!$event) {
					$this->model_setting_event->addEvent($code, $hook['trigger'], $hook['action']);
				}
			}
		} else {
			$this->alert['warning']['ocmod'] = $this->language->get('error_ocmod_script');
		}
	}

	private function removeEventHooks() {
		$this->load->model('setting/event');

		foreach (self::$event_hooks as $code => $hook) {
			$this->model_setting_event->deleteEventByCode($code);
		}
	}

	private function updateEventHooks() {
		$this->load->model('setting/event');

		if (isset($this->model_setting_event->getEventByCodeTriggerAction) && is_callable($this->model_setting_event->getEventByCodeTriggerAction)) {
			foreach (self::$event_hooks as $code => $hook) {
				$event = $this->model_setting_event->getEventByCodeTriggerAction($code, $hook['trigger'], $hook['action']);

				if (!$event) {
					$this->model_setting_event->addEvent($code, $hook['trigger'], $hook['action']);

					if (empty($this->alert['success']['hooks_updated'])) {
						$this->alert['success']['hooks_updated'] = $this->language->get('text_success_hooks_update');
					}
				}
			}

			// Delete old triggers
			$query = $this->db->query("SELECT `code` FROM " . DB_PREFIX . "event WHERE `code` LIKE 'admin_module_similar_products_%'");
			$events = array_keys(self::$event_hooks);

			foreach ($query->rows as $row) {
				if (!in_array($row['code'], $events)) {
					$this->model_setting_event->deleteEventByCode($row['code']);

					if (empty($this->alert['success']['hooks_updated'])) {
						$this->alert['success']['hooks_updated'] = $this->language->get('text_success_hooks_update');
					}
				}
			}
		} else {
			$this->alert['warning']['ocmod'] = $this->language->get('error_ocmod_script');
		}
	}

	protected function checkPrerequisites() {
		$errors = false;

		$this->load->language('extension/module/similar_products', 'sp');

		if (!$this->config->get('sp_ocmod_script_working')) {
			$errors = true;
			$this->alert['error']['ocmod'] = $this->language->get('sp')->get('error_ocmod_script');
		} else if ($this->checkVersion() && $this->installedVersion() != $this->config->get('sp_version')) {
			$this->alert['warning']['ocmod_cache'] = sprintf($this->language->get('sp')->get('error_ocmod_cache'), $this->url->link('marketplace/modification/refresh', 'user_token=' . $this->session->data['user_token'], true));
		}

		if (version_compare(phpversion(), EXTENSION_MIN_PHP_VERSION) < 0) {
			$errors = true;
			$this->alert['error']['php'] = sprintf($this->language->get('sp')->get('error_php_version'), phpversion(), EXTENSION_MIN_PHP_VERSION);
		}

		return !$errors;
	}

	protected function checkVersion($display_error = false) {
		$errors = false;

		$installed_version = $this->installedVersion();

		if ($installed_version != EXTENSION_VERSION) {
			$errors = true;

			if ($display_error) {
				$this->alert['info']['version'] = sprintf($this->language->get('error_version'), EXTENSION_VERSION);
			}
		}

		return !$errors;
	}

	private function validate() {
		$errors = false;

		if (!$this->user->hasPermission('modify', 'extension/module/similar_products')) {
			$errors = true;
			$this->alert['error']['permission'] = $this->language->get('error_permission');
		}

		if (!$errors) {
			$result = $this->checkPrerequisites() && $this->checkVersion() && $this->model_extension_module_similar_products->checkDatabaseStructure($this->alert);
			$this->alert = array_merge($this->alert, $this->model_extension_module_similar_products->getAlerts());
			return $result;
		} else {
			return false;
		}
	}

	private function validateUpgrade() {
		$errors = false;

		if (!$this->user->hasPermission('modify', 'extension/module/similar_products')) {
			$errors = true;
			$this->alert['error']['permission'] = $this->language->get('error_permission');
		}

		return !$errors;
	}

	private function validateForm(&$data) {
		$errors = false;

		if (isset($data['modules'])) {
			foreach ((array)$data['modules'] as $idx => $module) {
				if (isset($module['names'])) {
					foreach ((array)$module['names'] as $language_id => $value) {
						if (!utf8_strlen($value)) {
							$errors = true;
							$this->error['modules'][$idx]['names'][$language_id]['name'] = $this->language->get('error_module_name');
						}
					}
				} else {
					$errors = true;
				}

				if ((int)$module['image_width'] <= 0 || (string)((int)$module['image_width']) != $module['image_width']) {
					$errors = true;
					$this->error['modules'][$idx]['image_width'] = $this->language->get('error_positive_integer');
				}

				if ((int)$module['image_height'] <= 0 || (string)((int)$module['image_height']) != $module['image_height']) {
					$errors = true;
					$this->error['modules'][$idx]['image_height'] = $this->language->get('error_positive_integer');
				}

				if ((int)$module['products_per_page'] < 0 || (string)((int)$module['products_per_page']) != $module['products_per_page']) {
					$errors = true;
					$this->error['modules'][$idx]['products_per_page'] = $this->language->get('error_positive_integer');
				}
			}
		}

		if ($errors) {
			$this->alert['warning']['warning'] = $this->language->get('error_warning');
		}

		if (!$errors) {
			return $this->validate();
		} else {
			return false;
		}
	}

	private function validateModuleForm(&$data) {
		$errors = false;

		if (isset($data['names'])) {
			foreach ((array)$data['names'] as $language_id => $value) {
				if (!utf8_strlen($value)) {
					$errors = true;
					$this->error['names'][$language_id]['name'] = $this->language->get('error_module_name');
				}
			}
		} else {
			$errors = true;
		}

		if ((int)$data['image_width'] <= 0 || (string)((int)$data['image_width']) != $data['image_width']) {
			$errors = true;
			$this->error['image_width'] = $this->language->get('error_positive_integer');
		}

		if ((int)$data['image_height'] <= 0 || (string)((int)$data['image_height']) != $data['image_height']) {
			$errors = true;
			$this->error['image_height'] = $this->language->get('error_positive_integer');
		}

		if ((int)$data['products_per_page'] < 0 || (string)((int)$data['products_per_page']) != $data['products_per_page']) {
			$errors = true;
			$this->error['products_per_page'] = $this->language->get('error_positive_integer');
		}

		if ($errors) {
			$this->alert['warning']['warning'] = $this->language->get('error_warning');
		}

		if (!$errors) {
			return $this->validate();
		} else {
			return false;
		}
	}

	protected function installedVersion() {
		$installed_version = $this->config->get('module_similar_products_installed_version');
		return $installed_version ? $installed_version : '4.1.8';
	}
}
