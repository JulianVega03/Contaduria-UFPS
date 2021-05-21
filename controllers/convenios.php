<?php

class Convenios extends Controller
{

    function __construct()
    {
        parent::__construct();
    }
    function render()
    {
        $this->view->render('convenios/index');
    }
    function registrar()
    {
        if (isset($_POST['crearConvenio'])) {
            if (
                isset($_POST['p_nombre'], $_POST['s_nombre'],
                $_POST['p_apellido'], $_POST['s_apellido'],
                $_POST['codigo'], $_POST['tipo_identificacion'],
                $_POST['identificacion'], $_POST['fecha_expedicion'],
                $_POST['genero'], $_POST['fecha_nacimiento'],
                $_POST['semestre'], $_POST['dpto'],
                $_POST['ciudad'], $_POST['email'],
                $_POST['telf_fijo'], $_POST['telf_movil'],
                $_POST['direccion'],

                //$_POST['existeConvenio'],
                $_POST['empresa_nombre'],
                $_POST['empresa_nit'],
                $_POST['empresa_email'],
                $_POST['empresa_telefono'],
                $_POST['empresa_direccion'],
                $_POST['tipo_empresa'],
                $_POST['naturaleza_juridica'],
                $_POST['actividad_economica'],
                $_POST['empresa_r_legal_nombres'],
                $_POST['empresa_r_legal_apellidos'],
                $_POST['empresa_r_legal_identificacion'],
                $_POST['empresa_r_legal_lugar_exp_id'],
                $_POST['empresa_superv_nombres'],
                $_POST['empresa_superv_apellidos'],
                $_POST['empresa_superv_identificacion'],
                $_POST['empresa_superv_lugar_exp_id'],
                $_POST['empresa_supervisor_cargo'],

                $_POST['f2-tipoConvenio'],
                $_POST['f2-tipo-Tgrado'],
                $_POST['asignatura'],
                $_POST['docente'],
                $_POST['docente_email'],
                $_POST['jornada'],
                $_POST['grupo'],
                $_POST['area_designada'],
                $_POST['tematica_desarrollar'],
                $_POST['horario_asistencia'])
            ) {
                $this->view->render('descargar/index');
            }
        } else {
            header('Location:' . constant('URL'));
        }
    }
    function verTodas()
    {
        $convenios = $this->model->obtenerSinRecibir();
        $this->view->convenios = $convenios;
        $this->view->render('convenios/verTodas');
    }
    function verRegistros()
    {
        $convenios = $this->model->obtenerRecibidos();
        $this->view->convenios = $convenios;
        $this->view->render('convenios/verRegistros');
    }
    public function marcarRecibido($param = null)
    {
        $idConvenio = $param[0];
        $this->model->marcarRecibido($idConvenio);
        $this->verTodas();
    }
    public function desmarcarRecibido($param = null)
    {
        $idConvenio = $param[0];
        $this->model->desmarcarRecibido($idConvenio);
        $this->verRegistros();
    }
    function verDetalles($param = null)
    {
        if (is_array($param)) {
            $idConvenio = $param[0];
        } else {
            $idConvenio = $param;
        }
        $convenio = $this->model->obtenerPorId($idConvenio);
        $this->view->convenio = $convenio;
        $this->view->render('convenios/detalles');
    }
    public function downloadPdf($param = null)
    {
        $idConvenio = $param[1];
        $convenio = $this->model->obtenerPorId($idConvenio);
        if ($param[0] == 'carta') {
            $this->view->descargar = 'carta_compromisoria';
        } elseif ($param[0] == 'formato') {
            $this->view->descargar = 'formato_convenio';
        } else {
            $this->view->descargar = 'convenio';
        }
        $this->view->convenio = $convenio;

        $this->view->render('convenios/descargarPdf');
    }
    public function editar($param = null)
    {
        if (is_array($param)) {
            $idConvenio = $param[0];
        } else {
            $idConvenio = $param;
        }

        $convenio = $this->model->obtenerPorId($idConvenio);
        $this->view->convenio = $convenio;
        $this->view->render('convenios/editar');
    }

