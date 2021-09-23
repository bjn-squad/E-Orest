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
        $this->form_validation->set_rules('nama_menu', 'nama_menu', 'required');
        $this->form_validation->set_rules('detail_menu', 'detail_menu', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('makanan');
        } else {
            $this->Makanan_model->tambah();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Menambah Data Menu
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
        $data['title'] = 'Edit Menu';
        $data['makanan'] = $this->Makanan_model->getMakananById($id);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/makanan/edit');
        $this->load->view('admin/layout/footer');
    }

    public function prosesEdit()
    {
        $this->form_validation->set_rules('nama_menu', 'nama_menu', 'required');
        $this->form_validation->set_rules('detail_menu', 'detail_menu', 'required');
        if ($this->form_validation->run() == FALSE) {
            redirect('makanan');
            // redirect('pengumuman/edit/' . $this->input->post('id_pengumuman'));
        } else {
            $this->Makanan_model->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Mengedit Menu
          </div>');
            redirect('makanan');
        }
    }

    public function delete($id)
    {
        $this->Makanan_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Menghapus Menu.
          </div>');
        redirect('makanan');
    }

    public function gambar($id)
    {
        $data['id_menu'] = $id;
        $data['title'] = 'Gambar Makanan';
        $data['gambar'] = $this->Gambarmenu_model->getGambarById($id);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/makanan/gambar');
        $this->load->view('admin/layout/footer');
    }

    public function tambah_gambar()
    {
        $this->form_validation->set_rules('id_menu', 'id_menu', 'required');
        $this->form_validation->set_rules('gambar_menu', 'gambar_menu', 'required');
        if ($this->form_validation->run() == FALSE) {
            redirect('makanan/gambar/' . $this->input->post('id_menu'));
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Gambar Wajib Diisi
          </div>');
            // redirect('pengumuman/edit/' . $this->input->post('id_pengumuman'));
        } else {
            echo $this->upload->data();
            echo $this->Gambarmenu_model->tambah_gambar();
            if ($this->Gambarmenu_model->tambah_gambar() == 1) {

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Sukses Tambah Gambar
                </div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Gagal Tambah Gambar
                </div>');
            }
            // redirect('makanan/gambar/' . $this->input->post('id_menu'));
        }
    }
}
