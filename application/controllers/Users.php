 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Users extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            $this->load->helper('date');
            $this->load->model('Mutasi_model');
            $this->load->model('Users_model');
            $this->load->model('Product_model');
            $this->load->model('Settings_model');
            $this->load->model('Region_model');
            $this->load->model('Organization_model');

            $status = $this->session->userdata('status');
            if ($status !== 'Logged_in') {
                redirect('login');
            }
        }

        public function index()
        {

            // $status = $this->session->all_userdata();

            // Mendapatkan input GET dan POST
            // $dari   = $this->input->get('dari');
            // $sampai = $this->input->get('sampai');
            // $nomor  = $this->input->post('nomor');

            // Mengambil data dari database

            $data['provinsi']   = $this->Region_model->get_provinsi();
            $data['RW']         = $this->Region_model->get_rw();
            $data['RT']         = $this->Region_model->get_rt();

            //$data['userlogin']  = $userdata;  // Menggunakan variabel $userdata yang sudah didefinisikan
            $data['sampah']     = $this->Product_model->getTrash();
            $data['gold']       = $this->Product_model->getGold();
            $data['bspid']      = $this->Organization_model->get_bspid();
            $data['user']       = $this->Users_model->userLogin($this->session->userdata('user_id')); // Gunakan email dari userdata
            if (!$data['user']) {
                show_error('User tidak ditemukan atau tidak valid', 403);
                return;
            }

            $data['saldo']      = $this->Users_model->sumSaldo($data['user']['account_id']);
            // var_dump($data['saldo']);
            $data['mutasi']     = $this->Users_model->histroiMutasi($data['user']['account_id']);

            // if ($dari && $sampai) {
            //     $data['mutasi'] = $this->Mutasi_model->get_mutasi_by_date($dari, $sampai, $nomor);
            // } else {
            //     // $data['mutasi'] = $this->Mutasi_model->get_all_mutasi();
            //     $data['mutasi']     = $this->Users_model->histroiMutasi('3172090013081210003701');
            // }



            // Memuat tampilan dengan data yang telah disiapkan

            $this->load->view('appMobile/v_home', $data);
        }

        public function settings()
        {
            $this->load->view('appMobile/v_home_settings');
        }
    }
