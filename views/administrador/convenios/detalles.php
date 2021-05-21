<?php require 'views/administrador/head.php'; ?>

<head>

    <!-- Main css -->
    <link rel="stylesheet" href="<?= constant('URL'); ?>public/admin/formularioDetalles/css/style.css">
    <style>
        .hidden {
            display: none;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        #estudiante,
        #convenio,
        #empresa {
            cursor: pointer;

        }

        #recibido_button:hover {
            background-color: #f9f9f9;
            color: black;
            font-size: 16px;
        }

        #cancelar {
            background-color: #f9f9f9;
            color: black;

        }

        #cancelar:hover {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <?php require 'views/administrador/aside.php'; ?>
    </div>
    <!-- End Left menu area -->


    <!-- Start Welcome area -->
    <div class="all-content-wrapper">


        <div class="container-fluid">
            <?php require 'views/administrador/logo.php'; ?>
        </div>

        <div class="header-advance-area">


            <?php require 'views/administrador/menu.php'; ?>

            <?php require 'views/administrador/movilMenu.php'; ?>

        </div>
        <div class="contenido">
            <br>
            <div class="calender-area mg-b-15">

                <div class="container-fluid">
                    <div class="row">

                        <div class="col-lg-12">
                            <h3>Información del Convenio</h3>

                            <div class="calender-inner" style="border-top: 4px solid #3c8dbc;">
                                <div class="steps clearfix">
                                    <div class="row">
                                        <ul role="tablist">

                                            <div class="col-md-4">
                                                <li role="tab" style="border-right: #ebebeb 2px solid; margin-right:20px" id="estudiante" class="first current" aria-disabled="false" aria-selected="true" onclick="mostrarEstudiante();"><a aria-controls="signup-form-p-0"><span class="current-info audible"> </span>
                                                        <div class="title"><span class="number">1</span>
                                                            <span class="title_text">Estudiante</span>
                                                        </div>
                                                    </a>
                                                </li>
                                            </div>
                                            <div class="col-md-4">
                                                <li role="tab" style="border-right: #ebebeb 2px solid; margin-right:20px" id="empresa" onclick="mostrarEmpresa();" class="second" aria-disabled="false" aria-selected="true" onclick=""><a aria-controls="signup-form-p-0"><span class="current-info audible"> </span>
                                                        <div class="title"><span class="number">2</span>
                                                            <span class="title_text">Empresa</span>
                                                        </div>
                                                    </a>
                                                </li>
                                            </div>
                                            <div class="col-md-4">
                                                <li role="tab" class="last" aria-disabled="true" id="convenio" onclick="mostrarConvenio();"><a aria-controls="signup-form-p-1">
                                                        <div class="title"><span class="number">3</span>
                                                            <span class="title_text">Convenio</span>
                                                        </div>
                                                    </a>
                                                </li>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                <br>
                                <div class="" id="estudiante_info">
                                    <div class="row">
                                        <div class="col-md-4" style="text-align: center">
                                            <br>
                                            <img src="https://image.flaticon.com/icons/png/512/57/57073.png" width="180px" alt="Estudiante Icon">
                                            <br><br><br>
                                            <?php
                                            if ($this->convenio->recibido == 0) {
                                            ?>
                                                <a class="btn btn-primary" id="recibido_button" style="width:70%;border-radius:0px;" href="<?= constant('URL') ?>convenios/marcarRecibido/<?= $this->convenio->id ?>"><span class="glyphicon glyphicon-check" aria-hidden="true"></span></a>
                                                <br><br>
                                                <a class="btn btn-danger" id="cancelar" style="width:70%;border-radius:0px;" href="<?= constant('URL') ?>convenios/verTodas"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>

                                            <?php
                                            } else {
                                            ?>
                                                <a class="btn btn-danger" id="recibido_button" style="width:70%;border-radius:0px;" href="<?= constant('URL') ?>convenios/desmarcarRecibido/<?= $this->convenio->id ?>"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> </a>

                                            <?php
                                            }
                                            ?>
