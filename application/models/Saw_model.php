<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Saw_model extends CI_Model
{
    public function get_kriteria()
    {
        $query = $this->db->query("SELECT * FROM saw_kriteria");
        return $query->result_array();
    }

    public function get_pegawai()
    {
        $query = $this->db->query("SELECT * FROM saw_pegawai");
        return $query->result_array();
    }

    public function get_riwayat()
    {
        $query = $this->db->query("SELECT * FROM saw_hasil");
        return $query->result_array();
    }

    function tambah_kriteria()
    {
        $data = [
            'nama_kriteria' => htmlspecialchars($this->input->post('nama_kriteria', true)),
            'penjelasan_kriteria' => htmlspecialchars($this->input->post('penjelasan_kriteria', true)),
            'bobot_kriteria' => htmlspecialchars($this->input->post('bobot_kriteria', true)),
            'kategori_bobot' => htmlspecialchars($this->input->post('kategori_bobot', true)),
        ];
        $this->db->insert('saw_kriteria', $data);
    }

    function tambah_pegawai()
    {
        $data = [
            'nama_pegawai' => htmlspecialchars($this->input->post('nama_pegawai', true)),
        ];
        $this->db->insert('saw_pegawai', $data);
    }

    function tambah_hasil()
    {
        $data = [
            'tanggal_penghitungan' => date('Y-m-d'),
            'pegawai_terpilih' => htmlspecialchars($this->input->post('pegawai_terpilih', true)),
        ];
        $this->db->insert('saw_hasil', $data);
    }

    public function hapus_pegawai($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('saw_pegawai');
    }
}
