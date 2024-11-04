<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Webhook extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('logger');
		$this->load->library('recaptcha');
		$this->load->model('Users_model');
		$this->load->helper('url');
		// require APPPATH . 'third_party/PHPMailer/Exception.php';
		// require APPPATH . 'third_party/PHPMailer/PHPMailer.php';
		// require APPPATH . 'third_party/PHPMailer/SMTP.php';
	}


	public function index()
	{
		$this->load->view('webhook.php');
	}
}
