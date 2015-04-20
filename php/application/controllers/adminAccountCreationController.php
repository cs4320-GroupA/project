<?php
	class adminAccountCreationController extends CI_Controller 
	{
		public function __construct() 
		{
		$this->load->model('admin_model');
            parent::__construct();
        }

		public function index() 
		{ 
			$this->load->view('adminAccountCreation');
		}

		public function createAccount($username,$password,$id){

			$username = htmlspecialchars($username);
			$password = htmlspecialchars($password);
			$id = htmlspecialchars($id);

			$result = $this->admin_model->createAccount($username,$password,$id);
			
			if($result == TRUE) {
				redirect('form', 'refresh');
			} else {
				redirect('form', 'refresh');
			}
		}

			
	}
?>
