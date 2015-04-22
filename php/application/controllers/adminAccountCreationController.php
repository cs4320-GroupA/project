<?php
	class adminAccountCreationController extends CI_Controller 
	{
		public function __construct() 
		{
            parent::__construct();

			$this->load->model('user_model');
        }

		public function index() 
		{ 
			$this->load->view('adminAccountCreation');
		}

		public function createAccount($username,$password){
			
			$username = htmlspecialchars($username);
			$password = htmlspecialchars($password);
			$salt = uniqid(mt_rand(), false);
			$account_type = 'admin';

			$result = $this->user_model->createAccount($username,$password,$salt,$account_type);
			
			if($result == TRUE) {
				redirect('adminAccountCreationController', 'refresh');
			} else {
				redirect('adminAccountCreationController', 'refresh');
			}
		}

			
	}
?>
