<?php
require 'vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$nombre_archivo = "undefined";

ob_start();

include_once 'models/estudiantesModel.php';
$estudianteModel = new EstudiantesModel();
$codigo = $estudianteModel->obtenerPorId($this->convenio->id_estudiante)->codigo;

if ($this->descargar == "carta_compromisoria") {
    if (!empty($this->convenio->id_practicas)) {
        require_once 'pdfs/Carta_Practicas.php';
        $nombre_archivo = "Carta_Compromisora-";
    } else {
        require_once 'pdfs/Carta_TrabajoGrado.php';
        $nombre_archivo = "Carta_Compromisora-";
    }
} elseif ($this->descargar == "formato_convenio") {
    require_once 'pdfs/Formato_Convenio.php';
    $nombre_archivo = "Formato_Convenio-" ;
} elseif ($this->descargar == "convenio") {
    require_once 'pdfS/Convenio.php';
    $nombre_archivo = "Convenio-" ;
}



$html = ob_get_clean();
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ob_end_clean();
$html2pdf = new Html2Pdf('P', 'LETTER', 'es', 'true', 'UTF-8');
$html2pdf->pdf->SetDisplayMode('fullpage');
$html2pdf->setDefaultFont('times');
$html2pdf->writeHTML($html);
$html2pdf->output($nombre_archivo  . $codigo . '.pdf', 'D');
