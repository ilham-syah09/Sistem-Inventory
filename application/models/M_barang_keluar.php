<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barang_keluar extends CI_Model
{

    public function getAllbarang()
    {
        return $this->db->get('barang_keluar')->result_array();
    }

    public function getKdBrg()
    {
        $this->db->select('kdbrg');
        return $this->db->get('barang')->result_array();
    }


    public function addBarang()
    {
        $kdbrg = $this->input->post('kdbrg', true);
        $stok = $this->db->get_where('barang', ['kdbrg' => $kdbrg])->result_array();
        $stokBaru = $stok[0]['stokbrg'] - $this->input->post('jmlkeluar', true);

        if ($stok) {
            if ($stokBaru >= 0) {
                $data = [
                    "kdbrg" => $kdbrg,
                    "nmbrg" => $stok[0]['nmbrg'],
                    "jmlkeluar" => $this->input->post('jmlkeluar', true),
                    "tanggal" => $this->input->post('tanggal', true)
                ];

                $this->db->insert('barang_keluar', $data);

                $dataStok = [
                    "stokbrg" => $stokBaru
                ];
                $this->db->where('id', $stok[0]['id']);
                $this->db->update('barang', $dataStok);

                $this->session->set_flashdata('flash-success', 'data berhasil ditambah');
            } else {
                $this->session->set_flashdata('flash-error', 'jumlah keluar melampaui stok barang');
            }
        } else {
            $this->session->set_flashdata('flash-error', 'kode barang tidak ditemukan');
        }
    }

    public function delete($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('barang_keluar', ['id' => $id]);
    }

    public function editBarang()
    {
        $kdbrg = $this->input->post('kdbrg', true);
        $stok = $this->db->get_where('barang', ['kdbrg' => $kdbrg])->result_array();
        $stokAwal = $stok[0]['stokbrg'] + $this->input->post('jmlawal', true);
        $stokBaru = $stokAwal - $this->input->post('jmlkeluar', true);

        if ($stok) {
            if ($stokBaru >= 0) {
                $data = [
                    "jmlkeluar" => $this->input->post('jmlkeluar', true),
                    "tanggal" => $this->input->post('tanggal', true)
                ];

                $this->db->where('id', $this->input->post('id'));
                $this->db->update('barang_keluar', $data);

                $dataStok = [
                    "stokbrg" => $stokBaru
                ];
                $this->db->where('id', $stok[0]['id']);
                $this->db->update('barang', $dataStok);

                $this->session->set_flashdata('flash-success', 'data berhasil ditambah');
            } else {
                $this->session->set_flashdata('flash-error', 'jumlah keluar melampaui stok barang');
            }
        } else {
            $this->session->set_flashdata('flash-error', 'kode barang tidak ditemukan');
        }
    }
}
