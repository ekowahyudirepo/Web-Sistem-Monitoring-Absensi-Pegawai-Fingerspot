<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cuti extends CI_Model {

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

	public function getCuti($value='')
	{
		if( $tgl != '' ){

			$x = explode(' - ', $tgl);

		} else {

			$value = $this->getPeriode();

			$x = explode(' - ', $value);

		}


		$tgl1 = date('Y-m-d', strtotime($x[0]));
		$tgl2 = date('Y-m-d', strtotime($x[1]));

		$filter = "WHERE cuti.tgl_cuti BETWEEN '".$tgl1."' AND '".$tgl2."'";

		return $this->db->query("SELECT cuti.*,min(cuti.tgl_cuti) as mulai, max(cuti.tgl_cuti) as sampai, pegawai.nama FROM cuti JOIN pegawai ON pegawai.pin = cuti.pin
			$filter
			GROUP BY cuti.kode_cuti DESC
			");
	}

	public function cekCuti( $pin, $mulai, $selesai )
	{
		return $num = $this->db->query("SELECT * FROM `view_cuti` WHERE pin = '".$pin."' AND mulai BETWEEN '".$mulai."' AND '".$selesai."' or selesai BETWEEN '".$mulai."' AND '".$selesai."'")->num_rows();

		if ($num > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function tambahCuti($value)
	{
		return $this->db->insert('cuti', $value);
	}

	public function hapusCuti($value)
	{
		$this->db->where('kode_cuti', $value);
		return $this->db->delete('cuti');
	}

}

/* End of file M_cuti.php */
/* Location: ./application/models/M_cuti.php */