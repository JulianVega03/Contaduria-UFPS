<?php require 'views/administrador/head.php'; ?>

<head>

    <!-- Main css -->
    <link rel="stylesheet" href="<?= constant('URL'); ?>public/admin/formularioDetalles/css/style.css">
    <style>
        .hidden {
            display: none;
        }

        label {
            color: cadetblue;
        }

        #estudiante,
        #afiliacion {
            cursor: pointer;

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
                                <h1>Editar Informacion de la Afiliacion ARL</h1>
                                <div class="steps clearfix" style="display:none">
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
                                <?php
                                include_once 'models/estudiantesModel.php';

                                $estudianteModel = new EstudiantesModel();
                                $estudiante = new Estudiante();
                                $estudiante = $estudianteModel->obtenerPorId($this->afiliacion->id_estudiante);
                                ?>
                                <div class="hidden" id="estudiante_info">
                                    <fieldset >
                                        <div class="fieldset-content" style="padding-right:0px; height:max-content; ">

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="username" class="form-label">Primer Nombre</label>
                                                    <div class="form-group">

                                                        <input type="text" value="<?= $estudiante->p_nombre ?>" name="username" id="username" placeholder="primer nombre" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="email" class="form-label">Segundo Nombre</label>
                                                    <div class="form-group">

                                                        <input type="text" value="<?= $estudiante->s_nombre ?>" name="email" id="email" placeholder="segundo nombre" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="username" class="form-label">Primer Apellido</label>
                                                    <div class="form-group">

                                                        <input type="text" value="<?= $estudiante->p_apellido ?>" name="username" id="username" placeholder="primer apellido" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="email" class="form-label">Segundo Apellido</label>
                                                    <div class="form-group">

                                                        <input type="text" value="<?= $estudiante->s_apellido ?>" name="email" id="email" placeholder="segundo apellido" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="email" class="form-label">Código</label>
                                                    <div class="form-group">

                                                        <input type="text" value="<?= $estudiante->codigo ?>" name="email" id="email" placeholder="codigo" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="email" class="form-label">Tipo Identificación</label>
                                                    <div class="form-group">

                                                        <input type="text" value="<?= $estudiante->tipo_identificacion ?>" name="email" id="email" placeholder="tipo Id" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="email" class="form-label">Documento de Identidad</label>
                                                    <div class="form-group">

                                                        <input type="text" value="<?= $estudiante->identificacion ?>" name="email" id="email" placeholder="identificacion" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="email" class="form-label">Fecha de Expedición</label>
                                                    <div class="form-group">

                                                        <input type="text" value="<?= $estudiante->fecha_expedicion ?>" name="email" id="email" placeholder="fecha expedicion" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="email" class="form-label">Género</label>
                                                    <div class="form-group">

                                                        <input type="text" value="<?= $estudiante->genero ?>" name="email" id="email" placeholder="Genero M/F" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="email" class="form-label">Fecha de Nacimiento</label>
                                                    <div class="form-group">

                                                        <input type="text" value="<?= $estudiante->fecha_nacimiento ?>" name="email" id="email" placeholder="Fecha nacimiento" />
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="email" class="form-label">Semestre</label>
                                                    <div class="form-group">

                                                        <input type="text" value="<?= $estudiante->semestre ?>" name="email" id="email" placeholder="semestre" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="email" class="form-label">Ciudad</label>
                                                    <div class="form-group">

                                                        <input type="text" value="<?= $estudiante->ciudad ?>" name="email" id="email" placeholder="ciudad" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="email" class="form-label">Departamento</label>
                                                    <div class="form-group">

                                                        <input type="text" value="<?= $estudiante->dpto ?>" name="email" id="email" placeholder="departamento" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="email" class="form-label">Email</label>
                                                    <div class="form-group">

                                                        <input type="email" value="<?= $estudiante->email ?>" name="email" id="email" placeholder="correo electronico" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="email" class="form-label">Dirección</label>
                                                    <div class="form-group">

                                                        <input type="text" value="<?= $estudiante->direccion ?>" name="email" id="email" placeholder="direccion" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="email" class="form-label">Telefono Fijo</label>
                                                    <div class="form-group">

                                                        <input type="text" value="<?= $estudiante->telf_fijo ?>" name="email" id="email" placeholder="telefono fijo" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="email" class="form-label">Celular</label>
                                                    <div class="form-group">

                                                        <input type="text" value="<?= $estudiante->telf_movil ?>" name="email" id="email" placeholder="telefono movil" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="email" class="form-label">Eps/Ars Afiliado</label>
                                                    <div class="form-group">
                                                        <input type="text" value="<?= $this->afiliacion->eps_ars ?>" id="email" placeholder="eps o ars" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="email" class="form-label">Fecha de Registro</label>
                                                    <div class="form-group">
                                                        <input type="text" value="" name="email" id="email" placeholder="23/03/2019" readonly />
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="fieldset-footer">
                                        </div>
                                    </fieldset>
                                </div>
                                <div id="afiliacion_info">
                                    <fieldset style="padding-right:0px; height:max-content;">

                                        <div class="fieldset-content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="full_name" class="form-label">Tipo de Convenio</label>
                                                        <input type="text" name="full_name" id="full_name" placeholder="Full Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="full_name" class="form-label">Modalidad</label>
                                                        <input type="text" name="full_name" id="full_name" placeholder="Full Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="full_name" class="form-label">Asignatura </label>
                                                        <input type="text" name="full_name" id="full_name" placeholder="Full Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="full_name" class="form-label">Docente</label>
                                                        <input type="text" name="full_name" id="full_name" placeholder="Full Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="full_name" class="form-label">Email Docente </label>
                                                        <input type="text" name="full_name" id="full_name" placeholder="Full Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="full_name" class="form-label">Jornada</label>
                                                        <input type="text" name="full_name" id="full_name" placeholder="Full Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="full_name" class="form-label">Grupo</label>
                                                        <input type="text" name="full_name" id="full_name" placeholder="Full Name" />
                                                    </div>
                                                </div>

                                            </div>







                                        </div>

                                        <div class="fieldset-footer">
                                        </div>

                                    </fieldset>
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