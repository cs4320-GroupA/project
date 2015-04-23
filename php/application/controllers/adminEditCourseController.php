<?php
	class adminEditCourseController extends CI_Controller 
	{
		public function __construct() 
		{
            		parent::__construct();

			$this->load->model('course_model');
			$this->load->model('semester_model');
       	}

		public function index() 
		{ 
			$this->load->view('adminEditCourse',$course_id,$instructor_id);
		}

		public function edit($course_id,$instructor_id){
			
			$course_id = htmlspecialchars($course_id);						
    			$course_name = htmlspecialchars($_POST['courseName']);
    			$semester = htmlspecialchars($_POST['semester']);

			$result = $this->course_model->edit($course_id,$course_name,$semester,$instructor_id);

			if($result == TRUE) {
				redirect('adminModifyCourseController', 'refresh');
			} else {
				redirect('adminEditCourseController', 'refresh');
			}
			
		}

	}
?>
