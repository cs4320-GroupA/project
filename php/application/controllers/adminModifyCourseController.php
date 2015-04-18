<?php
	class adminModifyCourseController extends CI_Controller 
	{
		public function __construct() 
		{
			$this->load->model('Course_model');
			$this->load->model('Semester_model');
            		parent::__construct();
       		 }

		public function index() 
		{ 

			$courses = $this->course_model->getCourses();
			$this->load->view('adminModifyCourse',$courses);
		}

		public function remove(){

			

		}

		public function add(){

		}

		public function edit(){
		}
?>
