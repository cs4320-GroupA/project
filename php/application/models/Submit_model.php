<?php

class Submit_model extends CI_Model{

    function __constuct(){
        parent::__construct();
    }
    
    public function submitForm( $fname, $lname, $email, $studentID, $asstType, $expected_grad, $speakOPTscore, $lastTestDate, $advisor, $gpa, $phone, $semester_ID, $user_id, $sub_date ){
        
        /*
         * First need to add data into form_data table
         */
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
        
        /*
         * excecute query, add entry into the form_data table
         */
    	$form_data_result = $this->db->query($form_data_sql, array( $fname, $lname, $email, $studentID, $asstType, $expected_grad, $speakOPTscore, $lastTestDate, $advisor, $gpa, $phone ));
        
        /*
         * check for query failures. If so, return -1 early
         */
        if( !$form_data_result ){
            // query not sucessful
            return -1;
        }
        
        /*
         * Now need to add data into form table
         */
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
        )';
        
        /*
         *  excecute query, add entry into the form table
         */
        $form_result = $this->db->query($form_sql, array( $semester_ID, $sub_date, $studentID, $user_id ));
        
        // free memory
        mysql_free_result($form_data_result);
        mysql_free_result($form_result);
        
        /*
         *  check for failures
         */
        if( !$form_result ){
            // query not sucessful
            return -1;
        }
        else
            return 1;
        
    }// end submitForm
    
}// end class

?>