<?php
	class Login extends CI_Controller {

		public function index() {
			$this->load->view('welcome');
		}

		public function validate() {
			$this->load->model('user_model');
			$this->load->model('account_type_model');

			$result = $this->user_model->login();

			if($result == FALSE) {
				$newSession = array(
					'logged_in' => FALSE,
					'failed_login' => TRUE
					);
				$this->session->set_userdata($newSession);

				redirect('login', 'refresh');
			}
			else if(strcmp((hash("sha1", $_POST['passwordinput'].$result->salt)), $result->password) == 0) {
				$newSession = array(
					'user_id' => $result->user_id,
					'pawprint' => $result->username,
					'user_type' => strtolower($this->account_type_model->getAccountType($result->account_type)),
					'logged_in' => TRUE,
					'failed_login' => FALSE
					);

				$this->session->set_userdata($newSession);

				redirect('home', 'refresh');
			} else {
				$newSession = array(
					'logged_in' => FALSE,
					'failed_login' => TRUE
					);
				$this->session->set_userdata($newSession);

				redirect('login', 'refresh');
			}
		}

		public function register() {
			$this->load->model('user_model');
			$this->load->model('account_type_model');
			
			$result = $this->user_model->login();

			$username = htmlspecialchars($_POST['pawprint']); 
			$password = htmlspecialchars($_POST['passwordinput']);
			$account_type = htmlspecialchars($_POST['accountRadio']);
			$salt = uniqid(mt_rand(), false);
			$saltedPass = hash("sha1", $password . $salt);
			
			if(isset($_POST['accessCode'])) {
				$accessCode = $_POST['accessCode'];
			} else {
				$accessCode = '';
			}
			
			//Checking if the instructor has the correct registration access code
			if($account_type == "INSTRUCTOR"){
				if($accessCode !="12345"){
					$newSession = array(
						'logged_in' => FALSE,
						'failed_register' => TRUE
						);
					$this->session->set_userdata($newSession);
					redirect('login', 'refresh');
				}
			}
					

			$result = $this->user_model->register($username, $saltedPass, $salt, $account_type);

			if($result == 1) {
				$newSession = array(
					'user_id' => $result->user_id,
					'pawprint' => $result->username,
					'user_type' => strtolower($this->account_type_model->getAccountType($result->account_type_id)),
					'logged_in' => TRUE,
					'failed_login' => FALSE
					);

				$this->session->set_userdata($newSession);

				redirect('home', 'refresh');
			}
			else {
				$newSession = array(
					'logged_in' => FALSE,
					'failed_register' => TRUE
					);
				$this->session->set_userdata($newSession);					
				redirect('login', 'refresh');
			}
		}

		public function logout() {
			$this->session->sess_destroy();
			redirect('login', 'refresh');
		}
	}
?>
