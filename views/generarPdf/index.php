<?php
require 'vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$nombre_archivo = "undefined";

ob_start();

if (isset($_POST['Descargar_Carta_T'])) {

  require_once 'pdf/Carta_TrabajoGrado.php';
  $nombre_archivo = "Carta_Compromisora-";
} else if (isset($_POST['Descargar_Carta_P'])) {

  require_once 'pdf/Carta_Practicas.php';
  $nombre_archivo = "Carta_Compromisora-";

}elseif (isset($_POST['Descargar_Formato_Convenio'])) {

  require_once 'pdf/Formato_Convenio.php';
  $nombre_archivo = "Formato_Convenio-";

} elseif (isset($_POST['Descargar_Convenio'])) {

  require_once 'pdf/Convenio.php';
  $nombre_archivo = "Convenio-";

}else if (isset($_POST['Descargar_Afiliacion'])) {

  require_once 'pdf/Afiliacion_Riesgos.php';
  $nombre_archivo = "Afiliacion_Riesgos-";
} else {
  header('location:' . constant('URL') . 'Error');
}


$html = ob_get_clean();
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ob_end_clean();
$html2pdf = new Html2Pdf('P', 'LETTER', 'es', 'true', 'UTF-8');
$html2pdf->writeHTML($html);
$html2pdf->output($nombre_archivo . $_POST['code'] . '.pdf', 'D');
