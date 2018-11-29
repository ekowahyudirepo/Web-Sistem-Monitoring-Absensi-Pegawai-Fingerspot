<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{

		$this->load->model('M_pegawai');

		$data['pegawai'] = $this->M_pegawai->getTotalDataPegawai();

		$this->load->view('log', $data);
	}

	public function p()
	{
		$this->load->model('M_log');

		$data['sn']         = $this->input->post('mesin');
		$data['scan_date']  = $this->input->post('tgl').' '.$this->input->post('time');
		$data['pin']        = $this->input->post('pin');
		$data['verifymode'] = $this->input->post('mode');

		// if( $this->M_log->sel($data['scan_date'], $data['pin'], $data['verifymode']) != 0 ){
		// 	$this->session->set_flashdata('alert', 'Gagal');
		// }else{

			$this->M_log->add($data);
			$this->session->set_flashdata('alert', 'Berhasil');
		// }

		redirect( base_url('log'));

	}

}

/* End of file Log.php */
/* Location: ./application/controllers/Log.php */