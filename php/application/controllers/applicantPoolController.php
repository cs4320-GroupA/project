<?php

class applicantPoolController extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }// end constructor
    
    public function index(){
      if($this->session->userdata('user_type') == 'applicant') {
        redirect('home', 'refresh');
      }
      
       $this->load->model('form_model');
       $this->load->model('form_data_model');
       $this->load->model('semester_model');

       $semester = $this->semester_model->getCurrentSemester();

       $data['applicants'] = $this->form_model->getAllBySemesterId($semester->row()->semester_id);
       
	   $this->load->view('applicant_pool', $data);
    }// end index

}// end class

?>