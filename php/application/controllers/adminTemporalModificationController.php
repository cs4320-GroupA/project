<?php
	class adminTemporalModificationController extends CI_Controller{
		public function __construct(){
            parent::__construct();
        }// end constructor

		public function index(){ 
			$this->load->view('adminTemporalModification');
		}// end index
        
        
        public function set(){
            
            // need to load
            $this->load->model('temoral_model');
            $this->load->model('semester_model');
            
            // semester to modify (onl option is 1 anyway)
            $semester_id = $this->semester_model->getCurrentSemester(); 
            
            // new status to change to
            $status_id = htmlspecialchars($_POST['status_id']);
            //$status_id = $this->temporal_model->getTime($status_id);
            
            
            
            $result = $this->semester_model->setTime( $semester_id, $status_id);
            
            if($result == true){
                redirect('adminTemporalModification','refresh');
            }
            else
                redirect('adminTemporalModification','refresh');
            
        }// end set
        
	}// end class
?>