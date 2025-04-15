<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepagee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session'); // testing session
        $this->load->library('Wilayah');
        $this->load->model('Users_model');
        $this->load->model('Product_model');
        $this->load->model('Settings_model');
        $this->load->model('Organization_model');

        if ($this->session->userdata('login_state') === FALSE) {
            $this->session->set_flashdata('message', '<span class="text-danger  "><p class="login-box-msg ">Wrong! You are not logged in.!</p></span>');
            redirect('Authorization');
        }

        $session = [
            'user_id'           => '227',
            'email'             => 'musaeri1807@gmail.com',
            'phone'             => '081210003701',
            'account_id'        => '081210003701',
            'role_id'           => '6',
            'login_state'       => TRUE,
            'company'           => '1234',
            'lastlogin'         => time()
        ];
        $this->session->set_userdata($session);


        // __construct
        // Ambil ID User dari Session
        $this->userId   = $this->session->userdata('user_id');
        $this->accountId = $this->session->userdata('account_id');
    }


    public function index()
    {
        // var_dump($this->session->all_userdata());

        $data = $this->prepareData('Home');
        $this->template->viewsMain('main/v_home_page', $data);
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
            'user'     => $this->Users_model->userLogin($this->userId),
            'mutasi'   => $this->Users_model->histroiMutasi($this->accountId),
            'saldo'    => $this->Users_model->sumSaldo($this->accountId),
            'provinsi' => $this->Region_model->get_provinsi(),
            'RW'       => $this->Region_model->get_rw(),
            'RT'       => $this->Region_model->get_rt(),
            'bspid'    => $this->Organization_model->get_bspid()
        ];
    }

    public function securitySetting()
    {
        $action = $this->input->post('action');

        if ($this->form_validation->run() == FALSE) {
            $data = $this->prepareData('Setting');
            $this->template->viewsMain('main/v_home_change', $data);
        } else {

            if ($action == 'change_password') {
                // $this->change_password();
                echo " Password";
            } elseif ($action = 'change_email') {
                echo " email";
                // $this->change_email();
            } elseif ($action = 'change_phone') {
                echo " phone";
                // $this->change_phone();
            }
            // switch ($action) {
            //     case 'change_password':
            //         $this->change_password();
            //         break;
            //     case 'change_email':
            //         $this->change_email();
            //         break;
            //     case 'change_phone':
            //         $this->change_phone();
            //         break;
            //     default:
            //         show_error('Aksi tidak valid');
            // }
        }
    }

    // private function change_password()
    // {
    //     // Logika ubah password
    //     $old_password = $this->input->post('passwordold');
    //     $new_password = $this->input->post('passwordnew');
    //     $confirm_password = $this->input->post('passwordnew1');

    //     if ($new_password !== $confirm_password) {
    //         echo "Password baru dan konfirmasi tidak cocok.";
    //         return;
    //     }

    //     // Simpan logika ubah password di sini
    //     echo "Password berhasil diubah.";
    // }

    private function change_email()
    {
        // Logika ubah email
        $new_email = $this->input->post('emailnew');
        if (!filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
            echo "Email tidak valid.";
            return;
        }

        // Simpan logika ubah email di sini
        echo "Email berhasil diubah.";
    }

    private function change_phone()
    {
        // Logika ubah nomor telepon
        $new_phone = $this->input->post('phonenew');

        // Validasi nomor telepon (jika perlu)
        if (!preg_match('/^\d{4}-\d{4}-\d{4}$/', $new_phone)) {
            echo "Nomor telepon tidak valid.";
            return;
        }

        // Simpan logika ubah nomor di sini
        echo "Nomor telepon berhasil diubah.";
    }


    public function accountSetting()
    {
        $data = $this->prepareData('Account Setting');
        $this->template->viewsMain('main/v_home_account', $data);
    }

    private function change_password()
    {
        //Validasi form
        $this->form_validation->set_rules(
            'passwordold',
            'Old Password',
            'trim|required',
            [
                'required' => 'Password lama wajib diisi.'
            ]
        );
        $this->form_validation->set_rules(
            'passwordnew',
            'Password Baru',
            'trim|required|min_length[8]|matches[passwordnew1]',
            [
                'required'      => 'Password Baru wajib diisi.',
                'min_length'    => 'Password Baru harus memiliki minimal {param} karakter.',
                'matches'       => 'Password Baru harus sama dengan Konfirmasi Password.'
            ]
        );
        $this->form_validation->set_rules(
            'passwordnew1',
            'Ulangi Password',
            'trim|required|min_length[8]|matches[passwordnew]',
            [
                'required'      => 'Konfirmasi Password wajib diisi.',
                'min_length'    => 'Konfirmasi Password harus memiliki minimal {param} karakter.',
                'matches'       => 'Konfirmasi Password harus sama dengan Password Baru.'
            ]
        );
        if ($this->form_validation->run() == FALSE) {
            // $data = $this->prepareData('Setting');
            // $this->template->viewsMain('main/v_home_change', $data);

            // Jika validasi gagal
            $this->session->set_flashdata('error', validation_errors());
            redirect('security'); // Kembali ke halaman form
        } else {
            $old_password     = $this->input->post('passwordold');
            $new_password     = $this->input->post('passwordnew');
            $confir_password  = $this->input->post('passwordnew1');

            // Periksa apakah old password cocok dengan yang ada di database
            $user = $this->Users_model->userLogin($this->userId);
            if (password_verify($old_password, $user['password'])) {
                // Jika old password cocok, update dengan password baru
                $hashed_new_password = password_hash($new_password, PASSWORD_BCRYPT);
                // $update = $this->User_model->userUpdated($user_id, $hashed_new_password);
                $update = $this->Users_model->userUpdated($user['email'], ['field_password' => $hashed_new_password]);

                if ($update) { //success update
                    $this->session->set_flashdata('message', '1');
                    redirect('security'); // Redirect ke halaman profil
                } else { //gagal update
                    $this->session->set_flashdata('message', '2');
                    redirect('security');
                }
            } else { //password tidak sama dengan password yang ada di database
                $this->session->set_flashdata('message', '3');
                redirect('security');
            }
        }
    }

    public function d()
    {
        $this->session->sess_destroy();
        die();

        $data['header'] = array(
            'header1' => $this->uri->segment('1'),
            'header2' => $this->uri->segment('2')
        );
        $data['judul']      = 'Home';
        $data['sampah']     = $this->Product_model->getTrash();
        $data['user']       = $this->Users_model->userLogin($userId); //query data user
        $data['provinsi']   = $this->Region_model->get_provinsi();
        $data['RW']         = $this->Region_model->get_rw();
        $data['RT']         = $this->Region_model->get_rt();
        $data['bspid']      = $this->Organization_model->get_bspid();
        $this->template->viewsMain('main/v_home_pageii', $data);
    }

    function get_kabupaten($id_prov)
    {
        $query = $this->db->get_where('region_kabupaten', array('provinsi_id' => $id_prov));
        $data = "<option value=''>- Pilih Kota/Kabupaten -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id . "'>" . $value->nama . "</option>";
        }
        echo $data;
    }
    function get_kecamatan($id_kab)
    {
        $query = $this->db->get_where('region_kecamatan', array('kabupaten_id' => $id_kab));
        $data = "<option value=''> - Pilih Kecamatan - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id . "'>" . $value->nama . "</option>";
        }
        echo $data;
    }

    function get_desa($id_kec)
    {
        $query = $this->db->get_where('region_desa', array('kecamatan_id' => $id_kec));
        $data = "<option value=''> - Pilih Kelurhan/Desa - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id . "'>" . $value->nama . "</option>";
        }
        echo $data;
    }
}
