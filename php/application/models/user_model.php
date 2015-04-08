<?php

class User_model extends CI_Model {
	var $user_id;
	var $first_name = '';
	var $last_name = '';
	var $mizzou_email = '';
	var $type = '';
	var $username = '';
	var $password = '';
	var $salt = '';
	var $account_type = '';

	function __construct() {
		parent::__construct();
	}

	public function login() {
		$this->username = $_POST['pawprint'];

		$sql = 'SELECT * FROM tasub.user WHERE username = ?';
		$query = $this->db->query($sql, array($this->username));

		if($query->num_rows() == 1) {
			return $query->row(); 
		} else {
			return FALSE;
		}
	}
}
?>