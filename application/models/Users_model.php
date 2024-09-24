<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public function userValid($username)
    {
        $sql = "SELECT * FROM users WHERE email='$username' OR phone ='$username'";
        $data = $this->db->query($sql);
        return $data->row_array();
    }

    public function userLogin($userid)
    {
        $sql = "SELECT * FROM users U LEFT JOIN role R ON U.id_role=R.id_role WHERE U.id_users =$userid";
        $data = $this->db->query($sql);
        return $data->row();
    }
    public function logActivity()
    {
        $sql = "SELECT *, SUBSTRING_INDEX(comment, '-', 1) AS IP , U.email As Email 
                FROM logger L 
                LEFT JOIN users U 
                ON L.created_by=U.id_users ORDER BY L.created_on DESC";
        $data = $this->db->query($sql);
        return $data->result_array();
    }
    public function sumActivity()
    {
        $sql = "SELECT type AS Activity,type_id AS TypeId ,count(*) AS Amount FROM logger WHERE DATE(created_on) = CURDATE() GROUP BY Activity;";
        $data = $this->db->query($sql);
        return $data->result_array();
    }
    public function sumNotif()
    {
        $sql = "SELECT count(*) AS Amount,DATE_FORMAT(created_on, '%Y-%m-%d') AS Date  FROM logger WHERE DATE(created_on) = CURDATE()";
        $data = $this->db->query($sql);
        return $data->row_array();
    }

}
