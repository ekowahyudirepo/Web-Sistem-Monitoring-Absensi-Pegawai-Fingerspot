<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

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
        $this->load->model('M_pegawai');
        $this->load->model('M_status');

        $data['get_data_pegawai'] = $this->M_pegawai->getTotalDataPegawai();
        $data['get_status']       = $this->M_status->getStatus();

        $data['pegawai']        = 'active';
        
        $data['head']           = $this->load->view('head', $data, TRUE);
        $data['navigasi']       = $this->load->view('navigasi', $data, TRUE);
        
        $data['judul']          = 'FingerLog ~ Pegawai';

        $this->load->view('pegawai' , $data);
    }



    public function tambahPegawai()
    {
        $data['pin']        = $this->input->post('pin');
        $data['nik']        = $this->input->post('nik');
        $data['nama']       = $this->input->post('nama');
        $data['id_status']  = $this->input->post('id_status');

        $this->load->model('M_pegawai');

        $x = $this->M_pegawai->tambahPegawai($data);

        if( ! $x ) {  
            $this->notifikasi('danger', 'Gagal ditambahkan');
        } else {
            $this->notifikasi('success', 'Berhasil ditambahkan');
        }

        redirect(base_url('pegawai'));

    }

    public function ubahPegawai()
    {
        $id                 = $this->input->post('id');
        $data['nik']        = $this->input->post('nik');
        $data['nama']       = $this->input->post('nama');
        $data['id_status']  = $this->input->post('id_status');

        $this->load->model('M_pegawai');

        $x = $this->M_pegawai->ubahPegawai($data, $id);

        if ( ! $x) {  
            $this->notifikasi('danger', 'Gagal diperbarui');
        }else{
            $this->notifikasi('success', 'Berhasil diperbarui');
        }

        redirect(base_url('pegawai'));

    }

    public function hapusPegawai()
    {
        $id_pegawai         = $this->uri->segment(3);

        $this->load->model('M_pegawai');

        $x = $this->M_pegawai->hapusPegawai($id_pegawai);

        if ( ! $x) {  
            $this->notifikasi('danger', 'Gagal dihapus');
        }else{
            $this->notifikasi('success', 'Berhasil dihapus');
        }

        redirect(base_url('pegawai'));
    }

    public function cekPin()
    {
        $pin = $this->uri->segment(3);

        $this->load->model('M_pegawai');

        echo $this->M_pegawai->cekPin($pin);
    }

    public function Pdf()
    {
        $this->load->library('pdf');

        $this->load->model('M_pegawai');

        $data['get_data_pegawai'] = $this->M_pegawai->getTotalDataPegawai();
        
        $html = $this->load->view('laporan/pdf_pegawai', $data, TRUE);

        $this->pdf->generate($html, 'data_pegawai');
    }

    public function absensiPegawai()
    {
        $pin = $this->uri->segment(3);

        if( $pin == '' ){ redirect( base_url('pegawai') ); }else{ 

            $this->load->model('M_pegawai');

            $data['list']         = $this->M_pegawai->listPeriode();
            
            $data['nama_pegawai'] = $this->M_pegawai->getNama($this->uri->segment(3));
            $data['nip_pegawai']  = $this->M_pegawai->getNip($this->uri->segment(3));
            
            $data['pegawai']     = 'active';
            
            $data['head']           = $this->load->view('head', $data, TRUE);
            $data['navigasi']       = $this->load->view('navigasi', $data, TRUE);
            
            $data['judul']          = 'FingerLog ~ Absensi Pegawai';

            $this->load->view('absensi_pegawai' , $data);
        }
    }

    public function absensiPegawaiPdf()
    {
        $pin = $this->uri->segment(3);

        if( $pin == '' ){ redirect( base_url('pegawai') ); }else{ 

            $this->load->library('pdf');
            
            $this->load->model('M_pegawai');

            $data['list']         = $this->M_pegawai->listPeriode();
            
            $data['nama_pegawai'] = $this->M_pegawai->getNama($this->uri->segment(3));
            $data['nip_pegawai']  = $this->M_pegawai->getNip($this->uri->segment(3));
            
            $html = $this->load->view('laporan/pdf_absensi_pegawai', $data, TRUE);

            $this->pdf->generate($html, 'absensi_'.$data['nama_pegawai'].'');
        }
    }
}
