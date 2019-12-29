<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modlogin extends CI_Model
{
	function checkdb($username)
	{
		return $this->db->get_where('admin', array('username' => $username));
	}

	function verif($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get("admin");
	}

	function checkdosen($nidn)
	{
		return $this->db->get_where('dosen', array('nidn' => $nidn));
	}
}

/* End of file Modlogin.php */
/* Location: ./application/models/Modlogin.php */
