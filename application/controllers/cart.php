<?php
defined('BASEPATH') or exit('no direct script access allowed');
class Cart extends CI_Controller
{
    public function index()
    {
        $data = [
            'userId' => $this->input->post('userId'),
            'productId' => $this->input->post('productId'),
            'quantity' => $this->input->post('quantity'),
        ];
        $this->ModelChart->simpanCart($data);
        redirect('user');
    }
    public function hapusCart()
    {
        $where = ['cartId' => $this->input->post('cartId')];
        $this->ModelChart->hapusCart($where);
        redirect('user/cart');
    }
    public function updateCart()
    {
        $where = ['cartId' => $this->input->post('cartId')];
        $data = ['quantity' => $this->input->post('quantity')];
        $this->ModelChart->updateCart($data, $where);
        redirect('user/cart');
    }
}
