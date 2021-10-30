
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class pembayaran_model extends CI_Model
{
    public function getAllBooking()
    {

        $query = $this->db->query("SELECT * FROM booking");
        return $query->result_array();
    }

    public function getBookingById($id)
    {

        $query = $this->db->query("SELECT * FROM booking WHERE id_booking = $id");
        return $query->result_array();
    }

    public function edit()
    {
        $id_booking = $this->input->post('id_booking');
        if ($this->input->post('status_pembayaran') == "Belum Bayar DP") {
            $getDataGambar = $this->db->query("SELECT * FROM booking WHERE id_booking = $id_booking");

            foreach ($getDataGambar->result_array() as $gambar) {
                $gambar_bukti = $gambar['bukti_pembayaran'];
            }
            $pathFBukti = "assets/dataresto/bukti_bayar/";
            unlink($pathFBukti . $gambar_bukti);
            $data = [
                "bukti_pembayaran" => "Gambar Salah"
            ];
            $this->db->where('id_booking', $id_booking);
            $this->db->update('booking', $data);
        } else {
            $data = [
                "status_pembayaran" => $this->input->post('status_pembayaran'),
                "total_sudah_dibayar" => $this->input->post('total_sudah_dibayar')
            ];
            $this->db->where('id_booking', $id_booking);
            $this->db->update('booking', $data);
        }
    }

    public function cariDetail($keyword)
    {
        $query = $this->db->query("SELECT * FROM booking where id_detail_menu like '%$keyword%' ");
        return $query->result_array();
    }

    public function delete($id)
    {
        $this->db->where('id_booking', $id);
        $this->db->delete('booking');
    }

    public function save()
    {
        // Upload Gambar
        if (empty($_FILES['bukti_pembayaran']['name'])) {
            $data = [
                "id_booking" => $this->session->userdata('id_booking'),
                "bukti_pembayaran" => 'Tidak Ada Gambar'
            ];
            $this->db->insert('booking', $data);
        } else {
            $file_name = $_FILES['bukti_pembayaran']['name'];
            $newfile_name = str_replace(' ', '', $file_name);
            $config['upload_path']          = './assets/dataresto/booking/';
            $config['allowed_types']        = 'jpg|png';
            $newName = date('dmYHis') . $newfile_name;
            $config['file_name']         = $newName;
            $config['max_size']             = 5100;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('bukti_pembayaran')) {
                $this->upload->data('file_name');
                $data = [
                    "id_booking" => $this->session->userdata('id_booking'),
                    "bukti_pembayaran" => $newName
                ];
                $this->db->insert('booking', $data);
            }
        }
    }

    public function uploadBuktiBayar()
    {
        $invoice = $this->input->post('invoice');


        $file_name1 = $_FILES['bukti_pembayaran']['name'];
        $newfile_name1 = str_replace(' ', '', $file_name1);
        $config['upload_path']          = './assets/dataresto/bukti_bayar';
        $newName = date('dmYHis') .  $newfile_name1;
        $config['file_name']         = $newName;
        $config['max_size']             = 10100;
        $config['allowed_types']        = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('bukti_pembayaran')) {
            $data = [
                'bukti_pembayaran' => $newName
            ];

            $this->db->where('id_detail_menu', $invoice);
            $this->db->update('booking', $data);
        }
    }
}
