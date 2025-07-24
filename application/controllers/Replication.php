<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Replication extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session'); // testing session        
        $this->load->model('Users_model');
        $this->load->helper('download', 'file');
    }

    public function index()
    {
        // Authorization
        $session = [
            'email'             => 'infomail17089@gmail.com',
            'id_users'          => '19',
            'role'              => '6',
            'login_state'       => TRUE,
            'lastlogin'         => time()
        ];
        $this->session->set_userdata($session);
        // Authorization
        // die();
        // Contruct
        $userId = $this->session->userdata('id_users');
        // echo $userId;

        // Contruct
        // var_dump($this->Users_model->userLogin($userId));

        $data['user'] = $this->Users_model->userLogin($userId);
        // var_dump($this->Users_model->userLogin($userId));

        // die();

        // $uri = array(
        //     'header1' => $this->uri->segment('1'),
        //     'header2' => $this->uri->segment('2')
        // );
        $data['user'] = $this->Users_model->userLogin($userId); //query data user
        $data['judul'] = "Backup Database";
        $data['db'] = $this->db->get('backup')->result_array();
        // $data = array_merge($uri, $dat, $db);
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
        $local_db = $this->load->database('remote', TRUE); // 'local' adalah nama konfigurasi koneksi database lokal di file database.php

        // Konfigurasi database server hosting
        $remote_db = $this->load->database('default', TRUE); // 'remote' adalah nama konfigurasi koneksi database hosting di file database.php

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

    // private function replicateTablesMasterSlave()
    // {
    //     // Koneksi ke DB lokal (master)
    //     $local_db = $this->load->database('default', TRUE);

    //     // Koneksi ke DB remote (slave/hosting)
    //     $remote_db = $this->load->database('remote', TRUE);

    //     // Ambil hanya tabel yang sama di kedua DB
    //     $tables_local  = $local_db->list_tables();
    //     $tables_remote = $remote_db->list_tables();

    //     var_dump($tables_local);
    //     die();
    //     $same_tables = array_intersect($tables_local, $tables_remote);

    //     foreach ($same_tables as $table) {
    //         echo "Replikasi tabel: {$table}<br>";

    //         // Ambil semua data dari lokal
    //         $rows = $local_db->get($table)->result_array();

    //         if (!empty($rows)) {
    //             // Kosongkan tabel di server hosting (opsional, jika replace total)
    //             $remote_db->truncate($table);

    //             // Insert batch (lebih efisien)
    //             $remote_db->insert_batch($table, $rows);
    //         }
    //     }

    //     echo "Replikasi selesai.";
    // }


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

    public function replicateMissingTables()
    {
        set_time_limit(0); // ⏱️ unlimited waktu proses
        $local_db = $this->load->database('default', TRUE); // local_data (sumber)
        $prod_db  = $this->load->database('remote', TRUE);  // prod_data (tujuan)

        $tables_local = $local_db->list_tables();
        $tables_prod  = $prod_db->list_tables();

        // Cari tabel yang hanya ada di local
        $missing_tables = array_diff($tables_local, $tables_prod);

        if (empty($missing_tables)) {
            echo "✅ Semua tabel dari local_data sudah ada di remote.";
            return;
        }

        foreach ($missing_tables as $table_name) {
            echo "🔄 Menyalin tabel: <strong>$table_name</strong> ke remote<br>";

            // Step 1: Salin struktur dari local ke remote
            $create_query = $local_db->query("SHOW CREATE TABLE `$table_name`")->row_array();
            // $create_sql   = $create_query['Create Table'];
            $create_sql   = array_values($create_query)[1];
            $prod_db->query($create_sql);
            echo "✅ Struktur tabel '$table_name' berhasil dibuat di remote.<br>";

            // Step 2: Ambil primary key dari local
            $pk_result = $local_db->query("SHOW KEYS FROM `$table_name` WHERE Key_name = 'PRIMARY'")->result();
            $primary_keys = array();
            foreach ($pk_result as $pk) {
                $primary_keys[] = $pk->Column_name;
            }

            // Step 3: Ambil data dari local
            $data = $local_db->get($table_name)->result_array();
            $inserted = 0;
            $skipped  = 0;

            foreach ($data as $row) {
                $exists = false;

                if (!empty($primary_keys)) {
                    $prod_db->from($table_name);
                    foreach ($primary_keys as $pk) {
                        if (!isset($row[$pk])) continue;
                        $prod_db->where($pk, $row[$pk]);
                    }
                    $exists = $prod_db->get()->num_rows() > 0;
                }

                if (!$exists) {
                    $prod_db->insert($table_name, $row);
                    $inserted++;
                } else {
                    $skipped++;
                }
            }

            echo "✅ Disalin ke remote: $inserted baris, dilewati (duplikat): $skipped baris.<br>";
            echo "<hr>";
        }

        echo "🎉 Proses replikasi dari local ke remote selesai.";
    }
}
