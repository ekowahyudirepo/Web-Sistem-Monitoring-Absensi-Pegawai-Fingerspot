<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {

	public function getPeriode()
	{
		$aturan = $this->db->query("SELECT periode FROM aturan")->row();

		return $aturan->periode;
	}

	public function getNama($pin)
	{
		$pegawai = $this->db->query("SELECT nama FROM pegawai WHERE pin = '".$pin."'")->row();

		return $pegawai->nama;
	}

	public function getNip($pin)
	{
		$pegawai = $this->db->query("SELECT nik FROM pegawai WHERE pin = '".$pin."'")->row();

		return $pegawai->nik;
	}

	public function getLabelPeriode()
	{
		$x = explode(' - ', $this->getPeriode());
		return date('d-m-Y', strtotime($x[0])).' s/d '. date('d-m-Y', strtotime($x[1]));
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

	public function getDataPegawai()
	{
		return $this->db->query("SELECT pegawai.*, status.kategori, status.status FROM pegawai JOIN status ON status.id_status = pegawai.id_status WHERE status.kategori = 'PNS' ORDER BY status.no_urut ASC ");
	}

	public function getTotalDataPegawai()
	{
		return $this->db->query("SELECT pegawai.*, status.kategori, status.status FROM pegawai JOIN status ON status.id_status = pegawai.id_status ORDER BY status.no_urut ASC ");
	}

	public function tambahPegawai($value)
	{
		return $this->db->insert('pegawai', $value);
	}

	public function ubahPegawai($value,$id)
	{
		$this->db->where('id_pegawai', $id);
		return $this->db->update('pegawai', $value);
	}

	public function hapusPegawai($id)
	{
		$this->db->where('id_pegawai', $id);
		return $this->db->delete('pegawai');
	}

	public function cekPin($pin)
	{
		return $this->db->query("SELECT pin FROM pegawai WHERE pin = '".$pin."' ")->num_rows();
	}

	public function getAbsensiMasuk($pin, $tgl)
	{
		$am =  $this->db->query("SELECT DATE_FORMAT(scan_date, '%H:%i:%s') as jam_masuk FROM att_log
			 WHERE verifymode = '0' AND pin = '".$pin."' AND scan_date LIKE '%".$tgl."%' ")->row();

		return $am->jam_masuk;
	}

	public function getAbsensiPulang($pin, $tgl)
	{
		$ap = $this->db->query("SELECT DATE_FORMAT(scan_date, '%H:%i:%s') as jam_pulang FROM att_log
			 WHERE verifymode = '1' AND pin = '".$pin."' AND scan_date LIKE '%".$tgl."%' ")->row();

		return $ap->jam_pulang;
	}
}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */