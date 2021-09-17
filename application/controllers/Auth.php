<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
    }

    public function index()
    {
        redirect('auth/loginPegawai', 'refresh');
    }
    public function loginPegawai()
    {
        $data['title'] = 'Login Pegawai';
        $this->load->view('auth/layout/header', $data);
        $this->load->view('auth/login');
        $this->load->view('auth/layout/footer');
    }
    public function prosesLoginPegawai()
    {
        $email = htmlspecialchars($this->input->post('email'));
        $password = htmlspecialchars(MD5($this->input->post('password')));

        $cekLogin = $this->auth_model->loginPegawai($email, $password);

        if ($cekLogin) {
            foreach ($cekLogin as $row);
            $this->session->set_userdata('id_pegawai', $row->id_pegawai);
            $this->session->set_userdata('nama', $row->nama);
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('alamat', $row->alamat);
            $this->session->set_userdata('telepon', $row->jabatan);
            $this->session->set_userdata('jenis_kelamin', $row->jenis_kelamin);
            $this->session->set_userdata('jabatan', $row->jabatan);
            redirect('admin');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Wrong Username or Password!
          </div>');
            redirect('auth/loginPegawai');
        }
    }
    public function logout()
    {
        if ($this->session->userdata('id_pegawai')) {
            $this->session->sess_destroy();
            redirect('auth/loginPegawai', 'refresh');
        }
    }
}

/* End of file Auth.php */
