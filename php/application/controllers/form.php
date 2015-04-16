<?php
	class Form extends CI_Controller {
		
		public function __construct() {
            parent::__construct();
        }

		public function index() {
			$this->load->view('application');
		}

		public function submitForm() {
			$this->load->model('form_data_model');
			$this->load->model('form_model');

			$asstType = htmlspecialchars($_POST['radioTAPLA']); 
			$fname = htmlspecialchars($_POST['fname']);
			$lname = htmlspecialchars($_POST['lname']);
			$studentID = htmlspecialchars($_POST['idNumber']);
			$gpa = htmlspecialchars($_POST['gpa']);
			$expected_grad = htmlspecialchars($_POST['gradYear']);
			$phone = htmlspecialchars($_POST['phoneNumber']);
			$email = htmlspecialchars($_POST['mizzouEmail']);
			$signature = htmlspecialchars($_POST['signature']);
			$gato = htmlspecialchars($_POST['gatoRadio']);
			$semester = $this->session->userdata('semester_title');
			$department = NULL;
			$grade = NULL;
			$advisor = NULL;
			$speakOPTscore = NULL;
			$lastTestDate = NULL;
			$speak_assessment = htmlspecialchars($_POST['speakRadio']);
			$onita = htmlspecialchars($_POST['onitaRadio']);
			$other_work = NULL;
			$graduate_type = NULL;


			if(isset($_POST['otherWork'])) {
				$other_work = htmlspecialchars($_POST['dept']);
			}

			if($asstType == 'PLA') {
				$department = htmlspecialchars($_POST['dept']);
				$grade = htmlspecialchars($_POST['grade']);

			} else if($asstType == 'TA') {
				$advisor = htmlspecialchars($_POST['advisorName']);
				$graduate_type = htmlspecialchars($_POST['gradRadio']);	
			}

			if(isset($_POST['speakOPT'])) {
				$speakOPTscore = htmlspecialchars($_POST['speakRadio']);
				$lastTestDate = htmlspecialchars($_POST['lastTestDate']);
			} 


			$result = $this->form_data_model->submitFormData($asstType, $fname, $lname, $email, $studentID, $gpa, $expected_grad, $phone, 
                                       						 $gato, $department, $grade, $advisor, $speakOPTscore, $lastTestDate, $onita, 
                                       						 $other_work, $semester, $graduate_type, $speak_assessment);

			$fdata_id = $this->form_data_model->getFormDataID($studentID, $semester);

			$result = $this->form_model->submitForm($this->session->userdata['semester_id'], $fdata_id, $this->session->userdata['user_id'], $signature);

			if($result == TRUE) {
				redirect('home', 'refresh');
			} else {
				redirect('form', 'refresh');
			}
		}
	}
?>
