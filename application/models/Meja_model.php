<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Meja_model extends CI_Model
{
    public function get_meja()
    {
        $query = $this->db->query("SELECT * FROM meja");
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
}
