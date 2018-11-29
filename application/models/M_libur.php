<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_libur extends CI_Model {

	public function getPeriode()
	{
		$aturan = $this->db->query("SELECT periode FROM aturan")->row();

		return $aturan->periode;
	}

	public function getLabelPeriode()
	{
		$x = explode(' - ', $this->getPeriode());
		return date('d-m-Y', strtotime($x[0])).' s/d '. date('d-m-Y', strtotime($x[1]));
	}

	public function getDataLibur()
	{
		return $this->db->query("SElECT * FROM `view_libur` ORDER BY mulai ASC");
	}

	public function cekLibur( $mulai, $selesai )
	{
		return $num = $this->db->query("SElECT * FROM `view_libur` WHERE mulai BETWEEN '".$mulai."' and '".$selesai."' or selesai BETWEEN '".$mulai."' and '".$selesai."'")->num_rows();

		if ($num > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function tambahLibur($object)
	{
		return $this->db->insert('libur', $object);
	}

	public function hapusLibur($id)
	{
		$this->db->where('kode_libur', $id);
		return $this->db->delete('libur');
	}



}

/* End of file M_libur.php */
/* Location: ./application/models/M_libur.php */