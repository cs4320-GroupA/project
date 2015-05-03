<?php
	class adminTemporalModificationController extends CI_Controller{
		public function __construct(){
            parent::__construct();

            $this->load->model('semester_model');
        }// end constructor

    // load adminTemporalModification as default
		public function index(){ 

            $data['status_title'] = $this->semester_model->getCurrentSemesterStatus();

            $semesters = $this->semester_model->getALL();
            if($semester != FALSE) {
                $data['semesters'] = $semesters->result();
            }


			$this->load->view('adminTemporalModification', $data);
		}// end index
        
    /*
     * set() - changes the current semester to a new status
     * input:   $new_time - new status to send
     */
        public function set($new_time) {
            // semester to modify (hardcoded 1 for now)
            $semester_id = $this->semester_model->getCurrentSemester(); 
            
            $result = $this->semester_model->setTime($semester_id->row()->semester_id, $new_time);
            
            redirect('adminTemporalModificationController','refresh');
        }
        
        public function newSemester() {
            if(!isset($_POST['newTitle']) || !isset($_POST['newYear'])) {
                redirect('adminTemporalModificationController','refresh');
            }

            $semester_title = htmlspecialchars($_POST['newTitle']).' '.htmlspecialchars($_POST['newYear']);

            $this->semester_model->createSemester($semester_title);

            redirect('adminTemporalModificationController','refresh');
        }

        public function changeSemester() {
            if(!isset($_POST['changeTo'])) {
                redirect('adminTemporalModificationController','refresh');
            }

            $this->semester_model->changeSemester(htmlspecialchars($_POST['newYear']));

            redirect('adminTemporalModificationController','refresh');
        }

	}// end class
?>