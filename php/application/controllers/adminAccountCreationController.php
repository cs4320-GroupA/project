<?php
	class adminAccountCreationController extends CI_Controller 
	{
		public function __construct() 
		{
            parent::__construct();
        }

		public function index() 
		{ 
			$this->load->view('adminAccountCreation');
		}

		public function createAccount($username,$password){
			
			$this->load->model('User_model');
			$username = htmlspecialchars($username);
			$password = htmlspecialchars($password);
			$salt = uniqid(mt_rand(), false);
			$account_type = 'admin';

			$result = $this->admin_model->createAccount($username,$password,$salt,$account_type);
			
			if($result == TRUE) {
				redirect('form', 'refresh');
			} else {
				redirect('form', 'refresh');
			}
		}

			
	}
?>
