<?php

class Retrieve_Model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    /*
     * get form data from supplied formID...
     */
    public function getFormByID( $formID ){
        $sql = 'select form.form_id, 
                form.semester_id, 
                form.submission_date, 
                form.user_id, 
                form_data.first_name, 
                form_data.last_name, 
                form_data.mizzou_email, 
                form_data.student_id, 
                form_data.assistant_type, 
                form_data.expected_graduation, 
                form_data.SPEAK_OPT_score, 
                form_data.advisor, 
                form_data.gpa, 
                form_data.phone_number, 
                form_data.last_date_of_test 
            from tasub.form
            inner join tasub.form_data on form.form_id = form_data.form_data_id 
            where form_data.form_data_id = ?';
        
        $result = $this->db->query( $sql, array( $formID ) );
        
        if( !$result ){
            // query not sucessful
            exit;
        }
        
        $return_array = array();
        
        $row = mysql_fetch_assoc( $result );
        
        // throwing this all into a separate array might be redundant...
        $return_array["form_id"] = $row["form_id"];
        $return_array["semester_id"] = $row["semester_id"];
        $return_array["submission_date"] = $row["submission_date"];
        $return_array["user_id"] = $row["user_id"];
        $return_array["first_name"] = $row["first_name"];
        $return_array["last_name"] = $row["last_name"];
        $return_array["mizzou_email"] = $row["mizzou_email"];
        $return_array["student_id"] = $row["student_id"];
        $return_array["assistant_type"] = $row["assistant_type"];
        $return_array["expected_graduation"] = $row["expected_graduation"];
        $return_array["SPEAK_OPT_score"] = $row["SPEAK_OPT_score"];
        $return_array["advisor"] = $row["advisor"];
        $return_array["gpa"] = $row["gpa"];
        $return_array["phone_number"] = $row["phone_number"];
        $return_array["last_date_of_test"] = $row["last_date_of_test"];
        
        // free memory
        mysql_free_result($result);
        
        return $return_array;
        
        // this might be easier?
        // return $row;
        
    }
    
    public function getFormByUser( $student_id ){
        $sql = 'select form.form_id, 
                form.semester_id, 
                form.submission_date, 
                form.user_id, 
                form_data.first_name, 
                form_data.last_name, 
                form_data.mizzou_email, 
                form_data.student_id, 
                form_data.assistant_type, 
                form_data.expected_graduation, 
                form_data.SPEAK_OPT_score, 
                form_data.advisor, 
                form_data.gpa, 
                form_data.phone_number, 
                form_data.last_date_of_test 
            from tasub.form
            inner join tasub.form_data on form.form_id = form_data.form_data_id 
            where form_data.form_data_id = ?';
        
        $result = $this->db->query( $sql, array( $student_id ) );
        
        if( !$result ){
            // query not sucessful
            return -1;
        }
        
        $return_array = array();
        
        $row = mysql_fetch_assoc( $result );
        
        // throwing this all into a separate array might be redundant...
        $return_array["form_id"] = $row["form_id"];
        $return_array["semester_id"] = $row["semester_id"];
        $return_array["submission_date"] = $row["submission_date"];
        $return_array["user_id"] = $row["user_id"];
        $return_array["first_name"] = $row["first_name"];
        $return_array["last_name"] = $row["last_name"];
        $return_array["mizzou_email"] = $row["mizzou_email"];
        $return_array["student_id"] = $row["student_id"];
        $return_array["assistant_type"] = $row["assistant_type"];
        $return_array["expected_graduation"] = $row["expected_graduation"];
        $return_array["SPEAK_OPT_score"] = $row["SPEAK_OPT_score"];
        $return_array["advisor"] = $row["advisor"];
        $return_array["gpa"] = $row["gpa"];
        $return_array["phone_number"] = $row["phone_number"];
        $return_array["last_date_of_test"] = $row["last_date_of_test"];
        
        // free memory
        mysql_free_result($result);
        
        return $return_array;
        
        // this might be easier?
        // return $row;
    }

}

?>