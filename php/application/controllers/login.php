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
			$this->load->model('form_model');
			$this->load->model('assigned_courses_model');

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
				$newSession = array(
					'user_id' => $result->user_id,
					'pawprint' => $result->username,
					'user_type' => strtolower($this->account_type_model->getAccountType($result->account_type)),
					'logged_in' => TRUE,
					'failed_login' => FALSE
				);
				
				if($this->semester_model->getCurrentSemesterStatus() == 'NOTIFICATION') {
					$semester = $this->semester_model->getCurrentSemester();
					$semester_id = $semester->row()->semester_id;

					if($newSession['user_type'] == 'applicant') {
						$query = $this->form_model->getForm($newSession['user_id'], $semester_id);
						
						if($query != FALSE) {
							$newSession['assigned_count'] = $this->assigned_courses_model->getCountByFormID($query->row()->form_id);

							if($newSession['assigned_count'] == FALSE) {
								$newSession['assigned_count'] = NULL;
							}
						}
					} else if($newSession['user_type'] == 'instructor') {
						$query = $this->assigned_courses_model->getCountByInstructorID($newSession['user_id'], $semester_id);

						if($query != FALSE) {
							$newSession['assigned_count'] = $query;
						}
					}
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
			$this->load->model('status_model');

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
			
			$query = $this->user_model->login($username);		

			if($query == FALSE) {
				$query = $this->user_model->register($username, $saltedPass, $salt, $account_type);
			} else {
				$newSession = array(
					'logged_in' => FALSE,
					'account_exists' => TRUE
				);
				
				$this->session->set_userdata($newSession);
				redirect('login', 'refresh');
			}

			if($query == 1) {
				$result = $this->user_model->login($username);

				$newSession = array(
					'user_id' => $result->user_id,
					'pawprint' => $result->username,
					'user_type' => strtolower($this->account_type_model->getAccountType($result->account_type)),
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
