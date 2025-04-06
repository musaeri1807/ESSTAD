<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('generate_norekening')) {

    function generate_norekening($cabang)
    {
        // Dapatkan instance CI
        $ci = get_instance();

        // Tanggal saat ini
        $date = date('Y-m-d');
        $thn = substr(date("Y", strtotime($date)), -2);
        $bln = date("m", strtotime($date));

        // Ambil kode cabang
        $kode_cabang = $ci->db->select('field_account_numbers')
            ->where('field_branch_id', $cabang)
            ->get('tblbranch')
            ->row_array();

        // Jika cabang tidak ditemukan, kembalikan null atau pesan error
        if (!$kode_cabang || empty($kode_cabang['field_account_numbers'])) {
            return 'CABANG TIDAK DITEMUKAN'; // Bisa diganti dengan return 'CABANG TIDAK DITEMUKAN';
        }

        $code = $kode_cabang['field_account_numbers'];

        // Ambil nomor rekening terakhir di cabang tersebut
        $idaccount = $ci->db->select('n.No_Rekening')
            ->from('tbluserlogin u')
            ->join('tblnasabah n', 'u.field_user_id = n.id_UserLogin')
            ->where('u.field_branch', $cabang)
            ->order_by('u.field_user_id', 'DESC')
            ->limit(1)
            ->get()
            ->row_array();

        // Logika penentuan nomor rekening
        if (!isset($idaccount['No_Rekening'])) {
            $no = 1;
        } else {
            $ambildate = intval(substr($idaccount['No_Rekening'], 4, 2));

            // Jika bulan berbeda, reset ke 1
            $no = ($ambildate !== intval($bln)) ? 1 : (intval(substr($idaccount['No_Rekening'], 6)) + 1);
        }
        // Format nomor rekening
        return $code . $thn . $bln . sprintf("%04s", $no);
    }
}
if (!function_exists('generate_no_referensi')) {
    function generate_no_referensi($cabang)
    {
        $ci = get_instance();
        $nomor = $ci->db->select('field_no_referensi')
            ->order_by('field_no_referensi', 'DESC')
            ->limit(1)
            ->get('tbltrxmutasisaldo')
            ->row_array();

        $thn = substr(date('Y'), -2);
        // $reff = "Reff";
        $reff = $cabang;

        if (empty($nomor) || empty($nomor['field_no_referensi'])) {
            $no = 1;
        } else {
            $noreff = $nomor['field_no_referensi'];
            $tahunTerakhir = substr($noreff, 0, 2);
            $tahunSekarang = substr(date('Y'), 2, 2);

            if ($tahunTerakhir !== $tahunSekarang) {
                $no = 1;
            } else {
                $noUrut = intval(substr($noreff, 6)) + 1;
                $no = $noUrut;
            }
        }
        return $thn . $reff . sprintf("%09s", $no);
    }
}
