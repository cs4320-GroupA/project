<?php 

class preferenceByCourse extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }// end constructor

    public function index(){
        // do I need to redirect here?
		//$this->load->view('preferenceByCourse');
	}// end index
    
    public function add(){
    
        // load course_model
        $this->load->model('course_model');
        $this->load->model('form_model');
        
        // get current applicant's form data
        $query = $this->form_model->getForm(
            $this->session->userdata('user_id'), 
            $this->session->userdata('semester_id')
        );
        // returned $query contains all user form_data
        
        // error handling if session variables aren't found
        if($query == FALSE) {
            redirect('form', 'refresh');
        }
        
        // course_id found in POST data(?)
        $course_id = htmlspecialchars( $_POST['course_id'] );
        
        // form_id found when loading applicant's form data
        //$form_id = htmlspecialchars( $_POST['form_id'] );
        $form_id = $query->row()->form_data;
        
        // course_name found in post data(?)
        $course_name = htmlspecialchars( $_POST['course_name'] );
        
        // not sure how best to represent semester_id
        //$semester_id = htmlspecialchars( $_POST['semester_id'] );
        $semester_id = $this->session->userdata('semester_id');
        
        // is pref_number somewhere in the form?
        $pref_number = htmlspecialchars( $_POST['pref_number'] );
        
        $result = $this->Course_model->createPreference( 
            $course_id, 
            $course_name, 
            $form_id, 
            $semester_id, 
            $preference_number 
        );
        
        redirect('form', 'refresh');
        
    }// end add function
    
}// end class

?>