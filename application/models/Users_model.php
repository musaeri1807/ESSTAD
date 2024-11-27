<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public function userValid($username)
    {
        $sql = "SELECT * FROM users WHERE email='$username' OR phone ='$username'";
        // $sql = "SELECT id_users,name_users,email,phone,is_active FROM users 
        //         WHERE email='$username' OR phone ='$username'";
        $data = $this->db->query($sql);
        return $data->row_array();
    }

    public function userLogin($userid)
    {
        $sql = "SELECT * FROM users U LEFT JOIN role R ON U.id_role=R.id_role WHERE U.id_users =$userid";
        $data = $this->db->query($sql);
        return $data->row_array();
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
    public function histroiMutasi($id)
    {
        $sql    = "SELECT 
        field_id_saldo AS id,
        field_no_referensi AS noreferensi,
        field_tanggal_saldo AS tanggal,       
        field_type_saldo AS type,
        field_kredit_saldo AS kredit,
        field_debit_saldo AS debit,
        field_total_saldo AS saldo,
        field_status AS status,
        field_comments AS keterangan       
        FROM tbltrxmutasisaldo S WHERE S.field_member_id='{$id}' ORDER BY S.field_id_saldo DESC";
        $data   = $this->db->query($sql);
        return $data->result_array();
    }
    public function sumSaldo($id)
    {
        $sql = "SELECT field_rekening AS account_id ,field_total_saldo AS saldo				
		FROM tbltrxmutasisaldo S 		
		WHERE S.field_member_id='{$id}' ORDER BY S.field_id_saldo DESC LIMIT 1";
        $data = $this->db->query($sql);
        return $data->row_array();
    }
}
