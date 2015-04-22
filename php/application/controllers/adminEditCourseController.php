<?php
	class adminModifyCourseController extends CI_Controller 
	{
		public function __construct() 
		{
            		parent::__construct();

			$this->load->model('course_model');
			$this->load->model('semester_model');
       	}

		public function index() 
		{ 
			$this->load->view('adminEditCourse');
		}

		public function edit(){
			
			$oldCourseName = htmlspecialchars($course_id);						
    			$course_name = htmlspecialchars($_POST['courseName']);
    			$semester = htmlspecialchars($_POST['semester']);

			$query = 

			
		}

	}
?>
