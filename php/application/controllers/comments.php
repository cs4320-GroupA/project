<?php
	class Comments extends CI_Controller {
		
		public function __construct() {
            parent::__construct();
        }

        public function add($about_id, $semester_id) {
        	$this->load->model('comments_model');
        	
        	$this->comments_model->insert($about_id, $this->session->userdata['user_id'], $this->session->userdata['pawprint'], $_POST['score'], $_POST['description']);

        	$path = base_url().'index.php/form/viewForm/'.$about_id.'/'.$semester_id;
        	redirect($path, 'redirect');
        }
    }
?>