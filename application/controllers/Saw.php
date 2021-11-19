<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saw extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id_pegawai'))) {
            redirect('auth/loginPegawai', 'refresh');
        }
        if ($this->session->userdata('jabatan') != "admin") {
            redirect('admin');
        }
        $this->load->model('Saw_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Pegawai';
        $data['kriteria'] = $this->Saw_model->get_kriteria();
        $data['pegawai'] = $this->Saw_model->get_pegawai();
        $data['riwayat'] = $this->Saw_model->get_riwayat();

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/saw/index');
        $this->load->view('admin/layout/footer');
    }

    public function tambah_kriteria()
    {
        $this->form_validation->set_rules('nama_kriteria', 'nama_kriteria', 'required');
        $this->form_validation->set_rules('penjelasan_kriteria', 'penjelasan_kriteria', 'required');
        $this->form_validation->set_rules('bobot_kriteria', 'bobot_kriteria', 'required');
        $this->form_validation->set_rules('kategori_bobot', 'kategori_bobot', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('saw');
        } else {
            $this->Saw_model->tambah_kriteria();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Menambah Kriteria
          </div>');
            redirect('saw');
        }
    }

    public function tambah_pegawai()
    {
        $this->form_validation->set_rules('nama_pegawai', 'nama_pegawai', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'SAW';
            $this->load->view('home/layout/header', $data);
            $this->load->view('saw/tambah_pegawai');
            $this->load->view('home/layout/footer');
        } else {
            $this->Saw_model->tambah_pegawai();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Menambah Pegawai
          </div>');
            redirect('saw');
        }
    }

    public function hapus_pegawai($id)
    {
        $this->Saw_model->hapus_pegawai($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Sukses Hapus Data Pegawai
       </div>');
        redirect('saw');
    }

    public function hitung()
    {
        $data['title'] = 'SAW';
        $data['kriteria'] = $this->Saw_model->get_kriteria();
        $data['pegawai'] = $this->Saw_model->get_pegawai();

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/saw/hitung');
        $this->load->view('admin/layout/footer');
    }

    public function simpan_hasil()
    {
        $this->form_validation->set_rules('pegawai_terpilih', 'pegawai_terpilih', 'required');
        if ($this->form_validation->run() != FALSE) {
            $this->Saw_model->tambah_hasil();
        }
    }
}
