<?php
	class adminTemporalModificationController extends CI_Controller{
		public function __construct(){
            parent::__construct();
        }// end constructor

    // load adminTemporalModification as default
		public function index(){ 
            $this->load->model('semester_model');

            $data['status_title'] = $this->semester_model->getCurrentSemesterStatus();

			$this->load->view('adminTemporalModification', $data);
		}// end index
        
    /*
     * set() - changes the current semester to a new status
     * input:   $new_time - new status to send
     */
        public function set($new_time) {
            
            $this->load->model('semester_model');
            
            // semester to modify (hardcoded 1 for now)
            $semester_id = $this->semester_model->getCurrentSemester(); 
            
            $result = $this->semester_model->setTime($semester_id->row()->semester_id, $new_time);
            
            redirect('adminTemporalModificationController','refresh');
        }
        
        public function newSemester() {
            
        }

	}// end class
?>