<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Employee_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Fungsi untuk menyimpan data karyawan
    public function insert_karyawan($data)
    {
        $this->db->insert('employee', $data);
    }

    // Fungsi untuk mendapatkan semua data karyawan
    public function get_all_karyawan()
    {
        $query = $this->db->get('karyawan');
        return $query->result();
    }
}
