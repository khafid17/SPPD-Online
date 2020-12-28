<?php
// Require composer autoload
require_once('path/vendor/autoload.php');
// use \Mpdf\Output\Destination;
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

ob_start();
$nomor= $_GET['nomor'];
include "lampiransppd.php";
$html = ob_get_contents();
ob_end_clean();

// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();