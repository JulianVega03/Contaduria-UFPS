<?php

class Afiliaciones extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->afiliaciones = [];
    }

    function render()
    {
        $this->view->render('afiliaciones/index');
    }

    function registrar()
    {
        if (isset($_POST['crearARL'])) {
            if (isset($_POST['p_nombre'],
            $_POST['s_nombre'],
            $_POST['p_apellido'], $_POST['s_apellido'],
            $_POST['codigo'], $_POST['tipo_identificacion'], $_POST['identificacion'],
            $_POST['fecha_expedicion'], $_POST['genero'],
            $_POST['fecha_nacimiento'], $_POST['semestre'],
            $_POST['dpto'],
            $_POST['ciudad'], $_POST['email'],
            $_POST['telf_fijo'], $_POST['telf_movil'],
            $_POST['direccion'], $_POST['eps_ars'],
            $_POST['f2-tipoConvenio'],
            $_POST['f2-tipo-Tgrado'],
            $_POST['asignatura'], $_POST['docente'],
            $_POST['docente_email'],
            $_POST['jornada'], $_POST['grupo'])) {

                $this->view->render('descargar/index');
            }
        } else {
            header('Location:' . constant('URL'));
        }
    }

    function verTodas()
    {
        $afiliaciones = $this->model->obtenerSinRecibir();
        $this->view->afiliaciones = $afiliaciones;
        $this->view->render('afiliaciones/verTodas');
    }

    function verDetalles($param = null)
    {
        $idAfiliacion = $param[0];
        $afiliacion = $this->model->obtenerPorId($idAfiliacion);
        $this->view->afiliacion = $afiliacion;
        $this->view->render('afiliaciones/detalles');
    }

    public function marcarRecibido($param = null)
    {
        $idAfiliacion = $param[0];
        $this->model->marcarRecibido($idAfiliacion);
        $this->verTodas();
    }

    public function desmarcarRecibido($param = null)
    {
        $idAfiliacion = $param[0];
        $this->model->desmarcarRecibido($idAfiliacion);
        $this->verRegistros();
    }

    function actualizarAfiliacion($param = null)
    {
        $idAfiliacion = $param[0];
        $afiliacion = $this->model->obtenerPorId($idAfiliacion);
        $this->view->afiliacion = $afiliacion;
        $this->view->render('afiliaciones/editar');
    }



    function verRegistros()
    {
        $afiliaciones = $this->model->obtenerRecibidos();
        $this->view->afiliaciones = $afiliaciones;
        $this->view->render('afiliaciones/verRegistros');
    }

    function downloadPdf($param = null)
    {
        $idAfiliacion = $param[0];
        $afiliacion = $this->model->obtenerPorId($idAfiliacion);
        $this->view->afiliacion = $afiliacion;
        $this->view->render('afiliaciones/descargarPdf');
    }

    function reportes()
    {
        $this->view->render('afiliaciones/reportes');
    }
}
