<?php
defined('BASEPATH') or exit('No direct script acces allowed');
class ModelUser extends CI_Model
{
    public function getuser()
    {
        return $this->db->get('users');
    }
    public function simpanData($data = null)
    {
        $this->db->insert('users', $data);
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('users', $where);
    }
}
