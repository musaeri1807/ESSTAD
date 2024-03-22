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
		$this->load->model('M_mysqldata');
		$this->load->helper('url');
		require APPPATH . 'third_party/PHPMailer/Exception.php';
		require APPPATH . 'third_party/PHPMailer/PHPMailer.php';
		require APPPATH . 'third_party/PHPMailer/SMTP.php';
	}

	public function index()
	{

		// if ($this->session->userdata('email') and $this->session->userdata('id_users')) {
		// 	redirect('Welcome');
		// }
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$sett_data = $this->db->get('settings')->row_array();
			$data = array(
				'Title' => 'Login EssTAD',
				'CardTitle' => 'Login to Your Account',
				'widget' => $this->recaptcha->getWidget()
				// 'script' => $this->recaptcha->getScriptTag()
			);
			$data = array_merge($data, $sett_data);
			$this->template->viewslog('authorization/v-login2', $data);
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
				$this->session->set_flashdata('message', '<span class="text-danger "><p class="login-box-msg">Recaptcha Wrong!</p></span>');
				redirect('Authorization');
			}
		}
	}

	private function _signin()
	{

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->M_mysqldata->userValid($username);
		// jika usernya ada
		if ($user) {
			// jika usernya aktif
			if ($user['is_active'] == 1) {
				// cek password
				if (password_verify($password, $user['password'])) {
					$session = [
						'email' => $user['email'],
						'id_users' => $user['id_users']
					];
					// siapkan token
					$token = base64_encode(random_bytes(32));
					$user_token = [
						'id_users' => $user['id_users'],
						'token' => $token,
						'date_created' => date('Y-m-d H:i:s')
					];

					if ($this->db->get_where('token_users', ['id_users' => $user['id_users']])->row_array()) {
						$this->db->where('id_users', $user['id_users']);
						$this->db->update('token_users', $user_token);
					} else {
						$this->db->insert('token_users', $user_token);
					}

					$this->logger
						->user($user['id_users']) //Set UserID, who created this  Action
						->type('Login') //Entry type like, Post, Page, Entry, signin
						->id(1) //Entry ID 1 Login  2 Logout 3 Reset
						->token($token) //Token identify Action
						->comment($_SERVER['REMOTE_ADDR'] . "-" . $_SERVER['HTTP_USER_AGENT']) //Comment 
						->log(); //Add Database Entry			

					$this->session->set_userdata($session);
					//Email

					//$this->_sendEmail($user['email'], $token, 'Login');

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
				} else {
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

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[10]|max_length[12]');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		if ($this->form_validation->run() == false) {
			$sett_data = $this->db->get('settings')->row_array();
			$data = array(
				'Title' => 'Forgot Account',
				'CardTitle' => 'Create an Account',
				'widget' => $this->recaptcha->getWidget()
			);
			$data = array_merge($data, $sett_data);

			$this->template->viewslog('authorization/v-register2', $data);
		} else {
			// validasinya success
			echo $name = $this->input->post('name');
			echo '<br>';
			echo $email = $this->input->post('email');
			// $this->_sendEmail($email, 'Account Verification'); //Email
			$this->session->set_flashdata('message', '<span class="text-success  "><p class="login-box-msg ">Congratulation! your account has been created. Please activate your account!</p></span>');
			// redirect('authorization/signup');
		}
	}
	public function verify()
	{
		echo "Verifikasi to email";
	}
	public function forgot()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		if ($this->form_validation->run() == false) {
			$sett_data = $this->db->get('settings')->row_array();
			$data = array(
				'Title' => 'Forgot Account',
				'CardTitle' => 'Forgot to Your Account',
				'widget' => $this->recaptcha->getWidget()
			);
			$data = array_merge($data, $sett_data);
			$this->template->viewslog('authorization/v-forgot2', $data);
		} else {
			// validasinya success
			$recaptcha = $this->input->post('g-recaptcha-response');
			if (!empty($recaptcha)) {
				$response = $this->recaptcha->verifyResponse($recaptcha);
				if (isset($response['success']) and $response['success'] === true) {
					$username 	= $this->input->post('username');
					$user 		= $this->M_mysqldata->userValid($username);

					if ($user) {
						if ($user['is_active'] == 1) {
							// siapkan token
							$token = base64_encode(random_bytes(32));
							$user_token = [
								'id_users' => $user['id_users'],
								'token' => $token,
								'date_created' => date('Y-m-d H:i:s')
							];
							if ($this->db->get_where('token_users', ['id_users' => $user['id_users']])->row_array()) {
								$this->db->where('id_users', $user['id_users']);
								$this->db->update('token_users', $user_token);
							} else {
								$this->db->insert('token_users', $user_token);
							}
							$this->logger
								->user($user['id_users']) //Set UserID, who created this  Action
								->type('Reset Password') //Entry type like, Post, Page, Entry, signin
								->id(3) //Entry ID 1 Login  2 Logout 3 Reset
								->token($token) //Token identify Action
								->comment($_SERVER['REMOTE_ADDR'] . "-" . $_SERVER['HTTP_USER_AGENT']) //Comment 
								->log(); //Add Database Entry
							//Email
							$this->_sendEmail($user['name_users'], $user['email'], $token, 'Reset Password');

							$this->session->set_flashdata('message', '<span class="text-success "><p class="login-box-msg ">Please check your email to reset password!</p></span>');
							redirect('authorization/forgot');
						} else {
							$this->session->set_flashdata('message', '<span class="text-warning "><p class="login-box-msg ">This email has not been activated!</p></span>');
							redirect('authorization/forgot');
						}
					} else {
						$this->session->set_flashdata('message', '<span class="text-danger  "><p class="login-box-msg ">Email is not registered!</p></span>');
						redirect('authorization/forgot');
					}
				} else {
					$this->session->set_flashdata('message', '<span class="text-danger "><p class="login-box-msg">Wrong Error recaptcha!</p></span>');
					redirect('Authorization/forgot');
				}
			} else {
				$this->session->set_flashdata('message', '<span class="text-danger "><p class="login-box-msg">Recaptcha Wrong!</p></span>');
				redirect('Authorization/forgot');
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
			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
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
		if (!$this->session->userdata('reset_email')) {
			redirect('authorization');
		}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

		if ($this->form_validation->run() == false) {

			$data = array(
				'Title' 			=> 'NiceAdmin',
				'CardTitle'			=> 'Change Password Account'
			);
			$this->template->viewslog('authorization/v-change2', $data);
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('users');

			$this->session->unset_userdata('reset_email');

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
			// $bodyEmail = ;
			$bodyEmail = 'Click this link to verify you account : <a href="' . base_url() . 'authorization/verify?email=' . $email . '&token=' . urlencode($token) . '">Activate</a>';
		} else if ($subject == 'Reset Password') {
			$link = base_url() . 'authorization/reset?email=' . $email . '&token=' . urlencode($token);
			$bodyEmail = mailforgot($name, $link, $subject);
		} else {
			$bodyEmail = 'Stay logged in on trusted devices';
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
		$mail->addReplyTo('', 'noreply'); //user email
		$mail->addAddress($email); //email tujuan pengiriman email

		$mail->Subject = $subject; //subject email

		$mail->isHTML(true);
		$mail->Body = $bodyEmail;

		// Send email
		if (!$mail->send()) {
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			$this->session->set_flashdata('message', '<span class="text-success  "><p class="login-box-msg ">Access send Email Succes!</p></span>');
		}
	}
	public function logout()
	{
		$this->logger
			->user($this->session->userdata('id_users')) //Set UserID, who created this  Action
			->type('Logout') //Entry type like, Post, Page, Entry, signin
			->id(2) //Entry ID 1 login  2 logout 3 Reset
			->token(md5(date('h:i:s'))) //Token identify Action
			->comment($_SERVER['REMOTE_ADDR'] . "-" . $_SERVER['HTTP_USER_AGENT']) //Comment 
			->log(); //Add Database Entry	
		$this->session->unset_userdata('email');
		$this->session->set_flashdata('message', '<span class="text-info"><p class="login-box-msg">Account have been logout!</p></span>');
		redirect('Authorization');
		$this->session->sess_destroy();
	}

	function validateRecaptcha()
	{
		$captcha_response = trim($this->input->post('g-recaptcha-response'));
		if ($captcha_response != '') {
			$keySecret = '6LfJec4ZAAAAACG1-fmobe88erF72OdXbAFN71jj';

			$check = array(
				'secret'		=>	$keySecret,
				'response'		=>	$this->input->post('g-recaptcha-response')
			);

			$startProcess = curl_init();
			curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
			curl_setopt($startProcess, CURLOPT_POST, true);
			curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));
			curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);
			$receiveData = curl_exec($startProcess);
			$finalResponse = json_decode($receiveData, true);
			if ($finalResponse['success']) {
				// $storeData = array(
				// 	'first_name'	=>	$this->input->post('first_name'),
				// 	'last_name'		=>	$this->input->post('last_name'),
				// 	'age'			=>	$this->input->post('age'),
				// 	'gender'		=>	$this->input->post('gender')
				// );

				// $this->captcha_model->insert($storeData);
				$this->session->set_flashdata('message', 'Data Stored Successfully');
				redirect('captcha');
			} else {
				$this->session->set_flashdata('message', 'Validation Fail Try Again');
				redirect('captcha');
			}
		} else {
			$this->session->set_flashdata('message', 'Validation Fail Try Again');

			redirect('captcha');
		}
	}
}
