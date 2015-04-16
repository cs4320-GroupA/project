<?php 
    class Form_model extends CI_Model {
        function __construct(){
            parent::__construct();
        }

        public function submitForm($semester_id, $form_data, $user_id, $signature) {
            $sql = 'INSERT INTO form(semester_id, submission_date, form_data, user_id, signature, signature_date) VALUES(?, ?, ?, ?, ?, ?)';
            
            $mysqldate = date('Y-m-d', $date);
            $date = strtotime($mysqldate);
            
            $this->db->query($sql, array($semester_id, $date, $form_data, $user_id, $signature, $mysqldate));

            //Return TRUE on success, FALSE on failure
            if($this->db->affected_rows() == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        public function getForm($user_id, $semester_id) {
            $sql = 'SELECT * from tasub.form_data WHERE semester_id = ? AND user_id = ?';

            $query = $this->db->query($sql, array($semester_id, $user_id));

            if($query->num_rows() > 0) {
                return $query;
            } else {
                return FALSE; //No form entry with user and semester
            }
        }
    }
?>