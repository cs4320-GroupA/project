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
			else if(strcmp($result->password, $_POST['passwordinput']) == 0) {
				$newSession = array(
					'user_id' => $result->user_id,
					'pawprint' => $result->username,
					'applicant' => TRUE,
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

		public function logout() {
			$this->session->sess_destroy();
			redirect('login', 'refresh');
		}
	}
?>