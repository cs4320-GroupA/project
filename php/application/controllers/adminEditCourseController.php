<?php
	class adminEditCourseController extends CI_Controller 
	{
		public function __construct() 
		{
            		parent::__construct();

			$this->load->model('course_model');
			$this->load->model('semester_model');
       	}

		public function index($course_id) 
		{ 
			
			$course = $this->course_model->getCourseById($course_id);

			$data = array('course' => $course->row());

			$this->load->view('adminEditCourse',$data);
			
		
		}

		public function edit($course_id){
			

			$course_id = htmlspecialchars($course_id);						
    			$course_name = htmlspecialchars($_POST['course_name']);
    			$semester = htmlspecialchars($_POST['semester']);
			$instructor_id = htmlspecialchars($_POST['instructor_id']);

			$result = $this->course_model->editCourse($course_id,$course_name,$semester,$instructor_id);

			if($result == TRUE) {
				redirect('adminModifyCourseController', 'refresh');
			} else {
				redirect('adminEditCourseController', 'refresh');
			}
			
		}

	}
?>
