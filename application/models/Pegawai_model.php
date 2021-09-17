<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{

    public function getAllPegawai()
    {
        $query = $this->db->query("SELECT * FROM pegawai");
        return $query->result_array();
    }

    public function getPegawaiById($id)
    {
        $query = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai = $id");
        return $query->result_array();
    }
}

/* End of file Pegawai_model.php */
