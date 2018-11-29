<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_log extends CI_Model {

	public function sel($tgl, $pin, $mode)
	{
		$vtgl = date('Y-m-d', strtotime($tgl));
		
		return $this->db->query("SELECT * FROM att_log WHERE scan_date LIKE '%".$vtgl."%' AND pin = '$pin' AND verifymode = '$mode'")->num_rows();
	}

	public function add($value)
	{
		return $this->db->insert('att_log', $value);
	}

}

/* End of file M_log.php */
/* Location: ./application/models/M_log.php */