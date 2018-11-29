<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kehadiran extends CI_Model {

	public function hadir($tgl)
	{
		return $this->db->query("SELECT DISTINCT(pin) FROM att_log WHERE verifymode = '0' AND scan_date LIKE '%".$tgl."%' ")->num_rows();
	}

}

/* End of file M_kehadiran.php */
/* Location: ./application/models/M_kehadiran.php */