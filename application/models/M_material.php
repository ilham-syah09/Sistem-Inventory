<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_material extends CI_Model
{

    public function getAllmaterial()
    {
        return $this->db->get('material')->result_array();
    }

     public function addMaterial()
    {
        $data = [
            "nama_material" => $this->input->post('nama_material', true),
            "jumlah" => $this->input->post('jumlah', true),
            "tanggal" => $this->input->post('tanggal', true)
        ];

        $this->db->insert('material', $data);
    }

    public function deleteMaterial($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('material', ['id' => $id]);
    }

    public function editMaterial()
    {
        $data = [
            "nama_material" => $this->input->post('nama_material', true),
            "jumlah" => $this->input->post('jumlah', true),
            "tanggal" => $this->input->post('tanggal', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('material', $data);
    }
}