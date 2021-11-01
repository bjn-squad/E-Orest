<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->model('Gambarmenu_model');
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

    public function index()
    {
        $profil = $this->getProfilUsaha();
        $data['gambar_menu'] = $this->Gambarmenu_model->getAllGambar();
        $data['nama_usaha'] = $profil['nama_usaha'];
        $data['deskripsi'] = $profil['deskripsi'];
        $data['alamat'] = $profil['alamat'];
        $data['nomor_telepon'] = $profil['nomor_telepon'];
        $data['instagram'] = $profil['instagram'];
        $data['facebook'] = $profil['facebook'];
        $data['maps_link'] = $profil['maps_link'];

        // Khusus Slider
        $data['foto_usaha_1'] = $profil['foto_usaha_1'];
        $data['foto_usaha_2'] = $profil['foto_usaha_2'];
        $data['foto_usaha_3'] = $profil['foto_usaha_3'];

        $this->load->view('home/layout/header', $data);
        $this->load->view('home/index');
        $this->load->view('home/layout/footer');
    }

    public function booking()
    {
        $this->load->model('Meja_model');
        $this->load->model('Makanan_model');

        $profil = $this->getProfilUsaha();
        $data['nama_usaha'] = $profil['nama_usaha'];
        $data['deskripsi'] = $profil['deskripsi'];
        $data['alamat'] = $profil['alamat'];
        $data['nomor_telepon'] = $profil['nomor_telepon'];
        $data['instagram'] = $profil['instagram'];
        $data['facebook'] = $profil['facebook'];
        $data['maps_link'] = $profil['maps_link'];

        $data['menu'] = $this->Makanan_model->getMakananTersedia();

        $this->load->view('home/layout/header', $data);
        $this->load->view('home/booking');
        $this->load->view('home/layout/footer');
    }

    public function getMejaKosong($tanggal)
    {
        $this->load->model('Meja_model');
        $arrayMeja = [];

        $getMejaReserved =  $this->db->query("SELECT * FROM booking WHERE tanggal_reservasi LIKE '$tanggal%' AND status_pembayaran != 'Sudah Bayar DP'");
        foreach ($getMejaReserved->result_array() as $meja) {
            array_push($arrayMeja, $meja['id_meja']);
        }
        $data['meja_not_reserved'] = $this->Meja_model->get_meja_kosong_by_date($arrayMeja);

        echo json_encode($data['meja_not_reserved']);
    }

    public function getMenu()
    {
        $this->load->model('Makanan_model');

        $data['menu'] = $this->Makanan_model->getMakananTersedia();

        echo json_encode($data['menu']);
    }

    public function tambahPesanan()
    {
        $profil = $this->getProfilUsaha();
        $data['nama_usaha'] = $profil['nama_usaha'];
        $data['deskripsi'] = $profil['deskripsi'];
        $data['alamat'] = $profil['alamat'];
        $data['nomor_telepon'] = $profil['nomor_telepon'];
        $data['instagram'] = $profil['instagram'];
        $data['facebook'] = $profil['facebook'];
        $data['maps_link'] = $profil['maps_link'];
        $data_invoice = $this->Home_model->tambahBooking();

        $data['title'] = 'Dashboard Pegawai';
        $data['home'] = $this->Home_model->afterBuy($data_invoice);
        $data['bayar'] = $this->Home_model->pembayaran();

        $this->load->view('home/layout/header', $data);
        $this->load->view('home/after_buy', $data);
        $this->load->view('home/layout/footer');
    }
}
