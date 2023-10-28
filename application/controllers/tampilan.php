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
        $this->load->view('header_login_regis', $data);
        $this->load->view('product', $data);
        $this->load->view('footer', $data);
    }

    public function login()
    {
        $data['judul'] = 'Login';
        $this->load->view('header_login_regis', $data);
        $this->load->view('login', $data);
        $this->load->view('footer', $data);
    }

    public function register()
    {
        $data['judul'] = 'Registrasi';
        $this->load->view('header_login_regis', $data);
        $this->load->view('register', $data);
        $this->load->view('footer', $data);
    }

    public function product()
    {
        $data['judul'] = 'Product';
        $this->load->view('header_user', $data);
        $this->load->view('product', $data);
        $this->load->view('footer', $data);
    }

    public function buy()
    {
        $data['judul'] = 'Buy';
        $this->load->view('header_user', $data);
        $this->load->view('buy', $data);
        $this->load->view('footer', $data);
    }

    public function submission()
    {
        $data['judul'] = 'Product';
        $this->load->view('header_user', $data);
        $this->load->view('submission', $data);
        $this->load->view('footer', $data);
    }
}
