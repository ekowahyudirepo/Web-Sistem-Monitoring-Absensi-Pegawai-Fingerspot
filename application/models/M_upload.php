<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_upload extends CI_Model {

	public function import($data)
	{
		return $this->db->insert('att_log', $data);
	}

	public function kosongkan()
	{
		return $this->db->query('TRUNCATE TABLE att_log');
	}

}

/* End of file M_upload.php */
/* Location: ./application/models/M_upload.php */