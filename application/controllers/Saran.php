<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('saran_model');
    }
    public function index()
    {
        $data['title'] = 'Daftar Kritik & Saran';
        $data['saran_kritik'] = $this->saran_model->getAllSaran();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/kritiksaran/index');
        $this->load->view('admin/layout/footer');
    }
    public function add()
    {
        $this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('saran', 'saran', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Kritik & Saran';
            $this->load->view('home/layout/header', $data);
            $this->load->view('home/saran');
            $this->load->view('home/layout/footer');
        } else {
            $this->saran_model->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Mengirim Kritik & Saran
          </div>');
            redirect('home');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Kritik & Saran';
        $data['saran_kritik'] = $this->saran_model->getSaranById($id);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/kritiksaran/detail');
        $this->load->view('admin/layout/footer');
    }

    public function delete($id)
    {
        $this->saran_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Menghapus Dokumen
          </div>');
        redirect('saran');
    }
}
