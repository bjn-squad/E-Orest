<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lupapassword extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pegawai_model');
        $this->load->model('lupapassword_model');
    }

    public function index()
    {
        redirect('lupapassword/tambahPertanyaanKeamanan');
    }

    public function tambahPertanyaanKeamanan()
    {
        if (empty($this->session->userdata('id_pegawai'))) {
            redirect('auth/loginPegawai', 'refresh');
        }
        $this->load->model('Lupapassword_model');
        $cekSetPertanyaan = $this->Lupapassword_model->getStatus($this->session->userdata('id_pegawai'));

        if ($cekSetPertanyaan) {
            redirect('admin');
        }
        $data['title'] = 'Tambah Pertanyaan Keamanan';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('lupapassword/index');
        $this->load->view('admin/layout/footer');
    }

    public function prosesTambahPertanyaanKeamanan()
    {
        if (empty($this->session->userdata('id_pegawai'))) {
            redirect('auth/loginPegawai', 'refresh');
        }
        $this->load->model('Lupapassword_model');
        $cekSetPertanyaan = $this->Lupapassword_model->getStatus($this->session->userdata('id_pegawai'));

        if ($cekSetPertanyaan) {
            redirect('admin');
        }
        $this->form_validation->set_rules('pertanyaankeamanan1', 'pertanyaankeamanan1', 'trim|required');
        $this->form_validation->set_rules('jawabankeamanan1', 'jawabankeamanan1', 'trim|required');
        $this->form_validation->set_rules('pertanyaankeamanan2', 'pertanyaankeamanan2', 'trim|required');
        $this->form_validation->set_rules('jawabankeamanan2', 'jawabankeamanan2', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Pertanyaan Keamanan';
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/layout/side');
            $this->load->view('admin/layout/side-header');
            $this->load->view('lupapassword/index');
            $this->load->view('admin/layout/footer');
        } else {
            $this->Lupapassword_model->tambahPertanyaan();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Pertanyaan Keamanan Telah Diset!
          </div>');
            redirect('admin');
        }
    }

    public function reset()
    {
        $this->load->model('lupapassword_model');
        $this->form_validation->set_rules('email', 'email', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Reset Password';
            $this->load->view('auth/layout/header', $data);
            $this->load->view('lupapassword/resetpassword');
            $this->load->view('auth/layout/footer');
        } else {
            $getEmail = $this->lupapassword_model->getPertanyaan($this->input->post('email'));
            if ($getEmail) {
                foreach ($getEmail as $row);
                $idPegawai = $row->id_pegawai;
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email tidak ditemukan
              </div>');
                redirect('lupapassword/reset');
            }
            $data['loadPertanyaan'] = $this->lupapassword_model->loadPertanyaan($idPegawai);
            $data['title'] = 'Jawab Pertanyaan';
            $this->load->view('auth/layout/header', $data);
            $this->load->view('lupapassword/pertanyaan', $data);
            $this->load->view('auth/layout/footer');
        }
    }

    public function cekJawaban()
    {
        $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'trim|required');
        $this->form_validation->set_rules('jawabankeamanan1', 'jawabankeamanan1', 'trim|required');
        $this->form_validation->set_rules('jawabankeamanan2', 'jawabankeamanan2', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            redirect('lupapassword/reset');
        } else {
            $cekJawaban = $this->lupapassword_model->cekJawaban($this->input->post('id_pegawai'), $this->input->post('jawabankeamanan1'), $this->input->post('jawabankeamanan2'));
            if ($cekJawaban) {
                foreach ($cekJawaban as $row);
                $idPegawai = $row->id_pegawai;
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Jawaban anda salah!<br>Silahkan ulangi lagi.
              </div>');
                redirect('lupapassword/reset');
            }
            $data['id'] = $this->pegawai_model->get_pegawai_by_id($idPegawai);
            $data['title'] = 'Ubah Password';
            $this->load->view('auth/layout/header', $data);
            $this->load->view('lupapassword/gantipasswordlama', $data);
            $this->load->view('auth/layout/footer');
        }
    }
    public function prosesUbahPassword()
    {
        $this->pegawai_model->ubah_password_pegawai($this->input->post('id_pegawai'));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Password anda telah diganti, silahkan login.
              </div>');
        redirect('auth');
    }
}

/* End of file Lupapassword.php */
