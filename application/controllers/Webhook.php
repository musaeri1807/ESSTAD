<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Webhook extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$notif = json_decode(file_get_contents('php://input'));
		$this->db->insert('tbluserlog', [
			'field_waktu' => date('Y-m-d H:i:s'),
			'field_aktifitas' => json_encode($notif) // simpan jadi JSON string
		]);
	}
}
