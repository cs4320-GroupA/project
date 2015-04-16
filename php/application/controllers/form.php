<?php
	class Form extends CI_Controller {
		
		public function __construct() {
            parent::__construct();
        }

		public function index() {
			$this->load->model('form_data_model');
			$this->load->model('form_model');

			$query = $this->form_model->getForm($this->session->userdata('user_id'), $this->session->userdata('semester_id'));

			if($query != FALSE) {
				$result = $this->form_data_model->getFormDataByID($query->row()->form_data);
				$row = $result->row();

				$data = array('first_name' => $row->first_name,
							  'last_name' => $row->last_name,
							  'mizzou_email' => $row->mizzou_email,
							  'student_id' => $row->student_id,
							  'assistant_type' => $row->assistant_type,
							  'expected_graduation' => $row->expected_graduation,
							  'grade' => $row->grade,
							  'SPEAK_OPT_score' => $row->SPEAK_OPT_score,
							  'department' => $row->department,
							  'advisor' => $row->advisor,
							  'gpa' => $row->gpa,
							  'phone_number' => $row->phone_number,
							  'last_date_of_test' => $row->last_date_of_test,
							  'grad_type' => $row->grad_type,
							  'other_work' => $row->other_work,
							  'gato' => $row->gato,
							  'speak_assessment' => $row->speak_assessment,
							  'onita' => $row->onita,
							  'message' => '<p>*Your form was successfully submitted.<br>*To edit your submission changes the values and click Edit Button');

				$this->load->view('application', $data);
			} else {			
				$this->load->view('application');
			}
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
			$date = htmlspecialchars($_POST['date']);
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
				$other_work = htmlspecialchars($_POST['otherWork']);
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

			$result = $this->form_model->submitForm($this->session->userdata['semester_id'], $fdata_id, $this->session->userdata['user_id'], $signature, $date);
			
			if($result == TRUE) {
				$data = array('message' => '<p>Submission Success</p>');
				$this->load->view('application', $data);
			} else {
				redirect('form', 'refresh');
			}
			
		}
	}
?>
