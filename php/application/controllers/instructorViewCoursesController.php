<?php
	class instructorViewCoursesController extends CI_Controller {

		public function __construct() {

			parent::__construct();
       }

		public function index() {
			$this->load->model('course_model');
			$this->load->model('semester_model');

			$semester = $this->semester_model->getCurrentSemester();

			$pawprint = $this->session->userdata('user_id');

            $courses = $this->course_model->getCoursesByInstructor($pawprint);

            if($courses != FALSE) {
            	$data['courses'] = $courses->result();
            } else {
            	$data = NULL;
            }
       
			$this->load->view('instructorViewCourses', $data, $semester);

		}
	}
?>