<?php
	class Form extends CI_Controller {
		
		public function __construct() {
            parent::__construct();
        }

		public function index() {
			// Load form_data and form models
			$this->load->model('form_data_model');
			$this->load->model('form_model');

			//Get the current applicant's form
			$query = $this->form_model->getForm($this->session->userdata('user_id'), $this->session->userdata('semester_id'));

			//If an entry for user's application exists for this semester, then auto load for data
			if($query != FALSE) {
				//Grab the form data for the user's form
				$result = $this->form_data_model->getFormDataByID($query->row()->form_data);
				$row = $result->row();

				//Fill array with the form data to pass to view
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
							  'message_header' => 'Edit',
							  'message' => '<p>*Your form was successfully submitted.<br>*To edit your submission changes the values and click Edit Button',
							  'editable' => TRUE);
			} else {
				//User has not submitted a form yet, so allow submission
				$data = array('submittable' => TRUE);			
			}

			if($this->session->userdata('status_title') != 'APPLICATION') {
				//If it is not the application window then do not allow submissions/edits
				$data['editable'] = FALSE;
				$data['submitted'] = FALSE;
			}

			//Load view with array
			$this->load->view('application', $data);
		}

		public function submitForm() {
			//Load form data and form models
			$this->load->model('form_data_model');
			$this->load->model('form_model');

			//Get the current applicant's form if exists
			$query = $this->form_model->getForm($this->session->userdata('user_id'), $this->session->userdata('semester_id'));

			//If an entry for user's application exists for this semester, then do not allow resubmission
			if($query != FALSE) {
				redirect('form', 'refresh');
			}
			//Grab the required fields from form, and set specific fields to NULL
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

			//Check if otherWork input is filled
			if("" != trim($_POST['otherWork'])) {
				$other_work = htmlspecialchars($_POST['otherWork']);
			}

			//If the appliant is PLA then the dept and grade must be inputed
			if($asstType == 'PLA') {
				$department = htmlspecialchars($_POST['dept']);
				$grade = htmlspecialchars($_POST['grade']);
			} 
			//If the appliant is Ta then the advisor and graduate type must be inputed
			else if($asstType == 'TA') {
				$advisor = htmlspecialchars($_POST['advisorName']);
				$graduate_type = htmlspecialchars($_POST['gradRadio']);	
			}

			//Check if speak sore is inputed
			if("" != trim($_POST['speakOPT'])) {
				$speakOPTscore = htmlspecialchars($_POST['speakRadio']);
				$lastTestDate = htmlspecialchars($_POST['lastTestDate']);
			} 

			//Insert form data into the database
			$result = $this->form_data_model->submitFormData($asstType, $fname, $lname, $email, $studentID, $gpa, $expected_grad, $phone, 
                                       						 $gato, $department, $grade, $advisor, $speakOPTscore, $lastTestDate, $onita, 
                                       						 $other_work, $semester, $graduate_type, $speak_assessment);

			//Grab the user's form_data entry id 
			$fdata_id = $this->form_data_model->getFormDataID($studentID, $semester);

			//Insert form meta data into database
			$result = $this->form_model->submitForm($this->session->userdata['semester_id'], $fdata_id, $this->session->userdata['user_id'], $signature, $date);
			
			//Redirect to form
			redirect('form', 'refresh');
		}
	}
?>
