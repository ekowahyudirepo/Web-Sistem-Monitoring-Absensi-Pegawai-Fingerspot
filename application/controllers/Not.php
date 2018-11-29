<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Not extends CI_Controller {

	public function index()
	{
		$this->load->view('404');
	}

}

/* End of file Not.php */
/* Location: ./application/controllers/Not.php */