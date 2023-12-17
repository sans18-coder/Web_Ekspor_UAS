
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
        $config['max_size'] = '30000';
        $config['max_width'] = '20000';
        $config['max_height'] = '20000';
        $config['file_name'] = 'img' . time();
        $this->load->library('upload', $config);
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Tambah Produk';
            $data['admin'] = $this->ModelAdmin->cekData(['adminName' => $this->session->userdata('adminName')])->row_array();
            $data['produk'] = $this->ModelProduct->getProducts()->result_array();
            $data['role'] = 'admin';

            $this->load->view('temp/header', $data);
            $this->load->view('temp/sidebar_admin', $data);
            $this->load->view('temp/topbar', $data);
            $this->load->view('admin/tambah_produk', $data);
            $this->load->view('temp/footer');
        } else {
            if ($this->upload->do_upload('foto_produk')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = 'gagal.jpg';
            }
            $data = [
                'productName' => $this->input->post('nama_produk', true),
                'productDes' => $this->input->post('deskripsi_produk', true),
                'price' => $this->input->post('harga_produk', true),
                'minOrder' => $this->input->post('minimal_order', true),

                'productImage' => $gambar
            ];
            $this->ModelProduct->simpanProducts($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Produk Berhasil di Tambahkan</div>');
            redirect('admin/tambahProduk');
        }
    }

    public function hapusProduk()
    {
        $where = ['productId' => $this->uri->segment(3)];
        $this->ModelProduct->hapusProducts($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Produk Berhasil di Hapus</div>');
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
        $config['max_size'] = '30000';
        $config['max_width'] = '20000';
        $config['max_height'] = '20000';
        $config['file_name'] = 'img' . time();

        //memuat atau memanggil library upload
        $this->load->library('upload', $config);
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Update Produk';
            $data['admin'] = $this->ModelAdmin->cekData(['adminName' => $this->session->userdata('adminName')])->row_array();
            $data['produk'] = $this->ModelProduct->getProducts()->result_array();
            $data['role'] = 'admin';
            $this->load->view('temp/header', $data);
            $this->load->view('temp/sidebar_admin', $data);
            $this->load->view('temp/topbar', $data);
            $this->load->view('admin/update_produk', $data);
            $this->load->view('temp/footer');
        } else {
            if ($this->upload->do_upload('foto_produk')) {
                $image = $this->upload->data();
                unlink('asset/image/product/' . $this->input->post('old_pict', TRUE));
                $gambar = $image['file_name'];
            } else {
                $gambar = $this->input->post('old_pict', TRUE);
            }
            $desProduk = $this->input->post('deskripsi_produk', true);
            if ($desProduk == '') {
                $data = [
                    'productName' => $this->input->post('nama_produk', true),
                    'price' => $this->input->post('harga_produk', true),
                    'minOrder' => $this->input->post('minimal_order', true),
                    'productImage' => $gambar
                ];
            } else {
                $data = [
                    'productName' => $this->input->post('nama_produk', true),
                    'productDes' => $this->input->post('deskripsi_produk', true),
                    'price' => $this->input->post('harga_produk', true),
                    'minOrder' => $this->input->post('minimal_order', true),

                    'productImage' => $gambar
                ];
            }
            $this->ModelProduct->updateProducts($data, ['productId' => $this->input->post('id_produk')]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Produk Berhasil di Rubah </div>');
            redirect('admin/updateProduk');
        }
    }
}
