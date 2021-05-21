<?php require 'views/head.php'; ?>

<body>


    <?php require 'views/navbar.php'; ?>

    <!-- Top content -->
    <div class="top-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
                    <form role="form" action="<?= constant('URL'); ?>afiliaciones/registrar" method="post" class="f1">

                        <h3>Formulario Afiliación a Riesgos Laborales</h3>
                        <p>Complete los Campos y Descarge los Documentos</p>
                        <div class="f1-steps">
                            <div class="f1-progress">
                                <div class="f1-progress-line" data-now-value="28.66" data-number-of-steps="2" style="width: 28.66%;"></div>
                            </div>
                            <div class="f1-step active" style="width: 49.333333%;">
                                <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                                <p>Estudiante</p>
                            </div>
                            <div class="f1-step" style="width: 49.333333%;">
                                <div class="f1-step-icon"><i class="fa fa-envira"></i></div>
                                <p>Tipo de Convenio</p>
                            </div>
                        </div>

                        <fieldset>
                            <h4>Datos Personales:</h4>
                            <div class="row">

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="sr-only" for="f1-first-name">Primer Nombre</label>
                                        <input type="text" name="p_nombre" placeholder="Primer Nombre" class="f1-first-name form-control" id="f1-first-name">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
                                    <div class="form-group">
                                        <label class="sr-only" for="f1-last-name">Segundo Nombre </label>
                                        <input type="text" name="s_nombre" placeholder="Segundo Nombre" class="f1-last-name form-control" id="f1-last-name">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="sr-only" for="f1-first-name">Primer Apellido</label>
                                        <input type="text" name="p_apellido" placeholder="Primer Apellido" class="f1-first-name form-control" id="f1-first-name">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
                                    <div class="form-group">
                                        <label class="sr-only" for="f1-last-name">Segundo Apellido</label>
                                        <input type="text" name="s_apellido" placeholder="Segundo Apellido" class="f1-last-name form-control" id="f1-last-name">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label class="sr-only" for="f1-first-name">Codigo</label>
                                        <input type="text" name="codigo"  placeholder="Codigo" class="f1-first-name form-control" id="f1-first-name">
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label class="sr-only" for="f1-first-name">Tipo de documento</label>
                                        <input type="text" name="tipo_identificacion" style="padding-left: 8px; width:100px;"  placeholder="Tipo ID" class="f1-first-name form-control" list="tipo">
                                        <datalist id="tipo">

                                            <option value="C.C">

                                            <option value="T.I">

                                        </datalist>
                                    </div>
                                </div>
                                <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="identificacion"  placeholder="Documento de Identidad" class="f1-last-name form-control" id="f1-last-name">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                                    <div class="form-group">
                                        <label class="" for="f2-last-name">Fecha de expedición</label>
                                        <input type="date" name="fecha_expedicion" placeholder="Fecha de expedición" class="f2-last-name form-control" id="f2-last-name" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                                    <div class="form-group">
                                        <label for="inputEmail4">Género</label><br>
                                        <input type="radio" name="genero" id="inlineRadio3" class="custom-control-input" value="M" style="margin-left:14px">
                                        <label class="radio-inline custom-control-label" style="padding:2px"> Masculino </label>

                                        <input type="radio" name="genero" id="inlineRadio4" class="custom-control-input" value="F" style="margin-left:30px">
                                        <label class="radio-inline custom-control-label" style="padding:2px"> Femenino</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                                    <div class="form-group">
                                        <label class="" for="f2-last-name">Fecha de Nacimiento</label>
                                        <input type="date" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" class="f2-last-name " id="f2-last-name" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 ">
                                    <div class="form-group">
                                        <label class="" for="f2-last-name">Semestre Actual</label>
                                        <input type="number" name="semestre" placeholder="Semestre Actual" min="1" max="10" list="semestres" class="f1-last-name form-control" id="f1-last-name">
                                        <datalist id="semestres">

                                            <option value="1">

                                            <option value="2">

                                            <option value="3">

                                            <option value="4">

                                            <option value="5">

                                            <option value="6">

                                            <option value="7">

                                            <option value="8">

                                            <option value="9">

                                            <option value="10">

                                        </datalist>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 ">
                                    <div class="form-group">
                                        <label class="sr-only" for="f2-first-name">Departamento</label>
                                        <input type="text" onkeypress="return soloLetras(event)" name="dpto" placeholder="Departamento" class="f2-first-name form-control" id="f2-first-name" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                                    <div class="form-group">
                                        <label class="sr-only" for="f2-first-name">Ciudad</label>
                                        <input type="text" onkeypress="return soloLetras(event)" name="ciudad" placeholder="Ciudad" class="f2-first-name form-control" id="f2-first-name" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label class="sr-only" for="f2-first-name">Correo</label>
                                        <input type="email" name="email" placeholder="Correo" class="f2-email form-control" id="f2-first-name">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label class="sr-only" for="f2-first-name">Direccion</label>
                                        <input type="text" name="direccion" placeholder="Dirección" class="f2-first-name form-control" id="f2-first-name" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="sr-only" for="f2-first-name">Télefono Fijo</label>
                                        <input type="text" name="telf_fijo" placeholder="Télefono Fijo" class="f2-first-name form-control" id="f2-first-name" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="sr-only" for="f2-first-name">Celular</label>
                                        <input type="text" name="telf_movil" placeholder="Celular" class="f2-first-name form-control" id="f2-first-name" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label class="sr-only" for="f2-first-name">EPS o ARS Afiliado</label>
                                        <input type="text" name="eps_ars" placeholder="EPS o ARS Afiliado" class="f2-email form-control" id="f2-first-name" required>
                                    </div>
                                </div>

                            </div>

                            <div class="f1-buttons">
                                <button type="button" class="btn btn-next">Siguiente</button>
                            </div>
                        </fieldset>

                        <fieldset>
                            <h4>Tipo de Convenio:</h4>

                            <div class="form-group" style="text-align:center">
                                <input type="radio" class="custom-control-input" id="trabajoGrado2" name="f2-tipoConvenio" value="T" required>
                                <label class="custom-control-label" for="customControlValidation42" id="" style="margin-right: 20px">
                                    Trabajo de Grado
                                </label>

                                <input type="radio" class="custom-control-input" id="practicas2" name="f2-tipoConvenio" value="P" required>
                                <label class="custom-control-label" for="customControlValidation52" id="practicas2">
                                    Asignatura
                                </label>
                            </div>

                            <!-- Opcional (Tipo Convenio -> Trabajo Grado) -->
                            <div class="hidden form-group" id="frameGrado2">
                                <select id="inputState" class="form-control" name="f2-tipo-Tgrado" style="height: 43px;font-size: 18px;width:200px;margin-left: auto; margin-right: auto;">
                                    <option selected>Dirigido</option>
                                    <option>Pasantia</option>
                                    <option>Investigacion</option>
                                </select>
                                <br>
                            </div>
                            <!-- Opcional (Tipo Convenio -> Practicas) -->
                            <div class="hidden form-group" id="framePracticas2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="sr-only" for="f2-first-name">Nombre de la Asignatura</label>
                                            <input type="text" name="asignatura" placeholder="Nombre de la Asignatura" class="f2-first-name form-control opcional2" id="f2-first-name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="sr-only" for="f2-first-name">Docente</label>
                                            <input type="text" name="docente" placeholder="Docente" class="f2-first-name form-control opcional2" list="docentes" id="f2-first-name">
                                            <datalist id="docentes">

                                                <option value="Carlos Angarita">

                                                <option value="Juan Perz">

                                                <option value="Camila Caicedo">

                                                <option value="Cristian Obando">

                                                <option value="Nicole Peña">

                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="sr-only" for="f2-first-name">Email Docente</label>
                                            <input type="email" name="docente_email" placeholder="Email Docente" class="f2-first-name form-control opcional2" id="f2-first-name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="sr-only" for="f2-first-name">Jornada</label>
                                            <input type="text" name="jornada" placeholder="Jornada" list="jornada" class="f2-first-name form-control opcional2" id="f2-first-name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="sr-only" for="f2-first-name">Grupo</label>
                                            <input type="text" name="grupo" placeholder="Grupo" list="grupo" class="f2-first-name form-control opcional2" id="f2-first-name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="f1-buttons">
                                <button type="button" class="btn btn-previous">Anterior</button>
                                <button type="submit" name="crearARL" class="btn btn-submit"><span class="glyphicon glyphicon-send"></span> Registrar</button>
                            </div>
                        </fieldset>

                    </form>
                </div>
            </div>

        </div>
    </div>


    <?php require 'views/footer.php'; ?>

    <?php require 'views/scripts.php'; ?>
</body>