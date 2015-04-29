<?php	
	class adminAssignApplicantController extends CI_Controller 
	{
		public function __construct() 
		{
        	parent::__construct();
            
            

			$this->load->model('course_model');
			$this->load->model('semester_model');
			$this->load->model('user_model');
            
        }

		public function index() 
		{ 
            $courses = $this->course_model->getCourses();
            
            $data = array('courses' => $courses->result());
            
			$this->load->view('adminAssignApplicant',$data);
		}
        
        public function getApplicants($course_id){
            
            //query for the preferences table
            $prefs = $this->course_model->getPreferenceByCourse($course_id);
            
            $data[preferences] = array('preferences' => $prefs->result());
            
            //query for the applicant pool
            $apps = $this->course_model->getCoursesById($course_id);
            
            $data[applicants] = array('applicants' => $apps->result());
            
            
            //loading the view using the data
            $this->load->view('adminAssignApplicant',$data);
        }

		public function getCourses($course_id){
			$this->load->view('desired_courses_model');
			
			$result = $this->desired_courses_model->getById($course_id);
			
			//$classes['courses'] = $result->result_array();
			//$classes['students'] = getUsers($result->form_id);

			$students = getUsers($result->form_id);
			
			$this->load->view('adminAssinApplicant', $classes);

		}

		public function getUsers($form_id){
			$this->load->view('form_data_model');
			
			$result = $this->form_data_model->getFormData($form_id);
			$students = $result->result_array();

			return $students; 
		}
	}
?>
