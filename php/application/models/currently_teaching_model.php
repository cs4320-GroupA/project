<?php 
    class Currently_Teaching_model extends CI_Model {
        function __construct(){
            parent::__construct();
        }

        public function insert($course_id, $course_name, $form_data_id) {
            $sql = 'INSERT INTO currently_teaching(course_id, course_name, form_data_id) VALUES (?, ?, ?)';

            $this->db->query($sql, array($course_id, $course_name, $form_data_id));

            if($this->db->affected_rows() == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
?>