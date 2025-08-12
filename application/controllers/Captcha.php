<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Captcha extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('captcha');  // Load helper untuk captcha
    }

    // Tampilkan form dengan captcha
    public function index()
    {
        $captcha = $this->_create_captcha(); // Buat captcha
        $data['captcha_image'] = $captcha['image'];  // Simpan gambar captcha
        $data['captcha_word'] = $captcha['word'];  // Simpan kata captcha untuk validasi nanti
        $this->session->set_userdata('captcha_word', $captcha['word']);  // Simpan kata captcha di session
        $this->load->view('captcha_view', $data);  // Tampilkan view
    }

    // Proses form submission dan verifikasi captcha
    public function validate()
    {
        $user_captcha = $this->input->post('captcha'); // Ambil input dari user
        $captcha_word = $this->session->userdata('captcha_word'); // Ambil kata captcha yang disimpan

        if ($user_captcha === $captcha_word) {
            echo "Captcha valid!";
        } else {
            echo "Captcha tidak valid!";
        }
    }

    // Fungsi untuk membuat captcha
    private function _create_captcha()
    {
        $captcha_config = array(
            'img_path' => './assets/captcha/',  // Path untuk menyimpan gambar captcha
            'img_url' => base_url('assets/captcha/'),  // URL untuk mengakses gambar
            'word_length' => 6,  // Panjang kata captcha
            'img_width' => 150,  // Lebar gambar
            'img_height' => 50,  // Tinggi gambar
            'font_size' => 30,  // Ukuran font
            'expiration' => 7200,  // Waktu kedaluwarsa captcha dalam detik
        );

        return create_captcha($captcha_config);  // Buat dan kembalikan captcha
    }
}
