<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notification extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Payment_model');
        $this->config->load('midtrans'); //config
        // Load DB
        $this->load->database();

        \Midtrans\Config::$serverKey = $this->config->item('midtrans_server_key');
        \Midtrans\Config::$isProduction = $this->config->item('midtrans_is_production');
        \Midtrans\Config::$isSanitized = $this->config->item('midtrans_is_sanitized');
        \Midtrans\Config::$is3ds = $this->config->item('midtrans_is_3ds');
    }

    public function index()
    {
        // Ambil raw input dari Midtrans
        $notif = json_decode(file_get_contents('php://input'));

        // Ambil data penting
        // $order_id     = $notif->order_id;
        // $transaction  = $notif->transaction_status;
        // $payment_type = $notif->payment_type;
        // $fraud_status = $notif->fraud_status;

        // Simpan log callback untuk debugging
        $this->db->insert('tbluserlog', [
            'field_waktu' => date('Y-m-d H:i:s'),
            'field_aktifitas' => json_encode($notif) // simpan jadi JSON string
        ]);

        // Update status pembayaran di tabel order
        // if ($transaction == 'capture') {
        //     if ($payment_type == 'credit_card') {
        //         if ($fraud_status == 'challenge') {
        //             $this->_updateOrderStatus($order_id, 'Challenge by FDS');
        //         } else {
        //             $this->_updateOrderStatus($order_id, 'Paid');
        //         }
        //     }
        // } else if ($transaction == 'settlement') {
        //     $this->_updateOrderStatus($order_id, 'Paid');
        // } else if ($transaction == 'pending') {
        //     $this->_updateOrderStatus($order_id, 'Pending');
        // } else if ($transaction == 'deny') {
        //     $this->_updateOrderStatus($order_id, 'Denied');
        // } else if ($transaction == 'expire') {
        //     $this->_updateOrderStatus($order_id, 'Expired');
        // } else if ($transaction == 'cancel') {
        //     $this->_updateOrderStatus($order_id, 'Cancelled');
        // }

        // Kirim respon OK supaya Midtrans tahu callback diterima
        echo 'OK';
    }

    // private function _updateOrderStatus($order_id, $status)
    // {
    //     $this->db->where('order_id', $order_id);
    //     $this->db->update('orders', [
    //         'status_pembayaran' => $status
    //     ]);
    // }
}
