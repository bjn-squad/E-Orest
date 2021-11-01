
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class penjualan_model extends CI_Model
{
    public function getAllBooking()
    {

        $query = $this->db->query("SELECT * FROM booking");
        return $query->result_array();
    }
    public function getBookingById($id)
    {
        $query = $this->db->query("SELECT * FROM booking WHERE id_booking = $id");
        return $query->result_array();
    }

    public function getBookingByInvoice($invoice)
    {
        $query = $this->db->query("SELECT * FROM booking b JOIN meja m on b.id_meja = m.id_meja WHERE b.id_detail_menu = '$invoice'");
        return $query->row();
    }
    public function getTransaksiByInvoice($invoice)
    {
        $query = $this->db->query("SELECT * FROM menu_dibooking md JOIN  menu as m ON md.nama_makanan = m.nama_menu where md.id_detail_menu = '$invoice'");
        return $query->result_array();
    }

    public function cetakBookingById($id)
    {

        $query = $this->db->query("SELECT * FROM booking WHERE id_booking = $id");
        return $query->result_array();
    }

    public function getBookingByDate($startDate, $endDate)
    {
        $query = $this->db->query("SELECT * FROM booking WHERE (status_pembayaran = 'Sudah Bayar DP' OR status_pembayaran = 'Pesanan Selesai') AND tanggal_reservasi BETWEEN '$startDate' AND '$endDate'");
        return $query->result_array();
    }
}
