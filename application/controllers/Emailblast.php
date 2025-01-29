<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Emailblast extends CI_Controller
{

    public function index()
    {
        $this->load->library('My_PHPMailer');
        $to = 'infomail17089@gmail.com'; // Ganti dengan alamat email penerima
        $subject = 'Renewall BSP';
        $body = 'ccc';

        if ($this->my_phpmailer->sendMail($to, $subject, $body)) {
            echo 'Email berhasil dikirim!';
        } else {
            echo 'Email gagal dikirim!';
        }
    }
}
