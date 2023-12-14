<?php
defined('BASEPATH') or exit('no direct script access allowed');
class Tampilan extends CI_Controller
{

    public function register()
    {
        $data['judul'] = 'Registrasi';
        $this->load->view('temp/header_login_regis', $data);
        $this->load->view('autentifikasi/register', $data);
        $this->load->view('temp/footer', $data);
    }

    public function product()
    {
        $data['produk'] = $this->ModelProduct->getProducts()->result_array();
        $this->load->view('temp/header_login_regis');
        $this->load->view('user/product', $data);
        $this->load->view('temp/footer');
    }



}
