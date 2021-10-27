<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }
    public function getTotalPendapatanHariIni()
    {
        $today = date('y-m-d');
        $query = $this->db->query("SELECT SUM(total_sudah_dibayar) as total_pendapatan FROM booking WHERE tanggal_pesan LIKE '%$today%'");
        return $query->row();
    }

    public function getTotalPendapatanBulanIni()
    {
        $monthly = date('y-m');
        $query = $this->db->query("SELECT SUM(total_sudah_dibayar) as total_pendapatan_bulan_ini FROM booking WHERE tanggal_pesan LIKE '%$monthly%'");
        return $query->row();
    }

    public function getTotalTransaksiHariIni()
    {
        $today = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(id_booking) as total_transaksi FROM booking WHERE tanggal_pesan LIKE '%$today%'");
        return $query->row();
    }
    public function getTotalTransaksiBulanIni()
    {
        $monthly = date('y-m');
        $query = $this->db->query("SELECT COUNT(id_booking) as total_transaksi_bulan_ini FROM booking WHERE tanggal_pesan LIKE '%$monthly%'");
        return $query->row();
    }
    public function getJanuari()
    {
        $year = date('y');
        $query = $this->db->query("SELECT SUM(total_sudah_dibayar) as total_harga FROM booking WHERE tanggal_pesan LIKE '%$year-01%' AND total_sudah_dibayar > 0");
        if ($query->row()->total_harga != NULL) {
            return $query->row();
        } else {
            return $row = (object) array(
                "total_harga" => "0"
            );
        }
    }

    public function getFebruari()
    {
        $year = date('y');
        $query = $this->db->query("SELECT SUM(total_sudah_dibayar) as total_harga FROM booking WHERE tanggal_pesan LIKE '%$year-02%' AND total_sudah_dibayar > 0");
        if ($query->row()->total_harga != NULL) {
            return $query->row();
        } else {
            return $row = (object) array(
                "total_harga" => "0"
            );
        }
    }

    public function getMaret()
    {
        $year = date('y');
        $query = $this->db->query("SELECT SUM(total_sudah_dibayar) as total_harga FROM booking WHERE tanggal_pesan LIKE '%$year-03%' AND total_sudah_dibayar > 0");
        if ($query->row()->total_harga != NULL) {
            return $query->row();
        } else {
            return $row = (object) array(
                "total_harga" => "0"
            );
        }
    }

    public function getApril()
    {
        $year = date('y');
        $query = $this->db->query("SELECT SUM(total_sudah_dibayar) as total_harga FROM booking WHERE tanggal_pesan LIKE '%$year-04%' AND total_sudah_dibayar > 0");
        if ($query->row()->total_harga != NULL) {
            return $query->row();
        } else {
            return $row = (object) array(
                "total_harga" => "0"
            );
        }
    }

    public function getMei()
    {
        $year = date('y');
        $query = $this->db->query("SELECT SUM(total_sudah_dibayar) as total_harga FROM booking WHERE tanggal_pesan LIKE '%$year-05%' AND total_sudah_dibayar > 0");
        if ($query->row()->total_harga != NULL) {
            return $query->row();
        } else {
            return $row = (object) array(
                "total_harga" => "0"
            );
        }
    }

    public function getJuni()
    {
        $year = date('y');
        $query = $this->db->query("SELECT SUM(total_sudah_dibayar) as total_harga FROM booking WHERE tanggal_pesan LIKE '%$year-06%' AND total_sudah_dibayar > 0");
        if ($query->row()->total_harga != NULL) {
            return $query->row();
        } else {
            return $row = (object) array(
                "total_harga" => "0"
            );
        }
    }

    public function getJuli()
    {
        $year = date('y');
        $query = $this->db->query("SELECT SUM(total_sudah_dibayar) as total_harga FROM booking WHERE tanggal_pesan LIKE '%$year-07%' AND total_sudah_dibayar > 0");
        if ($query->row()->total_harga != NULL) {
            return $query->row();
        } else {
            return $row = (object) array(
                "total_harga" => "0"
            );
        }
    }

    public function getAgustus()
    {
        $year = date('y');
        $query = $this->db->query("SELECT SUM(total_sudah_dibayar) as total_harga FROM booking WHERE tanggal_pesan LIKE '%$year-08%' AND total_sudah_dibayar > 0");
        if ($query->row()->total_harga != NULL) {
            return $query->row();
        } else {
            return $row = (object) array(
                "total_harga" => "0"
            );
        }
    }

    public function getSeptember()
    {
        $year = date('y');
        $query = $this->db->query("SELECT SUM(total_sudah_dibayar) as total_harga FROM booking WHERE tanggal_pesan LIKE '%$year-09%' AND total_sudah_dibayar > 0");
        if ($query->row()->total_harga != NULL) {
            return $query->row();
        } else {
            return $row = (object) array(
                "total_harga" => "0"
            );
        }
    }

    public function getOktober()
    {
        $year = date('y');
        $query = $this->db->query("SELECT SUM(total_sudah_dibayar) as total_harga FROM booking WHERE tanggal_pesan LIKE '%$year-10%' AND total_sudah_dibayar > 0");
        if ($query->row()->total_harga != NULL) {
            return $query->row();
        } else {
            return $row = (object) array(
                "total_harga" => "0"
            );
        }
    }

    public function getNovember()
    {
        $year = date('y');
        $query = $this->db->query("SELECT SUM(total_sudah_dibayar) as total_harga FROM booking WHERE tanggal_pesan LIKE '%$year-11%' AND total_sudah_dibayar > 0");
        if ($query->row()->total_harga != NULL) {
            return $query->row();
        } else {
            return $row = (object) array(
                "total_harga" => "0"
            );
        }
    }

    public function getDesember()
    {
        $year = date('y');
        $query = $this->db->query("SELECT SUM(total_sudah_dibayar) as total_harga FROM booking WHERE tanggal_pesan LIKE '%$year-12%' AND total_sudah_dibayar > 0");
        if ($query->row()->total_harga != NULL) {
            return $query->row();
        } else {
            return $row = (object) array(
                "total_harga" => "0"
            );
        }
    }
}

/* End of file Transaksi_model.php */
