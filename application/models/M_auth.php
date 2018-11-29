<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	public function admin($username, $password)
	{
		return $this->db->query("SELECT * FROM admin WHERE username = '$username' AND password = '$password' ");
	}

}

/* End of file M_auth.php */
/* Location: ./application/models/M_auth.php */