<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Import extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('Employee_model');  // Model untuk menyimpan data ke database
	}
	public function index()
	{
		$this->load->view('form_import_view');
	}


	public function do_import()
	{
		// Konfigurasi untuk file upload
		$config['upload_path'] = './uploads/excel/';
		$config['allowed_types'] = 'xls|xlsx';
		$config['max_size'] = 10000; // Maksimal ukuran file 10MB
		$config['file_name'] = 'data_karyawan_' . time(); // Nama file yang unik time()

		
		$this->upload->initialize($config);
		print_r($this->upload->initialize($config));
		die();
		if (!$this->upload->do_upload('file')) {
			// Jika gagal upload
			echo $this->upload->display_errors();
		} else {
			// Jika berhasil upload
			$file = $this->upload->data();
			// Path file excel yang diupload
			$inputFileName = './uploads/excel/' . $file['file_name'];
			try {
				// Load file excel
				$reader = new Xlsx();
				$spreadsheet = $reader->load($inputFileName);

				// Ambil sheet aktif dari file excel
				$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

				// Looping data untuk dimasukkan ke database
				foreach ($sheetData as $key => $value) {
					if ($key == 1) {
						// Skip header (baris pertama)
						continue;
					}
					// Masukkan data karyawan ke dalam array
					$data = array(
						'nama'      => $value['A'], // Kolom A untuk nama
						'email'     => $value['B'], // Kolom B untuk email
						'jabatan'   => $value['C'], // Kolom C untuk jabatan
						'nik'      	=> $value['D'], // Kolom D untuk gaji
					);
					// Simpan data ke database
					$this->Employee_model->insert_karyawan($data);
					$imported_data[] = $data; // Simpan untuk ditampilkan nanti
				}

				// Hapus file excel setelah proses import selesai
				unlink($inputFileName);

				// Kirim data yang diimpor ke view untuk ditampilkan
				$data['imported_data'] = $imported_data;
				$this->load->view('import_result_view', $data);

				echo "Data Employee Berhasil diImpor.";
			} catch (Exception $e) {
				echo "Error loading file: " . $e->getMessage();
			}
		}
	}
}
