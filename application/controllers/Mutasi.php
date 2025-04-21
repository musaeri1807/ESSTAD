<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mutasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mutasi_model');
    }

    public function index()
    {
        $dari   = $this->input->get('dari');
        $sampai = $this->input->get('sampai');
        $nomor = $this->input->post('nomor');

        if ($dari && $sampai) {
            $data['mutasi'] = $this->Mutasi_model->get_mutasi_by_date($dari, $sampai, $nomor);
        } else {
            $data['mutasi'] = $this->Mutasi_model->get_all_mutasi();
        }

        $this->load->view('mutasi_view', $data);
    }
}
