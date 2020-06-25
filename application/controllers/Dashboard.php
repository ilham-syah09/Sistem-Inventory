<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('data_login'))) {
			redirect('Auth', 'refresh');
		}
		$this->load->model('M_inventory', 'inventory');
		$this->load->model('M_barang_keluar', 'barang_keluar');
		$this->load->model('M_tools', 'tools');
		$this->load->model('M_material', 'material');
		$this->load->model('M_pegawai', 'pegawai');
	}

	function index()
	{
		$data['title'] = 'CV. Sukses Jaya Mandiri';
		$data['page'] = 'backend/dashboard';
		$this->load->view('backend/index', $data, FALSE);
	}
	function inventory()
	{
		$data['title'] = 'Stok Barang';
		$data['page'] = 'backend/inventory';
		$data['data'] = $this->inventory->getAllbarang();
		$this->load->view('backend/index', $data, FALSE);
	}
	public function addBarang()
	{

		$this->inventory->addBarang();
		$this->session->set_flashdata('flash-success', 'added');

		redirect('Dashboard/inventory');
	}

	public function delete($id)
	{
		$this->inventory->delete($id);
		$this->session->set_flashdata('flash-success', 'deleted');
		redirect('Dashboard/inventory');
	}

	public function editBarang()
	{
		$this->inventory->editBarang();
		$this->session->set_flashdata('flash-success', 'edited');
		redirect('Dashboard/inventory');
	}


	// BARANG KELUAR

	function barang_keluar()
	{
		$data['title'] = 'Barang Keluar';
		$data['page'] = 'backend/barang_keluar';
		$data['data'] = $this->barang_keluar->getAllbarang();
		$data['kdbrg'] = $this->inventory->getAllbarang();
		$this->load->view('backend/index', $data, FALSE);
	}

	public function addBarangk()
	{

		$this->barang_keluar->addBarang();
		$this->session->set_flashdata('flash-success', 'added');
		redirect('Dashboard/barang_keluar');
	}

	public function deletek($id)
	{
		$this->barang_keluar->delete($id);
		$this->session->set_flashdata('flash-success', 'deleted');
		redirect('Dashboard/barang_keluar');
	}

	public function editBarangk()
	{
		$this->barang_keluar->editBarang();
		$this->session->set_flashdata('flash-success', 'deleted');
		redirect('Dashboard/barang_keluar');
	}
	

	// Pengeluaran Tools
	function tools()
	{
		$data['title'] = 'Pengeluaran tools';
		$data['page'] = 'backend/tools';
		$data['data'] = $this->tools->getAlltools();
		$this->load->view('backend/index', $data, FALSE);
	}

	public function addTools()
	{

		$this->tools->addTools();
		$this->session->set_flashdata('flash-success', 'added');
		redirect('Dashboard/tools');
	}

	public function editTools()
	{
		$this->tools->editTools();
		$this->session->set_flashdata('flash-success', 'edited');
		redirect('Dashboard/tools');
	}

	public function deleteTools($id)
	{
		$this->tools->deleteTools($id);
		$this->session->set_flashdata('flash-success', 'deleted');
		redirect('Dashboard/tools');
	}

	//  data bahan material
	function material()
	{
		$data['title'] = 'Data Material';
		$data['page'] = 'backend/material';
		$data['data'] = $this->material->getAllmaterial();
		$this->load->view('backend/index', $data, FALSE);
	}

	public function addMaterial()
	{

		$this->material->addMaterial();
		$this->session->set_flashdata('flash-success', 'added');
		redirect('Dashboard/material');
	}

	public function editMaterial()
	{
		$this->material->editMaterial();
		$this->session->set_flashdata('flash-success', 'edited');
		redirect('Dashboard/material');
	}

	public function deleteMaterial($id)
	{
		$this->material->deleteMaterial($id);
		$this->session->set_flashdata('flash-success', 'deleted');
		redirect('Dashboard/material');
	}

	// data pegawai
	function pegawai()
	{
		$data['title'] = 'Karyawan';
		$data['page'] = 'backend/pegawai';
		$data['data'] = $this->pegawai->getAllpegawai();
		$this->load->view('backend/index', $data, FALSE);
	}

	public function addPegawai()
	{

		$this->pegawai->addPegawai();
		$this->session->set_flashdata('flash-success', 'added');
		redirect('Dashboard/pegawai');
	}

	public function editPegawai()
	{
		$this->pegawai->editPegawai();
		$this->session->set_flashdata('flash-success', 'edited');
		redirect('Dashboard/pegawai');
	}

	public function deletePegawai($id)
	{
		$this->pegawai->deletePegawai($id);
		$this->session->set_flashdata('flash-success', 'deleted');
		redirect('Dashboard/pegawai');
	}


	// cetak pdf

	function pdf()
	{
		$this->load->library('dompdf_gen');

		$data['data'] = $this->db->get('barang')->result_array();
		$this->load->view('backend/laporan', $data);
		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_stokbarang.pdf", array('Attachment' => 0));
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
