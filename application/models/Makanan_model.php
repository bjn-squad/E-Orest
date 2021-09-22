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
                "id_makanan" => $this->session->userdata('id_makanan'),
                "nama_makanan" => $this->input->post('nama_makanan'),
                "detail_makanan" => $this->input->post('detail_makanan'),
                "gambar" => 'Tidak Ada Gambar'
            ];
            $this->db->insert('makanan', $data);
        } else {
            $file_name = $_FILES['gambar']['name'];
            $newfile_name = str_replace(' ', '', $file_name);
            $config['upload_path']          = './assets/dataresto/makanan/';
            $config['allowed_types']        = 'jpg|png';
            $newName = date('dmYHis') . $newfile_name;
            $config['file_name']         = $newName;
            $config['max_size']             = 5100;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('gambar')) {
                $this->upload->data('file_name');
                $data = [
                    "id_makanan" => $this->session->userdata('id_makanan'),
                    "nama_makanan" => $this->input->post('nama_makanan'),
                    "detail_makanan" => $this->input->post('detail_makanan'),
                    "gambar" => $newName
                ];
                $this->db->insert('makanan', $data);
            }
        }
    }

    public function update()
    {
        $pathMakanan = "assets/dataresto/makanan/";
        $id = $this->input->post('id_makanan');
        $getDataGambar = $this->db->query("SELECT * FROM makanan WHERE id_makanan = $id");
        foreach ($getDataGambar->result_array() as $gambar) {
            $gambar = $gambar['gambar'];
        }
        if (empty($_FILES['gambar']['name'])) {
            $data = [
                "id_makanan" => $this->session->userdata('id_makanan'),
                "nama_makanan" => $this->input->post('nama_makanan'),
                "detail_makanan" => $this->input->post('detail_makanan')
            ];
            $this->db->where('id_makanan', $id);
            $this->db->update('makanan', $data);
        } else {
            $file_name = $_FILES['header_gambar']['name'];
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
                    "id_makanan" => $this->session->userdata('id_makanan'),
                    "nama_makanan" => $this->input->post('nama_makanan'),
                    "detail_makanan" => $this->input->post('detail_makanan'),
                    "gambar" => $newName
                ];

                $this->db->where('id_makanan', $id);
                $this->db->update('makanan', $data);
            } else {
                $error = array('error' => $this->upload->display_errors());
                return $this->session->set_flashdata('error', $error['error']);
            }
        }
    }

    public function delete($id)
    {
        $pathMakanan = "assets/dataresto/makanan/";
        $getDataGambar = $this->db->query("SELECT * FROM makanan WHERE id_makanan = $id");
        foreach ($getDataGambar->result_array() as $gambar) {
            $gambar = $gambar['gambar'];
        }

        if ($gambar != "Tidak Ada Gambar") {
            unlink($pathMakanan . $gambar);
        }

        $this->db->where('id_makanan', $id);
        $this->db->delete('makanan');
    }
}
