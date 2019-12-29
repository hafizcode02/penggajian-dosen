<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Not_Found extends CI_Controller {

	public function index()
	{
		$this->load->view('404');
	}

}

/* End of file Not_Found.php */
/* Location: ./application/controllers/Not_Found.php */