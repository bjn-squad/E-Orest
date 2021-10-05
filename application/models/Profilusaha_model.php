
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profilusaha_model extends CI_Model
{
    public function getProfilUsaha()
    {
        $query = $this->db->query("SELECT * FROM profil_usaha");
        return $query->result_array();
    }

    public function getMetodePembayaran()
    {
        $query = $this->db->query("SELECT * FROM metode_pembayaran");
        return $query->result_array();
    }

    public function get_metode_by_id($id)
    {
        $query = $this->db->query("SELECT * FROM metode_pembayaran WHERE id_metode = $id");
        return $query->row();
    }

    public function tambah_metode_pembayaran()
    {
        $data = [
            'nama_merchant' => htmlspecialchars($this->input->post('nama_merchant', true)),
            'kode_pembayaran' => htmlspecialchars($this->input->post('kode_pembayaran', true)),
            'atas_nama' => htmlspecialchars($this->input->post('atas_nama', true)),
        ];
        $this->db->insert('metode_pembayaran', $data);
    }

    public function edit_metode_pembayaran()
    {
        $data = [
            'nama_merchant' => htmlspecialchars($this->input->post('nama_merchant', true)),
            'kode_pembayaran' => htmlspecialchars($this->input->post('kode_pembayaran', true)),
            'atas_nama' => htmlspecialchars($this->input->post('atas_nama', true)),
        ];
        $this->db->where('id_metode', $this->input->post('id_metode'));
        $this->db->update('metode_pembayaran', $data);
    }

    public function hapus_metode_pembayaran($id)
    {
        $this->db->where('id_metode', $id);
        $this->db->delete('metode_pembayaran');
    }
}
