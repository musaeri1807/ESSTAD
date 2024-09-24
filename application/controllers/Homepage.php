<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->helper('download', 'file');
        // $this->load->library('Template');
        $this->load->model('Users_model');
        if ($this->session->userdata('login_state') == FALSE) {
            $this->session->set_flashdata('message', '<span class="text-danger  "><p class="login-box-msg ">Wrong! You are not logged in.!</p></span>');
            redirect('Authorization');
        }
    }

    public function index()
    {
        var_dump($this->session);
        $username = $this->session->userdata('email');
        echo $username;

        $data['user'] = $this->Users_model->userValid($username);
        var_dump($this->Users_model->userValid($username));
        // die();
        $data['header'] = array(
            'header1' => $this->uri->segment('1'),
            'header2' => $this->uri->segment('2')
        );
        $data['judul'] = "Backup Database";
        $data['user'] = array(
            'Name' => 'MUSAERI',
            'Email' =>  $this->session->userdata('email'),
            'Role' => 'Administrator',
            'Company' => 'ANTAM',
            'Alamat' => 'Jl Raya Pemuda No 1 Pulo Gadung Jakarta Timur, Jakarta'
        );
        $this->template->viewsMain('main/v_home_page', $data);
    }
}
