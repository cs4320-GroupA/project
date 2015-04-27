<?php
	
	/*
		I'm not too sure if this is all correct, but my idea was that
		I would take in the course name/id, and get the form_id's associated with a given
		course (the students applications im guessing?) and then set up 
		an array of students to be displayed on the view. I commented out the list and made it into
		a for loop that will take in the array generated from this controller. 
		
		The only thing I'm not too sure on is how to hook it into the actual view, I did some reading 
		of the documentation, but its uh pretty terrible. 
		
		I also made a model for inserting into the assigned courses table, not sure if that is
		needed, but I felt like i would go ahead and make it. 
		
		If anything needs to be changed, feel free to let me know or just edit it yourself, doesn't matter
		to me. 
	
	*/
	
	class adminAssignApplicantController extends CI_Controller 
	{
		public function __construct() 
		{
        	parent::__construct();
        }

		public function index() 
		{ 
			$this->load->view('adminAssignApplicant');
		}

		public function getCourses($course_id){
			$this->load->view('desired_courses_model');
			
			$result = $this->desired_courses_model->getById($course_id);
			
			//$classes['courses'] = $result->result_array();
			//$classes['students'] = getUsers($result->form_id);

			$students = getUsers($result->form_id);
			
			$this->load->view('adminAssinApplicant', $classes);

		}

		public function getUsers($form_id){
			$this->load->view('form_data_model');
			
			$result = $this->form_data_model->getFormData($form_id);
			$students = $result->result_array();

			return $students; 
		}
	}
?>
