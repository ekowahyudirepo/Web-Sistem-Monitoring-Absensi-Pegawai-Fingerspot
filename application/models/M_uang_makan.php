<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_uang_makan extends CI_Model {

	
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
	
	public function getMaxMasuk()
	{
		$aturan = $this->db->query("SELECT um_max_masuk FROM aturan")->row();

		return $aturan->um_max_masuk;
	}

	public function getMinPulang()
	{
		$aturan = $this->db->query("SELECT um_min_pulang FROM aturan")->row();

		return $aturan->um_min_pulang;
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

	public function cekTglLibur( $tgl )
	{
		$x = $this->db->query("SELECT tgl_libur FROM libur WHERE tgl_libur = '".$tgl."' ")->num_rows();

		if ($x >=1 ) {
			return true;
		} else {
			return false;
		}
	}

	public function cekTugasPegawai($pin, $tgl)
	{
		$x = $this->db->query("SELECT id_tugas FROM tugas WHERE pin = '".$pin."' AND tgl_tugas = '".$tgl."'")->num_rows();

		if ($x >=1 ) {
			return true;
		} else {
			return false;
		}
	}

	public function tampilTugas($pin, $tgl )
	{
		return $this->db->query("SELECT kategori, keterangan, tempat FROM tugas WHERE pin = '".$pin."' AND tgl_tugas LIKE '%".$tgl."%'")->result();
	}

	public function cekCutiPegawai($pin, $tgl)
	{
		$x = $this->db->query("SELECT id_cuti FROM cuti WHERE pin = '".$pin."' AND tgl_cuti = '".$tgl."'")->num_rows();

		if ($x >=1 ) {
			return true;
		} else {
			return false;
		}
	}

	public function tampilCuti($pin, $tgl )
	{
		return $this->db->query("SELECT kategori, keterangan FROM cuti WHERE pin = '".$pin."' AND tgl_cuti LIKE '%".$tgl."%'")->result();
	}

	public function cekAbsensi($pin, $tgl)
	{

		$x = $this->db->query("SELECT pin FROM att_log WHERE pin = '".$pin."' AND scan_date LIKE '%".$tgl."%' AND verifymode = '0' ")->num_rows();
		$z = $this->db->query("SELECT pin FROM att_log WHERE pin = '".$pin."' AND scan_date LIKE '%".$tgl."%' AND verifymode = '1' ")->num_rows();

		// kondisi tidak absen masuk  
		if ($x == 0 ) {
			return false;
		}

		// kondisi absen masuk tapi belum absen pulang 
		if ($x >= 1 && $z == 0 ) {
			return false;
		}

		// kondisi absen masuk dan sudah absen pulang
		if ($x >= 1 && $z >= 1 ) {
			return true;
		}
	}

	public function cekAbsensiMasuk($pin, $tgl)
	{
		$num =  $this->db->query("SELECT DATE_FORMAT(scan_date, '%H:%i:%s') as jam_masuk
			FROM att_log 
			WHERE verifymode = '0' AND pin = '".$pin."' AND scan_date LIKE '%".$tgl."%' ")->num_rows();

		if ($num != 0) {
			return true;
		} else {
			return false;
		}
	}

	public function absensiMasuk($pin, $tgl)
	{
		return $this->db->query("SELECT DATE_FORMAT(scan_date, '%H:%i:%s') as jam_masuk
			FROM att_log 
			WHERE verifymode = '0' AND pin = '".$pin."' AND scan_date LIKE '%".$tgl."%' ")->result();
	}

	public function cekAbsensiPulang($pin, $tgl)
	{
		$num =  $this->db->query("SELECT DATE_FORMAT(scan_date, '%H:%i:%s') as jam_pulang
			FROM att_log 
			WHERE verifymode = '1' AND pin = '".$pin."' AND scan_date LIKE '%".$tgl."%' ")->num_rows();

		if ($num != 0) {
			return true;
		} else {
			return false;
		}
	}

	public function absensiPulang($pin, $tgl)
	{
		return $this->db->query("SELECT DATE_FORMAT(scan_date, '%H:%i:%s') as jam_pulang
			FROM att_log 
			WHERE verifymode = '1' AND pin = '".$pin."' AND scan_date LIKE '%".$tgl."%' ")->result();
	}

	public function tdkAdaAturanUm()
	{
		$x = $this->getMaxMasuk();
		$y = $this->getMinPulang();

		if ($x == '00:00:00' && $y == '00:00:00') {
			return true;
		} else {
			return false;
		}


	}

	public function tampilAbsensi($pin, $tgl)
	{
		return $this->db->query("SELECT DATE_FORMAT(scan_date, '%w') as hari ,DATE_FORMAT(scan_date, '%d-%m-%Y') as tgl, min(DATE_FORMAT(scan_date, '%H:%i:%s')) as jam_masuk, max(DATE_FORMAT(scan_date, '%H:%i:%s')) as jam_pulang 
			FROM att_log 
			WHERE pin = '".$pin."' AND scan_date LIKE '%".$tgl."%' ");
	}

	public function cekLembur($pin, $tgl)
	{
		$x = $this->db->query("SELECT pin FROM att_log WHERE pin = '".$pin."' AND scan_date LIKE '%".$tgl."%' AND verifymode = '0' ")->num_rows();
		$z = $this->db->query("SELECT pin FROM att_log WHERE pin = '".$pin."' AND scan_date LIKE '%".$tgl."%' AND verifymode = '1' ")->num_rows();

		// kondisi tidak absen masuk  
		if ($x == 0 ) {
			return false;
		}

		// kondisi absen masuk tapi belum absen pulang 
		if ($x >= 1 && $z == 0 ) {
			return false;
		}

		// kondisi absen masuk dan sudah absen pulang
		if ($x >= 1 && $z >= 1 ) {
			return true;
		}
	}

	public function tampilLembur($pin, $tgl)
	{
		return $this->db->query("SELECT DATE_FORMAT(scan_date, '%w') as hari ,DATE_FORMAT(scan_date, '%d-%m-%Y') as tgl, min(DATE_FORMAT(scan_date, '%H:%i:%s')) as jam_masuk, max(DATE_FORMAT(scan_date, '%H:%i:%s')) as jam_pulang 
			FROM att_log 
			WHERE pin = '".$pin."' AND scan_date LIKE '%".$tgl."%' ");
	}

	public function aturanMasuk($jam_masuk)
	{

		$x = ( $this->getMaxMasuk() == '00:00:00' ) ? 0 : strtotime($this->getMaxMasuk()) ;

		if ($x != 0) {
			if ($x >= strtotime($jam_masuk)) {
				return true;
			} else {
				return false;
			}
		} else {
			return true;
		}

	}

	public function aturanPulang($jam_pulang)
	{
		$y = ( $this->getMinPulang() == '00:00:00' ) ? 0 : strtotime($this->getMinPulang()) ;

		if ($y != 0) {
			if ($y <= strtotime($jam_pulang)) {
				return true;
			} else {
				return false;
			}
		} else {
			return true;
		}

	}

	public function jmlUm($list, $pin)
	{
		$um = 0;
		for($i=0; $i<count($list);$i++ ){ 
            # cek tidak tgl libur
            if( ! $this->M_uang_makan->cekTglLibur($list[$i])){
            	# cek absensi
                if ( $this->M_uang_makan->cekAbsensi( $pin, $list[$i])) { 
                	# cek aturan
                	if( $this->M_uang_makan->tdkAdaAturanUm() ){
                        # tampilkan absensi tanpa aturan um
                        foreach ($this->M_uang_makan->tampilAbsensi( $pin, $list[$i])->result() as $a ) { 

                        	$um++;

                        }

                    } else {

                    	# tampilkan absensi dengan aturan um
                        foreach ($this->M_uang_makan->tampilAbsensi( $pin, $list[$i])->result() as $a ) { 
                        	# jalankan aturan saat menampilkan perulangan
                        	if( $this->M_uang_makan->aturanMasuk( $a->jam_masuk ) && $this->M_uang_makan->aturanPulang( $a->jam_pulang )  ){

	                        	$um++;

	                        }

                        }

                    }

                }  

            } else {
            	# CEK LEMBUR 
            	#if( $this->M_uang_makan->cekLembur( $pin, $list[$i] ) ){ 
            		# TAMPILKAN LEMBUR
                    #foreach ( $this->M_uang_makan->tampilLembur( $pin, $list[$i])->result() as $b ) {

                       # $um++;

                    #}

                #}
            }

        } 

        return $um;
	}


}

/* End of file M_uang_makan.php */
/* Location: ./application/models/M_uang_makan.php */