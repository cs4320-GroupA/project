<?php
	class adminModifyCourseController extends CI_Controller 
	{
		public function __construct() 
		{
            parent::__construct();
        }

		public function index() 
		{ 
			$this->load->view('adminModifyCourse');
		}

		public function populate(){
			$this->load->model('Course_model');
			$this->load->model('Semester_model');

			
		}

		public function remove(){
			$this->load->model('Course_model');
			$this->load->model('Semester_model');

		}

		public function add(){
			$this->load->model('Course_model');
			$this->load->model('Semester_model');

		}

		public function modify(){
			$this->load->model('Course_model');
			$this->load->model('Semester_model');
		}
?>
