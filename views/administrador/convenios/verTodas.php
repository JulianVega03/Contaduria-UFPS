<?php
include_once 'entities/convenio.php';
include_once 'entities/estudiante.php';
include_once 'entities/empresa.php';
include_once 'models/estudiantesModel.php';
include_once 'models/empresaModel.php';
$estudiantesModel = new EstudiantesModel();
$empresaModel = new EmpresaModel();
$estudiante = new Estudiante();
$empresa = new Empresa();
?>
<?php require 'views/administrador/head.php'; ?>

<head>

    <link rel="stylesheet" href="<?= constant('URL') ?>public/admin/css/dataTables.bootstrap.min.css">
   
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
                            <h3>Convenios Sin Recibido</h3>

                            <div class="calender-inner" style="border-top: 4px solid #3c8dbc;">
                                <div id="main" style="padding: 10px; ">

                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Nombres y Apellidos</th>
                                                <th>Email</th>
                                                <th>Empresa</th>
                                                <th>Modalidad de Grado</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($this->convenios as $row) {
                                                $convenio = new Convenio();
                                                $convenio = $row;
                                                $estudiante = $estudiantesModel->obtenerPorId($convenio->id_estudiante);
                                                $empresa = $empresaModel->obtenerPorId($convenio->id_empresa);
                                            ?>
                                                <tr>
                                                    <td><?= $estudiante->codigo; ?></td>
                                                    <td><?= $estudiante->p_nombre . " " . $estudiante->s_nombre . " " . $estudiante->p_apellido . " " . $estudiante->s_apellido; ?></td>
                                                    <td><?= $estudiante->email; ?></td>
                                                    <td><?= $empresa->nombre; ?></td>
                                                    <td><?= strlen($convenio->tipo_trabajo_grado) > 0 ? "TRABAJO DE GRADO" : "PRACTICAS"; ?></td>
                                                    <td style="text-align: center"><a href="<?= constant('URL') . 'convenios/verDetalles/' . $convenio->id ?>"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> </a></td>
                                                    <td style="text-align: center"><a href="<?= constant('URL') . 'convenios/editar/'. $convenio->id?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
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

        </div>


        <?php require 'views/administrador/footer.php'; ?>

    </div>

    <?php require 'views/administrador/scripts.php'; ?>
    <script src="<?= constant('URL') ?>public/admin/js/jquery-3.3.1.js"></script>
    <script src="<?= constant('URL') ?>public/admin/js/jquery.dataTables.min.js"></script>
    <script src="<?= constant('URL') ?>public/admin/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>