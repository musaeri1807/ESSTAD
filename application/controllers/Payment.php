<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Payment extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Payment_model');
        $this->config->load('midtrans');

        \Midtrans\Config::$serverKey = $this->config->item('midtrans_server_key');
        \Midtrans\Config::$isProduction = $this->config->item('midtrans_is_production');
        \Midtrans\Config::$isSanitized = $this->config->item('midtrans_is_sanitized');
        \Midtrans\Config::$is3ds = $this->config->item('midtrans_is_3ds');
    }

    // Generate VA
    public function create_va()
    {
        $order_id = 'INV-' . time();
        $gross_amount = 150000; // contoh nominal
        $bank = 'bca'; // bisa bca, bni, permata

        $params = [
            'payment_type' => 'bank_transfer',
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => $gross_amount
            ],
            'customer_details' => [
                'first_name' => 'Budi',
                'email' => 'budi@example.com',
                'phone' => '08123456789'
            ],
            'bank_transfer' => [
                'bank' => $bank
            ]
        ];

        $response = \Midtrans\CoreApi::charge($params);

        if (!empty($response->va_numbers)) {
            $va_number = $response->va_numbers[0]->va_number;
            $bank_name = $response->va_numbers[0]->bank;
        } else {
            $va_number = null;
            $bank_name = $bank;
        }

        $data = [
            'order_id' => $order_id,
            'va_number' => $va_number,
            'bank' => $bank_name,
            'amount' => $gross_amount,
            'status' => $response->transaction_status,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->Payment_model->create_transaction($data);

        echo json_encode([
            'status' => 'success',
            'order_id' => $order_id,
            'bank' => strtoupper($bank_name),
            'va_number' => $va_number,
            'amount' => $gross_amount
        ]);
    }

    // Callback dari Midtrans
    public function notification()
    {
        $notif = json_decode(file_get_contents('php://input'));

        if ($notif) {
            $order_id = $notif->order_id;
            $transaction_status = $notif->transaction_status;

            $this->Payment_model->update_transaction_status($order_id, $transaction_status);

            http_response_code(200);
        }
    }
}
