<?php	
	class adminAssignApplicantController extends CI_Controller 
	{
		public function __construct() 
		{
        	parent::__construct();
            
			$this->load->model('course_model');
			$this->load->model('semester_model');
			$this->load->model('user_model');
			$this->load->model('form_model');
            $this->load->model('desired_courses_model');
            $this->load->model('assigned_courses_model');
        }

		public function index() { 
            $courses = $this->course_model->getCourses($this->semester_model->getCurrentSemesterTitle());
            
            if($courses != FALSE) {
                $data['courses'] = $courses->result();
            } else {
                $data = NULL;
            }
            
			$this->load->view('adminAssignApplicant',$data);
		}
        
        public function assign($course_id) {
            $query = $this->course_model->getCourseById($course_id);
            $course_info = $query->row();

            $query = $this->semester_model->getCurrentSemester();
            $semester_id = $query->row()->semester_id;

            foreach($_POST['applicants'] as $row) {
                if(!$this->assigned_courses_model->checkForEntry($course_id, $course_info->course_name, $row, $semester_id)) {
                    $this->assigned_courses_model->insert($course_id, $course_info->course_name, $row, $semester_id);
                }
            }
            
            $path = base_url().'/index.php/adminAssignApplicantController/viewCourse/'.$course_id;
            redirect($path, 'redirect');
        }

        public function quick_assign($course_id, $form) {
            $query = $this->course_model->getCourseById($course_id);
            $course_info = $query->row();

            $query = $this->semester_model->getCurrentSemester();
            $semester_id = $query->row()->semester_id;

            if(!$this->assigned_courses_model->checkForEntry($course_id, $course_info->course_name, $form, $semester_id)) {
                $this->assigned_courses_model->insert($course_id, $course_info->course_name, $form, $semester_id);
            }
            
            $path = base_url().'/index.php/adminAssignApplicantController/viewCourse/'.$course_id;
            redirect($path, 'redirect');
        }
        public function getApplicants(){
            
            //grabbing the course_id by using the selected course name            
            $course_name = $_POST['courseToAssign'];
            
            $query = $this->course_model->getCourseByName($course_name);

            if($query != FALSE){
                $result = $query->row();

                $path = base_url().'index.php/adminAssignApplicantController/viewCourse/'.$result->course_id;
                redirect($path, 'redirect');
            } else {
                redirect('adminAssignApplicantController', 'redirect');
            }
        }

        public function remove($assigned_id, $course_id){
            $sql = 'DELETE FROM tasub.assigned_courses WHERE assigned_id = ?';

            $query = $this->db->query($sql, array($assigned_id));

            $path = base_url().'index.php/adminAssignApplicantController/viewCourse/'.$course_id;
            redirect($path, 'redirect');
        }

        public function viewCourse($course_id) {
            $query = $this->course_model->getCourseById($course_id);

            $data['currentCourse'] = $query->row();
            $data['course_id'] = $course_id;

            //INSTRUCTOR PREFRENCES of applicants
            $prefs = $this->course_model->getPreferenceByCourse($course_id);
            
            if($prefs == false)
                $data['preferences'] = null;
            else
                $data['preferences'] = $prefs->result();
            
            //APPLICANTS WHO PREFER THIS COURSE
            $apps = $this->desired_courses_model->getByCourseId($course_id);
            
            if($apps != false)
                $data['applicants'] = $apps->result();
            else
                $data['applicants'] = null;   
            
            $semester = $this->semester_model->getCurrentSemester();
            $semester_id = $semester->row()->semester_id;

            $query = $this->assigned_courses_model->getAssignedApplicants($course_id, $semester_id);

            if($query != FALSE) {
                $data['assigned_applicants'] = $query->result();
            }

            //COURSES
            $courses = $this->course_model->getCourses($this->semester_model->getCurrentSemesterTitle());
            
            if($courses != FALSE) {
                $data['courses'] = $courses->result();
            }
            
            
            //loading the view using the data
            $this->load->view('adminAssignApplicant', $data);
        }
	}
?>
