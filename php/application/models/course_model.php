<?php 
    class Course_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }
        
        public function getCourses() {
            $sql = 'SELECT * FROM tasub.course INNER JOIN tasub.user ON tasub.course.instructor_id = tasub.user.user_id ORDER BY tasub.course.course_name';

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
            
	    if($this->db->affected_rows() == 1){
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

            if($this->db->affected_rows() == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        public function assignCourse($course_id, $instructor_id)
        {
            $sql = 'UPDATE course SET instructor_id = ? WHERE course_id = ?';

            $query = $this->db->query($sql, array($instructor_id, $course_id));

            if($this->db->affected_rows() == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        public function getCourseByName($course_name) {
            $sql = 'SELECT * FROM tasub.course WHERE course_name = ?';

            $query = $this->db->query($sql, array($course_name));

            if($query->num_rows() > 0) {
                return $query;
            } else {
                return FALSE;
            }
        }


	public function editCourse($course_id,$semester,$instructor_oid) {
		$retrieveQuery = "UPDATE FROM course SET course_name = ?, semester = ?, instructor_id = ? WHERE course_id = ?";			
            	$query = $this->db->query($sql, array($course_id));
		$editQuery = NULL;
	} 	
        
 /*
  * not 100% sure this needs to go here, this function may better belong
  * in a different file(?)
  */
        public function createPreference( $course_id, $course_name, $form_id, $semester_id, $preference_number ){
            $q = 'insert into course_preference (
                    course_id,
                    course_name,
                    form_id,
                    semester_id,
                    preference_number
                ) values(
                    ?, ?, ?, ?, ?
                )';

            $result = $this->db->query( $q, array( $course_id, $form_id, $semester_id, $preference_number ));

            // needto varify outputs here
        
            if($result == TRUE){
                return true;
            } else{
                return false;
            }
        }// end createPreference
    
    
    
    }// end CI_Model

?>
