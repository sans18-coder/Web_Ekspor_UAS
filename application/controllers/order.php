<?php
defined('BASEPATH') or exit('no direct script access allowed');
class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model order_model.php dan detail_order_model.php
        $this->load->model('ModelOrders');
    }
    public function index()
    {
        $userId = htmlspecialchars($this->input->post('userId'));
        $dataOrder = [
            'userId' => $userId,
            'paymentStatus' => 0,
        ];
        $this->ModelOrders->simpanOrders($dataOrder);
        $orderId = $this->ModelOrders->ordersWhere(['userId' => $userId])->row_array();
        $dataDetailOrder = [
            'orderId' => $orderId['orderId'],
            'productId' => $this->input->post('productId'),
            'quantity' => $this->input->post('quantity')
        ];
        $this->ModelOrders->simpanDetailOrders($dataDetailOrder);

        redirect('user');
    }
    public function hapusOrder()
    {
        $where = ['orderId' => $this->input->post('orderId')];
        $this->ModelOrders->hapusOrders($where);
        $this->ModelOrders->hapusDetailOrders($where);
        redirect('user/submission');
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
