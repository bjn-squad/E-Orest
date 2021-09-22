<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gambarmenu_model extends CI_Model
{
    public function getGambarById($id)
    {
        $query = $this->db->query("SELECT * FROM gambar_menu gm join menu m on gm.id_menu=m.id_menu where m.id_menu = $id");
        return $query->result_array();
    }
    public function tambah_gambar()
    {
        echo $_FILES['gambar_menu']['name'];
        $file_name = $_FILES['gambar_menu']['name'];
        $newfile_name = str_replace(' ', '', $file_name);
        $config['upload_path']          = './assets/dataresto/menu/';
        $config['allowed_types']        = 'jpg|png';
        $newName = date('dmYHis') . $newfile_name;
        $config['file_name']         = $newName;
        $config['max_size']             = 5100;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('gambar_menu')) {
            return $upload = 1;
            $this->upload->data('file_name');
            $data = [
                "id_menu" => $this->input->post('id_menu'),
                "gambar" => $newName
            ];
            $this->db->insert('gambar_menu', $data);
        } else {
            return $upload = 0;
        }
    }
}
