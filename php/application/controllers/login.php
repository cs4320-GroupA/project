<?php
	class Login extends CI_Controller {

		public function __construct() {
           parent::__construct();
        }
        
		public function index() {
			$this->load->view('welcome');
		}

		public function validate() {
			$this->load->model('user_model');
			$this->load->model('account_type_model');
			$this->load->model('semester_model');
			$this->load->model('status_model');

			$username = htmlspecialchars($_POST['pawprint']); 
			
			$result = $this->user_model->login($username);

			if($result == FALSE) {
				$newSession = array(
					'logged_in' => FALSE,
					'failed_login' => TRUE
					);
				$this->session->set_userdata($newSession);

				redirect('login', 'refresh');
			}
			else if(strcmp((hash("sha1", $_POST['passwordinput'].$result->salt)), $result->password) == 0) {
				$semester_result = $this->semester_model->getCurrentSemester();

				if($semester_result == FALSE) { //No current semester
					$newSession = array(
						'user_id' => $result->user_id,
						'pawprint' => $result->username,
						'user_type' => strtolower($this->account_type_model->getAccountType($result->account_type)),
						'semester_id' => NULL,
						'semester_title' => 'NONE',
						'status_title' => 'NONE',
						'logged_in' => TRUE,
						'failed_login' => FALSE
					);
				} else {
					$status_title = $this->status_model->getStatusTitle($semester_result->row()->status_id);
					
					$newSession = array(
						'user_id' => $result->user_id,
						'pawprint' => $result->username,
						'user_type' => strtolower($this->account_type_model->getAccountType($result->account_type)),
						'semester_id' => $semester_result->row()->semester_id,
						'semester_title' => $semester_result->row()->semester_title,
						'status_title' => $status_title,
						'logged_in' => TRUE,
						'failed_login' => FALSE
					);
				}

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
			$this->load->model('semester_model');

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
				$query = $this->user_model->login($username);
				$semester_result = $this->semester_model->getCurrentSemester();

				$newSession = array(
					'user_id' => $query->user_id,
					'pawprint' => $query->username,
					'user_type' => strtolower($account_type),
					'semester_id' => $semester_result->row()->semester_id,
					'semester_title' => $semester_result->row()->semester_title,
					'status_id' => $semester_result->row()->status_id,
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
