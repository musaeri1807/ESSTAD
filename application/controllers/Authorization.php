<?php
defined('BASEPATH') or exit('No direct script access allowed');
//load email phpmailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Authorization extends CI_Controller
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

	public function index()
	{
		// if ($this->session->userdata('email') and $this->session->userdata('user_id')) {
		// 	redirect('Homepage');
		// }

		// $this->session->sess_destroy();
		// var_dump($this->session->all_userdata());
		// $this->changePassword();
		// die();
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$sett = $this->db->get('settings')->row_array();
			$data = array(
				'Title' => ' Login',
				'widget' => $this->recaptcha->getWidget()
				// 'script' => $this->recaptcha->getScriptTag()
			);
			$data = array_merge($data, $sett);
			$this->template->viewsAuth('authorization/v-login2', $data);
		} else {
			// validasinya success
			$recaptcha = $this->input->post('g-recaptcha-response', TRUE);
			if (!empty($recaptcha)) {
				$response = $this->recaptcha->verifyResponse($recaptcha);
				if (isset($response['success']) and $response['success'] === true) {
					$this->_signin();
				} else {
					$this->session->set_flashdata('message_error', 'Wrong Error recaptcha!');
					redirect('authorization');
				}
			} else {
				$this->session->set_flashdata('message_error', 'Checkbox is unchecked in Recaptcha');
				// $this->session->set_flashdata('message_error', '<span class="text-danger "><p class="login-box-msg">Checkbox is unchecked in Recaptcha</p></span>');
				redirect('authorization');
			}
		}
	}

	private function _signin()
	{
		$username 	= $this->input->post('username', TRUE);
		$password 	= $this->input->post('password', TRUE);
		$user 		= $this->Users_model->userValid($username);
		// jika usernya ada
		if ($user) {
			// jika usernya aktif
			if ($user['is_active'] == 1) {
				// cek password
				if (password_verify($password, $user['password'])) {
					$session = [
						'user_id'       => $user['user_id'],
						'email'         => $user['email'],
						'phone'         => $user['phone'],
						'account_id'    => $user['account_id'],
						'role_id'		=> 6,
						'login_state'   => TRUE,
						'lastlogin'     => time()
					];
					// update date
					$this->Users_model->userUpdated($user['email'], ['last_login' => time()]);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_userdata($session);
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
						// $this->session->set_flashdata('message_success', '<span class="text-success "><p class="login-box-msg ">Congratulation!</p></span>');
						redirect('authorization');
					}
				} else {
					// // Jika login gagal
					$this->session->set_flashdata('message_error', 'Wrong password!');
					// $this->session->set_flashdata('message_error', '<span class="text-danger  "><p class="login-box-msg ">Wrong password!</p></span>');
					redirect('authorization');
				}
			} else {
				$this->session->set_flashdata('message_warning', 'This email has not been activated!');
				// $this->session->set_flashdata('message', '<span class="text-warning  "><p class="login-box-msg ">This email has not been activated!</p></span>');
				redirect('authorization');
			}
		} else {
			$this->session->set_flashdata('message_error', 'Akun tidak terdaftar!');
			// $this->session->set_flashdata('message', '<span class="text-danger  "><p class="login-box-msg ">Tidak terdaftar!</p></span>');
			redirect('authorization');
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
				'Title' => ' OTP',
				'widget' => $this->recaptcha->getWidget()
			);
			$data = array_merge($sett, $ting);
			$this->template->viewsAuth('authorization/v-otp2', $data);
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
							$this->session->set_flashdata('message_info', 'Silakan periksa,kode OTP dikirim ke nomor WhatsApp...!!!');
							redirect('verify-otp'); //private di pakai untuk login dan change password melalui whatsapp
							// OTP							
						} else {
							$this->session->set_flashdata('message_error', 'Belum aktif...!!!');
							redirect('otp');
						}
					} else {
						$this->session->set_flashdata('message_error', 'Nomor tidak terdaftar...!!!');
						redirect('otp');
					}
				} else {
					$this->session->set_flashdata('message_error', 'Wrong Error recaptcha...!!!');
					redirect('otp');
				}
			} else {
				$this->session->set_flashdata('message_error', 'Checkbox is unchecked in Recaptcha...!!!');
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
				'Title' 	=> ' Register',
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
			$this->template->viewsAuth('authorization/v-register2', $data);
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
									$message	=	'Terima kasih banyak atas pendaftaran Anda! sebagai nasabah B S P (*Bank Sampah Pintar*) *' . $bspid->CABANG . '*, Segera untuk aktivasi dengan membuka email Anda di ' . $email . ' Kurang dari 30 Menit';
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
								$this->session->set_flashdata('message_success', 'Congratulation.!');
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
						$this->session->set_flashdata('message_warning', 'Wrong ! agree');
						redirect('register');
					}
				} else {
					$this->session->set_flashdata('message_error', 'Wrong Error recaptcha.!');
					// $this->session->set_flashdata('message', '<span class="text-danger "><p class="login-box-msg">Wrong Error recaptcha.!</p></span>');
					redirect('register');
				}
			} else {
				$this->session->set_flashdata('message_warning', 'recaptcha');
				// $this->session->set_flashdata('message', '<span class="text-danger "><p class="login-box-msg">Recaptcha Wrong!</p></span>');
				redirect('register');
			}
		}
	}
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
							// Kirim email success dan kirim WA Success
							// Berhasil memperbarui
							$nomor		=	$user['phone'];
							$message	=	'Akun Anda sudah aktif. Selamat datang! Bank Sampah Pintar (B S P)';
							$this->_sendOTP($nomor, $message);
							$this->session->set_flashdata('message_success', 'Verification Account Success...!!!');
							redirect('login');
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
							redirect('authorization');
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
				$this->session->set_flashdata('message_error', 'Verification Account failed! Token Salah...!!!');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('message_error', 'Verification Account failed! Email Salah...!!!');
			redirect('login');
		}
	}
	public function forgot()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		if ($this->form_validation->run() == false) {
			$sett = $this->db->get('settings')->row_array();
			$ting = array(
				'Title' => ' Forgot',
				'widget' => $this->recaptcha->getWidget()
			);
			$data = array_merge($sett, $ting);
			$this->template->viewsAuth('authorization/v-forgot2', $data);
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
									$this->session->set_flashdata('message_info', 'Please check your email to reset password...!!!');
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
						$this->session->set_flashdata('message_warning', 'is not registered...!!!');
						redirect('forgot');
					}
				} else {
					$this->session->set_flashdata('message_error', 'Wrong Error recaptcha...!!!');
					redirect('forgot');
				}
			} else {
				$this->session->set_flashdata('message_error', 'Checkbox is unchecked in Recaptcha');
				redirect('forgot');
			}
		}
	}

	public function verifyOTP()
	{
		// if (!$this->session->userdata('NumberPhone')) {
		// 	redirect('login');
		// }
		// $this->session->set_userdata('NumberPhone', '081210003701');

		$this->form_validation->set_rules('1', 'Username', 'trim|required|numeric');
		$this->form_validation->set_rules('2', 'Username', 'trim|required|numeric');
		$this->form_validation->set_rules('3', 'Username', 'trim|required|numeric');
		$this->form_validation->set_rules('4', 'Username', 'trim|required|numeric');
		$this->form_validation->set_rules('5', 'Username', 'trim|required|numeric');
		$this->form_validation->set_rules('6', 'Username', 'trim|required|numeric');
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
				$this->template->viewsAuth('authorization/v-verifyotp', $data);
			} else {
				$this->db->where('phone_number', $this->session->userdata('NumberPhone'));
				$this->db->delete('otp_users');
				$button = $this->session->userdata('button');
				if ($button == 'signin') {
					$this->session->unset_userdata('NumberPhone');
					$this->session->set_flashdata('message_error', 'OTP expired...!!!');
					redirect('otp');
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
				$satu 	= $this->input->post('1');
				$dua 	= $this->input->post('2');
				$tiga 	= $this->input->post('3');
				$empat 	= $this->input->post('4');
				$lima 	= $this->input->post('5');
				$enam 	= $this->input->post('6');
				$number = $satu . $dua . $tiga . $empat . $lima . $enam; // 123456					
				$this->db->where('otp', $number);
				$query = $this->db->get('otp_users');
				$result = $query->row_array(); // Mengambil satu baris hasil sebagai array asosiatif
				$DateCreated = strtotime(date($result['date_created']));
				if ($result) {
					if (time() - $DateCreated <= 600) {
						if ($this->session->userdata('button') == 'signin') {
							$user 		= $this->Users_model->userValid($this->session->userdata('NumberPhone'));
							$session 	= [
								'user_id'       => $user['user_id'],
								'email' 		=> $user['email'],
								'phone'         => $user['phone'],
								'account_id'    => $user['account_id'],
								// 'id_users'		=> $user['id_users'],
								'role'			=> 6,
								'login_state'	=> TRUE,
								'lastlogin'		=> time()
							];
							$this->Users_model->userUpdated($user['email'], ['last_login' => time()]);
							if ($this->db->affected_rows() > 0) {
								$this->session->set_userdata($session);
								// $this->_sendEmail($user['name_users'], $user['email'], '', 'OTP Login'); //Email
								$this->session->set_flashdata('message_success', 'Congratulation...!!!');
								redirect('login');
							}
						} else {
							$this->session->set_userdata('UserName', $result['phone_number']);
							$this->changePassword();
						}
					} else {
						$this->session->set_flashdata('message_error', 'OTP expired...!!!');
						redirect('forgot');
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
						if ($button == 'signin') {
							$this->session->set_flashdata('message_error', 'OTP Salah...!!!' . $attempt . 'x');
							redirect('otp');
						} else {
							$this->session->set_flashdata('message_warning', 'OTP Salah..!!' . $attempt . 'x');
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
				redirect('forgot');
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

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[8]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$sett = $this->db->get('settings')->row_array();
			$ting = array(
				'Title' => ' Change Password',
				'widget' => $this->recaptcha->getWidget()
			);
			$data = array_merge($sett, $ting);
			$this->template->viewsAuth('authorization/v-change2', $data);
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$username = $this->session->userdata('UserName');
			if ($username) {
				// echo "ISI";
				$in = $this->Users_model->userUpdated($username, ['field_password' => $password]);
				$this->session->unset_userdata('UserName');
				$this->session->unset_userdata('NumberPhone');
				// $this->session->sess_destroy();
				if ($in) {
					$this->session->set_flashdata('msg_success', 'Password has been changed! Please login...!!!');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('message_error', 'Password gagal Update, Wrong Insert...!!!');
				redirect('login');
			}
			// $this->db->delete('token_users', ['email' => $email]);
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
			$this->session->set_flashdata('message', '<span class="text-success  "><p class="login-box-msg ">Access send Email Succes!</p></span>');
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
				"Authorization: 7Xb5CgpCxzxBcwgsuRkE",
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
		$this->session->unset_userdata('email');
		$this->session->set_flashdata('message_info', 'Account have been logout!');
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
			// 'ayu.wina@antam.com' 			=> 'Person 1',
			// 'yuliani@antam.com' 				=> 'Person 2',
			// 'farina.ekarini@antam.com' 		=> 'Person 3',
			'infomail17089@gmail.com' 			=> 'Person 4'

		);



		$subject = 'Renewal BSP (Bank Sampah Pintar)';

		// PHPMailer object
		// $response = false;
		$mail = new PHPMailer();
		// ***---SMTP configuration---***
		$mail->isSMTP();
		$mail->Host       = 'mx.mailspace.id'; //sesuaikan sesuai nama domain hosting/server yang digunakan
		$mail->SMTPAuth   = true;
		$mail->Username   = 'no_reply@miga.co.id'; // user email
		$mail->Password   = 'P@ssw0rdmiga.2022#'; // password email
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
