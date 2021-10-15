<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Makanan_model extends CI_Model
{

    public function getAllMakanan()
    {
        $query = $this->db->query("SELECT * FROM menu");
        return $query->result_array();
    }

    public function getMakananTersedia()
    {
        $query = $this->db->query("SELECT * FROM menu WHERE stok = 'Tersedia'");
        return $query->result_array();
    }

    public function getMakananById($id)
    {
        $query = $this->db->query("SELECT * FROM menu where id_menu = $id");
        return $query->result_array();
    }

    public function tambah()
    {
        // Upload Gambar
        {
            $data = [
                "nama_menu" => $this->input->post('nama_menu'),
                "detail_menu" => $this->input->post('detail_menu'),
                "kategori" => $this->input->post('kategori'),
                "stok" => $this->input->post('stok'),
                "harga" => $this->input->post('harga')
            ];
            $this->db->insert('menu', $data);
        }
    }

    public function edit()
    {
        $data = [
            "nama_menu" => $this->input->post('nama_menu'),
            "detail_menu" => $this->input->post('detail_menu'),
            "kategori" => $this->input->post('kategori'),
            "stok" => $this->input->post('stok'),
            "harga" => $this->input->post('harga')
        ];
        $this->db->where('id_menu', $this->input->post('id_menu'));
        $this->db->update('menu', $data);
    }

    public function delete($id)
    {
        $pathMenu = "assets/dataresto/menu/";
        $getDataGambar = $this->db->query("SELECT * FROM gambar_menu WHERE id_menu = $id");
        foreach ($getDataGambar->result_array() as $gambar) {
            unlink($pathMenu . $gambar['gambar']);
        }

        $this->db->where('id_menu', $id);
        $this->db->delete('menu');
    }
}
