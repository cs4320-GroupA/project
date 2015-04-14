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
			$advisor = htmlspecialchars($_POST['advisorName']);
			$phone = htmlspecialchars($_POST['phoneNumber']);
			$email = htmlspecialchars($_POST['mizzouEmail']);
			$speakOPTscore = htmlspecialchars($_POST['speakOPT']);
			$lastTestDate = htmlspecialchars($_POST['lastTestDate']);
			$signature = htmlspecialchars($_POST['signature']); 
			$signDate = htmlspecialchars($_POST['date']);

			$result = $this->form_data_model->submitFormData( $fname, $lname, $email, $studentID, $asstType, $expected_grad, $speakOPTscore, $lastTestDate, $advisor, $gpa, $phone);

			if($result == TRUE) {
				redirect('home', 'refresh');
			} else {
				redirect('form', 'refresh');
			}
		}
	}
?>
