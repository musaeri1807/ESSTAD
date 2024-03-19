<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Homepage extends CI_Controller
{


    public function index()
    {
        
        $data['header1'] = $this->uri->segment('1');
        $data['header2'] = $this->uri->segment('2');
        $this->template->views('backend/homepage', $data);
    }
}
