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

            $get_prov = $this->db->select('*')->from('region_provinsi')->get();
            $data['provinsi'] = $get_prov->result();

            if ($dari && $sampai) {
                $data['mutasi'] = $this->Mutasi_model->get_mutasi_by_date($dari, $sampai, $nomor);
            } else {
                $data['mutasi'] = $this->Mutasi_model->get_all_mutasi();
            }

            $this->load->view('users/v_users_home', $data);
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
