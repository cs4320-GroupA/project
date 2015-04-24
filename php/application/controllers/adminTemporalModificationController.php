<?php
	class adminTemporalModificationController extends CI_Controller{
		public function __construct(){
            parent::__construct();
        }// end constructor

    // load adminTemporalModification as default
		public function index(){ 
			$this->load->view('adminTemporalModification');
		}// end index
        
    /*
     * set() - changes the current semester to a new status
     * input:   $new_time - new status to send
     */
        public function set( $new_time ){
            
            // need to load
            //$this->load->model('temporal_model');
            $this->load->model('semester_model');
            
            // semester to modify (onl option is 1 anyway)
            $semester_id = $this->semester_model->getCurrentSemester(); 
            
        /*
         *  hard coded it to just send 1 as the semester ID for now,
         *  should be changed if multiple semesters are added to the site
         */  
            $result = $this->semester_model->setTime( 1, $new_time);
            
            
        /*
         * here we delete "status_title" from the session, then create a new session
         * with the new temporal status
         */
            if($result == true){
                // not sure if this is the right spot to change session data
                $new_Time_Title = '';
                if( $new_time == 1 ){
                    $this->session->unset_userdata("status_title");
                    //$new_data = array('status_title' => "APPLICATION");
                    $this->session->set_userdata('status_title', 'APPLICATION');    
                }
                else if( $new_time == 2 ){
                    $this->session->unset_userdata("status_title");
                    //$new_data = array('status_title' => "APPLICATION");
                    $this->session->set_userdata('status_title', 'SELECTION');    
                }
                else if( $new_time == 3 ){
                    $this->session->unset_userdata("status_title");
                    //$new_data = array('status_title' => "Notification");
                    $this->session->set_userdata('status_title', 'NOTIFICATION');    
                }
                else{
                    $this->session->unset_userdata("status_title");
                    //$new_data = array('status_title' => "Closed");
                    $this->session->set_userdata('status_title', 'CLOSED');    
                }
                redirect('adminTemporalModificationController','refresh');
            }
            
        }// end set
        
	}// end class
?>