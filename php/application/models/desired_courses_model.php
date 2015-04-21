<?php 
    class Desired_Courses_model extends CI_Model {
        function __construct(){
            parent::__construct();
        }

        public function insert($course_id, $course_name, $form_data_id, $grade) {
            $sql = 'INSERT INTO desired_courses(course_id, course_name, form_data_id, grade) VALUES (?, ?, ?, ?)';

            $this->db->query($sql, array($course_id, $course_name, $form_data_id, $grade));

            if($this->db->affected_rows() == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        public function update($id, $grade) {
            $sql = 'UPDATE desired_courses SET grade = ? WHERE desired_courses_id = ?';

            $this->db->query($sql, array($id, $grade));

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
                return $query;
            } else {
                return FALSE;
            }
        }
    }
?>