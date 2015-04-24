<?php
	class instructorViewCoursesController extends CI_Controller {

		public function __construct() {

			parent::__construct();
       }

		public function index() {
			$this->load->model('course_model');
			$this->load->model('Semester_model');

			
			$pawprint = $this->session->userdata('user_id');
			$courses = $this->course_model->getCoursesByInstructor($pawprint);
			if ($courses == NULL)
			{
				print_r("You have no Courses!");
			}
			else
			{
				print_r("You have courses!");
			}
			$this->load->view('instructorViewCourses', $courses);
		}
	}
?>