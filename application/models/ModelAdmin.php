<?php
defined('BASEPATH') or exit('No direct script acces allowed');
class ModelAdmin extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('admin', $data);
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('admin', $where);
    }
   
}