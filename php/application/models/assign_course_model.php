<?php 
	
	class Assign_Course_Model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		
		public function insert($couse_id, $couse_name, $form_id, $semester_id){
			$sql = 'INSERT INTO assigned_courses(course_id, course_name, form_id, semester_id) VALUES
			(?, ?, ?, ?)';
			
			$this->db->query($sql, array($course_id, $course_name, $form_id, $semester_id));
			if($this->db->affected_rows() == 1){
				return TRUE; 
			}else{
				return FALSE; 
			}
		}
	}


?>