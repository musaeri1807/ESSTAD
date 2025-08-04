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
            FROM tblgoldprice WHERE field_status='A' ORDER BY field_gold_id DESC LIMIT 1 ";
    $data = $this->db->query($sql);
    return $data->row_array();
  }


  public function dayGold()
  {
    $today = date('Y-m-d');
    $this->db->where('DATE(field_datetime_gold)', $today);
    $this->db->where('field_status', 'A');
    $this->db->order_by('field_datetime_gold', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get('tblgoldprice');
    return $query->row(); // Ambil 1 data paling baru
  }
}
