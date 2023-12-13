<?php
defined('BASEPATH') or exit('No direct script acces allowed');
class ModelOrders extends CI_Model
{
    // manajemen orders
    public function getOrders()
    {
        return $this->db->get('orders');
    }

    public function ordersWhere($where)
    {
        return $this->db->get_where('orders', $where);
    }

    public function simpanOrders($data = null)
    {
        $this->db->insert('orders', $data);
    }

    public  function updateOrders($data = null, $where = null)
    {
        $this->db->update('orders', $data, $where);
    }

    public  function hapusOrders($where = null)
    {
        $this->db->delete('orders', $where);
    }

    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('orders');
        return $this->db->get()->row($field);
    }
    public function joinUsersOrdersDetail($where)
    {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('users', 'users.userId = orders.orderId', 'inner');
        $this->db->join('detail_orders', 'detail_orders.detailId = orders.orderId', 'inner');
        $this->db->where($where);
        return $this->db->get();
    }
    // detail order
    public function getDetailOrders()
    {
        return $this->db->get('detail_orders');
    }

    public function detailOrdersWhere($where)
    {
        return $this->db->get_where('detail_orders', $where);
    }

    public function simpanDetailOrders($data = null)
    {
        $this->db->insert('detail_orders', $data);
    }

    public function hapusDetailOrders($where = null)
    {
        $this->db->delete('detail_orders', $where);
    }

    public function updateDetailOrders($where = null, $data = null)
    {
        $this->db->update('detail_orders', $data, $where);
    }
    public function joinOrdersDetailProduct($where)
    {
        $this->db->select('*');
        $this->db->from('detail_orders');
        $this->db->join('orders', 'orders.orderId = detail_orders.orderId', 'inner');
        $this->db->join('products', 'products.productId = detail_orders.productId', 'inner');
        $this->db->where($where);
        return $this->db->get();
    }
    public function getOrderByLastUser($userId)
    {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('userId', $userId);
        $this->db->order_by('orderId', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->row('orderId');
    }
}
