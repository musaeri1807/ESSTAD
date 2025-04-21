 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Users extends CI_Controller
    {


        function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->model('Mutasi_model');
        }

        public function index()
        {
            $dari   = $this->input->get('dari');
            $sampai = $this->input->get('sampai');
            $nomor  = $this->input->post('nomor');

            if ($dari && $sampai) {
                $data['mutasi'] = $this->Mutasi_model->get_mutasi_by_date($dari, $sampai, $nomor);
            } else {
                $data['mutasi'] = $this->Mutasi_model->get_all_mutasi();
            }

            $this->load->view('users/v_users_home', $data);
        }
        public function Setting()
        {
            $this->load->view('users/v_users_home');
        }
    }
