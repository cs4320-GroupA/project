<?php 
    class Desired_Courses_model extends CI_Model {
        function __construct(){
            parent::__construct();
        }

        public function insert($course_id, $course_name, $form_data_id) {
            $sql = 'INSERT INTO desired_courses(course_id, course_name, form_data_id) VALUES (?, ?, ?)';

            $this->db->query($sql, array($course_id, $course_name, $form_data_id));

            if($this->db->affected_rows() == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        public function checkForEntry($course_id, $course_name, $form_data_id) {
            $sql = 'SELECT * FROM tasub.desired_courses WHERE course_id = ? AND course_name = ? AND form_data_id = ?';

            $query = $this->db->query($sql, array($course_id, $course_name, $form_data_id));

            if($query->num_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
?>