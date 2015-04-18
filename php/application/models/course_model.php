<?php 
    class Course_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }
        
        public function getCourses() {
            $sql = 'SELECT * FROM tasub.course';

            $query = $this->db->query($sql);
            
            if($query->num_rows() > 0){
                return $query;
            } else{
                return FALSE; //No courses found
            }
        }

	public function removeCourse($course_id) {
		$sql = 'DELETE FROM course WHERE course_id = ?'; 

		$query = $this->db->query($sql, array($course));
            
	        if($query->affected_rows() == 1){
	           return TRUE;
	        } else{
	           return FALSE; //No courses found
	        }
	}
        
        public function getCoursesByInstructor($user_id) {
            $sql = 'SELECT * FROM tasub.course WHERE instructor_id = ?';
            
            $query = $this->db->query($sql, array($user_id));

            if($query->num_rows() > 0) {
                return $query;
            } else {
                return FALSE; //No courses found
            }
        }

        public function createCourse($course_name) {
            $sql = 'INSERT into course (course_name) VALUES (?)';

            $query = $this->db->query($sql, array($course_name));

            if($query->affected_rows() == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

?>
