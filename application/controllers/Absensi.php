<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		date_default_timezone_set('Asia/Jakarta');

		if ($this->session->userdata('id_admin') == '') {
			redirect( base_url('login') );
		}
	}

	public function notifikasi($type, $pesan)
    {
        $this->session->set_flashdata('notifikasi', '<div class="alert alert-dismissible alert-'.$type.'">'.$pesan.'                     
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>');
    }

	public function filter()
    {
    	$tgl = $this->input->post('tgl');

    	$array = array(
    		'filter_absensi' => $tgl
    	);
    	
    	$this->session->set_userdata( $array );

    	redirect( base_url('absensi/pegawai') );
    }

	public function index()
	{
		$this->load->model('M_pegawai');
		$this->load->model('M_kehadiran');

		$data['jml_pegawai']    = $this->M_pegawai->getTotalDataPegawai()->num_rows();

		$data['get_data_pegawai'] = $this->M_pegawai->getTotalDataPegawai();

		$data['hadir']          = $this->M_kehadiran->hadir(date('Y-m-d'));
		
		$data['beranda']		= 'active';
		
		$data['head']           = $this->load->view('head', $data, TRUE);
		$data['navigasi']       = $this->load->view('navigasi', $data, TRUE);
		
		$data['judul']          = 'FingerLog ~ Absensi';

		$this->load->view('absensi_main_realtime' , $data);
	}

	public function pegawai()
	{
		$this->load->model('M_pegawai');
		$this->load->model('M_kehadiran');
		$this->load->model('M_absensi');

		$data['jml_pegawai']    = $this->M_pegawai->getTotalDataPegawai()->num_rows();

		$data['get_data_pegawai'] = $this->M_pegawai->getTotalDataPegawai();
		

		$data['tgl_filter'] = ($this->session->userdata('filter_absensi') != '')? date('Y-m-d', strtotime($this->session->userdata('filter_absensi'))) : date('Y-m-d');

		$data['hadir']          = $this->M_kehadiran->hadir($data['tgl_filter']);
		
		$data['beranda']		= 'active';
		
		$data['head']           = $this->load->view('head', $data, TRUE);
		$data['navigasi']       = $this->load->view('navigasi', $data, TRUE);
		
		$data['judul']          = 'FingerLog ~ Absensi';

		$this->load->view('absensi' , $data);
	}

	public function periksa()
	{
		$this->load->model('M_pegawai');
		$this->load->model('M_absensi');

		$data['get_data_pegawai'] = $this->M_pegawai->getTotalDataPegawai();

		$data['list']         = $this->M_absensi->listPeriode();
		
		$data['beranda']		= 'active';
		
		$data['head']           = $this->load->view('head', $data, TRUE);
		$data['navigasi']       = $this->load->view('navigasi', $data, TRUE);
		
		$data['judul']          = 'FingerLog ~ Periksa Absensi Ganda';

		$this->load->view('absensi_periksa_ganda' , $data);
	}



	// public function realtime2()
	// {
	// 	$this->load->model('M_pegawai');
	// 	$this->load->model('M_absensi');
	// 	$this->load->model('M_kehadiran');

	// 	$data['jml_pegawai']    = $this->M_pegawai->getTotalDataPegawai()->num_rows();

	// 	$data['hadir']          = $this->M_kehadiran->hadir(date('Y-m-d'));

	// 	$data['get_data_pegawai'] = $this->M_pegawai->getTotalDataPegawai();
		

	// 	$data['beranda']		= 'active';
		
		
	// 	$data['judul']          = 'FingerLog ~ Absensi';

	// 	$this->load->view('absensi_realtime' , $data);
	// }

	public function realtime()
	{
		$this->load->model('M_pegawai');
		$this->load->model('M_absensi');
		$this->load->model('M_kehadiran');

		$data['jml_pegawai']    = $this->M_pegawai->getTotalDataPegawai()->num_rows();

		$data['hadir']          = $this->M_kehadiran->hadir(date('Y-m-d'));

		$data['get_real_absensi'] = $this->M_absensi->getRealAbsensiMasuk(date('Y-m-d'));
		
		$data['beranda']		= 'active';
		
		
		$data['judul']          = 'FingerLog ~ Absensi';

		$this->load->view('absensi_realtime' , $data);
	}

	public function detail_absensi_pegawai()
	{
		$this->load->model('M_pegawai');
		$this->load->model('M_absensi');

		$data['get_absensi_masuk'] = $this->M_absensi->getAbsensiMasuk( $this->uri->segment(3) , $this->input->get('scan_date') );

		$data['get_absensi_pulang'] = $this->M_absensi->getAbsensiPulang( $this->uri->segment(3) , $this->input->get('scan_date') );
		
		$data['beranda']		= 'active';
		
		$data['head']           = $this->load->view('head', $data, TRUE);
		$data['navigasi']       = $this->load->view('navigasi', $data, TRUE);
		
		$data['judul']          = 'FingerLog ~ Absensi';

		$this->load->view('absensi_detail_pegawai' , $data);
	}

	public function hapus_absensi()
	{
		$this->load->model('M_absensi');

		$x = $this->M_absensi->hapusAbsensi( $_GET['pin'], $_GET['tanggal'], $_GET['mode'] );

		if ( ! $x) {  

            $this->notifikasi('danger', 'Gagal dihapus');

        }else{

            $this->notifikasi('success', 'Berhasil dihapus');

        }

        redirect(base_url('absensi/periksa'));
	}

}
