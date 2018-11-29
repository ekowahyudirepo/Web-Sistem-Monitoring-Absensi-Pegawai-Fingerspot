<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller {

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
    	$tgl = $this->input->post('filter');

    	$array = array(
    		'filter_tugas' => $tgl
    	);
    	
    	$this->session->set_userdata( $array );

    	redirect( base_url('tugas') );
    }

	public function index()
	{
		$this->load->model('M_tugas');
		$this->load->model('M_pegawai');

		$filter = $this->session->userdata('filter_tugas');

		$data['filter'] = ( ! is_null($filter)) ? $filter : $this->M_tugas->getPeriode();

		$data['get_tugas'] = $this->M_tugas->getTugas($data['filter']);

		$data['get_data_pegawai'] = $this->M_pegawai->getDataPegawai();

		$data['tugas'] 	   = 'active';

		$data['head']     = $this->load->view('head', $data, TRUE);
		$data['navigasi'] = $this->load->view('navigasi', $data, TRUE);
		
		$data['judul']    = 'FingerLog ~ tugas';

		$this->load->view('tugas' , $data);
	}


	public function tambahTugas()
	{
		$x = explode(' - ', $this->input->post('tgl_tugas'));

		$kodetgl = $x[0];

		$this->load->model('M_tugas');

		$date1 = date_create( $x[0] );
		$date2 = date_create( $x[1] );
		$diff  = date_diff($date1,$date2);
		$range =  $diff->format("%R%a days");

		// TANGGAL PINJAM
		$todayDate = $x[0];
		$now = strtotime($todayDate);

		$mulai =  date('Y-m-d', strtotime($x[0]));
		$selesai =  date('Y-m-d', strtotime($x[1]));

		$kode_tugas = strtotime(date('Y-m-d H:i:s'));

		if( $this->M_tugas->cekTugas( $this->input->post('pin'), $mulai, $selesai) ){

			$this->notifikasi('danger', 'Gagal ditambahkan tanggal telah dipakai');
		} else {
 
			// BUAT SEMUA TANGGAL
			for ($i=0; $i <= $range ; $i++) { 
				$data['id_tugas']          = '';
				$data['pin']               = $this->input->post('pin');
				$data['kode_tugas']        = $kode_tugas;
				$data['tgl_tugas']         = date('Y-m-d',strtotime( '+'.$i.'days' ,$now));
				$data['keterangan']        = $this->input->post('keterangan');
				$data['kategori']          = $this->input->post('kategori');
				$data['tempat']            = $this->input->post('tempat');
				
				$x = $this->M_tugas->tambahTugas($data);
			}	

			if ( ! $x ) {  
	            $this->notifikasi('danger', 'Gagal ditambahkan');
	        }else{
	            $this->notifikasi('success', 'Berhasil ditambahkan');
	        }

	    }

        redirect(base_url('tugas'));
	}

	public function hapusTugas()
	{
		$id_tugas         = $this->uri->segment(3);

		$this->load->model('M_tugas');

		$x = $this->M_tugas->hapusTugas($id_tugas);

		if ( ! $x) {  
            $this->notifikasi('danger', 'Gagal dihapus');
        }else{
            $this->notifikasi('success', 'Berhasil dihapus');
        }

        redirect(base_url('tugas'));
	}

	public function Pdf()
    {
        $this->load->library('pdf');

        $this->load->model('M_tugas');
		$this->load->model('M_pegawai');

		$filter = $this->session->userdata('filter_tugas');
		
		$data['filter'] = ( ! is_null($filter)) ? $filter : $this->M_tugas->getPeriode();

		$data['get_tugas'] = $this->M_tugas->getTugas($data['filter']);

		$data['get_data_pegawai'] = $this->M_pegawai->getDataPegawai();
        
        $html = $this->load->view('laporan/pdf_tugas', $data, TRUE);

        $this->pdf->generate($html, 'data_tugas_pegawai');
    }

}

/* End of file Tugas.php */
/* Location: ./application/controllers/Tugas.php */