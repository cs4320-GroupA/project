<?php 

class preferenceByCourse extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }// end constructor

    public function index(){ 
		$this->load->view('preferenceByCourse');
	}// end index
    
    public function add(){
    
        $course_id = htmlspecialchars( $_POST['course_id'] );
        
        $form_id = htmlspecialchars( $_POST['form_id'] );
        
        $course_name = htmlspecialchars( $_POST['course_name'] );
        
        // not sure if semester_id has a default for this project
        $semester_id = htmlspecialchars( $_POST['semester_id'] );
        
        $pref_number = htmlspecialchars( $_POST['pref_number'] );
        
        $result = $this->Course_model->createPreference( $course_id, $course_name, $form_id, $semester_id, $preference_number );
        
        /*
         * do something with $result ? some kind of error check?
         */
        
        
    }// end add function
    
}// end class

?>