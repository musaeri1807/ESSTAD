<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public function userValid($username)
    {
        $sql = "SELECT 
                    users.field_user_id AS id_users,                    
                    users.field_nama AS name_users,
                    users.field_email AS email,
                    users.field_handphone AS phone,
                    users.field_password AS password,
                    users.field_branch AS branch_id,                    
                    users.field_status_aktif AS is_active
                FROM tbluserlogin users                
                WHERE users.field_email = ? OR users.field_handphone = ?";
        // $data = $this->db->query($sql);
        $data = $this->db->query($sql, [$username, $username]);
        return $data->row_array();
    }

    public function userLogin($userid)
    {

        $sql = "SELECT 
                    users.field_user_id AS id_users,
                    users.field_member_id AS account_member,
                    users.field_nama AS name_users,
                    users.field_email AS email,
                    users.field_handphone AS phone,
                    users.field_password AS password,
                    users.field_branch AS branch_id,
                    users.last_login AS last_login,
                    created_on,
                    users.field_status_aktif AS is_active
                FROM tbluserlogin users 
                WHERE users.field_user_id=?";
        $data = $this->db->query($sql, [$userid]);
        return $data->row_array();
    }
    public function userUpdated($username, $data)
    {
        $this->db->set($data);
        $this->db->where('field_email', $username);
        $this->db->or_where('field_handphone', $username);
        $updated = $this->db->update('tbluserlogin');
        return $updated;
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
        field_time AS time,
        field_tanggal_saldo AS tanggal,       
        field_type_saldo AS type,
        field_kredit_saldo AS kredit,
        field_debit_saldo AS debit,
        field_total_saldo AS saldo,
        field_status AS status,
        field_comments AS keterangan       
        FROM tbltrxmutasisaldo S WHERE S.field_member_id=? and S.field_status='S' ORDER BY S.field_id_saldo DESC";
        $data   = $this->db->query($sql, [$id]);
        return $data->result();
    }
    public function sumSaldo($id)
    {
        $sql = "SELECT field_rekening AS account_id ,field_total_saldo AS saldo				
		FROM tbltrxmutasisaldo S 		
		WHERE S.field_member_id=? ORDER BY S.field_id_saldo DESC LIMIT 1";
        $data = $this->db->query($sql, [$id]);
        return $data->row_array();
    }
}
