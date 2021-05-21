<?php
include_once 'entities/practica.php';
class PracticaModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function registrar($asignatura, $docente, $docenteEmail, $jornada, $grupo,  $area_designada, $tematica_desarrollar, $horario_asistencia)
    {

        $query = $this->db->connect()->prepare('INSERT INTO practicas (asignatura, docente, docente_email, jornada, grupo, area_designada,tematica_desarrollar,horario_asistencia)
         VALUES(:asignatura, :docente, :docenteEmail, :jornada, :grupo, :area_designada, :tematica_desarrollar, :horario_asistencia)');
        try {
            $query->execute([
                'asignatura' => $asignatura,
                'docente' => $docente,
                'docenteEmail' => $docenteEmail,
                'jornada' => $jornada,
                'grupo' => $grupo,
                'area_designada' => $area_designada,
                'tematica_desarrollar' => $tematica_desarrollar,
                'horario_asistencia' => $horario_asistencia
            ]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function obtenerUltimoId()
    {
        $id = "";
        $query = $this->db->connect()->prepare('SELECT MAX(id) AS id FROM practicas');
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

    public function obtenerPorId($id)
    {
        $item = new Practica();
        $query = $this->db->connect()->prepare("SELECT * FROM practicas WHERE id = :id");
        try {
            $query->execute(['id' => $id]);

            while ($row = $query->fetch()) {
                $item->id = $row['id'];
                $item->asignatura = $row['asignatura'];
                $item->docente = $row['docente'];
                $item->docenteEmail = $row['docente_email'];
                $item->jornada = $row['jornada'];
                $item->grupo = $row['grupo'];
                $item->areaDesignada = $row['area_designada'];
                $item->tematicaDesarrollar = $row['tematica_desarrollar'];
                $item->horarioAsistencia = $row['horario_asistencia'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function actualizar($practica)
    {
        $practica = new Practica();

        $query = $this->db->connect()->prepare("UPDATE practicas SET asignatura = :asignatura, docente = :docente, docente_email = :docente_email, jornada = :jornada, grupo = :grupo, area_designada = :area_designada, tematica_desarrollar = :tematica_desarrollar, horario_asistencia = :horario_asistencia WHERE id = :id_practicas");
        try {
            $query->execute([
                'id_practicas' => $practica->id,
                'asignatura' => $practica->asignatura,
                'docente' => $practica->docente,
                'docente_email' => $practica->docenteEmail,
                'jornada' => $practica->jornada,
                'grupo' => $practica->grupo,
                'area_designada' => $practica->areaDesignada,
                'tematica_desarrollar' => $practica->tematicaDesarrollar,
                'horario_asistencia' => $practica->horarioAsistencia,
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
