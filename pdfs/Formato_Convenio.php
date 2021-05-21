<link href="pdf/css/Formato_Convenio.css" type="text/css">

<page>
    <?php

    include_once 'models/empresaModel.php';
    $empresaModel = new EmpresaModel();
    $empresa = new Empresa();
    $empresa = $empresaModel->obtenerPorId($this->convenio->id_empresa);

    $empresa_nombre = $empresa->nombre;
    $empresa_nit = $empresa->nit;
    $empresa_email = $empresa->email;
    $empresa_direccion = $empresa->direccion;
    $empresa_telefono = $empresa->telefono;
    $tipo_empresa = $empresa->tipo_empresa;
    $naturaleza_juridica = $empresa->naturaleza_juridica;
    $actividad_economica = $empresa->actividad_economica;

    $r_legal_nombres = $empresa->r_legal_nombres;
    $r_legal_apellidos = $empresa->r_legal_apellidos;
    $r_legal_identificacion = $empresa->r_legal_identificacion;
    $r_legal_expedicion = $empresa->r_legal_lugar_exp_id;

    $superv_nombres = $empresa->superv_nombres;
    $superv_apellidos = $empresa->superv_apellidos;
    $superv_identificacion = $empresa->superv_identificacion;
    $superv_expedicion = $empresa->superv_lugar_exp_id;
    $superv_cargo = $empresa->supervisor_cargo;

    include_once 'models/estudiantesModel.php';
    $estudianteModel = new EstudiantesModel();
    $estudiante = new Estudiante();
    $estudiante = $estudianteModel->obtenerPorId($this->convenio->id_estudiante);

    $p_nombre = $estudiante->p_nombre;
    $s_nombre = $estudiante->s_nombre;
    $p_apellido  = $estudiante->p_apellido;
    $s_apellido  = $estudiante->s_apellido;
    $codigo  = $estudiante->codigo;
    $tipo_identificacion  = $estudiante->tipo_identificacion;
    $identificacion  = $estudiante->identificacion;
    $fecha_expedicion  = $estudiante->fecha_expedicion;
    $fecha_nacimiento  = $estudiante->fecha_nacimiento;
    $ciudad  = $estudiante->ciudad;
    $dpto = $estudiante->dpto;
    $email  = $estudiante->email;
    $telf_fijo = $estudiante->telf_fijo;
    $direccion = $estudiante->direccion;
    $telf_movil = $estudiante->telf_movil;
    $genero  = $estudiante->genero;


    $tipo_trabajo_grado = $this->convenio->tipo_trabajo_grado;
    if ($tipo_trabajo_grado != "") {
        $tipoConvenio = 'T';
    } else {

        include_once 'models/practicaModel.php';
        $practicaModel = new PracticaModel();
        $practica = new Practicas();
        $practica = $practicaModel->obtenerPorId($this->convenio->id_practicas);

        $tipoConvenio = 'P';
        $asignatura = $practica->asignatura;
        $docente = $practica->docente;
        $jornada = $practica->jornada;
        $grupo = $practica->grupo;
        $docente_email = $practica->docenteEmail;;
    }


    $consecutivo = $this->convenio->id;

    header("Content-Disposition: attachment; filename=pdf");
    ?>
    <img src="pdf//img/header_Convenio.png" id="header">
    <table style="max-width: 500px">

        <tr>
            <td colspan="25" class="titulo-seccion azul-oscuro"><strong>DATOS DE LA EMPRESA</strong></td>
        </tr>

        <tr>
            <td colspan="6" class="azul-claro">Nombre de la Empresa</td>
            <td colspan="19"><?= $empresa_nombre ?></td>
        </tr>

        <tr>
            <td colspan="2" class="azul-claro">NIT</td>
            <td colspan="6"><?= $empresa_nit ?></td>
            <td colspan="5" class="azul-claro">Correo Electrónico</td>
            <td colspan="12"><?= $empresa_email ?></td>
        </tr>

        <tr>
            <td colspan="6" class="azul-claro">Dirección Empresa/Cámara de<br> Comercio</td>

            <td colspan="10"><?php
                                if (strlen($empresa_direccion) > 54) {
                                    for ($i = 0; $i < 54; $i++) {
                                        echo $empresa_direccion[$i];
                                    }
                                    echo ' - <br>';
                                    for ($i = 54; $i < strlen($empresa_direccion); $i++) {
                                        echo $empresa_direccion[$i];
                                    }
                                }else{
                                    echo $empresa_direccion;
                                }
                                ?></td>
            <td colspan="2" class="azul-claro">Teléfono</td>


            <td colspan="7"><?= $empresa_telefono ?></td>
        </tr>
        <tr>
            <td colspan="6" class="azul-claro">Tipo Empresa</td>
            <td colspan="19">&nbsp; Persona Natural:&nbsp; <?= $tipo_empresa == "PERSONA NATURAL" ? "X" : "______"; ?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Persona Jurídica: &nbsp;<?= $tipo_empresa == "PERSONA JURIDICA" ? "X" : "_____"; ?></td>
        </tr>
        <tr>
            <td colspan="6" class="azul-claro">Naturaleza Jurídica</td>
            <td colspan="19">&nbsp; Privada:&nbsp; <?= $naturaleza_juridica == "PRIVADA" ? "X" : "______"; ?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Publica: &nbsp;<?= $naturaleza_juridica == "PUBLICA" ? "X" : "_____"; ?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Mixta: &nbsp;<?= $naturaleza_juridica == "MIXTA" ? "X" : "_____"; ?></td>
        </tr>
        <tr>
            <td colspan="6" class="azul-claro">Actividad Económica</td>
            <td colspan="19">
                &nbsp; Comercio: <?= $actividad_economica == "COMERCIO" ? "X" : "__"; ?>

                Industrial: <?= $actividad_economica == "INDUSTRIAL" ? "X" : "__"; ?>

                Servicios: <?= $actividad_economica == "SERVICIOS" ? "X" : "__"; ?>

                Transporte: <?= $actividad_economica == "TRANSPORTE" ? "X" : "__"; ?>

                Minero y Energético: <?= $actividad_economica == "MINERO Y ENERGETICO" ? "X" : "__"; ?>
                <br>
                &nbsp; Agropecuaria: <?= $actividad_economica == "AGROPECUARIA" ? "X" : "__"; ?>

                Financiera: <?= $actividad_economica == "FINANCIERA" ? "X" : "__"; ?>

                Turismo: <?= $actividad_economica == "TURISMO" ? "X" : "__"; ?>

                Educación: <?= $actividad_economica == "EDUCACION" ? "X" : "__"; ?>

                Comunicaciones: <?= $actividad_economica == "COMUNICACIONES" ? "X" : "__"; ?>
            </td>
        </tr>
        <tr>
            <td colspan="6" class="azul-claro">Nombres y Apellidos del<br> Gerente y/o Representante Legal</td>
            <td colspan="19"><?= $r_legal_nombres ?> <?= $r_legal_apellidos ?></td>
        </tr>

        <tr>
            <td colspan="6" class="azul-claro">No. de Cedula del Gerente y/o <br>Representante Legal</td>
            <td colspan="8"><?= $r_legal_identificacion ?></td>
            <td colspan="3" class="azul-claro">Lugar de <br>Expedición</td>
            <td colspan="8"><?= $r_legal_expedicion ?></td>
        </tr>

        <tr>
            <td colspan="6" class="azul-claro">Nombres y Apellidos del <br>Supervisor</td>
            <td colspan="19"><?= $superv_nombres ?> <?= $superv_apellidos ?></td>
        </tr>

        <tr>
            <td colspan="6" class="azul-claro">No. de Cedula del Supervisor</td>
            <td colspan="8"><?= $superv_identificacion ?></td>
            <td colspan="3" class="azul-claro">Lugar de <br>Expedición</td>
            <td colspan="8"><?= $superv_expedicion ?></td>
        </tr>

        <tr>
            <td colspan="6" class="azul-claro">Cargo del Supervisor</td>
            <td colspan="19"><?= $superv_cargo ?></td>
        </tr>

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
                if ($tipo_trabajo_grado == "DIRIGIDO") {
                    print("X");
                }
                ?>
            </td>
            <td colspan="6" class="azul-claro">Nombre de la Asignatura</td>
            <td colspan="18"><?php if ($tipoConvenio == 'P') {
                                    print $asignatura;
                                } ?></td>
        </tr>

        <tr>
            <td colspan="5" class="tipoTrabajo">TG - Pasantía</td>
            <td colspan="1" style="width:14px">
                <?php
                if ($tipo_trabajo_grado == "PASANTIA") {
                    print("X");
                }
                ?>
            </td>
            <td colspan="4" class="azul-claro">Docente</td>
            <td colspan="9"><?php if ($tipoConvenio == 'P') {
                                print $docente;
                            } ?></td>
            <td colspan="3" class="azul-claro">Jornada</td>
            <td colspan="3"><?php if ($tipoConvenio == 'P') {
                                print $jornada;
                            } ?></td>
        </tr>

        <tr>
            <td colspan="5" class="tipoTrabajo">TG - Investigación</td>
            <td colspan="1" style="width:14px">
                <?php
                if ($tipo_trabajo_grado == "INVESTIGACION") {
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
                    Para dar cumplimiento a lo establecido en el Decreto 055 del 14 de enero de 2015,<br> Documentos
                    anexos:
                    <b>Privada y/o Entidad Pública.</b>
                </p>
                <p id="requisitos">
                    a) Fotocopia del documento de identidad ampliada (150) <br>
                    b) Certificado de afiliación expedido por la EPS o ARS que se encuentre afiliado <br>
                    c) Reporte de matrícula del semestre <br>
                    d) Para el caso de trabajos de grado anexar fotocopia de la carta de aprobación de tema <br>
                </p>
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
            <td colspan="3">CP<?= $consecutivo ?></td>
        </tr>

    </table>
</page>