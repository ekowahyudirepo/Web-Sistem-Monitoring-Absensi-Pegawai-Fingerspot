<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		date_default_timezone_set('Asia/Jakarta');
	}

	public function absensi()
	{
		$pin = $this->uri->segment(3);

		$this->load->model('M_mobile');

		$data['nama_pegawai'] = $this->M_mobile->getNama($pin);
		
		$data['judul']        = 'FingerLog ~ Absensi Pegawai';

        $this->load->view('mobile/absensi_hari_ini' , $data);
	}

	public function riwayat()
	{
		$pin = $this->uri->segment(3);

		$this->load->model('M_mobile');
		$this->load->model('M_pegawai');

		$data['list']         = $this->M_mobile->listPeriode();
		
		$data['nama_pegawai'] = $this->M_mobile->getNama($pin);
		
		$data['judul']        = 'FingerLog ~ Absensi Pegawai';

        $this->load->view('mobile/riwayat_absensi' , $data);
	}

	public function tukin()
	{
		$pin = $this->uri->segment(3);

		$this->load->model('M_mobile');
		$this->load->model('M_tukin');

		$data['list']         = $this->M_mobile->listPeriode();
		
		$data['nama_pegawai'] = $this->M_mobile->getNama($pin);
		
		$data['judul']        = 'FingerLog ~ Tukin';

		$this->load->view('mobile/tukin', $data, FALSE);
	}

	public function uang_makan()
	{
		$pin = $this->uri->segment(3);

		$this->load->model('M_mobile');

		$this->load->model('M_uang_makan');

		$data['list']         = $this->M_mobile->listPeriode();

		$data['nama_pegawai'] = $this->M_mobile->getNama($pin);

		$data['judul']    = 'FingerLog ~ Uang Makan';

		$this->load->view('mobile/uang_makan', $data, FALSE);
	}

	public function ajaxAbsensi()
	{
		$this->load->model('M_tukin');

        $this->load->view('mobile/ajax_absensi_hari_ini' , $data);
	}


}

/* End of file Mobile.php */
/* Location: ./application/controllers/Mobile.php */