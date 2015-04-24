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

        public function createCourse($course_name,$semester,$instructor_id) {
            $sql = 'INSERT into course(course_name, semester, instructor_id) VALUES (?, ?, ?)';

            $query = $this->db->query($sql, array($course_name,$semester,$instructor_id));

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
        }// end getCourseByName

    /*
     * editCourse() - update course information
     * input:   $course_id - new course id to set
     *          $course_name - new course name (corresponding to course_id) to set
     *          $semester - new semester to set
     *          $instructor_id - instructor to set
     */
        public function editCourse($course_id,$course_name,$semester,$instructor_id) {
            $retrieveQuery = "UPDATE FROM course SET course_name = ?, semester = ?, instructor_id = ? WHERE course_id = ?";			

            $query = $this->db->query($sql, array($course_name,$semester,$instructor_id,$course_id));

            if($this->db->affected_rows() == 1) {
                    return TRUE;
                } else {
                    return FALSE;
                }
        }// end editCourse()

    /*
     * getCourseById() - return all information (including instructor info) from user and course matching a give course id
     * input:   $course_id - course to search
     */
        public function getCourseById($course_id) {
            $sql = 'SELECT * FROM tasub.course INNER JOIN tasub.user ON tasub.course.instructor_id = tasub.user.user_id WHERE course_id = ?';

            $query = $this->db->query($sql, array($course_id));

            if($query->num_rows() > 0) {
                return $query;
            } else {
                return FALSE;
            }
        }// end getCourseById()

    /*
     * createPreference() - create a preference between applicant and course
     * input:  $course_id - id of course to bind
     *         $course_name - corresponding course name
     *         $form_id - id of applicant's form
     *         $semester_id - which semester version of form to use (should be hardcoded to 1 for now?)
     *         $preference_number - preference rank set by instructor(?)
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

            $result = $this->db->query( $q, array(
                $course_id,
                $course_name,
                $form_id, 
                $semester_id, 
                $preference_number
            ));

            // needto varify outputs here
        
            if($result == TRUE){
                return true;
            } else{
                return false;
            }
        }// end createPreference
    
    /*
     * removePreference() - remove a preference between applicant and course
     * input:  $course_id - id of course to remove
     *         $form_id - id of applicant's form
     *         $semester_id - which semester version of form to use (should be hardcoded to 1 for now?)
     */
        public function removePreference( $course_id, $form_id, $semester_id ){
            $q = 'delete from course_preference where course_id = ? and form_id = ? and semester_id = ?';

            $result = $this->db->query( $q, array(
                $course_id, 
                $form_id, 
                $semester_id, 
            ));

            // needto varify outputs here
        
            if($result == TRUE){
                return true;
            } else{
                return false;
            }
        }// end createPreference
        
    /*
     * removePreference() - remove a preference between applicant and course using preference id
     * input:  $preference_id
     */
        public function removePreferenceByyId( $preference_id ){
            $q = 'delete from course_preference where preference_id = ?';

            $result = $this->db->query( $q, array( $preference_id ));

            // needto varify outputs here
        
            if($result == TRUE){
                return true;
            } else{
                return false;
            }
        }// end createPreference  
        
    }// end CI_Model

?>
