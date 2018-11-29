<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mode extends CI_Controller {

	public function on()
	{
		$array = array(
			'edit' => 'on'
		);
		
		$this->session->set_userdata( $array );

		$this->session->set_flashdata('notifikasi', '<div class="alert alert-dismissible alert-warning">Mode Edit <b>ON</b><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
	}

	public function off()
	{
		$array = array(
			'edit' => ''
		);
		
		$this->session->set_userdata( $array );

		$this->session->set_flashdata('notifikasi', '<div class="alert alert-dismissible alert-warning">Mode Edit <b>OFF</b><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
	}

}

/* End of file Mode.php */
/* Location: ./application/controllers/Mode.php */