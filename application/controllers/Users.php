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
            $this->form_validation->set_rules('tipe', 'tipe', 'required');
            $this->form_validation->set_rules('rupiah', 'rupiah', 'required');
            $this->form_validation->set_rules('gram', 'gram', 'required');
            if ($this->form_validation->run() == false) {
                $data['provinsi']   = $this->Region_model->get_provinsi();
                $data['RW']         = $this->Region_model->get_rw();
                $data['RT']         = $this->Region_model->get_rt();
                $data['sampah']     = $this->Product_model->getTrash();
                $data['gold']       = $this->Product_model->getGold();
                $data['bspid']      = $this->Organization_model->get_bspid();
                $data['user']       = $this->Users_model->userLogin($this->session->userdata('user_id')); // Gunakan email dari userdata
                $data['saldo']      = $this->Users_model->sumSaldo($data['user']['account_id']);
                $data['mutasi']     = $this->Users_model->histroiMutasi($data['user']['account_id']);

                $token = bin2hex(random_bytes(32)); // 32 karakter
                $this->session->set_userdata('verify_token', $token);
                $data['token'] = array(
                    'token'     => $token,
                    'Title'     => 'Transaksi Baru'
                );
                $this->load->view('appMobile/v_home', $data);
            } else {
                $token      = $this->input->post('token');
                if ($token === $this->session->userdata('verify_token')) {
                    $this->session->set_userdata('inputData', [
                        'Tipe'      => $this->input->post('tipe'),
                        'rupiah'    => $this->input->post('rupiah'),
                        'Gramasi'   => $this->input->post('gram')
                    ]);

                    if (!$this->Product_model->dayGold()) {
                        $this->triggerPIN();
                    } else {
                        $this->session->unset_userdata(['inputData', 'verify_token', 'attempt']);
                        $this->session->set_flashdata('message_warning', 'Harga emas terkini belum tersedia');
                        redirect('users');
                    }
                } else {
                    $this->session->set_flashdata('message_error', 'Token Tidak dikirim');
                    redirect('users');
                }
            }
        }



        public function userTransaction($noreferensi = null)
        {
            $noreferensi     = $this->input->get('transaksi');
            // echo $noreferensi;
            // die();
            if (!$noreferensi) {
                // show_404(); // atau redirect ke halaman lain
                redirect('Error404');
            }

            // Ambil data dari model berdasarkan no referensi
            $data['transaksi_detail'] = $this->Mutasi_model->get_transaksi_detail($noreferensi);
            // var_dump($data['transaksi_detail']);

            if (!$data['transaksi_detail']) {
                // show_404(); // Data tidak ditemukan
                redirect('Error404');
            }

            // Tampilkan view detail transaksi
            $this->load->view('appMobile/v-transaction-detail', $data);
        }

        public function userTransactionHistory()
        {
            // $data['transaksi'] = $this->Mutasi_model->get_transaksi_history();
            $this->load->view('appMobile/v-transaction-search');
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
                        redirect('user-settings');
                    } else {
                        // $this->session->set_flashdata('msg_success', 'Update!');
                        // redirect('settings');
                        $username = $this->Users_model->userLogin($id);
                        $update = $this->Users_model->userUpdated($username['email'], ['field_handphone' => $nomor]);
                        if ($update) {
                            $this->session->set_flashdata('msg_success', 'Nomor Anda telah berhasil diubah..!');
                            redirect('user-settings');
                        } else {
                            $this->session->set_flashdata('message_error', 'Nomor gagal diubah...!!!');
                            redirect('user-settings');
                        }
                    }
                } else {
                    $this->session->set_flashdata('message_error', 'Token Error..!');
                    redirect('user-settings');
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
                        redirect('user-settings');
                    } else {
                        $username = $this->Users_model->userLogin($id);
                        $update = $this->Users_model->userUpdated($username['phone'], ['field_email' => $email]);
                        if ($update) {
                            $this->session->set_flashdata('msg_success', 'E-mail Anda telah berhasil diubah..!');
                            redirect('user-settings');
                        } else {
                            $this->session->set_flashdata('message_error', 'E-mail gagal diubah...!!!');
                            redirect('user-settings');
                        }
                    }
                } else {
                    $this->session->set_flashdata('message_error', 'Token Error..!');
                    redirect('user-settings');
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
                    $id         = $this->session->userdata('user_id');
                    if ($id) {
                        $username = $this->Users_model->userLogin($id);
                        $update = $this->Users_model->userUpdated($username['email'], ['field_password' => $password]);
                        if ($update) {
                            $this->session->set_flashdata('msg_success', 'Kata sandi Anda telah berhasil diubah..!');
                            redirect('user-settings');
                        } else {
                            $this->session->set_flashdata('message_error', 'Password gagal Update, Wrong Insert...!!!');
                            redirect('user-settings');
                        }
                    } else {
                        $this->session->set_flashdata('message_error', 'Username tidak ditemukan');
                        redirect('user-settings');
                    }
                } else {
                    $this->session->set_flashdata('message_error', 'Token OTP  Error..!');
                    redirect('user-settings');
                }
            }
        }
        public function updatePIN()
        {
            $this->form_validation->set_rules('pincode', 'pincode', 'trim|required|numeric|min_length[6]');
            if ($this->form_validation->run() == false) {
                $token = bin2hex(random_bytes(32)); // 32 karakter
                $this->session->set_userdata('verify_token', $token);
                $data = array(
                    'token'     => $token,
                    'Title'     => 'Memperbarui PIN',
                    'Subtitle'  => 'Masukkan 6 digit PIN Anda'
                );
                $this->template->viewsMobile('appMobile/v-PIN-change', $data);
            } else {
                $token        = $this->input->post('token');
                if ($token === $this->session->userdata('verify_token')) {
                    $password = password_hash($this->input->post('pincode'), PASSWORD_DEFAULT);
                    // var_dump($password);
                    // die();
                    $id         = $this->session->userdata('user_id');
                    if ($id) {
                        $username = $this->Users_model->userLogin($id);
                        $update = $this->Users_model->userUpdated($username['email'], ['Password' => $password]);
                        if ($update) {
                            $this->session->set_flashdata('msg_success', 'PIN Anda telah berhasil diubah..!');
                            redirect('user-settings');
                        } else {
                            $this->session->set_flashdata('message_error', 'PIN gagal Update, Wrong Insert...!!!');
                        }
                    } else {
                        $this->session->set_flashdata('message_error', 'Username tidak ditemukan');
                        redirect('user-settings');
                    }
                } else {
                    $this->session->set_flashdata('message_error', 'Token OTP  Error..!');
                    redirect('user-settings');
                }
            }
        }
        public function triggerPIN()
        {
            // var_dump($this->session->userdata('inputData'));

            if (!$this->session->userdata('inputData')) {
                redirect('Users');
            }

            if (!$this->input->post('pincode')) {
                // Tampilkan form PIN saja
                $token = bin2hex(random_bytes(32)); // 32 karakter
                $this->session->set_userdata('verify_token', $token);
                $data = array(
                    'token'     => $token,
                    'Title'     => 'PIN',
                    'Subtitle'  => 'Masukkan 6 digit PIN Anda'
                );
                $this->template->viewsMobile('appMobile/v-PIN', $data);
                return;
            }
            $this->form_validation->set_rules('pincode', 'PIN', 'trim|numeric|min_length[6]');
            if ($this->form_validation->run() == false) {
                $token = bin2hex(random_bytes(32)); // 32 karakter
                $this->session->set_userdata('verify_token', $token);
                $data = array(
                    'token'     => $token,
                    'Title'     => 'PIN'
                );
                $this->template->viewsMobile('appMobile/v-PIN', $data);
            } else {
                $token      = $this->input->post('token');
                $user       = $this->Users_model->userLogin($this->session->userdata('user_id')); // Gunakan email dari userdata
                $nasabah    = $this->Users_model->userNasabah($this->session->userdata('user_id'));
                $saldo      = $this->Users_model->sumSaldo($user['account_id']);
                $gold       = $this->Product_model->getGold();
                if ($token === $this->session->userdata('verify_token')) {
                    $pin = $this->input->post('pincode');
                    $id         = $this->session->userdata('user_id');
                    if ($id) {
                        $username   = $this->Users_model->userLogin($id);
                        $inputData  = $this->session->userdata('inputData');

                        if ($inputData['Tipe'] == 201) { //cetak fisik
                            $price          = $gold['sell'];
                            $gramasi        = $inputData['Gramasi'];
                            $value_rp       = $gramasi * $price;
                            $saldo_akhir    = $saldo['saldo'] - $gramasi;
                        } else if ($inputData['Tipe'] == 202) { //buyback
                            $price          = $gold['buyback'];
                            $value_rp       = $inputData['rupiah']; //100.000
                            $gramasi        = number_format($value_rp / $price, 6);
                            $saldo_akhir    = $saldo['saldo'] - $gramasi;
                        } else { //Pembelian
                            $value = $this->input->post('rupiah');
                        }

                        // rumus
                        // Jika buyback maka inputan rupiha di bagi harga buyback hasilnya nilai gram emas
                        // $input = $value / $gold['buyback'];
                        // echo ($price);
                        // echo '<br>';
                        // echo ($value_rp);
                        // echo '<br>';
                        // echo 'Konversi ' . ($gramasi);
                        // echo '<br>';
                        // echo 'Saldo Awal ' . ($saldo['saldo']);
                        // echo '<br>';
                        // echo 'Saldo akhir ' . ($saldo_akhir);

                        if (password_verify($pin, $username['PIN'])) {
                            // insert data
                            if ($saldo['saldo'] > $gramasi) {
                                $this->db->trans_begin(); // Mulai transaksi
                                // 1. Insert ke tblwithdraw
                                $withdraw = [
                                    'field_no_referensi'        => generate_no_referensi('Reff'),
                                    'field_date_withdraw'       => date('y-m-d'),
                                    'field_rekening_withdraw'   => $nasabah['rekening'],
                                    'field_type_withdraw'       => $inputData['Tipe'],
                                    'field_branch'              => $nasabah['branch_id'],
                                    'field_officer_id'          => $nasabah['user_id'],
                                    'field_gold_price'          => $price,
                                    'field_withdraw_gold'       => $gramasi,
                                    'field_rp_withdraw'         => $value_rp,
                                    'field_status'              => 'S'
                                ];

                                $insert = $this->db->insert('tblwithdraw', $withdraw);

                                if ($insert) {
                                    $withdrawId = $this->db->insert_id();
                                    // 2. Insert ke tblwithdrawdetail
                                    $withdrawDetail = [
                                        'field_trx_withdraw'    => $withdrawId,
                                        'field_product'         => $gramasi,
                                        'field_berat'           => $gramasi,
                                        'field_quantity'        => 1,
                                        'field_total_berat'     => $gramasi * 1
                                    ];

                                    $insertDetail = $this->db->insert('tblwithdrawdetail', $withdrawDetail);

                                    if ($insertDetail) {
                                        // 3. Update saldo nasabah
                                        $updateSaldo = [
                                            'field_member_id'           => $user['account_id'],
                                            'field_trx_id'              => generate_no_transaksi($user['company']),
                                            'field_no_referensi'        => generate_no_referensi('Reff'),
                                            'field_rekening'            => $nasabah['rekening'],
                                            'field_tanggal_saldo'       => date('Y-m-d'),
                                            'field_time'                => date('H:i:s'),
                                            'field_type_saldo'          => '200',
                                            'field_debit_saldo'         => $gramasi,
                                            'field_total_saldo'         => $saldo_akhir,
                                            'field_status'              => 'S',
                                            'field_comments'            => "Buyback"
                                        ];
                                        // Lakukan insert ke tabel transaksi saldo
                                        $insert = $this->db->insert('tbltrxmutasisaldo', $updateSaldo);

                                        $this->db->trans_commit(); // Jika semua berhasil, commit
                                        $this->session->set_flashdata('msg_success', 'Transaksi berhasil dibuat');
                                    } else {
                                        $this->db->trans_rollback(); // Gagal insert detail → rollback semua
                                        $this->session->set_flashdata('message_warning', 'Gagal simpan detail transaksi');
                                    }
                                } else {
                                    $this->db->trans_rollback(); // Gagal insert utama → rollback semua
                                    $this->session->set_flashdata('message_warning', 'Gagal simpan transaksi');
                                }
                                $this->session->unset_userdata(['inputData', 'verify_token', 'attempt']);
                                redirect('Users');
                            } else {
                                $this->session->unset_userdata(['inputData', 'verify_token', 'attempt']);
                                $this->session->set_flashdata('message_warning', 'Transaksi Gagal ,Saldo tidak cukup');
                                redirect('users');
                            }
                        } else {
                            $attempt = $this->session->userdata('attempt') ?? 0;
                            $attempt++;
                            $this->session->set_userdata('attempt', $attempt);

                            if ($attempt >= 3) {
                                $this->session->unset_userdata(['inputData', 'verify_token', 'attempt']);
                                // Default jika sudah 3x gagal
                                $this->session->set_flashdata('message_error', 'PIN Salah sudah ' . $attempt . 'x, Setting Ulang PIN Anda.');
                                redirect('user-settings');
                            } else {
                                // Masih di bawah 3x, beri peringatan
                                $this->session->set_flashdata('message_info', 'PIN Salah...!!! (' . $attempt . 'x)');
                                redirect('verify-pin');
                            }
                        }
                    } else {
                        $this->session->set_flashdata('message_error', 'Username tidak ditemukan');
                        redirect('Users');
                    }
                } else {
                    $this->session->set_flashdata('message_error', 'Token Tidak dikirim');
                    redirect('Users');
                }
            }
        }
    }
