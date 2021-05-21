<?php date_default_timezone_set('America/Bogota'); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Afiliación a Riesgos Laborales</title>
  <link href="pdf/css/Afiliacion_Riesgos.css" type="text/css">
</head>

<body>
  <?php
  include_once 'models/estudiantesModel.php';

  $estudianteModel = new EstudiantesModel();
  $estudiante = new Estudiante();
  $estudiante = $estudianteModel->obtenerPorId($this->afiliacion->id_estudiante);

  //Estudiante 
  $p_nombre = $estudiante->p_nombre;
  $s_nombre = $estudiante->s_nombre;
  $p_apellido = $estudiante->p_apellido;
  $s_apellido = $estudiante->s_apellido;
  $codigo = $estudiante->codigo;
  $genero = $estudiante->genero;
  $tipo_identificacion = $estudiante->tipo_identificacion;
  $identificacion = $estudiante->identificacion;
  $fecha_expedicion = $estudiante->fecha_expedicion;
  $fecha_nacimiento = $estudiante->fecha_nacimiento;
  $ciudad = $estudiante->ciudad;
  $dpto = $estudiante->dpto;
  $email = $estudiante->email;
  $telf_fijo = $estudiante->telf_fijo;
  $telf_movil = $estudiante->telf_movil;
  $direccion = $estudiante->direccion;
  //Afiliacion
  $eps_ars = $this->afiliacion->eps_ars;


  //Tipo Convenio
  $tipo_trabajo_grado = $this->afiliacion->tipo_trabajo_grado;
  if ($tipo_trabajo_grado == "NULL") {
    $tipoConvenio = 'T';
  } else {
    //practicas

    include_once 'models/practicaModel.php';
    $practicaModel = new PracticaModel();
    $practica = $practicaModel->obtenerPorId($this->afiliacion->id_practicas);

    $tipoConvenio = 'P';

    $id_practicas = $practica->id;
    $asignatura = $practica->asignatura;
    $docente =$practica->docente;
    $docente_email =$practica->docenteEmail;
    $jornada = $practica->jornada;
    $grupo = $practica->grupo;
  }
  $consecutivo = "CP".$this->afiliacion->id;




  header("Content-Disposition: attachment; filename=pdf");


  ?>

  <img src="pdf/img/header_ARL.png" id="header">

  <table>

    <tr>
      <td colspan="25" class="titulo-seccion azul-oscuro"><strong>DATOS DEL ESTUDIANTE</strong></td>
    </tr>

    <tr>
      <td colspan="8" class="azul-oscuro">Nombres y Apellidos del Estudiante</td>
      <td colspan="12"><?= $p_nombre ?> <?= $s_nombre ?> <?= $p_apellido ?> <?= $s_apellido ?></td>
      <td colspan="2" class="azul-oscuro">Código</td>
      <td colspan="3"><?= $codigo ?></td>
    </tr>

    <tr>
      <td colspan="6" class="azul-oscuro">Genero</td>
      <td colspan="10" class="azul-oscuro">Documento de Identidad</td>
      <td colspan="9" class="azul-oscuro">Fecha de Expedición</td>
    </tr>

    <tr>
      <td colspan="1" class="azul-claro" style="width:10px">M</td>
      <td colspan="1" style="width:10px">
        <?php
        if ($genero == 'M') {
          print("X");
        }
        ?>
      </td>
      <td colspan="1" class="azul-claro" style="width:10px">F</td>
      <td colspan="1" style="width:10px">
        <?php
        if ($genero == 'F') {
          print("X");
        }
        ?>
      </td>
      <td colspan="1" class="azul-claro">Otro</td>
      <td colspan="1" style="width:10px">
        <?php
        if ($genero != 'F' && $genero != 'M') {
          print("X");
        }
        ?>
      </td>
      <td colspan="1" class="azul-claro" style="width:10px">CC</td>
      <td colspan="1" style="width:10px">
        <?php
        if ($tipo_identificacion == 'C.C') {
          print("X");
        }
        ?>
      </td>
      <td colspan="1" class="azul-claro" style="width:10px">TI</td>
      <td colspan="1" style="width:10px">
        <?php
        if ($tipo_identificacion == 'T.I') {
          print("X");
        }
        ?>
      </td>
      <td colspan="1" class="azul-claro">Nro</td>
      <td colspan="5"><?= $identificacion ?></td>
      <td colspan="1" class="azul-claro">Año</td>
      <td colspan="2"><?= $fecha_expedicion[0] ?><?= $fecha_expedicion[1] ?><?= $fecha_expedicion[2] ?><?= $fecha_expedicion[3] ?></td>
      <td colspan="1" class="azul-claro">Mes</td>
      <td colspan="2"><?= $fecha_expedicion[5] ?><?= $fecha_expedicion[6] ?></td>
      <td colspan="1" class="azul-claro">Día</td>
      <td colspan="2"><?= $fecha_expedicion[8] ?><?= $fecha_expedicion[9] ?></td>
    </tr>

    <tr>
      <td colspan="9" class="azul-oscuro">Fecha de Nacimiento</td>
      <td colspan="16" class="azul-oscuro">Lugar de Nacimiento</td>
    </tr>

    <tr>
      <td colspan="1" class="azul-claro">Año</td>
      <td colspan="2"><?= $fecha_nacimiento[0] ?><?= $fecha_nacimiento[1] ?><?= $fecha_nacimiento[2] ?><?= $fecha_nacimiento[3] ?></td>
      <td colspan="1" class="azul-claro">Mes</td>
      <td colspan="2"><?= $fecha_nacimiento[5] ?><?= $fecha_nacimiento[6] ?></td>
      <td colspan="1" class="azul-claro">Día</td>
      <td colspan="2"><?= $fecha_nacimiento[8] ?><?= $fecha_nacimiento[9] ?></td>
      <td colspan="3" class="azul-claro">Ciudad</td>
      <td colspan="4"><?= $ciudad ?></td>
      <td colspan="2" class="azul-claro">Dpto</td>
      <td colspan="7"><?= $dpto ?></td>
    </tr>

    <tr>
      <td colspan="5" class="azul-claro">Correo Electrónico</td>
      <td colspan="10"><?= $email ?></td>
      <td colspan="4" class="azul-claro">Telefono Fijo</td>
      <td colspan="6"><?= $telf_fijo ?></td>
    </tr>

    <tr>
      <td colspan="3" class="azul-claro">Dirección</td>
      <td colspan="12"><?= $direccion ?></td>
      <td colspan="4" class="azul-claro">Celular</td>
      <td colspan="6"><?= $telf_movil ?></td>
    </tr>

    <tr>
      <td colspan="6" class="azul-claro">EPS ó ARS Afiliado</td>
      <td colspan="19"><?= $eps_ars ?></td>
    </tr>

    <tr>
      <td colspan="25" class="titulo-seccion azul-oscuro"><strong>TIPO DE CONVENIO</strong></td>
    </tr>

    <tr>
      <td colspan="6" class="azul-claro">TRABAJO DE GRADO</td>
      <td colspan="19" class="azul-claro">ASIGNATURA</td>
    </tr>

    <tr>
      <td colspan="5" class="tipoTrabajo">TG - Dirigido</td>
      <td colspan="1" style="width:14px">
        <?php
        if ($tipo_trabajo_grado == 'DIRIGIDO') {
          print("X");
        }
        ?>
      </td>
      <td colspan="6" class="azul-claro">Nombre de la Asignatura</td>
      <td colspan="18">
        <?php if ($tipoConvenio == 'P') {
          print $asignatura;
        } ?>
      </td>
    </tr>

    <tr>
      <td colspan="5" class="tipoTrabajo">TG - Pasantía</td>
      <td colspan="1" style="width:14px">
        <?php
        if ($tipo_trabajo_grado == 'PASANTIA') {
          print("X");
        }
        ?>
      </td>
      <td colspan="4" class="azul-claro">Docente</td>
      <td colspan="9">
        <?php if ($tipoConvenio == 'P') {
          print $docente;
        } ?>
      </td>
      <td colspan="3" class="azul-claro">Jornada</td>
      <td colspan="3">
        <?php if ($tipoConvenio == 'P') {
          print $jornada;
        } ?>
      </td>
    </tr>

    <tr>
      <td colspan="5" class="tipoTrabajo">TG - Investigación</td>
      <td colspan="1" style="width:14px">
        <?php
        if ($tipo_trabajo_grado == 'INVESTIGACION') {
          print("X");
        }
        ?>
      </td>
      <td colspan="4" class="azul-claro">Grupo</td>
      <td colspan="2">
        <?php if ($tipoConvenio == 'P') {
          print $grupo;
        } ?>
      </td>
      <td colspan="2" class="azul-claro">Email Docente</td>
      <td colspan="11">
        <?php if ($tipoConvenio == 'P') {
          print $docente_email;
        } ?>
      </td>
    </tr>

    <tr>
      <td colspan="25">
        <p id="nota">
          <b>Nota:</b> Para que el estudiante inicie sus prácticas empresariales y/0 trabajo de grado <br>
          en cualquier modalidad, este deberá estar afiliado al <b>Sistema General de Riesgos Labores.</b><br>
          Para dar cumplimiento a lo establecido en el Decreto 055 del 14 de enero de 2015,<br> Documentos anexos:
          <b>Privada y/o Entidad Pública.</b>
        </p>
        <p id="requisitos">
          a) Fotocopia del documento de identidad ampliada (150) <br>
          b) Certificado de afiliación expedido por la EPS o ARS que se encuentre afiliado <br>
          c) Reporte de matrícula del semestre <br>
          d) Para el caso de trabajos de grado anexar fotocopia de la carta de aprobación de tema <br>
        </p>
        <br>
      </td>
    </tr>

    <tr>
      <td colspan="12" class="seccion-firmas"></td>
      <td colspan="13" class="seccion-firmas"></td>
    </tr>

    <tr>
      <td colspan="12" class="azul-oscuro">Firma del Estudiante</td>
      <td colspan="13" class="azul-oscuro">Recibido</td>
    </tr>

    <tr>
      <td colspan="5" class="azul-oscuro">Fecha</td>
      <td colspan="7"></td>
      <td colspan="3" class="azul-oscuro">Hora</td>
      <td colspan="4"></td>
      <td colspan="3" class="azul-oscuro">Consecutivo</td>
      <td colspan="3"><?= $consecutivo?></td>
    </tr>

  </table>

</body>

</html>