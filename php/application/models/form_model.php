<?php 
    class Form_model extends CI_Model {
        function __construct(){
            parent::__construct();
        }

        public function submitForm($semester_id, $form_data, $user_id, $signature, $date) {
            $sql = 'INSERT INTO form(semester_id, form_data, user_id, signature, signature_date) VALUES(?, ?, ?, ?, ?)';
            
            $this->db->query($sql, array($semester_id, $form_data, $user_id, $signature, $date));

            //Return TRUE on success, FALSE on failure
            if($this->db->affected_rows() == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        public function getForm($user_id, $semester_id) {
            $sql = 'SELECT * from tasub.form WHERE semester_id = ? AND user_id = ?';

            $query = $this->db->query($sql, array($semester_id, $user_id));

            if($query->num_rows() > 0) {
                return $query;
            } else {
                return FALSE; //No form entry with user and semester
            }
        }

        public function editForm($form_id, $semester_id, $signature, $date) {
            $sql = 'UPDATE form SET signature = ?, signature_date = ? WHERE form_id = ? AND semester_id = ?';

            $query = $this->db->query($sql, array($signature, $date, $form_id, $semester_id));

            if($query->affected_rows() == 1) {
                return TRUE;
            } else  {
                return FALSE;
            }
        }
    }
?>