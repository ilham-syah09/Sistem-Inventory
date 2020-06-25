<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'Halaman Login';
		$data['page'] = 'auth/login';
		$this->load->view('auth/index', $data, FALSE);
	}
	public function proses()
	{
		$user = $this->input->post('email');
		$pass = $this->input->post('password');
		$this->load->model('M_login');
		$a = $this->M_login->cek_login($user, $pass);
		// var_dump($a);
		// die();
		if ($a == "valid") {
			redirect('Dashboard', 'refresh');
		} else {
			$this->session->set_flashdata('notif', '<div style="text-align: center" class="alert alert-danger">Username atau password salah !!</div>');
			redirect('Auth', 'refresh');
		}
	}
	function logout()
	{
		$this->session->sess_destroy($this->session->userdata('data_login'));
		redirect('Auth', 'refresh');
	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
