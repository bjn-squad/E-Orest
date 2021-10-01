
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class saran_model extends CI_Model
{
    public function getAllSaran()
    {

        $query = $this->db->query("SELECT * FROM saran_kritik");
        return $query->result_array();
    }

    public function getSaranById($id)
    {
        $query = $this->db->query("SELECT * FROM saran_kritik where id_saran = $id");
        return $query->result_array();
    }

    public function save()
    {
        $data = [
            "nama_pelanggan" => $this->input->post('nama_pelanggan'),
            "email" => $this->input->post('email'),
            "tanggal" => date('Y-m-d'),
            "saran" => $this->input->post('saran')
        ];
        $this->db->insert('saran_kritik', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_saran', $id);
        $this->db->delete('saran_kritik');
    }
}
