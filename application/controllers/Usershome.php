<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usershome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session'); // testing session
		$this->load->library('Wilayah');
		$this->load->model('Users_model');
		$this->load->model('Product_model');
		$this->load->model('Settings_model');
		$this->load->model('Organization_model');

		// if ($this->session->userdata('login_state') == false) {
		// 	// $this->session->set_flashdata('message', '<span class="text-danger  "><p class="login-box-msg ">Salah! Anda belum Login..!</p></span>');
		// 	$this->session->set_flashdata('message_warning', 'Maaf,Anda Belum Login...!!!');
		// 	redirect('Authorization');
		// }

		$session = [
			'user_id'           => '227',
			'email'             => 'musaeri1807@gmail.com',
			'phone'             => '081210003701',
			'account_id'        => '081210003701',
			'role_id'           => '6',
			'login_state'       => TRUE,
			'company'           => '1234',
			'lastlogin'         => time()
		];
		$this->session->set_userdata($session);

		// __construct
		// Ambil ID User dari Session
		$this->userId   = $this->session->userdata('user_id');
		$this->accountId = $this->session->userdata('account_id');
	}
	private function prepareData($viewTitle)
	{

		return [
			'header' => [
				'header1' => $this->uri->segment(1),
				'header2' => $this->uri->segment(2)
			],
			'judul'    => $viewTitle,
			'sampah'   => $this->Product_model->getTrash(),
			'gold'     => $this->Product_model->getGold(),
			'user'     => $this->Users_model->userLogin($this->userId),
			'mutasi'   => $this->Users_model->histroiMutasi($this->accountId),
			'saldo'    => $this->Users_model->sumSaldo($this->accountId),
			'provinsi' => $this->Region_model->get_provinsi(),
			'RW'       => $this->Region_model->get_rw(),
			'RT'       => $this->Region_model->get_rt(),
			'bspid'    => $this->Organization_model->get_bspid()
		];
	}

	public function index()
	{
		$data = $this->prepareData('Home');
		$this->load->view('users/v_user_home', $data);
	}
	public function profile()
	{
		$this->load->view('users/v_user_profile');
	}
	public function transaction()
	{
		$this->load->view('users/v_user_transaction');
	}
	public function password()
	{
		$this->load->view('users/v_change_password');
	}
}
