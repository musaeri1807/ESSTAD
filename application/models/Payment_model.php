<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment_model extends CI_Model
{

    public function create_transaction($data)
    {
        $this->db->insert('transactions', $data);
        return $this->db->insert_id();
    }

    public function update_transaction_status($order_id, $status)
    {
        $this->db->where('order_id', $order_id);
        $this->db->update('transactions', ['status' => $status]);
    }

    public function get_transaction($order_id)
    {
        return $this->db->get_where('transactions', ['order_id' => $order_id])->row();
    }
}
