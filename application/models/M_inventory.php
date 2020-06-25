<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_inventory extends CI_Model
{

    public function getAllbarang()
    {
        return $this->db->get('barang')->result_array();
    }


    public function addBarang()
    {
        $data = [
            "kdbrg" => $this->input->post('kdbrg', true),
            "nmbrg" => $this->input->post('nmbrg', true),
            "stokbrg" => $this->input->post('stokbrg', true),
            "hrgbrg" => $this->input->post('hrgbrg', true)
        ];

        $this->db->insert('barang', $data);
    }

    public function delete($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('barang', ['id' => $id]);
    }

    public function editBarang()
    {
        $data = [
            "kdbrg" => $this->input->post('kdbrg', true),
            "nmbrg" => $this->input->post('nmbrg', true),
            "stokbrg" => $this->input->post('stokbrg', true),
            "hrgbrg" => $this->input->post('hrgbrg', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('barang', $data);
    }
}
