<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function getProfil()
    {

        $query = $this->db->query("SELECT * FROM profil_usaha");
        return $query->result_array();
    }
}
