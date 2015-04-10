<?php

class Submit_model extends CI_Model{

    function __constuct(){
        parent::__construct();
    }
    
    public function submitForm( $fname, $lname, $email, $studentID, $asstType, $expected_grad, $speakOPTscore, $lastTestDate, $advisor, $gpa, $phone ){
        $sql = 'insert into form_data(
                first_name, 
                last_name, 
                mizzou_email, 
                student_id, 
                assistant_type, 
                expected_graduation,        
                SPEAK_OPT_score, 
                last_date_of_test,
                advisor, 
                gpa, 
                phone_number
            ) values ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        
    	$result = $this->db->query($sql, array( $fname, $lname, $email, $studentID, $asstType, $expected_grad, $speakOPTscore, $lastTestDate, $advisor, $gpa, $phone ));    
        
    }
    
}

?>