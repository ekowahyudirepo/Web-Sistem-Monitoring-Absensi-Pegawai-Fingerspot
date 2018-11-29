<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Pdf
{

	public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = 'portrait')
	{

		define('DOMPDF_ENABLE_AUTOLOAD', false);
		
		require_once('./pdf/dompdf_config.inc.php');

		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->set_paper($paper, $orientation);
		$dompdf->render();

		$dompdf->stream($filename.".pdf", array("Attachment" => 0));

	}

	

}

/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */
