<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'E-ORest';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/index');
        $this->load->view('admin/layout/footer');
    }
}

/* End of file Controllername.php */
