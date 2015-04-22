<?php
	class Form extends CI_Controller {
		
		public function __construct() {
            parent::__construct();
        }

		public function index() {
			// Load form_data and form models
			$this->load->model('form_data_model');
			$this->load->model('form_model');
			$this->load->model('course_model');
			$this->load->model('previous_taught_model');
			$this->load->model('currently_teaching_model');
			$this->load->model('desired_courses_model');

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

				$data['previous'] = $this->previous_taught_model->getAll($query->row()->form_data);
				$data['current'] = $this->currently_teaching_model->getAll($query->row()->form_data);
				$data['desired'] = $this->desired_courses_model->getAll($query->row()->form_data);
			} else {
				//User has not submitted a form yet, so allow submission
				$data = array('submittable' => TRUE);			
			}

			if($this->session->userdata('status_title') != 'APPLICATION') {
				//If it is not the application window then do not allow submissions/edits
				$data['editable'] = FALSE;
				$data['submitted'] = FALSE;
				$data['view_only'] = TRUE;
			}

			$result = $this->course_model->getCourses();
			$data['courses'] = $result->result_array();
			//Load view with array
			$this->load->view('application', $data);
		}

		public function viewForm($user_id, $semester_id) {
			// Load form_data and form models
			$this->load->model('form_data_model');
			$this->load->model('form_model');
			$this->load->model('course_model');
			$this->load->model('currently_teaching_model');
			$this->load->model('previous_taught_model');
			$this->load->model('desired_courses_model');
			
			//Get the current applicant's form
			$query = $this->form_model->getForm($user_id, $semester_id);

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
							  'signature' => $query->row()->signature,
							  'date' => $query->row()->signature_date,
							  'view_only' => TRUE);
			}
			else {
				redirect('applicantPoolController', 'refresh');
			} 

			$this->load->view('application', $data);
		}
		public function submitForm() {
			//Load form data and form models
			$this->load->model('form_data_model');
			$this->load->model('form_model');
			$this->load->model('course_model');
			$this->load->model('currently_teaching_model');
			$this->load->model('previous_taught_model');
			$this->load->model('desired_courses_model');

			//Get the current applicant's form if exists
			$query = $this->form_model->getForm($this->session->userdata('user_id'), $this->session->userdata('semester_id'));

			//If an entry for user's application exists for this semester, then do not allow resubmission
			if($query != FALSE) {
				redirect('form', 'refresh');
			}
			//redirect if required is not filled
			if(!isset($_POST['fname'])) {
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
				if(!isset($department)) {
					$this->session->set_flashdata('missing_dept', TRUE);
				}
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
			
			$base_string = 'currently_teaching';
			$post_string = $base_string.'1';
			$counter = 1;
			
			while(isset($_POST[$post_string])) {
				$result = $this->course_model->getCourseByName($_POST[$post_string]);

				$return = $this->currently_teaching_model->checkForEntry($result->row()->course_id, $result->row()->course_name, $fdata_id);
				if($return == FALSE) {
					$this->currently_teaching_model->insert($result->row()->course_id, $result->row()->course_name, $fdata_id);
				}
				
				$counter++;
				$post_string = $base_string.strval($counter);
			}

			$base_string = 'previously_taught';
			$post_string = $base_string.'1';
			$counter = 1;
			
			while(isset($_POST[$post_string])) {
				$result = $this->course_model->getCourseByName($_POST[$post_string]);

				$return = $this->previous_taught_model->checkForEntry($result->row()->course_id, $result->row()->course_name, $fdata_id);
				if($return == FALSE) {
					$this->previous_taught_model->insert($result->row()->course_id, $result->row()->course_name, $fdata_id);
				} 

				$counter++;
				$post_string = $base_string.strval($counter);
			}

			$base_string = 'desired_courses';
			$post_string = $base_string.'1';
			$base_grade_string = 'gradeReceived';
			$grade_string = $base_grade_string.'1';
			$counter = 1;
			
			while(isset($_POST[$post_string])) {
				$result = $this->course_model->getCourseByName($_POST[$post_string]);

				$return = $this->desired_courses_model->checkForEntry($result->row()->course_id, $result->row()->course_name, $fdata_id);
				if($return == FALSE) {
					$this->desired_courses_model->insert($result->row()->course_id, $result->row()->course_name, $fdata_id, $_POST[$grade_string]);
				} else {
					$this->desired_courses_model->update($return->row()->desired_course_id, $_POST[$grade_string]);
				}
				
				$counter++;
				$post_string = $base_string.strval($counter);
				$grade_string = $base_grade_string.strval($counter);
			}
			//Redirect to form
			redirect('form', 'refresh');
		}

		public function editForm() {
			//Load form data and form models
			$this->load->model('form_data_model');
			$this->load->model('form_model');
			$this->load->model('course_model');
			$this->load->model('currently_teaching_model');
			$this->load->model('previous_taught_model');
			$this->load->model('desired_courses_model');

			//Get the current applicant's form if exists
			$query = $this->form_model->getForm($this->session->userdata('user_id'), $this->session->userdata('semester_id'));

			//If an entry for user's application exists for this semester, then do not allow edit
			if($query == FALSE) {
				redirect('form', 'refresh');
			}

			//redirect if required is not filled
			if(!isset($_POST['fname'])) {
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

			//Update form data into the database
			$result = $this->form_data_model->editFormData($query->row()->form_data, $asstType, $fname, $lname, $email, $studentID, $gpa, $expected_grad, $phone, 
                                       						 $gato, $department, $grade, $advisor, $speakOPTscore, $lastTestDate, $onita, 
                                       						 $other_work, $semester, $graduate_type, $speak_assessment);

			//Update form meta data into database
			$result = $this->form_model->editForm($query->row()->user_id, $query->row()->semester_id, $signature, $date);
			
			$base_string = 'currently_teaching';
			$post_string = $base_string.'1';
			$counter = 1;
			
			while(isset($_POST[$post_string])) {
				$result = $this->course_model->getCourseByName($_POST[$post_string]);

				$return = $this->currently_teaching_model->checkForEntry($result->row()->course_id, $result->row()->course_name, $query->row()->form_data);
				if($return == FALSE) {
					$this->currently_teaching_model->insert($result->row()->course_id, $result->row()->course_name, $query->row()->form_data);
				}
				
				$counter++;
				$post_string = $base_string.strval($counter);
			}

			$base_string = 'previously_taught';
			$post_string = $base_string.'1';
			$counter = 1;
			
			while(isset($_POST[$post_string])) {
				$result = $this->course_model->getCourseByName($_POST[$post_string]);

				$return = $this->previous_taught_model->checkForEntry($result->row()->course_id, $result->row()->course_name, $query->row()->form_data);
				if($return == FALSE) {
					$this->previous_taught_model->insert($result->row()->course_id, $result->row()->course_name, $query->row()->form_data);
				} 

				$counter++;
				$post_string = $base_string.strval($counter);
			}

			$base_string = 'desired_courses';
			$post_string = $base_string.'1';
			$base_grade_string = 'gradeReceived';
			$grade_string = $base_grade_string.'1';
			$counter = 1;
			
			while(isset($_POST[$post_string])) {
				$result = $this->course_model->getCourseByName($_POST[$post_string]);

				$return = $this->desired_courses_model->checkForEntry($result->row()->course_id, $result->row()->course_name, $query->row()->form_data);
				if($return == FALSE) {
					$this->desired_courses_model->insert($result->row()->course_id, $result->row()->course_name, $query->row()->form_data, $_POST[$grade_string]);
				} else {
					$this->desired_courses_model->update($return->row()->desired_course_id, $_POST[$grade_string]);
				}
				
				$counter++;
				$post_string = $base_string.strval($counter);
				$grade_string = $base_grade_string.strval($counter);
			}

			//Redirect to form
			redirect('form', 'refresh');
		}
	}
?>
