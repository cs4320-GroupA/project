<?php
	class Login extends CI_Controller {
		public index() {
			$this->load->view('welcome_message');
		}

		public validate() {
			$this->load->model('User');
			if($this->User->login() == TRUE) {
				$this->load->view('infopage');
			} else {
				echo "Invalid Username and Password";
			}
		}
	}
?>