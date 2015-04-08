<?php

class Account_Type_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function getAccountType($id) {
		$sql = 'SELECT account_type_name FROM tasub.account_type WHERE account_type_id = ?';
		
		$query = $this->db->query($type_sql, array($id));

		return $query->row()->account_type_name;
	}
}
?>