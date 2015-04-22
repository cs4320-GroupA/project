<?php

class applicantPoolController extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }// end constructor
    
    public function index(){
       $this->load->model('form_model');
       $this->load->model('form_data_model');
       
       $data['applicants'] = $this->form_model->getAllBySemesterId($this->session->userdata('semester_id'));
       $data['form_data'] = $this->form_data_model->getAllBySemester($this->session->userdata('semester_title'));
       
	   $this->load->view('applicant_pool', $data);
    }// end index

}// end class

?>