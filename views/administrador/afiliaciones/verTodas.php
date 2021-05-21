<?php require 'views/administrador/head.php'; ?>

<head>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
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
                            <h3>Afiliaciones en Espera</h3>

                            <div class="calender-inner" style="border-top: 4px solid #3c8dbc;">
                                <div id="main" style="padding: 10px; ">

                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                                <th style="padding: 5px;">Codigo</th>
                                                <th style="padding: 5px;">Nombres y Apellidos</th>
                                                <th style="padding: 5px;">Email</th>
                                                <th style="padding: 5px;">Eps/Ars</th>
                                                <th style="padding: 5px;">Modalidad de Grado</th>
                                                <th style="padding: 5px;"></th>
                                                <th style="padding: 5px;"></th>
                                                <th style="padding: 5px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once 'entities/afiliacion.php';
                                            include_once 'models/estudiantesModel.php';
                                            $estudianteModel = new EstudiantesModel();
                                            $estudiante = new Estudiante();
                                            foreach ($this->afiliaciones as $row) {
                                                $afiliaciones = new Afiliacion();
                                                $afiliaciones = $row;
                                                $estudiante = $estudianteModel->obtenerPorId($afiliaciones->id_estudiante);
                                            ?>
                                                <tr>
                                                    <td style="padding: 5px;"><?= $estudiante->codigo; ?></td>
                                                    <td style="padding: 5px;"><?= $estudiante->p_nombre . " " . $estudiante->s_nombre . " " . $estudiante->p_apellido . " " . $estudiante->s_apellido; ?></td>
                                                    <td style="padding: 5px;"><?= $estudiante->email; ?></td>
                                                    <td style="padding: 5px;"><?= $afiliaciones->eps_ars; ?></td>
                                                    <td ><?= strlen($afiliaciones->tipo_trabajo_grado) > 0 ? "TRABAJO DE GRADO" : "PRACTICAS"; ?></td>
                                                    <td style="text-align: center"><a href="<?= constant('URL') . 'afiliaciones/verDetalles/' . $afiliaciones->id ?>"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> </a></td>
                                                    <td style="text-align: center"><a href="<?= constant('URL') . 'afiliaciones/actualizarAfiliacion/' . $afiliaciones->id ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                                                    <td style="text-align: center"><a href=""><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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
    <?php require 'views/administrador/scripts.php'; ?>
  
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>