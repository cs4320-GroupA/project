<?php

class Submit_model extends CI_Model{

    function __constuct(){
        parent::__construct();
    }
    
    public function submitForm( $fname, $lname, $email, $studentID, $asstType, $expected_grad, $speakOPTscore, $lastTestDate, $advisor, $gpa, $phone, $semester_ID, $user_id, $sub_date ){
        $form_data_sql = 'insert into form_data(
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
        
    	$form_data_result = $this->db->query($form_data_sql, array( $fname, $lname, $email, $studentID, $asstType, $expected_grad, $speakOPTscore, $lastTestDate, $advisor, $gpa, $phone ));
        
        if( !$form_data_result ){
            // query not sucessful
            return -1;
        }
        
        $form_sql = 'insert into form(
            semester_id,
            submission_date,
            form_data,
            user_id
        )values(
            (select semester_id from tasub.semester where semester_id = ? limit 1),
            ?,
            (select form_data_id from tasub.form_data where student_id = ? limit 1),
            ?
        );'
        
            $form_result = $this->db->query($form_sql, array( $semester_ID, $sub_date, $studentID, $user_id ));
        
        if( !$form_result ){
            // query not sucessful
            return -1;
        }
        else
            return 1;
        
    }// end submitForm
    
}// end class

?>