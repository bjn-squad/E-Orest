<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Makanan_model extends CI_Model
{

    public function getAllMakanan()
    {
        $query = $this->db->query("SELECT * FROM menu");
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
        if (empty($_FILES['gambar']['name'])) {
            $data = [
                "nama_menu" => $this->input->post('nama_menu'),
                "detail_menu" => $this->input->post('detail_menu')
            ];
            $this->db->insert('menu', $data);
        }
    }

    public function edit()
    {
        $pathMakanan = "assets/dataresto/makanan/";
        $id = $this->input->post('id_menu');
        $getDataGambar = $this->db->query("SELECT * FROM menu WHERE id_menu = $id");
        foreach ($getDataGambar->result_array() as $gambar) {
            $gambar = $gambar['gambar'];
        }
        if (empty($_FILES['gambar']['name'])) {
            $data = [
                "nama_menu" => $this->input->post('nama_menu'),
                "detail_menu" => $this->input->post('detail_menu')
            ];
            $this->db->where('id_menu', $id);
            $this->db->update('makanan', $data);
        } else {
            $file_name = $_FILES['gambar']['name'];
            $newfile_name = str_replace(' ', '', $file_name);
            $config['upload_path']          = './assets/dataresto/makanan';
            $config['allowed_types']        = 'jpg|png';
            $newName = date('dmYHis') . $newfile_name;
            $config['file_name']         = $newName;
            $config['max_size']             = 5100;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('gambar')) {
                if ($gambar != "Tidak Ada Gambar") {
                    unlink($pathMakanan . $gambar);
                }
                $this->upload->data('file_name');
                $data = [
                    "nama_menu" => $this->input->post('nama_menu'),
                    "detail_menu" => $this->input->post('detail_menu'),
                    "gambar" => $newName
                ];

                $this->db->where('id_menu', $id);
                $this->db->update('makanan', $data);
            } else {
                $error = array('error' => $this->upload->display_errors());
                return $this->session->set_flashdata('error', $error['error']);
            }
        }
    }

    public function delete($id)
    {
        $this->db->query("SELECT * FROM menu WHERE id_menu = $id");
        // foreach ($getDataGambar->result_array() as $gambar) {
        //     $gambar = $gambar['gambar'];
        // }

        // if ($gambar != "Tidak Ada Gambar") {
        //     unlink($pathMakanan . $gambar);
        // }

        $this->db->where('id_menu', $id);
        $this->db->delete('makanan');
    }
}
