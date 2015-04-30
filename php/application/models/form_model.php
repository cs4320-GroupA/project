<?php 
    class Form_model extends CI_Model {
        function __construct(){
            parent::__construct();
        }
    
    /*
     * submitForm() - create form entity in form table
     * input:   $semester_id - semester of form to submit (should be hardcoded to 1?)
     *          $form_data - id for corresponding entry in form_data, contains specific form entry info
     *          $user_id - id of applciant owning the form
     *          $signature - full name of the applicant
     *          $date - date of signature submit
     */
        public function submitForm($semester_id, $form_data, $user_id, $signature, $date) {
            $sql = 'INSERT INTO form(semester_id, form_data, user_id, signature, signature_date) VALUES(?, ?, ?, ?, ?)';
            
            $this->db->query($sql, array($semester_id, $form_data, $user_id, $signature, $date));

            //Return TRUE on success, FALSE on failure
            if($this->db->affected_rows() == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        public function getByFormDataID($form_data_id) {
            $sql = 'SELECT * FROM tasub.form WHERE form_data = ?';

            $query = $this->db->query($sql, array($form_data_id));

            //Return TRUE on success, FALSE on failure
            if($query->num_rows() > 0) {
                return $query->row();
            } else {
                return FALSE;
            }
        }

    
    /*
     * getForm() - retrieves all entities for a given form
     * input:   $user_id - user to select
     *          $semester_id - which form version to get (semester 1 should be hardcoded in for now)
     */
        public function getForm($user_id, $semester_id) {
            $sql = 'SELECT * from tasub.form WHERE semester_id = ? AND user_id = ?';

            $query = $this->db->query($sql, array($semester_id, $user_id));

            if($query->num_rows() > 0) {
                return $query;
            } else {
                return FALSE; //No form entry with user and semester
            }
        }
    
    /*
     * editForm() - update entries in form table
     * input:   $form_id - id of user's form
     *          $semester_id - semester id (in relation to semester table) - should be 1 for now
     *          $signature - full name of user
     *          $date - date of when signature was made (date at time of edit?)
     */
        public function editForm($form_id, $semester_id, $signature, $date) {
            $sql = 'UPDATE form SET signature = ?, signature_date = ? WHERE form_id = ? AND semester_id = ?';

            $query = $this->db->query($sql, array($signature, $date, $form_id, $semester_id));

            if($this->db->affected_rows() == 1) {
                return TRUE;
            } else  {
                return FALSE;
            }
        }
    
    /*
     * getAllBySemesterId() - retrieve all entities matching a given semester
     * input:   $semester_id - id of semester (semester table) to run applicants against
     */
        public function getAllBySemesterId($semester_id) {
            $sql = 'SELECT * FROM tasub.form INNER JOIN tasub.form_data ON tasub.form.form_data = tasub.form_data.form_data_id WHERE semester_id = ?';
            
            $query = $this->db->query($sql, array($semester_id));

            return $query->result();
        }
    }
?>