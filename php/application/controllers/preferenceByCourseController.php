<?php 

class preferenceByCourse extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('course_model');
    }// end constructor

    public function index(){
        
		//$this->load->view('preferenceByCourse');
	}// end index
    
/*
 * add() - instructor adds applicant as preferred TA/PLA for course
 * input:   $student_id - id of user to add as perference
 *          $course_id - id of course to pair user to course
 */
    public function add($student_id, $course_id, $preference_id){
    
        $course_info = $this->course_model->getCourseById( $course_id );
        
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