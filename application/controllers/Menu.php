<?php
defined('BASEPATH') or exit('No direct script access allowed');

require './vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class menu extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session'); // testing session
		// $this->session->set_userdata($session);
		$this->load->model('Users_model');
		$this->load->model('Menu_model');
	}

	public function index()
	{
		// Authorization
		$session = [
			'email'             => 'infomail17089@gmail.com',
			'id_users'          => '19',
			'role'              => '6',
			'login_state'       => TRUE,
			'lastlogin'         => time()
		];
		$this->session->set_userdata($session);
		// Authorization

		// Contruct
		$userId = $this->session->userdata('id_users');
		// echo $userId;

		// Contruct
		$data['user'] = $this->Users_model->userLogin($userId); //query data user
		$data['judul'] = "Menu Management";
		$data['menu_utama'] = $this->Menu_model->getMainMenu();

		$this->template->viewsMain('main/v_menu_page', $data, FALSE);
	}

	public function ubah_posisi_menu()
	{
		$this->menu_model->orderMenu($this->input->post());
	}

	public function hapus($id_menu)
	{
		$this->menu_model->delete($id_menu);
		$this->session->set_flashdata('success', 'dihapus');
		redirect('menu', 'refresh');
	}

	public function hapus_direktori($id_menu)
	{
		$direktori = $this->db->get_where('menu', ['id_menu' => $id_menu])->row_array()['url'];

		rrmdir(FCPATH . 'application/modules/' . $direktori);
	}

	public function tambah()
	{
		$valid = $this->form_validation;

		$valid->set_rules('nama_menu', 'nama menu', 'required');
		$valid->set_rules('url', 'url', 'required');

		if ($valid->run()) {
			$this->menu_model->insert($this->input->post());
			$this->session->set_flashdata('success', 'ditambah');
			redirect('menu', 'refresh');
		}

		$data['judul'] = "Tambah menu";
		$data['menu_utama'] = $this->menu_model->getMainMenu();

		$this->load->view('templates/header', $data, FALSE);
		$this->load->view('menu/tambah', $data, FALSE);
		$this->load->view('templates/footer', $data, FALSE);
	}

	public function aksi_tambah_menu()
	{
		$this->menu_model->insert($this->input->post());
		$this->session->set_flashdata('success', 'ditambah');
		redirect('menu', 'refresh');
	}

	public function edit($id)
	{
		$valid = $this->form_validation;

		$valid->set_rules('nama_menu', 'nama menu', 'required');
		$valid->set_rules('url', 'url', 'required');

		if ($valid->run()) {
			$this->menu_model->update($this->input->post());
			$this->session->set_flashdata('success', 'diubah');
			redirect('menu', 'refresh');
		}

		$data['judul'] = "Ubah Menu";
		$data['menu'] = $this->menu_model->getMenu($id);
		$data['menu_utama'] = $this->menu_model->getMainMenu();

		$this->load->view('templates/header', $data, FALSE);
		$this->load->view('menu/ubah', $data, FALSE);
		$this->load->view('templates/footer', $data, FALSE);
	}
}

/* End of file menu.php */
/* Location: ./application/modules/menu/controllers/menu.php */
