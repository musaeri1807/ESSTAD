<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wilayah
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance(); // Akses CodeIgniter instance
        $this->ci->load->model('Region_model'); // Load model Wilayah
    }

    public function get_provinsi()
    {
        return $this->ci->Region_model->get_provinsi();
    }

    public function get_kabupaten($provinsi_id)
    {
        return $this->ci->Region_model->get_kabupaten($provinsi_id);
    }

    public function get_kecamatan($kabupaten_id)
    {
        return $this->ci->Region_model->get_kecamatan($kabupaten_id);
    }

    public function get_desa($kecamatan_id)
    {
        return $this->ci->Region_model->get_desa($kecamatan_id);
    }
}
