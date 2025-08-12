<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'core/AUTH_Controller.php'); // Menambahkan include
//load email phpmailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PhpParser\Node\Stmt\ElseIf_;

class Authorization extends AUTH_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('logger');
		$this->load->library('recaptcha');
		$this->load->model('Users_model');
		$this->load->model('Organization_model');
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->helper('nogenerate_helper');

		require APPPATH . 'third_party/PHPMailer/Exception.php';
		require APPPATH . 'third_party/PHPMailer/PHPMailer.php';
		require APPPATH . 'third_party/PHPMailer/SMTP.php';
	}


	public function clear_all_session()
	{
		$this->session->sess_destroy(); // Semua session dihapus total
		redirect('login'); // Atau redirect ke halaman manapun
	}


	public function index()
	{
		$status = $this->session->userdata('status');
		if (!empty($status) && $status === 'Logged_in') {
			redirect('Users');
		}




		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$sett = $this->db->get('settings')->row_array();
			$data = array(
				'Title' 	=>	'Log in',
				'Subtitle' 	=>	'BSP',
				'widget' 	=> 	$this->recaptcha->getWidget()
				// 'script' => $this->recaptcha->getScriptTag()
			);
			$data = array_merge($data, $sett);
			$this->template->viewsMobile('appMobile/v-login2', $data);
		} else {
			// validasinya success
			$recaptcha = $this->input->post('g-recaptcha-response', TRUE);
			if (!empty($recaptcha)) {
				$response = $this->recaptcha->verifyResponse($recaptcha);
				if (isset($response['success']) and $response['success'] === true) {
					$this->_signin();
				} else {
					$this->session->set_flashdata('message_error', 'Terjadi kesalahan pada verifikasi reCAPTCHA');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('message_error', 'Silakan centang kotak reCAPTCHA untuk melanjutkan');
				redirect('login');
			}
		}
	}

	private function _signin()
	{
		$username 	= $this->input->post('username', TRUE);
		$password 	= $this->input->post('password', TRUE);
		$user 		= $this->Users_model->userValid($username);
		// var_dump($user);
		// die();
		// jika usernya ada
		if ($user) {
			// jika usernya aktif
			if ($user['is_active'] == 1) {
				// cek password
				if (password_verify($password, $user['password'])) {
					$session = [
						// 'userdata'		=> $user,
						'user_id'       => $user['user_id'],
						'email'         => $user['email'],
						'phone'         => $user['phone'],
						// 'account_id'    => $user['account_id'],
						'role_id'		=> 6,
						'login_state'   => "TRUE",
						'status' 		=> "Logged_in",
						'lastlogin'     => time()
					];
					// update date
					$this->Users_model->userUpdated($user['email'], ['last_login' => time()]);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_userdata($session);
						// $datauser = $this->session->userdata('userdata');

						// var_dump($datauser['user_id']);
						// die();
						//Email
						// $this->_sendEmail($user['name_users'], $user['email'], '', 'Login');
						if (!empty($this->input->post('rememberMe'))) {
							setcookie('loginUsername', $username, time() + (1 * 365 * 24 * 60 * 60));
							setcookie('loginPassword', $password, time() + (1 * 365 * 24 * 60 * 60));
							// Sudah di Centang;
						} else {
							setcookie('loginUsername', "");
							setcookie('loginPassword', "");
							// Belum di centang!;
						}
						$this->session->set_flashdata('message_success', 'Congratulation!');
						redirect('login');
					}
				} else {
					// // Jika login gagal
					$this->session->set_flashdata('message_error', 'Kata sandi yang Anda masukkan tidak sesuai. Silakan coba lagi');

					redirect('login');
				}
			} else {
				$this->session->set_flashdata('message_warning', 'Akun Anda belum aktif. Yuk, cek email atau whatsapp Anda dan ikuti langkah aktivasinya!');

				redirect('login');
			}
		} else {
			$this->session->set_flashdata('message_error', 'Anda belum terdaftar. Silakan lakukan pendaftaran terlebih dahulu.!');

			redirect('login');
		}
	}
	public function signinOTP()
	{
		// var_dump($this->session->all_userdata());
		$this->form_validation->set_rules(
			'username',
			'phone',
			'trim|required|numeric|min_length[10]|max_length[12]',
			[
				'required'    => 'Kolom {field} wajib diisi.',
				'min_length'  => 'Kolom {field} minimal harus berisi {param} karakter.',
				'max_length'  => 'Kolom {field} minimal harus berisi {param} karakter.',
				'numeric'	  => 'Kolom {field} harus berisi angka.'
			]
		);
		if ($this->form_validation->run() == false) {
			$sett = $this->db->get('settings')->row_array();
			$ting = array(
				'Title' 		=> 	'One-Time Password',
				'Subtitle' 		=>	'BSP',
				'widget' 		=> $this->recaptcha->getWidget()
			);
			$data = array_merge($sett, $ting);
			$this->template->viewsMobile('appMobile/v-otp2', $data);
		} else {
			// validasinya success
			$recaptcha = $this->input->post('g-recaptcha-response');
			if (!empty($recaptcha)) {
				$response = $this->recaptcha->verifyResponse($recaptcha);
				if (isset($response['success']) and $response['success'] === true) {
					$username 	= $this->input->post('username');
					$button 	= $this->input->post('OTP');
					$user 		= $this->Users_model->userValid($username); //valid User
					// var_dump($user);
					// die();
					if ($user) {
						if ($user['is_active'] == 1) {
							$nomor = $user['phone'];
							$this->session->set_userdata('NumberPhone', $nomor);
							$this->session->set_userdata('button', $button);
							$this->db->where('phone_number', $nomor);
							$this->db->delete('otp_users');
							$rand 		= rand(100000, 999999);
							$OTPUser 	= [
								'phone_number' 	=> $nomor,
								'otp' 			=> $rand,
								'date_created' 	=> date('Y-m-d H:i:s')
							];
							$this->db->insert('otp_users', $OTPUser);
							$message	= '*' . $rand . '*' . " adalah kode verifikasi Anda. Demi keamanan, jangan bagikan kode ini.";
							//OTP
							$this->_SendOTP($nomor, $message);
							$this->session->set_flashdata('message_info', 'Kode OTP dikirim ke nomor WhatsApp...!!!');
							redirect('verify-otp'); //private di pakai untuk login dan change password melalui whatsapp
							// OTP							
						} else {
							$this->session->set_flashdata('message_error', 'Akun Anda belum aktif. Silakan periksa kotak masuk email untuk aktivasi....!!!');
							redirect('otp');
						}
					} else {
						$this->session->set_flashdata('message_error', 'Nomor Anda belum terdaftar. Silakan lakukan pendaftaran terlebih dahulu...!!!');
						redirect('otp');
					}
				} else {
					$this->session->set_flashdata('message_error', 'Terjadi kesalahan pada verifikasi reCAPTCHA');
					redirect('otp');
				}
			} else {
				$this->session->set_flashdata('message_error', 'Silakan centang kotak reCAPTCHA untuk melanjutkan');
				redirect('otp');
			}
		}
	}
	public function signup()
	{
		$this->form_validation->set_rules('bspid', 'bspid', 'trim|required');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[tbluserlogin.field_email]');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|min_length[10]|max_length[12]|numeric|is_unique[tbluserlogin.field_handphone]');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('terms', 'terms', 'trim|required');
		if ($this->form_validation->run() == false) {
			// generate token tiap kali buka form
			$token = bin2hex(random_bytes(32)); // 32 karakter
			$this->session->set_userdata('register_token', $token);
			$sett = $this->db->get('settings')->row_array();
			$ting = array(
				'token' 	=> $token,
				'Title' 	=> 'Daftar Baru',
				'Subtitle'	=> 'BSP',
				'widget' 	=> $this->recaptcha->getWidget(),
				'bspid'		=> $this->Organization_model->get_bspid()
			);
			// Tampilkan hasil
			// Ambil ID cabang dari form			
			// Generate nomor rekening
			// echo $norekening = generate_norekening($cabang);
			// die();

			// $bspid = $this->Organization_model->get_bspid_by_id(3172090003);
			// var_dump($bspid->CABANG);
			// die();

			// $bspid = 'reff';
			// $noReff = generate_no_referensi($bspid);
			// echo $noReff; 
			// Misal: 24Reff000000123
			// die();
			$data = array_merge($sett, $ting);
			$this->template->viewsMobile('appMobile/v-register2', $data);
		} else {
			// validasinya success
			$recaptcha = $this->input->post('g-recaptcha-response');
			if (!empty($recaptcha)) {
				$response = $this->recaptcha->verifyResponse($recaptcha);
				if (isset($response['success']) and $response['success'] === true) {
					$bsp 		= $this->input->post('bspid');
					$name 		= $this->input->post('name');
					$email 		= $this->input->post('email');
					$password 	= $this->input->post('password');
					$phone 		= $this->input->post('phone');
					$terms 		= $this->input->post('terms');
					$token		= $this->input->post('token');
					// Ambil inputan dari form
					// $cabang = $this->input->post('cabang');
					// Generate nomor rekening menggunakan helper
					if ($terms == 'agree') {
						if ($token === $this->session->userdata('register_token')) {
							$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
							// $user = array(
							// 	'field_branch'			=> $bsp,
							// 	'field_nama' 			=> $name,
							// 	'field_email' 			=> $email,
							// 	'field_handphone' 		=> $phone,
							// 	'field_password' 		=> $password,
							// 	'id_role'		=> 6,
							// 	'created_on'	=> time()
							// );
							$this->db->trans_start();
							$users = [
								'field_nama'  			=> $name,
								'field_email' 			=> $email,
								'field_handphone'  		=> $phone,
								'field_password'		=> $password,
								'field_branch'			=> $bsp,
								'field_status_aktif' 	=> '0',
								'field_blokir_status' 	=> 'A',
								'field_token'			=> $token,
								'field_log'				=> date('Y-m-d H:i:s'),
								'field_tanggal_reg' 	=> date('Y-m-d'),
								'field_time_reg' 		=> date('H:i:s'),
								'field_token_otp'		=> (rand(999, 9999)),
								'field_member_id'		=> $bsp . $phone,
								'field_ipaddress'		=> $_SERVER['REMOTE_ADDR'],
								'created_on'			=> time()
							];

							$this->db->insert('tbluserlogin', $users);
							$user = $this->db->insert_id();
							if ($user) {
								// Insert ke tblnasabah
								$nasabah_data = [
									'id_UserLogin' => $user,
									'No_Rekening'  => generate_norekening($bsp)
								];
								$this->db->insert('tblnasabah', $nasabah_data);
								// Insert ke tblpewaris
								$pewaris_data = [
									'id_UserLogin' => $user
								];
								$this->db->insert('tblpewaris', $pewaris_data);
								// siapkan token
								$token = base64_encode(random_bytes(32));
								$user_token = [
									'id_users' => $user,
									'token' => $token,
									'date_created' => date('Y-m-d H:i:s')
								];
								$this->db->insert('token_users', $user_token);
								if ($this->db->affected_rows() > 0) {
									$bspid = $this->Organization_model->get_bspid_by_id($bsp);
									//Email
									$this->_sendEmail($name, $email, $token, 'Account Verification');
									$nomor		=	$phone;
									// $message	=	base_url() . 'authorization/verify?email=' . $email . '&token=' . urlencode($token);
									$message	=	'Terima kasih banyak atas pendaftaran Anda sebagai nasabah B S P (*Bank Sampah Pintar*) cabang *' . $bspid->CABANG . '*. Segera lakukan aktivasi dengan membuka email Anda di *' . $email . '* dalam waktu kurang dari 30 menit. Apabila Anda tidak menerima email, silakan klik tautan berikut: *' . base_url() . 'otp-account*.';
									$this->_sendOTP($nomor, $message);
								} else {
									$this->session->set_flashdata('message_error', 'Token Error..!');
								}
							} else {
								$this->session->set_flashdata('message_error', 'ID Error..!');
							}
							$this->db->trans_complete();
							if ($this->db->trans_status() === TRUE) {
								// echo "Berhasil menyimpan data.";
								$this->session->unset_userdata('register_token');
								$this->session->set_flashdata('message_success', 'Selamat pendaftaran Anda telah berhasil. Silakan cek email atau pesan whatsApp Anda untuk aktivasi.');
								redirect('register');
							} else {
								// gagal, bisa tampilkan error atau rollback
								// echo "Gagal menyimpan data.";
								$this->session->set_flashdata('message_error', 'Simpan Data Gagal..!');
								redirect('register');
							}
						} else {
							$this->session->set_flashdata('message_error', 'Token Regiter  Error..!');
							redirect('register');
						}
					} else {
						$this->session->set_flashdata('message_warning', 'Silakan centang kotak persetujuan terlebih dahulu!');
						redirect('register');
					}
				} else {
					$this->session->set_flashdata('message_error', 'Wrong Error recaptcha.!');
					redirect('register');
				}
			} else {
				$this->session->set_flashdata('message_warning', 'Silakan centang kotak reCAPTCHA untuk melanjutkan');
				redirect('register');
			}
		}
	}

	//melalui email
	public function verify()
	{
		$email	= $this->input->get('email');
		$token	= $this->input->get('token');
		$user	= $this->db->get_where('users', ['email' => $email])->row_array();
		if ($user) {
			$user_token = $this->db->get_where('token_users', ['token' => $token])->row_array();
			if ($user_token) {
				if (time() - strtotime($user_token['date_created']) <= 1800) { //kurang dari=30 menit
					if ($user['is_active'] == 0) {
						$this->Users_model->userUpdated($email, ['field_status_aktif' => '1']);
						if ($this->db->affected_rows() > 0) {
							//cari data nasabah dengan where id login
							$akun = $this->db->get_where('tblnasabah', ['id_UserLogin' => $user['user_id']])->row_array();
							$saldoAwal = [
								'field_member_id' 		=> $user['account_id'],
								'field_trx_id'			=> generate_no_transaksi($user['company']),
								'field_no_referensi'   	=> generate_no_referensi('Reff'),
								'field_rekening'    	=> $akun['No_Rekening'],
								'field_tanggal_saldo'   => date('Y-m-d'),
								'field_time'  			=> date('H:i:s'),
								'field_status' 			=> 'S',
								'field_comments' 		=> "Saldo Awal"
							];
							// Lakukan insert ke tabel transaksi saldo
							$insert = $this->db->insert('tbltrxmutasisaldo', $saldoAwal);
							if ($insert) {
								// Update 
								$this->db->where('id_UserLogin', $user['user_id']);
								$this->db->update('tblnasabah', ['Konfirmasi' => 'Y']);
								// Bisa tambahkan pengecekan jika diperlukan
								if ($this->db->affected_rows() > 0) {
									// Update berhasil
									// Kirim email success dan kirim WA Success
									// Berhasil memperbarui
									$nomor		=	$user['phone'];
									$message	=	'Akun Anda sudah aktif. Selamat datang! Bank Sampah Pintar (B S P)';
									$this->_sendOTP($nomor, $message);
									$this->session->set_flashdata('message_success', 'Verification Account Success...!!!');
									redirect('login');
								} else {
									// Tidak ada baris yang terpengaruh (mungkin ID tidak ditemukan)
									$this->session->set_flashdata('message_warning', 'Gagal Updated Nasabah Y ...!!!');
									redirect('login');
								}
							} else {
								// Insert gagal
								$this->session->set_flashdata('message_warning', 'Gagal Insert Mutasi Tabel...!!!');
								redirect('login');
							}
						} else {
							// Tidak ada yang diperbarui
							$this->session->set_flashdata('message_warning', 'Gagal Verification Updated ...!!!');
							redirect('login');
						}
					} else {
						$this->session->set_flashdata('message_info', 'Account is Active...!!!');
						redirect('login');
					}
				} else {
					if ($user['is_active'] == 0) {
						// echo "generade Ulang";
						$token = base64_encode(random_bytes(32));
						$user_token = [
							'id_users' 		=> $user['user_id'],
							'token' 		=> $token,
							'date_created' 	=> date('Y-m-d H:i:s')
						];
						$this->db->get_where('token_users', ['id_users' => $user['user_id']])->row_array();
						$this->db->where('id_users', $user['user_id']);
						$this->db->update('token_users', $user_token);
						if ($this->db->affected_rows() > 0) {
							//Email
							$this->_sendEmail($user['name_users'], $email, $token, 'Account Verification');
							$nomor		=	$user['phone'];
							$message	=	'Silakan cek Email terbaru anda di ' . $email . 'untuk aktivasi ulang';
							$this->_sendOTP($nomor, $message);
							$this->session->set_flashdata('message_info', 'Kami kirim tautan terbaru silakan periksa Email Anda...!!!');
							redirect('login');
						} else {
							// echo "Gagal Update Token.";
							$this->session->set_flashdata('message_warning', 'Gagal Updated Token...!');
						}
					} else {
						$this->session->set_flashdata('message_warning', 'Token expired...!!!');
						redirect('login');
					}
				}
			} else {
				$this->session->set_flashdata('message_error', 'Verifikasi akun gagal. Token yang Anda gunakan tidak sesuai atau sudah kadaluarsa.');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('message_error', 'Verifikasi akun gagal. Email yang Anda gunakan tidak sesuai atau sudah kadaluarsa.');
			redirect('login');
		}
	}

	public function accountOTP()
	{
		$this->form_validation->set_rules(
			'username',
			'phone',
			'trim|required|numeric|min_length[10]|max_length[12]',
			[
				'required'    => 'Kolom {field} wajib diisi.',
				'min_length'  => 'Kolom {field} minimal harus berisi {param} karakter.',
				'max_length'  => 'Kolom {field} minimal harus berisi {param} karakter.',
				'numeric'	  => 'Kolom {field} harus berisi angka.'
			]
		);
		if ($this->form_validation->run() == false) {
			$sett = $this->db->get('settings')->row_array();
			$ting = array(
				'Title' 		=> 	'Verifikasi Akun',
				'Subtitle' 		=>	'BSP',
				'widget' 		=> $this->recaptcha->getWidget()
			);
			$data = array_merge($sett, $ting);
			$this->template->viewsMobile('appMobile/v-account', $data);
		} else {
			// validasinya success
			$recaptcha = $this->input->post('g-recaptcha-response');
			if (!empty($recaptcha)) {
				$response = $this->recaptcha->verifyResponse($recaptcha);
				if (isset($response['success']) and $response['success'] === true) {
					$username 	= $this->input->post('username');
					$button 	= $this->input->post('OTP_account');
					$user 		= $this->Users_model->userValid($username); //valid User
					// var_dump($user);
					// die();
					if ($user) {
						if ($user['is_active'] == 0) {
							$nomor = $user['phone'];
							$this->session->set_userdata('NumberPhone', $nomor);
							$this->session->set_userdata('button', $button);
							$this->db->where('phone_number', $nomor);
							$this->db->delete('otp_users');
							$rand 		= rand(100000, 999999);
							$OTPUser 	= [
								'phone_number' 	=> $nomor,
								'otp' 			=> $rand,
								'date_created' 	=> date('Y-m-d H:i:s')
							];
							$this->db->insert('otp_users', $OTPUser);
							$message	= '*' . $rand . '*' . " adalah kode verifikasi Anda. Demi keamanan, jangan bagikan kode ini.";
							//OTP
							$this->_SendOTP($nomor, $message);
							$this->session->set_flashdata('message_info', 'Silakan periksa,kode OTP dikirim ke nomor WhatsApp...!!!');
							redirect('verify-otp'); //private di pakai untuk login dan change password melalui whatsapp
							// OTP							
						} else {
							$this->session->set_flashdata('message_info', 'Your account is active...!!!');
							redirect('login');
						}
					} else {
						$this->session->set_flashdata('message_error', 'Anda belum terdaftar. Silakan lakukan pendaftaran terlebih dahulu.!');
						redirect('register');
					}
				} else {
					$this->session->set_flashdata('message_error', 'Wrong Error reCAPTCHA...!!!');
					redirect('otp-account');
				}
			} else {
				$this->session->set_flashdata('message_error', 'Silakan centang kotak reCAPTCHA untuk melanjutkan....!!!');
				redirect('otp-account');
			}
		}
	}

	public function forgot()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		if ($this->form_validation->run() == false) {
			$sett = $this->db->get('settings')->row_array();
			$ting = array(
				'Title' 	=> 'Forgot Password',
				'Subtitle' 	=> 'Type your Username to reset your password',
				'widget' 	=> $this->recaptcha->getWidget()
			);
			$data = array_merge($sett, $ting);
			$this->template->viewsMobile('appMobile/v-forgot2', $data);
		} else {
			// validasinya success
			$recaptcha = $this->input->post('g-recaptcha-response');
			if (!empty($recaptcha)) {
				$response = $this->recaptcha->verifyResponse($recaptcha);
				if (isset($response['success']) and $response['success'] === true) {
					$username 	= $this->input->post('username');
					$button 	= $this->input->post('OTP');
					$user 		= $this->Users_model->userValid($username); //valid User					
					if ($user) {
						if ($user['is_active'] == 1) {
							if (filter_var($username, FILTER_VALIDATE_EMAIL)) {

								$this->db->where('id_users', $user['user_id']);
								$this->db->delete('token_users');
								// siapkan token
								$token 		= base64_encode(random_bytes(32));
								$user_token = [
									'id_users' 		=> $user['user_id'],
									'token' 		=> $token,
									'date_created' 	=> date('Y-m-d H:i:s')
								];
								// save
								$this->db->insert('token_users', $user_token);
								if ($this->db->affected_rows() > 0) {
									//Email
									$this->_sendEmail($user['name_users'], $user['email'], $token, 'Reset Password');
									$this->session->set_flashdata('message_info', 'Silakan periksa email Anda untuk mereset kata sandi...!!!');
									redirect('forgot');
								} else {
									$this->session->set_flashdata('message_error', 'Token failed to save...!!!');
									redirect('forgot');
								}
							} elseif (ctype_digit($username) && strlen($username) >= 10) {
								$nomor = $user['phone'];
								$this->session->set_userdata('NumberPhone', $nomor);
								$this->session->unset_userdata('button');
								$this->db->where('phone_number', $nomor);
								$this->db->delete('otp_users');
								$rand 		= rand(100000, 999999);
								$OTPUser 	= [
									'phone_number' 	=> $nomor,
									'otp' 			=> $rand,
									'date_created' 	=> date('Y-m-d H:i:s')
								];
								$this->db->insert('otp_users', $OTPUser);
								$message	= '*' . $rand . '*' . " adalah kode verifikasi Anda. Demi keamanan, jangan bagikan kode ini.";
								//OTP
								$this->_SendOTP($nomor, $message);
								$this->session->set_flashdata('message_info', 'Silakan periksa, Kode dikirim ke nomor WhatsApp..!!!');
								redirect('verify-otp');
								// OTP
							} else {
								$this->session->set_flashdata('message_info', 'Value ini bukan email atau nomor telepon yang valid.!!!');
								redirect('forgot');
							}
						} else {
							$this->session->set_flashdata('message_warning', 'it not activated yet...!!!');
							redirect('forgot');
						}
					} else {
						$this->session->set_flashdata('message_error', 'Anda belum terdaftar. Silakan lakukan pendaftaran terlebih dahulu.!');
						redirect('forgot');
					}
				} else {
					$this->session->set_flashdata('message_error', 'Wrong Error recaptcha...!!!');
					redirect('forgot');
				}
			} else {
				$this->session->set_flashdata('message_error', 'Silakan centang kotak reCAPTCHA untuk melanjutkan.');
				redirect('forgot');
			}
		}
	}

	public function verifyOTP()
	{
		if (!$this->session->userdata('NumberPhone')) {
			redirect('login');
		}
		// $this->session->set_userdata('NumberPhone', '081210003701');
		// $this->form_validation->set_rules('1', 'Username', 'trim|required|numeric');
		// $this->form_validation->set_rules('2', 'Username', 'trim|required|numeric');
		// $this->form_validation->set_rules('3', 'Username', 'trim|required|numeric');
		// $this->form_validation->set_rules('4', 'Username', 'trim|required|numeric');
		// $this->form_validation->set_rules('5', 'Username', 'trim|required|numeric');
		// $this->form_validation->set_rules('6', 'Username', 'trim|required|numeric');
		$this->form_validation->set_rules('smscode', 'Username', 'trim|required|numeric');
		if ($this->form_validation->run() == false) {
			// generate token tiap kali buka form
			$token = bin2hex(random_bytes(32)); // 32 karakter
			$this->session->set_userdata('verify_token', $token);
			$this->db->where('phone_number', $this->session->userdata('NumberPhone'));
			$query = $this->db->get('otp_users');
			$result = $query->row_array(); // Mengambil satu baris hasil sebagai array asosiatif
			$DateCreated = strtotime(date($result['date_created']));
			if (time() - $DateCreated <= 600) {
				$sett = $this->db->get('settings')->row_array();
				$ting = array(
					'token' 	=> $token,
					'Title' 	=> ' OTP',
					'widget' 	=> $this->recaptcha->getWidget()
				);
				$data = array_merge($sett, $ting);
				$this->template->viewsMobile('appMobile/v-verifyotp', $data);
			} else {
				$this->db->where('phone_number', $this->session->userdata('NumberPhone'));
				$this->db->delete('otp_users');
				$button = $this->session->userdata('button');
				if ($button == 'signin') {
					$this->session->unset_userdata('NumberPhone');
					$this->session->set_flashdata('message_error', 'OTP Log in expired...!!!');
					redirect('otp');
				} elseif ($button == 'account_verification') {
					$this->session->unset_userdata('NumberPhone');
					$this->session->set_flashdata('message_error', 'OTP Verification expired...!!!');
					redirect('otp-account');
				} else {
					$this->session->unset_userdata('NumberPhone');
					$this->session->set_flashdata('message_error', 'OTP Reset expired...!!!');
					redirect('forgot');
				}
			}
		} else {
			// validasinya success
			$token		= $this->input->post('token');
			if ($token === $this->session->userdata('verify_token')) {
				// $satu 	= $this->input->post('1');
				// $dua 	= $this->input->post('2');
				// $tiga 	= $this->input->post('3');
				// $empat 	= $this->input->post('4');
				// $lima 	= $this->input->post('5');
				// $enam 	= $this->input->post('6');
				// $number = $satu . $dua . $tiga . $empat . $lima . $enam; // 123456	
				$number	= $this->input->post('smscode');
				$this->db->where('otp', $number);
				$query = $this->db->get('otp_users');
				$result = $query->row_array(); // Mengambil satu baris hasil sebagai array asosiatif
				$DateCreated = strtotime(date($result['date_created']));
				if ($result) {
					if (time() - $DateCreated <= 600) {
						if ($this->session->userdata('button') == 'signin') {
							$user 		= $this->Users_model->userValid($this->session->userdata('NumberPhone'));
							$session = [
								// 'userdata'		=> $user,
								'user_id'       => $user['user_id'],
								'email'         => $user['email'],
								'phone'         => $user['phone'],
								// 'account_id'    => $user['account_id'],
								'role_id'		=> 6,
								'login_state'   => TRUE,
								'status' 		=> "Logged_in",
								'lastlogin'     => time()
							];

							$this->Users_model->userUpdated($user['email'], ['last_login' => time()]);
							if ($this->db->affected_rows() > 0) {
								$this->session->set_userdata($session);
								// $this->_sendEmail($user['name_users'], $user['email'], '', 'OTP Login'); //Email
								$this->session->set_flashdata('message_success', 'Congratulation...!!!');
								redirect('login'); //Masuk ke halaman users
							}
						} else if ($this->session->userdata('button') == 'account_verification') {
							$this->Users_model->userUpdated($this->session->userdata('NumberPhone'), ['field_status_aktif' => '1']);
							if ($this->db->affected_rows() > 0) {
								$user = $this->db->get_where('users', ['phone' => $this->session->userdata('NumberPhone')])->row_array();
								$akun = $this->db->get_where('tblnasabah', ['id_UserLogin' => $user['user_id']])->row_array();
								$saldoAwal = [
									'field_member_id' 		=> $user['account_id'],
									'field_trx_id'			=> generate_no_transaksi($user['company']),
									'field_no_referensi'   	=> generate_no_referensi('Reff'),
									'field_rekening'    	=> $akun['No_Rekening'],
									'field_tanggal_saldo'   => date('Y-m-d'),
									'field_time'  			=> date('H:i:s'),
									'field_status' 			=> 'S',
									'field_comments' 		=> "Saldo Awal"
								];
								$insert = $this->db->insert('tbltrxmutasisaldo', $saldoAwal);
								if ($insert) {
									// Update 
									$this->db->where('id_UserLogin', $user['user_id']);
									$this->db->update('tblnasabah', ['Konfirmasi' => 'Y']);
									// Bisa tambahkan pengecekan jika diperlukan
									if ($this->db->affected_rows() > 0) {
										// Update berhasil
										// Kirim email success dan kirim WA Success
										// Berhasil memperbarui
										$nomor		=	$this->session->userdata('NumberPhone');
										$message	=	'Akun Anda sudah aktif. Selamat datang! Bank Sampah Pintar (B S P)';
										$this->_sendOTP($nomor, $message);
										$this->session->set_flashdata('clear_all_session_msg_success', 'Verification Account Success...!!!');
										redirect('login');
									} else {
										// Tidak ada baris yang terpengaruh (mungkin ID tidak ditemukan)
										$this->session->set_flashdata('message_warning', 'Gagal Updated Nasabah Y ...!!!');
										redirect('login');
									}
								} else {
									// Insert gagal
									$this->session->set_flashdata('message_warning', 'Gagal Insert Mutasi Tabel...!!!');
									redirect('login');
								}
							} else {
								// Tidak ada yang diperbarui
								$this->session->set_flashdata('message_warning', 'Gagal Verification Updated ...!!!');
								redirect('login');
							}
						} else {
							$this->session->set_userdata('UserName', $result['phone_number']);
							$this->changePassword();
						}
					} else {
						if ($this->session->userdata('button') == 'signin') {
							$this->session->set_flashdata('message_error', 'OTP expired...!!!');
							redirect('otp');
						} else if ($this->session->userdata('button') == 'account_verification') {
							$this->session->set_flashdata('message_error', 'OTP expired...!!!');
							redirect('otp-account');
						} else {
							$this->session->set_flashdata('message_error', 'OTP expired...!!!');
							redirect('forgot');
						}
					}
				} else {
					$attempt = $this->session->userdata('attempt') ?? 0;
					$attempt++;
					$this->session->set_userdata('attempt', $attempt);

					if ($attempt >= 3) {
						$this->db->where('phone_number', $this->session->userdata('NumberPhone'));
						$this->db->delete('otp_users');
						$this->session->unset_userdata(['attempt', 'NumberPhone']);
						$button = $this->session->userdata('button');
						// var_dump($button);
						// die();
						if ($button == 'signin') {
							$this->session->set_flashdata('message_error', 'OTP Log in Salah...!!!' . $attempt . 'x');
							redirect('otp');
						} elseif ($button == 'account_verification') {
							$this->session->set_flashdata('message_error', 'OTP Verification Salah...!!!' . $attempt . 'x');
							redirect('otp-account');
						} else {
							$this->session->set_flashdata('message_error', 'OTP Reset Salah...!!!' . $attempt . 'x');
							redirect('forgot');
						}
					} else {
						$this->session->set_flashdata('message_warning', 'OTP Salah.!' . $attempt . 'x');
						redirect('verify-otp');
					}
				}
			} else {
				$this->session->set_flashdata('message_error', 'Token OTP  Error..!');
				// redirect('verify-otp');
				redirect('login');
			}
		}
	}

	public function reset()
	{
		$email 	= $this->input->get('email');
		$token 	= $this->input->get('token');
		$user	= $this->Users_model->userValid($email);
		if ($user) {
			$user_token = $this->db->get_where('token_users', ['token' => $token])->row_array();
			$DateCreated = strtotime(date($user_token['date_created']));
			if ($user_token) {
				if (time() - $DateCreated <= 600) {	//kurang dari samadengan 10 menit
					$this->session->set_userdata('UserName', $email);
					$this->changePassword();
				} else {
					$this->session->set_flashdata('message_warning', 'Reset password failed! expired token...!!!');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('message_error', 'Reset password failed! wrong token...!!!');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('message_error', 'Reset password failed! Wrong email...!!!');
			redirect('login');
		}
	}
	public function changePassword()
	{
		if (!$this->session->userdata('UserName')) {
			redirect('login');
		}
		// $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]');
		// $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[8]|matches[password1]');
		$this->form_validation->set_rules(
			'password1',
			'Kata Sandi',
			'trim|required|min_length[8]|matches[password2]',
			array(
				'required'   => '%s wajib diisi.',
				'min_length' => '%s minimal 8 karakter.',
				'matches'    => '%s harus sama dengan Ulangi Kata Sandi.'
			)
		);

		$this->form_validation->set_rules(
			'password2',
			'Ulangi Kata Sandi',
			'trim|required|min_length[8]|matches[password1]',
			array(
				'required'   => '%s wajib diisi.',
				'min_length' => '%s minimal 8 karakter.',
				'matches'    => '%s harus sama dengan Kata Sandi.'
			)
		);
		if ($this->form_validation->run() == false) {
			$token = bin2hex(random_bytes(32)); // 32 karakter
			$this->session->set_userdata('verify_token', $token);
			$data['token'] = array(
				'token'     => $token,
				'Title'     => 'Change Password'
			);
			$this->template->viewsMobile('appMobile/v-change2', $data);
		} else {
			$token      = $this->input->post('token');
			if ($token === $this->session->userdata('verify_token')) {
				$inputPassword 	= $this->input->post('password1');
				$password 		= password_hash($inputPassword, PASSWORD_DEFAULT);
				$username 		= $this->session->userdata('UserName');
				if ($username) {
					$in = $this->Users_model->userUpdated($username, ['field_password' => $password]);
					// var_dump($in);
					// die();
					if ($in) {
						$this->session->set_flashdata('msg_success', 'Kata sandi Anda telah berhasil diubah...!!!');
						$this->session->unset_userdata('UserName');
						$this->session->unset_userdata('NumberPhone');
						redirect('login');
					}
				} else {
					$this->session->set_flashdata('message_error', 'Password gagal Update, Wrong Insert...!!!');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('message_error', 'Token Tidak dikirim');
				redirect('users');
			}
		}
	}
	private function _sendEmail($name, $email, $token, $subject)
	{
		//load Database
		$set = $this->db->get('settings')->row_array();
		if ($subject == 'Account Verification') {
			$link = base_url() . 'verify?email=' . $email . '&token=' . urlencode($token);
			$bodyEmail = auth_mail($name, $link, $subject);
			$idlog = '3';
			// $bodyEmail = 'Click this link to verify you account : <a href="' . base_url() . 'authorization/verify?email=' . $email . '&token=' . urlencode($token) . '">Activate</a>';
		} else if ($subject == 'Reset Password') {
			$link = base_url() . 'reset?email=' . $email . '&token=' . urlencode($token);
			$bodyEmail = auth_mail($name, $link, $subject);
			$idlog = '2';
		} else {
			$bodyEmail = info_mail($name, $subject);
			$idlog = '1';
		}

		// PHPMailer object
		// $response = false;
		$mail = new PHPMailer();
		// ***---SMTP configuration---***
		$mail->isSMTP();
		$mail->Host       = $set['smtp_host']; //sesuaikan sesuai nama domain hosting/server yang digunakan
		$mail->SMTPAuth   = true;
		$mail->Username   = $set['smtp_email']; // user email
		$mail->Password   = $set['smtp_password']; // password email
		$mail->SMTPSecure = 'ssl';
		$mail->Port       = $set['smtp_port'];
		// ***---SMTP configuration---***
		$mail->setFrom($set['smtp_username'], $set['name_application']); // user email
		$mail->addReplyTo('', 'no-reply'); //user email
		$mail->addAddress($email); //email tujuan pengiriman email

		$mail->Subject = $subject; //subject email

		$mail->isHTML(true);
		$mail->Body = $bodyEmail;

		// Send email
		if (!$mail->send()) {
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			$this->logger
				->user($email) //Set UserID, who created this  Action
				->type($subject) //Entry type like, Post, Page, Entry, signin
				->id($idlog) //Entry ID 1 Login  2 Logout 3 Reset
				->token($token) //Token identify Action
				->comment($_SERVER['REMOTE_ADDR'] . "-" . $_SERVER['HTTP_USER_AGENT']) //Comment 
				->log(); //Add Database Entry	
			$this->session->set_flashdata('message_info', 'Access send Email Succes!!!');
		}
	}
	private function _SendOTP($nomor, $message)
	{
		// OTP	

		$whatsapp = [
			'target'            => $nomor,
			'message'           => $message
		];
		// Server OTP
		$curl = curl_init();
		curl_setopt(
			$curl,
			CURLOPT_HTTPHEADER,
			array(
				"Authorization: " . KEY_API_WA,
			)
		);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($whatsapp));
		curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		$result = curl_exec($curl);
		if (curl_errno($curl)) {
			$error_msg = curl_error($curl);
			echo $error_msg;
		}
		curl_close($curl);
		echo $result;
	}

	public function logout()
	{

		$this->logger
			->user($this->session->userdata('email')) //Set UserID, who created this  Action
			->type('Logout') //Entry type like, Post, Page, Entry, signin
			->id(4) //Entry ID 1 login  2 logout 3 Reset
			->token(md5(date('h:i:s'))) //Token identify Action
			->comment($_SERVER['REMOTE_ADDR'] . "-" . $_SERVER['HTTP_USER_AGENT']) //Comment 
			->log(); //Add Database Entry	
		$this->session->set_flashdata('message_info', 'Account have been logout!');
		$this->session->unset_userdata('login_state');
		$this->session->unset_userdata('userdata');
		$this->session->sess_destroy();
		redirect('login');
	}

	function terms()
	{

		$this->load->view('authorization/v_terms');
	}
	public function Renewal()
	{
		// Ganti dengan alamat email penerima
		// $to = 'infomail17089@gmail.com,musaeri1807@gmail.com,info@miga.co.id';
		$recipients = array(
			// '' 			=> 'Person 1',
			// '' 				=> 'Person 2',
			// '' 		=> 'Person 3',
			'infomail17089@gmail.com' 			=> 'Person 4'

		);



		$subject = 'Renewal BSP (Bank Sampah Pintar)';

		// PHPMailer object
		// $response = false;
		$mail = new PHPMailer();
		// ***---SMTP configuration---***
		$mail->isSMTP();
		$mail->Host       = 'mx.mailspace.id'; // sesuaikan sesuai nama domain hosting/server yang digunakan
		$mail->SMTPAuth   = true;
		$mail->Username   = 'no_reply@miga.co.id'; //  user email
		$mail->Password   = 'P@ssw0rdmiga.2022#'; //  password email
		$mail->SMTPSecure = 'ssl';
		$mail->Port       = 465;
		// ***---SMTP configuration---***
		$mail->setFrom('no_reply@miga.co.id', 'noreplay-MIGA'); // user email
		$mail->addReplyTo('', 'no_reply'); //user email
		// $mail->addAddress($to); 
		foreach ($recipients as $to => $name) {
			$mail->addAddress($to); //email tujuan pengiriman email
		}
		$file_path = FCPATH . 'assets/attachment/invoice-#01801258910.pdf';
		$mail->AddAttachment($file_path);
		$mail->Subject = $subject; //subject email

		$mail->isHTML(true);
		$mail->Body = renewal();

		// Send email
		if (!$mail->send()) {
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message has been sent';
		}
	}
}
