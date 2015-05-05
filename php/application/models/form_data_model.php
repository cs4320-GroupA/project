<?php 
    class Form_Data_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

        public function submitFormData($asstType, $fname, $lname, $email, $studentID, $gpa, $expected_grad, $phone, 
                                       $gato, $department, $grade, $advisor, $speakOPTscore, $lastTestDate, $onita, 
                                       $other_work, $semester, $graduate_type, $speak_assessment) {

            $form_data_sql = 'insert into form_data(
                first_name, 
                last_name, 
                mizzou_email, 
                student_id, 
                assistant_type,
                semester, 
                expected_graduation,
                grade,        
                SPEAK_OPT_score,
                department,
                advisor,
                gpa,
                phone_number, 
                last_date_of_test,
                grad_type,
                other_work,
                gato,
                speak_assessment,
                onita
            ) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        
            $form_data_result = $this->db->query($form_data_sql, array($fname, $lname, $email, $studentID, $asstType, $semester, $expected_grad, $grade,
                                                                       $speakOPTscore, $department, $advisor, $gpa, $phone, $lastTestDate, $graduate_type, 
                                                                       $other_work, $gato, $speak_assessment, $onita));
        
            //Return TRUE on success, FALSE on failure
            if($this->db->affected_rows() > 0) {
                $sql = 'SELECT * FROM tasub.form_data WHERE first_name = ? AND last_name = ? AND mizzou_email = ? AND student_id = ? AND assistant_type = ? AND semester = ?)';

                $query = $this->db->query($sql, array($fname, $lname, $email, $studentID, $asstType, $semester));

                if($query->num_rows() > 0) {
                    return $query->row()->form_data_id;
                } else {
                    return FALSE;
                }
            } else {
                return FALSE;
            }
        }

        public function editFormData($form_data_id, $asstType, $fname, $lname, $email, $studentID, $gpa, $expected_grad, $phone, 
                                       $gato, $department, $grade, $advisor, $speakOPTscore, $lastTestDate, $onita, 
                                       $other_work, $semester, $graduate_type, $speak_assessment) {
            
            $form_data_sql = 'UPDATE form_data SET
                first_name = ?, 
                last_name = ?, 
                mizzou_email = ?, 
                student_id = ?, 
                assistant_type = ?,
                semester = ?, 
                expected_graduation = ?,
                grade = ?,        
                SPEAK_OPT_score = ?,
                department = ?,
                advisor = ?,
                gpa = ?,
                phone_number = ?, 
                last_date_of_test = ?,
                grad_type = ?,
                other_work = ?,
                gato = ?,
                speak_assessment = ?,
                onita = ?
                WHERE form_data_id = ?';
        
            $form_data_result = $this->db->query($form_data_sql, array($fname, $lname, $email, $studentID, $asstType, $semester, $expected_grad, $grade,
                                                                       $speakOPTscore, $department, $advisor, $gpa, $phone, $lastTestDate, $graduate_type, 
                                                                       $other_work, $gato, $speak_assessment, $onita, $form_data_id));
        
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

        public function getAllBySemester($semester) {
            $sql = 'SELECT * FROM tasub.form_data WHERE semester = ?';

            $query = $this->db->query($sql, array($semester));

            return $query->result();
        }
    }
?>
