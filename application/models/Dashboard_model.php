<?php
class Dashboard_model extends CI_Model
{
    public function total_emas_unit($id_branch = 'semua')
    {
        $where_deposit  = "field_status = 'S'";
        $where_withdraw = "field_status = 'S'";

        if ($id_branch != 'semua') {
            $where_deposit  .= " AND field_branch = " . $this->db->escape($id_branch);
            $where_withdraw .= " AND field_branch = " . $this->db->escape($id_branch);
        }

        $sql = "
        SELECT 
            (
                COALESCE((SELECT SUM(field_deposit_gold) FROM tbldeposit WHERE $where_deposit), 0)
                -
                COALESCE((SELECT SUM(field_withdraw_gold) FROM tblwithdraw WHERE $where_withdraw), 0)
            ) AS total_emas
    ";

        $data = $this->db->query($sql);
        return $data->row(); // hasil: $result->total_emas
    }

    // application/models/Dashboard_model.php

    public function get_saldo_terbaru($cabang = 'semua')
    {
        $sql = "
            SELECT DISTINCT(bb.field_rekening),
            (
                SELECT field_total_saldo  
                FROM tbltrxmutasisaldo aa  
                WHERE aa.field_rekening = bb.field_rekening 
                AND aa.field_status = 'S' 
                ORDER BY aa.field_id_saldo DESC 
                LIMIT 1
            ) AS TotalSaldo,
            us.field_nama,
            us.field_member_id,
            BD.organisasi AS field_branch_name
            FROM tbltrxmutasisaldo bb 
            JOIN tbluserlogin us ON bb.field_member_id = us.field_member_id
            JOIN tblbranch B ON us.field_branch = B.field_branch_id
            JOIN tblbranchdetail BD ON B.field_id = BD.id
        ";

        if ($cabang != 'semua') {
            $sql .= " WHERE B.field_branch_id = ? ";
            $query = $this->db->query($sql, [$cabang]);
        } else {
            $query = $this->db->query($sql);
        }

        return $query->result();
    }

    public function get_monthly_deposit($cabang = 'semua', $tahun = null)
    {
        if ($tahun === null) {
            $tahun = date('Y'); // Default: tahun sekarang
        }

        $where_cabang = "";
        if ($cabang !== 'semua') {
            $where_cabang = " AND D.field_branch = " . $this->db->escape($cabang);
        }

        $sql = "
        SELECT 
            MONTHNAME(D.field_date_deposit) AS bulan,
            YEAR(D.field_date_deposit) AS tahun,
            BD.organisasi AS nama_cabang,
            SUM(D.field_operation_fee_rp) AS total
        FROM tbldeposit D
        JOIN tblbranch B ON D.field_branch = B.field_branch_id
        JOIN tblbranchdetail BD ON B.field_id = BD.id
        WHERE D.field_status = 'S'
            AND YEAR(D.field_date_deposit) = " . $this->db->escape($tahun) . "
            $where_cabang
        GROUP BY BD.organisasi, YEAR(D.field_date_deposit), MONTH(D.field_date_deposit)
        ORDER BY YEAR(D.field_date_deposit), MONTH(D.field_date_deposit), BD.organisasi
    ";

        $query = $this->db->query($sql);
        return $query->result();
    }




    // ...............................................................................................

    public function getSummary()
    {
        return [
            'total_berat'           => $this->db->select_sum('berat')->get('transaksi')->row()->berat,
            'total_poin'            => $this->db->select_sum('poin')->get('nasabah')->row()->poin,
            'nasabah_aktif'         => $this->db->where('status', 'aktif')->count_all_results('nasabah'),
            'transaksi_hari_ini'    => $this->db->where('tanggal', date('Y-m-d'))->count_all_results('transaksi')
        ];
    }

    public function getPerformaCabang()
    {
        $query = $this->db->query("
            SELECT c.nama_cabang, SUM(t.berat) as berat_sampah, COUNT(t.id_transaksi) as transaksi, COUNT(DISTINCT t.id_nasabah) as nasabah_aktif
            FROM transaksi t 
            JOIN cabang c ON c.id_cabang = t.cabang_id
            GROUP BY t.cabang_id
        ");
        return $query->result();
    }

    public function getKomposisiSampah()
    {
        $query = $this->db->query("
            SELECT jenis_sampah, SUM(berat) as total
            FROM transaksi
            GROUP BY jenis_sampah
        ");
        return $query->result();
    }

    public function getAktivitasHarian()
    {
        $query = $this->db->query("
            SELECT tanggal, SUM(berat) as total
            FROM transaksi
            GROUP BY tanggal
            ORDER BY tanggal ASC
            LIMIT 30
        ");
        return $query->result();
    }

    public function getDataNasabah()
    {
        $total = $this->db->count_all('nasabah');
        $baru = $this->db->where('MONTH(created_at)', date('m'))->count_all_results('nasabah');
        $top = $this->db->query("
            SELECT id_nasabah
            FROM transaksi
            GROUP BY id_nasabah
            ORDER BY SUM(berat) DESC
            LIMIT 5
        ")->result();
        return ['total' => $total, 'baru' => $baru, 'top' => $top];
    }
}
