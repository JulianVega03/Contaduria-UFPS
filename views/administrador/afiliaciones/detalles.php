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
        #afiliacion {
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
                            <h3>Información de la Afiliación</h3>

                            <div class="calender-inner" style="border-top: 4px solid #3c8dbc;">
                                <div class="steps clearfix">
                                    <div class="row">
                                        <ul role="tablist">

                                            <div class="col-md-6">
                                                <li role="tab" style="border-right: #ebebeb 2px solid; margin-right:20px" id="estudiante" class="first current" aria-disabled="false" aria-selected="true" onclick="ocultarAfiliacion();"><a aria-controls="signup-form-p-0"><span class="current-info audible"> </span>
                                                        <div class="title"><span class="number">1</span>
                                                            <span class="title_text">Estudiante</span>
                                                        </div>
                                                    </a></li>
                                            </div>
                                            <div class="col-md-6">
                                                <li role="tab" class="last" aria-disabled="true" id="afiliacion" onclick="ocultarEstudiante();"><a aria-controls="signup-form-p-1">
                                                        <div class="title"><span class="number">2</span>
                                                            <span class="title_text">Afiliación</span>
                                                        </div>
                                                    </a></li>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                <br>
                                <div class="" id="estudiante_info">
                                    <div class="row">
                                        <div class="col-md-4" style="text-align: center">
                                            <br>
                                            <img src="https://image.flaticon.com/icons/png/512/57/57073.png" width="200px" alt="Estudiante Icon">
                                            <br><br><br>
                                            <?php
                                            if ($this->afiliacion->recibido == 0) {
                                            ?>
                                                <a class="btn btn-primary" id="recibido_button" style="width:70%;border-radius:0px;" href="<?= constant('URL') ?>afiliaciones/marcarRecibido/<?= $this->afiliacion->id ?>"><span class="glyphicon glyphicon-check" aria-hidden="true"></span></a>
                                                <br><br>
                                                <a class="btn btn-danger" id="cancelar" style="width:70%;border-radius:0px;" href="<?= constant('URL') ?>afiliaciones/verTodas"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>

                                            <?php
                                            }
                                            ?>
                                            <br><br>
                                            <a class="btn btn-info" id="" style="width:70%;border-radius:0px;" href="<?= constant('URL') ?>afiliaciones/downloadPdf/<?= $this->afiliacion->id ?>"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> &nbsp; Afiliación</a>

                                        </div>
                                        <div class="col-md-6">
                                            <br>
                                            <table class="table table-striped " style="width: 100%">
                                                <?php
                                                include_once 'models/estudiantesModel.php';

                                                $estudianteModel = new EstudiantesModel();
                                                $estudiante = new Estudiante();
                                                $estudiante = $estudianteModel->obtenerPorId($this->afiliacion->id_estudiante);
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
                                                    <tr>
                                                        <th scope="row">Eps/Ars</th>
                                                        <td><?= $this->afiliacion->eps_ars ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                <div class="  hidden" id="afiliacion_info">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <br>
                                            <img src="https://2.bp.blogspot.com/-IHA7ORROc0Q/Wr6i2ttpxpI/AAAAAAAAANg/MiVfvsZ10gMtFqlppm7meyJz-U88UbchwCLcBGAs/s640/convenio.png" width="200px" style="margin-left: 25%;" alt="">
                                            <br>
                                        </div>
                                        <div class="col-md-6">
                                            <br>
                                            <table class="table table-striped " style="width: 100%">

                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Tipo de Convenio</th>
                                                        <td scope="col"><?= $this->afiliacion->tipo_trabajo_grado == null ? "PRACTICAS" : "TRABAJO DE GRADO"; ?></td>
                                                    </tr>
                                                    <?php
                                                    if ($this->afiliacion->tipo_trabajo_grado != null) {
                                                    ?>
                                                        <tr>
                                                            <th scope="row">Modalidad</th>
                                                            <td><?= $this->afiliacion->tipo_trabajo_grado ?></td>
                                                        </tr>
                                                    <?php
                                                    } else {
                                                        include_once 'models/practicaModel.php';
                                                        $practicaModel = new PracticaModel();
                                                        $practica = $practicaModel->obtenerPorId($this->afiliacion->id_practicas);
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
        function ocultarEstudiante() {
            var afiliacion = document.getElementById("afiliacion");
            afiliacion.classList.add("current");

            var estudiante = document.getElementById("estudiante");
            estudiante.classList.remove("current");

            var infoEstudiante = document.getElementById("estudiante_info");
            infoEstudiante.classList.add("hidden");
            var infoAfiliacion = document.getElementById("afiliacion_info");
            infoAfiliacion.classList.remove("hidden");

        };

        function ocultarAfiliacion() {
            var estudiante = document.getElementById("estudiante");
            estudiante.classList.add("current");

            var afiliacion = document.getElementById("afiliacion");
            afiliacion.classList.remove("current");

            var infoEstudiante = document.getElementById("estudiante_info");
            infoEstudiante.classList.remove("hidden");
            var infoAfiliacion = document.getElementById("afiliacion_info");
            infoAfiliacion.classList.add("hidden");
        };
    </script>

    <?php require 'views/administrador/scripts.php'; ?>
</body>