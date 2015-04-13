<?php 
    class Form_Data_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

        public function submitFormData( $fname, $lname, $email, $studentID, $asstType, $expected_grad, $speakOPTscore, $lastTestDate, $advisor, $gpa, $phone){
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
        
            $form_data_result = $this->db->query($form_data_sql, array( $fname, $lname, $email, $studentID, $asstType, $expected_grad, $speakOPTscore, $lastTestDate, $advisor, $gpa, $phone));
        
            //Return TRUE on success, FALSE on failure
            if($this->db->affected_rows() == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        public function getFormDataByID($formDataID) {
            $sql = 'SELECT * from tasub.form_data WHERE form_data_id = ?';

            $query = $this->db->query($sql, array($formDataID));

            if($query->num_rows() > 0) {
                return $query;
            } else {
                return FALSE; //No form data entry with id passed in
            }
        }
    }
?>
