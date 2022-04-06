<?php
class ControllerExtensionModuleIshiParallaxBlock extends Controller {
	public function index($setting) {
		
		$this->load->model('design/banner');
		$this->load->model('tool/image');
		
		$langauage=$this->config->get('config_language_id');
		
		$data['parallax'] = (isset($setting['parallax']) && $setting['parallax'] == 1) ? 'parallax' : '';
		$data['bg_color'] = $setting['bg_color'];
		$data['ishi_randomnumer'] = "ishiparallaxblock-" . rand();
	
		if(!empty($setting['image'])) {
			if ($this->request->server['HTTPS']) {
				$data['bgimage'] = $this->config->get('config_ssl') . 'image/' . $setting['image'];
			} else {
				$data['bgimage'] = $this->config->get('config_url') . 'image/' . $setting['image'];
			}
		}
		
		if (isset($setting['module_description'])) {

			$data['html'] = html_entity_decode($setting['module_description'][$langauage]['description'], ENT_QUOTES, 'UTF-8');

		}
		return $this->load->view('extension/module/ishiparallaxblock', $data);
	}
}