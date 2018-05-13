<?php
class ControllerExtensionModulePayment2Shipping extends Controller {
	private $error = array();

	public function index() {
		$data = $this->load->language('extension/module/payment2shipping');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('module_payment2shipping', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/module/payment2shipping', 'token=' . $this->session->data['token'], true));
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'token=' . $this->session->data['token'] . '&type=module', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/module/payment2shipping', 'token=' . $this->session->data['token'], true)
		);

		$data['action'] = $this->url->link('extension/module/payment2shipping', 'token=' . $this->session->data['token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'token=' . $this->session->data['token'] . '&type=module', true);

		if (isset($this->request->post['module_payment2shipping_status'])) {
			$data['status'] = $this->request->post['module_payment2shipping_status'];
		} elseif ($this->config->has('module_payment2shipping_status')) {
			$data['status'] = $this->config->get('module_payment2shipping_status');
		} else {
			$data['status'] = '';
		}

		if (isset($this->request->post['module_payment2shipping_shippings'])) {
			$data['payment2shippings'] = $this->request->post['module_payment2shipping_shippings'];
		} elseif ($this->config->has('module_payment2shipping_shippings')) {
			$data['payment2shippings'] = $this->config->get('module_payment2shipping_shippings');
		} else {
			$data['payment2shippings'] = array();
		}

		$sort_order = array();

		foreach ($data['payment2shippings'] as $shipping) {
			$sort_order[] = $shipping['shipping'];
		}

		array_multisort($sort_order, SORT_ASC, $data['payment2shippings']);

		$this->load->model('extension/extension');

		$extensions = $this->model_extension_extension->getInstalled('shipping');

		foreach ($extensions as $key => $value) {
			if (!is_file(DIR_APPLICATION . 'controller/extension/shipping/' . $value . '.php') && !is_file(DIR_APPLICATION . 'controller/shipping/' . $value . '.php')) {
				$this->model_setting_extension->uninstall('shipping', $value);

				unset($extensions[$key]);
			}
		}

		$data['shippings'] = array();

		// Compatibility code for old extension folders
		$files = glob(DIR_APPLICATION . 'controller/extension/shipping/*.php');

		if ($files) {
			foreach ($files as $file) {
				$extension = basename($file, '.php');

				$this->load->language('extension/shipping/' . $extension, 'extension');

				$heading_title = $this->language->get('heading_title');

				$data['shippings'][] = array(
						'name'       => $heading_title,
						'extension'  => $extension,
						'status'     => $this->config->get('shipping_' . $extension . '_status') ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
						'sort_order' => $this->config->get('shipping_' . $extension . '_sort_order'),
						'install'    => $this->url->link('extension/extension/shipping/install', 'token=' . $this->session->data['token'] . '&extension=' . $extension, true),
						'uninstall'  => $this->url->link('extension/extension/shipping/uninstall', 'token=' . $this->session->data['token'] . '&extension=' . $extension, true),
						'installed'  => in_array($extension, $extensions),
						'edit'       => $this->url->link('extension/shipping/' . $extension, 'token=' . $this->session->data['token'], true)
				);
			}
		}

		$extensions = $this->model_extension_extension->getInstalled('payment');

		foreach ($extensions as $key => $value) {
			if (!is_file(DIR_APPLICATION . 'controller/extension/payment/' . $value . '.php') && !is_file(DIR_APPLICATION . 'controller/payment/' . $value . '.php')) {
				$this->model_setting_extension->uninstall('payment', $value);

				unset($extensions[$key]);
			}
		}

		$data['payments'] = array();

		// Compatibility code for old extension folders
		$files = glob(DIR_APPLICATION . 'controller/extension/payment/*.php');

		if ($files) {
			foreach ($files as $file) {
				$extension = basename($file, '.php');

				$this->load->language('extension/payment/' . $extension, 'extension');

				$text_link = $this->language->get('text_' . $extension);

				if ($text_link != 'text_' . $extension) {
					$link = $text_link;
				} else {
					$link = '';
				}

				$heading_title = $this->language->get('heading_title');

				$data['payments'][] = array(
						'name'       => $heading_title,
						'extension'  => $extension,
						'link'       => $link,
						'status'     => $this->config->get('payment_' . $extension . '_status') ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
						'sort_order' => $this->config->get('payment_' . $extension . '_sort_order'),
						'install'    => $this->url->link('extension/extension/payment/install', 'token=' . $this->session->data['token'] . '&extension=' . $extension, true),
						'uninstall'  => $this->url->link('extension/extension/payment/uninstall', 'token=' . $this->session->data['token'] . '&extension=' . $extension, true),
						'installed'  => in_array($extension, $extensions),
						'edit'       => $this->url->link('extension/payment/' . $extension, 'token=' . $this->session->data['token'], true)
				);
			}
		}

		//echo '<pre>'.__METHOD__.' ['.__LINE__.']: '; print_r($data['payments']); echo '</pre>';
		//echo '<pre>'.__METHOD__.' ['.__LINE__.']: '; print_r($data['shippings']); echo '</pre>';

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/payment2shipping', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/payment2shipping')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
}