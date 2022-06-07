<?php
# Разработчик: Кузнецов Богдан
# ipol.ru
# ozon - служба доставки

class ControllerExtensionShippingOzon extends Controller
{
    private $error;

    private $extensionsLink;
    private $token;
    private $code;

    public function __construct($registry)
    {
        parent::__construct($registry);

        // Module Constants
        if (VERSION >= '3.0.0.0') {
            $this->token = sprintf('user_token=%s', $this->session->data['user_token']);
            $this->extensionsLink = 'marketplace/extension';
            $this->code = 'shipping_ozon';
        } elseif (VERSION >= '2.3.0.0') {
            $this->token = sprintf('token=%s', $this->session->data['token']);
            $this->extensionsLink = 'extension/extension';
            $this->code = 'ozon';
        }
    }

    public function index()
    {
        $language_array = $this->load->language('extension/shipping/ozon');
        foreach ($language_array as $language_key => $language_value) {
            $data[$language_key] = $language_value;
        }

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('setting/setting');
        $this->load->model('extension/shipping/ozon');
        $this->load->model('localisation/weight_class');

        # Currency
        $data['currencies'] = $this->model_extension_shipping_ozon->getCurrencies();

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting($this->code . '', $this->request->post);

            $this->session->data['success'] = 'Настройки успешно изменены!';

            $this->response->redirect($this->url->link('extension/shipping/ozon', $this->token . '&type=shipping', true));
        }

        # Heading_title
        $data['heading_title'] = $this->language->get('heading_title');

        # Buttons
        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = 'Назад';

        # Показать кнопку у заказов
        $data['buttons_with_ozon'] = array();
        $data['buttons_with_ozon'][0]['value'] = 0;
        $data['buttons_with_ozon'][0]['name'] = 'Только у заказов с доставкой Ozon';
        $data['buttons_with_ozon'][1]['value'] = 1;
        $data['buttons_with_ozon'][1]['name'] = 'Всегда';

        # success
        if (isset($this->session->data['success'])) {
            $data['success'] = $this->session->data['success'];
            unset($this->session->data['success']);
        } else {
            $data['success'] = '';
        }

