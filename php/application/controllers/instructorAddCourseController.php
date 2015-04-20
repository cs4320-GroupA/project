<?php
	class instructorAddCourseController extends CI_Controller {

		public function __construct() {
            $this->load->model('Course_model');
			$this->load->model('Semester_model');

			parent::__construct();

			$this->instructorAddCourseController->index();
       }

		public function index() {
			$courses = $this->course_model->getCourses();
			$this->load->view('instructorAddCourse', $courses);
		}

		public function add()
		{
			$course_id = htmlspecialchars($_POST['course_id']);
    		$course_name = htmlspecialchars($_POST['course_name']);
    		$semester = getCurrentSemester();

    		$result = $this->Course_model->AssignCourse($course_id,$course_name,$semester,$instructor_id);

    			if($result == TRUE) {
				redirect('form', 'refresh');
			} else {
				redirect('form', 'refresh');
			}
		}
	}
?>