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

        public function nomorWatsApp()
        {
            $token = bin2hex(random_bytes(32)); // 32 karakter
            $this->session->set_userdata('verify_token', $token);
            $data = array(
                'token'     => $token,
                'Title'     => 'WhatsApp'
            );
            $this->template->viewsMobile('appMobile/v-whatsapp', $data);
        }

        public function updateEmail()
        {
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            // $this->form_validation->set_rules('username', 'Email', 'required|valid_email|callback_username_check');

            if ($this->form_validation->run() == false) {
                $token = bin2hex(random_bytes(32)); // 32 karakter
                $this->session->set_userdata('verify_token', $token);
                $data = array(
                    'token'     => $token,
                    'Title'     => 'E-mail'
                );
                $this->template->viewsMobile('appMobile/v-email', $data);
            } else {
                echo "HHHHHH";
            }
        }
        public function updateUsername()
        {
            $this->form_validation->set_rules('username', 'username', 'trim|required');
            if ($this->form_validation->run() == false) {
                $token = bin2hex(random_bytes(32)); // 32 karakter
                $this->session->set_userdata('verify_token', $token);
                $data = array(
                    'token'     => $token,
                    'Title'     => 'E-mail'
                );
                $this->template->viewsMobile('appMobile/v-email', $data);
            } else {
                $username       = $this->input->post('username');
                $button         = $this->input->post('OTP');
                $user           = $this->Users_model->userValid($username); //valid User					
                if ($user) {
                    if ($user['is_active'] == 1) {
                        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
                        } elseif (ctype_digit($username) && strlen($username) >= 10) {
                        } else {
                            $this->session->set_flashdata('message_info', 'Value ini bukan email atau nomor telepon yang valid.!!!');
                            redirect('forgot');
                        }
                    } else {
                        $this->session->set_flashdata('message_warning', 'it not activated yet...!!!');
                        redirect('forgot');
                    }
                } else {
                    $this->session->set_flashdata('message_error', 'Anda belum terdaftar. Silakan lakukan pendaftaran terlebih dahulu.!');
                    redirect('forgot');
                }
            }
        }
        public function updatePassword()
        {
            $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]');
            $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[8]|matches[password1]');

            if ($this->form_validation->run() == false) {
                $token = bin2hex(random_bytes(32)); // 32 karakter
                $this->session->set_userdata('verify_token', $token);
                $data = array(
                    'token'     => $token,
                    'Title'     => 'Password'
                );
                $this->template->viewsMobile('appMobile/v-password', $data);
            } else {
                $token        = $this->input->post('token');
                if ($token === $this->session->userdata('verify_token')) {
                    $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
                    $username = $this->session->userdata('email');
                    if ($username) {
                        $update = $this->Users_model->userUpdated($username, ['field_password' => $password]);
                        if ($update) {
                            $this->session->set_flashdata('msg_success', 'Kata sandi Anda telah berhasil diubah..!');
                            redirect('users/settings');
                        } else {
                            $this->session->set_flashdata('message_error', 'Password gagal Update, Wrong Insert...!!!');
                        }
                    } else {
                        $this->session->set_flashdata('message_error', 'Username tidak ditemukan');
                        redirect('users/settings');
                    }
                } else {
                    $this->session->set_flashdata('message_error', 'Token OTP  Error..!');
                    redirect('users/settings');
                }
            }
        }
        public function updatePIN()
        {
            $this->form_validation->set_rules('smscode', 'Username', 'trim|required|numeric|min_length[6]');
            if ($this->form_validation->run() == false) {
                $token = bin2hex(random_bytes(32)); // 32 karakter
                $this->session->set_userdata('verify_token', $token);
                $data = array(
                    'token'     => $token,
                    'Title'     => 'PIN'
                );
                $this->template->viewsMobile('appMobile/v-PIN', $data);
            } else {
                $token        = $this->input->post('token');
                if ($token === $this->session->userdata('verify_token')) {
                    $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
                    $username = $this->session->userdata('email');
                    if ($username) {
                        $update = $this->Users_model->userUpdated($username, ['Password' => $password]);
                        if ($update) {
                            $this->session->set_flashdata('msg_success', 'PIN Anda telah berhasil diubah..!');
                            redirect('users/settings');
                        } else {
                            $this->session->set_flashdata('message_error', 'PIN gagal Update, Wrong Insert...!!!');
                        }
                    } else {
                        $this->session->set_flashdata('message_error', 'Username tidak ditemukan');
                        redirect('users/settings');
                    }
                } else {
                    $this->session->set_flashdata('message_error', 'Token OTP  Error..!');
                    redirect('users/settings');
                }
            }
        }
    }
