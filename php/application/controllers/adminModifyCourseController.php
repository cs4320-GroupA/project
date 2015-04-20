<?php
	class adminModifyCourseController extends CI_Controller 
	{
		public function __construct() 
		{
            		parent::__construct();
			$this->adminModifyCourseController->index();
       		 }

		public function index() 
		{ 
			$this->load->model('Course_model');
			$courses = $this->Course_model->getCourses();
			$this->load->view('adminModifyCourse',$courses);
		}

		public function remove(){
			$this->load->model('Course_model');

			$course_id = htmlspecialchars($_POST['course_id']);

			$this->Course_model->remove($course_id);
			$courses = $this->course_model->getCourses();
			$this->load->view('adminModifyCourse',$courses);
			
		}

		public function add(){
			$this->load->model('Course_model');
			$this->load->model('Semester_model');
			
    			$course_id = htmlspecialchars($_POST['course_id']);
    			$course_name = htmlspecialchars($_POST['course_name']);
    			$semester = getCurrentSemester();
			//need to change this to whatever the session id is
    			$instructor_id = $this->session->userdata('user_agent');

			$result = $this->Course_model->createCourse($course_id,$course_name,$semester,$instructor_id);
			
			if($result == TRUE) {
				redirect('form', 'refresh');
			} else {
				redirect('form', 'refresh');
			}
    			

		}

		public function edit(){
		}

	}
?>
