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

		$query = $this->db->query($sql, array($course_id));
            
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

        public function createCourse($course_id,$course_name,$semester,$instructor_id) {
            $sql = 'INSERT into course VALUES (?, ?, ?, ?)';

            $query = $this->db->query($sql, array($course_id,$course_name,$semester,$instructor_id));

            if($query->affected_rows() == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        public function assignCourse($course_id, $course_name, $semester, $instructor_id)
        {
            $sql = 'INSERT into course VALUES (?,?,?,?) WHERE $course_id = ?, $course_name = ?, $semester = ?';

            $query = $this->db-?query($sql, array($course_id, $course_name, $semester, $instructor_id));

            if($query->affected_rows() == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

?>
