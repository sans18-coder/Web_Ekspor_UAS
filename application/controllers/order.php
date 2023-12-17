<?php
defined('BASEPATH') or exit('no direct script access allowed');
class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $userId = htmlspecialchars($this->input->post('userId'));
        $dataOrder = [
            'userId' => $userId,
            'paymentStatus' => 0,
            'statusPengajuan' => 0,
        ];
        $this->ModelOrders->simpanOrders($dataOrder);
        $orderId = $this->ModelOrders->getOrderByLastUser($userId);
        $dataDetailOrder = [
            'orderId' => $orderId,
            'productId' => $this->input->post('productId'),
            'quantity' => $this->input->post('quantity'),
        ];
        $this->ModelOrders->simpanDetailOrders($dataDetailOrder);

        redirect('user');
    }
    public function hapusOrder()
    {
        $where = ['orderId' => $this->input->post('orderId')];
        $this->ModelOrders->hapusDetailOrders($where);
        $this->ModelOrders->hapusOrders($where);
        redirect('user/submission');
    }
    public function terimaOrder()
    {
        $where =  $this->input->post('orderId');
        $this->ModelOrders->updateOrders('statusPengajuan', 3, 'orderId', $where);
        redirect('user/history');
    }
    public function orderAll()
    {
        $userId = htmlspecialchars($this->input->post('userId'));
        $dataOrder = [
            'userId' => $userId,
            'paymentStatus' => 0,
        ];
        $this->ModelOrders->simpanOrders($dataOrder);
        $lastOrderId = $this->ModelOrders->getOrderByLastUser($userId);
        $cartId = $this->ModelChart->cartWhere(['userId' => $userId])->result_array();
        foreach ($cartId as $ci) {
            $dataDetailOrder = [
                'orderId' => $lastOrderId,
                'productId' => $ci['productId'],
                'quantity' => $ci['quantity']
            ];
            $this->ModelOrders->simpanDetailOrders($dataDetailOrder);
        }
        $this->ModelChart->hapusCart(['userId' => $userId]);
        redirect('user/submission');
    }
}
