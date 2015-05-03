<?php 
    class Semester_model extends CI_Model {
        function __construct(){
            parent::__construct();
        }

        public function createSemester($semester_title) {
            $sql = 'INSERT INTO tasub.semester(semester_title, status) VALUES (?, (SELECT status_id FROM tasub.status WHERE status_title = "APPLICATION"))';

            $this->db->query($sql, array($semester_title));

            if($this->db->affected_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        public function changeSemester($new_semester_id) {
            $closed_sql = 'UPDATE tasub.semester SET status_id = (SELECT status_id FROM tasub.status WHERE status_title = "CLOSED") WHERE semester_id = ?';
            $open_sql = 'UPDATE tasub.semester SET status_id = (SELECT status_id FROM tasub.status WHERE status_title = "NOTIFICATION") WHERE semester_id = ?';
            $current_semester = $this->getCurrentSemester();

            $query = $this->db->query($closed_sql, array($current_semester->row()->semester_id));
            
            if($this->db->affected_rows() > 0) {
                $query = $this->db->query($open_sql, array($new_semester_id));

                if($this->db->affected_rows() > 0) {
                    return TRUE;
                } else {
                    return FALSE;
                }

            } else {
                return FALSE;
            }
        }

        public function getAll() {
            $sql = 'SELECT * FROM tasub.semester';

            $query = $this->db->query($sql);

            if($query->num_rows() > 0) {
                return $query;
            } else {
                return FALSE;
            }
        }
/*
 * getCurrentSemester() - returns the current semester window for the website
 * input:
 */
        public function getCurrentSemester() {
            //There should only be one semester open at a time
            $sql = 'SELECT * FROM tasub.semester WHERE status = ?
                                                    OR status = ?
                                                    OR status = ?';

            //Since this query is constant we can do it here
            $status_sql = 'SELECT * FROM tasub.status WHERE status_title = "APPLICATION" 
                                                        OR  status_title = "SELECTION"
                                                        OR  status_title = "NOTIFICATION"';

            $status_query = $this->db->query($status_sql);

            if($status_query->num_rows() > 0) { 
                //Add all three status_ids where correspond to being open for query
                $query = $this->db->query($sql, array($status_query->first_row()->status_id, $status_query->next_row()->status_id, $status_query->next_row()->status_id));
            }
            if($query->num_rows() > 0) {
                return $query;
            } else { //Should theoretically never be reached, since but better safe than sorry
                return FALSE;
            }
            
        }// end getCurrentSemester

        public function getCurrentSemesterTitle() {
            $query = $this->getCurrentSemester();

            if($query != FALSE) {
                $title = $this->getSemesterTitle($query->row()->semester_id);
                return $title;
            } else {
                return 'NONE';
            }
        }

        public function getCurrentSemesterStatus() {
            $query = $this->getCurrentSemester();

            if($query != FALSE) {
                $sql = "SELECT status_title FROM tasub.status WHERE status_id = ?";

                $status = $this->db->query($sql, array($query->row()->status));

                return $status->row()->status_title;
            } else {
                return 'NONE';
            }
        }
/*
 * getSemesterTitle() - returns name of semester (ie FALL 2013)
 * input:   $semester_id - id of semester to look up
 */
        public function getSemesterTitle($semester_id) {
            $sql = 'SELECT * FROM tasub.semester WHERE semester_id = ?';

            $query = $this->db->query($sql, array($semester_id));

            if($query->num_rows() > 0) {
                return $query->row()->semester_title;
            } else {
                return FALSE;
            }
        }// end getSemesterTitle
        
/*
 * setTime() - modifies the status of a given semester
 * input:   $semester_id - id of target semester (in relation to semester table)
 *          $status_id - id of new temporal status to assign (in relation to status table)
 */
        public function setTime( $semester_id, $status_id){
        
            $sql = 'update tasub.semester set semester.status = ? where semester.semester_id = ?';
            
            $query = $this->db->query( $sql, array( $status_id, $semester_id) );
            
            // do some sort of error checking down here...
            if( !$query ){
                return false;
            }
            else{
                return true;
            }
            
        }// end setTime()
        
/*
 * getTime() - returns status of a given semester (in semester table), returns false if nothing found
 * input:   $semester_id - id of target semester (in semester table)
 */
        public function getTime( $semester_id ){
        
            $sql = 'select status.status_id from tasub.status join tasub.semester
                where semester.status = status.status_id 
                and semester.semester_id = ? limit 1';
            
            $query = $this->db->query( $sql, array( $semester_id ) );
            
            if($query->num_rows() > 0) {
                return $query;
            } 
            else {
                return FALSE;
            }
            
        }//end getTime()    
            
    }// endSemester_model
?>