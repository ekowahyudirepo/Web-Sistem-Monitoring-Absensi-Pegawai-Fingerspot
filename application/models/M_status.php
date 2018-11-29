<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_status extends CI_Model {

	public function getStatus()
	{
		return $this->db->query("SELECT * FROM status ORDER BY no_urut ASC");
	}

	public function tambahStatus($value)
	{
		return $this->db->insert('status', $value);
	}

	public function ubahStatus($value,$id)
	{
		$this->db->where('id_status', $id);
		return $this->db->update('status', $value);
	}

}

/* End of file M_status.php */
/* Location: ./application/models/M_status.php */