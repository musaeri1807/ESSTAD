<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('generate_norekening')) {
    function generate_norekening($cabang)
    {
        // Dapatkan instance CI
        $ci = get_instance();

        // Tanggal saat ini
        $date = date('Y-m-d');

        // Ambil kode cabang
        $kode_cabang = $ci->db->where('field_branch_id', $cabang)
            ->order_by('field_branch_id', 'DESC')
            ->get('tblbranch')
            ->row_array();

        // Ambil akun terakhir di cabang tersebut
        $idaccount = $ci->db->select('N.No_Rekening')
            ->join('tblnasabah N', 'U.field_user_id = N.id_UserLogin')
            ->join('tblbranch B', 'U.field_branch = B.field_branch_id')
            ->where('B.field_branch_id', $cabang)
            ->order_by('U.field_user_id', 'DESC')
            ->limit(1)
            ->get('tbluserlogin U')
            ->row_array();

        // Logika penentuan nomor rekening
        if (empty($idaccount)) {
            $code = $kode_cabang["field_account_numbers"];
            $thn = substr(date("Y", strtotime($date)), -2);
            $bln = date("m", strtotime($date));
            $no = 1;
            $char = $code . $thn . $bln;
            $norekening = $char . sprintf("%04s", $no);
        } else {
            $ambildate = substr($idaccount['No_Rekening'], 4, 2);
            $code = $kode_cabang["field_account_numbers"];
            $thn = substr(date("Y", strtotime($date)), -2);
            $bln = date("m", strtotime($date));

            if ($ambildate !== $bln) {
                $no = 1;
                $char = $code . $thn . $bln;
                $norekening = $char . sprintf("%04s", $no);
            } else {
                $noUrut = substr($idaccount['No_Rekening'], 6);
                $no = $noUrut + 1;
                $char = $code . $thn . $bln;
                $norekening = $char . sprintf("%04s", $no);
            }
        }

        return $norekening;
    }
}
