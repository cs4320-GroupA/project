<?php
	class adminModifyCourseController extends CI_Controller 
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
			$courses = $this->course_model->getCourses($this->semester_model->getCurrentSemesterTitle());

			if($courses != FALSE) {
				$data = array('courses' => $courses->result());
			}
			
			$this->load->view('adminModifyCourse', $data);
		}

		public function remove($course_id){
			$this->course_model->removeCourse($course_id);
			
			redirect('adminModifyCourseController', 'refresh');
		}

		public function add(){
    		$course_name = htmlspecialchars($_POST['courseName']);
    		$semester = htmlspecialchars($_POST['semester']);

			$instructor_filler = $this->user_model->login("unassigned");
			$instructor_filler = $instructor_filler->user_id;
			//instructor id and courseId is currently null
			$result = $this->course_model->createCourse($course_name,$semester,$instructor_filler);
			
			
			if($result == TRUE) {
				redirect('adminModifyCourseController', 'refresh');
			} else {
				redirect('adminModifyCourseController', 'refresh');
			}

    			

		}


	}
?>
