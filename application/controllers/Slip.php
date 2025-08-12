<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slip_gaji extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('my_phpmailer');  // Pastikan library PHPMailer dimuat
        $this->load->model('Users_model'); // Asumsi model untuk mengambil email karyawan
    }

    public function index()
    {
        $this->load->view('upload_slip_gaji');
    }

    public function upload_process()
    {
        // Path untuk menyimpan file yang diupload
        $config['upload_path'] = './uploads/slip_gaji/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 2048; // Batas ukuran file 2MB per file

        $this->load->library('upload', $config);

        // Ambil file yang diupload
        $files = $_FILES;
        $count = count($_FILES['slip_gaji']['name']);

        if ($count > 100) {
            $this->session->set_flashdata('error', 'Jumlah file yang diupload tidak boleh lebih dari 100.');
            redirect('slip_gaji');
        }

        // Proses setiap file slip gaji
        for ($i = 0; $i < $count; $i++) {
            $_FILES['slip_gaji']['name'] = $files['slip_gaji']['name'][$i];
            $_FILES['slip_gaji']['type'] = $files['slip_gaji']['type'][$i];
            $_FILES['slip_gaji']['tmp_name'] = $files['slip_gaji']['tmp_name'][$i];
            $_FILES['slip_gaji']['error'] = $files['slip_gaji']['error'][$i];
            $_FILES['slip_gaji']['size'] = $files['slip_gaji']['size'][$i];

            if (!$this->upload->do_upload('slip_gaji')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('slip_gaji');
            } else {
                // Dapatkan nama file dan kirim email slip gaji ke karyawan
                $data = $this->upload->data();
                $file_path = './uploads/slip_gaji/' . $data['file_name'];

                // Asumsi nama file sama dengan email karyawan misal: johndoe@example.com.pdf
                $email = str_replace('.pdf', '', $data['file_name']);
                var_dump($email);
                die();
                $this->send_email($email, $file_path);
            }
        }

        // Jika semua file berhasil diupload dan dikirim
        $this->session->set_flashdata('success', 'Slip gaji berhasil diupload dan dikirim.');
        redirect('slip_gaji');
    }

    private function send_email($email, $file_path)
    {
        $subject = 'Slip Gaji Bulanan';
        $body = 'Berikut adalah slip gaji bulanan Anda. Silakan lihat lampiran.';

        // Kirim email menggunakan PHPMailer
        $this->my_phpmailer->sendMailWithAttachment($email, $subject, $body, $file_path);
    }
}
