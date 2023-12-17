<?php
defined('BASEPATH') or exit('no direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('temp/header_login_admin');
        $this->load->view('autentifikasi/login-admin');
        $this->load->view('temp/footer');
    }
    public function login()
    {
        $admin = htmlspecialchars($this->input->post('userAdmin', true));
        $user = $this->ModelAdmin->cekData(['adminName' => $admin])->row_array();
        //jika usernya ada
        if ($user) {
            //cek password
            $password = $this->input->post('passwordAdmin', true);
            if ($password == $user['adminPassword']) {
                $data = [
                    'adminName' => $user['adminName'],
                    'hakAkses' => $user['hakAkses']
                ];
                $this->session->set_userdata($data);
                if ($user['imageAdmin'] == 'default.jpeg') {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-message" role="alert">Silahkan Ubah Profile Anda untuk Ubah Photo Profil</div>');
                }
                redirect('admin/dasboard');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Wrong Password!!</div>');
                redirect('admin');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email is not registered!!</div>');
            redirect('admin');
        }
    }
    public function dasboard()
    {
        $data['judul'] = 'Dasboard Admin';
        $data['admin'] = $this->ModelAdmin->cekData(['adminName' => $this->session->userdata('adminName')])->row_array();
        $data['role'] = 'admin';
        $data['order'] = $this->ModelOrders->ordersWhere(['statusPengajuan' => 0])->result_array();
        $data['user'] = $this->ModelUser->getUser()->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar_admin', $data);
        $this->load->view('temp/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('temp/footer');
    }
    public function accepted()
    {
        $data['judul'] = 'Pengajuan Acc';
        $data['admin'] = $this->ModelAdmin->cekData(['adminName' => $this->session->userdata('adminName')])->row_array();
        $data['role'] = 'admin';
        $data['order'] = $this->ModelOrders->OrdersWhere(['statusPengajuan' => 1])->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar_admin', $data);
        $this->load->view('temp/topbar', $data);
        $this->load->view('admin/accepted', $data);
        $this->load->view('temp/footer');
    }
    public function logPenjualan()
    {
        $data['judul'] = 'Log Penjualan';
        $data['admin'] = $this->ModelAdmin->cekData(['adminName' => $this->session->userdata('adminName')])->row_array();
        $data['role'] = 'admin';
        $data['order'] = $this->ModelOrders->getOrders()->result_array();

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar_admin', $data);
        $this->load->view('temp/topbar', $data);
        $this->load->view('admin/log-penjualan', $data);
        $this->load->view('temp/footer');
    }
    public function tambahProduk()
    {
        $data['judul'] = 'Tambah Produk';
        $data['admin'] = $this->ModelAdmin->cekData(['adminName' => $this->session->userdata('adminName')])->row_array();
        $data['produk'] = $this->ModelProduct->getProducts()->result_array();
        $data['role'] = 'admin';

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar_admin', $data);
        $this->load->view('temp/topbar', $data);
        $this->load->view('admin/tambah_produk', $data);
        $this->load->view('temp/footer');
    }
    public function hapusProduk()
    {
        $data['judul'] = 'Hapus Produk';
        $data['admin'] = $this->ModelAdmin->cekData(['adminName' => $this->session->userdata('adminName')])->row_array();
        $data['produk'] = $this->ModelProduct->getProducts()->result_array();
        $data['role'] = 'admin';

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar_admin', $data);
        $this->load->view('temp/topbar', $data);
        $this->load->view('admin/hapus_produk', $data);
        $this->load->view('temp/footer');
    }
    public function updateProduk()
    {
        $data['judul'] = 'Update Produk';
        $data['admin'] = $this->ModelAdmin->cekData(['adminName' => $this->session->userdata('adminName')])->row_array();
        $data['produk'] = $this->ModelProduct->getProducts()->result_array();
        $data['role'] = 'admin';

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar_admin', $data);
        $this->load->view('temp/topbar', $data);
        $this->load->view('admin/update_produk', $data);
        $this->load->view('temp/footer');
    }
    public function qtyDisetujui()
    {
        $where = htmlspecialchars($this->input->post('detailId'));
        $qtyDisanggupi = htmlspecialchars($this->input->post('qtyDisanggupi'));
        $this->ModelOrders->updateDetailOrders('quantityDisetujui', $qtyDisanggupi, 'detailId', $where);
        redirect('Admin/dasboard');
    }
    public function accPengajuan()
    {
        $where = htmlspecialchars($this->input->post('orderId'));
        $this->ModelOrders->updateOrders('statusPengajuan', 1, 'orderId', $where);

        redirect('Admin/dasboard');
    }
    public function tolakPengajuan()
    {
        $where = htmlspecialchars($this->input->post('orderId'));
        $this->ModelOrders->updateDetailOrders('quantityDisetujui', 0, 'orderId', $where);
        $this->ModelOrders->updateOrders('statusPengajuan', 2, 'orderId', $where);

        redirect('Admin/dasboard');
    }
    public function batalPengajuan()
    {
        $where = htmlspecialchars($this->input->post('orderId'));
        $this->ModelOrders->updateOrders('statusPengajuan', 0, 'orderId', $where);
        redirect('Admin/accepted');
    }
    public function lunasPembayaran()
    {
        $where = htmlspecialchars($this->input->post('orderId'));
        $this->ModelOrders->updateOrders('paymentStatus', 1, 'orderId', $where);
        redirect('Admin/accepted');
    }
    public function batalLunasPembayaran()
    {
        $where = htmlspecialchars($this->input->post('orderId'));
        $this->ModelOrders->updateOrders('paymentStatus', 0, 'orderId', $where);
        redirect('Admin/accepted');
    }
    public function dataUser()
    {
        $data['judul'] = 'Data User';
        $data['admin'] = $this->ModelAdmin->cekData(['adminName' => $this->session->userdata('adminName')])->row_array();
        $data['user'] = $this->ModelUser->getUser()->result_array();
        $data['role'] = 'admin';

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar_admin', $data);
        $this->load->view('temp/topbar', $data);
        $this->load->view('admin/data-user', $data);
        $this->load->view('temp/footer');
    }
    public function dataAdmin()
    {
        $data['judul'] = 'Data Admin';
        $data['admin'] = $this->ModelAdmin->cekData(['adminName' => $this->session->userdata('adminName')])->row_array();
        $data['user'] = $this->ModelAdmin->getAdmin()->result_array();
        $data['role'] = 'admin';

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar_admin', $data);
        $this->load->view('temp/topbar', $data);
        $this->load->view('admin/data-admin', $data);
        $this->load->view('temp/footer');
    }
    public function tambahDataAdmin()
    {
        $this->form_validation->set_rules(
            'nama_admin',
            'Nama Admin',
            'required',
            [
                'required' => "Name Tidak Boleh Kosong!!"
            ]
        );
        $this->form_validation->set_rules(
            'password_admin',
            'Password',
            'required|trim|min_length[3]|matches[confirm_password_admin]',
            [
                'required' => "Password Tidak Boleh Kosong!!",
                'matches' => 'Password Tidak Cocok!!',
                'min_length' => 'Password Terlalu Pendek!'
            ]
        );
        $this->form_validation->set_rules(
            'confirm_password_admin',
            'Repeat Password',
            'required|trim|matches[password_admin]'
        );

        $config['upload_path'] = './asset/image/profile/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '30000';
        $config['max_width'] = '10240';
        $config['max_height'] = '10000';
        $config['file_name'] = 'img' . time();
        $this->load->library('upload', $config);
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Data Admin';
            $data['admin'] = $this->ModelAdmin->cekData(['adminName' => $this->session->userdata('adminName')])->row_array();
            $data['user'] = $this->ModelAdmin->getAdmin()->result_array();
            $data['role'] = 'admin';

            $this->load->view('temp/header', $data);
            $this->load->view('temp/sidebar_admin', $data);
            $this->load->view('temp/topbar', $data);
            $this->load->view('admin/data-admin', $data);
            $this->load->view('temp/footer');
        } else {
            if ($this->upload->do_upload('foto_admin')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = 'gagal.jpg';
            }
            $data = [
                'adminName' => htmlspecialchars($this->input->post('nama_admin', true)),
                'adminPassword' => htmlspecialchars($this->input->post('password_admin', true)),
                'hakAkses' => htmlspecialchars($this->input->post('hak_akses', true)),
                'imageAdmin' => $gambar,
            ];
            $this->ModelAdmin->simpanAdmin($data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Akun Admin telah di tambahkan</div>');
            redirect('admin/dataAdmin');
        }
    }
    public function hapusAdmin()
    {
        $where = ['adminId' => $this->input->post('adminId')];
        $this->ModelAdmin->hapusAdmin($where);
        redirect('admin/dataAdmin');
    }
}
