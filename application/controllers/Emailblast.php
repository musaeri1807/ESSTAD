<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Emailblast extends CI_Controller
{

    public function sendEmail()
    {
        $this->load->library('My_PHPMailer');

        $to = 'infomail17089@gmail.com'; // Ganti dengan alamat email penerima
        $subject = 'Test Email';
        $body = '<h1>Ini adalah email test!</h1>';

        if ($this->my_phpmailer->sendMail($to, $subject, $body)) {
            echo 'Email berhasil dikirim!';
        } else {
            echo 'Email gagal dikirim!';
        }
    }
}