<?php 
    class Comments_model extends CI_Model {
        function __construct(){
            parent::__construct();
        }

        public function insert($posted_about_id, $posted_by_id, $pawprint, $score, $description) {
            $sql = 'INSERT into tasub.comments(posted_by, posted_about, posted_by_pawprint, score, description) VALUES(?, ?, ?, ?, ?)';

            $query = $this->db->query($sql, array($posted_by_id, $posted_about_id, $pawprint, $score, $description));
        }

        public function getAllByUser($user_id) {
            $sql = 'SELECT * FROM tasub.comments WHERE posted_about = ?';

            $query = $this->db->query($sql, array($user_id));

            return $query;
        }
    }
?>