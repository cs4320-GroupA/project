<?php
	class instructorViewCoursesController extends CI_Controller {

		public function __construct() {
            $this->load->model('Course_model');
			$this->load->model('Semester_model');

			parent::__construct();

			$this->instructorViewCoursesController->index();
       }

		public function index() {
			$pawprint = $this->session->userdata('user_id');
			$courses = $this->course_model->getCoursesByInstructor($pawprint);
			$this->load->view('instructorViewCourses', $courses);
		}
	}
?>