        # errors
        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->error['name_door'])) {
            $data['error_name_door'] = $this->error['name_door'];
        } else {
            $data['error_name_door'] = '';
        }

        if (isset($this->error['name_terminal'])) {
            $data['error_name_terminal'] = $this->error['name_terminal'];
        } else {
            $data['error_name_terminal'] = '';
        }

        if (isset($this->error['name_postomat'])) {
            $data['error_name_postomat'] = $this->error['name_postomat'];
        } else {
            $data['error_name_postomat'] = '';
        }

        if (isset($this->error['client_id'])) {
            $data['error_client_id'] = $this->error['client_id'];
        } else {
            $data['error_client_id'] = '';
        }

        if (isset($this->error['client_secret'])) {
            $data['error_client_secret'] = $this->error['client_secret'];
        } else {
            $data['error_client_secret'] = '';
        }

        if (isset($this->error['weight'])) {
            $data['error_weight'] = $this->error['weight'];
        } else {
            $data['error_weight'] = '';
        }

        if (isset($this->error['length'])) {
            $data['error_length'] = $this->error['length'];
        } else {
            $data['error_length'] = '';
        }

        if (isset($this->error['width'])) {
            $data['error_width'] = $this->error['width'];
        } else {
            $data['error_width'] = '';
        }

        if (isset($this->error['content'])) {
            $data['error_content'] = $this->error['content'];
        } else {
            $data['error_content'] = '';
        }

        if (isset($this->error['height'])) {
            $data['error_height'] = $this->error['height'];
        } else {
            $data['error_height'] = '';
        }

        # Хлебные крошки
        $data['breadcrumbs'] = array();
        $data['breadcrumbs'][] = array('text' => $this->language->get('text_home'), 'href' => $this->url->link('common/dashboard', $this->token, true));
        $data['breadcrumbs'][] = array('text' => $this->language->get('text_extension'), 'href' => $this->url->link($this->extensionsLink, $this->token . '&type=shipping', true));
        $data['breadcrumbs'][] = array('text' => $this->language->get('heading_title') . $this->language->get('text_version'), 'href' => $this->url->link('extension/shipping/ozon', $this->token, true));

        # links
        $data['action'] = $this->url->link('extension/shipping/ozon', $this->token, true);
        $data['cancel'] = $this->url->link($this->extensionsLink, $this->token . '&type=shipping', true);
        $data['import'] = $this->url->link('extension/shipping/ozon/importDel', $this->token, true);
        $data['orders'] = $this->url->link('sale/order', $this->token, true);

        if (VERSION >= '3.0.0.0') {
            $data['user_token'] = $this->session->data['user_token'];
        } elseif (VERSION >= '2.3.0.0') {
            $data['token'] = $this->session->data['token'];
        }

        #Main status
        if (isset($this->request->post[$this->code . '_status'])) {
            $data[$this->code . '_status'] = $this->request->post[$this->code . '_status'];
        } else {
            $data[$this->code . '_status'] = $this->config->get($this->code . '_status');
        }

        #Сортировка общая
        if (isset($this->request->post[$this->code . '_sort_order'])) {
            $data[$this->code . '_sort_order'] = $this->request->post[$this->code . '_sort_order'];
        } else {
            $data[$this->code . '_sort_order'] = $this->config->get($this->code . '_sort_order');
        }

        #Частичная выдача
        if (isset($this->request->post[$this->code . '_uncovering'])) {
            $data[$this->code . '_uncovering'] = true;
        } else {
            $data[$this->code . '_uncovering'] = $this->config->get($this->code . '_uncovering');
        }

        if (isset($this->request->post[$this->code . '_partial_delivery'])) {
            $data[$this->code . '_partial_delivery'] = true;
        } else {
            $data[$this->code . '_partial_delivery'] = $this->config->get($this->code . '_partial_delivery');
        }

        #Имена
        if (isset($this->request->post[$this->code . '_name_door'])) {
            $data[$this->code . '_name_door'] = $this->request->post[$this->code . '_name_door'];
        } else {
            $data[$this->code . '_name_door'] = $this->config->get($this->code . '_name_door');
        }

        if (isset($this->request->post[$this->code . '_name_terminal'])) {
            $data[$this->code . '_name_terminal'] = $this->request->post[$this->code . '_name_terminal'];
        } else {
            $data[$this->code . '_name_terminal'] = $this->config->get($this->code . '_name_terminal');
        }

        if (isset($this->request->post[$this->code . '_name_postomat'])) {
            $data[$this->code . '_name_postomat'] = $this->request->post[$this->code . '_name_postomat'];
        } else {
            $data[$this->code . '_name_postomat'] = $this->config->get($this->code . '_name_postomat');
        }

        #Статусы
        if (isset($this->request->post[$this->code . '_door_status'])) {
            $data[$this->code . '_door_status'] = $this->request->post[$this->code . '_door_status'];
        } else {
            $data[$this->code . '_door_status'] = $this->config->get($this->code . '_door_status');
        }

        if (isset($this->request->post[$this->code . '_terminal_status'])) {
            $data[$this->code . '_terminal_status'] = $this->request->post[$this->code . '_terminal_status'];
        } else {
            $data[$this->code . '_terminal_status'] = $this->config->get($this->code . '_terminal_status');
        }

        if (isset($this->request->post[$this->code . '_postomat_status'])) {
            $data[$this->code . '_postomat_status'] = $this->request->post[$this->code . '_postomat_status'];
        } else {
            $data[$this->code . '_postomat_status'] = $this->config->get($this->code . '_postomat_status');
        }

        #Описание
        if (isset($this->request->post[$this->code . '_description_door'])) {
            $data[$this->code . '_description_door'] = $this->request->post[$this->code . '_description_door'];
        } else {
            $data[$this->code . '_description_door'] = $this->config->get($this->code . '_description_door');
        }

        if (isset($this->request->post[$this->code . '_description_terminal'])) {
            $data[$this->code . '_description_terminal'] = $this->request->post[$this->code . '_description_terminal'];
        } else {
            $data[$this->code . '_description_terminal'] = $this->config->get($this->code . '_description_terminal');
        }

        if (isset($this->request->post[$this->code . '_description_postomat'])) {
            $data[$this->code . '_description_postomat'] = $this->request->post[$this->code . '_description_postomat'];
        } else {
            $data[$this->code . '_description_postomat'] = $this->config->get($this->code . '_description_postomat');
        }

        #Наценка
        if (isset($this->request->post[$this->code . '_markup_door'])) {
            $data[$this->code . '_markup_door'] = $this->request->post[$this->code . '_markup_door'];
        } else {
            $data[$this->code . '_markup_door'] = $this->config->get($this->code . '_markup_door');
        }

        if (isset($this->request->post[$this->code . '_markup_terminal'])) {
            $data[$this->code . '_markup_terminal'] = $this->request->post[$this->code . '_markup_terminal'];
        } else {
            $data[$this->code . '_markup_terminal'] = $this->config->get($this->code . '_markup_terminal');
        }

        if (isset($this->request->post[$this->code . '_markup_postomat'])) {
            $data[$this->code . '_markup_postomat'] = $this->request->post[$this->code . '_markup_postomat'];
        } else {
            $data[$this->code . '_markup_postomat'] = $this->config->get($this->code . '_markup_postomat');
        }

        #Тип наценки
        if (isset($this->request->post[$this->code . '_markup_type_door'])) {
            $data[$this->code . '_markup_type_door'] = $this->request->post[$this->code . '_markup_type_door'];
        } else {
            $data[$this->code . '_markup_type_door'] = $this->config->get($this->code . '_markup_type_door');
        }

        if (isset($this->request->post[$this->code . '_markup_type_terminal'])) {
            $data[$this->code . '_markup_type_terminal'] = $this->request->post[$this->code . '_markup_type_terminal'];
        } else {
            $data[$this->code . '_markup_type_terminal'] = $this->config->get($this->code . '_markup_type_terminal');
        }

        if (isset($this->request->post[$this->code . '_markup_type_postomat'])) {
            $data[$this->code . '_markup_type_postomat'] = $this->request->post[$this->code . '_markup_type_postomat'];
        } else {
            $data[$this->code . '_markup_type_postomat'] = $this->config->get($this->code . '_markup_type_postomat');
        }

        #Image
        $this->load->model('tool/image');

        $data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);

        if (isset($this->request->post[$this->code . '_image_door'])) {
            $data[$this->code . '_image_door'] = $this->request->post[$this->code . '_image_door'];
        } else {
            $data[$this->code . '_image_door'] = $this->config->get($this->code . '_image_door');
        }

        if (isset($this->request->post[$this->code . '_image_door']) && is_file(DIR_IMAGE . $this->request->post[$this->code . '_image_door'])) {
            $data[$this->code . '_thumb_door'] = $this->model_tool_image->resize($this->request->post[$this->code . '_image_door'], 100, 100);
        } elseif ($this->config->get($this->code . '_image_door') && is_file(DIR_IMAGE . $this->config->get($this->code . '_image_door'))) {
            $data[$this->code . '_thumb_door'] = $this->model_tool_image->resize($this->config->get($this->code . '_image_door'), 100, 100);
        } else {
            $data[$this->code . '_thumb_door'] = $this->model_tool_image->resize('no_image.png', 100, 100);
        }

        if (isset($this->request->post[$this->code . '_image_terminal'])) {
            $data[$this->code . '_image_terminal'] = $this->request->post[$this->code . '_image_terminal'];
        } else {
            $data[$this->code . '_image_terminal'] = $this->config->get($this->code . '_image_terminal');
        }

        if (isset($this->request->post[$this->code . '_image_terminal']) && is_file(DIR_IMAGE . $this->request->post[$this->code . '_image_terminal'])) {
            $data[$this->code . '_thumb_terminal'] = $this->model_tool_image->resize($this->request->post[$this->code . '_image_terminal'], 100, 100);
        } elseif ($this->config->get($this->code . '_image_terminal') && is_file(DIR_IMAGE . $this->config->get($this->code . '_image_terminal'))) {
            $data[$this->code . '_thumb_terminal'] = $this->model_tool_image->resize($this->config->get($this->code . '_image_terminal'), 100, 100);
        } else {
            $data[$this->code . '_thumb_terminal'] = $this->model_tool_image->resize('no_image.png', 100, 100);
        }

        if (isset($this->request->post[$this->code . '_image_postomat'])) {
            $data[$this->code . '_image_postomat'] = $this->request->post[$this->code . '_image_postomat'];
        } else {
            $data[$this->code . '_image_postomat'] = $this->config->get($this->code . '_image_postomat');
        }

        if (isset($this->request->post[$this->code . '_image_postomat']) && is_file(DIR_IMAGE . $this->request->post[$this->code . '_image_postomat'])) {
            $data[$this->code . '_thumb_postomat'] = $this->model_tool_image->resize($this->request->post[$this->code . '_image_postomat'], 100, 100);
        } elseif ($this->config->get($this->code . '_image_postomat') && is_file(DIR_IMAGE . $this->config->get($this->code . '_image_postomat'))) {
            $data[$this->code . '_thumb_postomat'] = $this->model_tool_image->resize($this->config->get($this->code . '_image_postomat'), 100, 100);
        } else {
            $data[$this->code . '_thumb_postomat'] = $this->model_tool_image->resize('no_image.png', 100, 100);
        }

        #Основные настройки
        if (isset($this->request->post[$this->code . '_client_id'])) {
            $data[$this->code . '_client_id'] = $this->request->post[$this->code . '_client_id'];
        } else {
            $data[$this->code . '_client_id'] = $this->config->get($this->code . '_client_id');
        }

        if (isset($this->request->post[$this->code . '_client_secret'])) {
            $data[$this->code . '_client_secret'] = $this->request->post[$this->code . '_client_secret'];
        } else {
            $data[$this->code . '_client_secret'] = $this->config->get($this->code . '_client_secret');
        }

        if (isset($this->request->post[$this->code . '_test'])) {
            $data[$this->code . '_test'] = $this->request->post[$this->code . '_test'];
        } else {
            $data[$this->code . '_test'] = $this->config->get($this->code . '_test');
        }

        if (isset($this->request->post[$this->code . '_button'])) {
            $data[$this->code . '_button'] = $this->request->post[$this->code . '_button'];
        } else {
            $data[$this->code . '_button'] = $this->config->get($this->code . '_button');
        }

        if (isset($this->request->post[$this->code . '_pvz'])) {
            $data[$this->code . '_pvz'] = $this->request->post[$this->code . '_pvz'];
        } else {
            $data[$this->code . '_pvz'] = $this->config->get($this->code . '_pvz');
        }

        if (isset($this->request->post[$this->code . '_yandex_api'])) {
            $data[$this->code . '_yandex_api'] = $this->request->post[$this->code . '_yandex_api'];
        } else {
            $data[$this->code . '_yandex_api'] = $this->config->get($this->code . '_yandex_api');
        }

        if (isset($this->request->post[$this->code . '_api_map'])) {
            $data[$this->code . '_api_map'] = $this->request->post[$this->code . '_api_map'];
        } else {
            $data[$this->code . '_api_map'] = $this->config->get($this->code . '_api_map');
        }

        #Габариты и вес
        if (isset($this->request->post[$this->code . '_weight'])) {
            $data[$this->code . '_weight'] = $this->request->post[$this->code . '_weight'];
        } elseif ($this->config->get($this->code . '_weight')) {
            $data[$this->code . '_weight'] = $this->config->get($this->code . '_weight');
        } else {
            $data[$this->code . '_weight'] = 1000;
        }

        if (isset($this->request->post[$this->code . '_length'])) {
            $data[$this->code . '_length'] = $this->request->post[$this->code . '_length'];
        } elseif ($this->config->get($this->code . '_length')) {
            $data[$this->code . '_length'] = $this->config->get($this->code . '_length');
        } else {
            $data[$this->code . '_length'] = 200;
        }

        if (isset($this->request->post[$this->code . '_width'])) {
            $data[$this->code . '_width'] = $this->request->post[$this->code . '_width'];
        } elseif ($this->config->get($this->code . '_width')) {
            $data[$this->code . '_width'] = $this->config->get($this->code . '_width');
        } else {
            $data[$this->code . '_width'] = 100;
        }

        if (isset($this->request->post[$this->code . '_height'])) {
            $data[$this->code . '_height'] = $this->request->post[$this->code . '_height'];
        } elseif ($this->config->get($this->code . '_height')) {
            $data[$this->code . '_height'] = $this->config->get($this->code . '_height');
        } else {
            $data[$this->code . '_height'] = 200;
        }

        #Расчёт доставки
        if (isset($this->request->post[$this->code . '_insurance'])) {
            $data[$this->code . '_insurance'] = $this->request->post[$this->code . '_insurance'];
        } else {
            $data[$this->code . '_insurance'] = $this->config->get($this->code . '_insurance');
        }

        $this->load->model('customer/customer_group');

        $data['customer_groups'] = $this->model_customer_customer_group->getCustomerGroups();

        /* Способы оплаты */
        $results_payment = $this->model_extension_shipping_ozon->getExtensions('payment');

        foreach ($results_payment as $result) {
            if (VERSION >= '3.0.0.0') {
                $code = 'payment_' . $result['code'];
            } else {
                $code = $result['code'];
            }

            if ($this->config->get($code . '_status')) {
                $title = $this->getPayment($result['code']);

                $method_data[] = array(
                    'code' => $result['code'],
                    'sort_order' => $this->config->get($code . '_sort_order'),
                    'title' => $title
                );
            }
        }

        $sort_order = array();

        foreach ($method_data as $key => $value) {
            $sort_order[$key] = $value['sort_order'];
        }

        array_multisort($sort_order, SORT_ASC, $method_data);

        $data['payment_methods'] = $method_data;

        /* Группа пользователей и платёжки */
        foreach ($data['customer_groups'] as $group) {
            if (isset($this->request->post[$this->code . '_face_type_' . $group['customer_group_id']])) {
                $data[$this->code . '_face_type_' . $group['customer_group_id']] = $this->request->post[$this->code . '_face_type_' . $group['customer_group_id']];
            } else {
                $data[$this->code . '_face_type_' . $group['customer_group_id']] = $this->config->get($this->code . '_face_type_' . $group['customer_group_id']);
            }

            if (isset($this->request->post[$this->code . '_bind_payment_' . $group['customer_group_id']])) {
                $data[$this->code . '_bind_payment_' . $group['customer_group_id']] = $this->request->post[$this->code . '_bind_payment_' . $group['customer_group_id']];
            } else {
                $data[$this->code . '_bind_payment_' . $group['customer_group_id']] = $this->config->get($this->code . '_bind_payment_' . $group['customer_group_id']);
            }

            if (is_array($data[$this->code . '_bind_payment_' . $group['customer_group_id']])) {
                foreach ($data[$this->code . '_bind_payment_' . $group['customer_group_id']] as $key => $mthd) {
                    $data[$this->code . '_bind_payment_' . $group['customer_group_id'] . $mthd] = $mthd;
                }
            }

            $minimum_customer_id[] = $group['customer_group_id'];
        }

        $data['minimum_customer_id'] = min($minimum_customer_id);

        #Отправитель
        if (isset($this->request->post[$this->code . '_fio'])) {
            $data[$this->code . '_fio'] = $this->request->post[$this->code . '_fio'];
        } else {
            $data[$this->code . '_fio'] = $this->config->get($this->code . '_fio');
        }

        if (isset($this->request->post[$this->code . '_phone_sender'])) {
            $data[$this->code . '_phone_sender'] = $this->request->post[$this->code . '_phone_sender'];
        } else {
            $data[$this->code . '_phone_sender'] = $this->config->get($this->code . '_phone_sender');
        }

        if (isset($this->request->post[$this->code . '_email_sender'])) {
            $data[$this->code . '_email_sender'] = $this->request->post[$this->code . '_email_sender'];
        } else {
            $data[$this->code . '_email_sender'] = $this->config->get($this->code . '_email_sender');
        }

        if (isset($this->request->post[$this->code . '_type'])) {
            $data[$this->code . '_type'] = true;
        } else {
            $data[$this->code . '_type'] = $this->config->get($this->code . '_type');
        }

        if (isset($this->request->post[$this->code . '_company'])) {
            $data[$this->code . '_company'] = $this->request->post[$this->code . '_company'];
        } else {
            $data[$this->code . '_company'] = $this->config->get($this->code . '_company');
        }

        if (isset($this->request->post[$this->code . '_warehouse'])) {
            $data[$this->code . '_warehouse'] = $this->request->post[$this->code . '_warehouse'];
        } else {
            $data[$this->code . '_warehouse'] = $this->config->get($this->code . '_warehouse');
        }

        if (isset($this->request->post[$this->code . '_warehouse_id'])) {
            $data[$this->code . '_warehouse_id'] = $this->request->post[$this->code . '_warehouse_id'];
        } else {
            $data[$this->code . '_warehouse_id'] = $this->config->get($this->code . '_warehouse_id');
        }

        if (isset($this->request->post[$this->code . '_warehouse_city'])) {
            $data[$this->code . '_warehouse_city'] = $this->request->post[$this->code . '_warehouse_city'];
        } else {
            $data[$this->code . '_warehouse_city'] = $this->config->get($this->code . '_warehouse_city');
        }

        if (isset($this->request->post[$this->code . '_warehouse_address'])) {
            $data[$this->code . '_warehouse_address'] = $this->request->post[$this->code . '_warehouse_address'];
        } else {
            $data[$this->code . '_warehouse_address'] = $this->config->get($this->code . '_warehouse_address');
        }

        #Описание отправки

        if (isset($this->request->post[$this->code . '_prefix_order'])) {
            $data[$this->code . '_prefix_order'] = $this->request->post[$this->code . '_prefix_order'];
        } else {
            $data[$this->code . '_prefix_order'] = $this->config->get($this->code . '_prefix_order');
        }

        #Статус
        if (isset($this->request->post[$this->code . '_track_status'])) {
            $data[$this->code . '_track_status'] = $this->request->post[$this->code . '_track_status'];
        } else {
            $data[$this->code . '_track_status'] = $this->config->get($this->code . '_track_status');
        }

        if (isset($this->request->post[$this->code . '_status_numb_5'])) {
            $data[$this->code . '_status_numb_5'] = $this->request->post[$this->code . '_status_numb_5'];
        } else {
            $data[$this->code . '_status_numb_5'] = $this->config->get($this->code . '_status_numb_5');
        }

        if (isset($this->request->post[$this->code . '_status_numb_10'])) {
            $data[$this->code . '_status_numb_10'] = $this->request->post[$this->code . '_status_numb_10'];
        } else {
            $data[$this->code . '_status_numb_10'] = $this->config->get($this->code . '_status_numb_10');
        }

        if (isset($this->request->post[$this->code . '_status_numb_1005'])) {
            $data[$this->code . '_status_numb_1005'] = $this->request->post[$this->code . '_status_numb_1005'];
        } else {
            $data[$this->code . '_status_numb_1005'] = $this->config->get($this->code . '_status_numb_1005');
        }

        if (isset($this->request->post[$this->code . '_status_numb_1010'])) {
            $data[$this->code . '_status_numb_1010'] = $this->request->post[$this->code . '_status_numb_1010'];
        } else {
            $data[$this->code . '_status_numb_1010'] = $this->config->get($this->code . '_status_numb_1010');
        }

        if (isset($this->request->post[$this->code . '_status_numb_20'])) {
            $data[$this->code . '_status_numb_20'] = $this->request->post[$this->code . '_status_numb_20'];
        } else {
            $data[$this->code . '_status_numb_20'] = $this->config->get($this->code . '_status_numb_20');
        }

        if (isset($this->request->post[$this->code . '_status_numb_40'])) {
            $data[$this->code . '_status_numb_40'] = $this->request->post[$this->code . '_status_numb_40'];
        } else {
            $data[$this->code . '_status_numb_40'] = $this->config->get($this->code . '_status_numb_40');
        }

        if (isset($this->request->post[$this->code . '_status_numb_45'])) {
            $data[$this->code . '_status_numb_45'] = $this->request->post[$this->code . '_status_numb_45'];
        } else {
            $data[$this->code . '_status_numb_45'] = $this->config->get($this->code . '_status_numb_45');
        }

        if (isset($this->request->post[$this->code . '_status_numb_50'])) {
            $data[$this->code . '_status_numb_50'] = $this->request->post[$this->code . '_status_numb_50'];
        } else {
            $data[$this->code . '_status_numb_50'] = $this->config->get($this->code . '_status_numb_50');
        }

        if (isset($this->request->post[$this->code . '_status_numb_60'])) {
            $data[$this->code . '_status_numb_60'] = $this->request->post[$this->code . '_status_numb_60'];
        } else {
            $data[$this->code . '_status_numb_60'] = $this->config->get($this->code . '_status_numb_60');
        }

        if (isset($this->request->post[$this->code . '_status_numb_65'])) {
            $data[$this->code . '_status_numb_65'] = $this->request->post[$this->code . '_status_numb_65'];
        } else {
            $data[$this->code . '_status_numb_65'] = $this->config->get($this->code . '_status_numb_65');
        }

        if (isset($this->request->post[$this->code . '_status_numb_70'])) {
            $data[$this->code . '_status_numb_70'] = $this->request->post[$this->code . '_status_numb_70'];
        } else {
            $data[$this->code . '_status_numb_70'] = $this->config->get($this->code . '_status_numb_70');
        }

        if (isset($this->request->post[$this->code . '_status_numb_80'])) {
            $data[$this->code . '_status_numb_80'] = $this->request->post[$this->code . '_status_numb_80'];
        } else {
            $data[$this->code . '_status_numb_80'] = $this->config->get($this->code . '_status_numb_80');
        }

        if (isset($this->request->post[$this->code . '_status_numb_90'])) {
            $data[$this->code . '_status_numb_90'] = $this->request->post[$this->code . '_status_numb_90'];
        } else {
            $data[$this->code . '_status_numb_90'] = $this->config->get($this->code . '_status_numb_90');
        }

        if (isset($this->request->post[$this->code . '_status_numb_100'])) {
            $data[$this->code . '_status_numb_100'] = $this->request->post[$this->code . '_status_numb_100'];
        } else {
            $data[$this->code . '_status_numb_100'] = $this->config->get($this->code . '_status_numb_100');
        }

        if (isset($this->request->post[$this->code . '_status_numb_110'])) {
            $data[$this->code . '_status_numb_110'] = $this->request->post[$this->code . '_status_numb_110'];
        } else {
            $data[$this->code . '_status_numb_110'] = $this->config->get($this->code . '_status_numb_110');
        }

        if (isset($this->request->post[$this->code . '_status_numb_115'])) {
            $data[$this->code . '_status_numb_115'] = $this->request->post[$this->code . '_status_numb_115'];
        } else {
            $data[$this->code . '_status_numb_115'] = $this->config->get($this->code . '_status_numb_115');
        }

        if (isset($this->request->post[$this->code . '_status_numb_120'])) {
            $data[$this->code . '_status_numb_120'] = $this->request->post[$this->code . '_status_numb_120'];
        } else {
            $data[$this->code . '_status_numb_120'] = $this->config->get($this->code . '_status_numb_120');
        }

        $this->load->model('localisation/order_status');

        $data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/shipping/ozon', $data));
    }

    # Получение списка оплат(вкл)
    public function getPayment($code)
    {
        $this->load->language('extension/payment/' . $code);

        $title = $this->language->get('heading_title');

        return $title;
    }

    # Подключение Application
    public function getApp()
    {

        require DIR_SYSTEM . 'library/lib/autoload.php';

        $app = new Ipol\Ozon\Ozon\OzonApplication(
            $this->config->get($this->code . '_client_id') ? $this->config->get($this->code . '_client_id') : 'TestIpol_19eec072-e561-48e1-96bf-35440dc93616', //client_id
            $this->config->get($this->code . '_client_secret') ? $this->config->get($this->code . '_client_secret') : 'dEZOJUb97kKGG0LwkInjO/ac8v/K8o+ve5II7/wSzx4=', //client_secret
            $this->config->get($this->code . '_test') ? true : false, //true – for test api, false, for production
            50, //timeout for curl (sec)
            null, //implement of Ipol\Ozon\Api\Entity\EncoderInterface – used if site can work not in UTF-8
            null, // implement of  Ipol\Ozon\Core\Entity \CacheInterface – cache or die :[
            null //new Ipol\Ozon\Admin\ToFileLoggerController(DIR_SYSTEM.'../logger.txt')
        );

        return $app;
    }

    # Import
    public function importDel()
    {
        unset($this->session->data['countDeliveryVariants']);
        unset($this->session->data['PageToken']);

        $this->load->model('extension/shipping/ozon');

        $this->model_extension_shipping_ozon->clearOzon();
        $this->response->redirect($this->url->link('extension/shipping/ozon/import', $this->token . '&type=shipping', true));
    }

    public function import()
    {
        $this->load->model('extension/shipping/ozon');

        ini_set('error_reporting', E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);

        $app = $this->getApp();
        $start_time = time();
        $deliveryFromPlaces = $app->deliveryFromPlaces();

        if ($deliveryFromPlaces->isSuccess() == true) {
            $count_placed_api = count($deliveryFromPlaces->getResponse()->getFields()['places']);
            $count_placed_data = $this->model_extension_shipping_ozon->getCountPlaced();

            if ($count_placed_api > $count_placed_data) {
                $this->model_extension_shipping_ozon->deletePlaced();

                foreach ($deliveryFromPlaces->getResponse()->getFields()['places'] as $row) {
                    $this->model_extension_shipping_ozon->addPlaced($row);
                }

                header("refresh: 3");
                echo 'Ожидайте..';
            } else {
                if (isset($this->session->data['PageToken'])) {
                    $deliveryVariants = $app->deliveryVariants(null, false, false, 500, $this->session->data['PageToken']);
                } else {
                    $deliveryVariants = $app->deliveryVariants(null, false, false, 500);
                }

                $count500 = 1;

                if ($deliveryVariants->isSuccess() == true) {
                    if ($deliveryVariants->getNextPageToken()) {
                        $this->session->data['PageToken'] = $deliveryVariants->getNextPageToken();
                    } else {
                        unset($this->session->data['PageToken']);
                        $lastArray = end($deliveryVariants->getResponse()->getData()->getFields());
                    }

                    if (isset($this->session->data['countDeliveryVariants'])) {
                        $i = $this->session->data['countDeliveryVariants'];
                    } else {
                        $i = 1;
                    }

                    foreach ($deliveryVariants->getResponse()->getData()->getFields() as $delivery) {

                        if ($this->isNeedBreak($start_time)) {
                            header("refresh: 4");
                            echo 'Импортированно ' . $this->session->data['countDeliveryVariants'];
                            die();
                        }

                        $this->model_extension_shipping_ozon->addDeliveryVariant($delivery);

                        $count500++;

                        $i++;
                        $this->session->data['countDeliveryVariants'] = $i;

                        if (!isset($this->session->data['PageToken']) && isset($lastArray) && $lastArray['id'] == $delivery['id']) {
                            $this->session->data['success'] = 'Импорт успешно завершен!';
                            $this->response->redirect($this->url->link('extension/shipping/ozon', $this->token . '&type=shipping', true));
                        }

                        if ($count500 > 500) {
                            header("refresh: 4");
                            echo 'Импортированно ' . $this->session->data['countDeliveryVariants'];
                            die();
                        }
                    }
                } elseif ($app->getErrorCollection()->getFirst()) {
                    $error = $app->getErrorCollection()->getFirst();
                    die($error->getMessage() . PHP_EOL);
                } else {
                    die($deliveryVariants->getResponse()->getMessage());
                }
            }

        } elseif ($app->getErrorCollection()->getFirst()) {
            $error = $app->getErrorCollection()->getFirst();

            if (trim($error->getMessage() . PHP_EOL) == 'invalid_client') {
                die('Ошибка авторизации');
            } else {
                die($error->getMessage() . PHP_EOL);
            }
        } else {
            die($deliveryFromPlaces->getResponse()->getMessage());
        }
    }

    # Необходимость прерывания скрипта
    public static function isNeedBreak($start_time)
    {
        $max_time = 50;

        if ($max_time > 0) {
            return time() >= ($start_time + $max_time - 5);
        }

        return $max_time;
    }

    # Подбор списка складов для настроек
    public function autocomplete()
    {
        $this->load->model('extension/shipping/ozon');

        $json = array();
        $sort_order = array();

        $places = $this->model_extension_shipping_ozon->getPlaced(mb_strtolower($this->request->get['filter_name']));

        foreach ($places as $row) {
            $json[] = array(
                'id' => $row['placedId'],
                'name' => strip_tags(html_entity_decode($row['name'], ENT_QUOTES, 'UTF-8')),
                'city' => $row['city'],
                'address' => $row['address']
            );
        }

        foreach ($json as $key => $value) {
            $sort_order[$key] = $value['name'];
        }

        array_multisort($sort_order, SORT_ASC, $json);

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    # Подбор списка складов для заказа
    public function autocompletePlacedOrder()
    {
        $this->load->model('extension/shipping/ozon');

        $json = array();
        $sort_order = array();

        $places = $this->model_extension_shipping_ozon->getPlacedOrder(mb_strtolower($this->request->get['filter_name']));

        foreach ($places as $row) {
            $json[] = array(
                'id' => $row['placedId'],
                'name' => $row['placedId'] . ' (' . strip_tags(html_entity_decode($row['name'], ENT_QUOTES, 'UTF-8')) . ')',
            );
        }

        foreach ($json as $key => $value) {
            $sort_order[$key] = $value['id'];
        }

        array_multisort($sort_order, SORT_ASC, $json);

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    # Получение наклеек
    public function getStickers()
    {
        $json = array();

        if (isset($this->request->post['orders'])) {
            $app = $this->getApp();

            $this->load->model('extension/shipping/ozon');
            $save_error = 'Не удалось получить наклейки по заказам ';
            $json['error'] = '';

            foreach ($this->request->post['orders'] as $key => $order_id) {
                $order = $this->model_extension_shipping_ozon->getOrderOzon($order_id);

                if (!empty($order['posting_id'])) {
                    $json['link'] = $this->url->link('extension/shipping/ozon/getSticker&posting_id=' . $order['posting_id'] . '&' . $this->token, true);

                    $posting_id = $order['posting_id'];

                    $name = $posting_id . '.pdf';
                    $path = DIR_SYSTEM . 'library/lib/docs/stickers/' . $name;

                    if (!file_exists($path)) {
                        $str64 = $app->getBarcodePdf($posting_id);

                        if ($str64->isSuccess() == false) {
                            $json['error'] .= $order_id . ',';
                        } else {
                            $sticker = base64_decode($str64->getResponse()->getBarcode());
                            file_put_contents($path, $sticker);
                        }
                    }
                } else {
                    $json['error'] .= $order_id . ',';
                }
            }

            if (!empty($json['error'])) {
                $json['error'] = substr($json['error'], 0, -1);
                $json['error'] = $save_error . $json['error'];
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    # Получение наклейки
    public function getSticker()
    {
        $app = $this->getApp();

        if (isset($this->request->get['posting_id'])) {
            $name = $this->request->get['posting_id'] . '.pdf';
            $path = DIR_SYSTEM . 'library/lib/docs/stickers/' . $name;

            if (!file_exists($path)) {
                $str64 = $app->getBarcodePdf($this->request->get['posting_id']);

                if ($str64->isSuccess() == false) {
                    die($str64->getResponse()->getMessage());
                } else {
                    $sticker = base64_decode($str64->getResponse()->getBarcode());
                    file_put_contents($path, $sticker);
                }
            }

            header('Content-type:application/pdf');
            header('Content-disposition: inline; filename="' . $name . '"');
            header('content-Transfer-Encoding:binary');
            header('Accept-Ranges:bytes');

            readfile($path);
        } else {
            $this->response->redirect($this->url->link('sale/order', $this->token, true));
        }
    }

    # Получение актов
    public static function getActs($type = 'Act', $format = 'pdf')
    {
        $json = array();
        $postingIds = array();

        if (isset($this->request->post['orders'])) {
            $app = $this->getApp();

            $this->load->model('extension/shipping/ozon');

            foreach ($this->request->post['orders'] as $key => $order_id) {
                $order = $this->model_extension_shipping_ozon->getOrderOzon($order_id);
                $postingIds[$key] = (int)$order['posting_id'];

                $postingId = $order['posting_id'];
                $document_id = $order['document_id'];
            }

            if ($document_id > 0) {
                $name = $document_id . '.pdf';
                $path = DIR_SYSTEM . 'library/lib/docs/acts/' . $name;
            } else {
                $createDocs = $app->createDocument($postingIds);

                if ($createDocs->isSuccess() == false) {
                    $this->log->write($createDocs);
                    $json['error'] = $createDocs->getResponse()->getMessage();
                } else {
                    $document_id = $createDocs->getResponse()->getDocumentId();

                    $name = $document_id . '.pdf';
                    $path = DIR_SYSTEM . 'library/lib/docs/acts/' . $name;

                    foreach ($postingIds as $posting_id) {
                        $this->model_extension_shipping_ozon->setDocument($document_id, $posting_id);
                    }
                }
            }

            if (!file_exists($path)) {
                $str64 = $app->getDocument($document_id, $type, $format);

                if ($str64->isSuccess() == false) {
                    $json['error'] = $str64->getResponse()->getMessage();
                } else {
                    $act = base64_decode($str64->getResponse()->getDocumentBytes());
                    file_put_contents($path, $act);
                }
            }

            if (!empty($json['error'])) {
                $json['link'] = $this->url->link('extension/shipping/ozon/getAct&posting_id=' . $postingId . '&' . $this->token, true);
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    # Получение акта
    public static function getAct($type = 'Act', $format = 'pdf')
    {
        ini_set('error_reporting', E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);

        if (isset($this->request->get['posting_id'])) {
            $this->load->model('extension/shipping/ozon');

            $document_id = $this->model_extension_shipping_ozon->getDocument($this->request->get['posting_id']);

            $app = $this->getApp();

            $postingIds = array();

            if ($document_id > 0) {
                $name = $document_id . '.pdf';
                $path = DIR_SYSTEM . 'library/lib/docs/acts/' . $name;
            } else {
                /*$documents = $this->model_extension_shipping_ozon->getDocuments();
                if(!empty($documents)){
                    foreach($documents as $key => $row){
                        $postingIds[$key] = (int)$row['posting_id'];
                    }

                    $createDocs = $app->createDocument($postingIds);

                    if($createDocs->isSuccess() == false){
                        $this->log->write($createDocs);
                        die($createDocs->getResponse()->getMessage());
                    }else{
                        $this->log->write($createDocs);
                        $document_id = $createDocs->getResponse()->getDocumentId();

                        $name = $document_id . '.pdf';
                        $path = DIR_SYSTEM . 'library/lib/docs/acts/'.$name;

                        foreach($documents as $row){
                            $this->model_extension_shipping_ozon->setDocument($document_id, $row['posting_id']);
                        }
                    }
                }*/

                $postingIds[0] = (int)$this->request->get['posting_id'];

                $createDocs = $app->createDocument($postingIds);

                if ($createDocs->isSuccess() == false) {
                    $this->log->write($createDocs);
                    die($createDocs->getResponse()->getMessage());
                } else {
                    $this->log->write($createDocs);
                    $document_id = $createDocs->getResponse()->getDocumentId();

                    $name = $document_id . '.pdf';
                    $path = DIR_SYSTEM . 'library/lib/docs/acts/' . $name;

                    foreach ($documents as $row) {
                        $this->model_extension_shipping_ozon->setDocument($document_id, $row['posting_id']);
                    }
                }
            }

            if (!file_exists($path)) {
                $str64 = $app->getDocument($document_id, $type, $format);

                if ($str64->isSuccess() == false) {
                    die($str64->getResponse()->getMessage());
                } else {
                    $act = base64_decode($str64->getResponse()->getDocumentBytes());
                    file_put_contents($path, $act);
                }
            }

            header('Content-type:application/pdf');
            header('Content-disposition: inline; filename="' . $name . '"');
            header('content-Transfer-Encoding:binary');
            header('Accept-Ranges:bytes');

            readfile($path);
        } else {
            $this->response->redirect($this->url->link('sale/order', $this->token, true));
        }
    }

    # Получение статусов
    public function getStatus()
    {
        $app = $this->getApp();

        $this->load->model('extension/shipping/ozon');

        $postingIds = array();

        $orders = $this->model_extension_shipping_ozon->getOrders();

        foreach ($orders as $key => $row) {
            $postingIds[$key] = $row['posting_id'];
        }

        $checkStatuses = $app->trackingList($postingIds);

        $this->log->write($checkStatuses);

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
                $ozon['ozonStatus'] = $row['events'][0]['action'];
                $ozon['ozonStatusId'] = $row['events'][0]['eventId'];

                $this->model_extension_shipping_ozon->updateStatusPI($ozon, $posting_id);

                if ($this->config->get($this->code . '_status_numb_' . $ozon['ozonStatusId'])) {
                    $order_id = $this->model_extension_shipping_ozon->getOrderPI($posting_id);

                    if ($order_id > 0) {
                        $this->model_extension_shipping_ozon->updateStatusMainOrder($this->config->get($this->code . '_status_numb_' . $ozon['ozonStatusId']), $order_id);
                    }
                }
            }

            echo 'Синхронизация статусов завершена!';
        }
    }

    # Получить данные для формы заказа
    public function formOrder()
    {
        if (version_compare(phpversion(), '7.1', '>=')) {
            ini_set( 'serialize_precision', -1 );
        }

        $this->load->model('extension/shipping/ozon');
        $app = $this->getApp();

        $json = array();

        if (isset($this->request->post['order_id'])) {
            $order_id = $this->request->post['order_id'];
            $order_info = $this->model_extension_shipping_ozon->getOrderOzon($order_id);

            if (!empty($order_info)) {
                $json['ok'] = $order_info['ok'];
                $json['status'] = $order_info['ozonStatus'];
                $json['message'] = $order_info['message'];
                $json['posting_id'] = $order_info['posting_id'];

                $json['order_id'] = $order_id;

                $json['uptime'] = date('d-m-Y', $order_info['uptime']);

                if (isset($this->request->post['firstMileTransferFromPlaceId'])) {
                    $json['firstMileTransferFromPlaceId'] = $this->request->post['firstMileTransferFromPlaceId'];
                } else {
                    $json['firstMileTransferFromPlaceId'] = $order_info['firstMileTransferFromPlaceId'];
                }

                if (isset($this->request->post['allowUncovering'])) {
                    $json['allowUncovering'] = 1;
                } else {
                    $json['allowUncovering'] = $order_info['allowUncovering'];
                }

                if (isset($this->request->post['allowPartialDelivery'])) {
                    $json['allowPartialDelivery'] = 1;
                } else {
                    $json['allowPartialDelivery'] = $order_info['allowPartialDelivery'];
                }

                $json['goods'] = unserialize($order_info['goods']);

                if (isset($this->request->post['goods'])) {
                    if (isset($this->request->post['goods']['length'])) {
                        $json['goods']['length'] = $this->request->post['goods']['length'];
                    }

                    if (isset($this->request->post['goods']['width'])) {
                        $json['goods']['width'] = $this->request->post['goods']['width'];
                    }

                    if (isset($this->request->post['goods']['height'])) {
                        $json['goods']['height'] = $this->request->post['goods']['height'];
                    }

                    if (isset($this->request->post['goods']['weight'])) {
                        $json['goods']['weight'] = $this->request->post['goods']['weight'];
                    }
                }

                if (isset($this->request->post['buyerName'])) {
                    $json['buyerName'] = $this->request->post['buyerName'];
                } else {
                    $json['buyerName'] = $order_info['buyerName'];
                }

                if (isset($this->request->post['buyerPhone'])) {
                    $json['buyerPhone'] = $this->request->post['buyerPhone'];
                } else {
                    $json['buyerPhone'] = $order_info['buyerPhone'];
                }

                if (isset($this->request->post['buyerEmail'])) {
                    $json['buyerEmail'] = $this->request->post['buyerEmail'];
                } else {
                    $json['buyerEmail'] = $order_info['buyerEmail'];
                }

                if (isset($this->request->post['buyerType'])) {
                    $json['buyerType'] = $this->request->post['buyerType'];
                } else {
                    $json['buyerType'] = $order_info['buyerType'];
                }

                $json['deliveryVariantId'] = $order_info['deliveryVariantId'];

                if (isset($this->request->post['deliveryAddress'])) {
                    $json['deliveryAddress'] = $this->request->post['deliveryAddress'];
                } else {
                    $json['deliveryAddress'] = $order_info['deliveryAddress'];
                }

                if (isset($this->request->post['paymentType'])) {
                    $json['paymentType'] = $this->request->post['paymentType'];
                } else {
                    $json['paymentType'] = $order_info['paymentType'];
                }

                $json['paymentRecipientPaymentAmount'] = $order_info['paymentRecipientPaymentAmount'];

                if (isset($this->request->post['paymentDeliveryPrice'])) {
                    $json['paymentDeliveryPrice'] = $this->request->post['paymentDeliveryPrice'];
                } else {
                    $json['paymentDeliveryPrice'] = $order_info['paymentDeliveryPrice'];
                }

                if (isset($this->request->post['paymentDeliveryVatRate'])) {
                    $json['paymentDeliveryVatRate'] = $this->request->post['paymentDeliveryVatRate'];
                } else {
                    $json['paymentDeliveryVatRate'] = $order_info['paymentDeliveryVatRate'];
                }

                $json['paymentDeliveryVatSum'] = ($order_info['paymentDeliveryPrice'] * $order_info['paymentDeliveryVatRate']) / 100;

                if ($json['paymentType'] == 'FullPrepayment') {
                    $json['paymentPrepaymentAmount'] = $json['paymentRecipientPaymentAmount'] + $json['paymentDeliveryPrice'];
                    $isBeznal = true;
                } else {
                    $json['paymentPrepaymentAmount'] = 0;
                    $isBeznal = false;
                }

                $json['items'] = unserialize($order_info['items']);

                if (isset($this->request->post['item'])) {
                    foreach ($this->request->post['item'] as $key => $row) {
                        $json['items'][$key]['nds'] = (int)$row['nds'];

                        if (isset($row['price'])) {
                            $json['items'][$key]['tax'] = (int)(($row['price'] * $row['nds']) / 100);
                        } else {
                            $json['items'][$key]['tax'] = (int)(($json['items'][$key]['tax'] * $row['nds']) / 100);
                        }

                        if (isset($row['IsDangerous'])) {
                            $json['items'][$key]['IsDangerous'] = 1;
                        }

                        if (isset($row['estimated'])) {
                            $json['items'][$key]['estimated'] = $row['estimated'];
                        }
                    }
                }

                $json['estimated'] = $order_info['estimated'];

                if ($this->config->get($this->code . '_insurance')) {
                    $json['estimated'] = 0;
                    foreach ($json['items'] as $item) {
                        $json['estimated'] += $item['estimated'] * $item['quantity'];
                    }
                }

                # Сохраняем в базу
                if ($this->request->post['formType'] == 'save' or $this->request->post['formType'] == 'send') {
                    $this->model_extension_shipping_ozon->saveOrder($json, $order_id);
                }

                # Проверка статуса
                if ($this->request->post['formType'] == 'checkStatus') {
                    $checkStatus = $app->trackingByPostingNumber($order_info['posting_id']);

                    if ($checkStatus->isSuccess() == false) {
                        $json['error'] = $checkStatus->getResponse()->getMessage();
                    } else {
                        $ozon['ozonStatusId'] = $checkStatus->getResponse()->getItems()->getLast()->getEventId();
                        $ozon['ozonStatus'] = $checkStatus->getResponse()->getItems()->getLast()->getAction();

                        $json['status'] = $ozon['ozonStatus'];

                        $this->model_extension_shipping_ozon->updateStatus($ozon, $order_id);

                        if ($this->config->get($this->code . '_status_numb_' . $ozon['ozonStatusId'])) {
                            $this->model_extension_shipping_ozon->updateStatusMainOrder($this->config->get($this->code . '_status_numb_' . $ozon['ozonStatusId']), $order_id);
                        }
                    }
                }

                # Отмена отгрузки
                if ($this->request->post['formType'] == 'cancel') {
                    $remove = $app->manifestRemove($order_info['posting_number']);

                    if ($remove->isSuccess() == false) {
                        $json['error'] = $remove->getResponse()->getMessage();

                        $this->model_extension_shipping_ozon->setMessage($remove->getResponse()->getMessage(), $order_id);
                        $json['message'] = $remove->getResponse()->getMessage();
                    } else {
                        $ozon['ozon_id'] = 0;
                        $ozon['posting_number'] = '';
                        $ozon['posting_id'] = 0;
                        $ozon['ok'] = 'N';
                        $ozon['ozonStatus'] = 'Заявка Отменена';
                        $ozon['ozonStatusId'] = 0;

                        $this->model_extension_shipping_ozon->saveOrderOzon($ozon, $order_id);

                        $json['ok'] = 'N';
                        $json['status'] = 'Заявка Отменена';
                    }
                }

                # Отгрузка
                if ($this->request->post['formType'] == 'send') {
                    $cOrder = new \Ipol\Ozon\Core\Order\Order();

                    $itemCollection = new \Ipol\Ozon\Core\Order\ItemCollection();

                    foreach ($json['items'] as $row) {
                        $item = new \Ipol\Ozon\Core\Order\Item();

                        $item->setId($row['product_id'])
                            ->setArticul($row['model'])
                            ->setName($row['name'])
                            ->setWeight($row['weight'])
                            ->setPrice(new \Ipol\Ozon\Core\Entity\Money($row['price'])) //how match should buyer pay for item
                            ->setCost(new \Ipol\Ozon\Core\Entity\Money($row['estimated'])) //estimated item price
                            ->setQuantity($row['quantity'])
                            ->setVatSum(new \Ipol\Ozon\Core\Entity\Money($row['tax']))
                            ->setVatRate((int)$row['nds'])
                            ->setField('IsDangerous', $row['IsDangerous']);


                        $itemCollection->add($item);
                    }

                    $buyerCollection = new \Ipol\Ozon\Core\Order\BuyerCollection();
                    $buyer = new \Ipol\Ozon\Core\Order\Buyer();
                    $buyer->setFullName($json['buyerName'])
                        ->setPhone($json['buyerPhone'])
                        ->setEmail($json['buyerEmail'])
                        ->setField('PersonType', $json['buyerType']); // "LegalPerson" | "NaturalPerson"

                    if ($json['buyerType'] == 'LegalPerson' && !empty($order_info['buyerLegalName'])) {
                        $buyer->setField('Company', $order_info['buyerLegalName']);
                    }

                    $buyerCollection->add($buyer);

                    $goods = new \Ipol\Ozon\Core\Order\Goods(); //параметры посылки
                    $goods->setWeight($json['goods']['weight']) //грамм
                    ->setLength($json['goods']['length']) //см
                    ->setWidth($json['goods']['width'])
                        ->setHeight($json['goods']['height']);

                    $receiverCollection = new \Ipol\Ozon\Core\Order\ReceiverCollection();
                    $receiver = new \Ipol\Ozon\Core\Order\Receiver();
                    $receiver->setFullName($order_info['recipientName'])
                        ->setPhone($order_info['recipientPhone'])
                        ->setEmail($order_info['recipientEmail'])
                        ->setField('PersonType', $order_info['recipientType']); // "LegalPerson" | "NaturalPerson"

                    if ($order_info['recipientType'] == 'LegalPerson' && !empty($order_info['recipientLegalName'])) {
                        $receiver->setField('Company', $order_info['recipientLegalName']);
                    }

                    $receiverCollection->add($receiver);

                    $payment = new \Ipol\Ozon\Core\Order\Payment();
                    $payment->setGoods(new \Ipol\Ozon\Core\Entity\Money($json['paymentRecipientPaymentAmount'])) //стоимость товаров
                    ->setDelivery(new \Ipol\Ozon\Core\Entity\Money($json['paymentDeliveryPrice'])) //стоимость доставки
                    ->setNdsDelivery($json['paymentDeliveryVatRate']) //ндс доставки
                    ->setPayed(new \Ipol\Ozon\Core\Entity\Money($json['paymentPrepaymentAmount'])) //сумма оплаченная на сайте
                    ->setEstimated(new \Ipol\Ozon\Core\Entity\Money($json['estimated']))
                        ->setIsBeznal($isBeznal); //true for pre-payed orders, false for pay on delivery

                    $addressTo = new \Ipol\Ozon\Core\Order\Address();
                    $addressTo->setLine($json['deliveryAddress']); //line

                    $addressFrom = new \Ipol\Ozon\Core\Order\Address();
                    $addressFrom->setCode($json['firstMileTransferFromPlaceId']); //id склада отгрузки OZON, можно не задавать, если у клиента в ЛК он один подключен //TODO возможно не то свойство, уточню у Никиты. Ваня

                    $comment = '';
                    if (!empty($this->request->post['comment']) && $this->request->post['comment'] != 'undefined') {
                        $comment = $this->request->post['comment'];
                    }

                    $cOrder->setBuyers($buyerCollection)
                        ->setPayment($payment)
                        ->setAddressTo($addressTo)
                        ->setAddressFrom($addressFrom)
                        ->setGoods($goods)
                        ->setItems($itemCollection)
                        ->setNumber($order_id) //orderNumber in CMS
                        ->setField('DeliveryVariantId', $json['deliveryVariantId'])
                        ->setField('Source', 'opencart')
                        ->setField('Comment', $comment);

                    if (isset($receiverCollection))
                        $cOrder->setReceivers($receiverCollection);

                    $sendOrderArray = $app->sendOrder($cOrder);

                    if ($sendOrderArray->isSuccess() == false) {
                        $json['error'] = $sendOrderArray->getResponse()->getMessage();

                        $this->model_extension_shipping_ozon->setMessage($sendOrderArray->getResponse()->getMessage(), $order_id);
                        $json['message'] = $sendOrderArray->getResponse()->getMessage();

                        if ($sendOrderArray->getResponse()->getArguments()) {
                            $json['message'] = '';
                            $json['error'] = '';

                            foreach ($sendOrderArray->getResponse()->getArguments() as $row) {
                                $json['message'] .= $row[0] . '. ';
                                $json['error'] .= $row[0] . '. ';
                            }

                            $this->model_extension_shipping_ozon->setMessage($json['message'], $order_id);
                        }

                    } else {
                        $ozon['ozon_id'] = $sendOrderArray->getResponse()->getId();
                        $ozon['posting_number'] = $sendOrderArray->getResponse()->getPackages()->getFirst()->getPostingNumber();
                        $ozon['posting_id'] = $sendOrderArray->getResponse()->getPackages()->getFirst()->getPostingId();

                        $ozon['ok'] = 'Y';
                        $ozon['ozonStatus'] = 'Отправление зарегистрировано';
                        $ozon['ozonStatusId'] = 5;

                        $this->model_extension_shipping_ozon->saveOrderOzon($ozon, $order_id);

                        $json['posting_id'] = $sendOrderArray->getResponse()->getPackages()->getFirst()->getPostingId();
                        $json['ok'] = 'Y';
                        $json['status'] = 'Отправление зарегистрировано';
                    }

                }
            } else {
                $this->load->model('sale/order');
                $this->load->model('catalog/product');

                $order_info = $this->model_sale_order->getOrder($order_id);

                $json['ok'] = 'N';
                $json['status'] = '';
                $json['message'] = '';
                $json['order_id'] = $order_id;
                $json['uptime'] = date('d-m-Y', time());

                $json['allowUncovering'] = false;

                if ($this->config->get($this->code . '_uncovering')) {
                    $json['allowUncovering'] = true;
                }

                $json['allowPartialDelivery'] = false;

                if ($this->config->get($this->code . '_partial_delivery')) {
                    $json['allowPartialDelivery'] = true;
                }

                $json['buyerName'] = '';

                if (!empty($order_info['firstname']) && !empty($order_info['lastname'])) {
                    $json['buyerName'] = $order_info['firstname'] . ' ' . $order_info['lastname'];
                } else {
                    $json['buyerName'] = $order_info['firstname'];
                }

                $json['buyerPhone'] = '';

                if (!empty($order_info['telephone'])) {
                    $json['buyerPhone'] = $order_info['telephone'];
                }

                $json['buyerEmail'] = '';

                if (!empty($order_info['email'])) {
                    $json['buyerEmail'] = $order_info['email'];
                }

                $json['buyerType'] = 'NaturalPerson';

                if ($this->config->get($this->code . '_face_type_' . $order_info['customer_group_id'])) {
                    $json['buyerType'] = 'LegalPerson';
                }

                $json['buyerLegalName'] = '';

                if (!empty($order_info['company'])) {
                    $json['buyerLegalName'] = $order_info['company'];
                }

                $json['recipientName'] = '';

                if (!empty($order_info['firstname']) && !empty($order_info['lastname'])) {
                    $json['recipientName'] = $order_info['firstname'] . ' ' . $order_info['lastname'];
                } else {
                    $json['recipientName'] = $order_info['firstname'];
                }

                $json['recipientPhone'] = '';

                if (!empty($order_info['telephone'])) {
                    $json['recipientPhone'] = $order_info['telephone'];
                }

                $json['recipientEmail'] = '';

                if (!empty($order_info['email'])) {
                    $json['recipientEmail'] = $order_info['email'];
                }

                $json['recipientType'] = 'NaturalPerson';

                if (!empty($this->config->get($this->code . '_type'))) {
                    $json['recipientType'] = 'LegalPerson';
                }

                $json['recipientLegalName'] = '';

                if (!empty($this->config->get($this->code . '_company'))) {
                    $json['recipientLegalName'] = $this->config->get($this->code . '_company');
                } elseif (!empty($this->config->get('config_name'))) {
                    $json['recipientLegalName'] = $this->config->get('config_name');
                }

                $json['firstMileTransferFromPlaceId'] = $this->config->get($this->code . '_warehouse_id');

                $json['paymentRecipientPaymentAmount'] = 0;

                $order_products_ozon = $this->model_sale_order->getOrderProducts($order_id);

                $json['items'] = array();

                $widthOzon = 0;
                $lengthOzon = 0;
                $heightOzon = 0;
                $weightOzon = 0;

                if (isset($order_info['shipping_city'])) {
                    $cityTo = $order_info['shipping_city'];
                    $countryTo = $order_info['shipping_country'];
                    $zoneTo = $order_info['shipping_zone'];
                    $zoneCode = $order_info['shipping_zone_code'];
                } elseif (isset($order_info['payment_city'])) {
                    $cityTo = $order_info['payment_city'];
                    $countryTo = $order_info['payment_country'];
                    $zoneTo = $order_info['payment_zone'];
                    $zoneCode = $order_info['payment_zone_code'];
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

                foreach ($order_products_ozon as $key => $product_ozon) {
                    $item = new \Ipol\Ozon\Core\Delivery\CargoItem();

                    $json['paymentRecipientPaymentAmount'] += (int)$product_ozon['price'];
                    $json['paymentRecipientPaymentAmount'] += (int)$product_ozon['tax'];

                    $product_info = $this->model_catalog_product->getProduct($product_ozon['product_id']);

                    $json['items'][$key]['product_id'] = $product_info['product_id'];
                    $json['items'][$key]['name'] = $product_info['name'];
                    $json['items'][$key]['model'] = $product_info['model'];

                    $json['items'][$key]['quantity'] = $product_ozon['quantity'];

                    $json['items'][$key]['price'] = (int)$product_ozon['tax'] + (int)$product_ozon['price'];

                    $json['items'][$key]['estimated'] = 0;
                    if ($this->config->get($this->code . '_insurance')) {
                        $json['items'][$key]['estimated'] = (int)$product_ozon['tax'] + (int)$product_ozon['price'];
                    }

                    $json['items'][$key]['tax'] = (int)$product_ozon['tax'];
                    $json['items'][$key]['nds'] = (int)($product_ozon['tax'] * 100) / (int)$product_ozon['price'];

                    $json['items'][$key]['IsDangerous'] = 0;

                    $json['items'][$key]['width'] = ($product_info['width'] > 0) ? $this->length->convert($product_info['width'], $product_info['length_class_id'], 2) : $this->config->get($this->code . '_width');
                    $json['items'][$key]['height'] = ($product_info['height'] > 0) ? $this->length->convert($product_info['height'], $product_info['length_class_id'], 2) : $this->config->get($this->code . '_height');
                    $json['items'][$key]['length'] = ($product_info['length'] > 0) ? $this->length->convert($product_info['length'], $product_info['length_class_id'], 2) : $this->config->get($this->code . '_length');
                    $json['items'][$key]['weight'] = ($product_info['weight'] > 0) ? $this->weight->convert($product_info['weight'], $this->config->get('config_weight_class_id'), 2) : $this->config->get($this->code . '_weight');

                    $widthOzon += $this->length->convert($product_info['width'], $product_info['length_class_id'], 2);
                    $lengthOzon += $this->length->convert($product_info['length'], $product_info['length_class_id'], 2);
                    $heightOzon += $this->length->convert($product_info['height'], $product_info['length_class_id'], 2);
                    $weightOzon += $this->length->convert($product_info['weight'], $product_info['length_class_id'], 2);

                    $item->setWidth(floatval($json['items'][$key]['width'])) // mm
                    ->setHeight(floatval($json['items'][$key]['height'])) // mm
                    ->setLength(floatval($json['items'][$key]['length'])) // mm
                    ->setPrice(new \Ipol\Ozon\Core\Entity\Money($json['items'][$key]['price'])) //estimated price for insurance
                    ->setQuantity($product_ozon['quantity'])
                        ->setWeight($json['items'][$key]['weight']); //gram

                    $cargoBox->add($item);
                }

                $json['goods']['width'] = ($widthOzon > 0) ? $widthOzon : $this->config->get($this->code . '_width');
                $json['goods']['length'] = ($lengthOzon > 0) ? $lengthOzon : $this->config->get($this->code . '_length');
                $json['goods']['height'] = ($heightOzon > 0) ? $heightOzon : $this->config->get($this->code . '_height');
                $json['goods']['weight'] = ($weightOzon > 0) ? $weightOzon : $this->config->get($this->code . '_weight');

                $cargoList->add($cargoBox);

                $shipment->setCargoes($cargoList);

                $ans = $app->deliveryVariantsForShipmentShort($shipment, 25);
                $json['deliveryAddress'] = '';
                $json['deliveryVariantId'] = 0;
                $json['paymentDeliveryPrice'] = 0;
                $json['paymentDeliveryVatRate'] = 0;
                $json['paymentDeliveryVatSum'] = 0;
                $json['estimated'] = 0;

                if ($this->config->get($this->code . '_insurance')) {
                    $json['estimated'] += $json['paymentRecipientPaymentAmount'];
                }

                if ($ans->isSuccess() == false) {
                    $this->log->write('СписокДоставок: ' . $ans->getResponse()->getMessage());
                    $json['error'] = $ans->getResponse()->getMessage();
                    $json['message'] = $ans->getResponse()->getMessage();
                } else {
                    $deliveryVariants = $ans->getResponse()->getFields();
                    $json['deliveryVariantId'] = $deliveryVariants['deliveryVariantIds'][0];

                    $json['deliveryAddress'] = $this->model_extension_shipping_ozon->getDeliveryAddress($json['deliveryVariantId']);

                    $calculate = $app->deliveryCalculateForShipment($json['deliveryVariantId'], $shipment, $this->config->get($this->code . '_warehouse_id'));

                    if ($calculate->isSuccess() == false) {
                        $this->log->write('ФормаКалькулятор: ' . $calculate->getResponse()->getMessage());
                        $json['error'] = $calculate->getResponse()->getMessage();
                        $json['message'] = $calculate->getResponse()->getMessage();
                    } else {
                        $paymentDeliveryPrice = $calculate->getResponse()->getAmount();
                        $json['paymentDeliveryPrice'] = $paymentDeliveryPrice;

                        $json['paymentType'] = 'FullPrepayment';
                        $json['paymentPrepaymentAmount'] = $json['paymentDeliveryPrice'] + $json['paymentRecipientPaymentAmount'];

                        if (!empty($this->config->get($this->code . '_bind_payment_' . $order_info['customer_group_id']))) {
                            $keyPayment = array_search($order_info['payment_code'], $this->config->get($this->code . '_bind_payment_' . $order_info['customer_group_id']));

                            if ($keyPayment !== false) {
                                $json['paymentType'] = 'Postpay';
                                $json['paymentPrepaymentAmount'] = 0;
                            }
                        }

                        $this->model_extension_shipping_ozon->newOrder($json, $order_id);
                    }
                }

            }
        } else {
            $json['error'] = 'Не получили номер заказа, попробуйте ещё раз';
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }


    # Проверка формы
    protected function validate()
    {
        if (!$this->user->hasPermission('modify', 'extension/shipping/ozon')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if ((utf8_strlen($this->request->post[$this->code . '_name_door']) < 1)) {
            $this->error['name_door'] = $this->language->get('error_name_door');
        }

        if ((utf8_strlen($this->request->post[$this->code . '_name_terminal']) < 1)) {
            $this->error['name_terminal'] = $this->language->get('error_name_terminal');
        }

        if ((utf8_strlen($this->request->post[$this->code . '_name_postomat']) < 1)) {
            $this->error['name_postomat'] = $this->language->get('error_name_postomat');
        }

        if ((utf8_strlen($this->request->post[$this->code . '_client_id']) < 1)) {
            $this->error['client_id'] = $this->language->get('error_client_id');
        }

        if ((utf8_strlen($this->request->post[$this->code . '_client_secret']) < 1)) {
            $this->error['client_secret'] = $this->language->get('error_client_secret');
        }

        if ((utf8_strlen($this->request->post[$this->code . '_weight']) < 1)) {
            $this->error['weight'] = $this->language->get('error_weight');
        }

        if ((utf8_strlen($this->request->post[$this->code . '_length']) < 1)) {
            $this->error['length'] = $this->language->get('error_length');
        }

        if ((utf8_strlen($this->request->post[$this->code . '_width']) < 1)) {
            $this->error['width'] = $this->language->get('error_width');
        }

        if ((utf8_strlen($this->request->post[$this->code . '_height']) < 1)) {
            $this->error['height'] = $this->language->get('error_height');
        }

        if ($this->error && !isset($this->error['warning'])) {
            $this->error['warning'] = $this->language->get('error_warning');
        }

        return !$this->error;
    }

    public function install()
    {
        #Таблица вариантов доставки
        $this->db->query("CREATE TABLE IF NOT EXISTS `ipol_ozon_delivery_variants` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `deliveryId` varchar(16) NOT NULL,
		  `objectTypeId` varchar(16) NOT NULL,
		  `objectTypeName` varchar(30) NOT NULL,
		  `settlement` varchar(30) NOT NULL,
		  `region` varchar(50) NOT NULL,
		  `code` varchar(30) NOT NULL,
		  `address` varchar(255) NOT NULL,
		  `addressElementId` varchar(16) NOT NULL,
		  `description` varchar(1000) NOT NULL,
		  `howToGet` varchar(1000) NOT NULL,
		  `phone` varchar(30) NOT NULL,
		  `isCashForbidden` int(1) NOT NULL DEFAULT '0',
		  `cardPaymentAvailable` int(1) NOT NULL DEFAULT '0',
		  `isPartialPrepaymentForbidden` int(1) NOT NULL DEFAULT '0',
		  `fittingShoesAvailable` int(1) NOT NULL DEFAULT '0',
		  `fittingClothesAvailable` int(1) NOT NULL DEFAULT '0',
		  `returnAvailable` int(1) NOT NULL DEFAULT '0',
		  `partialGiveOutAvailable` int(1) NOT NULL DEFAULT '0',
		  `dangerousAvailable` int(1) NOT NULL DEFAULT '0',
		  `wifiAvailable` int(1) NOT NULL DEFAULT '0',
		  `legalEntityNotAvailable` int(1) NOT NULL DEFAULT '0',
		  `isRestrictionAccess` int(1) NOT NULL DEFAULT '0',
		  `restrictionAccessMessage` varchar(255) NOT NULL,
		  `minWeight` int(11) NOT NULL DEFAULT '0',
		  `maxWeight` int(11) NOT NULL DEFAULT '0',
		  `minPrice` int(11) NOT NULL DEFAULT '0',
		  `maxPrice` int(11) NOT NULL DEFAULT '0',
		  `restrictionWidth` int(11) NOT NULL DEFAULT '0',
		  `restrictionLength` int(11) NOT NULL DEFAULT '0',
		  `restrictionHeight` int(11) NOT NULL DEFAULT '0',
		  `lat` double NOT NULL DEFAULT '0',
		  `long` double NOT NULL DEFAULT '0',
		  `workingHours` text NOT NULL,
		  PRIMARY KEY (`id`)
		) DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ;");

        #Таблица складов
        $this->db->query("CREATE TABLE IF NOT EXISTS `ipol_ozon_placed` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `placedId` varchar(30) NOT NULL,
		  `name` varchar(255) NOT NULL,
		  `city` varchar(30) NOT NULL,
		  `address` varchar(255) NOT NULL,
		  PRIMARY KEY (`id`)
		) DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ;");

        #Таблица заявок
        $this->db->query("CREATE TABLE IF NOT EXISTS `ipol_ozon_orders`
		(
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`order_id` int(11) NOT NULL,
			`ozon_id` int(11) NOT NULL,
		 
			`allowUncovering` int(1) NOT NULL,
			`allowPartialDelivery` int(1) NOT NULL,
			
			`posting_id` varchar(100) NOT NULL,
			`posting_number` varchar(100) NOT NULL,
			`document_id` bigint(8) NOT NULL,
			
			`ozonStatusId` int(11) NOT NULL,
			`ozonStatus` varchar(255) NOT NULL,
			
			`buyerName` varchar(255) NOT NULL,
			`buyerPhone` varchar(150) NOT NULL,
			`buyerEmail` varchar(150) NOT NULL,
			`buyerType` varchar(26) NOT NULL,
			`buyerLegalName` varchar(255) DEFAULT NULL,
			
			`recipientName` varchar(255) NOT NULL,
			`recipientPhone` varchar(150) NOT NULL,
			`recipientEmail` varchar(150) NOT NULL,
			`recipientType` varchar(26) NOT NULL,
			`recipientLegalName` varchar(255) DEFAULT NULL,
			
			`firstMileTransferType` varchar(16) DEFAULT NULL,
			`firstMileTransferFromPlaceId` varchar(16) DEFAULT NULL,
			
			`paymentType` varchar(25) NOT NULL,
			`paymentPrepaymentAmount` decimal(18,4) NOT NULL,
			`paymentRecipientPaymentAmount` decimal(18,4) NOT NULL,
			`paymentDeliveryPrice` decimal(18,4) NOT NULL,
			`paymentDeliveryVatRate` int(2) NOT NULL,
			`paymentDeliveryVatSum` decimal(18,4) NOT NULL,
			`estimated` decimal(18,4) NOT NULL,
			
			`deliveryVariantId` varchar(16) NOT NULL,
			`deliveryAddress` varchar(255) NOT NULL,
			`deliveryTimeIntervalFrom` varchar(20) DEFAULT NULL,
			`deliveryTimeIntervalTo` varchar(20) DEFAULT NULL,
			
			`goods` text NOT NULL,
			`items` text NOT NULL,
			`message` text NOT NULL,
			`ok` char(1) DEFAULT NULL,
			`uptime` varchar(10) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ;");

    }

    public function uninstall()
    {
        $this->db->query("DROP TABLE IF EXISTS `ipol_ozon_delivery_variants`");
        $this->db->query("DROP TABLE IF EXISTS `ipol_ozon_placed`");
        $this->db->query("DROP TABLE IF EXISTS `ipol_ozon_orders`");
    }
}
