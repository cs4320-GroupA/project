<?php 
    class Status_model extends CI_Model {
        function __construct(){
            parent::__construct();
        }

        public function getStatusTitle($id) {
            $sql = 'SELECT status_title FROM tasub.status WHERE status_id = ?';

            $query = $this->db->query($sql, array($id));

            if($query->num_rows() > 0) {
                echo $query->row()->status_title;
                //return $query->row()->status_title;
            } else {
                return FALSE;
            }
        }
    }
?>