<?php

class User_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function login($username) {
		$sql = 'SELECT * FROM tasub.user WHERE username = ?';
		$query = $this->db->query($sql, array($username));

		if($query->num_rows() > 0) {
			return $query->row(); 
		} else {
			return FALSE;
		}
	}

	public function register($username, $password, $salt, $account_type) {
		$sql = 'INSERT INTO user (username, password, salt, account_type) VALUES (?, ?, ?, ?)';
		$type_sql = 'SELECT account_type_id FROM tasub.account_type WHERE account_type_name = ?';
		
		$query = $this->db->query($type_sql, array($account_type));
		$type_id = $query->row()->account_type_id;
		$query = $this->db->query($sql, array($username, $password, $salt, $type_id));

		return $this->db->affected_rows();
	}
}
?>