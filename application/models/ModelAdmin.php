<?php
defined('BASEPATH') or exit('No direct script acces allowed');
class ModelAdmin extends CI_Model
{
    public function cekData($where = null)
    {
        return $this->db->get_where('admin', $where);
    }
}
