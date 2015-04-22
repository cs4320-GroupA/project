<?php 
    class Previous_Taught_model extends CI_Model {
        function __construct(){
            parent::__construct();
        }

        public function insert($course_id, $course_name, $form_data_id) {
            $sql = 'INSERT INTO previous_taught(course_id, course_name, form_data_id) VALUES (?, ?, ?)';

            $this->db->query($sql, array($course_id, $course_name, $form_data_id));

            if($this->db->affected_rows() == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        public function checkForEntry($course_id, $course_name, $form_data_id) {
            $sql = 'SELECT * FROM tasub.previous_taught WHERE course_id = ? AND course_name = ? AND form_data_id = ?';

            $query = $this->db->query($sql, array($course_id, $course_name, $form_data_id));

            if($query->num_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        public function getAll($form_data_id) {
            $sql = 'SELECT * FROM tasub.previous_taught WHERE form_data_id = ?';

            $query = $this->db->query($sql, array($form_data_id));

            if($query->num_rows() > 0) {
                return $query->result();
            } else {
                return FALSE;
            }
        }

        public function delete($id, $course_id, $course_name, $form_data_id) {
            $sql = 'DELETE FROM tasub.previous_taught WHERE currently_teaching_id = ? AND course_id = ? AND $course_name = ? AND form_data_id = ?';

            $query = $this->db->query($sql, array($id, $course_id, $course_name, $form_data_id));

            if($this->db->affected_rows > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
?>