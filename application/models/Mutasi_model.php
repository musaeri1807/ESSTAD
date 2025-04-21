<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mutasi_model extends CI_Model
{

    public function get_all_mutasi()
    {
        return $this->db->order_by('field_tanggal_saldo', 'DESC')->get('tbltrxmutasisaldo')->result();
    }
    public function get_mutasi_by_date($dari, $sampai)
    {
        return $this->db
            ->where('field_rekening', 2020120061)
            ->where('field_tanggal_saldo >=', $dari)
            ->where('field_tanggal_saldo <=', $sampai)
            ->order_by('field_tanggal_saldo', 'ASC')
            ->get('tbltrxmutasisaldo')
            ->result();
    }
}
