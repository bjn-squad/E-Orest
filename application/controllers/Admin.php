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
        $this->load->model('transaksi_model');
        $this->load->model('Lupapassword_model');
        $cekSetPertanyaan = $this->Lupapassword_model->getStatus($this->session->userdata('id_pegawai'));

        if (empty($cekSetPertanyaan)) {
            redirect('lupapassword/tambahPertanyaanKeamanan');
        }
        $this->load->model('Pegawai_model');
        $this->load->model('Pos_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Pegawai';
        $data['total_pendapatan'] = $this->transaksi_model->getTotalPendapatanHariIni();
        $data['total_pendapatan_bulan_ini'] = $this->transaksi_model->getTotalPendapatanBulanIni();
        $data['total_transaksi'] = $this->transaksi_model->getTotalTransaksiHariIni();
        $data['total_transaksi_bulan_ini'] = $this->transaksi_model->getTotalTransaksiBulanIni();
        $data['month'] = [
            "januari" => $this->transaksi_model->getJanuari(),
            "februari" => $this->transaksi_model->getFebruari(),
            "maret" => $this->transaksi_model->getMaret(),
            "april" => $this->transaksi_model->getApril(),
            "mei" => $this->transaksi_model->getMei(),
            "juni" => $this->transaksi_model->getJuni(),
            "juli" => $this->transaksi_model->getJuli(),
            "agustus" => $this->transaksi_model->getAgustus(),
            "september" => $this->transaksi_model->getSeptember(),
            "oktober" => $this->transaksi_model->getOktober(),
            "november" => $this->transaksi_model->getNovember(),
            "desember" => $this->transaksi_model->getDesember()
        ];
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

    public function get_transaksi_by_invoice($invoice)
    {
        echo json_encode($this->Pos_model->getTransaksiByInvoice($invoice));
    }

    public function pos($invoice)
    {
        $dataa = $this->db->query("SELECT * FROM booking WHERE id_detail_menu = '$invoice'");
        foreach ($dataa->result_array() as $result) {
            $status = $result['status_pembayaran'];
        }
        if ($status !== "Pesanan Selesai" && $status !== "Belum Bayar DP") {
            $data['title'] = 'Point Of Sale';
            $data['menu'] = $this->Pos_model->getAllMenuTersedia();
            $data['book'] = $this->Pos_model->getTransaksiByInvoice($invoice);
            $data['pemesan'] = $this->Pos_model->getPemesanByInvoice($invoice);
            // $data['invoice']  = $invoice;
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/layout/side');
            $this->load->view('admin/layout/side-header');
            $this->load->view('admin/pos/index');
            $this->load->view('admin/layout/footer');
        } else {
            redirect('penjualan');
        }
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

    public function tambahTransaksiPadaPOS()
    {
        $invoice = $this->input->post('invoice');
        $this->transaksi_model->tambahTransaksiPOS();
        echo $invoice;
    }

    public function cetakInvoice($invoice)
    {
        $profil = $this->getProfilUsaha();
        $data['nama_usaha'] = $profil['nama_usaha'];
        $data['alamat'] = $profil['alamat'];
        $data['book'] = $this->Pos_model->getBookingByInvoice($invoice);
        $data['menu'] = $this->Pos_model->getTransaksiByInvoice($invoice);
        $this->load->view('admin/pos/invoice', $data);
    }
    public function myProfile()
    {
        $data['title'] = 'My Profile';
        $data['det'] = $this->Pegawai_model->get_pegawai_by_id($this->session->userdata('id_pegawai'));
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/pegawai/myProfile');
        $this->load->view('admin/layout/footer');
    }
    public function editMyProfile()
    {
        $data['title'] = 'Edit My Profile';
        $data['det'] = $this->Pegawai_model->get_pegawai_by_id($this->session->userdata('id_pegawai'));
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/pegawai/editMyProfile');
        $this->load->view('admin/layout/footer');
    }
    public function prosesEditMyProfile()
    {
        $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'trim|required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('telepon', 'telepon', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit My Profile';
            $data['det'] = $this->Pegawai_model->get_pegawai_by_id($this->session->userdata('id_pegawai'));
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/layout/side');
            $this->load->view('admin/layout/side-header');
            $this->load->view('admin/pegawai/editMyProfile');
            $this->load->view('admin/layout/footer');
        } else {
            $data   = $this->Pegawai_model->editMyProfile();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Data Berhasil diubah !
          </div>');
            redirect('admin');
        }
    }

    public function ubahPassword()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]', [
            'min_length' => 'Password minimum 5 character'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Ubah Password';
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/layout/side');
            $this->load->view('admin/layout/side-header');
            $this->load->view('admin/pegawai/ubahPassword');
            $this->load->view('admin/layout/footer');
        } else {
            $data = $this->Pegawai_model->ubahPassword();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Password Berhasil Diganti!
           </div>');
            redirect('admin/ubahPassword');
        }
    }
}

/* End of file Controllername.php */
