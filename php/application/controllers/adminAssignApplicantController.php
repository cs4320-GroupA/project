<?php	
	class adminAssignApplicantController extends CI_Controller 
	{
		public function __construct() 
		{
        	parent::__construct();
            
            

			$this->load->model('course_model');
			$this->load->model('semester_model');
			$this->load->model('user_model');
			$this->load->model('form_model');
            $this->load->model('desired_courses_model');
            
        }

		public function index() 
		{ 
            //$courses = $this->course_model->getCourses();
            
            //$data['courses'] = array('courses' => $courses->result());
            
            $courses = $this->course_model->getCourses();
            
            $data['courses'] = $courses->result();
            
			$this->load->view('adminAssignApplicant',$data);
		}
        
        public function getApplicants(){
            
            //grabbing the course_id by using the selected course name
            
            $course_name = $_POST['courseToAssign'];
            
            $query = $this->course_model->getCourseByName($course_name);
            
            if($query != FALSE){
                $result = $query->result();
                foreach($result as $row){
                    $course_id = $row->course_id;
                }
                $data['currentCourse'] = $result;
            } else {
                $course_id = 1;   
            }
           
            //INSTRUCTOR PREFRENCES of applicants
            $prefs = $this->course_model->getPreferenceByCourse($course_id);
            
            if($prefs == false)
                $data['preferences'] = null;
            else
                $data['preferences'] = $prefs->result();
            
            
            
            //APPLICANTS WHO PREFER THIS COURSE
            $apps = $this->desired_courses_model->getByCourseId($course_id);
            
            
            if($apps != false)
                $data['applicants'] = $apps->result();
            else
                $data['applicants'] = null;   
            
                //$this->course_model->getCourseById($course_id);
            
            //COURSES
            $courses = $this->course_model->getCourses();
              
            $data['courses'] = $courses->result();
            
            
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
