<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Format
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function getHari($value)
	{
		$nilai;

		$str = substr($value, 0,1);

		if ($str == 0 ) {
			$nilai = substr($value, 1,1);
		} else {
			$nilai = $value;
		}

		$x = array('Minggu','Senin','Selasa','Rabo','Kamis','Jumat','Sabtu');

		return $x[$nilai];

	}

	public function getHari2($value)
	{

		$x = array('Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabo','Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu');

		return $x[$value];

	}

	


	

}

/* End of file Format.php */
/* Location: ./application/libraries/Format.php */
