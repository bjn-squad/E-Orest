<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Meja extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id_pegawai'))) {
            redirect('auth/loginPegawai', 'refresh');
        }
        $this->load->model('Meja_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Pegawai';
        $data['meja'] = $this->Meja_model->get_meja();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/meja/index');
        $this->load->view('admin/layout/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nomor_meja', 'nomor_meja', 'required');
        $this->form_validation->set_rules('kapasitas', 'kapasitas', 'numeric|required');

        if ($this->form_validation->run() == FALSE) {
            redirect('meja');
        } else {
            $this->Meja_model->tambah_meja();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Menambah Data Meja
          </div>');
            redirect('meja');
        }
    }
}
