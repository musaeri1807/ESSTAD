<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scraper extends CI_Controller
{

    public function index()
    {
        $url = "https://emasantam.id"; // Ganti dengan URL target
        $content = $this->curl_get_contents($url);
        echo $content; // Menampilkan hasilnya
    }

    private function curl_get_contents($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true); // Nonaktifkan SSL jika perlu
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
}
