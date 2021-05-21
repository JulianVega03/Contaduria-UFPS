<?php date_default_timezone_set('America/Bogota'); ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>CARTA COMPROMISORIA DE ACEPTACIÓN</title>
  <link href="pdf/css/Carta_Practicas.css" type="text/css">
</head>

<body>

  <?php
  include_once 'models/estudiantesModel.php';
  include_once 'models/empresaModel.php';
  include_once 'models/practicaModel.php';
  include_once 'entities/practicas.php';
  include_once 'entities/empresa.php';
 

  $estudianteModel = new EstudiantesModel();
  $estudiante = new Estudiante();
  $estudiante = $estudianteModel->obtenerPorId($this->convenio->id_estudiante);

  $practicaModel = new PracticaModel();
  $practica = new Practicas();
  $practica = $practicaModel->obtenerPorId($this->convenio->id_practicas);

  $empresaModel = new EmpresaModel();
  $empresa = new Empresa();
  $empresa = $empresaModel->obtenerPorId($this->convenio->id_empresa);

  $p_nombre = $estudiante->p_nombre;
  $s_nombre = $estudiante->s_nombre;
  $p_apellido = $estudiante->p_apellido;
  $s_apellido = $estudiante->s_apellido;
  $identificacion = $estudiante->identificacion;
  $codigo = $estudiante->codigo;
  $genero = $estudiante->genero;
  $textoGenero = $genero == 'M' ? 'identificado' : 'identificada';


  $empresa_nombre = $empresa->nombre;
  $direccion_empresa = $empresa->direccion;
  $email_empresa = $empresa->email;
  $telf_empresa = $empresa->telefono;
  $superv_nombres = $empresa->superv_nombres;
  $superv_apellidos = $empresa->superv_apellidos;

  $asignatura = $practica->asignatura;
  $docente = $practica->docente;;
  $area_designada = $practica->areaDesignada;
  $tematica_desarrollar = $practica->tematicaDesarrollar;
  $horario_asistencia = $practica->horarioAsistencia;


  header("Content-Disposition: attachment; filename=pdf");



  $meses = array(
    1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril", 5 => "Mayo", 6 => "Junio",
    7 => "Julio", 8 => "Agosto", 9 => "Septiembre", 10 => "Octubre", 11 => "Noviembre", 12 => "Diciembre"
  );
  ?>

  <img src="pdf/img/header.png" id="header">

  <div class="contenedor">

    <P id="titulo">DECLARACION COMPROMISORIA DE ACEPTACIÓN</P>

    <p id="enunciado">
      <b><?= $p_nombre ?> <?= $s_nombre ?> <?= $p_apellido ?> <?= $s_apellido ?></b>, mayor de edad, <?= $textoGenero ?> con la cédula de ciudadanía Nº <?= $identificacion ?>
      Código <?= $codigo ?> en mi condición de estudiante del programa de Contaduría Pública,
      a fin de proceder a realizar LA PRACTICA DE LA MATERIA <?= $asignatura ?>, coordinada por el profesor(a) <?= $docente ?>,
      del Plan de Estudios de Contaduría Pública de la Facultad de Ciencias Empresariales de nuestra Universidad;
      declaro CONOCER Y ACEPTAR el Convenio Interinstitucional de Cooperación suscrito entre la UNIVERSIDAD FRANCISCO DE PAULA SANTADER
      y <?= $empresa_nombre ?>, y me comprometo a cumplir cabalmente lo convenido,
      especialmente lo referente a mis obligaciones como estudiante.
    </p><br>
    <table>
      <tr>
        <th>Área designada</th>
        <td><?= $area_designada ?></td>
      </tr>
      <tr>
        <th>Temática a desarrollar</th>
        <td> <?= $tematica_desarrollar ?> </td>
      </tr>
      <tr>
        <th>Supervisor de la empresa</th>
        <td><?= $superv_nombres ?> <?= $superv_apellidos ?> </td>
      </tr>
      <tr>
        <th>Correo electrónico</th>
        <td> <?= $email_empresa ?> </td>
      </tr>
      <tr>
        <th>Dirección de la empresa</th>
        <td> <?= $direccion_empresa ?> </td>
      </tr>
      <tr>
        <th>Contacto:</th>
        <td> <?= $telf_empresa ?> </td>
      </tr>
      <tr>
        <th>Horario de Practica:</th>
        <td> <br> <br> <?= $horario_asistencia ?> <br> </td>
      </tr>
    </table>
    <br><br>
    <p id="constancia">
      En constancia, se firma a los <?= date("d") ?> días del mes de <?= $meses[date("n")] ?> del <?= date("Y") ?>
    </p>
    <br>
    <p id="estudiante">
      <b><?= $p_nombre ?> <?= $s_nombre ?> <?= $p_apellido ?> <?= $s_apellido ?></b><br>
      C.C. N° <?= $identificacion ?><br>
      CODIGO N° <?= $codigo ?>
    </p>
    <br>
    <p id="contador">
      <b>YAIR ROLANDO CASADIEGO DUQUE</b><br>
      Director del Plan de Estudios de Contaduría Pública
    </p>
    <br><br>
    <p id="docente">
      <b><?= $docente ?></b><br>
      Docente.
    </p>

  </div>

  <img id="footer" src="pdf/img/footer.png">


</body>

</html>