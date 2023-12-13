<?php
defined('BASEPATH') or exit('No direct script acces allowed');
class ModelChart extends CI_Model
{
    // manajemen cart
    public function getCart()
    {
        return $this->db->get('cart');
    }

    public function cartWhere($where)
    {
        return $this->db->get_where('cart', $where);
    }

    public function simpanCart($data = null)
    {
        $this->db->insert('cart', $data);
    }

    public  function updateCart($data = null, $where = null)
    {
        $this->db->update('cart', $data, $where);
    }

    public  function hapusCart($where = null)
    {
        $this->db->delete('cart', $where);
    }

    public function joinUserCartProduct($where)
    {
        $this->db->select('*');
        $this->db->from('cart');
        $this->db->join('users', 'users.userId = cart.userId', 'inner');
        $this->db->join('products', 'products.productId = cart.productId', 'inner');
        $this->db->where($where);
        return $this->db->get();
    }
}
