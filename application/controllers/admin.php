<?php
defined('BASEPATH') or exit('no direct script access allowed');
class Admin extends CI_Controller
{
    // function __construct()
    // {
    //     parent::__construct();
    //     $this->load->helper('url');
    // }

    public function index()
    {
        
        $data['judul'] = 'Dashboard';
        // $data['user'] = $this->ModelUser->cekData(['Email' => $this->session->userdata('Email')])->row_array();
        // $data['anggota'] = $this->ModelUser->getUserLimit()->result_array();
        // $data['buku'] = $this->ModelBuku->getBuku()->result_array();
        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar_admin', $data);
        $this->load->view('temp/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('temp/footer');
    }
}
