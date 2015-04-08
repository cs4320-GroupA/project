<?php
	class Login extends CI_Controller {

		public function index() {
			$this->load->view('welcome');
		}

		public function validate() {
			$this->load->model('user_model');

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
					'logged_in' => TRUE,
					'failed_login' => FALSE
					);

				$this->session->set_userdata($newSession);

				if($result->account_type == 'APPLICANT') {
					$this->session->set_userdata('applicant', TRUE);
				} 
				else if($result->account_type == 'INSTRUCTOR') {
					$this->session->set_userdata('instructor', TRUE);	
				}
				else if($result->account_type == 'ADMIN') {
					$this->session->set_userdata('admin', TRUE);	
				}

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
			$result = $this->user_model->login();

			$username = htmlspecialchars($_POST['pawprint']); 
			$password = htmlspecialchars($_POST['passwordinput']);
			$account_type = htmlspecialchars($_POST['accountRadio']);
			$salt = uniqid(mt_rand(), false);
			$saltedPass = hash("sha1", $password . $salt);

			$result = $this->user_model->register($username, $saltedPass, $salt, $account_type);

			if($result != FALSE) {
				$newSession = array(
					'user_id' => $result->user_id,
					'pawprint' => $result->username,
					'logged_in' => TRUE,
					'failed_login' => FALSE
					);

				$this->session->set_userdata($newSession);

				if($result->account_type == 'APPLICANT') {
					$this->session->set_userdata('applicant', TRUE);
				} 
				else if($result->account_type == 'INSTRUCTOR') {
					$this->session->set_userdata('instructor', TRUE);	
				}
				else if($result->account_type == 'ADMIN') {
					$this->session->set_userdata('admin', TRUE);	
				}

				redirect('home', 'refresh');
			}
			else {
				$newSession = array(
					'logged_in' => FALSE,
					'failed_register' => TRUE
					);

				redirect('login', 'refresh');
			}
		}

		public function logout() {
			$this->session->sess_destroy();
			redirect('login', 'refresh');
		}
	}
?>