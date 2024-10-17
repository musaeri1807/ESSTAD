<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notification extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // Ambil data JSON dari Midtrans
        $json = file_get_contents('php://input');
        echo $data = json_decode($json, true);
    }
}
