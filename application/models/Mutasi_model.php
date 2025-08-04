<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mutasi_model extends CI_Model
{

    public function get_all_mutasi()
    {
        return $this->db->order_by('field_tanggal_saldo', 'DESC')->get('tbltrxmutasisaldo')->result();
    }
    public function get_transaksi_detail($noreferensi)
    {
        $this->db->select('
        T.field_id_saldo AS saldo_id,
        T.field_trx_id AS id_transaksi,
        T.field_member_id AS account_id,
        T.field_no_referensi AS nomor_transaksi,
        T.field_rekening AS rekening,
        T.field_tanggal_saldo AS tanggal,
        T.field_time AS time,
        T.field_type_saldo AS tipe,
        T.field_kredit_saldo AS kredit,
        T.field_debit_saldo AS debet,
        T.field_total_saldo AS Saldo,
        T.field_status AS Status,

        D.field_status AS D_status,
        D.field_branch AS D_cabang,
        D.field_deposit_gold AS D_gold,
        D.field_total_deposit AS D_rp,
        W.field_status AS W_status,
        W.field_branch AS W_cabang,
        W.field_withdraw_gold AS W_gold,
        W.field_rp_withdraw AS W_rp,
        W.field_type_withdraw AS W_tipe

        ');
        $this->db->from('tbltrxmutasisaldo T');
        $this->db->join('tbldeposit D', 'D.field_no_referensi = T.field_no_referensi', 'left');
        $this->db->join('tblwithdraw W', 'W.field_no_referensi = T.field_no_referensi', 'left');
        $this->db->where('T.field_no_referensi', $noreferensi);

        return $this->db->get()->row_array(); // bisa juga row_array() jika hanya ingin 1 baris utama
    }
}
