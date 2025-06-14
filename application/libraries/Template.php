<?php

class Template
{
	protected $_ci;
	function __construct()
	{
		$this->_ci = &get_instance(); //Untuk Memanggil function load, dll dari CI. ex: $this->load, $this->model, dll
	}

	function viewsAuth($tempAuth = NULL, $data = NULL)
	{
		if ($tempAuth != NULL) {
			// head
			$data['_head'] 					= $this->_ci->load->view('authorization/_frontend/_head', $data, TRUE);
			//Content
			$data['_content'] 				= $this->_ci->load->view($tempAuth, $data, TRUE);
			//JS
			$data['_jquery'] 				= $this->_ci->load->view('authorization/_frontend/_jquery', $data, TRUE);

			echo $data['_tempAuth'] 		= $this->_ci->load->view('authorization/_frontend/_tempAuth', $data, TRUE);
		}
	}

	function viewsMobile($tempMobile = NULL, $data = NULL)
	{
		if ($tempMobile != NULL) {
			// head
			$data['_head'] 					= $this->_ci->load->view('appMobile/_frontend/_head', $data, TRUE);
			//Content
			$data['_content'] 				= $this->_ci->load->view($tempMobile, $data, TRUE);
			//JS
			$data['_jquery'] 				= $this->_ci->load->view('appMobile/_frontend/_jquery', $data, TRUE);

			echo $data['_tempAuth'] 		= $this->_ci->load->view('appMobile/_frontend/_tempAuth', $data, TRUE);
		}
	}

	function viewsMain($tempMain = NULL, $data = NULL)
	{
		if ($tempMain != NULL) {
			// head
			$data['_head'] 					= $this->_ci->load->view('main/_frontend/_head', $data, TRUE);
			// Header
			$data['_header'] 				= $this->_ci->load->view('main/_frontend/_header', $data, TRUE);
			// HeaderPage
			$data['_headerPage'] 			= $this->_ci->load->view('main/_frontend/_headerPage', $data, TRUE);
			//Sidebar
			$data['_sidebar'] 				= $this->_ci->load->view('main/_frontend/_sidebar', $data, TRUE);
			//Content
			$data['_content'] 				= $this->_ci->load->view($tempMain, $data, TRUE);
			//Footer
			$data['_footer'] 				= $this->_ci->load->view('main/_frontend/_footer', $data, TRUE);
			//JS
			$data['_js'] 					= $this->_ci->load->view('main/_frontend/_js', $data, TRUE);
			echo $data['_tempMain'] 		= $this->_ci->load->view('main/_frontend/_tempMain', $data, TRUE);
		}
	}

	function views($template = NULL, $data = NULL)
	{
		if ($template != NULL) {
			// head
			$data['_head'] 					= $this->_ci->load->view('_layout/_head', $data, TRUE);

			// Header
			$data['_nav'] 					= $this->_ci->load->view('_layout/_nav', $data, TRUE);


			//Sidebar
			$data['_sidebar'] 				= $this->_ci->load->view('_layout/_sidebar', $data, TRUE);
			$data['_header'] 				= $this->_ci->load->view('_layout/_header', $data, TRUE);

			//Content

			$data['_content'] 				= $this->_ci->load->view($template, $data, TRUE);

			//Footer
			$data['_footer'] 				= $this->_ci->load->view('_layout/_footer', $data, TRUE);

			//JS
			$data['_js'] 					= $this->_ci->load->view('_layout/_js', $data, TRUE);

			echo $data['_template'] 		= $this->_ci->load->view('_layout/_template', $data, TRUE);
		}
	}
}
