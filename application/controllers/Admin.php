<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('modcrud');
		if ($this->session->userdata('status') != 'haslogin') {
			redirect('not-found');
		}
	}

	public function index()
	{
		$data['dosen'] = $this->modcrud->row_dosen();
		$data['gaji'] = $this->modcrud->row_gaji();
		$data['penggajian'] = $this->modcrud->row_pgj();
		$this->load->view('admin/index', $data);
	}

	//awal data dosen
	function dosen()
	{
		$data['dosen'] = $this->modcrud->data_dosen()->result();
		$this->load->view('admin/datadosen', $data);
	}

	function tambah_dosen()
	{
		if ($this->modcrud->data_gaji()->num_rows() < 2) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible alert-custom">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-ban"></i> Failed!</h4> Harap isi data gaji terlebih dahulu
					</div>');
			redirect('data-dosen', 'refresh');
		} else {
			$data['gaji'] = $this->modcrud->data_gaji()->result();
			$data['agama'] = $this->modcrud->get_agama()->result();
			$data['jk'] = $this->modcrud->get_jk()->result();
			$this->load->view('admin/datadosen_tambah', $data);
		}
	}


	function aksi_tambah_dosen()
	{
		$this->_filter_tambah();
		if ($this->form_validation->run() == true) {
			$nidn = character_filter($this->input->post('nidn'));
			if ($this->modcrud->check_nidn($nidn)->num_rows() == 1) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible alert-custom">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-ban"></i> Failed!</h4> NIDN Sudah Digunakan
					</div>');
				redirect('data-dosen', 'refresh');
			} else {
				$data = array(
					'nidn' => $this->input->post('nidn', TRUE),
					'nama' => $this->input->post('nama', TRUE),
					'alamat' => $this->input->post('alamat', TRUE),
					'id_jk' => $this->input->post('jk', TRUE),
					'id_agama' => $this->input->post('agama', TRUE),
					'id_gaji' => $this->input->post('id_gaji', TRUE),
					'password' => get_hash($this->input->post('password', TRUE)),
					'sertifikasi' => $this->input->post('uangsertifikasi', TRUE)
				);
				$this->modcrud->input_dosen('dosen', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible alert-custom">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Success!</h4>
					Data Dosen Berhasil Diinputkan.
					</div>');
				redirect('data-dosen', 'refresh');
			}
		} else {
			$data['gaji'] = $this->modcrud->data_gaji()->result();
			$data['agama'] = $this->modcrud->get_agama()->result();
			$data['jk'] = $this->modcrud->get_jk()->result();
			$this->load->view('admin/datadosen_tambah', $data);
		}
	}

	function edit_dosen()
	{
		$id = $this->uri->segment(3);
		$data['tampil'] = $this->modcrud->get_edit_dosen($id)->row_array();
		$data['gaji'] = $this->modcrud->data_gaji()->result();
		$data['agama'] = $this->modcrud->get_agama()->result();
		$data['jk'] = $this->modcrud->get_jk()->result();
		$this->load->view('admin/datadosen_edit', $data);
	}

	function aksi_edit_dosen()
	{
		$this->_filter_edit();
		$nidn = $this->uri->segment(3);
		if ($this->form_validation->run() == true) {
			if ($this->input->post('password') != '') {
				$data = array(
					'nidn' => $nidn,
					'nama' => $this->input->post('nama', TRUE),
					'alamat' => $this->input->post('alamat', TRUE),
					'id_jk' => $this->input->post('jk', TRUE),
					'id_agama' => $this->input->post('agama', TRUE),
					'id_gaji' => $this->input->post('id_gaji', TRUE),
					'password' => get_hash($this->input->post('password', TRUE)),
					'sertifikasi' => $this->input->post('uangsertifikasi', TRUE)
				);
				$datafilter = $this->security->xss_clean($data);
				$this->modcrud->update_dosen($nidn, $datafilter);
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible alert-custom">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Success!</h4>
					Data Dosen Berhasil Diupdate.
					</div>');
				redirect('data-dosen', 'refresh');
			} else {
				$data = array(
					'nidn' => $nidn,
					'nama' => $this->input->post('nama', TRUE),
					'alamat' => $this->input->post('alamat'),
					'id_jk' => $this->input->post('jk', TRUE),
					'id_agama' => $this->input->post('agama', TRUE),
					'id_gaji' => $this->input->post('id_gaji', TRUE),
					'sertifikasi' => $this->input->post('uangsertifikasi', TRUE)
				);
				$datafilter = $this->security->xss_clean($data);
				$this->modcrud->update_dosen($nidn, $datafilter);
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible alert-custom">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Success!</h4>
					Data Dosen Berhasil Diupdate.
					</div>');
				redirect('data-dosen', 'refresh');
			}
		} else {
			$this->load->view('admin/datadosen_edit');
		}
	}

	function delete_dosen()
	{
		$id = $this->input->post('idhapus');
		if ($this->modcrud->cek_dosen_delete($id)->num_rows() > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible alert-custom">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-ban"></i> Failed!</h4> Data Memiliki Relasi Dengan Data Lain
				</div>');
			redirect('data-dosen', 'refresh');
		} else {
			$this->modcrud->hapus('nidn', $id, 'dosen');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible alert-custom">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-check"></i> Success!</h4>
				Data Dosen Berhasil Dihapus.
				</div>');
			redirect('data-dosen', 'refresh');
		}
	}

	function _filter_tambah()
	{
		$this->form_validation->set_rules('nidn', 'NIDN', 'trim|required|min_length[5]|max_length[10]');
		$this->form_validation->set_rules('nama', 'Nama Dosen', 'trim|required|max_length[55]|alpha_space');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required|max_length[15]');
		$this->form_validation->set_rules('agama', 'Agama', 'required|trim|required|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[16]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger alert-dismissible fade in alert-custom-s'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='icon fa fa-ban'></i>", "</div>");
	}

	function _filter_edit()
	{
		$this->form_validation->set_rules('nidn', 'NIDN', 'trim|required|min_length[5]|max_length[10]');
		$this->form_validation->set_rules('nama', 'Nama Dosen', 'trim|required|max_length[55]|alpha_space');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required|max_length[15]');
		$this->form_validation->set_rules('agama', 'Agama', 'required|trim|required|max_length[15]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger alert-dismissible fade in alert-custom-s'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><i class='icon fa fa-ban'></i>", "</div>");
	}

	//akhir data dosen

	//awal data gaji

	function datagaji()
	{
		$data['row'] = $this->modcrud->row_gaji();
		$data['gaji'] = $this->modcrud->data_gaji()->result();
		$this->load->view('admin/datagaji', $data);
	}

	function tambah_data()
	{
		$data['row'] = $this->modcrud->row_gaji();
		$data['status'] = $this->modcrud->get_status()->result();
		$this->load->view('admin/datagaji_tambah', $data);
	}

	function tambah_aksi()
	{
		$ids = $this->input->post('id_status');
		if ($this->modcrud->cek_penambahan_data_gaji($ids)->num_rows() > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible alert-custom">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-ban"></i> Failed!</h4> Status Untuk Data Gaji Sudah Digunakan
				</div>');
			redirect('data-gaji', 'refresh');
		} else {
			$data = array(
				'id_status' => $this->input->post('id_status', TRUE),
				'gapok' => $this->input->post('gapok', TRUE),
				'kesehatan' => $this->input->post('kesehatan', TRUE),
				'transport' => $this->input->post('transport', TRUE),
				'makan' => $this->input->post('makan', TRUE),
			);
			$datafilter = $this->security->xss_clean($data);
			$this->modcrud->input_dosen('data_gaji', $datafilter);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible alert-custom">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-check"></i> Success!</h4>
				Data Gaji Berhasil Diinputkan.
				</div>');
			redirect('data-gaji');
		}
	}

	function tampil_edit()
	{
		$id = $this->uri->segment(3);
		$data['edit'] = $this->modcrud->get_edit_gaji($id)->row_array();
		$this->load->view('admin/datagaji_edit', $data);
	}

	function edit_aksi()
	{
		$id = $this->uri->segment(3);
		$data = array(
			'gapok' => $this->input->post('gapok', TRUE),
			'kesehatan' => $this->input->post('kesehatan', TRUE),
			'transport' => $this->input->post('transport', TRUE),
			'makan' => $this->input->post('makan', TRUE)
		);
		$datafilter = $this->security->xss_clean($data);
		$this->modcrud->update_gaji($id, $datafilter);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible alert-custom">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-check"></i> Success!</h4>
			Data Gaji Berhasil Diupdate.
			</div>');
		redirect('data-gaji');
	}

	function hapus_aksi()
	{
		$id = $this->input->post('idhapus', TRUE);
		if ($this->modcrud->cek_datagaji_delete($id)->num_rows() > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible alert-custom">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-ban"></i> Failed!</h4> Data Memiliki Relasi Dengan Data Lain
				</div>');
			redirect('data-gaji', 'refresh');
		} else {
			$this->modcrud->hapus('id_gaji', $id, 'data_gaji');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible alert-custom">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-check"></i> Success!</h4>
				Data Gaji Berhasil Dihapus.
				</div>');
			redirect('data-gaji', 'refresh');
		}
	}

	//akhir data gaji

	//awal penggajian

	function data_penggajian()
	{
		$data['penggajian'] = $this->modcrud->data_penggajian()->result();
		$this->load->view('admin/datapenggajian', $data);
	}

	function tambah_penggajian()
	{
		$data['dosen'] = $this->modcrud->data_dosen()->result();
		$this->load->view('admin/datapenggajian_tambah', $data);
	}

	function aksi_tambah()
	{
		$nidn = $this->input->post('dosen');
		$data = $this->modcrud->ambil_gaji($nidn)->row_array();
		$abc = $data['honor'];
		$month = date("m");
		$year = date("Y");
		if ($this->modcrud->cek_menggaji_dosen($nidn, $month, $year)->num_rows() > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible alert-custom">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-ban"></i> Failed!</h4> Anda Sudah Menggaji Dosen Tersebut Bulan Ini
				</div>');
			redirect('data-penggajian');
		} else {
			$h1 = $this->input->post('skshadir', TRUE);
			$h2 = $this->input->post('absenhadir', TRUE);
			$h3 = $abc;
			$data = array(
				'nidn' => $this->input->post('dosen', TRUE),
				'tgl_penggajian' => date("Y-m-d", strtotime($this->input->post('tanggal', TRUE))),
				'gaji_sks' => ($h1 * $h2) * $h3
			);
			$datafilter = $this->security->xss_clean($data);
			$this->modcrud->input_dosen('rekap_gaji', $datafilter);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible alert-custom">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-check"></i> Success!</h4>
				Penggajian Berhasil Dihitung.
				</div>');
			redirect('data-penggajian');
		}
	}

	function cetak_penggajian()
	{
		$id = $this->uri->segment('3');
		$data = $this->modcrud->cetak_gaji_penggajian($id)->result();
		$jumlah = 0;
		$nama = "";

		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();
		$pdf->SetLeftMargin(22);
		$pdf->SetAutoPageBreak(true);

		//set header
		$pdf->Image(base_url() . "template/stb.png", 17, 10, 30, 30);
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->SetY(15);
		$pdf->SetX(7);
		$pdf->Cell(230, 6, 'SEKOLAH TINGGI ILMU BAHASA ASING INVADA', 0, 1, 'C');
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->SetX(7);
		$pdf->Cell(230, 6, "SLIP GAJI", 0, 1, 'C');
		$pdf->SetFont('Arial', '', 12);
		$pdf->SetX(7);
		$pdf->Cell(230, 6, 'Jalan Brigjen Darsono Telp 089644481187 Cirebon 45131', 0, 1, 'C');
		$pdf->SetX(7);
		$pdf->Cell(230, 6, 'Website: http://stibainvada.ac.id/ E-mail: stibainvada.cirebon@gmail.com', 0, 1, 'C');

		//line break
		$pdf->SetLineWidth(0.5);
		$pdf->Line(22, 43, 192, 43);
		$pdf->SetLineWidth(0.1);
		$pdf->SetX(33);
		$pdf->Cell(10, 9, '', 0, 1);

		//identity
		foreach ($data as $key) {
			$nama = $key->nama;
			$pdf->SetFont('Arial', '', 12);

			$pdf->Cell(35, 8, 'NIDN', 0, 0);
			$pdf->Cell(9, 8, ':', 0, 0);
			$pdf->Cell(27, 8, $key->nidn, 0, 0);
			$pdf->Cell(30, 8, '', 0, 0);
			$pdf->Cell(25, 8, 'Tanggal', 0, 0);
			$pdf->Cell(4, 8, ':', 0, 0);
			$pdf->Cell(27, 8, tgl_indonesia($key->tgl_penggajian), 0, 1);

			$pdf->Cell(35, 8, 'Nama Dosen', 0, 0);
			$pdf->Cell(9, 8, ':', 0, 0);
			$pdf->Cell(27, 8, $key->nama, 0, 1);

			$pdf->Cell(35, 8, 'Status', 0, 0);
			$pdf->Cell(9, 8, ':', 0, 0);
			$pdf->Cell(27, 8, $key->status, 0, 1);

			$pdf->Cell(10, 4, '', 0, 1);

			$pdf->SetFont('Arial', 'B', 10);
			$pdf->SetDrawColor(198, 198, 198);
			$pdf->setFillColor(225, 225, 225);
			$pdf->Cell(10, 8, 'No', 'L,T,B', 0, 'C', TRUE);
			$pdf->Cell(80, 8, 'Keterangan', 'L,T,B', 0, 'C', TRUE);
			$pdf->Cell(80, 8, 'Gaji Diterima', 1, 1, 'C', TRUE);

			$pdf->SetFont('Arial', 'B', 10);
			$pdf->SetDrawColor(198, 198, 198);
			$pdf->setFillColor(249, 249, 249);
			if ($key->status == "Dosen Tetap") {
				$pdf->Cell(10, 8, '1', 'L,T,B', 0, 'C', TRUE);
				$pdf->Cell(80, 8, 'Gaji Pokok', 'L,T,B', 0, '', TRUE);
				$pdf->Cell(80, 8, "Rp. " . number_format($key->gapok), 1, 1, '', TRUE);

				$pdf->Cell(10, 8, '2', 'L,T,B', 0, 'C', TRUE);
				$pdf->Cell(80, 8, 'Tunjangan Kesehatan', 'L,T,B', 0, '', TRUE);
				$pdf->Cell(80, 8, "Rp. " . number_format($key->kesehatan), 1, 1, '', TRUE);

				$pdf->Cell(10, 8, '3', 'L,T,B', 0, 'C', TRUE);
				$pdf->Cell(80, 8, 'Tunjangan Transportasi', 'L,T,B', 0, '', TRUE);
				$pdf->Cell(80, 8, "Rp. " . number_format($key->transport), 1, 1, '', TRUE);

				$pdf->Cell(10, 8, '4', 'L,T,B', 0, 'C', TRUE);
				$pdf->Cell(80, 8, 'Uang Makan', 'L,T,B', 0, '', TRUE);
				$pdf->Cell(80, 8, "Rp. " . number_format($key->makan), 1, 1, '', TRUE);

				$pdf->Cell(10, 8, '4', 'L,T,B', 0, 'C', TRUE);
				$pdf->Cell(80, 8, 'Gaji Mengajar', 'L,T,B', 0, '', TRUE);
				$pdf->Cell(80, 8, "Rp. " . number_format($key->gaji_sks), 1, 1, '', TRUE);

				$pdf->Cell(10, 8, '5', 'L,T,B', 0, 'C', TRUE);
				$pdf->Cell(80, 8, 'Uang Sertifikasi', 'L,T,B', 0, '', TRUE);
				$pdf->Cell(80, 8, "Rp. " . number_format($key->sertifikasi), 1, 1, '', TRUE);
			} else {

				$pdf->Cell(10, 8, '1', 'L,T,B', 0, 'C', TRUE);
				$pdf->Cell(80, 8, 'Tunjangan Kesehatan', 'L,T,B', 0, '', TRUE);
				$pdf->Cell(80, 8, "Rp. " . number_format($key->kesehatan), 1, 1, '', TRUE);

				$pdf->Cell(10, 8, '2', 'L,T,B', 0, 'C', TRUE);
				$pdf->Cell(80, 8, 'Tunjangan Transportasi', 'L,T,B', 0, '', TRUE);
				$pdf->Cell(80, 8, "Rp. " . number_format($key->transport), 1, 1, '', TRUE);

				$pdf->Cell(10, 8, '3', 'L,T,B', 0, 'C', TRUE);
				$pdf->Cell(80, 8, 'Uang Makan', 'L,T,B', 0, '', TRUE);
				$pdf->Cell(80, 8, "Rp. " . number_format($key->makan), 1, 1, '', TRUE);

				$pdf->Cell(10, 8, '4', 'L,T,B', 0, 'C', TRUE);
				$pdf->Cell(80, 8, 'Gaji Mengajar', 'L,T,B', 0, '', TRUE);
				$pdf->Cell(80, 8, "Rp. " . number_format($key->gaji_sks), 1, 1, '', TRUE);
			}

			$ttl = $key->gapok + $key->kesehatan + $key->transport + $key->makan + $key->sertifikasi + $key->gaji_sks;

			$pdf->SetDrawColor(198, 198, 198);
			$pdf->setFillColor(225, 225, 225);
			$pdf->Cell(90, 8, 'Total', 'L,T,B', 0, 'C', TRUE);
			$pdf->Cell(80, 8, "Rp. " . number_format($ttl), 1, 0, '', TRUE);

			//Footer
			$pdf->Cell(170, 10, '', 0, 1);
			$pdf->Cell(28, 8, 'Harga Per SKS', 0, 0);
			$pdf->Cell(5, 8, ':', 0, 0);
			$pdf->Cell(27, 8, "RP. " . number_format($key->honor), 0, 0);
			$pdf->Cell(90, 8, '', 0, 0);
			$pdf->Cell(20, 8, 'Penerima', 0, 0, 'R');
			$pdf->Cell(170, 18, '', 0, 1, 'R');
			$pdf->Cell(170, 5, $nama, 0, 1, 'R');
		}


		$pdf->Output('D', "Laporan " . $nama . ".pdf");
	}

	function hapus_penggajian()
	{
		$id = $this->input->post('idhapus');
		$this->modcrud->hapus('id_rekap', $id, 'rekap_gaji');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible alert-custom">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-check"></i> Success!</h4>
			Data Penggajian Berhasil Dihapus.
			</div>');
		redirect('data-penggajian', 'refresh');
	}

	//akhir penggajian

	function cekorang()
	{
		$month = date("m");
		$year = date("Y");
		$data['sql'] = $this->modcrud->cek_orang($month, $year)->result();
		$this->load->view('admin/cekorang', $data);
	}

	function cetak_page()
	{
		$this->load->view('admin/cetak.php');
	}

	function cetak_sgaji()
	{
		$start = date("Y-m-d", strtotime($this->input->post('startdate', TRUE)));
		$end = date("Y-m-d", strtotime($this->input->post('enddate', TRUE)));
		$sgaji = $this->modcrud->cetak_data_penggajian_seluruh($start, $end)->result();
		$no = 1;
		$jumlah = 0;

		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();
		$pdf->SetLeftMargin(22);
		$pdf->SetAutoPageBreak(true);

		//set header
		$pdf->Image(base_url() . "template/stb.png", 17, 10, 30, 30);
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->SetY(15);
		$pdf->SetX(7);
		$pdf->Cell(230, 6, 'SEKOLAH TINGGI ILMU BAHASA ASING INVADA', 0, 1, 'C');
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->SetX(7);
		$pdf->Cell(230, 6, "LAPORAN DATA GAJI SELURUH DOSEN", 0, 1, 'C');
		$pdf->SetFont('Arial', '', 12);
		$pdf->SetX(7);
		$pdf->Cell(230, 6, 'Jalan Brigjen Darsono Telp 089644481187 Cirebon 45131', 0, 1, 'C');
		$pdf->SetX(7);
		$pdf->Cell(230, 6, 'Website: http://stibainvada.ac.id/ E-mail: stibainvada.cirebon@gmail.com', 0, 1, 'C');

		//line break
		$pdf->SetLineWidth(0.5);
		$pdf->Line(22, 43, 192, 43);
		$pdf->SetLineWidth(0.1);
		$pdf->SetX(33);
		$pdf->Cell(10, 9, '', 0, 1);

		//Header Tabel
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->SetDrawColor(198, 198, 198);
		$pdf->setFillColor(225, 225, 225);
		$pdf->Cell(10, 8, 'No', 'L,T,B', 0, 'C', TRUE);
		$pdf->Cell(60, 8, 'Nama Dosen', 'L,T,B', 0, 'C', TRUE);
		$pdf->Cell(40, 8, 'Status', 'L,T,B', 0, 'C', TRUE);
		$pdf->Cell(60, 8, 'Gaji Diterima', 1, 1, 'C', TRUE);

		//Foreach data
		foreach ($sgaji as $key) {
			$ttl = $key->gapok + $key->kesehatan + $key->transport + $key->makan + $key->sertifikasi + $key->gaji_sks;
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->SetDrawColor(198, 198, 198);
			$pdf->setFillColor(249, 249, 249);
			$pdf->Cell(10, 8, $no, 'L,T,B', 0, 'C', TRUE);
			$pdf->Cell(60, 8, $key->nama, 'L,T,B', 0, '', TRUE);
			$pdf->Cell(40, 8, $key->status, 'L,T,B', 0, '', TRUE);
			$pdf->Cell(60, 8, "Rp. " . number_format($ttl), 1, 1, '', TRUE);
			$no++;

			$jumlah += $ttl;
		}

		//total gaji
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->SetDrawColor(198, 198, 198);
		$pdf->setFillColor(225, 225, 225);
		$pdf->Cell(110, 8, 'Total', 'L,T,B', 0, 'C', TRUE);
		$pdf->Cell(60, 8, "Rp. " . number_format($jumlah), 'L,T,B', 0, '', TRUE);


		//set nama output
		$pdf->Output('D', 'Laporan_Data_Gaji_Dosen.pdf');
	}

	function cetak_sdosen()
	{
		//set ukuran kertas
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();
		$pdf->SetLeftMargin(22);
		$pdf->SetAutoPageBreak(true);

		//set header
		$pdf->Image(base_url() . "template/stb.png", 17, 10, 30, 30);
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->SetY(15);
		$pdf->SetX(7);
		$pdf->Cell(230, 6, 'SEKOLAH TINGGI ILMU BAHASA ASING INVADA', 0, 1, 'C');
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->SetX(7);
		$pdf->Cell(230, 6, "LAPORAN DATA DOSEN", 0, 1, 'C');
		$pdf->SetFont('Arial', '', 12);
		$pdf->SetX(7);
		$pdf->Cell(230, 6, 'Jalan Brigjen Darsono Telp 089644481187 Cirebon 45131', 0, 1, 'C');
		$pdf->SetX(7);
		$pdf->Cell(230, 6, 'Website: http://stibainvada.ac.id/ E-mail: stibainvada.cirebon@gmail.com', 0, 1, 'C');

		//line break
		$pdf->SetLineWidth(0.5);
		$pdf->Line(22, 43, 192, 43);
		$pdf->SetLineWidth(0.1);
		$pdf->SetX(33);
		$pdf->Cell(10, 9, '', 0, 1);

		//Header Tabel
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->SetDrawColor(198, 198, 198);
		$pdf->setFillColor(225, 225, 225);
		$pdf->Cell(10, 8, 'No', 'L,T,B', 0, 'C', TRUE);
		$pdf->Cell(25, 8, 'NIDN', ',L,T,B', 0, 'C', TRUE);
		$pdf->Cell(50, 8, 'Nama Dosen', 'L,T,B', 0, 'C', TRUE);
		$pdf->Cell(25, 8, 'Gender', 'L,T,B', 0, 'C', TRUE);
		$pdf->Cell(25, 8, 'Agama', 'L,T,B', 0, 'C', TRUE);
		$pdf->Cell(30, 8, 'Status', 1, 1, 'C', TRUE);

		//isi tabel
		$dosen = $this->modcrud->data_dosen()->result();
		$no = 1;
		foreach ($dosen as $dsn) {
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->SetDrawColor(198, 198, 198);
			$pdf->setFillColor(249, 249, 249);
			$pdf->Cell(10, 8, $no, 'L,T,B', 0, 'C', TRUE);
			$pdf->Cell(25, 8, $dsn->nidn, ',L,T,B', 0, 'C', TRUE);
			$pdf->Cell(50, 8, $dsn->nama, 'L,T,B', 0, '', TRUE);
			$pdf->Cell(25, 8, $dsn->jenis_kelamin, 'L,T,B', 0, '', TRUE);
			$pdf->Cell(25, 8, $dsn->agama, 'L,T,B', 0, '', TRUE);
			$pdf->Cell(30, 8, ucfirst($dsn->status), 1, 1, '', TRUE);

			$no++;
		}

		//set nama output
		$pdf->Output('D', 'Laporan_Data_Dosen.pdf');
	}


	function change_password()
	{
		$id = $this->session->userdata('id');
		$pwl = input_filter($this->input->post('pwl', TRUE));
		$cek = $this->modcrud->cek_dbpassadmin($id)->row();
		if (empty($pwl)) {
			$fn = $this->input->post('fullname', TRUE);
			$us = $this->input->post('username', TRUE);
			$update = array('username' => $us, 'full_name' => $fn);
			$this->modcrud->update_pw($id, $update);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible alert-custom-log">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-check"></i> Success!</h4>
				Akun Berhasil Diupdate.
				</div>');
			$this->session->set_flashdata('warning', '<div class="alert alert-warning alert-dismissible alert-custom-log">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-warning"></i> Alert!</h4>
				Silahkan Logout dan Login Kembali Untuk Melihat Perubahan
				</div>');
			redirect('admin-dashboard');
		} else {
			if (hash_verified($pwl, $cek->password)) {
				$fn = $this->input->post('fullname', TRUE);
				$us = $this->input->post('username', TRUE);
				$pwb = input_filter($this->input->post('pwb', TRUE));
				$pwk = input_filter($this->input->post('pwk', TRUE));
				if ($pwb == $pwk) {
					$update = array('password' => get_hash($pwb), 'username' => $us, 'full_name' => $fn);
					$this->modcrud->update_pw($id, $update);
					$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible alert-custom-log">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Success!</h4>
						Akun Berhasil Diupdate.
						</div>');
					$this->session->set_flashdata('warning', '<div class="alert alert-warning alert-dismissible alert-custom-log">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Alert!</h4>
						Silahkan Logout dan Login Kembali Untuk Melihat Perubahan
						</div>');
					redirect('admin-dashboard');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible alert-custom-log">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-ban"></i> Failed!</h4> Password Baru dan Konfirmasi Berbeda
						</div>');
					redirect('admin-dashboard');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible alert-custom-log">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-ban"></i> Failed!</h4> Password Lama Salah
					</div>');
				redirect('admin-dashboard');
			}
		}
	}

	//kelola admin
	function admin_kelola()
	{
		$data['admin'] = $this->modcrud->admin_kelola()->result();
		$this->load->view('admin/kadmin', $data);
	}

	function tambah_admin()
	{
		$s = input_filter($this->input->post('password'));
		$ss = input_filter($this->input->post('konfirmasi'));
		if ($s == $ss) {
			$data = array(
				'username' => input_filter($this->input->post('username')),
				'full_name' => input_filter($this->input->post('fullname')),
				'password' => get_hash(input_filter($this->input->post('password')))
			);
			$filter = $this->security->xss_clean($data);
			$this->modcrud->input_dosen('admin', $filter);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible alert-custom">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-check"></i> Success!</h4>
				Data Admin Berhasil Ditambah.
				</div>');
			redirect('admin-kelola', 'refresh');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible alert-custom">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-ban"></i> Failed!</h4> Password Baru dan Konfirmasi Berbeda
				</div>');
			redirect('admin-kelola');
		}
	}

	function hapus_admin()
	{
		$id = $this->input->post('idhapus');
		$this->modcrud->hapus('idmin', $id, 'admin');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible alert-custom">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-check"></i> Success!</h4>
			Data Admin Berhasil Dihapus.
			</div>');
		redirect('admin-kelola');
	}

	//kelola harga sks
	function sks_kelola()
	{
		$data['jumlah'] = $this->modcrud->row_sks();
		$data['status'] = $this->modcrud->get_status()->result();
		$data['sks'] = $this->modcrud->get_honor()->result();
		$this->load->view('admin/sks', $data);
	}

	function edit_sks()
	{
		$id = input_filter($this->input->post('id_honor'));
		$data = array(
			'honor' => $this->input->post('harga')
		);
		$datafilter = $this->security->xss_clean($data);
		$this->modcrud->edit_sks($id, $datafilter);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible alert-custom">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-check"></i> Success!</h4>
			Harga SKS Berhasil Diupdate.
			</div>');

		redirect('sks-kelola', 'refresh');
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
