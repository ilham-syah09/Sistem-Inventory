<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pegawai extends CI_Model
{

    public function getAllpegawai()
    {
        return $this->db->get('pegawai')->result_array();
    }

    public function addPegawai()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "alamat" => $this->input->post('alamat', true),
            "kontak" => $this->input->post('kontak', true),
            "tgl" => $this->input->post('tgl', true)
        ];

        $this->db->insert('pegawai', $data);
    }

    public function editPegawai()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "alamat" => $this->input->post('alamat', true),
            "kontak" => $this->input->post('kontak', true),
            "tgl" => $this->input->post('tgl', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('pegawai', $data);
    }

    public function deletePegawai($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('pegawai', ['id' => $id]);
    }
}