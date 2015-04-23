<?php
    class temporal_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
        }// end construct()
        
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
        
    }// end class
?>