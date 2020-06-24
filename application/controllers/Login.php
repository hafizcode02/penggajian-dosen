<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('modlogin');
	}

	public function index()
	{
		if (isset($_POST['submit'])) {
			$this->form_validation->set_rules('username', 'Username', 'required|max_length[12]');
			$this->form_validation->set_rules('password', 'Password', 'required|max_length[12]');
			$this->form_validation->set_message('required', '{field} Kosong , silahkan diisi');
			$this->form_validation->set_error_delimiters("<div class='alert alert-danger alert-dismissible fade in'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='icon fa fa-ban'></i>", "</div>");
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('form_login');
			} else {
				$username = input_filter($this->input->post('username'));
				$filterus = $this->security->xss_clean($username);
				if ($this->modlogin->checkdb($filterus)->num_rows() == 1) {
					$db = $this->modlogin->checkdb($filterus)->row();
					$password = input_filter($this->input->post('password'));
					$filterpw = $this->security->xss_clean($password);
					if (hash_verified($filterpw, $db->password)) {
						$datasesi = array('status' => "haslogin");
						$this->session->set_userdata($datasesi);
						$set = array(
							'nama' => $db->full_name,
							'username'=> $db->username,
							'id' => $db->idmin
						);
						$this->session->set_userdata($set);
						redirect('admin-dashboard');
					} else {
						$data['pesan'] = "<div class='alert alert-danger alert-dismissible' style='height: 50px;'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<i class='icon fa fa-ban'></i> Maaf Username atau Password Salah</div>";
						$this->load->view('form_login', $data);
					}
				} elseif ($this->modlogin->checkdosen($filterus)->num_rows() == 1) {
					$db = $this->modlogin->checkdosen($filterus)->row();
					$password = input_filter($this->input->post('password'));
					$filterpw = $this->security->xss_clean($password);
					if (hash_verified($filterpw, $db->password)) {
						$datasesi = array('status' => "hasloginasdosen");
						$this->session->set_userdata($datasesi);
						$set = array(
							'nama' => $db->nama,
							'level' => $db->id_gaji,
							'nidn' => $db->nidn
						);
						$this->session->set_userdata($set);
						redirect('dosen-dashboard');
					} else {
						$data['pesan'] = "<div class='alert alert-danger alert-dismissible' style='height: 50px;'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<i class='icon fa fa-ban'></i> Maaf Username atau Password Salah</div>";
						$this->load->view('form_login', $data);
					}
				} else {
					$data['pesan'] = "<div class='alert alert-danger alert-dismissible' style='height: 50px;'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<i class='icon fa fa-ban'></i> Maaf akun tidak ditemukan</div>";
					$this->load->view('form_login', $data);
				}
			}
		} else {
			$this->load->view('form_login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
