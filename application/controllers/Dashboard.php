<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Organization_model');
        $this->load->model('Dashboard_model');
        $this->load->model('Welcome_model');
    }

    public function index()
    {
        // var_dump($data['bsp']);
        // die();
        // $data['bspid']      = $this->Organization_model->get_bspid_by_id($id_branch);

        $id_branch = $this->input->get('id_branch'); // dapatkan dari URL
        $data['id_branch']     = $id_branch;
        $tahun = date('Y');      // e.g. 2024
        $cabang = $this->input->get('id_branch');    // e.g. 'BS001'
        $data['total_emas']         = $this->Dashboard_model->total_emas_unit($id_branch);
        $data['saldo']              = $this->Dashboard_model->get_saldo_terbaru($id_branch);
        $data['bsp']                = $this->Organization_model->get_bspid();
        $data['grafik'] = $this->Dashboard_model->get_monthly_deposit($cabang, $tahun);

        $this->load->view('dashboard_view', $data);
    }
}
