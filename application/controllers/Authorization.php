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
		$this->load->helper('url');
		require APPPATH . 'third_party/PHPMailer/Exception.php';
		require APPPATH . 'third_party/PHPMailer/PHPMailer.php';
		require APPPATH . 'third_party/PHPMailer/SMTP.php';
	}

	public function index()
	{
		if ($this->session->userdata('email') and $this->session->userdata('id_users')) {
			redirect('Homepage');
		}
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
			$recaptcha = $this->input->post('g-recaptcha-response');
			if (!empty($recaptcha)) {
				$response = $this->recaptcha->verifyResponse($recaptcha);
				if (isset($response['success']) and $response['success'] === true) {
					$this->_signin();
				} else {
					$this->session->set_flashdata('message', '<span class="text-danger "><p class="login-box-msg">Wrong Error recaptcha!</p></span>');
					redirect('Authorization');
				}
			} else {
				$this->session->set_flashdata('message', '<span class="text-danger "><p class="login-box-msg">Checkbox is unchecked in Recaptcha</p></span>');
				redirect('Authorization');
			}
		}
	}

	private function _signin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->Users_model->userValid($username);
		// jika usernya ada
		if ($user) {
			// jika usernya aktif
			if ($user['is_active'] == 1) {
				// cek password
				if (password_verify($password, $user['password'])) {
					$session = [
						'email' 		=> $user['email'],
						'id_users'		=> $user['id_users'],
						'role'			=> $user['id_role'],
						'login_state'	=> TRUE,
						'lastlogin'		=> time()
					];
					// update date
					$this->db->where('id_users', $user['id_users']);
					$this->db->update('users', ['last_login' => time()]);

					if ($this->db->affected_rows() > 0) {
						$this->session->set_userdata($session);
						//Email
						$this->_sendEmail($user['name_users'], $user['email'], '', 'Login');
						if (!empty($this->input->post('rememberMe'))) {
							setcookie('loginUsername', $username, time() + (1 * 365 * 24 * 60 * 60));
							setcookie('loginPassword', $password, time() + (1 * 365 * 24 * 60 * 60));
							// Sudah di Centang;
						} else {
							setcookie('loginUsername', "");
							setcookie('loginPassword', "");
							// Belum di centang!;
						}
						$this->session->set_flashdata('message', '<span class="text-success "><p class="login-box-msg ">Congratulation!</p></span>');
						redirect('Authorization');
					}
				} else {
					// // Jika login gagal
					$this->session->set_flashdata('message', '<span class="text-danger  "><p class="login-box-msg ">Wrong password!</p></span>');
					redirect('Authorization');
				}
			} else {
				$this->session->set_flashdata('message', '<span class="text-warning  "><p class="login-box-msg ">This email has not been activated!</p></span>');
				redirect('Authorization');
			}
		} else {
			$this->session->set_flashdata('message', '<span class="text-danger  "><p class="login-box-msg ">Email is not registered!</p></span>');
			redirect('Authorization');
		}
	}
	public function signup()
	{
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|min_length[10]|max_length[12]|numeric|is_unique[users.phone]');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('terms', 'terms', 'trim|required');
		if ($this->form_validation->run() == false) {
			$sett = $this->db->get('settings')->row_array();
			$ting = array(
				'Title' => ' Register',
				'widget' => $this->recaptcha->getWidget()
			);
			$data = array_merge($sett, $ting);
			$this->template->viewsAuth('authorization/v-register2', $data);
		} else {
			// validasinya success
			$recaptcha = $this->input->post('g-recaptcha-response');
			if (!empty($recaptcha)) {
				$response = $this->recaptcha->verifyResponse($recaptcha);
				if (isset($response['success']) and $response['success'] === true) {
					$name 		= $this->input->post('name');
					$email 		= $this->input->post('email');
					$password 	= $this->input->post('password');
					$phone 		= $this->input->post('phone');
					$terms 		= $this->input->post('terms');
					if ($terms == 'agree') {
						$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
						$token = base64_encode(random_bytes(32));
						$users = array(
							'name_users' 	=> $name,
							'email' 		=> $email,
							'phone' 		=> $phone,
							'password' 		=> $password,
							'id_role'		=> 6,
							'created_on'	=> time()
						);
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
					$this->session->set_flashdata('message', 'false');
					// $this->session->set_flashdata('message', '<span class="text-danger "><p class="login-box-msg">Wrong Error recaptcha.!</p></span>');
					redirect('authorization/signup');
				}
			} else {
				$this->session->set_flashdata('message', 'recaptcha');
				// $this->session->set_flashdata('message', '<span class="text-danger "><p class="login-box-msg">Recaptcha Wrong!</p></span>');
				redirect('authorization/signup');
			}
		}
	}
	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$user = $this->db->get_where('users', ['email' => $email])->row_array();
		if ($user) {
			$user_token = $this->db->get_where('token_users', ['token' => $token])->row_array();
			if ($user_token) {
				if (time() - strtotime($user_token['date_created']) <= 1800) { //kurang dari=30 menit
					if ($user['is_active'] == 0) {
						$this->db->set('is_active', 1);
						$this->db->where('email', $email);
						$this->db->update('users');
						$this->session->set_flashdata('message', '<span class="text-success  "><p class="login-box-msg ">Account Verification Success.!</p></span>');
						redirect('authorization');
					} else {
						$this->session->set_flashdata('message', '<span class="text-success  "><p class="login-box-msg ">Account Active.!</p></span>');
						redirect('authorization');
					}
				} else {
					if ($user['is_active'] == 0) {
						// echo "kirim Ulang";
						$token = base64_encode(random_bytes(32));
						$user_token = [
							'id_users' 		=> $user['id_users'],
							'token' 		=> $token,
							'date_created' 	=> date('Y-m-d H:i:s')
						];
						$this->db->get_where('token_users', ['id_users' => $user['id_users']])->row_array();
						$this->db->where('id_users', $user['id_users']);
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
				$this->session->set_flashdata('message', '<span class="text-danger  "><p class="login-box-msg ">Account Verification failed! Wrong token!</p></span>');
				redirect('authorization');
			}
		} else {
			$this->session->set_flashdata('message', '<span class="text-danger  "><p class="login-box-msg ">Account Verification failed! Wrong email!</p></span>');
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
					$user 		= $this->Users_model->userValid($username);
					if ($user) {
						if ($user['is_active'] == 1) {
							if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
								$this->db->where('id_users', $user['id_users']);
								$this->db->delete('token_users');
								// siapkan token
								$token 		= base64_encode(random_bytes(32));
								$user_token = [
									'id_users' 		=> $user['id_users'],
									'token' 		=> $token,
									'date_created' 	=> date('Y-m-d H:i:s')
								];
								// save
								$this->db->insert('token_users', $user_token);
								if ($this->db->affected_rows() > 0) {
									//Email
									$this->_sendEmail($user['name_users'], $user['email'], $token, 'Reset Password');
									$this->session->set_flashdata('message', '<span class="text-success "><p class="login-box-msg ">Please check your email to reset password!</p></span>');
									redirect('authorization/forgot');
								} else {
									$this->session->set_flashdata('message', '<span class="text-warning "><p class="login-box-msg ">Token failed to save!</p></span>');
									redirect('authorization/forgot');
								}
							} elseif (ctype_digit($username) && strlen($username) >= 10) {
								$nomor = $user['phone'];
								$this->session->set_userdata('NumberPhone', $nomor);
								$this->db->where('phone_number', $nomor);
								$this->db->delete('otp_users');
								$rand 		= rand(100000, 999999);
								$OTPUser 	= [
									'phone_number' 	=> $nomor,
									'otp' 			=> $rand,
									'date_created' 	=> date('Y-m-d H:i:s')
								];
								$this->db->insert('otp_users', $OTPUser);
								$message	= $rand . " adalah kode verifikasi Anda. Demi keamanan, jangan bagikan kode ini.";
								//OTP
								$this->_SendOTP($nomor, $message);
								$this->session->set_flashdata('message', '<span class="text-success "><p class="login-box-msg ">Please check your whatshap code OTP!</p></span>');
								redirect('authorization/verifyOTP');
								// OTP
							} else {
								echo "Value ini bukan email atau nomor telepon yang valid.";
							}
						} else {
							$this->session->set_flashdata('message', '<span class="text-warning "><p class="login-box-msg ">it not activated yet!</p></span>');
							redirect('authorization/forgot');
						}
					} else {
						$this->session->set_flashdata('message', '<span class="text-danger  "><p class="login-box-msg ">is not registered!</p></span>');
						redirect('authorization/forgot');
					}
				} else {
					$this->session->set_flashdata('message', '<span class="text-danger "><p class="login-box-msg">Wrong Error recaptcha!</p></span>');
					redirect('authorization/forgot');
				}
			} else {
				$this->session->set_flashdata('message', '<span class="text-danger "><p class="login-box-msg">Checkbox is unchecked in Recaptcha</p></span>');
				redirect('authorization/forgot');
			}
		}
	}
	public function verifyOTP()
	{
		if (!$this->session->userdata('NumberPhone')) {
			redirect('authorization/forgot');
		}

		$this->form_validation->set_rules('username', 'Username', 'trim|required|numeric');
		if ($this->form_validation->run() == false) {
			$sett = $this->db->get('settings')->row_array();
			$ting = array(
				'Title' => ' OTP',
				'widget' => $this->recaptcha->getWidget()
			);
			$data = array_merge($sett, $ting);
			$this->template->viewsAuth('authorization/v-forgotOTP', $data);
		} else {
			// validasinya success
			$recaptcha = $this->input->post('g-recaptcha-response');
			if (!empty($recaptcha)) {
				$response = $this->recaptcha->verifyResponse($recaptcha);
				if (isset($response['success']) and $response['success'] === true) {
					$number 	= $this->input->post('username');

					$this->db->where('otp', $number);
					$query = $this->db->get('otp_users');
					$result = $query->row_array(); // Mengambil satu baris hasil sebagai array asosiatif
					$DateCreated = strtotime(date($result['date_created']));
					if ($result) {
						if (time() - $DateCreated <= 600) {
							$this->session->set_userdata('UserName', $result['phone_number']);
							$this->changePassword();
						} else {
							$this->session->set_flashdata('message', '<span class="text-danger "><p class="login-box-msg">OTP expired</p></span>');
							redirect('authorization/forgot');
						}
					} else {
						$this->session->set_flashdata('message', '<span class="text-danger "><p class="login-box-msg">OTP Wrong</p></span>');
						redirect('authorization/forgot');
					}
				} else {
					$this->session->set_flashdata('message', '<span class="text-danger "><p class="login-box-msg">Wrong Error recaptcha!</p></span>');
					redirect('authorization/forgot');
				}
			} else {
				$this->session->set_flashdata('message', '<span class="text-danger "><p class="login-box-msg">Checkbox is unchecked in Recaptcha</p></span>');
				redirect('authorization/verifyOTP');
			}
		}
	}

	public function reset()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$user = $this->db->get_where('users', ['email' => $email])->row_array();
		if ($user) {
			$user_token = $this->db->get_where('token_users', ['token' => $token])->row_array();

			$DateCreated = strtotime(date($user_token['date_created']));

			if ($user_token) {
				if (time() - $DateCreated <= 600) {	//kurang dari samadengan 10 menit
					$this->session->set_userdata('UserName', $email);
					$this->changePassword();
				} else {
					$this->session->set_flashdata('message', '<span class="text-warning  "><p class="login-box-msg ">Reset password failed! Expired token!</p></span>');
					redirect('authorization');
				}
			} else {
				$this->session->set_flashdata('message', '<span class="text-danger  "><p class="login-box-msg ">Reset password failed! Wrong token!</p></span>');
				redirect('authorization');
			}
		} else {
			$this->session->set_flashdata('message', '<span class="text-danger  "><p class="login-box-msg ">Reset password failed! Wrong email!</p></span>');
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

			$this->db->set('password', $password);
			$this->db->where('email', $username);
			$this->db->or_where('phone', $username);
			$this->db->update('users');

			$this->session->unset_userdata('UserName');
			$this->session->sess_destroy();
			// $this->db->delete('token_users', ['email' => $email]);
			$this->session->set_flashdata('message', '<span class="text-success  "><p class="login-box-msg ">Password has been changed! Please login.!</p></span>');
			redirect('authorization');
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
}
