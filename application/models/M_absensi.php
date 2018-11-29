<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_absensi extends CI_Model {

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

	public function getRealAbsensiMasuk($tgl)
	{
		return $this->db->query("SELECT att_log.pin, DATE_FORMAT(att_log.scan_date, '%H:%i:%s') as jam_masuk, pegawai.nik, pegawai.nama,status.kategori,status.status FROM att_log 
			JOIN pegawai ON pegawai.pin = att_log.pin
			JOIN status ON status.id_status = pegawai.id_status
			WHERE att_log.verifymode = '0' AND att_log.scan_date LIKE '%".$tgl."%' GROUP BY att_log.pin ")->result();
	}

	public function getRealAbsensiPulang($pin, $tgl)
	{
		$absen =  $this->db->query("SELECT DATE_FORMAT(scan_date, '%H:%i:%s') as jam_pulang FROM att_log WHERE verifymode = '1' AND pin = '".$pin."' AND scan_date LIKE '%".$tgl."%' ")->row();

		return $absen->jam_pulang;
	}

	public function absensiMasuk($pin,$tgl)
	{
		$sql =  $this->db->query("SELECT DATE_FORMAT(scan_date, '%H:%i:%s') as masuk FROM att_log
			 WHERE verifymode = '0' AND pin = '".$pin."' AND scan_date LIKE '%".$tgl."%' ");

		$absen = $sql->row();

		return $absen->masuk;
	}

	public function absensiPulang($pin,$tgl)
	{
		$sql = $this->db->query("SELECT DATE_FORMAT(scan_date, '%H:%i:%s') as pulang FROM att_log 
			WHERE verifymode = '1' AND pin = '".$pin."' AND scan_date LIKE '%".$tgl."%' ");

		$absen = $sql->row();

		return $absen->pulang;

	}

	public function cekAbsensiGanda($pin,$tgl)
	{
		$num =  $this->db->query("SELECT DATE_FORMAT(scan_date, '%H:%i:%s') as masuk FROM att_log
			 WHERE verifymode = '0' AND pin = '".$pin."' AND scan_date LIKE '%".$tgl."%' ")->num_rows();

		if ( $num >= 2 ) {
			return true;
		} else {
			return false;
		}
	}

	public function getAbsensiMasuk($pin, $tgl)
	{
		return $this->db->query("SELECT scan_date as tanggal, DATE_FORMAT(scan_date, '%H:%i:%s') as masuk FROM att_log
			 WHERE verifymode = '0' AND pin = '".$pin."' AND scan_date LIKE '%".$tgl."%' ");
	}

	public function getAbsensiPulang($pin, $tgl)
	{
		return $this->db->query("SELECT scan_date as tanggal, DATE_FORMAT(scan_date, '%H:%i:%s') as pulang FROM att_log
			 WHERE verifymode = '1' AND pin = '".$pin."' AND scan_date LIKE '%".$tgl."%' ");
	}

	public function hapusAbsensi($pin, $tgl, $mode)
	{
		$this->db->where('pin', $pin);
		$this->db->where('scan_date', $tgl);
		$this->db->where('verifymode', $mode);
		return $this->db->delete('att_log');
	}

}

/* End of file M_absensi.php */
/* Location: ./application/models/M_absensi.php */