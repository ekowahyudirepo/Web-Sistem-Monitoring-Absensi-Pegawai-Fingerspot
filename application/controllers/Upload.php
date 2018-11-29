<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

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
		
		$data['upload']		= 'active';
		
		$data['head']           = $this->load->view('head', $data, TRUE);
		$data['navigasi']       = $this->load->view('navigasi', $data, TRUE);
		
		$data['judul']          = 'FingerLog ~ Upload';

		$this->load->view('upload' , $data);
	}

	public function xml()
	{

		$config['upload_path'] = './xml/';
		$config['allowed_types'] = 'xml';
		$config['file_name']   = 'absensi.xml';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('xml')){
			$this->notifikasi('danger', 'File gagal berhasil diupload');
		}
		else{
			$this->notifikasi('success', 'File berhasil diupload');

		}
		redirect( base_url('upload') );
	}

	public function hapusXml()
	{
		$delete = unlink('./xml/absensi.xml');

		if ( ! $delete ){
			$this->notifikasi('danger', 'File gagal dihapus');
		}
		else{
			$this->notifikasi('success', 'File berhasil dihapus');

		}
		redirect( base_url('upload') );
	}

	public function import()
	{
		if ( file_exists('./xml/absensi.xml') ) {
			
			$xml = simplexml_load_file('./xml/absensi.xml');

			$this->load->model('M_upload');

			foreach ($xml as $row) {

				$data['sn']         = $row->sn;
				$data['scan_date']  = date('Y-m-d H:i', strtotime( str_replace('/', '-', $row->scan_date)));
				$data['pin']        = $row->pin;
				$data['verifymode'] = $row->verifymode;

				$x = $this->M_upload->import($data);

				if ( ! $x ){
					$this->notifikasi('danger', 'File gagal diimport');
				}
				else{
					$this->notifikasi('success', 'File berhasil diimport');

				}
			}

		}

		$delete = unlink('./xml/absensi.xml');

		if ( ! $delete ){
			$this->notifikasi('danger', 'File gagal dihapus');
		}
		else{
			$this->notifikasi('success', 'File berhasil dihapus');

		}

		redirect( base_url('absensi') );
	}

	public function kosongkan()
	{
		$this->load->model('M_upload');

		$x = $this->M_upload->kosongkan();

		if ( ! $x ){
			$this->notifikasi('danger', 'File gagal dikosongkan');
		}
		else{
			$this->notifikasi('success', 'File berhasil dikosongkan');

		}

		redirect( base_url('upload') );
	}

}

/* End of file Upload.php */
/* Location: ./application/controllers/Upload.php */