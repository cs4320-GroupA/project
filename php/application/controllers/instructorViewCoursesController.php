<?php
	class instructorViewCoursesController extends CI_Controller {

		public function __construct() {

			parent::__construct();
       }

		public function index() {
			$this->load->model('course_model');
			$this->load->model('semester_model');

            $courses = $this->course_model->getCoursesByInstructor($this->session->userdata('user_id'), $this->semester_model->getCurrentSemesterTitle());

            if($courses != FALSE) {
            	$data['courses'] = $courses->result();
            } else {
            	$data = NULL;
            }
       
			$this->load->view('instructorViewCourses', $data);//, $semester);

		}
	}
?>