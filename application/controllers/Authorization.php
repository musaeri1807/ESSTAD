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
		$this->load->helper('norekening_helper');


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
		var_dump($this->session->all_userdata());
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
					// $this->session->set_flashdata('message_error', '<span class="text-danger "><p class="login-box-msg">Wrong Error recaptcha!</p></span>');
					redirect('Authorization');
				}
			} else {
				$this->session->set_flashdata('message_error', 'Checkbox is unchecked in Recaptcha');
				// $this->session->set_flashdata('message_error', '<span class="text-danger "><p class="login-box-msg">Checkbox is unchecked in Recaptcha</p></span>');
				redirect('Authorization');
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
						redirect('Authorization');
					}
				} else {
					// // Jika login gagal
					$this->session->set_flashdata('message_error', 'Wrong password!');
					// $this->session->set_flashdata('message_error', '<span class="text-danger  "><p class="login-box-msg ">Wrong password!</p></span>');
					redirect('Authorization');
				}
			} else {
				$this->session->set_flashdata('message_warning', 'This email has not been activated!');
				// $this->session->set_flashdata('message', '<span class="text-warning  "><p class="login-box-msg ">This email has not been activated!</p></span>');
				redirect('Authorization');
			}
		} else {
			$this->session->set_flashdata('message_error', 'Akun tidak terdaftar!');
			// $this->session->set_flashdata('message', '<span class="text-danger  "><p class="login-box-msg ">Tidak terdaftar!</p></span>');
			redirect('Authorization');
		}
	}

	public function signup()
	{
		$this->form_validation->set_rules('namebspid', 'namebspid', 'trim|required');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[tbluserlogin.field_email]');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|min_length[10]|max_length[12]|numeric|is_unique[tbluserlogin.field_handphone]');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('terms', 'terms', 'trim|required');
		if ($this->form_validation->run() == false) {
			$sett = $this->db->get('settings')->row_array();
			$ting = array(
				'Title' => ' Register',
				'widget' => $this->recaptcha->getWidget(),
				'bspid'	=> $this->Organization_model->get_bspid()
			);
			// $bspid = $this->Organization_model->get_bspid();
			// var_dump($bspid);
			// die();
			$data = array_merge($sett, $ting);
			$this->template->viewsAuth('authorization/v-register2', $data);
		} else {
			// validasinya success
			$recaptcha = $this->input->post('g-recaptcha-response');
			if (!empty($recaptcha)) {
				$response = $this->recaptcha->verifyResponse($recaptcha);
				if (isset($response['success']) and $response['success'] === true) {
					$bsp 		= $this->input->post('namebspid');
					$name 		= $this->input->post('name');
					$email 		= $this->input->post('email');
					$password 	= $this->input->post('password');
					$phone 		= $this->input->post('phone');
					$terms 		= $this->input->post('terms');
					// Ambil inputan dari form
					// $cabang = $this->input->post('cabang');

					// Generate nomor rekening menggunakan helper
					$norekening = generate_norekening($bsp);

					if ($terms == 'agree') {
						$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
						$token = base64_encode(random_bytes(32));
						$users = array(
							'field_branch'			=> $bsp,
							'field_nama' 			=> $name,
							'field_email' 			=> $email,
							'field_handphone' 		=> $phone,
							'field_password' 		=> $password,
							'id_role'		=> 6,
							'created_on'	=> time()
						);
						// Tampilkan hasil
						echo "Nomor Rekening: " . $norekening;
						die();
						$this->db->insert('users', $users);
						$user = $this->db->insert_id();
						if ($user) {
							// siapkan token
							$user_token = [
								'id_users' => $user,
								'token' => $token,
								'date_created' => date('Y-m-d H:i:s')
							];
							$this->db->insert('token_users', $user_token);
							if ($this->db->affected_rows() > 0) {
								//Email
								$this->_sendEmail($name, $email, $token, 'Account Verification');
								$nomor		=	$phone;
								$message	=	base_url() . 'authorization/verify?email=' . $email . '&token=' . urlencode($token);
								$this->_sendOTP($nomor, $message);
							} else {
								echo "Gagal Mendapatkan Token.";
							}
						} else {
							echo " Gagal Mendapatkan ID";
						}
						$this->session->set_flashdata('message', '<span class="text-success  "><p class="login-box-msg ">Congratulation.! Please check your email to activated.!</p></span>');
						redirect('authorization');
					} else {
						$this->session->set_flashdata('message', '<span class="text-danger  "><p class="login-box-msg ">Wrong ! Your account has not been created yet.!</p></span>');
						redirect('authorization');
					}
				} else {
					$this->session->set_flashdata('message_error', 'Wrong Error recaptcha.!');
					// $this->session->set_flashdata('message', '<span class="text-danger "><p class="login-box-msg">Wrong Error recaptcha.!</p></span>');
					redirect('authorization/signup');
				}
			} else {
				$this->session->set_flashdata('message_warning', 'recaptcha');
				// $this->session->set_flashdata('message', '<span class="text-danger "><p class="login-box-msg">Recaptcha Wrong!</p></span>');
				redirect('authorization/signup');
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
						$this->db->set('is_active', 1);
						$this->db->where('email', $email);
						$this->db->update('users');
						$this->session->set_flashdata('message_success', 'Account Verification Success...!!!');
						// $this->session->set_flashdata('message', '<span class="text-success  "><p class="login-box-msg ">Account Verification Success.!</p></span>');
						redirect('authorization');
					} else {
						$this->session->set_flashdata('message_success', 'Account Active...!!!');
						// $this->session->set_flashdata('message', '<span class="text-success  "><p class="login-box-msg ">Account Active.!</p></span>');
						redirect('authorization');
					}
				} else {
					if ($user['is_active'] == 0) {
						// echo "kirim Ulang";
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
							$message	=	base_url() . 'authorization/verify?email=' . $email . '&token=' . urlencode($token);
							$this->_sendOTP($nomor, $message);
							$this->session->set_flashdata('message', '<span class="text-success  "><p class="login-box-msg ">Please check your email or whathttps to activated.!</p></span>');
							redirect('authorization');
						} else {
							echo "Gagal Update Token.";
						}
					} else {
						$this->session->set_flashdata('message', '<span class="text-danger  "><p class="login-box-msg ">Token expired!</p></span>');
						redirect('authorization');
					}
				}
			} else {
				$this->session->set_flashdata('message_error', 'Account Verification failed! Wrong token...!!!');
				// $this->session->set_flashdata('message', '<span class="text-danger  "><p class="login-box-msg ">Account Verification failed! Wrong token!</p></span>');
				redirect('authorization');
			}
		} else {
			$this->session->set_flashdata('message_error', 'Account Verification failed! Wrong email...!!!');
			// $this->session->set_flashdata('message', '<span class="text-danger  "><p class="login-box-msg ">Account Verification failed! Wrong email!</p></span>');
			redirect('authorization');
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
									// $this->session->set_flashdata('message', '<span class="text-success "><p class="login-box-msg ">Please check your email to reset password!</p></span>');
									redirect('authorization/forgot');
								} else {
									$this->session->set_flashdata('message_error', 'Token failed to save...!!!');
									// $this->session->set_flashdata('message', '<span class="text-warning "><p class="login-box-msg ">Token failed to save!</p></span>');
									redirect('authorization/forgot');
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
								$this->session->set_flashdata('message_info', 'Silakan periksa kode dikirim ke WhatsApp..!!!');
								// $this->session->set_flashdata('message', '<span class="text-success "><p class="login-box-msg ">Silakan periksa kode WhatsApp OTP!</p></span>');
								redirect('authorization/verifyOTP');
								// OTP
							} else {
								echo "Value ini bukan email atau nomor telepon yang valid.";
							}
						} else {
							$this->session->set_flashdata('message_warning', 'it not activated yet...!!!');
							// $this->session->set_flashdata('message', '<span class="text-warning "><p class="login-box-msg ">it not activated yet!</p></span>');
							redirect('authorization/forgot');
						}
					} else {
						$this->session->set_flashdata('message_warning', 'is not registered...!!!');
						// $this->session->set_flashdata('message', '<span class="text-danger  "><p class="login-box-msg ">is not registered!</p></span>');
						redirect('authorization/forgot');
					}
				} else {
					$this->session->set_flashdata('message_error', 'Wrong Error recaptcha...!!!');
					// $this->session->set_flashdata('message', '<span class="text-danger "><p class="login-box-msg">Wrong Error recaptcha!</p></span>');
					redirect('authorization/forgot');
				}
			} else {
				$this->session->set_flashdata('message_error', 'Checkbox is unchecked in Recaptcha');
				// $this->session->set_flashdata('message', '<span class="text-danger "><p class="login-box-msg">Checkbox is unchecked in Recaptcha</p></span>');
				redirect('authorization/forgot');
			}
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
							// $this->session->set_flashdata('message', '<span class="text-success "><p class="login-box-msg ">Silakan periksa kode WhatsApp OTP!</p></span>');
							$this->session->set_flashdata('message_info', 'Silakan periksa kode WhatsApp OTP...!!!');
							redirect('authorization/verifyOTP'); //private
							// OTP							
						} else {
							$this->session->set_flashdata('message', '<span class="text-warning "><p class="login-box-msg ">Belum aktif!</p></span>');
							redirect('authorization');
						}
					} else {
						$this->session->set_flashdata('message_error', 'Nomor tidak terdaftar...!!!');
						// $this->session->set_flashdata('message', '<span class="text-danger  "><p class="login-box-msg ">Nomor tidak terdaftar!</p></span>');
						redirect('authorization/signinOTP');
					}
				} else {
					$this->session->set_flashdata('message_error', 'Wrong Error recaptcha...!!!');
					redirect('authorization/signinOTP');
				}
			} else {
				$this->session->set_flashdata('message_error', 'Checkbox is unchecked in Recaptcha...!!!');
				// $this->session->set_flashdata('message', '<span class="text-danger "><p class="login-box-msg">Checkbox is unchecked in Recaptcha</p></span>');
				redirect('authorization/signinOTP');
			}
		}
	}
	public function verifyOTP()
	{
		if (!$this->session->userdata('NumberPhone')) {
			redirect('authorization');
		}
		// $this->session->set_userdata('NumberPhone', '081210003701');

		$this->form_validation->set_rules('1', 'Username', 'trim|required|numeric');
		$this->form_validation->set_rules('2', 'Username', 'trim|required|numeric');
		$this->form_validation->set_rules('3', 'Username', 'trim|required|numeric');
		$this->form_validation->set_rules('4', 'Username', 'trim|required|numeric');
		$this->form_validation->set_rules('5', 'Username', 'trim|required|numeric');
		$this->form_validation->set_rules('6', 'Username', 'trim|required|numeric');
		if ($this->form_validation->run() == false) {

			$this->db->where('phone_number', $this->session->userdata('NumberPhone'));
			$query = $this->db->get('otp_users');
			$result = $query->row_array(); // Mengambil satu baris hasil sebagai array asosiatif
			$DateCreated = strtotime(date($result['date_created']));
			if (time() - $DateCreated <= 600) {
				$sett = $this->db->get('settings')->row_array();
				$ting = array(
					'Title' => ' OTP',
					'widget' => $this->recaptcha->getWidget()
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
					redirect('authorization/signinotp');
				} else {
					$this->session->unset_userdata('NumberPhone');
					$this->session->set_flashdata('message_error', 'OTP Reset expired...!!!');
					redirect('authorization/forgot');
				}
			}
		} else {
			// validasinya success
			$recaptcha = $this->input->post('g-recaptcha-response');
			if (!empty($recaptcha)) {
				$response = $this->recaptcha->verifyResponse($recaptcha);
				if (isset($response['success']) and $response['success'] === true) {
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
									redirect('Authorization');
								}
							} else {
								$this->session->set_userdata('UserName', $result['phone_number']);
								$this->changePassword();
							}
						} else {
							$this->session->set_flashdata('message_error', 'OTP expired...!!!');
							redirect('authorization/forgot');
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
								// $this->session->set_flashdata('message', '<span class="text-danger "><p class="login-box-msg">OTP Salah!' . $attempt . 'x</p></span>');
								redirect('authorization/signinotp');
							} else {
								$this->session->set_flashdata('message_warning', 'OTP Salah..!!' . $attempt . 'x');
								redirect('authorization/forgot');
							}
						} else {
							$this->session->set_flashdata('message_warning', 'OTP Salah.!' . $attempt . 'x');
							redirect('authorization/verifyOTP');
						}
					}
				} else {
					$this->session->set_flashdata('message_error', 'Wrong Error recaptcha...!!!');
					redirect('authorization/forgot');
				}
			} else {
				$this->session->set_flashdata('message_error', 'Checkbox is unchecked in Recaptcha...!!!');
				redirect('authorization/verifyOTP');
			}
		}
	}

	public function reset()
	{
		$email 	= $this->input->get('email');
		$token 	= $this->input->get('token');
		// $user 	= $this->db->get_where('users', ['email' => $email])->row_array();
		$user	= $this->Users_model->userValid($email);
		if ($user) {
			$user_token = $this->db->get_where('token_users', ['token' => $token])->row_array();

			$DateCreated = strtotime(date($user_token['date_created']));

			if ($user_token) {
				if (time() - $DateCreated <= 600) {	//kurang dari samadengan 10 menit
					$this->session->set_userdata('UserName', $email);
					$this->changePassword();
				} else {
					$this->session->set_flashdata('message_warning', 'Reset password failed! Expired token...!!!');
					redirect('authorization');
				}
			} else {
				$this->session->set_flashdata('message_error', 'Reset password failed! Wrong token...!!!');
				redirect('authorization');
			}
		} else {
			$this->session->set_flashdata('message_error', 'Reset password failed! Wrong email...!!!');
			redirect('authorization');
		}
	}
	public function changePassword()
	{
		if (!$this->session->userdata('UserName')) {
			redirect('authorization');
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
					redirect('authorization');
				}
			} else {
				$this->session->set_flashdata('message_error', 'Password gagal Update, Wrong Insert...!!!');
				redirect('authorization');
			}
			// $this->db->delete('token_users', ['email' => $email]);

		}
	}
	private function _sendEmail($name, $email, $token, $subject)
	{
		//load Database
		$set = $this->db->get('settings')->row_array();
		if ($subject == 'Account Verification') {
			$link = base_url() . 'authorization/verify?email=' . $email . '&token=' . urlencode($token);
			$bodyEmail = auth_mail($name, $link, $subject);
			$idlog = '3';
			// $bodyEmail = 'Click this link to verify you account : <a href="' . base_url() . 'authorization/verify?email=' . $email . '&token=' . urlencode($token) . '">Activate</a>';
		} else if ($subject == 'Reset Password') {
			$link = base_url() . 'authorization/reset?email=' . $email . '&token=' . urlencode($token);
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
		$this->session->set_flashdata('message', '<span class="text-info"><p class="login-box-msg">Account have been logout!</p></span>');
		$this->session->sess_destroy();
		redirect('authorization');
	}

	function terms()
	{

		$this->load->view('authorization/v_terms');
	}
	public function Renewal()
	{
		// Ganti dengan alamat email penerima
		// $to = 'infomail17089@gmail.com,musaeri1807@gmail.com';
		$recipients = array(
			// 'ayu.wina@antam.com' 		=> 'Person 1',
			// 'yuliani@antam.com' 		=> 'Person 2',
			// 'farina.ekarini@antam.com' 	=> 'Person 3',
			'info@miga.co.id' 			=> 'Person 4'
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
