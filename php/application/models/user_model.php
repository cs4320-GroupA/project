<?php

class User_model extends CI_Model {
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

	public function register($username, $password, $salt, $account_type) {
		$sql = 'INSERT INTO user (username, password, salt, account_type) VALUES (?, ?, ?, SELECT account_type_id FROM tasub.account_type WHERE account_type_name = ?)';
		return($this->db->query($sql, array($username, $password, $salt, $account_type));
	}
?>