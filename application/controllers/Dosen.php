<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('modcrud');
		if ($this->session->userdata('status') != 'hasloginasdosen') {
			redirect('not-found');
		}
	}

	public function index()
	{
		$this->load->view('dosen/index');
	}

	public function lihat_gaji()
	{
		$month = date("m");
		$year = date("Y");
		$data['gatot'] = $this->modcrud->cek_gaji_dosen($month, $year)->result();
		$this->load->view('dosen/view_gaji', $data);
	}

	function change_passwordd()
	{
		$id = $this->session->userdata('nidn');
		$pwl = input_filter($this->input->post('pwl'));
		$cek = $this->modcrud->cek_dbpassdosen($id)->row();
		if (hash_verified($pwl, $cek->password)) {
			$pwb = input_filter($this->input->post('pwb'));
			$pwk = input_filter($this->input->post('pwk'));
			if ($pwb == $pwk) {
				$update = array('password' => get_hash($pwb));
				$this->modcrud->update_pwd($id, $update);
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Success!</h4>
					Password Berhasil Diubah.
					</div>');
				redirect('dosen-dashboard');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-ban"></i> Failed!</h4> Password Baru dan Konfirmasi Berbeda
					</div>');
				redirect('dosen-dashboard');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-ban"></i> Failed!</h4> Password Lama Salah
				</div>');
			redirect('dosen-dashboard');
		}
	}
}

/* End of file Dosen.php */
/* Location: ./application/controllers/Dosen.php */
