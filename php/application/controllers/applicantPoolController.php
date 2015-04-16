<?php

class applicantPoolController extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }// end constructor
    
    public function index(){ 
	   $this->load->view('applicantPool');
    }// end index

}// end class

?>