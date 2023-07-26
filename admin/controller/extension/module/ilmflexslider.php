<?php
class ControllerExtensionModuleIlmflexslider extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/module/ilmflexslider');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/module');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if (!isset($this->request->get['module_id'])) {
				$this->model_setting_module->addModule('ilmflexslider', $this->request->post);
			} else {
				$this->model_setting_module->editModule($this->request->get['module_id'], $this->request->post);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
        
        if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = '';
		}
        
        if (isset($this->error['animation'])) {
			$data['error_animation'] = $this->error['animation'];
		} else {
			$data['error_animation'] = '';
		}
        
        if (isset($this->error['slideshowspeed'])) {
			$data['error_slideshowspeed'] = $this->error['slideshowspeed'];
		} else {
			$data['error_slideshowspeed'] = '';
		}
        
        if (isset($this->error['animationspeed'])) {
			$data['error_animationspeed'] = $this->error['animationspeed'];
		} else {
			$data['error_animationspeed'] = '';
		}
		
        if (isset($this->error['limit'])) {
			$data['error_limit'] = $this->error['limit'];
		} else {
			$data['error_limit'] = '';
		}
        
        if (isset($this->error['itemwidth'])) {
			$data['error_itemwidth'] = $this->error['itemwidth'];
		} else {
			$data['error_itemwidth'] = '';
		}
        
        if (isset($this->error['itemmargin'])) {
			$data['error_itemmargin'] = $this->error['itemmargin'];
		} else {
			$data['error_itemmargin'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/module/ilmflexslider', 'user_token=' . $this->session->data['user_token'], true)
		);

		if (!isset($this->request->get['module_id'])) {
			$data['action'] = $this->url->link('extension/module/ilmflexslider', 'user_token=' . $this->session->data['user_token'], true);
		} else {
			$data['action'] = $this->url->link('extension/module/ilmflexslider', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->get['module_id'], true);
		}

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);
		
		if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$module_info = $this->model_setting_module->getModule($this->request->get['module_id']);
		}
        
        if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (!empty($module_info)) {
			$data['name'] = $module_info['name'];
		} else {
			$data['name'] = '';
		}
        
        if (isset($this->request->post['banner_id'])) {
			$data['banner_id'] = $this->request->post['banner_id'];
		} elseif (!empty($module_info)) {
			$data['banner_id'] = $module_info['banner_id'];
		} else {
			$data['banner_id'] = '';
		}

		$this->load->model('design/banner');

		$data['banners'] = $this->model_design_banner->getBanners();
        
        if (isset($this->request->post['slideshowspeed'])) {
			$data['slideshowspeed'] = $this->request->post['slideshowspeed'];
		} elseif (!empty($module_info)) {
			$data['slideshowspeed'] = $module_info['slideshowspeed'];
		} else {
			$data['slideshowspeed'] = '';
		}
        
        if (isset($this->request->post['animationspeed'])) {
			$data['animationspeed'] = $this->request->post['animationspeed'];
		} elseif (!empty($module_info)) {
			$data['animationspeed'] = $module_info['animationspeed'];
		} else {
			$data['animationspeed'] = '';
		}
        
        if (isset($this->request->post['animationloop'])) {
			$data['animationloop'] = $this->request->post['animationloop'];
		} elseif (!empty($module_info)) {
			$data['animationloop'] = $module_info['animationloop'];
		} else {
			$data['animationloop'] = '';
		}
        
        if (isset($this->request->post['touch'])) {
			$data['touch'] = $this->request->post['touch'];
		} elseif (!empty($module_info)) {
			$data['touch'] = $module_info['touch'];
		} else {
			$data['touch'] = '';
		}
        
        if (isset($this->request->post['pausehover'])) {
			$data['pausehover'] = $this->request->post['pausehover'];
		} elseif (!empty($module_info)) {
			$data['pausehover'] = $module_info['pausehover'];
		} else {
			$data['pausehover'] = '';
		}
        
        if (isset($this->request->post['controlnav'])) {
			$data['controlnav'] = $this->request->post['controlnav'];
		} elseif (!empty($module_info)) {
			$data['controlnav'] = $module_info['controlnav'];
		} else {
			$data['controlnav'] = '';
		}
        
        if (isset($this->request->post['directionnav'])) {
			$data['directionnav'] = $this->request->post['directionnav'];
		} elseif (!empty($module_info)) {
			$data['directionnav'] = $module_info['directionnav'];
		} else {
			$data['directionnav'] = '';
		}
        
        if (isset($this->request->post['limit'])) {
			$data['limit'] = $this->request->post['limit'];
		} elseif (!empty($module_info)) {
			$data['limit'] = $module_info['limit'];
		} else {
			$data['limit'] = '';
		}
        
        if (isset($this->request->post['itemwidth'])) {
			$data['itemwidth'] = $this->request->post['itemwidth'];
		} elseif (!empty($module_info)) {
			$data['itemwidth'] = $module_info['itemwidth'];
		} else {
			$data['itemwidth'] = '';
		}

        if (isset($this->request->post['itemmargin'])) {
			$data['itemmargin'] = $this->request->post['itemmargin'];
		} elseif (!empty($module_info)) {
			$data['itemmargin'] = $module_info['itemmargin'];
		} else {
			$data['itemmargin'] = '';
		}
		
		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($module_info)) {
			$data['status'] = $module_info['status'];
		} else {
			$data['status'] = '';
		}
        
        $this->load->model('design/banner');

		$data['banners'] = $this->model_design_banner->getBanners();

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/ilmflexslider', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/ilmflexslider')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
        
        if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 64)) {
			$this->error['name'] = $this->language->get('error_name');
		}
        
        if (!$this->request->post['slideshowspeed']) {
			$this->error['slideshowspeed'] = $this->language->get('error_slideshowspeed');
		}
        
        if (!$this->request->post['animationspeed']) {
			$this->error['animationspeed'] = $this->language->get('error_animationspeed');
		}
        
        if (!$this->request->post['itemwidth']) {
			$this->error['itemwidth'] = $this->language->get('error_itemwidth');
		}
        
        if (!$this->request->post['itemmargin']) {
			$this->error['itemmargin'] = $this->language->get('error_itemmargin');
		}

		return !$this->error;
	}
}