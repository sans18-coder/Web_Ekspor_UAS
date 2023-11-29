<?php
defined('BASEPATH') or exit('no direct script access allowed');
class Tampilan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['judul'] = 'Product';
        $this->load->view('temp/header_login_regis', $data);
        $this->load->view('user/product', $data);
        $this->load->view('temp/footer', $data);
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
        $data['judul'] = 'Buy';
        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/topbar', $data);
        $this->load->view('user/buy', $data);
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
