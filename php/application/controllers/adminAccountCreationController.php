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
			if($this->session->userdata('user_type') != 'admin') {
				redirect('home', 'refresh');
			}
			
			$this->load->view('adminAccountCreation');
		}

		public function createAccount(){
			
			$username = htmlspecialchars($_POST['adminID']);
			$password = htmlspecialchars($_POST['password']);
			$salt = uniqid(mt_rand(), false);
			$saltedPass = hash("sha1", $password . $salt);
			$account_type = 'admin';

			$result = $this->user_model->register($username,$saltedPass,$salt,$account_type);
			
			if($result == TRUE) {
				redirect('adminAccountCreationController', 'refresh');
			} else {
				redirect('adminAccountCreationController', 'refresh');
			}
		}

			
	}
?>
