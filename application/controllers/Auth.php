<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        date_default_timezone_set('Asia/Jakarta');
    }

    public function notifikasi($type, $pesan)
    {
        $this->session->set_flashdata('notifikasi', '<div class="alert alert-dismissible alert-'.$type.'">'.$pesan.'                     
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>');
    }

	public function admin()
	{
		$username    = $this->input->post('username');
		$password    = md5($this->input->post('password'));

		$this->load->model('M_auth');

		$sql = $this->M_auth->admin($username, $password);

		$admin = $sql->num_rows();
		$row     = $sql->row();

		if ($admin == 1) {
			$array = array(
				'id_admin' => $row->id_admin,
				'username' => $row->username
			);
			
			$this->session->set_userdata( $array );

			redirect(base_url('absensi'));
		} else {
			$this->notifikasi('danger', 'Perhatian ! username atau password salah');
			redirect(base_url('login'));
		}

	}

	public function logout()
	{
		$this->notifikasi('success','Anda telah keluar dari aplikasi');
		redirect(base_url('login'));
	}


}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */