<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{

    public function index()
    {
        $data['judul'] = 'Orders';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['products'] = $this->ModelProduct->getProducts()->result_array();
        $data['role'] = 'user';
        $data['limit_words'] = function ($des, $batas_kata) {
            $kata = explode(" ", $des);
            if (count($kata) > $batas_kata) {


                return implode(" ", array_slice($kata, 0, $batas_kata)) . "...";;
            }
            return $des;
        };

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('temp/footer');
    }
    public function profile()
    {
        $data['judul'] = 'Profil';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = 'user';
        $this->form_validation->set_rules(
            'name',
            'Nama Lengkap',
            'required|trim',
            [
                'required' => 'Nama tidak Boleh Kosong'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('temp/header', $data);
            $this->load->view('temp/sidebar', $data);
            $this->load->view('temp/topbar', $data);
            $this->load->view('user/profile', $data);
            $this->load->view('temp/footer');
        } else {
            $nama = $this->input->post('name', true);
            $email = $this->input->post('email', true);
            //jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path'] = './asset/image/profile/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '3000';
                $config['max_width'] = '1024';
                $config['max_height'] = '1000';
                $config['file_name'] = 'pro' . time();
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $gambar_lama = $data['user']['userImage'];
                    if ($gambar_lama != 'default.jpeg') {
                        unlink(FCPATH . 'asset/image/profile/' . $gambar_lama);
                    }
                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('userImage', $gambar_baru);
                } else {
                }
            }
            $this->db->set('name', $nama);
            $this->db->where('email', $email);
            $this->db->update('users');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil diubah </div>');

            redirect('user/profile');
        }
    }
    public function cart()
    {
        $data['judul'] = 'Cart';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = 'user';

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/topbar', $data);
        $this->load->view('user/cart', $data);
        $this->load->view('temp/footer');
    }
    public function submission()
    {
        $data['judul'] = 'Submission in Process';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = 'user';

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/topbar', $data);
        $this->load->view('user/submission', $data);
        $this->load->view('temp/footer');
    }
    public function accepted()
    {
        $data['judul'] = 'Submission is accepted';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = 'user';

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/topbar', $data);
        $this->load->view('user/accepted', $data);
        $this->load->view('temp/footer');
    }
    public function history()
    {
        $data['judul'] = 'History';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = 'user';

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('temp/topbar', $data);
        $this->load->view('user/history', $data);
        $this->load->view('temp/footer');
    }
    public function produk(){
        $data['judul'] = 'Product';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = 'user';
            $this->load->view('temp/header_user', $data);
            $this->load->view('user/product');
            $this->load->view('temp/footer');
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('username');
        redirect('autentifikasi');
    }
}
