<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Tambahkan header keamanan
        header('X-Frame-Options: SAMEORIGIN');  // Mencegah Clickjacking
        header('X-Content-Type-Options: nosniff');  // Mencegah MIME type sniffing
        header('X-XSS-Protection: 1; mode=block');  // Mengaktifkan perlindungan XSS
        header('Referrer-Policy: no-referrer-when-downgrade'); // Batasi info referer
        header('Permissions-Policy: accelerometer=(), camera=(), microphone=(), geolocation=()'); // Batasi API browser

        header("Content-Security-Policy: default-src 'self'; script-src 'self' https://trustedscripts.example.com; object-src 'none';");

        header('Access-Control-Allow-Origin: https://trusteddomain.com');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
    }
}
