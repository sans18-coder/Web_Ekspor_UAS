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
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', [
            'required' => 'Nama Produk harus diisi',
        ]);
        $this->form_validation->set_rules('deskripsi_produk', 'Deskripsi Produk', 'required', [
            'required' => 'Deskripsi Produk harus diisi',
        ]);
        $this->form_validation->set_rules('harga_produk', 'Harga Produk', 'required|numeric', [
            'required' => 'Harga produk harus diisi',
            'numeric' => 'Yang Anda masukkan bukan angka'
        ]);
        $this->form_validation->set_rules('minimal_order', 'Minimal Order', 'required|numeric', [
            'required' => 'Minimal order  harus diisi',
            'numeric' => 'Yang Anda masukkan bukan angka'
        ]);
        
        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './asset/image/product/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '10000000';
        $config['max_width'] = '200000';
        $config['max_height'] = '200000';
        $config['file_name'] = 'img' . time();
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('productImage')) {
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

    public function updateProduk()
    {
        $data['judul'] = 'Update Produk';
        $data['admin'] = $this->ModelAdmin->cekData(['adminName' => $this->session->userdata('adminName')])->row_array();
        $data['produk'] = $this->ModelProduct->productsWhere(['productId' => $this->uri->segment(3)])->result_array();
        $data['role'] = 'admin';
        
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', [
            'required' => 'Nama Produk harus diisi',
        ]);
        $this->form_validation->set_rules('deskripsi_produk', 'Deskripsi Produk', 'required', [
            'required' => 'Deskripsi Produk harus diisi',
        ]);
        $this->form_validation->set_rules('harga_produk', 'Harga Produk', 'required|numeric', [
            'required' => 'Harga produk harus diisi',
            'numeric' => 'Yang Anda masukkan bukan angka'
        ]);
        $this->form_validation->set_rules('minimal_order', 'Minimal Order', 'required|numeric', [
            'required' => 'Minimal Order Produk harus diisi',
            'numeric' => 'Yang Anda masukkan bukan angka'
        ]);
        
        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './asset/image/product/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1000';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();
        
        //memuat atau memanggil library upload
        $this->load->library('upload', $config);
            if ($this->upload->do_upload('productImage'))
            {
                $image = $this->upload->data();
                unlink('asset/image/product/' . $this->input->post('old_pict', TRUE));
                $gambar = $image['file_name'];
            } else {
                $gambar = $this->input->post('old_pict', TRUE);
            }
            $data = [
                'productName' => $this->input->post('nama_produk', true),
                'productDes' => $this->input->post('deskripsi_produk', true),
                'price' => $this->input->post('harga_produk', true),
                'minOrder' => $this->input->post('minimal_order', true),
            
                'productImage' => $gambar 
            ];
            $this->ModelProduct->updateProducts($data, ['productId' => $this->input->post('id_produk')]);
            redirect('admin/updateProduk');
        }
    }

