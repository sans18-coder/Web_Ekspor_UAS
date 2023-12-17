<?php
defined('BASEPATH') or exit('No direct script acces allowed');
class ModelAdmin extends CI_Model
{
    public function getAdmin()
    {
        return $this->db->get('admin');
    }
    public function cekData($where = null)
    {
        return $this->db->get_where('admin', $where);
    }
    public function simpanAdmin($data)
    {
        $this->db->insert('admin', $data);
    }
    public  function hapusAdmin($where = null)
    {
        $this->db->delete('admin', $where);
    }
}
