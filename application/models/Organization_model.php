<?php

class Organization_model extends CI_Model
{


  function __consturct()
  {
    parent::__construct();
  }
  public function get_bspid()
  {
    $sql    = "SELECT * FROM branch ORDER BY id DESC ";
    $query  = $this->db->query($sql);
    $result = $query->result();
    return $result;
  }
  // ''''''''''''''''''''''''''''''''''
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
