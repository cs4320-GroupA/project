<?php

class User_model extends CI_Model {
	var user_id;
	var first_name = '';
	var last_name = '';
	var mizzou_email = '';
	var type = '';
	var username = '';
	var password = '';
	var salt = '';
	var account_type = '';

	function __construct() {
		parent::__construct();
	}

	function login() {
		$this->username = $_POST['username'];
		$this->password = $_POST['password'];

		$sql = 'SELECT * FROM tasub.user WHERE username = "'.$this->username.'"';
		$login_query = $this->db->query($sql);

		//This implementation needs to add the salt and hash before testing, but for testing all passwords are pass
		$row = $query->row();
		if(strcmp($row['password'], $this->password) == 0) {
			return TRUE; 
		} else {
			return FALSE;
		}
	}

}
??