<br><br>
                                            <a class="btn btn-info" id="" style="width:70%;border-radius:0px;" href="<?= constant('URL') ?>convenios/downloadPdf/carta/<?= $this->convenio->id ?>"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> &nbsp; Carta Compromisoria</a>
                                            <br><br>
                                            <a class="btn btn-info" id="" style="width:70%;border-radius:0px;" href="<?= constant('URL') ?>convenios/downloadPdf/formato/<?= $this->convenio->id ?>"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> &nbsp; Formato Convenio</a>
                                            <br><br>
                                            <a class="btn btn-info" id="" style="width:70%;border-radius:0px;" href="<?= constant('URL') ?>convenios/downloadPdf/convenio/<?= $this->convenio->id ?>"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> &nbsp; Convenio</a>
                                        </div>
                                        <div class="col-md-6">
                                            <br>
                                            <table class="table table-striped " style="width: 100%">
                                                <?php
                                                include_once 'models/estudiantesModel.php';

                                                $estudianteModel = new EstudiantesModel();
                                                $estudiante = new Estudiante();
                                                $estudiante = $estudianteModel->obtenerPorId($this->convenio->id_estudiante);
                                                ?>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Primer Nombre</th>
                                                        <td scope="col"><?= $estudiante->p_nombre ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Segundo Nombre</th>
                                                        <td><?= $estudiante->s_nombre ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Primer Apellido</th>
                                                        <td><?= $estudiante->p_apellido ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Segundo Apellido</th>
                                                        <td><?= $estudiante->s_apellido ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Codigo</th>
                                                        <td><?= $estudiante->codigo ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Tipo Documento</th>
                                                        <td><?= $estudiante->tipo_identificacion ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Numero de Documento</th>
                                                        <td><?= $estudiante->identificacion ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Fecha de Expedición</th>
                                                        <td><?= $estudiante->fecha_expedicion ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Genero</th>
                                                        <td><?= $estudiante->genero ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Fecha de Nacimiento</th>
                                                        <td><?= $estudiante->fecha_nacimiento ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Semestre</th>
                                                        <td><?= $estudiante->semestre ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Departamento</th>
                                                        <td><?= $estudiante->dpto ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Ciudad</th>
                                                        <td><?= $estudiante->ciudad ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Correo Electronico</th>
                                                        <td><?= $estudiante->email ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Dirección</th>
                                                        <td><?= $estudiante->direccion ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Telefono Fijo</th>
                                                        <td><?= $estudiante->telf_fijo ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Telefono Celular</th>
                                                        <td><?= $estudiante->telf_movil ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                <div class="hidden" id="empresa_info">
                                    <div class="row">
                                        <div class="col-md-4" style="text-align: center">
                                            <br>
                                            <img src="https://image.flaticon.com/icons/png/512/484/484573.png" width="180px" alt="Estudiante Icon">
                                            <br><br><br>
                                        </div>
                                        <div class="col-md-6">
                                            <br>
                                            <table class="table table-striped " style="width: 100%">
                                                <?php
                                                include_once 'models/empresaModel.php';

                                                $empresaModel = new EmpresaModel();
                                                $empresa = new Empresa();
                                                $empresa = $empresaModel->obtenerPorId($this->convenio->id_empresa);
                                                ?>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Nombre</th>
                                                        <td scope="col"><?= $empresa->nombre ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Nit</th>
                                                        <td><?= $empresa->nit ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Email</th>
                                                        <td><?= $empresa->email ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Telefono</th>
                                                        <td><?= $empresa->telefono ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Dirección</th>
                                                        <td><?= $empresa->direccion ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Tipo Empresa</th>
                                                        <td><?= $empresa->tipo_empresa ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Naturaleza Juridica</th>
                                                        <td><?= $empresa->naturaleza_juridica ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Actividad Economica</th>
                                                        <td><?= $empresa->actividad_economica ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><span class="red">Representante Legal:</span> Nombres</th>
                                                        <td><?= $empresa->r_legal_nombres ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><span class="red">Representante Legal:</span> Apellidos</th>
                                                        <td><?= $empresa->r_legal_apellidos ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><span class="red">Representante Legal:</span> Identificación</th>
                                                        <td><?= $empresa->r_legal_identificacion ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><span class="red">Representante Legal:</span> Lugar de Expedición ID </th>
                                                        <td><?= $empresa->r_legal_lugar_exp_id ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><span class="blue">Supervisor:</span> Nombres</th>
                                                        <td><?= $empresa->superv_nombres ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><span class="blue">Supervisor:</span> Apellidos</th>
                                                        <td><?= $empresa->superv_apellidos ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><span class="blue">Supervisor:</span> Identificación</th>
                                                        <td><?= $empresa->superv_identificacion ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><span class="blue">Supervisor:</span> Lugar de Expedición ID</th>
                                                        <td><?= $empresa->superv_lugar_exp_id ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><span class="blue">Supervisor:</span> Cargo</th>
                                                        <td><?= $empresa->supervisor_cargo ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                <div class="  hidden" id="convenio_info">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <br>
                                            <img src="https://2.bp.blogspot.com/-IHA7ORROc0Q/Wr6i2ttpxpI/AAAAAAAAANg/MiVfvsZ10gMtFqlppm7meyJz-U88UbchwCLcBGAs/s640/convenio.png" width="180px" style="margin-left: 25%;" alt="">
                                            <br>
                                        </div>
                                        <div class="col-md-6">
                                            <br>
                                            <table class="table table-striped " style="width: 100%">

                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Tipo de Convenio</th>
                                                        <td scope="col"><?= $this->convenio->tipo_trabajo_grado == null ? "PRACTICAS" : "TRABAJO DE GRADO"; ?></td>
                                                    </tr>
                                                    <?php
                                                    if ($this->convenio->tipo_trabajo_grado != null) {
                                                    ?>
                                                        <tr>
                                                            <th scope="row">Modalidad</th>
                                                            <td><?= $this->convenio->tipo_trabajo_grado ?></td>
                                                        </tr>
                                                    <?php
                                                    } else {
                                                        include_once 'models/practicaModel.php';
                                                        $practicaModel = new PracticaModel();
                                                        $practica = $practicaModel->obtenerPorId($this->convenio->id_practicas);
                                                    ?>

                                                        <tr>
                                                            <th scope="row">Asignatura</th>
                                                            <td><?= $practica->asignatura ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Docente</th>
                                                            <td><?= $practica->docente ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Docente Email</th>
                                                            <td><?= $practica->docenteEmail ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Jornada</th>
                                                            <td><?= $practica->jornada ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Grupo</th>
                                                            <td><?= $practica->grupo ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Area Designada</th>
                                                            <td><?= $practica->areaDesignada ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Tematica a Desarrollar</th>
                                                            <td><?= $practica->tematicaDesarrollar ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Horario Asistencia</th>
                                                            <td><?= $practica->horarioAsistencia ?></td>
                                                        </tr>

                                                    <?php
                                                    }
                                                    ?>



                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>


        <?php require 'views/administrador/footer.php'; ?>

    </div>
    <script>
        function mostrarEstudiante() {
            var estudiante = document.getElementById("estudiante");
            estudiante.classList.add("current");

            var empresa = document.getElementById("empresa");
            empresa.classList.remove("current");

            var convenio = document.getElementById("convenio");
            convenio.classList.remove("current");



            var infoEstudiante = document.getElementById("estudiante_info");
            infoEstudiante.classList.remove("hidden");
            var infoEmpresa = document.getElementById("empresa_info");
            infoEmpresa.classList.add("hidden");
            var infoConvenio = document.getElementById("convenio_info");
            infoConvenio.classList.add("hidden");
        };

        function mostrarEmpresa() {
            var empresa = document.getElementById("empresa");
            empresa.classList.add("current");

            var convenio = document.getElementById("convenio");
            convenio.classList.remove("current");

            var estudiante = document.getElementById("estudiante");
            estudiante.classList.remove("current");


            var infoEmpresa = document.getElementById("empresa_info");
            infoEmpresa.classList.remove("hidden");
            var infoConvenio = document.getElementById("convenio_info");
            infoConvenio.classList.add("hidden");
            var infoEstudiante = document.getElementById("estudiante_info");
            infoEstudiante.classList.add("hidden");
        };

        function mostrarConvenio() {
            var convenio = document.getElementById("convenio");
            convenio.classList.add("current");

            var empresa = document.getElementById("empresa");
            empresa.classList.remove("current");

            var estudiante = document.getElementById("estudiante");
            estudiante.classList.remove("current");


            var infoConvenio = document.getElementById("convenio_info");
            infoConvenio.classList.remove("hidden");
            var infoEmpresa = document.getElementById("empresa_info");
            infoEmpresa.classList.add("hidden");
            var infoEstudiante = document.getElementById("estudiante_info");
            infoEstudiante.classList.add("hidden");
        };
    </script>

    <?php require 'views/administrador/scripts.php'; ?>
</body>