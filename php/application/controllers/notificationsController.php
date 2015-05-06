<?php
	class notificationsController extends CI_Controller {

		public function __construct() {
            parent::__construct();

            $this->load->model('assigned_courses_model');
            $this->load->model('semester_model');
            $this->load->model('form_model');
       }

		public function index() {
			if($this->session->userdata('user_type') != 'applicant') {
				redirect('home', 'refresh');
			}

			if($this->semester_model->getCurrentSemesterStatus() != 'NOTIFICATION') {
				$data['message'] = '<p>Applications are still being evaluated</p>';
			} else {
				$semester = $this->semester_model->getCurrentSemester();
				$semester_id = $semester->row()->semester_id;

				$query = $this->form_model->getForm($this->session->userdata('user_id'), $semester_id);

				if($query != FALSE) {
					$query = $this->assigned_courses_model->getByFormId($query->row()->form_id, $semester_id);

					if($query != FALSE) {
						$data['assigned_courses'] = $query->result();
					} else {
						$data['message'] = '<p>You are currently not assigned to any courses</p>';
					}
				} else {
					$data['message'] = '<p>You did not apply to be a TA/PLA for this semester</p>';
				}
			}

			$this->load->view('notifications', $data);
		}
	}
?>