<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// include_once APPPATH.'/third_party/mpdf/mpdf.php';
include_once APPPATH.'/third_party/mpdf-7/vendor/autoload.php';
class M_pdf
{
	public $parms;
	public $pdf;
	
	public 	function __construct($parms='"en-GB-x","A4","","",10,10,10,10,6,3')
	{
		/*$this->parms=$parms;
		$this->pdf = new mPDF($this->parms);*/
		$this->pdf = new \Mpdf\Mpdf();
	}
}

/*
extra
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output();*/
?>