<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modcrud extends CI_Model
{
	//data-dosen
	function data_dosen()
	{
		$this->db->select('*');
		$this->db->from('dosen,data_gaji,status,agama,jk');
		$this->db->where('dosen.id_gaji=data_gaji.id_gaji');
		$this->db->where('data_gaji.id_status=status.id_status');
		$this->db->where('dosen.id_agama=agama.id_agama');
		$this->db->where('dosen.id_jk=jk.id_jk');
		return $this->db->get();
	}
	//check-nidn
	function check_nidn($nidn)
	{
		return $this->db->get_where('dosen', array('nidn' => $nidn));
	}
	//input
	function input_dosen($table, $data)
	{
		return $this->db->insert($table, $data);
	}
	//update-dosen
	function update_dosen($nidn, $data)
	{
		$this->db->where('nidn', $nidn);
		$this->db->update('dosen', $data);
	}
	//ambil data dosen
	function get_edit_dosen($id)
	{
		$this->db->where('nidn', $id);
		return $this->db->get('dosen');
	}
	//hapus
	function hapus($field, $id, $table)
	{
		$this->db->where($field, $id);
		$this->db->delete($table);
	}
	//data-gaji
	function data_gaji()
	{
		$this->db->select('*');
		$this->db->from('data_gaji,status');
		$this->db->where('data_gaji.id_status=status.id_status');
		return $this->db->get();
	}
	//status
	function get_status()
	{
		return $this->db->get('status');
	}
	//hitung sks
	function row_sks()
	{
		$query = $this->db->get('honor_sks');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	//ambil data gaji
	function get_edit_gaji($id)
	{
		$this->db->select('*');
		$this->db->from('data_gaji,status');
		$this->db->where('id_gaji', $id);
		$this->db->where('data_gaji.id_status=status.id_status');
		return $this->db->get();
	}
	//update gaji
	function update_gaji($id, $data)
	{
		$this->db->where('id_gaji', $id);
		$this->db->update('data_gaji', $data);
	}
	//data penggajian
	function data_penggajian()
	{
		$this->db->select('*');
		$this->db->from('rekap_gaji');
		$this->db->join('dosen', 'rekap_gaji.nidn=dosen.nidn');
		return $this->db->get();
	}
	//ambil honor
	function ambil_gaji($nidn)
	{
		$this->db->select('honor');
		$this->db->from('dosen,data_gaji,status,honor_sks');
		$this->db->where('dosen.id_gaji=data_gaji.id_gaji');
		$this->db->where('data_gaji.id_status=status.id_status');
		$this->db->where('status.id_status=honor_sks.id_status');
		$this->db->where('dosen.nidn', $nidn);
		return $this->db->get();
	}
	//cetak gaji per dosen
	function cetak_gaji_penggajian($id)
	{
		$this->db->select('*');
		$this->db->from('rekap_gaji');
		$this->db->join('dosen', 'rekap_gaji.nidn=dosen.nidn');
		$this->db->join('data_gaji', 'dosen.id_gaji=data_gaji.id_gaji');
		$this->db->join('status', 'data_gaji.id_status=status.id_status');
		$this->db->join('honor_sks','status.id_status=honor_sks.id_status');
		$this->db->where('rekap_gaji.id_rekap', $id);
		return $this->db->get();
	}
	//cetak gaji seluruh dosen
	function cetak_data_penggajian_seluruh($startdate, $enddate)
	{
		$this->db->select('*');
		$this->db->from('rekap_gaji');
		$this->db->join('dosen', 'rekap_gaji.nidn=dosen.nidn');
		$this->db->join('data_gaji', 'dosen.id_gaji=data_gaji.id_gaji');
		$this->db->join('status', 'data_gaji.id_status=status.id_status');
		$this->db->where("tgl_penggajian BETWEEN '$startdate' and '$enddate'");
		return $this->db->get();
	}
	//cek gaji dosen
	function cek_gaji_dosen($month, $year)
	{
		$nidn = $this->session->userdata('nidn');
		$this->db->select('rekap_gaji.gaji_sks,data_gaji.gapok,data_gaji.kesehatan,data_gaji.transport,data_gaji.makan,dosen.sertifikasi,data_gaji.id_status');
		$this->db->from('rekap_gaji');
		$this->db->join('dosen', 'rekap_gaji.nidn=dosen.nidn');
		$this->db->join('data_gaji', 'dosen.id_gaji=data_gaji.id_gaji');
		$this->db->where("YEAR(tgl_penggajian)='$year' and MONTH(tgl_penggajian)='$month'");
		$this->db->where('rekap_gaji.nidn', $nidn);
		return $this->db->get();
	}
	//cek db pass admin
	function cek_dbpassadmin($id)
	{
		$this->db->select('password');
		$this->db->from('admin');
		$this->db->where('idmin', $id);
		return $this->db->get();
	}
	//update password
	function update_pw($id, $data)
	{
		$this->db->where('idmin', $id);
		$this->db->update('admin', $data);
	}
	//cek db pass dosen
	function cek_dbpassdosen($id)
	{
		$this->db->select('password');
		$this->db->from('dosen');
		$this->db->where('nidn', $id);
		return $this->db->get();
	}
	//update pw dosen
	function update_pwd($id, $data)
	{
		$this->db->where('nidn', $id);
		$this->db->update('dosen', $data);
	}
	//ambil agama
	function get_agama()
	{
		return $this->db->get('agama');
	}
	//ambil jk
	function get_jk()
	{
		return $this->db->get('jk');
	}
	//ambil honor
	function get_honor()
	{
		$this->db->select('*');
		$this->db->from('honor_sks,status');
		$this->db->where('honor_sks.id_status=status.id_status');
		return $this->db->get();
	}
	//hitung baris dosen
	function row_dosen()
	{
		$query = $this->db->get('dosen');
		if($query->num_rows() > 0)
		{
			return $query->num_rows();
		}else{
			return 0;
		}
	}
	//hitung baris gaji
	function row_gaji()
	{
		$query = $this->db->get('data_gaji');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	//hitung baris penggajian
	function row_pgj()
	{
		$query = $this->db->get('rekap_gaji');
		if($query->num_rows() > 0)
		{
			return $query->num_rows();
		}else{
			return 0;
		}
	}
	//function cek orang belum digaji
	function cek_orang($month,$year)
	{
		$query = $this->db->query("select nidn,nama,status from dosen,data_gaji,status where not exists(select * from rekap_gaji where rekap_gaji.nidn=dosen.nidn and YEAR(tgl_penggajian)=$year and MONTH(tgl_penggajian)=$month) and dosen.id_gaji=data_gaji.id_gaji and data_gaji.id_status=status.id_status;");
		return $query;

	}
	//function admin
	function admin_kelola()
	{
		$this->db->select('idmin,username,full_name');
		$this->db->from('admin');
		return $this->db->get();
	}

	//function edit_sks
	function edit_sks($id,$data)
	{
		$this->db->where('id_honor', $id);
		$this->db->update('honor_sks',$data);
	}

	//function cek dosen ada tidak di penggajian untuk delete
	function cek_dosen_delete($nidn)
	{
		$this->db->select('*');
		$this->db->from('rekap_gaji');
		$this->db->where("exists(select * from dosen where dosen.nidn=rekap_gaji.nidn and dosen.nidn=$nidn)");
		return $this->db->get();
	}

	//function cek data gaji ada tidak di dosen
	function cek_datagaji_delete($id)
	{
		$query = $this->db->query("select * from data_gaji where exists (select * from dosen where dosen.id_gaji=data_gaji.id_gaji and data_gaji.id_gaji=$id)");
		return $query;
	}

	//cek dosen jika sudah digaji di bulan itu maka tidak bisa digaji lagi di bulan yang sama
	function cek_menggaji_dosen($nidn,$month,$year)
	{
		$this->db->select('nidn');
		$this->db->from('rekap_gaji');
		$this->db->where('nidn', $nidn);
		$this->db->where('MONTH(tgl_penggajian)', $month);
		$this->db->where('YEAR(tgl_penggajian)', $year);
		return $this->db->get();
	}
	//cek penambahan data gaji pada awal konfigurasi aplikasi agar status yang dimasukan tidak sama
	function cek_penambahan_data_gaji($id)
	{
		$this->db->where('id_status', $id);
		return $this->db->get('data_gaji');
	}

}

/* End of file Modcrud.php */
/* Location: ./application/models/Modcrud.php */
