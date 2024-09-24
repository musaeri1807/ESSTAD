<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Replication extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('download', 'file');
    }

    public function index()
    {
        $uri = array(
            'header1' => $this->uri->segment('1'),
            'header2' => $this->uri->segment('2')
        );
        // $dat['users'] = $this->M_mysqldata->userLogin($this->session->userdata('id_users'));
        $dat['judul'] = "Backup Database";
        $db['db'] = $this->db->get('backup')->result_array();
        $data = array_merge($uri, $dat, $db);
        $this->template->viewsMain('main/v_backup_page', $data);
    }

    public function backupDb()
    {
        //load database
        $this->load->dbutil();
        $dbname = 'DbBackupOn-' . date("Ymd-His");
        $prefs = array(
            'format' => 'txt',
            'filename' => 'db_backup.sql'
        );

        $back = $this->dbutil->backup($prefs);
        $backup = &$back;
        $save = FCPATH . 'assets/backupdb/' . $dbname . '.txt';
        $db = write_file($save, $backup);


        if ($db === TRUE) {
            $this->db->insert('backup', ['files' => $dbname]);
            $this->deleteAllDataFromTablesReplication();
            $this->replicateTablesMasterSlave();
            // redirect
            $this->session->set_flashdata('massage', 'dibackup');
            redirect('Replication', 'refresh');
        }
        $this->session->set_flashdata('massage', 'Data gagal di backup');
        redirect('Replication/backupDb', 'refresh');
    }


    private function replicateTablesMasterSlave()
    {
        // Konfigurasi database server lokal
        $local_db = $this->load->database('default', TRUE); // 'local' adalah nama konfigurasi koneksi database lokal di file database.php

        // Konfigurasi database server hosting
        $remote_db = $this->load->database('remote', TRUE); // 'remote' adalah nama konfigurasi koneksi database hosting di file database.php

        // Daftar tabel yang akan direplikasi  **$tables = array("users", "settings");      
        $tables = $local_db->list_tables();

        foreach ($tables as $table) {
            // Ambil data dari server lokal untuk tabel saat ini
            $query = $local_db->get($table);
            $rows = $query->result_array();
            // Masukkan data ke server hosting untuk tabel saat ini
            foreach ($rows as $row) {
                $remote_db->insert($table, $row);
            }
        }
    }

    public function backupDbDelete($id)
    {
        // var_dump($id);
        // die();
        // Cek apakah data backup ada
        $backup = $this->db->get_where('backup', ['files' => $id])->row_array();

        if (!$backup) {
            $this->session->set_flashdata('message', 'Backup tidak ditemukan');
            redirect('Replication');
            return;
        }

        $file = $backup['files'];
        $filePath = FCPATH . 'assets/backupdb/' . $file . '.txt';

        // Cek apakah file ada di server
        if (file_exists($filePath)) {
            unlink($filePath); // Hapus file dari server
        } else {
            $this->session->set_flashdata('message', 'File tidak ditemukan');
            // Hapus data dari database
            $this->db->delete('backup', ['files' => $id]);
            redirect('Replication');
            return;
        }
        // Hapus data dari database
        $this->db->delete('backup', ['files' => $id]);

        // Tampilkan pesan sukses
        $this->session->set_flashdata('success', 'Backup berhasil dihapus');
        redirect('Replication');
    }

    public function downloadDb($name)
    {
        // Tentukan path file
        $filePath = 'assets/backupdb/' . $name;
        // Cek apakah file ada
        if (file_exists($filePath)) {
            // Jika file ada, unduh file
            force_download($filePath, NULL);
        } else {
            // Jika file tidak ada, beri pesan error
            $this->session->set_flashdata('message', 'File tidak ditemukan.');
            redirect('Replication'); // Redirect ke halaman yang diinginkan
        }
    }


    private function deleteAllDataFromTablesReplication()
    {
        // load database server hosting
        $remote_db = $this->load->database('remote', TRUE); // 'remote' adalah nama konfigurasi koneksi database hosting di file database.php
        // Daftar tabel yang akan didelete  **$tables = array("users", "settings");      
        $tables = $remote_db->list_tables();

        foreach ($tables as $table) {
            // Ambil data dari server remot untuk tabel saat ini
            $query = $remote_db->get($table);
            $rows = $query->result_array();
            // delete data ke server hosting untuk tabel saat ini
            foreach ($rows as $row) {
                $remote_db->delete($table, $row);
            }
        }
    }
}
