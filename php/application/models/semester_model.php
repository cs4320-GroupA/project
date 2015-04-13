<?php 
    class Semester_model extends CI_Model {
        function __construct(){
            parent::__construct();
        }

        public function getCurrentSemester() {
            //There should only be one semester open at a time
            $sql = 'SELECT * FROM tasub.semester WHERE status_id = ?
                                                    OR status_id = ?
                                                    OR status_id = ?';

            //Since this query is constant we can do it here
            $status_sql = 'SELECT * FROM tasub.status WHERE status_title = "APPLICATION" 
                                                        OR  status_title = "SELECTION"
                                                        OR  status_title = "NOTIFICATION"';

            $status_query = $this->db->query($status_sql);

            if($status_query->num_rows() > 0) { 
                //Add all three status_ids where correspond to being open for query
                $query = $this->db->query($sql, array($status_query->first_row()->status_id, $status_query->next_row()->status_id, $status_query->next_row()->status_id));

                if($query->num_rows() > 0) {
                    return $query;
                } else {
                    return FALSE; //No current semesters
                }
            } else { //Should theoretically never be reached, since but better safe than sorry
                return FALSE;
            }
        }
    }
?>