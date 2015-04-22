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
			$this->load->view('adminEditCourse',$course_id);
		}

		public function edit($course_id){
			
			$oldCourseName = htmlspecialchars($course_id);						
    			$course_name = htmlspecialchars($_POST['courseName']);
    			$semester = htmlspecialchars($_POST['semester']);

			
			
		}

	}
?>
