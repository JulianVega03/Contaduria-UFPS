<?php date_default_timezone_set('America/Bogota'); ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>CARTA COMPROMISORIA DE ACEPTACIÓN</title>
  <link href="pdf/css/Carta_TrabajoGrado.css" type="text/css">
</head>

<body>
  <?php
  include_once 'models/estudiantesModel.php';
  include_once 'models/empresaModel.php';
  $empresaModel = new EmpresaModel();
  $nombreEmpresa = $empresaModel->obtenerPorId($this->convenio->id_empresa)->nombre;
  $estudianteModel = new EstudiantesModel();
  $estudiante = new Estudiante();
  $estudiante = $estudianteModel->obtenerPorId($this->convenio->id_estudiante);

  $p_nombre = $estudiante->p_nombre;
  $s_nombre = $estudiante->s_nombre;
  $p_apellido = $estudiante->p_apellido;
  $s_apellido = $estudiante->s_apellido;
  $identificacion = $estudiante->identificacion;
  $codigo = $estudiante->codigo;
  $genero = $estudiante->genero;
  $textoGenero = $genero == 'M' ? 'identificado' : 'identificada';


  $tipo_trabajo_grado = $this->convenio->tipo_trabajo_grado;
  $empresa =$nombreEmpresa;

  header("Content-Disposition: attachment; filename='Carta_TrabajoGrado.pdf'");


  $meses = array(
    1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril", 5 => "Mayo", 6 => "Junio",
    7 => "Julio", 8 => "Agosto", 9 => "Septiembre", 10 => "Octubre", 11 => "Noviembre", 12 => "Diciembre"
  );
  ?>

  <img src="pdf/img/header.png" id="header">

  <div class="contenedor">

    <P id="titulo">DECLARACIÓN COMPROMISORIA DE ACEPTACIÓN</P>

    <p id="enunciado">
      <b><?= $p_nombre ?> <?= $s_nombre ?> <?= $p_apellido ?> <?= $s_apellido ?></b>,
      mayor de edad, <?= $textoGenero ?> con la cédula de ciudadanía Nº <?= $identificacion ?>, código <?= $codigo ?>,
      en mi condición de estudiante del programa de Contaduría Pública, a fin de proceder a realizar el Trabajo de grado,
      modalidad proyecto de Extensión-“<?= $tipo_trabajo_grado ?>”, presentado al Director del Plan de Estudios de Contaduría
      Pública
      de la Facultad de Ciencias Empresariales de nuestra Universidad; declaro CONOCER y ACEPTAR el Convenio Interinstitucional
      de Cooperación suscrito entre la UNIVERSIDAD FRANCISCO DE PAULA SANTANDER Y <?= $empresa ?>, y me comprometo a cumplir
      cabalmente lo convenido, especialmente lo referente a mis obligaciones como estudiante.
    </p>

    <p id="constancia">
      En constancia, se firma a los <?= date("d") ?> días del mes de <?= $meses[date("n")] ?> del <?= date("Y") ?>
    </p>

    <p id="estudiante">
      <b><?= $p_nombre ?> <?= $s_nombre ?> <?= $p_apellido ?> <?= $s_apellido ?></b><br>
      C.C. N° <?= $identificacion ?><br>
      CODIGO N° <?= $codigo ?>
    </p>

    <p id="contador">
      <b>YAIR ROLANDO CASADIEGO DUQUE</b><br>
      Director del Plan de Estudios de Contaduría Pública
    </p>

  </div>

  <img id="footer" src="pdf/img/footer.png">

</body>

</html>