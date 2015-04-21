<?php
	class adminTemporalModificationController extends CI_Controller{
		public function __construct(){
            parent::__construct();
        }// end constructor

		public function index(){ 
			$this->load->view('adminTemporalModification');
		}// end index
        
        public function set(){
            $this->load->model();
            
            // new status to change to
            $status_id = htmlspecialchars($_POST['status_id']);
            
            // semester to modify (onl option is 1 anyway)
            $semester_id = $this->session->userdata('semester_id'); 
            
            $result = $this->semester_model->setTime( $semester_id, $status_id);
            
            if($result == true){
                redirect('form','refresh');
            }
            else
                redirect('form','refresh');
            
        }// end set
        
	}// end class
?>