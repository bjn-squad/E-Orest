<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id_pegawai'))) {
            redirect('auth/loginPegawai', 'refresh');
        }
        $this->load->model('Pegawai_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Pegawai';
        $data['pegawai'] = $this->Pegawai_model->get_pegawai_by_id($this->session->userdata('id_pegawai'));
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/index');
        $this->load->view('admin/layout/footer');
    }
    public function daftar_pegawai()
    {
        $data['title'] = 'Dashboard Pegawai';
        $data['meja'] = $this->Pegawai_model->getAllPegawai();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/pegawai/index');
        $this->load->view('admin/layout/footer');
    }
    public function tambah_pegawai()
    {
        $this->form_validation->set_rules(
            'email',
            'email',
            'required|is_unique[pegawai.email]',
            array(
                'is_unique'     => 'Email telah digunakan!'
            )
        );
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]', [
            'min_length' => 'Password minimum 5 character'
        ]);
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
        $this->form_validation->set_rules('telepon', 'telepon', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/daftar_pegawai');
        } else {
            $this->Pegawai_model->tambah_pegawai();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Sukses Menambah Data Pegawai
            </div>');
            redirect('admin/daftar_pegawai');
        }
    }
    public function detail_pegawai($id)
    {
        $data['title'] = 'Dashboard Pegawai';
        $data['det'] = $this->Pegawai_model->get_pegawai_by_id($id);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/pegawai/detail');
        $this->load->view('admin/layout/footer');
    }
    public function hapus_pegawai($id)
    {
        if ($this->session->userdata('jabatan') != "admin") {
            redirect('admin');
        } else {
            $this->Pegawai_model->hapus_pegawai($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Sukses Menghapus Data Pegawai
            </div>');
            redirect('admin/daftar_pegawai');
        }
    }
    public function change_password()
    {
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]', [
            'min_length' => 'Password minimum 5 character'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/daftar_pegawai');
        } else {
            $this->Pegawai_model->ubah_password_pegawai();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Sukses Mengubah Password
            </div>');
            redirect('admin/daftar_pegawai');
        }
    }
    public function get_pegawai_by_id($id)
    {
        echo json_encode($this->Pegawai_model->getPegawaiById($id));
    }
}

/* End of file Controllername.php */
