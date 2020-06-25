<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tools extends CI_Model
{

    public function getAlltools()
    {
        return $this->db->get('tools')->result_array();
    }

    public function getPemohon()
    {
        $this->db->select('nama');
        return $this->db->get('pegawai')->result_array();
    }

    public function addTools()
    {
        $nama = $this->input->post('nama', true);
        $data = [
            "nama_tools" => $this->input->post('nama_tools', true),
            "pemohon" => $this->input->post('pemohon', true),
            "jumlah" => $this->input->post('jumlah', true),
            "harga" => $this->input->post('harga', true),
            "tanggal" => $this->input->post('tanggal', true)
        ];

        $this->db->insert('tools', $data);
    }

    public function editTools()
    {
        $data = [
            "nama_tools" => $this->input->post('nama_tools', true),
            "pemohon" => $this->input->post('pemohon', true),
            "jumlah" => $this->input->post('jumlah', true),
            "harga" => $this->input->post('harga', true),
            "tanggal" => $this->input->post('tanggal', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tools', $data);
    }

    public function deleteTools($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('tools', ['id' => $id]);
    }
}
