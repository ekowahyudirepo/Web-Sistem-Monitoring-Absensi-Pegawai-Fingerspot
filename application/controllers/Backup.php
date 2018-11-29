<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller {

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

		$data['head']     = $this->load->view('head', $data, TRUE);
		$data['navigasi'] = $this->load->view('navigasi', $data, TRUE);
		
		$data['judul']    = 'FingerLog ~ Backup';

		$data['disabled'] = ($this->session->userdata('edit') == 'on') ? '' : 'disabled';

		$this->load->view('backup_dan_restore' , $data);
	}


	public function backup()
	{
		$this->load->dbutil();

		$setting = array(

			'format' => 'txt',

		);

		$backup = $this->dbutil->backup($setting);

		$this->load->helper('file');

		$x = write_file('./dbbackup/backup-'.date('Ymd-His').'.sql', $backup );

		if ( ! $x ){
			$this->notifikasi('danger', 'Gagal membackup');
		}
		else{
			$this->notifikasi('success', 'Berhasil membackup');

		}

		redirect(base_url('backup'));

	}

	public function hapusFile()
	{

		$x = unlink('./dbbackup/'. $this->uri->segment(3).'');

		if ( ! $x ){
			$this->notifikasi('danger', 'Gagal menghapus');
		}
		else{
			$this->notifikasi('success', 'Berhasil menghapus');

		}

		redirect(base_url('backup'));
	}

	public function restore()
	{
		$file = file_get_contents('./dbbackup/'. $this->uri->segment(3).'');

		$string_query = rtrim($file, "\n;");

		$array_query  = explode(";", $string_query);

		foreach ($array_query as $query) {
			$x = $this->db->query($query);
		}

		$this->notifikasi('success', 'Restore Selesai');

		redirect(base_url('backup'));
	}


	public function download()
	{
		$this->load->library('zip');

		$file = file_get_contents('./dbbackup/'. $this->uri->segment(3).'');

		$this->zip->add_data(''. $this->uri->segment(3).'', $file );

		$this->zip->download(''.$this->uri->segment(3).'.zip');
	}

}

/* End of file Backup.php */
/* Location: ./application/controllers/Backup.php */