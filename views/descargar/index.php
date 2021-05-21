<?php require 'views/head.php'; ?>

<body>


    <?php require 'views/navbar.php'; ?>

    <br>
    <br>
    <div id="main" style="padding: 20px; ">
        <h1>DESCARGAR</h1>
        <?php
        //Transformar a mayusculas la informacion del estudiante
        $p_nombre = strtoupper($_POST['p_nombre']);
        $s_nombre = strtoupper($_POST['s_nombre']);
        $p_apellido = strtoupper($_POST['p_apellido']);
        $s_apellido = strtoupper($_POST['s_apellido']);
        $codigo = strtoupper($_POST['codigo']);
        $tipo_identificacion = strtoupper($_POST['tipo_identificacion']);
        $identificacion = strtoupper($_POST['identificacion']);
        $fecha_expedicion = strtoupper($_POST['fecha_expedicion']);
        $genero = strtoupper($_POST['genero']);
        $fecha_nacimiento = strtoupper($_POST['fecha_nacimiento']);
        $semestre = strtoupper($_POST['semestre']);
        $dpto = strtoupper($_POST['dpto']);
        $ciudad = strtoupper($_POST['ciudad']);
        $email = strtoupper($_POST['email']);
        $telf_fijo = strtoupper($_POST['telf_fijo']);
        $telf_movil = strtoupper($_POST['telf_movil']);
        $direccion = strtoupper($_POST['direccion']);

        //Registrar AL estudiante
        require 'models/estudiantesModel.php';
        $estudiante = new EstudiantesModel();
        $estudiante->registrar(
            $p_nombre,
            $s_nombre,
            $p_apellido,
            $s_apellido,
            $codigo,
            $tipo_identificacion,
            $identificacion,
            $fecha_expedicion,
            $genero,
            $fecha_nacimiento,
            $semestre,
            $dpto,
            $ciudad,
            $email,
            $telf_fijo,
            $telf_movil,
            $direccion
        );
        $id_estudiante = $estudiante->obtenerUltimoId();

        $f2tipoConvenio = strtoupper($_POST['f2-tipoConvenio']);
        $tipo_trabjoGrado = "nulo";
        $id_practicas = "";
        $area_designada = "";
        $tematica_desarrollar = "";
        $horario_asistencia = "";

        if (isset($_POST['crearARL'])) {

            $eps = strtoupper($_POST['eps_ars']);

            if ($f2tipoConvenio == 'P') {

                //Registrar la Practica
                $asignatura = strtoupper($_POST['asignatura']);
                $docente = strtoupper($_POST['docente']);
                $docenteEmail = strtoupper($_POST['docente_email']);
                $jornada = strtoupper($_POST['jornada']);
                $grupo = strtoupper($_POST['grupo']);

                require 'models/practicaModel.php';
                $practica = new PracticaModel();
                $practica->registrar($asignatura, $docente, $docenteEmail, $jornada, $grupo, $area_designada, $tematica_desarrollar, $horario_asistencia);
                $id_practicas = $practica->obtenerUltimoId();
            } else if ($f2tipoConvenio == 'T') {

                $tipo_trabjoGrado = strtoupper($_POST['f2-tipo-Tgrado']);
            }

            //Registrar Afiliacion
            $afiliacion = new AfiliacionesModel();
            $afiliacion->registrar($id_estudiante, $tipo_trabjoGrado, $id_practicas, $eps);
            $id_afiliacion = $afiliacion->obtenerUltimoId();
        ?>


            <h4>Formato Afiliación a Riesgos Laborales</h4>
            <form action="<?= constant('URL') . 'generadorPdf'; ?>" method="post">

                <input type="text" value="<?= $id_afiliacion ?>" name="f2-consecutivo" style="display:none">

                <input type="text" value="<?= $p_nombre ?>" name="f2-p-nombre" style="display:none">
                <input type="text" value="<?= $s_nombre ?>" name="f2-s-nombre" style="display:none">
                <input type="text" value="<?= $p_apellido ?>" name="f2-p-apellido" style="display:none">
                <input type="text" value="<?= $s_apellido ?>" name="f2-s-apellido" style="display:none">
                <input type="text" value="<?= $codigo ?>" name="code" style="display:none">
                <input type="text" value="<?= $identificacion ?>" name="f2-cc" style="display:none">
                <input type="text" value="<?= $fecha_expedicion ?>" name="f2-expedicion-cc" style="display:none">
                <input type="text" value="<?= $genero ?>" name="f2-genero" style="display:none">
                <input type="text" value="<?= $fecha_nacimiento ?>" name="f2-fecha-nacimiento" style="display:none">
                <input type="text" value="<?= $dpto ?>" name="f2-dep-nacimiento" style="display:none">
                <input type="text" value="<?= $ciudad ?>" name="f2-ciudad-nacimiento" style="display:none">
                <input type="text" value="<?= $email ?>" name="f2-correo" style="display:none">
                <input type="text" value="<?= $direccion ?>" name="f2-direccion" style="display:none">
                <input type="text" value="<?= $telf_fijo ?>" name="f2-telefono" style="display:none">
                <input type="text" value="<?= $eps ?>" name="f2-eps" style="display:none">
                <input type="text" value="<?= $tipo_trabjoGrado ?>" name="f2-tipo-Tgrado" style="display:none">
                <input type="text" value="<?= $asignatura ?>" name="f2-asignatura" style="display:none">
                <input type="text" value="<?= $docente ?>" name="f2-docente" style="display:none">
                <input type="text" value="<?= $docenteEmail ?>" name="f2-email-docente" style="display:none">
                <input type="text" value="<?= $jornada ?>" name="f2-jornada" style="display:none">
                <input type="text" value="<?= $grupo ?>" name="f2-grupo" style="display:none">
                <input type="text" value="<?= $tipo_identificacion ?>" name="f2-tipo-id" style="display:none">
                <input type="text" value="<?= $f2tipoConvenio ?>" name="f2-tipoConvenio" style="display:none">
                <input type="text" value="<?= $telf_fijo ?>" name="f2-telefono-fijo" style="display:none">

                <button type="submit" class="btn btn-warning" name="Descargar_Afiliacion" data-toggle="tooltip" title="Recuerda Guardar una Copia de Este Documento!" style="margin-top:10px" download>Descargar <span class="glyphicon glyphicon-save"></span></span></button><br>

            </form>



            <?php
        } else if (isset($_POST['crearConvenio'])) {

            //Transformar a mayusculas la informacion de la empresa
            $empresa_nombre = strtoupper($_POST['empresa_nombre']);
            $empresa_nit = strtoupper($_POST['empresa_nit']);
            $empresa_email = strtoupper($_POST['empresa_email']);
            $empresa_telefono = strtoupper($_POST['empresa_telefono']);
            $empresa_direccion = strtoupper($_POST['empresa_direccion']);

            $tipo_empresa = strtoupper($_POST['tipo_empresa']);
            $naturaleza_juridica = strtoupper($_POST['naturaleza_juridica']);
            $actividad_economica = strtoupper($_POST['actividad_economica']);

            $empresa_r_legal_nombres = strtoupper($_POST['empresa_r_legal_nombres']);
            $empresa_r_legal_apellidos = strtoupper($_POST['empresa_r_legal_apellidos']);
            $empresa_r_legal_identificacion = strtoupper($_POST['empresa_r_legal_identificacion']);
            $empresa_r_legal_lugar_exp_id = strtoupper($_POST['empresa_r_legal_lugar_exp_id']);
            $empresa_superv_nombres = strtoupper($_POST['empresa_superv_nombres']);
            $empresa_superv_apellidos = strtoupper($_POST['empresa_superv_apellidos']);
            $empresa_superv_identificacion = strtoupper($_POST['empresa_superv_identificacion']);
            $empresa_superv_lugar_exp_id = strtoupper($_POST['empresa_superv_lugar_exp_id']);
            $empresa_supervisor_cargo = strtoupper($_POST['empresa_supervisor_cargo']);

            //Registrar a la Empresa
            require 'models/empresaModel.php';
            $empresa = new EmpresaModel();
            $empresa->registrar(
                $empresa_nombre,
                $empresa_nit,
                $empresa_email,
                $empresa_telefono,
                $empresa_direccion,
                $tipo_empresa,
                $naturaleza_juridica,
                $actividad_economica,
                $empresa_r_legal_nombres,
                $empresa_r_legal_apellidos,
                $empresa_r_legal_identificacion,
                $empresa_r_legal_lugar_exp_id,
                $empresa_superv_nombres,
                $empresa_superv_apellidos,
                $empresa_superv_identificacion,
                $empresa_superv_lugar_exp_id,
                $empresa_supervisor_cargo
            );

            $id_empresa = $empresa->obtenerUltimoId();

            //si es practica registra la practica, si es convenio inicializa la variable tipo_trabjoGrado con el 
            //valor seleccionado
            if ($f2tipoConvenio == 'P') {

                //Registrar la Practica
                $asignatura = strtoupper($_POST['asignatura']);
                $docente = strtoupper($_POST['docente']);
                $docenteEmail = strtoupper($_POST['docente_email']);
                $jornada = strtoupper($_POST['jornada']);
                $grupo = strtoupper($_POST['grupo']);
                $area_designada = strtoupper($_POST['area_designada']);
                $tematica_desarrollar = strtoupper($_POST['tematica_desarrollar']);
                $horario_asistencia = strtoupper($_POST['horario_asistencia']);


                require 'models/practicaModel.php';
                $practica = new PracticaModel();
                $practica->registrar($asignatura, $docente, $docenteEmail, $jornada, $grupo, $area_designada, $tematica_desarrollar, $horario_asistencia);
                $id_practicas = $practica->obtenerUltimoId();
            ?>

                <h4>𝐶𝑎𝑟𝑡𝑎 𝐶𝑜𝑚𝑝𝑟𝑜𝑚𝑖𝑠𝑜𝑟𝑖𝑎 𝑑𝑒 𝐴𝑐𝑒𝑝𝑡𝑎𝑐𝑖ó𝑛</h4>
                <form action="<?= constant('URL') . 'generadorPdf'; ?>" method="post">

                    <!-- Datos Necesarios para Carta _Practicas_ -->
                    <input type="text" value="<?= $codigo ?>" name="code" style="display:none">
                    <input type="text" value="<?= $p_nombre ?>" name="f1-first-name" style="display:none">
                    <input type="text" value="<?= $s_nombre ?>" name="f1-second-name" style="display:none">
                    <input type="text" value="<?= $p_apellido ?>" name="f1-surname" style="display:none">
                    <input type="text" value="<?= $s_apellido ?>" name="f1-second-surname" style="display:none">
                    <input type="text" value="<?= $identificacion ?>" name="f1-document" style="display:none">
                    <input type="text" value="<?= $genero ?>" name="f1-genero" style="display:none">
                    <input type="text" value="<?= $empresa_nombre ?>" name="f1-company-name" style="display:none">
                    <input type="text" value="<?= $empresa_email ?>" name="f1-empresa-email" style="display:none">
                    <input type="text" value="<?= $empresa_direccion ?>" name="f1-empresa-direccion" style="display:none">
                    <input type="text" value="<?= $empresa_telefono ?>" name="f1-empresa-telf" style="display:none">
                    <input type="text" value="<?= $empresa_superv_nombres ?>" name="f1-supervisor-nombres" style="display:none">
                    <input type="text" value="<?= $empresa_superv_apellidos ?>" name="f1-supervisor-apellidos" style="display:none">
                    <input type="text" value="<?= $asignatura ?>" name="f1-nombre-asignatura" style="display:none">
                    <input type="text" value="<?= $docente ?>" name="f1-nombre-teacher" style="display:none">
                    <input type="text" value="<?= $area_designada ?>" name="f1-area" style="display:none">
                    <input type="text" value="<?= $tematica_desarrollar ?>" name="f1-tematica" style="display:none">
                    <input type="text" value="<?= $horario_asistencia ?>" name="f1-horario-asistencia" style="display:none">

                    <button type="submit" class="btn btn-warning" name="Descargar_Carta_P" data-toggle="tooltip" title="Recuerda Guardar una Copia de Este Documento!" style="margin-top:10px" download>Descargar <span class="glyphicon glyphicon-save"></span></span></button><br>
                    <hr>
                </form>
            <?php
            } else if ($f2tipoConvenio == 'T') {
                $tipo_trabjoGrado = strtoupper($_POST['f2-tipo-Tgrado']);
            ?>
                <h4>𝐶𝑎𝑟𝑡𝑎 𝐶𝑜𝑚𝑝𝑟𝑜𝑚𝑖𝑠𝑜𝑟𝑖𝑎 𝑑𝑒 𝐴𝑐𝑒𝑝𝑡𝑎𝑐𝑖ó𝑛</h4>
                <form action="<?= constant('URL') . 'generadorPdf'; ?>" method="post">

                    <!-- Datos Necesarios para Carta _Trabajo Grado_ -->
                    <input type="text" value="<?= $codigo ?>" name="code" style="display:none">
                    <input type="text" value="<?= $p_nombre ?>" name="f1-first-name" style="display:none">
                    <input type="text" value="<?= $s_nombre ?>" name="f1-second-name" style="display:none">
                    <input type="text" value="<?= $p_apellido ?>" name="f1-surname" style="display:none">
                    <input type="text" value="<?= $s_apellido ?>" name="f1-second-surname" style="display:none">
                    <input type="text" value="<?= $identificacion ?>" name="f1-document" style="display:none">
                    <input type="text" value="<?= $genero ?>" name="f1-genero" style="display:none">
                    <input type="text" value="<?= $empresa_nombre ?>" name="f1-company-name" style="display:none">
                    <input type="text" value="<?= $tipo_trabjoGrado ?> " name="f1-tipo-grado" style="display:none">

                    <button type="submit" class="btn btn-warning" name="Descargar_Carta_T" data-toggle="tooltip" title="Recuerda Guardar una Copia de Este Documento!" style="margin-top:10px" download>Descargar <span class="glyphicon glyphicon-save"></span></span></button><br>
                    <hr>
                </form>
            <?php
            }
            //Registrar Convenio
            $convenio = new ConveniosModel();
            $convenio->registrar($id_estudiante, $id_empresa, $tipo_trabjoGrado, $id_practicas);
            $id_convenio = $convenio->obtenerUltimoId();
            ?>

            <h4>𝐹𝑜𝑟𝑚𝑎𝑡𝑜 𝐶𝑜𝑛𝑣𝑒𝑛𝑖𝑜 (𝐷𝑖𝑙𝑖𝑔𝑒𝑛𝑐𝑖𝑎𝑑𝑜)</h4>
            <!-- Datos Necesarios para _Formato_Creacion_Convenios_ -->
            <form action="<?= constant('URL') . 'generadorPdf'; ?>" method="post">
                <!-- DATOS ESTUDIANTE -->

                <input type="text" value="<?= $id_convenio ?>" name="f1-consecutivo" style="display:none">

                <input type="text" value="<?= $codigo ?>" name="code" style="display:none">
                <input type="text" value="<?= $p_nombre ?>" name="f1-first-name" style="display:none">
                <input type="text" value="<?= $s_nombre ?>" name="f1-second-name" style="display:none">
                <input type="text" value="<?= $p_apellido ?>" name="f1-surname" style="display:none">
                <input type="text" value="<?= $s_apellido ?>" name="f1-second-surname" style="display:none">
                <input type="text" value="<?= $genero ?>" name="f1-genero" style="display:none">
                <input type="text" value="<?= $identificacion ?>" name="f1-document" style="display:none">
                <input type="text" value="<?= $tipo_identificacion ?>" name="f1-tipo-id" style="display:none">
                <input type="text" value="<?= $fecha_expedicion ?>" name="f1-expedicion-cc" style="display:none">
                <input type="text" value="<?= $fecha_nacimiento ?>" name="f1-fecha-nacimiento" style="display:none">
                <input type="text" value="<?= $dpto ?>" name="f1-dep-nacim" style="display:none">
                <input type="text" value="<?= $ciudad ?>" name="f1-ciu-nacim" style="display:none">
                <input type="text" value="<?= $email ?>" name="f1-correo-estudiante" style="display:none">
                <input type="text" value="<?= $telf_fijo ?>" name="f1-fijo-estudiante" style="display:none">
                <input type="text" value="<?= $telf_movil ?>" name="f1-celular-estudiante" style="display:none">
                <input type="text" value="<?= $direccion ?>" name="f1-dire-estudiante" style="display:none">
                <!-- DATOS EMPRESA -->
                <input type="text" value="<?= $empresa_nombre ?>" name="f1-company-name" style="display:none">
                <input type="text" value="<?= $empresa_nit ?>" name="f1-empresa-nit" style="display:none">
                <input type="text" value="<?= $empresa_email ?>" name="f1-empresa-email" style="display:none">
                <input type="text" value="<?= $empresa_direccion ?>" name="f1-empresa-direccion" style="display:none">
                <input type="text" value="<?= $empresa_telefono ?>" name="f1-empresa-telf" style="display:none">

                <input type="text" value="<?= $tipo_empresa ?>" name="f1-tipo-empresa" style="display:none">
                <input type="text" value="<?= $naturaleza_juridica ?>" name="f1-naturaleza-juridica" style="display:none">
                <input type="text" value="<?= $actividad_economica ?>" name="f1-actividad-economica" style="display:none">
                <!-- DATOS REPRESENTANTE LEGAL -->
                <input type="text" value="<?= $empresa_r_legal_nombres ?>" name="f1-representante-nombres" style="display:none">
                <input type="text" value="<?= $empresa_r_legal_apellidos ?>" name="f1-representante-apellidos" style="display:none">
                <input type="text" value="<?= $empresa_r_legal_identificacion ?>" name="f1-cc-rLegal" style="display:none">
                <input type="text" value="<?= $empresa_r_legal_lugar_exp_id ?>" name="f1-expedicion-rLegal" style="display:none">
                <!-- DATOS SUPERVISOR -->
                <input type="text" value="<?= $empresa_superv_nombres ?>" name="f1-supervisor-nombres" style="display:none">
                <input type="text" value="<?= $empresa_superv_apellidos ?>" name="f1-supervisor-apellidos" style="display:none">
                <input type="text" value="<?= $empresa_superv_identificacion ?>" name="f1-cc-supervisor" style="display:none">
                <input type="text" value="<?= $empresa_superv_lugar_exp_id ?>" name="f1-expedicion-supervisor" style="display:none">
                <input type="text" value="<?= $empresa_supervisor_cargo ?>" name="f1-cargo-supervisor" style="display:none">
                <!-- TIPO CONVENIO -->
                <input type="text" value="<?= $tipo_trabjoGrado ?> " name="f1-tipo-grado" style="display:none">
                <input type="text" value="<?= $asignatura ?>" name="f1-nombre-asignatura" style="display:none">
                <input type="text" value="<?= $docente ?>" name="f1-nombre-teacher" style="display:none">
                <input type="text" value="<?= $jornada ?> " name="f1-jornada" style="display:none">
                <input type="text" value="<?= $area_designada ?>" name="f1-area" style="display:none">
                <input type="text" value="<?= $grupo ?>" name="f1-grupo" style="display:none">
                <input type="text" value="<?= $docenteEmail ?>" name="f1-email-teacher" style="display:none">

                <input type="text" value="<?= $f2tipoConvenio; ?>" name="f1-tipoConvenio" style="display:none">

                <button type="submit" class="btn btn-warning" name="Descargar_Formato_Convenio" data-toggle="tooltip" title="Recuerda Guardar una Copia de Este Documento!" style="margin-top:10px" download>Descargar <span class="glyphicon glyphicon-save"></span></span></button><br>
            </form>

            <h4>𝐶𝑜𝑛𝑣𝑒𝑛𝑖𝑜</h4>
            <form action="<?= constant('URL') . 'generadorPdf'; ?>" method="post">
                <input type="text" value="<?= $empresa_nombre ?>" name="empresa" style="display:none">

                <input type="text" value="<?= $empresa_r_legal_nombres ?>" name="representante-nombres" style="display:none">
                <input type="text" value="<?= $empresa_r_legal_apellidos ?>" name="representante-apellidos" style="display:none">
                <input type="text" value="<?= $empresa_r_legal_identificacion ?>" name="cedula-rLegal" style="display:none">
                <input type="text" value="<?= $empresa_r_legal_lugar_exp_id ?>" name="lugar-expedicion-rLegal" style="display:none">
                <input type="text" value="<?= $empresa_direccion ?>" name="empresa-direccion" style="display:none">
                <input type="text" value="<?= $empresa_superv_nombres ?>" name="supervisor-nombres" style="display:none">
                <input type="text" value="<?= $empresa_superv_apellidos ?>" name="supervisor-apellidos" style="display:none">
                <input type="text" value="<?= $empresa_supervisor_cargo ?>" name="cargo-supervisor" style="display:none">

                <input type="text" value="<?= $codigo ?>" name="codigo" style="display:none">
                <input type="text" value="<?= $p_nombre ?>" name="p_nombre" style="display:none">
                <input type="text" value="<?= $s_nombre ?>" name="s_name" style="display:none">
                <input type="text" value="<?= $p_apellido ?>" name="p_apellido" style="display:none">
                <input type="text" value="<?= $s_apellido ?>" name="s_apellido" style="display:none">
                <input type="text" value="<?= $identificacion ?>" name="identificacion" style="display:none">
                <input type="text" value="<?= $ciudad ?>" name="ciudad" style="display:none">
                <button type="submit" class="btn btn-warning" name="Descargar_Convenio" data-toggle="tooltip" title="Recuerda Guardar una Copia de Este Documento!" style="margin-top:10px" download>Descargar <span class="glyphicon glyphicon-save"></span></span></button><br>
            </form>
            
        <?php
        }
        ?>



    </div>
    <br>
    <br>
    <?php require 'views/footer.php'; ?>
    <?php require 'views/scripts.php'; ?>
</body>