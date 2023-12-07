<?php
defined('BASEPATH') or exit('no direct script access allowed');
class Products extends CI_Controller
{

    public function index()
    {
        $data['judul'] = 'Product';
        $this->load->view('temp/header_login_regis', $data);
        $this->load->view('user/product', $data);
        $this->load->view('temp/footer', $data);
    }

    public function tambah_produk()
    {
        $data['judul'] = 'Dashboard';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar_admin', $data);
        $this->load->view('temp/topbar', $data);
        $this->load->view('admin/tambah_produk', $data);
        $this->load->view('temp/footer');
    }

    public function hapus_produk()
    {
        $data['judul'] = 'Dashboard';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar_admin', $data);
        $this->load->view('temp/topbar', $data);
        $this->load->view('admin/hapus_produk', $data);
        $this->load->view('temp/footer');
    }

    public function login()
    {
        $data['judul'] = 'Login';
        $this->load->view('temp/header_login_regis', $data);
        $this->load->view('autentifikasi/login', $data);
        $this->load->view('temp/footer', $data);
    }

    public function register()
    {
        $data['judul'] = 'Registrasi';
        $this->load->view('temp/header_login_regis', $data);
        $this->load->view('autentifikasi/register', $data);
        $this->load->view('temp/footer', $data);
    }

    public function product()
    {
        $data['judul'] = 'Product';
        $this->load->view('temp/header_user', $data);
        $this->load->view('user/product', $data);
        $this->load->view('temp/footer', $data);
    }

    public function buy()
    {
        $data['judul'] = 'Orders';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('temp/footer');
    }

    public function submission()
    {
        $data['judul'] = 'Product';
        $this->load->view('temp/header_user', $data);
        $this->load->view('user/submission', $data);
        $this->load->view('temp/footer', $data);
    }
}
