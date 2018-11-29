<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tukin extends CI_Controller {

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
		$this->load->model('M_tukin');

		$data['get_data_pegawai'] = $this->M_pegawai->getDataPegawai();
		
		$data['periode']          = $this->M_tukin->getPeriode();
		
		$data['list']             = $this->M_tukin->listPeriode();
		
		$data['tukin']            = 'active';
		
		$data['head']             = $this->load->view('head', $data, TRUE);
		$data['navigasi']         = $this->load->view('navigasi', $data, TRUE);
		
		$data['judul']            = 'FingerLog ~ Tukin';

		$this->load->view('tukin' , $data);
	}


	public function pegawai()
	{

        $getpin = $this->uri->segment(3);

		if( $getpin == '' ){ 

			redirect( base_url('tukin') ); 

		} else {

			$this->load->model('M_tukin');

			$data['list'] = $this->M_tukin->listPeriode();

			$data['periode']          = $this->M_tukin->getPeriode();

			$data['nama_pegawai'] = $this->M_tukin->getNama($this->uri->segment(3));
			$data['nip_pegawai']  = $this->M_tukin->getNip($this->uri->segment(3));
			
			$data['tukin']		= 'active';
			
			$data['head']           = $this->load->view('head', $data, TRUE);
			$data['navigasi']       = $this->load->view('navigasi', $data, TRUE);
			
			$data['judul']          = 'FingerLog ~ tukin';

			$this->load->view('tukin_detail' , $data);
		}
	}

	public function pdf()
    {
        $this->load->library('pdf');

        if( $this->uri->segment(3) != '' ){

        	$this->load->model('M_tukin');

			$data['list']         = $this->M_tukin->listPeriode();

			$data['periode']      = $this->M_tukin->getPeriode();
			
			$data['nama_pegawai'] = $this->M_tukin->getNama($this->uri->segment(3));
			$data['nip_pegawai']  = $this->M_tukin->getNip($this->uri->segment(3));

			$html = $this->load->view('laporan/pdf_tukin_pegawai', $data, TRUE);

	        $this->pdf->generate($html, 'tukin_'.$data['nama_pegawai'].'', true, 'A4','landscape');


	    } else {

	        $this->load->model('M_pegawai');
			$this->load->model('M_tukin');

			$data['get_data_pegawai'] = $this->M_pegawai->getDataPegawai();
			
			$data['periode']          = $this->M_tukin->getPeriode();
			
			$data['list']             = $this->M_tukin->listPeriode();
	        
	        $html = $this->load->view('laporan/pdf_tukin', $data, TRUE);

	        $this->pdf->generate($html, 'data_tukin_pegawai', true, 'A4','landscape');

	    }

    }


}

/* End of file Tukin.php */
/* Location: ./application/controllers/Tukin.php */