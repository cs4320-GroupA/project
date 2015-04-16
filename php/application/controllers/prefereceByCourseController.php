<?php 

class preferenceByCourse extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }// end constructor

    public function index(){ 
		$this->load->view('preferenceByCourse');
	}// end index
    
}// end class

?>