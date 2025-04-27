 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Users extends CI_Controller
    {


        function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            $this->load->model('Mutasi_model');
            $this->load->model('Users_model');
            $this->load->model('Product_model');
            $this->load->model('Settings_model');
            $this->load->model('Region_model');
            $this->load->model('Organization_model');

            // Cek status login
            if (!$this->session->userdata('login_state')) {
                redirect('login');
            }
        }

        public function index()
        {

            // Mengakses user_id dari data sesi dengan benar
            $userdata = $this->session->userdata('userdata');

            // Mendapatkan input GET dan POST
            $dari   = $this->input->get('dari');
            $sampai = $this->input->get('sampai');
            $nomor  = $this->input->post('nomor');

            // Mengambil data dari database

            $data['provinsi']   = $this->Region_model->get_provinsi();
            $data['RW']         = $this->Region_model->get_rw();
            $data['RT']         = $this->Region_model->get_rt();

            $data['userlogin']  = $userdata;  // Menggunakan variabel $userdata yang sudah didefinisikan
            $data['sampah']     = $this->Product_model->getTrash();
            $data['gold']       = $this->Product_model->getGold();

            $data['user']       = $this->Users_model->userLogin($userdata['id_users']); // Gunakan email dari userdata
            // var_dump($data['user']);
            // die();

            if ($dari && $sampai) {
                $data['mutasi'] = $this->Mutasi_model->get_mutasi_by_date($dari, $sampai, $nomor);
            } else {
                // $data['mutasi'] = $this->Mutasi_model->get_all_mutasi();
                $data['mutasi']     = $this->Users_model->histroiMutasi('081210003701');
            }
            $data['saldo']      = $this->Users_model->sumSaldo('081210003701');


            $data['bspid']      = $this->Organization_model->get_bspid();

            // var_dump($data['gold']);
            // var_dump($data['mutasi']);


            // Memuat tampilan dengan data yang telah disiapkan
            $this->load->view('users/v_users_home', $data);
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
                'user'     => $this->Users_model->userLogin($this->user['email']),
                'mutasi'   => $this->Users_model->histroiMutasi($this->accountId),
                'saldo'    => $this->Users_model->sumSaldo($this->accountId),
                'provinsi' => $this->Region_model->get_provinsi(),
                'RW'       => $this->Region_model->get_rw(),
                'RT'       => $this->Region_model->get_rt(),
                'bspid'    => $this->Organization_model->get_bspid()
            ];
        }



        public function home() {}
        public function profile() {}
        public function mutasi() {}
        public function changePassword()
        {

            $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]');
            $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[8]|matches[password1]');

            die();
            if ($this->form_validation->run() == false) {
                $this->index();
            } else {
                $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
                $username = $this->session->userdata('UserName');
                if ($username) {
                    // echo "ISI";
                    $in = $this->Users_model->userUpdated($username, ['field_password' => $password]);
                    $this->session->unset_userdata('UserName');
                    $this->session->unset_userdata('NumberPhone');
                    // $this->session->sess_destroy();
                    if ($in) {
                        $this->session->set_flashdata('msg_success', 'Password has been changed! Please login...!!!');
                        redirect('Users');
                    }
                } else {
                    $this->session->set_flashdata('message_error', 'Password gagal Update, Wrong Insert...!!!');
                    redirect('Users');
                }
            }
        }
    }
