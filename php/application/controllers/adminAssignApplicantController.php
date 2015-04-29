<?php	
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
