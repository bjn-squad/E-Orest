<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Meja_model extends CI_Model
{
    public function get_meja()
    {
        $query = $this->db->query("SELECT * FROM meja");
        return $query->result_array();
    }

    public function get_meja_kosong_by_date($array)
    {
        $query =  $this->db->query("SELECT * FROM meja WHERE id_meja NOT IN ( '" . implode("', '", $array) . "' )");
        return $query->result_array();
    }

    public function tambah_meja()
    {
        $data = [
            'nomor_meja' => htmlspecialchars($this->input->post('nomor_meja', true)),
            'kapasitas_meja' => htmlspecialchars($this->input->post('kapasitas', true)),
        ];
        $this->db->insert('meja', $data);
    }

    public function edit_meja()
    {
        $data = [
            "kapasitas_meja" => $this->input->post('kapasitas_meja', true)
        ];
        $this->db->where('id_meja', $this->input->post('id_meja'));
        $this->db->update('meja', $data);
    }

    public function hapus_meja($id)
    {
        $this->db->where('id_meja', $id);
        $this->db->delete('meja');
    }

    public function get_meja_by_id($id)
    {
        $query = $this->db->query("SELECT * FROM meja WHERE id_meja = $id");
        return $query->row();
    }
}
