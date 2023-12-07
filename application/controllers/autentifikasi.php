<?php
defined('BASEPATH') or exit('no direct script access allowed');
class Autentifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        //jika statusnya sudah login, maka tidak bisa mengakses halaman login alias dikembalikan ke tampilan user
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules(
            'email',
            'Alamat Email',
            'required|trim|valid_email',
            [
                'required' => 'Email Harus diisi!!',
                'valid_email' => 'Email Tidak Benar!!'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim',
            [
                'required' => 'Password Harus diisi'
            ]
        );
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login';
            $data['user'] = '';

            //kata 'login' merupakan nilai dari variabel judul dalam array $data dikirimkan ke view aute_header
            $this->load->view('temp/header_login_regis', $data);
            $this->load->view('autentifikasi/login');
            $this->load->view('temp/footer');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {

        $email = htmlspecialchars($this->input->post('email', true));
        $user = $this->ModelUser->cekData(['email' => $email])->row_array();
        //jika usernya ada
        if ($user) {
            //cek password
            $password = $this->input->post('password', true);
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'username' => $user['username'],
                ];
                $this->session->set_userdata($data);
                if ($user['Image'] == 'default.jpeg') {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-message" role="alert">Silahkan Ubah Profile Anda untuk Ubah Photo Profil</div>');
                }
                redirect('user');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Wrong Password!!</div>');
                redirect('autentifikasi');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email is not registered!!</div>');
            redirect('autentifikasi');
        }
    }
    public function registrasi()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        //membuat rule untuk inputan nama agar tidak boleh kosong dengan membuat pesan error dengan 
        //bahasa sendiri yaitu 'Nama Belum diisi'
        $this->form_validation->set_rules(
            'name',
            'Nama Lengkap',
            'required',
            [
                'required' => "Name hasn't been entered!!"
            ]
        );
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required',
            [
                'required' => "Username hasn't been entered!!"
            ]
        );
        $this->form_validation->set_rules(
            'nationality',
            'nationality',
            'required',
            [
                'required' => "nationality hasn't been entered!!"
            ]
        );
        //membuat rule untuk inputan email agar tidak boleh kosong, tidak ada spasi, format email harus valid
        //dan email belum pernah dipakai sama user lain dengan membuat pesan error dengan bahasa sendiri 
        //yaitu jika format email tidak benar maka pesannya 'Email Tidak Benar!!'. jika email belum diisi,
        //maka pesannya adalah 'Email Belum diisi', dan jika email yang diinput sudah dipakai user lain,
        //maka pesannya 'Email Sudah dipakai'

        $this->form_validation->set_rules(
            'email',
            'Alamat Email',
            'required|trim|valid_email|is_unique[users.email]',
            [
                'valid_email' => 'Wrong E-mail!!',
                'required' => "Email  hasn't been entered!!",
                'is_unique' => 'Email is registere   d!'
            ]
        );
        $this->form_validation->set_rules(
            'phoneNumber',
            'Phone Number',
            'required|trim|min_length[6]',
            [
                'required' => "Name hasn't been entered!!",
                'min_length' => 'Phone Number is too short'
            ]
        );
        //membuat rule untuk inputan password agar tidak boleh kosong, tidak ada spasi, tidak boleh kurang dari
        //dari 3 digit, dan password harus sama dengan repeat password dengan membuat pesan error dengan 
        //bahasa sendiri yaitu jika password dan repeat password tidak diinput sama, maka pesannya
        //'Password Tidak Sama'. jika password diisi kurang dari 3 digit, maka pesannya adalah 
        //'Password Terlalu Pendek'.
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[3]|matches[confirmPassword]',
            [
                'required' => "Password hasn't been entered!!",
                'matches' => 'Password not same!!',
                'min_length' => 'Password Terlalu Pendek'
            ]
        );
        $this->form_validation->set_rules(
            'confirmPassword',
            'Repeat Password',
            'required|trim|matches[password]'
        );
        //jika jida disubmit kemudian validasi form diatas tidak berjalan, maka akan tetap berada di
        //tampilan registrasi. tapi jika disubmit kemudian validasi form diatas berjalan, maka data yang 
        //diinput akan disimpan ke dalam tabel user
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Registrasi Member';
            $this->load->view('temp/header_login_regis', $data);
            $this->load->view('autentifikasi/register');
            $this->load->view('temp/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'phoneNumber' => htmlspecialchars($this->input->post('phoneNumber', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'userImage' => 'default.jpeg',
                'email' => htmlspecialchars($this->input->post('email', true)),
                'nationality' => htmlspecialchars($this->input->post('nationality')),
                'isActive' => 1,
                'tanggalDibuat' => date('Y-m-d')
            ];
            $this->ModelUser->simpanData($data); //menggunakan model

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! akun member anda sudah dibuat. Silahkan Aktivasi Akun anda</div>');
            redirect('autentifikasi');
        }
    }
    public function logout()
    {
        if ($this->session->userdata('email')) {
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('email');
            redirect('autentifikasi');
        } else {
            $this->session->unset_userdata('adminName');
            $this->session->unset_userdata('hakAkses');
            redirect('admin');
        }
    }
}
