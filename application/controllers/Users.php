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
            $data['user']       = $this->Users_model->userLogin($this->session->userdata('user_id')); // Gunakan email dari userdata

            $this->load->view('appMobile/v_home_settings', $data);
        }


        public function nomorWatsApp()
        {
            $this->form_validation->set_rules(
                'nomor',
                'phone',
                'trim|required|numeric|min_length[10]|max_length[12]',
                [
                    'required'    => 'Kolom {field} wajib diisi.',
                    'min_length'  => 'Kolom {field} minimal harus berisi {param} karakter.',
                    'max_length'  => 'Kolom {field} minimal harus berisi {param} karakter.',
                    'numeric'     => 'Kolom {field} harus berisi angka.'
                ]
            );

            if ($this->form_validation->run() == false) {
                $token = bin2hex(random_bytes(32)); // 32 karakter
                $this->session->set_userdata('verify_token', $token);
                $data = array(
                    'token'     => $token,
                    'Title'     => 'WhatsApp'
                );
                $this->template->viewsMobile('appMobile/v-whatsapp', $data);
            } else {
                $token          = $this->input->post('token');
                if ($token === $this->session->userdata('verify_token')) {
                    $nomor      = $this->input->post('nomor');
                    $id         = $this->session->userdata('user_id');
                    $user       = $this->Users_model->userValid($nomor); //valid User

                    if ($user) {
                        $this->session->set_flashdata('message_error', 'Nomor yang anda masukan sudah ada');
                        redirect('settings');
                    } else {
                        // $this->session->set_flashdata('msg_success', 'Update!');
                        // redirect('settings');
                        $username = $this->Users_model->userLogin($id);
                        $update = $this->Users_model->userUpdated($username['email'], ['field_handphone' => $nomor]);
                        if ($update) {
                            $this->session->set_flashdata('msg_success', 'Nomor Anda telah berhasil diubah..!');
                            redirect('settings');
                        } else {
                            $this->session->set_flashdata('message_error', 'Nomor gagal diubah...!!!');
                            redirect('settings');
                        }
                    }
                } else {
                    $this->session->set_flashdata('message_error', 'Token Error..!');
                    redirect('settings');
                }
            }
        }

        public function updateEmail()
        {
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');

            if ($this->form_validation->run() == false) {
                $token = bin2hex(random_bytes(32)); // 32 karakter
                $this->session->set_userdata('verify_token', $token);
                $data = array(
                    'token'     => $token,
                    'Title'     => 'E-mail'
                );
                $this->template->viewsMobile('appMobile/v-email', $data);
            } else {
                $token        = $this->input->post('token');
                if ($token === $this->session->userdata('verify_token')) {
                    $email      = $this->input->post('email');
                    $id         = $this->session->userdata('user_id');
                    $user      = $this->Users_model->userValid($email); //valid User

                    if ($user) {
                        $this->session->set_flashdata('message_error', 'E-mail yang anda masukan sudah ada');
                        redirect('settings');
                    } else {
                        $username = $this->Users_model->userLogin($id);
                        $update = $this->Users_model->userUpdated($username['phone'], ['field_email' => $email]);
                        if ($update) {
                            $this->session->set_flashdata('msg_success', 'E-mail Anda telah berhasil diubah..!');
                            redirect('settings');
                        } else {
                            $this->session->set_flashdata('message_error', 'E-mail gagal diubah...!!!');
                            redirect('settings');
                        }
                    }
                } else {
                    $this->session->set_flashdata('message_error', 'Token Error..!');
                    redirect('settings');
                }
            }
        }
        // public function updateUsername()
        // {
        //     $this->form_validation->set_rules('username', 'username', 'trim|required');
        //     if ($this->form_validation->run() == false) {
        //         $token = bin2hex(random_bytes(32)); // 32 karakter
        //         $this->session->set_userdata('verify_token', $token);
        //         $data = array(
        //             'token'     => $token,
        //             'Title'     => 'E-mail'
        //         );
        //         $this->template->viewsMobile('appMobile/v-email', $data);
        //     } else {
        //         $username       = $this->input->post('username');
        //         $button         = $this->input->post('OTP');
        //         $user           = $this->Users_model->userValid($username); //valid User					
        //         if ($user) {
        //             if ($user['is_active'] == 1) {
        //                 if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
        //                 } elseif (ctype_digit($username) && strlen($username) >= 10) {
        //                 } else {
        //                     $this->session->set_flashdata('message_info', 'Value ini bukan email atau nomor telepon yang valid.!!!');
        //                     redirect('forgot');
        //                 }
        //             } else {
        //                 $this->session->set_flashdata('message_warning', 'it not activated yet...!!!');
        //                 redirect('forgot');
        //             }
        //         } else {
        //             $this->session->set_flashdata('message_error', 'Anda belum terdaftar. Silakan lakukan pendaftaran terlebih dahulu.!');
        //             redirect('forgot');
        //         }
        //     }
        // }
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
                    $id         = $this->session->userdata('user_id');
                    if ($id) {
                        $username = $this->Users_model->userLogin($id);
                        $update = $this->Users_model->userUpdated($username['email'], ['field_password' => $password]);
                        if ($update) {
                            $this->session->set_flashdata('msg_success', 'Kata sandi Anda telah berhasil diubah..!');
                            redirect('settings');
                        } else {
                            $this->session->set_flashdata('message_error', 'Password gagal Update, Wrong Insert...!!!');
                        }
                    } else {
                        $this->session->set_flashdata('message_error', 'Username tidak ditemukan');
                        redirect('settings');
                    }
                } else {
                    $this->session->set_flashdata('message_error', 'Token OTP  Error..!');
                    redirect('settings');
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
                    $id         = $this->session->userdata('user_id');
                    if ($id) {
                        $username = $this->Users_model->userLogin($id);
                        $update = $this->Users_model->userUpdated($username['email'], ['Password' => $password]);
                        if ($update) {
                            $this->session->set_flashdata('msg_success', 'PIN Anda telah berhasil diubah..!');
                            redirect('settings');
                        } else {
                            $this->session->set_flashdata('message_error', 'PIN gagal Update, Wrong Insert...!!!');
                        }
                    } else {
                        $this->session->set_flashdata('message_error', 'Username tidak ditemukan');
                        redirect('settings');
                    }
                } else {
                    $this->session->set_flashdata('message_error', 'Token OTP  Error..!');
                    redirect('settings');
                }
            }
        }
    }
