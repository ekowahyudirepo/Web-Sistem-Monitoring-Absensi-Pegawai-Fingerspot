<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_aturan extends CI_Model {

	public function getAturan()
	{
		return $this->db->query("SELECT * FROM aturan");
	}

	public function getPeriodeAturan()
	{
		return $this->db->query("SELECT periode FROM aturan");
	}

	public function ubahAturan($value)
	{
		return $this->db->update('aturan', $value);
	}

	public function ubahPassword($value)
	{
		return $this->db->update('admin', $value);
	}

}

/* End of file M_aturan.php */
/* Location: ./application/models/M_aturan.php */