<?php
	class instructorAddCourseController extends CI_Controller {

		public function __construct() {
			parent::__construct();
       }

		public function index() {
			if($this->session->userdata('user_type') != 'instructor') {
				redirect('home', 'refresh');
			}

			$this->load->model('course_model');
			$this->load->model('semester_model');
			
			$result = $this->course_model->getCourses($this->semester_model->getCurrentSemesterTitle());

			if($result != FALSE) {
				$data['courses'] = $result->result_array();
			} else {
				$data = NULL;
			}

			$this->load->view('instructorAddCourse', $data);
		}

		public function add($course_id) {
			$this->load->model('course_model');
			$this->load->model('semester_model');

    		$result = $this->course_model->assignCourse($course_id, $this->session->userdata('user_id'));

    		if($result == TRUE) {
				redirect('instructorAddCourseController', 'refresh');
			} else {
				redirect('instructorAddCourseController', 'refresh');
			}
		}
	}
?>