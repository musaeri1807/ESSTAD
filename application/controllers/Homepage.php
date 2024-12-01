<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session'); // testing session
        $this->load->library('Wilayah');
        // $this->session->set_userdata($session);
        $this->load->model('Users_model');
        $this->load->model('Product_model');
        $this->load->model('Settings_model');
        $this->load->model('Organization_model');
        if ($this->session->userdata('login_state') === FALSE) {
            $this->session->set_flashdata('message', '<span class="text-danger  "><p class="login-box-msg ">Wrong! You are not logged in.!</p></span>');
            redirect('Authorization');
        }

        // Authorization
        $session = [
            'email'             => 'infomail17089@gmail.com',
            'id_users'          => '1',
            // 'role'              => '6',
            'login_state'       => TRUE,
            'lastlogin'         => time(),
            'account_id'        => '081291711116'
        ];
        $this->session->set_userdata($session);
        // Authorization

        // __construct
        // Ambil ID User dari Session
        $this->userId   = $this->session->userdata('id_users');
        $this->accountId = $this->session->userdata('account_id');
        // ......................................................................
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

    public function index()
    {
        $data = $this->prepareData('Home');
        $this->template->viewsMain('main/v_home_page', $data);
    }

    public function accountSetting()
    {
        $data = $this->prepareData('Account Setting');
        $this->template->viewsMain('main/v_home_account', $data);
    }

    public function securitySetting()
    {
        $this->form_validation->set_rules('password', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data = $this->prepareData('Setting');
            $this->template->viewsMain('main/v_home_change', $data);
        } else {
            echo "RUN";
        }
    }

    public function dle()
    {
        // Authorization
        $session = [
            'email'             => 'infomail17089@gmail.com',
            'id_users'          => '1',
            'role'              => '6',
            'login_state'       => TRUE,
            'lastlogin'         => time()
        ];
        $this->session->set_userdata($session);
        // Authorization

        // __construct
        $userId = $this->session->userdata('id_users');
        // echo $userId;
        // __construct

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