    public function actualizarEstudiante()
    {
        $id_estudiante = $_POST['id_estudiante'];
        $p_nombre = strtoupper($_POST['p_nombre']);
        $s_nombre = strtoupper($_POST['s_nombre']);
        $p_apellido = strtoupper($_POST['p_apellido']);
        $s_apellido = strtoupper($_POST['s_apellido']);
        $codigo = strtoupper($_POST['codigo']);
        $tipo_identificacion = strtoupper($_POST['tipo_identificacion']);
        $identificacion = strtoupper($_POST['identificacion']);
        $fecha_expedicion = strtoupper($_POST['fecha_expedicion']);
        $genero = strtoupper($_POST['genero']);
        $fecha_nacimiento  = strtoupper($_POST['fecha_nacimiento']);
        $semestre = strtoupper($_POST['semestre']);
        $dpto = strtoupper($_POST['dpto']);
        $ciudad = strtoupper($_POST['ciudad']);
        $email = strtoupper($_POST['email']);
        $direccion = strtoupper($_POST['direccion']);
        $telf_fijo = strtoupper($_POST['telf_fijo']);
        $telf_movil = strtoupper($_POST['telf_movil']);
        include 'entities/estudiante.php';
        $estudiante = new Estudiante();
        $estudiante->id = $id_estudiante;
        $estudiante->p_nombre = $p_nombre;
        $estudiante->s_nombre = $s_nombre;
        $estudiante->p_apellido = $p_apellido;
        $estudiante->s_apellido = $s_apellido;
        $estudiante->codigo = $codigo;
        $estudiante->tipo_identificacion = $tipo_identificacion;
        $estudiante->identificacion = $identificacion;
        $estudiante->fecha_expedicion = $fecha_expedicion;
        $estudiante->genero = $genero;
        $estudiante->fecha_nacimiento = $fecha_nacimiento;
        $estudiante->semestre = $semestre;
        $estudiante->dpto = $dpto;
        $estudiante->ciudad = $ciudad;
        $estudiante->email = $email;
        $estudiante->direccion = $direccion;
        $estudiante->telf_fijo =  $telf_fijo;
        $estudiante->telf_movil = $telf_movil;
        include 'models/estudiantesModel.php';
        $estudianteModel = new EstudiantesModel();
        $estudianteModel->actualizar($estudiante);
        $url = $_GET['view'];
        $url = explode('/', $url);
        $idConvenio = $url[2];
        $this->editar($idConvenio);
    }

    public function actualizarEmpresa()
    {
        include 'entities/empresa.php';
        $empresa = new Empresa();
        $empresa->id = $_POST['id_empresa'];
        $empresa->nombre = strtoupper($_POST['nombre']);
        $empresa->nit = strtoupper($_POST['nit']);
        $empresa->email = strtoupper($_POST['email']);
        $empresa->telefono = strtoupper($_POST['telefono']);
        $empresa->direccion = strtoupper($_POST['direccion']);
        $empresa->tipo_empresa = strtoupper($_POST['tipo_empresa']);
        $empresa->naturaleza_juridica = strtoupper($_POST['naturaleza_juridica']);
        $empresa->actividad_economica = strtoupper($_POST['actividad_economica']);
        $empresa->r_legal_nombres = strtoupper($_POST['r_legal_nombres']);
        $empresa->r_legal_apellidos = strtoupper($_POST['r_legal_apellidos']);
        $empresa->r_legal_identificacion = strtoupper($_POST['r_legal_identificacion']);
        $empresa->r_legal_lugar_exp_id = strtoupper($_POST['r_legal_lugar_exp_id']);
        $empresa->superv_nombres = strtoupper($_POST['superv_nombres']);
        $empresa->superv_apellidos = strtoupper($_POST['superv_apellidos']);
        $empresa->superv_identificacion = strtoupper($_POST['superv_identificacion']);
        $empresa->superv_lugar_exp_id = strtoupper($_POST['superv_lugar_exp_id']);
        $empresa->supervisor_cargo = strtoupper($_POST['supervisor_cargo']);
        include 'models/empresaModel.php';
        $empresaModel = new EmpresaModel();
        $empresaModel->actualizar($empresa);
        $url = $_GET['view'];
        $url = explode('/', $url);
        $idConvenio = $url[2];
        $this->editar($idConvenio);
    }
}
