<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tukin extends CI_Model {

	public function getNama($pin)
	{
		$pegawai = $this->db->query("SELECT nama FROM pegawai WHERE pin = '".$pin."' ")->row();

		return $pegawai->nama;
	}

	public function getNip($pin)
	{
		$pegawai = $this->db->query("SELECT nik FROM pegawai WHERE pin = '".$pin."' ")->row();

		return $pegawai->nik;
	}

	
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

	public function getJamMasuk()
	{
		$aturan = $this->db->query("SELECT jam_masuk FROM aturan")->row();

		return $aturan->jam_masuk;
	}

	public function getToleransi()
	{
		$aturan = $this->db->query("SELECT toleransi FROM aturan")->row();

		return $aturan->toleransi;
	}

	public function getJamPulang()
	{
		$aturan = $this->db->query("SELECT jam_pulang FROM aturan")->row();

		return $aturan->jam_pulang;
	}

	public function getJamJumat()
	{
		$aturan = $this->db->query("SELECT jam_pulang_jum FROM aturan")->row();

		return $aturan->jam_pulang_jum;
	}

	public function getLamaKerja()
	{
		$aturan = $this->db->query("SELECT lama_kerja FROM aturan")->row();

		return $aturan->lama_kerja;
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

	public function cekCutiNegara($pin, $tgl)
	{
		$x = $this->db->query("SELECT id_cuti FROM cuti WHERE pin = '".$pin."' AND tgl_cuti = '".$tgl."' AND kategori = 'negara' ")->num_rows();

		if ($x >=1 ) {
			return true;
		} else {
			return false;
		}
	}

	public function tampilCutiNegara($pin, $tgl )
	{
		$x = $this->db->query("SELECT keterangan FROM cuti WHERE pin = '".$pin."' AND tgl_cuti LIKE '%".$tgl."%' AND kategori = 'negara' ")->row();

		return $x->keterangan;
	}

	public function cekTugas($pin, $tgl, $kategori )
	{
		$x = $this->db->query("SELECT id_tugas FROM tugas WHERE pin = '".$pin."' AND tgl_tugas = '".$tgl."' AND kategori = '".$kategori."'  ")->num_rows();

		if ($x >=1 ) {
			return true;
		} else {
			return false;
		}
	}

	public function tampilTugas($pin, $tgl ,$kategori)
	{
		$x = $this->db->query("SELECT keterangan, tempat FROM tugas WHERE pin = '".$pin."' AND tgl_tugas LIKE '%".$tgl."%' AND kategori = '".$kategori."' ")->row();

		return 'Tugas Ke -'. $x->tempat.'<br>Perihal : '.$x->keterangan.'';
	}

	public function cekAbsensiMasuk($pin, $tgl)
	{
		$x = $this->db->query("SELECT DATE_FORMAT(scan_date, '%w') as hari ,DATE_FORMAT(scan_date, '%d-%m-%Y') as tgl, DATE_FORMAT(scan_date, '%H:%i:%s') as jam_masuk
			FROM att_log 
			WHERE verifymode = '0' AND pin = '".$pin."' AND scan_date LIKE '%".$tgl."%' ")->num_rows();

		if ($x >=1 ) {
			return true;
		} else {
			return false;
		}
	}

	public function absensiMasuk($pin, $tgl)
	{
		return $this->db->query("SELECT DATE_FORMAT(scan_date, '%w') as hari ,DATE_FORMAT(scan_date, '%d-%m-%Y') as tgl, DATE_FORMAT(scan_date, '%H:%i:%s') as jam_masuk
			FROM att_log 
			WHERE verifymode = '0' AND pin = '".$pin."' AND scan_date LIKE '%".$tgl."%' ");
	}

	public function cekHariJumat($tgl)
	{
		$hari = date('D', strtotime($tgl));

		if ($hari == 'Fri' ) {
			return true;
		} else {
			return false;
		}
	}

	public function jamMasukSet($jam_masuk)
	{

		if ( strtotime($jam_masuk) <= strtotime($this->getJamMasuk()) ) {
			return $this->getJamMasuk();
		} elseif ( strtotime($jam_masuk) > strtotime($this->getJamMasuk()) && strtotime($jam_masuk) <= strtotime($this->getToleransi()) ) {
			return $jam_masuk;
		} elseif ( strtotime($jam_masuk) > strtotime($this->getToleransi()) ) {
			return $jam_masuk;
		}

	}


	public function harusPulang($jamMasukSet, $tgl)
	{
		if ( ! $this->cekHariJumat($tgl)) {
			$lama_kerja = ($this->getLamaKerja() * 60) + 3600;

			$x =  strtotime($jamMasukSet) + $lama_kerja;

			return date("H:i:s", $x);
		} else {
			$lama_kerja = ($this->getLamaKerja() * 60) + 3600 + 1800;

			$x =  strtotime($jamMasukSet) + $lama_kerja;

			return date("H:i:s", $x);
		}

		
	}

	public function cekAbsensiPulang($pin, $tgl)
	{
		$x = $this->db->query("SELECT DATE_FORMAT(scan_date, '%w') as hari ,DATE_FORMAT(scan_date, '%d-%m-%Y') as tgl, DATE_FORMAT(scan_date, '%H:%i:%s') as jam_pulang
			FROM att_log 
			WHERE verifymode = '1' AND pin = '".$pin."' AND scan_date LIKE '%".$tgl."%' ")->num_rows();

		if ($x >=1 ) {
			return true;
		} else {
			return false;
		}
	}

	public function tampilAbsensiPulang($pin, $tgl)
	{
		return $this->db->query("SELECT DATE_FORMAT(scan_date, '%w') as hari ,DATE_FORMAT(scan_date, '%d-%m-%Y') as tgl, DATE_FORMAT(scan_date, '%H:%i:%s') as jam_pulang
			FROM att_log 
			WHERE verifymode = '1' AND pin = '".$pin."' AND scan_date LIKE '%".$tgl."%' ");
	}

	public function cekPswPulangSaja($tgl='')
	{
		if ( ! $this->cekHariJumat($tgl)) {

			return $this->getJamPulang();
			// return '16:00:00';

		} else {

			return $this->getJamJumat();
			// return '16:30:00';
		}

		// return $this->getJamJumat();
	}


	public function absensiPulang($pin, $tgl)
	{
		$x =  $this->db->query("SELECT DATE_FORMAT(scan_date, '%H:%i:%s') as jam_pulang
			FROM att_log 
			WHERE verifymode = '1' AND pin = '".$pin."' AND scan_date LIKE '%".$tgl."%' ")->row();

		return $x->jam_pulang;
	}

	public function lamaKerja($jam_masuk_set, $jam_pulang, $tgl)
	{
		if ( ! $this->cekHariJumat($tgl)) {
			return round(( strtotime($jam_pulang) - strtotime($jam_masuk_set) - 3600 ) / 60);
		} else {
			return round(( strtotime($jam_pulang) - strtotime($jam_masuk_set) - 5400 ) / 60);
		}
	}

	public function telat($jam_masuk)
	{
		if ( strtotime($jam_masuk) > strtotime($this->getToleransi()) ) {
			
			$menit = strtotime($jam_masuk) - strtotime($this->getToleransi());

			if ($menit <= (30*60)) {
				
				return "TL.1";

			}

			if ($menit >= (31*60) && $menit <= (60*60)) {
				
				return "TL.2";

			}

			if ($menit >= (61*60) && $menit <= (90*60)) {
				
				return "TL.3";

			}

			if ($menit >= (91*60)) {
				
				return "TL.4";

			}

		} else {
			return "-";
		}
	}


	public function pulangAwal($jam_pulang, $harus_pulang)
	{
		if ( strtotime($jam_pulang) < strtotime($harus_pulang) ) {
			
			$menit = strtotime($harus_pulang) - strtotime($jam_pulang);

			if ($menit <= (30*60)) {
					
				return "PSW.1";

			}

			if ($menit >= (31*60) && $menit <= (60*60)) {
				
				return "PSW.2";

			}

			if ($menit >= (61*60) && $menit <= (90*60)) {
				
				return "PSW.3";

			}

			if ($menit >= (91*60)) {
				
				return "PSW.4";

			}

		} else {
			return "-";
		}
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

	public function cekTugasDalam($pin, $tgl )
	{
		$x = $this->db->query("SELECT id_tugas FROM tugas WHERE pin = '".$pin."' AND tgl_tugas = '".$tgl."' AND kategori = 'Dalam Kota' ")->num_rows();

		if ($x >=1 ) {
			return true;
		} else {
			return false;
		}
	}

	public function tampilTugasDalam($pin, $tgl )
	{
		return $this->db->query("SELECT tgl_tugas, keterangan, tempat FROM tugas WHERE pin = '".$pin."' AND tgl_tugas LIKE '%".$tgl."%' AND kategori = 'Dalam Kota' ")->result();

	}


	public function getTl($list, $pin, $jenis)
	{
	 	$t = 0;

	    for($i=0; $i<count($list);$i++ ){

	        if ( ! $this->M_tukin->cekTglLibur($list[$i]) ) {
	            
	         	if( $this->M_tukin->cekCutiNegara( $pin, $list[$i]) ){

	         	} elseif( $this->M_tukin->cekTugas($pin, $list[$i], 'Luar Kota' ) ) {

	         	} elseif( $this->M_tukin->cekAbsensiMasuk($pin, $list[$i] ) ) {
      	          
	                foreach( $this->M_tukin->absensiMasuk($pin, $list[$i] )->result() as $row ){
	                
                        if( $this->M_tukin->telat($row->jam_masuk) == $jenis ){
                            $t++;
                        }
                	}

	            } elseif( $this->M_tukin->cekAbsensiPulang($pin, $list[$i] )) {
                	if( $jenis == 'TL.4' ){
                		$t++;
                	}
                } else {

                }

	        }
	    }

	    return $t;

	}

	public function getPa($list, $pin, $jenis)
	{
	 	$t=0;

	 	for($i=0; $i<count($list);$i++ ){

	        if ( ! $this->M_tukin->cekTglLibur($list[$i]) ) {
	            
	         	if( $this->M_tukin->cekCutiNegara( $pin, $list[$i]) ){

	         	} elseif( $this->M_tukin->cekTugas($pin, $list[$i], 'Luar Kota' ) ) {

	         	} elseif( $this->M_tukin->cekAbsensiMasuk($pin, $list[$i] ) ) {
      	          
	                foreach( $this->M_tukin->absensiMasuk($pin, $list[$i] )->result() as $row ){
	                
                        if($this->M_tukin->absensiPulang( $pin, $list[$i] ) != ''){
                        	if( $this->M_tukin->pulangAwal($this->M_tukin->absensiPulang( $pin, $list[$i] ), $this->M_tukin->harusPulang($this->M_tukin->jamMasukSet($row->jam_masuk))) == $jenis ){
                        			$t++;
                        	}
                        } else {
                        	if ($jenis == 'PSW.4') {
                        		$t++;
                        	}
                        }
                	}

	            } elseif( $this->M_tukin->cekAbsensiPulang($pin, $list[$i] )) {
                	foreach ( $this->M_tukin->tampilAbsensiPulang($pin, $list[$i] )->result() as $row2) {
	            		if($this->M_tukin->absensiPulang( $pin, $list[$i] ) != ''){
                        	if( $this->M_tukin->pulangAwal($row2->jam_pulang, $this->M_tukin->cekPswPulangSaja($list[$i])) == $jenis ){
                        			$t++;
                        	}
                        } else {
                        	if ($jenis == 'PSW.4') {
                        		$t++;
                        	}
                        }
	            	}

                } else {
                	
                }

	        }
	    }

	    return $t;

	}

	public function mangkir($list, $pin)
	{

		$t=0;
	    for($i=0; $i<count($list);$i++ ){

            if ( ! $this->M_tukin->cekTglLibur($list[$i]) ) {

	            if( $this->M_tukin->cekCutiNegara( $pin, $list[$i] ) ){

	            } elseif( $this->M_tukin->cekTugas($pin, $list[$i], 'Luar Kota' ) ) {

	            } elseif( $this->M_tukin->cekAbsensiMasuk($pin, $list[$i] ) ) {
	 
	            } elseif( $this->M_tukin->cekAbsensiPulang($pin, $list[$i] )) {

	            } else {

	                $t++;

	            } 
            
            } 
        }

	    return $t;

		
	}







}

/* End of file M_tukin.php */
/* Location: ./application/models/M_tukin.php */