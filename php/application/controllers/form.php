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
			$fname = htmlspecialchars($POST['fname']);
			$fname = htmlspecialchars($POST['lname']);
			$studentID = htmlspecialchars($POST['idNumber']);
			$gpa = htmlspecialchars($POST['gpa']);
			$expected_grad = htmlspecialchars($POST['gradYear']);
			$gradType = htmlspecialchars($POST['gradRadio']);
			$advisor = htmlspecialchars($POST['advisorName']);
			$phone = htmlspecialchars($POST['phoneNumber']);
			$email = htmlspecialchars($POST['mizzouEmail']);
			$speakOPTscore = htmlspecialchars($POST['speakOPT']);
			$lastTestDate = htmlspecialchars($POST['lastTestDate']);
			$signature = htmlspecialchars($POST['signature']); 
			$signDate = htmlspecialchars($POST['date']);

			$result = $this->form_data_model->submitFormData( $fname, $lname, $email, $studentID, $asstType, $expected_grad, $speakOPTscore, $lastTestDate, $advisor, $gpa, $phone);

			if($result == TRUE) {
				redirect('home', 'refresh');
			} else {
				redirect('form', 'refresh');
			}
		}
	}
?>
