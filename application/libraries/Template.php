<?php

class Template
{
	protected $_ci;
	function __construct()
	{
		$this->_ci = &get_instance(); //Untuk Memanggil function load, dll dari CI. ex: $this->load, $this->model, dll
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
	function viewslog($tempfront = NULL, $data = NULL)
	{
		if ($tempfront != NULL) {
			// head
			$data['_head'] 					= $this->_ci->load->view('authorization/_frontend/_head', $data, TRUE);
			//Content
			$data['_content'] 				= $this->_ci->load->view($tempfront, $data, TRUE);
			//JS
			$data['_jquery'] 				= $this->_ci->load->view('authorization/_frontend/_jquery', $data, TRUE);

			echo $data['_tempfront'] 		= $this->_ci->load->view('authorization/_frontend/_tempfront', $data, TRUE);
		}
	}
}
