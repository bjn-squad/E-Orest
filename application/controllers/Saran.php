<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('saran_model');
    }

    public function getProfilUsaha()
    {
        $getProfil = $this->db->query("SELECT * FROM profil_usaha");
        foreach ($getProfil->result_array() as $profil) {
            $arr['nama_usaha'] = $profil['nama_usaha'];
            $arr['alamat'] = $profil['alamat'];
            $arr['nomor_telepon'] = $profil['nomor_telepon'];
            $arr['maps_link'] = $profil['maps_link'];
            $arr['instagram'] = $profil['instagram'];
            $arr['facebook'] = $profil['facebook'];
            $arr['foto_usaha_1'] = $profil['foto_usaha_1'];
            $arr['foto_usaha_2'] = $profil['foto_usaha_2'];
            $arr['foto_usaha_3'] = $profil['foto_usaha_3'];
        }
        return $arr;
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
        $profil = $this->getProfilUsaha();

        $this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('saran', 'saran', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['nama_usaha'] = $profil['nama_usaha'];
            $data['alamat'] = $profil['alamat'];
            $data['nomor_telepon'] = $profil['nomor_telepon'];
            $data['instagram'] = $profil['instagram'];
            $data['facebook'] = $profil['facebook'];
            $this->load->view('home/layout/header', $data);
            $this->load->view('home/krisar');
            $this->load->view('home/layout/footer');
        } else {
            $this->saran_model->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
           Sukses Mengirim Kritik & Saran!
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
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
           Sukses Menghapus Data Kritik & Saran
          </div>');
        redirect('saran');
    }
}
