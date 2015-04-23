<?php
	class adminEditCourseController extends CI_Controller 
	{
		public function __construct() 
		{
            		parent::__construct();

			$this->load->model('course_model');
			$this->load->model('semester_model');
       	}

		public function index($course_id,$instructor_id,$course_name) 
		{ 
			if($course_id == NULL){
				$course_id = 1;
			}
			if($instructor_id == NULL){
				$instructor_id = 1;
			}
			if($course_name == NULL){
				$course_name = 'FILLER';
			}
			$this->load->view('adminEditCourse',$course_id,$instructor_id,$course_name);
		}

		public function edit($course_id){
			
			$course_id = htmlspecialchars($course_id);						
    			$course_name = htmlspecialchars($_POST['courseName']);
    			$semester = htmlspecialchars($_POST['semester']);
			$instructor_id = htmlspecialchars($_POST['instructor_id']);

			$result = $this->course_model->edit($course_id,$course_name,$semester,$instructor_id);

			if($result == TRUE) {
				redirect('adminModifyCourseController', 'refresh');
			} else {
				redirect('adminEditCourseController', 'refresh');
			}
			
		}

	}
?>
