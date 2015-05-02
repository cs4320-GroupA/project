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
            $sql = 'SELECT * from tasub.course INNER JOIN tasub.user ON tasub.course.instructor_id = tasub.user.user_id WHERE tasub.course.instructor_id = ?';
            
            $query = $this->db->query($sql, array($user_id));

            if($query->num_rows() > 0) {
                return $query;
            } else {
                return FALSE; //No courses found
            }
        }

    /*
     * getCourseById() - returns all information concerning a given course id
     * input:   $courseId - unique course id
     */
        public function getCourseById( $courseId ){
            $sql = 'select * from tasub.course where course_id = ?';
            
            $query = $this->db->query( $sql, array($courseId) );
            
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
     *
        public function editCourse($course_id,$course_name,$semester,$instructor_id) {
            $retrieveQuery = "UPDATE FROM course SET course_name = ?, semester = ?, instructor_id = ? WHERE course_id = ?";			

            $query = $this->db->query($sql, array($course_name,$semester,$instructor_id,$course_id));

            if($this->db->affected_rows() == 1) {
                    return TRUE;
                } else {
                    return FALSE;
                }
        } end editCourse() 

	Not sure why this version was commented out?
	*/	

	public function editCourse($course_id,$course_name,$semester) {
		$retrieveQuery = "UPDATE course SET course_name = ?, semester = ? WHERE course_id = ?";			

        $query = $this->db->query($retrieveQuery, array($course_name,$semester,$course_id));
		
		if($this->db->affected_rows() == 1) {
		        return TRUE;
		    } else {
		        return FALSE;
		    }
	}

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
     * getPreferenceByInstructor() - returns all preferences in courses owned by a given instructor
     * input:   $instruct_Id - instructor to query
     */
        public function getPreferenceByInstructor($instruct_Id){
            $q = 'SELECT * FROM tasub.course_preference INNER JOIN tasub.course ON tasub.course_preference.course_id = tasub.course.course_id WHERE tasub.course.instructor_id = ?';
            $result = $this->db->query( $q, array($instruct_Id) );
            
            if($result->num_rows() > 0) {
                return $result;
            }
            else{
                return FALSE;
            }
            
        }// end getPreferenceByInstructor
      
    /*
     * getPreferenceByForm() - returns course preference by form ID
     * input:   $form_id - form to query
     */
        public function getPreferenceByForm( $form_id ){
            $q = 'select f.signature, cp.course_id, c.course_name, u.username 
                from form f, course_preference cp, course c, user u 
                where cp.course_id = c.course_id 
                    and c.instructor_id = u.user_id 
                    and f.form_id = cp.form_id
                and cp.form_id = ?';
            $result = $this->db->query($q, array($form_id));
            
            if( $result->num_rows() > 0 ){
                return $result;
            }
            else{
                return false;
            }
            
        }// end getPreferenceByForm
        
    /*
     * getPreferenceByCourse() - returns all preferences to a given course
     * input:   $course_id - course to query
     */
        public function getPreferenceByCourse( $course_Id ){
            $q = 'SELECT * FROM tasub.course_preference INNER JOIN tasub.form ON tasub.form.form_id = tasub.course_preference.form_id INNER JOIN tasub.form_data ON tasub.form_data.form_data_id = tasub.form.form_data WHERE tasub.course_preference.course_id = ?';     
            $result = $this->db->query( $q, array( $course_Id ) );
            
            if( $result->num_rows() > 0 ){
                return $result;
            }
            else{
                return false;
            }
            
        }//  end getPreferenceByCourse
        
        public function getPreferenceByCourseAndRank($course_id, $rank) {
          $sql = 'SELECT * FROM tasub.course_preference WHERE course_id = ? AND preference_number = ?';
          $query = $this->db->query($sql, array($course_id, $rank);

          if($query->num_rows() > 0) {
            return $query;
          } else {
            return FALSE;
          }
        }

        public function editPreference($preference_id, $form_id, $rank) {
          $sql = 'UPDATE tasub.course_preference SET form_id = ?, preference_number = ? WHERE preference_id = ?';
          $query = $this->db->query($sql, array($form_id, $rank, $preference_id);

          if($this->db->affected_rows() > 0) {
            return TRUE;
          } else {
            return FALSE;
          }
        }
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
