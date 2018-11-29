<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aturan extends CI_Controller {

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
		$this->load->model('M_aturan');

		$data['get_aturan'] = $this->M_aturan->getAturan();

		$data['head']     = $this->load->view('head', $data, TRUE);
		$data['navigasi'] = $this->load->view('navigasi', $data, TRUE);
		
		$data['judul']    = 'FingerLog ~ Aturan';

		$data['disabled'] = ($this->session->userdata('edit') == 'on') ? '' : 'disabled';

		$this->load->view('aturan' , $data);
	}

	public function ubahAturan()
	{
		$data['jam_masuk']      = $this->input->post('jam_masuk');
		$data['toleransi']      = $this->input->post('toleransi');
		$data['jam_masuk_set']  = $this->input->post('jam_masuk_set');
		$data['jam_pulang']     = $this->input->post('jam_pulang');
		$data['jam_pulang_jum'] = $this->input->post('jam_pulang_jum');
		$data['lama_kerja']     = $this->input->post('lama_kerja');
		$data['um_max_masuk']   = $this->input->post('um_max_masuk');
		$data['um_min_pulang']  = $this->input->post('um_min_pulang');
		$data['periode']        = $this->input->post('periode');

		$this->load->model('M_aturan');

		$x = $this->M_aturan->ubahAturan($data);

		if ( ! $x) {  
            $this->notifikasi('danger', 'Gagal disimpan');
        }else{
            $this->notifikasi('success', 'Berhasil disimpan');
        }

        redirect(base_url('aturan'));

	}

	public function ubahPassword()
	{
		$data['username']      = $this->input->post('username');
		$data['password']      = md5($this->input->post('password'));

		$this->load->model('M_aturan');

		$x = $this->M_aturan->ubahPassword($data);

		if ( ! $x) {  
            $this->notifikasi('danger', 'Password telah berubah');
        }else{
            $this->notifikasi('success', 'Berhasil disimpan untuk memastikan anda mengingat password baru anda , silahkan login kembali');
        }

        redirect(base_url('login'));

	}

	public function calLamaKerja()
	{
		$jam_masuk = $this->uri->segment(3);
		$jam_pulang = $this->uri->segment(4);

		$x = strtotime($jam_masuk);
		$y = strtotime($jam_pulang);

		echo (($y - $x) - 3600)/60;
	}

}

/* End of file Aturan.php */
/* Location: ./application/controllers/Aturan.php */