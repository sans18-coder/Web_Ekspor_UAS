<?php
defined('BASEPATH') or exit('no direct script access allowed');
class Products extends CI_Controller
{
    public function tambahProduk()
    {
        $data['judul'] = 'Tambah Produk';
        $data['admin'] = $this->ModelAdmin->cekData(['adminName' => $this->session->userdata('adminName')])->row_array();
        $data['produk'] = $this->ModelProduct->getProducts()->result_array();
        $data['role'] = 'admin';
        $this->form_validation->set_rules('productName', 'Nama Produk', 'required', [
            'required' => 'Nama Produk harus diisi',
        ]);
        $this->form_validation->set_rules('productDes', 'Deskripsi Produk', 'required', [
            'required' => 'Deskripsi Produk harus diisi',
        ]);
        $this->form_validation->set_rules('price', 'Harga Produk', 'required', [
            'required' => 'Harga produk harus diisi',
        ]);
        $this->form_validation->set_rules('minOrder', 'Minimal Order', 'required', [
            'required' => 'Minimal order  harus diisi',
        ]);
        
        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './asset/image/product/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '40290000';
        $config['max_width'] = '10000';
        $config['max_height'] = '10000';
        $config['file_name'] = 'img' . time();
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_produk')) {
            $image = $this->upload->data();
            $gambar = $image['file_name'];
        } else {
            $gambar = 'gagal';
        }
        $data = [
            'productName' => $this->input->post('nama_produk', true),
            'productDes' => $this->input->post('deskripsi_produk', true),
            'price' => $this->input->post('harga_produk', true),
            'minOrder' => $this->input->post('minimal_order', true),
        
            'productImage' => $gambar
        ];
        $this->ModelProduct->simpanProducts($data);
        redirect('admin/tambahProduk');
    }
    
    public function hapusProduk() 
    { 
        $where = ['productId' => $this->uri->segment(3)]; 
        $this->ModelProduct->hapusProducts($where); 
        redirect('admin/hapusProduk'); 
    }

}
