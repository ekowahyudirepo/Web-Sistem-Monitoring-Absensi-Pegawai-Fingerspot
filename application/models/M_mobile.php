<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mobile extends CI_Model {

	public function getPeriode()
	{
		$aturan = $this->db->query("SELECT periode FROM aturan")->row();

		return $aturan->periode;
	}

	public function listPeriode()
	{
		$periode = $this->getPeriode();

		$x       = explode(' - ', $periode);
		$tgl1    = date('Y-m-d', strtotime($x[0]));
		$tgl2    = date('Y-m-d', strtotime($x[1]));

		// FUNGSI MENGHITUNG RANGE TANGGAL
		$date1 = date_create( $tgl1 );
		$date2 = date_create( $tgl2 );
		$diff  = date_diff($date1,$date2);
		$range =  $diff->format("%R%a days");

		// TANGGAL PINJAM
		$todayDate = $tgl1;
		$now = strtotime($todayDate);
 
		// BUAT SEMUA TANGGAL
		for ($i=0; $i <= $range ; $i++) { 
		    $nilai[] = date('Y-m-d',strtotime( '+'.$i.'days' ,$now));
		}

		return $nilai;
	}

	public function getLabelPeriode()
	{
		$x = explode(' - ', $this->getPeriode());
		return date('d-m-Y', strtotime($x[0])).' s/d '. date('d-m-Y', strtotime($x[1]));
	}

	public function getNama($pin)
	{
		$pegawai = $this->db->query("SELECT nama FROM pegawai WHERE pin = '".$pin."' ")->row();

		return $pegawai->nama;
	}

}

/* End of file M_mobile.php */
/* Location: ./application/models/M_mobile.php */