 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Users extends CI_Controller
    {


        function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function index()
        {

            $this->load->view('users/v_users_home');
        }
        public function Setting()
        {
            $this->load->view('users/v_users_home');
        }
    }
