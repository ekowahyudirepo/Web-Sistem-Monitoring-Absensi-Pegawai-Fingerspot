<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller {

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
    		'filter_cuti' => $tgl
    	);
    	
    	$this->session->set_userdata( $array );

    	redirect( base_url('cuti') );
    }

	public function index()
	{
		$this->load->model('M_cuti');
		$this->load->model('M_pegawai');

		$filter = $this->session->userdata('filter_cuti');

		$data['filter'] = ( ! is_null($filter)) ? $filter : $this->M_cuti->getPeriode();

		$data['get_cuti'] = $this->M_cuti->getCuti($data['filter']);

		$data['get_data_pegawai'] = $this->M_pegawai->getDataPegawai();

		$data['cuti'] 	   = 'active';

		$data['head']     = $this->load->view('head', $data, TRUE);
		$data['navigasi'] = $this->load->view('navigasi', $data, TRUE);
		
		$data['judul']    = 'FingerLog ~ cuti';

		$this->load->view('cuti' , $data);
	}

	public function tambahCuti()
	{
		$x = explode(' - ', $this->input->post('tgl_cuti'));

		$kodetgl = $x[0];

		$this->load->model('M_cuti');

		$date1 = date_create( $x[0] );
		$date2 = date_create( $x[1] );
		$diff  = date_diff($date1,$date2);
		$range =  $diff->format("%R%a days");

		// TANGGAL PINJAM
		$todayDate = $x[0];
		$now = strtotime($todayDate);

		$kode_cuti = strtotime(date('Y-m-d H:i:s'));

		$mulai =  date('Y-m-d', strtotime($x[0]));
		$selesai =  date('Y-m-d', strtotime($x[1]));

		$kode_libur = strtotime(date('Y-m-d H:i:s'));

		if( $this->M_cuti->cekCuti( $this->input->post('pin'), $mulai, $selesai) ){

			$this->notifikasi('danger', 'Gagal ditambahkan tanggal telah dipakai');

		} else {
 
			// BUAT SEMUA TANGGAL
			for ($i=0; $i <= $range ; $i++) { 
			$data['id_cuti']          = '';
			$data['pin']              = $this->input->post('pin');
			$data['kode_cuti']        = $kode_cuti;
			$data['tgl_cuti']         = date('Y-m-d',strtotime( '+'.$i.'days' ,$now));
			$data['kategori']         = $this->input->post('kategori');
	 		$data['keterangan']       = $this->input->post('keterangan');


			$x = $this->M_cuti->tambahCuti($data);

			}


			if ( ! $x) {  
	            $this->notifikasi('danger', 'Gagal ditambahkan');
	        }else{
	            $this->notifikasi('success', 'Berhasil ditambahkan');
	        }

	    }

        redirect(base_url('cuti'));
	}

	public function hapusCuti()
	{
		$id_cuti         = $this->uri->segment(3);

		$this->load->model('M_cuti');

		$x = $this->M_cuti->hapusCuti($id_cuti);

		if ( ! $x) {  
            $this->notifikasi('danger', 'Gagal dihapus');
        }else{
            $this->notifikasi('success', 'Berhasil dihapus');
        }

        redirect(base_url('cuti'));
	}

	public function Pdf()
    {
        $this->load->library('pdf');

        $this->load->model('M_cuti');
		$this->load->model('M_pegawai');

		$filter = $this->session->userdata('filter_cuti');

		$data['filter'] = ( ! is_null($filter)) ? $filter : $this->M_cuti->getPeriode();

		$data['get_cuti'] = $this->M_cuti->getCuti($data['filter']);

		$data['get_data_pegawai'] = $this->M_pegawai->getDataPegawai();
        
        $html = $this->load->view('laporan/pdf_cuti', $data, TRUE);

        $this->pdf->generate($html, 'data_cuti_pegawai');
    }

}

/* End of file Cuti.php */
/* Location: ./application/controllers/Cuti.php */