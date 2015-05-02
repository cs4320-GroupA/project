<?php 

class PreferenceByCourseController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('course_model');
        $this->load->model('semester_model');
        $this->load->model('desired_courses_model');
    }// end constructor

    public function index($course_id){
        $data['course_id'] = $course_id;

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
    
/*
 * add() - instructor adds applicant as preferred TA/PLA for course
 * input:   $student_id - id of user to add as perference
 *          $course_id - id of course to pair user to course
 */
    public function add($student_id, $course_id, $preference_id){
    
        $course_info = $this->course_model->getCourseById( $course_id );
        $course_info = $course_info->row();

        $course_name = $course_info->course_name;
        
        $form_info = $this->form_model->getForm( $student_id, 1 );
        
        $form_id = $form_info->form_id;
        
        //$course_info = $this->course_model->getCourseById();
        
        $result = $this->course_model->createPreference( 
            $course_id,         //
            $course_name,       //
            $form_id, 
            $semester_id,       //
            $preference_number  
        );
        
        redirect('instructorViewCourseController', 'refresh');
        
    }// end add function

    public function quick_add($form_id, $user_id) {
        $course_info = $this->course_model->getCourseById($_POST['course_for_preference']);
        $course_info = $course_info->row();
        
        $course_name = $course_info->course_name;
        $course_id = $course_info->course_id;
        $semester_id = $this->semester_model->getCurrentSemester();
        $semester_id =$semester_id->row()->semester_id;
        
        $query = getPreferenceByCourseAndRank($course_id, $rank);

        if($query == FALSE) {
            $result = $this->course_model->createPreference( 
                $course_id,         //
                $course_name,       //
                $form_id, 
                $semester_id,       //
                $_POST['rank'] 
            );
        } else {
            $result = $this->course_model->editPreference($query->row()->preference_id, $form_id, $_POST['rank']); 
        }
        
        $path = base_url().'index.php/form/viewForm/'.$user_id.'/'.$semester_id;
        redirect($path, 'refresh');
        
    }// end add function
/*
 * remove() - applicant-course preference to remove
 * input:   $user_id - id of user to remove as preference
 *          $course_id - id of course
 */
    public function remove(){
        // load course_model
        $this->load->model('course_model');
        
        //$course_info = $this->course_model->getCourseById();
        
        $result = $this->Course_model->removePreference( 
            $course_id, 
            $course_name, 
            $form_id, 
            $semester_id, 
            $preference_number 
        );
        
        redirect('instructorViewCourseController', 'refresh');
    }// end remove function
    
    
}// end class

?>