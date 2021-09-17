<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pegawai_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Pegawai';
        $data['pegawai'] = $this->pegawai_model->getPegawaiById($this->session->userdata('id_pegawai'));
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/index');
        $this->load->view('admin/layout/footer');
    }
}

/* End of file Controllername.php */
