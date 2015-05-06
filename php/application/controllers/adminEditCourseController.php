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
			if($this->session->userdata('user_type') != 'admin') {
				redirect('home', 'refresh');
			}
			
			$course = $this->course_model->getCourseById($course_id);

			$data = array('course' => $course->row());

			$semesters = $this->semester_model->getAll();
            if($semesters != FALSE) {
                $data['semesters'] = $semesters->result();
            }

			$this->load->view('adminEditCourse',$data);
		}

		public function edit($course_id){	
			$course_id = htmlspecialchars($course_id);						
    		$course_name = htmlspecialchars($_POST['course_name']);
    		$semester = htmlspecialchars($_POST['semester']);

			$result = $this->course_model->editCourse($course_id,$course_name,$semester);

			if($result == TRUE) {
				redirect('adminModifyCourseController', 'refresh');
			} else {
				redirect('adminModifyCourseController', 'refresh');
			}
			
		}

	}
?>
