<?php
require 'vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$nombre_archivo = "undefined";

ob_start();

require_once 'pdfs/Carta_TrabajoGrado.php';
$nombre_archivo = "Carta_Compromisora-";


$html = ob_get_clean();
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ob_end_clean();
$html2pdf = new Html2Pdf('P', 'LETTER', 'es', 'true', 'UTF-8');
$html2pdf->writeHTML($html);
$html2pdf->output($nombre_archivo . $_POST['code'] . '.pdf', 'D');
