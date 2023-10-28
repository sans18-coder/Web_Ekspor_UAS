<?php
defined('BASEPATH') or exit('no direct script access allowed');
class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['judul'] = 'Admin';
        $this->load->view('header_login_admin', $data);
        $this->load->view('login-admin', $data);
        $this->load->view('footer', $data);
    }
}
