<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
    }

    public function index()
    {
        $data['summary'] = $this->Dashboard_model->getSummary();
        $data['performa'] = $this->Dashboard_model->getPerformaCabang();
        $data['komposisi'] = $this->Dashboard_model->getKomposisiSampah();
        $data['aktivitas'] = $this->Dashboard_model->getAktivitasHarian();
        $data['nasabah'] = $this->Dashboard_model->getDataNasabah();
        $this->load->view('dashboard_view', $data);
    }
}
