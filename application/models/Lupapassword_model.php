<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Lupapassword_model extends CI_Model
{

    public function getStatus($id)
    {
        $query = $this->db->query("SELECT * FROM lupa_password WHERE id_pegawai = $id");
        return $query->result_array();
    }

    public function tambahPertanyaan()
    {
        $data = [
            'id_pegawai' => $this->session->userdata('id_pegawai'),
            'pertanyaankeamanan1' => htmlspecialchars($this->input->post('pertanyaankeamanan1', true)),
            'jawabankeamanan1' => htmlspecialchars($this->input->post('jawabankeamanan1', true)),
            'pertanyaankeamanan2' => htmlspecialchars($this->input->post('pertanyaankeamanan2', true)),
            'jawabankeamanan2' => htmlspecialchars($this->input->post('jawabankeamanan2', true))
        ];
        $this->db->insert('lupa_password', $data);
    }

    public function getPertanyaan($email)
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->where('email', $email);
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function loadPertanyaan($id)
    {
        $query = $this->db->query("SELECT * FROM lupa_password WHERE id_pegawai = $id");
        return $query->result_array();
    }

    public function cekJawaban($id, $j1, $j2)
    {
        $this->db->select('*');
        $this->db->from('lupa_password');
        $this->db->where('id_pegawai', $id);
        $this->db->where("(jawabankeamanan1='$j1' AND jawabankeamanan2='$j2')");
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}

/* End of file Lupapassword_model.php */
