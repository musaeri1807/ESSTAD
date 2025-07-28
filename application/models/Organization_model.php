<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Organization_model extends CI_Model
{


  function __consturct()
  {
    parent::__construct();
  }
  // public function get_bspid()
  // {

  //   $sql    = "SELECT *,B.field_branch_id AS ID,D.organisasi AS CABANG
  //             FROM tblbranch B LEFT JOIN tblbranchdetail D 
  //             ON B.field_id=D.id_branch 
  //             WHERE B.Is_Active='Y' 
  //             ORDER BY D.organisasi ASC ";
  //   $query  = $this->db->query($sql);
  //   $result = $query->result();
  //   return $result;
  // }

  public function get_bspid()
  {
    $this->db->select('B.*, B.field_branch_id AS ID, D.organisasi AS CABANG');
    $this->db->from('tblbranch B');
    $this->db->join('tblbranchdetail D', 'B.field_id = D.id_branch', 'left');
    $this->db->where('B.Is_Active', 'Y');
    $this->db->order_by('D.organisasi', 'ASC');

    $query = $this->db->get();
    return ($query->num_rows() > 0) ? $query->result() : []; // Hindari return null jika kosong
  }

  public function get_bspid_by_id($id_branch)
  {
    $this->db->select('B.*, B.field_branch_id AS ID, D.organisasi AS CABANG');
    $this->db->from('tblbranch B');
    $this->db->join('tblbranchdetail D', 'B.field_id = D.id_branch', 'left');
    $this->db->where('B.field_branch_id', $id_branch);
    $this->db->where('B.Is_Active', 'Y'); // Filter hanya yang aktif
    $this->db->order_by('D.organisasi', 'ASC');
    $query = $this->db->get();
    return $query->row(); // Mengambil satu baris data
  }


  // ''''''''''''''''''''''''''''''''''
  //delete
  public function Add_Department($data)
  {
    $this->db->insert('department', $data);
  }

  public function department_delete($dep_id)
  {
    $this->db->delete('department', array('id' => $dep_id));
  }

  public function department_edit($dep)
  {
    $sql    = "SELECT * FROM `department` WHERE `id`='$dep'";
    $query  = $this->db->query($sql);
    $result = $query->row();
    return $result;
  }
  public function Update_Department($id, $data)
  {
    $this->db->where('id', $id);
    $this->db->update('department', $data);
  }
}
