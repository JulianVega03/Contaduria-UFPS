<?php
include_once 'entities/afiliacion.php';

class AfiliacionesModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function registrar($id_estudiante, $tipo_trabjoGrado, $id_practicas, $eps)
    {
        $query = "";
        if ($tipo_trabjoGrado == "nulo") {
            $query = $this->db->connect()->prepare(
                "INSERT INTO afiliacion_arl (id_estudiante, id_practicas, eps_ars)
                 VALUES ($id_estudiante,  '$id_practicas', '$eps')"
            );
        } else {
            $query = $this->db->connect()->prepare(
                "INSERT INTO afiliacion_arl (id_estudiante, tipo_trabajo_grado, eps_ars)
                 VALUES ($id_estudiante,  '$tipo_trabjoGrado', '$eps')"
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
            $query = $this->db->connect()->query("SELECT * FROM afiliacion_arl");

            while ($row = $query->fetch()) {
                $item = new Afiliacion();
                $item->id = $row['id'];
                $item->id_estudiante = $row['id_estudiante'];
                $item->tipo_trabajo_grado = $row['tipo_trabajo_grado'];
                $item->id_practicas = $row['id_practicas'];
                $item->eps_ars = $row['eps_ars'];
                $item->recibido = $row['recibido'];
                $item->fecha_recibido = $row['fecha_recibido'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function obtenerUltimoId(){
        $id="";
        $query = $this->db->connect()->prepare('SELECT MAX(id) AS id FROM afiliacion_arl');
        try{
            $query->execute();

            while($row = $query->fetch()){
                $id = $row['id'];
            }
            return $id;
        }catch(PDOException $e){
            return null;
        }
    }

    public function obtenerSinRecibir()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM afiliacion_arl WHERE recibido = 0");

            while ($row = $query->fetch()) {
                $item = new Afiliacion();
                $item->id = $row['id'];
                $item->id_estudiante = $row['id_estudiante'];
                $item->tipo_trabajo_grado = $row['tipo_trabajo_grado'];
                $item->id_practicas = $row['id_practicas'];
                $item->eps_ars = $row['eps_ars'];
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
            $query = $this->db->connect()->query("SELECT * FROM afiliacion_arl WHERE recibido = 1");

            while ($row = $query->fetch()) {
                $item = new Afiliacion();
                $item->id = $row['id'];
                $item->id_estudiante = $row['id_estudiante'];
                $item->tipo_trabajo_grado = $row['tipo_trabajo_grado'];
                $item->id_practicas = $row['id_practicas'];
                $item->eps_ars = $row['eps_ars'];
                $item->recibido = $row['recibido'];
                $item->fecha_recibido = $row['fecha_recibido'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function marcarRecibido($id){
        $idAfiliacion = $id;
        $query = $this->db->connect()->prepare("UPDATE afiliacion_arl SET recibido = :estado WHERE id = :id_afiliacion");
        try{
            $query->execute([
                'id_afiliacion' => $idAfiliacion,
                'estado' => 1
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function desmarcarRecibido($id){
        $idAfiliacion = $id;
        $query = $this->db->connect()->prepare("UPDATE afiliacion_arl SET recibido = :estado WHERE id = :id_afiliacion");
        try{
            $query->execute([
                'id_afiliacion' => $idAfiliacion,
                'estado' => 0
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function obtenerPorId($id)
    {
        $item = new Afiliacion();
        $query = $this->db->connect()->prepare("SELECT * FROM afiliacion_arl WHERE id = :id");
        try {
            $query->execute(['id' => $id]);

            while ($row = $query->fetch()) {
                $item->id = $row['id'];
                $item->id_estudiante = $row['id_estudiante'];
                $item->tipo_trabajo_grado = $row['tipo_trabajo_grado'];
                $item->id_practicas = $row['id_practicas'];
                $item->eps_ars = $row['eps_ars'];
                $item->recibido = $row['recibido'];
                $item->fecha_recibido = $row['fecha_recibido'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }


}
