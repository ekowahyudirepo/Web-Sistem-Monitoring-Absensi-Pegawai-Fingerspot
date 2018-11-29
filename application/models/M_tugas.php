<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tugas extends CI_Model {

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

	public function getTugas($tgl)
	{
		if( $tgl != '' ){

			$x = explode(' - ', $tgl);

		} else {

			$value = $this->getPeriode();

			$x = explode(' - ', $value);

		}

		$tgl1 = date('Y-m-d', strtotime($x[0]));
		$tgl2 = date('Y-m-d', strtotime($x[1]));

		$filter = "WHERE tugas.tgl_tugas BETWEEN '".$tgl1."' AND '".$tgl2."'";

		return $this->db->query("SELECT tugas.*, min(tugas.tgl_tugas) as mulai , max(tugas.tgl_tugas) as sampai , pegawai.nama FROM tugas JOIN pegawai ON pegawai.pin = tugas.pin
			$filter 
			GROUP BY tugas.kode_tugas
			");
	}

	public function cekTugas( $pin, $mulai, $selesai )
	{
		return $num = $this->db->query("SELECT * FROM `view_tugas` WHERE pin = '".$pin."' AND mulai BETWEEN '".$mulai."' AND '".$selesai."' or selesai BETWEEN '".$mulai."' AND '".$selesai."'")->num_rows();

		if ($num > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function tambahTugas($value)
	{
		return $this->db->insert('tugas', $value);
	}

	public function hapusTugas($value)
	{
		$this->db->where('kode_tugas', $value);
		return $this->db->delete('tugas');
	}

}

/* End of file M_tugas.php */
/* Location: ./application/models/M_tugas.php */