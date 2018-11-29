<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

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
        $this->load->model('M_status');

        $data['get_status'] = $this->M_status->getStatus();

        $data['status']        = 'active';
        
        $data['head']           = $this->load->view('head', $data, TRUE);
        $data['navigasi']       = $this->load->view('navigasi', $data, TRUE);
        
        $data['judul']          = 'FingerLog ~ Status';

        $this->load->view('status' , $data);
    }



    public function tambahStatus()
    {
        $data['kategori'] = $this->input->post('kategori');
        $data['status']   = $this->input->post('status');
        $data['no_urut']  = $this->input->post('no_urut');

        $this->load->model('M_status');

        $x = $this->M_status->tambahStatus($data);

        if( ! $x ) {  
            $this->notifikasi('danger', 'Gagal ditambahkan');
        } else {
            $this->notifikasi('success', 'Berhasil ditambahkan');
        }

        redirect(base_url('status'));

    }

    public function ubahStatus()
    {
        $id               = $this->input->post('id');
        $data['kategori'] = $this->input->post('kategori');
        $data['status']   = $this->input->post('status');
        $data['no_urut']  = $this->input->post('no_urut');

        $this->load->model('M_status');

        $x = $this->M_status->ubahStatus($data, $id);

        if ( ! $x) {  
            $this->notifikasi('danger', 'Gagal diperbarui');
        }else{
            $this->notifikasi('success', 'Berhasil diperbarui');
        }

        redirect(base_url('status'));

    }

}

/* End of file Status.php */
/* Location: ./application/controllers/Status.php */