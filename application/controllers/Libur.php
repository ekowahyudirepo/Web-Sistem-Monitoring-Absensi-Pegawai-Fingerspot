<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Libur extends CI_Controller {

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

	public function index()
	{
		$this->load->model('M_libur');

		$data['get_libur']      = $this->M_libur->getDataLibur();

		$data['libur']		    = 'active';
		
		$data['head']           = $this->load->view('head', $data, TRUE);
		$data['navigasi']       = $this->load->view('navigasi', $data, TRUE);
		
		$data['judul']          = 'FingerLog ~ Libur';

		$this->load->view('libur' , $data);
	}

	public function tambahLibur()
	{
		
		$x = explode(' - ', $this->input->post('tgl_libur'));

		$this->load->model('M_libur');

		$date1 = date_create( $x[0] );
		$date2 = date_create( $x[1] );
		$diff  = date_diff($date1,$date2);
		$range =  $diff->format("%R%a days");

		// TANGGAL PINJAM
		$todayDate = $x[0];
		
		$now = strtotime($todayDate);

		$mulai =  date('Y-m-d', strtotime($x[0]));
		$selesai =  date('Y-m-d', strtotime($x[1]));

		$kode_libur = strtotime(date('Y-m-d H:i:s'));

		if( $this->M_libur->cekLibur($mulai, $selesai) ){

			$this->notifikasi('danger', 'Gagal ditambahkan tanggal libur telah dipakai');

		} else {
 
			// BUAT SEMUA TANGGAL
			for ($i=0; $i <= $range ; $i++) { 
				$data['id_libur']         = '';
				$data['kode_libur']       = $kode_libur;
				$data['keterangan_libur'] = $_POST['keterangan'];
				$data['tgl_libur']        = date('Y-m-d',strtotime( '+'.$i.'days' ,$now));

				$x = $this->M_libur->tambahLibur($data);

			}

			if( ! $x ) {  
	            $this->notifikasi('danger', 'Gagal ditambahkan');
	        } else {
	            $this->notifikasi('success', 'Berhasil ditambahkan');
	        }

	    }

	    redirect(base_url('libur'));

	}

	public function hapusLibur()
	{
		$id_libur         = $this->uri->segment(3);

		$this->load->model('M_libur');

		$x = $this->M_libur->hapusLibur($id_libur);

		if ( ! $x) {  
            $this->notifikasi('danger', 'Gagal dihapus');
        }else{
            $this->notifikasi('success', 'Berhasil dihapus');
        }

        redirect(base_url('libur'));
	}

	public function Pdf()
    {
        $this->load->library('pdf');

        $this->load->model('M_libur');

		$data['get_libur']      = $this->M_libur->getDataLibur();
        
        $html = $this->load->view('laporan/pdf_libur', $data, TRUE);

        $this->pdf->generate($html, 'data_libur');
    }

}

/* End of file Libur.php */
/* Location: ./application/controllers/Libur.php */