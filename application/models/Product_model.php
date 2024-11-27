<?php

class Product_model extends CI_Model
{


  function __consturct()
  {
    parent::__construct();
  }
  public function getTrash()
  {
    $sql    = "SELECT
                S.field_branch AS company,
                S.field_product_id AS id,
                S.field_product_name AS name,
                S.field_price AS price,
                S.field_branch AS company,
                S.field_category AS id_category,
                S.field_image AS image,
                S.field_status AS STATUS,
                C.field_type_product AS category
                FROM tblproduct S LEFT JOIN tblcategory C 
                ON S.field_category=C.field_category_id 
                WHERE S.field_status='A'  ";
    $query  = $this->db->query($sql);
    $result = $query->result_array();
    return $result;
  }

  public function getGold()
  {
    $sql = "SELECT field_gold_id AS id,
                    field_sell AS sell,
                    field_buyback AS buyback ,
                    field_rasio AS rasio,
                    field_fluktuasi AS fluktuasi,
                    field_datetime_gold AS date
            FROM tblgoldprice ORDER BY field_gold_id DESC LIMIT 1 ";
    $data = $this->db->query($sql);
    return $data->row_array();
  }

  // public function Add_Department($data)
  // {
  //   $this->db->insert('department', $data);
  // }

  // public function department_delete($dep_id)
  // {
  //   $this->db->delete('department', array('id' => $dep_id));
  // }

  // public function department_edit($dep)
  // {
  //   $sql    = "SELECT * FROM `department` WHERE `id`='$dep'";
  //   $query  = $this->db->query($sql);
  //   $result = $query->row();
  //   return $result;
  // }
  // public function Update_Department($id, $data)
  // {
  //   $this->db->where('id', $id);
  //   $this->db->update('department', $data);
  // }





  // public function desselect()
  // {
  //   $query = $this->db->get('designation');
  //   $result = $query->result();
  //   return $result;
  // }
}
