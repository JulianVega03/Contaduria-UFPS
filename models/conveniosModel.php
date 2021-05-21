<?php
include_once 'entities/convenio.php';

class ConveniosModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function registrar($id_estudiante, $id_empresa, $tipo_trabajo_grado, $id_practicas)
    {
        $query = "";
        if ($tipo_trabajo_grado == "nulo") {
            $query = $this->db->connect()->prepare(
                "INSERT INTO convenio (id_estudiante,id_empresa, id_practicas)
                 VALUES ($id_estudiante, $id_empresa, '$id_practicas')"
            );
        } else {
            $query = $this->db->connect()->prepare(
                "INSERT INTO convenio (id_estudiante, id_empresa, tipo_trabajo_grado)
                 VALUES ($id_estudiante, $id_empresa, '$tipo_trabajo_grado')"
            );
        }

        try {
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function obtenerTodos()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM convenio");

            while ($row = $query->fetch()) {
                $item = new Convenio();
                $item->id = $row['id'];
                $item->id_estudiante = $row['id_estudiante'];
                $item->id_empresa = $row['id_empresa'];
                $item->tipo_trabajo_grado = $row['tipo_trabajo_grado'];
                $item->id_practicas = $row['id_practicas'];
                $item->recibido = $row['recibido'];
                $item->fecha_recibido = $row['fecha_recibido'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    public function obtenerPorId($id)
    {
        $item = new Convenio();
        $query = $this->db->connect()->prepare("SELECT * FROM convenio WHERE id = :id");
        try {
            $query->execute(['id' => $id]);

            while ($row = $query->fetch()) {
                $item->id = $row['id'];
                $item->id_estudiante = $row['id_estudiante'];
                $item->id_empresa = $row['id_empresa'];
                $item->tipo_trabajo_grado = $row['tipo_trabajo_grado'];
                $item->id_practicas = $row['id_practicas'];
                $item->recibido = $row['recibido'];
                $item->fecha_recibido = $row['fecha_recibido'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function obtenerSinRecibir()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM convenio WHERE recibido = 0");

            while ($row = $query->fetch()) {
                $item = new Convenio();
                $item->id = $row['id'];
                $item->id_estudiante = $row['id_estudiante'];
                $item->id_empresa = $row['id_empresa'];
                $item->tipo_trabajo_grado = $row['tipo_trabajo_grado'];
                $item->id_practicas = $row['id_practicas'];
                $item->recibido = $row['recibido'];
                $item->fecha_recibido = $row['fecha_recibido'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function obtenerRecibidos()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM convenio WHERE recibido = 1");

            while ($row = $query->fetch()) {
                $item = new Convenio();
                $item->id = $row['id'];
                $item->id_estudiante = $row['id_estudiante'];
                $item->id_empresa = $row['id_empresa'];
                $item->tipo_trabajo_grado = $row['tipo_trabajo_grado'];
                $item->id_practicas = $row['id_practicas'];
                $item->recibido = $row['recibido'];
                $item->fecha_recibido = $row['fecha_recibido'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function marcarRecibido($id)
    {
        $idConvenio = $id;
        $query = $this->db->connect()->prepare("UPDATE convenio SET recibido = :estado WHERE id = :id_convenio");
        try {
            $query->execute([
                'id_convenio' => $idConvenio,
                'estado' => 1
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function desmarcarRecibido($id)
    {
        $idConvenio = $id;
        $query = $this->db->connect()->prepare("UPDATE convenio SET recibido = :estado WHERE id = :id_convenio");
        try {
            $query->execute([
                'id_convenio' => $idConvenio,
                'estado' => 0
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function obtenerUltimoId()
    {
        $id = "";
        $query = $this->db->connect()->prepare('SELECT MAX(id) AS id FROM convenio');
        try {
            $query->execute();

            while ($row = $query->fetch()) {
                $id = $row['id'];
            }
            return $id;
        } catch (PDOException $e) {
            return null;
        }
    }
}
