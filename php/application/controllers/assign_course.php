<?php 
//assign course controller

/*
	This is going to queue the database for courses that have the same course_id as the 
	applicants desired course_id. That way, it allows the admin to see all the
	applicants that are wanting to TA for a given class. 
	
	Selecting course 'a' for example, would ask the database for all courses with id 'a'. 
	
	Let's rethink this idea; 
	we have a list of courses, clicking on each one should load the applicants that
	are interested in TA'ing for each course. 
	
	This should work by, on course click, it gets the course by id, and loads in the desired applicants. 
	
	Simple enough; I believe. 
	
*/


	class Assign_Course_Controller extends CI_Controller{
		public function __construct(){
			parent::__construct();
		}
		
		public function getCourses($course_name){
			$this->load->model("assign_course");
			$result = $this->assign_course->getCourseID($couse_name);
			//get course id from result array
			$course_id = $result['course_id'];
			
			$applicants = getApplicantsForCourse($course_id);
			return $applicants; 
		}
		
		public function getApplicantsForCourse($couse_id){
			$this->load->model("assign_course");
			$result = $this->assign_course->getCourseWithID($course_id);
			//return this entire array
			
			if(!$result){
				return FALSE; 
			}else{
				return $result; 
			}
		}
	}

?>