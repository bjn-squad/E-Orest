<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Makanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id_pegawai'))) {
            redirect('auth/loginPegawai', 'refresh');
        }
        $this->load->model('Makanan_model');
        $this->load->model('Gambarmenu_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Pegawai';
        $data['makanan'] = $this->Makanan_model->getAllMakanan();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/makanan/index');
        $this->load->view('admin/layout/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama_makanan', 'nama_makanan', 'required');
        $this->form_validation->set_rules('detail_makanan', 'detail_makanan', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('makanan');
        } else {
            $this->Makanan_model->tambah();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Menambah Data Makanan
          </div>');
            redirect('makanan');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pengumuman';
        $data['makanan'] = $this->Makanan_model->getMakananById($id);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/makanan/detail');
        $this->load->view('admin/layout/footer');
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Makanan';
        $data['makanan'] = $this->Makanan_model->getMakananById($id);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/makanan/edit');
        $this->load->view('admin/layout/footer');
    }

    public function prosesEdit()
    {
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('isi', 'isi', 'required');
        if ($this->form_validation->run() == FALSE) {
            redirect('pegawai');
            // redirect('pengumuman/edit/' . $this->input->post('id_pengumuman'));
        } else {
            $this->pengumuman_model->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Mengedit Pengumuman
          </div>');
            redirect('pengumuman');
        }
    }

    public function delete($id)
    {
        $this->Makanan_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Menghapus Pengumuman.
          </div>');
        redirect('makanan');
    }

    public function gambar($id)
    {
        $check = $this->db->query("SELECT * FROM menu where id_menu = $id");
        if ($check) {
            foreach ($check->result_array() as $result) {
                $data['nama_menu'] = $result['nama_menu'];
            }
            $data['id_menu'] = $id;
            $data['title'] = 'Gambar Makanan';
            $data['gambar'] = $this->Gambarmenu_model->getGambarById($id);
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/layout/side');
            $this->load->view('admin/layout/side-header');
            $this->load->view('admin/makanan/gambar');
            $this->load->view('admin/layout/footer');
        } else {
            redirect('makanan');
        }
    }

    public function tambah_gambar()
    {
        $data = $this->Gambarmenu_model->tambah_gambar();
        if ($data == "True") {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Sukses Tambah Gambar
                </div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Gagal Tambah Gambar
                </div>');
        }
        redirect('makanan/gambar/' . $this->input->post('id_menu'));
    }

    public function hapus_gambar($id_gambar, $id_menu)
    {
        $this->Gambarmenu_model->hapus_gambar($id_gambar);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Menghapus Gambar.
          </div>');
        redirect('makanan/gambar/' . $id_menu);
    }
}
