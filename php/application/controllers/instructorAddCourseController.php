<?php
	class instructorAddCourseController extends CI_Controller {

		public function __construct() {
			parent::__construct();
       }

		public function index() {
			$this->load->model('course_model');
			
			$courses = $this->course_model->getCourses();
			$this->load->view('instructorAddCourse', $courses);
		}

		public function add($course_id, $course_name) {
			$this->load->model('course_model');
			$this->load->model('semester_model');

    		$semester = getCurrentSemester();

    		$result = $this->course_model->assignCourse($course_id, $course_name, $this->session->userdata('user_id'));

    		if($result == TRUE) {
				redirect('instructorAddCourse', 'refresh');
			} else {
				redirect('instructorAddCourse', 'refresh');
			}
		}
	}
?>