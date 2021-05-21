<?php
require 'vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$nombre_archivo = "undefined";

ob_start();

require_once 'pdfs/Afiliacion_Riesgos.php';
include_once 'models/estudiantesModel.php';

$estudianteModel = new EstudiantesModel();
$codigo = $estudianteModel->obtenerPorId($this->afiliacion->id_estudiante)->codigo;
$nombre_archivo = "Afiliacion_Riesgos-" . $codigo;

$html = ob_get_clean();
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ob_end_clean();
$html2pdf = new Html2Pdf('P', 'LETTER', 'es', 'true', 'UTF-8');
$html2pdf->writeHTML($html);
$html2pdf->output($nombre_archivo . '.pdf', 'D');
