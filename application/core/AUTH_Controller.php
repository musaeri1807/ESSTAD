<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AUTH_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Users_model');

		$this->user = $this->session->userdata('userdata');

		// // Cek status login
		// if (!$this->session->userdata('login_state')) {
		// 	redirect('login');
		// }
	}
}
