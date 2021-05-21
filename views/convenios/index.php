<?php require 'views/head.php'; ?>


<body>


    <?php require 'views/navbar.php'; ?>

    <div class="top-content">
        <div class="container">
            <!-- 𝐹𝑂𝑅𝑀𝑈𝐿𝐴𝑅𝐼𝑂 𝐶𝑅𝐸𝐴𝐶𝐼Ó𝑁 𝐷𝐸 𝐶𝑂𝑁𝑉𝐸𝑁𝐼𝑂𝑆-->
            <div id="form-convenio" class="row">
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
                    <form role="form" action="<?= constant('URL'); ?>convenios/registrar" method="post" class="f1">

                        <h3>Formulario Creación de Convenios</h3>
                        <p>Complete los Campos y Descarge los Documentos</p>
                        <!-- Pasos e Iconos -->
                        <div class="f1-steps">
                            <div class="f1-progress">
                                <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                            </div>
                            <div class="f1-step active">
                                <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                                <p>Estudiante</p>
                            </div>
                            <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa fa-industry"></i></div>
                                <p>Empresa</p>
                            </div>
                            <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa fa-envira"></i></div>
                                <p>Tipo Convenio</p>
                            </div>
                        </div>
                        <!-- Datos Personales -->
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
                                        <input type="text" name="codigo" placeholder="Codigo" class="f1-first-name form-control" id="f1-first-name">
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label class="sr-only" for="f1-first-name">Tipo de documento</label>
                                        <input type="text" name="tipo_identificacion" style="padding-left: 8px; width:100px;" placeholder="Tipo ID" class="f1-first-name form-control" list="tipo">
                                        <datalist id="tipo">

                                            <option value="C.C">

                                            <option value="T.I">

                                        </datalist>
                                    </div>
                                </div>
                                <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="identificacion" placeholder="Documento de Identidad" class="f1-last-name form-control" id="f1-last-name">
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
                                        <input type="text" name="semestre" placeholder="Semestre Actual" min="1" max="10" list="semestres" class="f1-last-name form-control" id="f1-last-name">
                                        <datalist id="semestres">

                                             
                                            <option value="TG">

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

                                            <option value="11">

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

                            </div>

                            <div class="f1-buttons">
                                <button type="button" class="btn btn-next">Siguiente</button>
                            </div>
                        </fieldset>

                        <!-- Datos Empresa -->
                        <fieldset>
                            <legend>Información de la Empresa:</legend>
                            <div class="form-check" style="text-align: center;margin-bottom:10px">
                                <label class="form-check-label" for="exampleCheck1" style="color:red;font-size:18px">
                                    <input type="checkbox" class="form-check-input" name="existeConvenio" id="exampleCheck1">
                                    𝑌𝑎 𝑒𝑥𝑖𝑠𝑡𝑒 𝑢𝑛 𝑐𝑜𝑛𝑣𝑒𝑛𝑖𝑜 𝑐𝑜𝑛 𝑒𝑠𝑡𝑎 𝑒𝑚𝑝𝑟𝑒𝑠𝑎
                                </label>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="sr-only" for="f1-first-name">Nombre</label>
                                        <input type="text" onkeypress="return soloLetras(event)" name="empresa_nombre" placeholder="Nombre" class="f1-first-name form-control" id="f1-first-name" required>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="sr-only" for="f1-first-name">Nit</label>
                                        <input type="text" name="empresa_nit" placeholder="Nit" class="f1-first-nam form-control" id="f1-first-name" required >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="sr-only" for="f1-email">Email</label>
                                        <input type="email" name="empresa_email" placeholder="correo electronico" class="f1-email form-control" id="f1-email" required >
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="sr-only" for="f1-first-name">Teléfono</label>
                                        <input type="text" name="empresa_telefono" maxlength="16" placeholder="Teléfono" class="f1-first-name form-control" id="f1-first-name" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="sr-only" for="f1-first-name">Dirección</label>
                                        <input type="text" name="empresa_direccion" placeholder="Dirección" class="f1-first-name form-control" id="f1-first-name" required >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label  for="f1-first-name">Tipo Empresa</label>
                                        <select id="inputState" name="tipo_empresa" class="form-control" style="height: 43px;font-size: 18px;">
                                            <option selected>Persona Natural</option>
                                            <option>Persona Juridica</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label  for="f1-first-name">Naturaleza Jurídica</label>
                                        <select id="inputState" name="naturaleza_juridica" class="form-control" style="height: 43px;font-size: 18px;">
                                            <option selected>Privada</option>
                                            <option>Publica</option>
                                            <option>Mixta</option>
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="col-md-12">
                                    <div class="form-group" >
                                    <label  for="f1-first-name">Actividad Económica</label>
                                        <select id="inputState" name="actividad_economica" class="form-control" style="height: 43px;font-size: 18px;">
                                            <option selected>Comercio</option>
                                            <option>Construccion</option>
                                            <option>Salud</option>
                                            <option>Industrial</option>
                                            <option>Servicios</option>
                                            <option>Transporte</option>
                                            <option>Minero y Energetico</option>
                                            <option>Agropecuaria</option>
                                            <option>Financiera</option>
                                            <option>Turismo</option>
                                            <option>Educacion</option>
                                            <option>Comunicaciones</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <legend>Representante Legal y/o Gerente</legend>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="sr-only" for="f1-first-name">Nombres</label>
                                        <input type="text" onkeypress="return soloLetras(event)" name="empresa_r_legal_nombres" placeholder="Nombres" class="f1-first-name form-control" id="f1-first-name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="sr-only" for="f1-first-name">Apellidos</label>
                                        <input type="text" onkeypress="return soloLetras(event)" name="empresa_r_legal_apellidos" placeholder="Apellidos" class="f1-first-name form-control" id="f1-first-name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="sr-only" for="f1-first-name">N° Cedula</label>
                                        <input type="text" onKeyPress="return soloNumeros(event)" name="empresa_r_legal_identificacion" placeholder="N° Cedula" class="f1-first-name form-control" id="f1-first-name" required >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="sr-only" for="f1-first-name">Lugar de expedición</label>
                                        <input type="text" onkeypress="return soloLetras(event)" name="empresa_r_legal_lugar_exp_id" placeholder="Lugar de expedición" class="f1-first-name form-control" id="f1-first-name" required >
                                    </div>
                                </div>
                            </div>

                            <legend>Información del Supervisor</legend>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="sr-only" for="f1-first-name">Nombres</label>
                                        <input type="text" onkeypress="return soloLetras(event)" name="empresa_superv_nombres" placeholder="Nombres" class="f1-first-name form-control" id="f1-first-name" required >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="sr-only" for="f1-first-name">Apellidos</label>
                                        <input type="text" onkeypress="return soloLetras(event)" name="empresa_superv_apellidos" placeholder="Apellidos" class="f1-first-name form-control" id="f1-first-name" required >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="sr-only" for="f1-first-name">N° Cedula</label>
                                        <input type="text" onKeyPress="return soloNumeros(event)" name="empresa_superv_identificacion" placeholder="N° Cedula" class="f1-first-name form-control" id="f1-first-name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="sr-only" for="f1-first-name">Lugar de expedición</label>
                                        <input type="text" onkeypress="return soloLetras(event)" name="empresa_superv_lugar_exp_id" placeholder="Lugar de expedición" class="f1-first-name form-control" id="f1-first-name" required >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="sr-only" for="f1-first-name">Cargo Supervisor</label>
                                        <input type="text" name="empresa_supervisor_cargo" placeholder="Cargo del Supervisor" class="f1-first-name form-control" id="f1-first-name">
                                    </div>
                                </div>
                            </div>

                            <div class="f1-buttons">
                                <button type="button" class="btn btn-previous">Anterior</button>
                                <button type="button" class="btn btn-next">Siguiente</button>
                            </div>
                        </fieldset>
                        <!-- Datos Convenio -->
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="sr-only" for="f1-first-name">Area Designada</label>
                                            <input type="text" name="area_designada" placeholder="Area Designada" class="f1-first-name form-control opcional2">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="sr-only" for="f1-first-name">Tematica a Desarrollar</label>
                                            <input type="text" name="tematica_desarrollar" placeholder="Tematica a Desarrollar" class="f1-first-name form-control opcional2">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="sr-only" for="f1-about-yourself">Horario de Asistencia</label>
                                            <textarea name="horario_asistencia" placeholder="Horario de Asistencia" class="f1-about-yourself form-control opcional2"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="f1-buttons">
                                <button type="button" class="btn btn-previous">Anterior</button>
                                <button type="submit" name="crearConvenio" class="btn btn-submit"><span class="glyphicon glyphicon-send"></span> Registrar</button>
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