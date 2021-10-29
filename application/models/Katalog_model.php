<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Katalog_model extends CI_Model
{
    public function getProfil()
    {
        $query = $this->db->query("SELECT * FROM profil_usaha");
        return $query->result_array();
    }
    public function getAllMakanan()
    {
        $query = $this->db->query("SELECT * FROM menu");
        return $query->result_array();
    }
    public function getMakananById($id)
    {
        $query = $this->db->query("SELECT * FROM menu where id_menu = $id");
        return $query->result_array();
    }
    public function getGambarById($id_menu)
    {
        $query = $this->db->query("SELECT * FROM gambar_menu gm join menu m on gm.id_menu=m.id_menu WHERE m.id_menu = $id_menu");
        return $query->result_array();
    }
}
