<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uang_makan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		date_default_timezone_set('Asia/Jakarta');
		if ($this->session->userdata('id_admin') == '') {
			redirect( base_url('login') );
		}
	}

	public function index()
	{
		$this->load->model('M_pegawai');
		$this->load->model('M_uang_makan');

		$data['get_data_pegawai'] = $this->M_pegawai->getDataPegawai();

		$data['list'] = $this->M_uang_makan->listPeriode();

		$data['periode']        = $this->M_uang_makan->getPeriode();

		$data['uang_makan']		= 'active';
		
		$data['head']           = $this->load->view('head', $data, TRUE);
		$data['navigasi']       = $this->load->view('navigasi', $data, TRUE);
		
		$data['judul']          = 'FingerLog ~ Uang Makan';

		$this->load->view('uang_makan' , $data);
	}

	public function pegawai()
	{

		$pin = $this->uri->segment(3);

		if( $pin == '' ){ redirect( base_url('uang_makan') ); }else{ 

			$this->load->model('M_uang_makan');

			$data['list']         = $this->M_uang_makan->listPeriode();
			
			$data['nama_pegawai'] = $this->M_uang_makan->getNama($this->uri->segment(3));
			$data['nip_pegawai']  = $this->M_uang_makan->getNip($this->uri->segment(3));
			
			$data['uang_makan']		= 'active';
			
			$data['head']           = $this->load->view('head', $data, TRUE);
			$data['navigasi']       = $this->load->view('navigasi', $data, TRUE);
			
			$data['judul']          = 'FingerLog ~ Uang Makan';

			$this->load->view('uang_makan_detail' , $data);
		}
	}

	public function pdf()
    {
        $this->load->library('pdf');

        if( $this->uri->segment(3) != '' ){

        	$this->load->model('M_uang_makan');

			$data['list']         = $this->M_uang_makan->listPeriode();
			
			$data['nama_pegawai'] = $this->M_uang_makan->getNama($this->uri->segment(3));
			$data['nip_pegawai']  = $this->M_uang_makan->getNip($this->uri->segment(3));

			$html = $this->load->view('laporan/pdf_uang_makan_pegawai', $data, TRUE);

	        $this->pdf->generate($html, 'um_'.$data['nama_pegawai'].'');


	    } else {

	        $this->load->model('M_pegawai');
			$this->load->model('M_uang_makan');

			$data['get_data_pegawai'] = $this->M_pegawai->getDataPegawai();
			
			$data['list']             = $this->M_uang_makan->listPeriode();
			
			$data['periode']          = $this->M_uang_makan->getPeriode();
	        
	        $html = $this->load->view('laporan/pdf_uang_makan', $data, TRUE);

	        $this->pdf->generate($html, 'data_uang_makan_pegawai');

	    }

    }


}

/* End of file Uang_makan.php */
/* Location: ./application/controllers/Uang_makan.php */