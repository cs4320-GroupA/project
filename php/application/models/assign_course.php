<?php
//assign course model
//dont need this, since other models already exist to do what
//i need it to do

	class Assign_Course_Model extends CI_Model{
		function construct(){
			parent::__construct();
		}
		
		public function getCourseID($course_name){
			$sql = 'SELECT * FROM desired_course WHERE course_name = ?';
			
			$query = $this->db->query($sql, array($course_name));
			
			if($query->num_rows() == 1){
				//meaning only one course was returned
				return $query; 
			}else{
				return FALSE; 
			}
		}
		
		public function getCoursesWithID($desired_id){
			$sql = 'SELECT * FROM desired_courses WHERE course_id = ?'; 
			
			$query = $this->db->query($sql, array($desired_id));
			
			if($query->num_rows() > 0){
				return $query; 
			}else{
				return FALSE; 
			}
		}
	}
?>