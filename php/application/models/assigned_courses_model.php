<?php 
	
	class Assigned_Courses_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		
		public function insert($course_id, $course_name, $form_id, $semester_id){
			$sql = 'INSERT INTO assigned_courses(course_id, course_name, form_id, semester_id) VALUES
			(?, ?, ?, ?)';
			
			$this->db->query($sql, array($course_id, $course_name, $form_id, $semester_id));
			if($this->db->affected_rows() == 1){
				return TRUE; 
			}else{
				return FALSE; 
			}
		}

		public function getAssignedApplicants($course_id, $semester_id) {
			$sql = 'SELECT * FROM tasub.assigned_courses INNER JOIN tasub.form ON tasub.form.form_id = tasub.assigned_courses.form_id WHERE tasub.assigned_courses.course_id = ? AND tasub.assigned_courses.semester_id = ?';

			$query = $this->db->query($sql, array($course_id, $semester_id));

			if($query->num_rows() > 0) {
				return $query;
			} else {
				return FALSE;
			}
		}
	}


?>