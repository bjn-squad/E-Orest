<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function getProfil()
    {
        $query = $this->db->query("SELECT * FROM profil_usaha");
        return $query->result_array();
    }

    public function tambahBooking()
    {
        date_default_timezone_set('Asia/Jakarta');

        $tanggal_batas_bayar =  date('Y-m-d H:i:s', strtotime('+1 day'));


        $invoice = "INV" . date("YmdHis");

        if ($this->input->post("hidden_nomor_hp") == "") {
            $no_hp = 0;
        } else {
            $no_hp = $this->input->post("hidden_nomor_hp");
        }

        $data_booking = [
            "id_detail_menu" => $invoice,
            "id_meja" => $this->input->post("hidden_id_meja"),
            "nama_pemesan" => $this->input->post("hidden_nama_pemesan"),
            "nomor_hp" => $no_hp,
            "tanggal_pesan" => date('Y-m-d H:i:s'),
            "tanggal_reservasi" => $this->input->post('hidden_tanggal_reservasi'),
            "total_pembayaran" => $this->input->post("hidden_total_harga"),
            "batas_pembayaran_dp" => $tanggal_batas_bayar,
            "status_pembayaran" => "Belum Bayar DP",
            "bukti_pembayaran" => "Kosong"
        ];
        $this->db->insert('booking', $data_booking);

        $count_menu = count($_POST['hidden_nama_makanan']);

        for ($count = 0; $count < $count_menu; $count++) {
            $data_menu_dibooking = array(
                'id_detail_menu' => $invoice,
                'nama_makanan' => $_POST['hidden_nama_makanan'][$count],
                'jumlah' => $_POST['hidden_jumlah_makanan'][$count],
                'sub_total' => $_POST['hidden_subtotal_makanan'][$count]
            );
            $this->db->insert('menu_dibooking', $data_menu_dibooking);
        }

        return $invoice;
    }
    public function afterBuy($id)
    {
        $query = $this->db->query("SELECT * FROM booking as b 
                                    JOIN menu_dibooking as mb ON b.id_detail_menu = mb.id_detail_menu
                                    WHERE b.id_detail_menu = '$id' LIMIT 1");
        return $query->result_array();
    }
    public function pembayaran()
    {
        $query = $this->db->query("SELECT * FROM metode_pembayaran");
        return $query->result_array();
    }
}
