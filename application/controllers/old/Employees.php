<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Employees extends CI_Controller
{
    function __construct()
    {
        // parent::__construct();
        // $this->load->database();
        // $this->load->model('dashboard_model');
        // $this->load->model('employee_model');
        // $this->load->model('login_model');
        // $this->load->model('payroll_model');
        // $this->load->model('settings_model');
        // $this->load->model('leave_model');
    }

    public function index()
    {
        $this->employee();
    }
    // private function myprofile()
    // {
    //     $uri = array(
    //         'header1' => $this->uri->segment('1'),
    //         'header2' => $this->uri->segment('2')
    //     );

    //     $users = array(
    //         'name' => 'MUSAERI',
    //         'id'    => '12'
    //     );

    //     $data = array_merge($uri, $users);


    //     $this->template->views('backend/myprofile', $data);
    // }
    public function employee()
    {

        $data['header1'] = $this->uri->segment('1');
        $data['header2'] = $this->uri->segment('2');
        $this->template->views('backend/myprofile', $data);
    }


    public function disciplinary()
    {

        $data['header1'] = $this->uri->segment('1');
        $data['header2'] = $this->uri->segment('2');
        $this->template->views('backend/disciplinary', $data);
    }

    public function inactiveEmployees()
    {

        $data['header1'] = $this->uri->segment('1');
        $data['header2'] = $this->uri->segment('2');
        $this->template->views('backend/invalid_user', $data);
    }
}
