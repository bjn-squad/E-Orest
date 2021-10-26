<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pos_model extends CI_Model
{
    public function getTransaksiByInvoice($invoice)
    {
        $query = $this->db->query("SELECT * FROM booking b JOIN menu_dibooking md ON b.id_detail_menu = md.id_detail_menu where b.id_detail_menu = '$invoice'");
        return $query->result_array();
    }

    public function getAllMenuTersedia()
    {
        $query = $this->db->query("SELECT * FROM menu WHERE stok = 'Tersedia'");
        return $query->result_array();
    }
}
