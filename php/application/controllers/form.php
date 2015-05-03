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
			$this->load->model('semester_model');

			$semester = $this->semester_model->getCurrentSemester();
			//Get the current applicant's form
			$query = $this->form_model->getForm($this->session->userdata('user_id'), $semester->row()->semester_id);

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
							  'editable' => TRUE);

				if($this->semester_model->getCurrentSemesterStatus() == 'APPLICATION') {
					$data['message_header'] = 'Edit Your Application';
					$data['message'] = '<p>Your application has been successfully submitted.<br>To edit your submission changes the values as desired and click Edit Button</p>';
				} else if($this->semester_model->getCurrentSemesterStatus() == 'SELECTION') {
					$data['message_header'] = 'Application Status';
					$data['message'] = '<p>Your application is under review.</p>';
				} else if($this->semester_model->getCurrentSemesterStatus() == 'NOTIFICATION'){
					$data['message_header'] = 'Notification';
					$data['message'] = '<p>Please check your notification page for updates about your assignment.</p>';
				}

				$data['previous'] = $this->previous_taught_model->getAll($query->row()->form_data);
				$data['current'] = $this->currently_teaching_model->getAll($query->row()->form_data);
				$data['desired'] = $this->desired_courses_model->getAll($query->row()->form_data);

			} else {
				//User has not submitted a form yet, so allow submission
				$data = array('submittable' => TRUE);

				if($this->semester_model->getCurrentSemesterStatus() != 'APPLICATION') {
					$data['message_header'] = 'Application Submission Closed';
					$data['message'] = '<p>The time to submit applications has passed</p>';
				}	
			}

			if($this->semester_model->getCurrentSemesterStatus() != 'APPLICATION') {
				//If it is not the application window then do not allow submissions/edits
				$data['editable'] = FALSE;
				$data['submittable'] = FALSE;
				$data['view_only'] = TRUE;
			}

			$result = $this->course_model->getCourses($this->semester_model->getCurrentSemesterTitle());

			if($result != FALSE) {
				$data['courses'] = $result->result_array();
			}
			//Load view with array
			$this->load->view('application', $data);
		}

		public function viewForm($user_id, $semester_id) {
			if($this->session->userdata('user_type') == 'applicant') {
				redirect('form', 'refresh');
			}
			// Load form_data and form models
			$this->load->model('form_data_model');
			$this->load->model('form_model');
			$this->load->model('course_model');
			$this->load->model('currently_teaching_model');
			$this->load->model('previous_taught_model');
			$this->load->model('desired_courses_model');
			$this->load->model('comments_model');
			//Get the current applicant's form
			$query = $this->form_model->getForm($user_id, $semester_id);
			$form = $query->row();
			
			//If an entry for user's application exists for this semester, then auto load for data
			if($query != FALSE) {
				//Grab the form data for the user's form
				$result = $this->form_data_model->getFormDataByID($form->form_data);
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

				$data['previous'] = $this->previous_taught_model->getAll($query->row()->form_data);
				$data['current'] = $this->currently_teaching_model->getAll($query->row()->form_data);
				$data['desired'] = $this->desired_courses_model->getAll($query->row()->form_data);
				$data['user_id'] = $user_id;
				$data['semester_id'] = $semester_id;
				$result = $this->course_model->getCourses($this->semester_model->getCurrentSemesterTitle());
				
				if($result != FALSE) {
					$data['courses'] = $result->result_array();
				}
				
				$data['form_id'] = $form->form_id;
			}
			else {
				redirect('applicantPoolController', 'refresh');
			}
		
			$result = $this->comments_model->getAllByUser($user_id);
			$data['comments'] = TRUE;

			if($result != FALSE) {
				$data['comments_about_user'] = $result->result();
			}

			if($this->session->userdata('user_type') == 'instructor') {
				$instructor_courses = $this->course_model->getCoursesByInstructor($this->session->userdata('user_id'));
				
				if($instructor_courses != FALSE) {
					$data['instructor_courses'] = $instructor_courses->result();
				}

				$data['message_header'] = 'Preference';
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
			$this->load->model('semester_model');

			$semester = $this->semester_model->getCurrentSemester();
			$semester_id = $semester->row()->semester_id;

			//Get the current applicant's form if exists
			$query = $this->form_model->getForm($this->session->userdata('user_id'), $semester_id);

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
			$semester = $this->semester_model->getCurrentSemesterTitle();
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
			$form_data_id = $this->form_data_model->getFormDataID($studentID, $semester);

			//Insert form meta data into database
			$result = $this->form_model->submitForm($semester_id, $form_data_id, $this->session->userdata['user_id'], $signature, $date);
			
			$base_string = 'currently_teaching';
			$post_string = $base_string.'1';
			$counter = 1;
			
			for($i = 1; $i <= 4; $i++) {
				if(isset($_POST[$post_string])) {
					$result = $this->course_model->getCourseByName($_POST[$post_string]);
					
					$this->currently_teaching_model->insert($result->row()->course_id, $result->row()->course_name, $form_data_id);
				}

				$counter++;
				$post_string = $base_string.strval($counter);
			}

			$base_string = 'previously_taught';
			$post_string = $base_string.'1';
			$counter = 1;
			
			for($i = 1; $i <= 10; $i++) {
				if(isset($_POST[$post_string])) {
					$result = $this->course_model->getCourseByName($_POST[$post_string]);
					
					$this->previous_taught_model->insert($result->row()->course_id, $result->row()->course_name, $form_data_id);
				}

				$counter++;
				$post_string = $base_string.strval($counter);
			}

			$base_string = 'desired_courses';
			$post_string = $base_string.'1';
			$base_grade_string = 'gradeReceived';
			$grade_string = $base_grade_string.'1';
			$counter = 1;
			
			for($i = 1; $i <= 8; $i++) {
				if(isset($_POST[$post_string])) {
					$result = $this->course_model->getCourseByName($_POST[$post_string]);

					if($result != FALSE) {
						$return = $this->desired_courses_model->checkForEntry($result->row()->course_id, $result->row()->course_name, $form_data_id);
						
						$this->desired_courses_model->insert($result->row()->course_id, $result->row()->course_name, $form_data_id, $_POST[$grade_string]);
					}
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
			$this->load->model('semester_model');

			$semester = $this->semester_model->getCurrentSemester();
			//Get the current applicant's form if exists
			$query = $this->form_model->getForm($this->session->userdata('user_id'), $semester->row()->semester_id);

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
			$semester = $this->semester_model->getCurrentSemesterTitle();
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
			
			$form_data_id = $query->row()->form_data;
			$base_string = 'currently_teaching';
			$post_string = $base_string.'1';
			$counter = 1;
			
			for($i = 1; $i <= 4; $i++) {
				if(isset($_POST[$post_string])) {
					$result = $this->course_model->getCourseByName($_POST[$post_string]);

					if($result != FALSE) {
						$return = $this->currently_teaching_model->checkForEntry($result->row()->course_id, $result->row()->course_name, $form_data_id);
						if($return == FALSE) {
							$this->currently_teaching_model->insert($result->row()->course_id, $result->row()->course_name, $form_data_id);
						}
					}
				}

				$counter++;
				$post_string = $base_string.strval($counter);
			}

			//check for deletions
			$query = $this->currently_teaching_model->getAll($form_data_id);
			$safe = FALSE;
			
			foreach ($query as $row) {
				for($i = 1; $i < $counter; $i++) {
					$post_string = $base_string.strval($i);
					
					if(isset($_POST[$post_string])) {
						if($row->course_name == $_POST[$post_string]) {
							$safe = TRUE;
						}
					}
				}
				if($safe == FALSE) {
					$this->currently_teaching_model->delete($row->currently_teaching_id, $row->course_id, $row->course_name, $form_data_id);
				}

				$safe = FALSE;
			}

			$base_string = 'previously_taught';
			$post_string = $base_string.'1';
			$counter = 1;
			
			for($i = 1; $i <= 10; $i++) {
				if(isset($_POST[$post_string])) {
					$result = $this->course_model->getCourseByName($_POST[$post_string]);

					if($result != FALSE) {
						$return = $this->previous_taught_model->checkForEntry($result->row()->course_id, $result->row()->course_name, $form_data_id);
						if($return == FALSE) {
							$this->previous_taught_model->insert($result->row()->course_id, $result->row()->course_name, $form_data_id);
						}
					}
				}

				$counter++;
				$post_string = $base_string.strval($counter);
			}

			//check for deletions
			$query = $this->previous_taught_model->getAll($form_data_id);
			$safe = FALSE;
			
			foreach ($query as $row) {
				for($i = 1; $i < $counter; $i++) {
					$post_string = $base_string.strval($i);
					
					if(isset($_POST[$post_string])) {
						if($row->course_name == $_POST[$post_string]) {
							$safe = TRUE;
						}
					}
				}
				if($safe == FALSE) {
					$this->previous_taught_model->delete($row->previous_taught_id, $row->course_id, $row->course_name, $form_data_id);
				}

				$safe = FALSE;
			}

			$base_string = 'desired_courses';
			$post_string = $base_string.'1';
			$base_grade_string = 'gradeReceived';
			$grade_string = $base_grade_string.'1';
			$counter = 1;
			
			for($i = 1; $i <= 8; $i++) {
				if(isset($_POST[$post_string])) {
					$result = $this->course_model->getCourseByName($_POST[$post_string]);

					if($result != FALSE) {
						$return = $this->desired_courses_model->checkForEntry($result->row()->course_id, $result->row()->course_name, $form_data_id);
						if($return == FALSE) {
							$this->desired_courses_model->insert($result->row()->course_id, $result->row()->course_name, $form_data_id, $_POST[$grade_string]);
						} else {
							$this->desired_courses_model->update($return->row()->desired_course_id, $_POST[$grade_string]);
						}
					}
				}

				$counter++;
				$post_string = $base_string.strval($counter);
				$grade_string = $base_grade_string.strval($counter);
			}

			//check for deletions
			$query = $this->desired_courses_model->getAll($form_data_id);
			$safe = FALSE;
			
			foreach ($query as $row) {
				for($i = 1; $i < $counter; $i++) {
					$post_string = $base_string.strval($i);
					
					if(isset($_POST[$post_string])) {
						if($row->course_name == $_POST[$post_string]) {
							$safe = TRUE;
						}
					}
				}
				if($safe == FALSE) {
					$this->desired_courses_model->delete($row->desired_course_id, $row->course_id, $row->course_name, $form_data_id);
				}

				$safe = FALSE;
			}

			//Redirect to form
			redirect('form', 'refresh');
		}
	}
?>
