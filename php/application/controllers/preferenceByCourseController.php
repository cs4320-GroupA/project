<?php 

class PreferenceByCourseController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('course_model');
        $this->load->model('semester_model');
        $this->load->model('desired_courses_model');
    }// end constructor

    public function index($course_id){
        if(!isset($course_id)) {
            redirect('home', 'refresh');
        }
        
        $data['course_id'] = $course_id;
        $query = $this->course_model->getCourseById($course_id);
        $data['course_name'] = $query->row()->course_name;

        $query = $this->course_model->getPreferenceByCourse($course_id);

        if($query != FALSE) {
            $data['preferenced_forms'] = $query->result();
        }

        $query = $this->desired_courses_model->getByCourseId($course_id);
        
        if($query != FALSE) {
            $data['desired_forms'] = $query->result();
        }

        $this->load->view('instructorPreference', $data);
		//$this->load->view('preferenceByCourse');
	}// end index

    public function quick_add($form_id, $user_id) {
        $rank = $_POST['rank'];
        $course_info = $this->course_model->getCourseById($_POST['course_for_preference']);
        $course_info = $course_info->row();
        
        $course_name = $course_info->course_name;
        $course_id = $course_info->course_id;
        $semester_id = $this->semester_model->getCurrentSemester();
        $semester_id =$semester_id->row()->semester_id;
        
        $query = $this->course_model->getPreferenceByCourseAndRank($course_id, $rank);

        if($query == FALSE) {
            $result = $this->course_model->createPreference( 
                $course_id,         //
                $course_name,       //
                $form_id, 
                $semester_id,       //
                $rank 
            );
        } else {
            $result = $this->course_model->editPreference($query->row()->preference_id, $form_id, $_POST['rank']); 
        }
        
        $path = base_url().'index.php/preferenceByCourseController/index/'.$course_id;
        redirect($path, 'refresh');
        
    }// end add function
/*
 * remove() - applicant-course preference to remove
 * input:   $user_id - id of user to remove as preference
 *          $course_id - id of course
 */
    public function remove($course_id, $preference_id){
        // load course_model
        $this->load->model('course_model');
        
        //$course_info = $this->course_model->getCourseById();
        
        $result = $this->course_model->removePreferenceById($preference_id);;
        
        redirect('instructorViewCourseController', 'refresh');
    }// end remove function
    
    
}// end class

?>