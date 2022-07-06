<?php
class ControllerExtensionModuleIlmflexslider extends Controller {
		public function index($setting) {
		static $module = 0;

		$this->load->model('design/banner');
		$this->load->model('tool/image');	
	
		$this->document->addStyle('catalog/view/theme/default/stylesheet/flexslider.css');
		$this->document->addScript('catalog/view/javascript/jquery.flexslider.js');

		$data['banners'] = array();

		$results = $this->model_design_banner->getBanner($setting['banner_id']);

		foreach ($results as $result) {
			if (is_file(DIR_IMAGE . $result['image'])) {
				$data['banners'][] = array(
					'title' => $result['title'],
					'link'  => $result['link'],
					'image' => $result['image']
				);
			}
		}
            
        $data['slideshowspeed'] = $setting['slideshowspeed'];
        $data['animationspeed'] = $setting['animationspeed'];
        $data['animationloop'] = $setting['animationloop'];
        $data['touch'] = $setting['touch'];
        $data['pausehover'] = $setting['pausehover'];
        $data['controlnav'] = $setting['controlnav'];
        $data['directionnav'] = $setting['directionnav'];
        $data['limit'] = $setting['limit'];
        $data['itemmargin'] = $setting['itemmargin'];
        $data['itemwidth'] = $setting['itemwidth'];


		
		return $this->load->view('extension/module/ilmflexslider', $data);
	}
}