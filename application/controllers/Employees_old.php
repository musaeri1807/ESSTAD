<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Employees extends CI_Controller
{

    public function index()
    {
        $this->employee();
    }

    public function employee()
    {

        $data['header1'] = $this->uri->segment('1');
        $data['header2'] = $this->uri->segment('2');
        $this->template->views('backend/employees', $data);
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
