<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session'); // testing session
        // $this->session->set_userdata($session);
        $this->load->model('Users_model');
        // if ($this->session->userdata('login_state') == FALSE) {
        //     $this->session->set_flashdata('message', '<span class="text-danger  "><p class="login-box-msg ">Wrong! You are not logged in.!</p></span>');
        //     redirect('Authorization');
        // }
    }

    public function index()
    {
        // Authorization
        $session = [
            'email'             => 'infomail17089@gmail.com',
            'id_users'          => '19',
            'role'              => '6',
            'login_state'       => TRUE,
            'lastlogin'         => time()
        ];
        $this->session->set_userdata($session);
        // Authorization

        // Contruct
        $userId = $this->session->userdata('id_users');
        // echo $userId;

        // Contruct


        // var_dump($this->Users_model->userLogin($userId));
        // die();

        $data['header'] = array(
            'header1' => $this->uri->segment('1'),
            'header2' => $this->uri->segment('2')
        );
        $data['judul'] = "Backup Database";
        $data['user'] = $this->Users_model->userLogin($userId); //query data user
        $this->template->viewsMain('main/v_home_page', $data);
    }
    public function changePasswordUser()
    {
        echo "Ubah Password";
    }
}
