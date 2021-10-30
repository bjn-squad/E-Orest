<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id_pegawai'))) {
            redirect('auth/loginPegawai', 'refresh');
        }
        $this->load->model('penjualan_model');
    }

    public function index()
    {
        $data['title'] = 'Laporan Penjualan';
        $data['booking'] = $this->penjualan_model->getAllBooking();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/penjualan/index');
        $this->load->view('admin/layout/footer');
    }

    // public function detail($id)
    // {
    //     $data['title'] = 'Detail';
    //     $data['booking'] = $this->penjualan_model->getBookingById($id);
    //     $this->load->view('admin/layout/header', $data);
    //     $this->load->view('admin/layout/side');
    //     $this->load->view('admin/layout/side-header');
    //     $this->load->view('admin/penjualan/detail');
    //     $this->load->view('admin/layout/footer');
    // }

    public function detail($invoice)
    {
        $data['title'] = 'Detail';
        // $data['booking'] = $this->penjualan_model->getBookingById($id);
        $data['book'] = $this->penjualan_model->getBookingByInvoice($invoice);
        $data['menu'] = $this->penjualan_model->getTransaksiByInvoice($invoice);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/penjualan/detail');
        $this->load->view('admin/layout/footer');
    }

    public function filterLaporanPenjualan()
    {
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');

        $data['title'] = 'Laporan Penjualan';
        $data['startDate'] = $startDate;
        $data['endDate'] = $endDate;
        $data['booking'] = $this->penjualan_model->getBookingByDate($startDate, $endDate);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/penjualan/index');
        $this->load->view('admin/layout/footer');
        // echo json_encode($data);
    }

    public function filterCetakPenjualan()
    {
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');
        $profil = $this->getProfilUsaha();
        $data['nama_usaha'] = $profil['nama_usaha'];
        $data['alamat'] = $profil['alamat'];
        $data['title'] = 'Laporan Penjualan';
        $data['startDate'] = $startDate;
        $data['endDate'] = $endDate;
        $data['booking'] = $this->penjualan_model->getBookingByDate($startDate, $endDate);
        $this->load->view('admin/penjualan/invoice', $data);
    }

    public function cetakLaporanPenjualan()
    {
        $profil = $this->getProfilUsaha();
        $data['nama_usaha'] = $profil['nama_usaha'];
        $data['alamat'] = $profil['alamat'];
        $data['title'] = 'Laporan Penjualan';
        $data['booking'] = $this->penjualan_model->getAllBooking();
        $this->load->view('admin/penjualan/invoice', $data);
    }

    public function getProfilUsaha()
    {
        $getProfil = $this->db->query("SELECT * FROM profil_usaha");
        foreach ($getProfil->result_array() as $profil) {
            $arr['nama_usaha'] = $profil['nama_usaha'];
            $arr['deskripsi'] = $profil['deskripsi'];
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

    public function cetakNotaPenjualan($invoice)
    {
        $profil = $this->getProfilUsaha();
        $data['nama_usaha'] = $profil['nama_usaha'];
        $data['alamat'] = $profil['alamat'];
        $data['title'] = 'Nota Penjualan';
        $data['book'] = $this->penjualan_model->getBookingByInvoice($invoice);
        $data['menu'] = $this->penjualan_model->getTransaksiByInvoice($invoice);
        $this->load->view('admin/penjualan/invoice2', $data);
    }
}
