<?php
	class instructorViewCoursesController extends CI_Controller {

		public function __construct() {

			parent::__construct();
       }

		public function index() {
			$this->load->model('course_model');
			//$this->load->model('Semester_model');

			$pawprint = $this->session->userdata('user_id');

            $courses = $this->course_model->getCoursesByInstructor($pawprint);

            if($course != FALSE) {
            	$data['courses'] = $courses->result();
            }
       
			$this->load->view('instructorViewCourses', $data);

		}
	}
?>