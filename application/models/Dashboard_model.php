<?php
class Dashboard_model extends CI_Model
{

    public function getSummary()
    {
        return [
            'total_berat' => $this->db->select_sum('berat')->get('transaksi')->row()->berat,
            'total_poin'  => $this->db->select_sum('poin')->get('nasabah')->row()->poin,
            'nasabah_aktif' => $this->db->where('status', 'aktif')->count_all_results('nasabah'),
            'transaksi_hari_ini' => $this->db->where('tanggal', date('Y-m-d'))->count_all_results('transaksi')
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
