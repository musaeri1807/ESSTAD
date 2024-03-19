<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Attendance extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->database();
        // $this->load->model('login_model');
        // $this->load->model('dashboard_model');
        // $this->load->model('employee_model');
        // $this->load->model('loan_model');
        // $this->load->model('settings_model');
        // $this->load->model('leave_model');
        $this->load->model('attendance_model');
        // $this->load->model('project_model');
        // $this->load->library('csvimport');
    }

    public function index()
    {
        $this->attendance();
    }

    public function attendanceList()
    {
        echo $this->input->post('startdate');
        echo "<br>";
        echo $this->input->post('enddate');
        $data['attendancelist'] = $this->attendance_model->getAllAttendance();
        $data['header1'] = $this->uri->segment('1');
        $data['header2'] = $this->uri->segment('2');
        $this->template->views('backend/attendance', $data);
    }


    public function attendanceAdd()
    {

        $data['header1'] = $this->uri->segment('1');
        $data['header2'] = $this->uri->segment('2');
        $this->template->views('backend/attendance', $data);
    }

    public function overtime()
    {

        $data['header1'] = $this->uri->segment('1');
        $data['header2'] = $this->uri->segment('2');
        $this->template->views('backend/attendance', $data);
    }
    public function report()
    {

        $data['header1'] = $this->uri->segment('1');
        $data['header2'] = $this->uri->segment('2');
        $this->template->views('backend/attendance', $data);
    }
}
