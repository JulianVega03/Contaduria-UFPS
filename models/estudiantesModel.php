<?php
include_once 'entities/estudiante.php';

class EstudiantesModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function registrar(
        $p_nombre,
        $s_nombre,
        $p_apellido,
        $s_apellido,
        $codigo,
        $tipo_identificacion,
        $identificacion,
        $fecha_expedicion,
        $genero,
        $fecha_nacimiento,
        $semestre,
        $dpto,
        $ciudad,
        $email,
        $telf_fijo,
        $telf_movil,
        $direccion
    ) {
        $query = $this->db->connect()->prepare(
            'INSERT INTO estudiante (p_nombre, s_nombre, p_apellido, s_apellido, codigo,
         tipo_identificacion, identificacion, fecha_expedicion, genero, fecha_nacimiento, semestre, dpto, ciudad, email, telf_fijo, telf_movil, direccion)
         VALUES(:p_nombre, :s_nombre, :p_apellido, :s_apellido, :codigo,
         :tipo_identificacion, :identificacion, :fecha_expedicion, :genero, :fecha_nacimiento, :semestre, :dpto, :ciudad, :email, :telf_fijo, :telf_movil, :direccion)'
        );
        try {
            $query->execute([
                'p_nombre' => $p_nombre,
                's_nombre' => $s_nombre,
                'p_apellido' => $p_apellido,
                's_apellido' => $s_apellido,
                'codigo' => $codigo,
                'tipo_identificacion' => $tipo_identificacion,
                'identificacion' => $identificacion,
                'fecha_expedicion' => $fecha_expedicion,
                'genero' => $genero,
                'fecha_nacimiento' => $fecha_nacimiento,
                'semestre' => $semestre,
                'dpto' => $dpto,
                'ciudad' => $ciudad,
                'email' => $email,
                'telf_fijo' => $telf_fijo,
                'telf_movil' => $telf_movil,
                'direccion' => $direccion
            ]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function obtenerUltimoId()
    {
        $id = "";
        $query = $this->db->connect()->prepare('SELECT MAX(id) AS id FROM estudiante');
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
        $item = new Estudiante();
        $query = $this->db->connect()->prepare("SELECT * FROM estudiante WHERE id = :id");
        try {
            $query->execute(['id' => $id]);

            while ($row = $query->fetch()) {
                $item->id = $row['id'];
                $item->p_nombre = $row['p_nombre'];
                $item->s_nombre = $row['s_nombre'];
                $item->p_apellido = $row['p_apellido'];
                $item->s_apellido = $row['s_apellido'];
                $item->codigo = $row['codigo'];
                $item->tipo_identificacion = $row['tipo_Identificacion'];
                $item->identificacion = $row['identificacion'];
                $item->fecha_expedicion = $row['fecha_expedicion'];
                $item->genero = $row['genero'];
                $item->fecha_nacimiento = $row['fecha_nacimiento'];
                $item->semestre = $row['semestre'];
                $item->dpto = $row['dpto'];
                $item->ciudad = $row['ciudad'];
                $item->email = $row['email'];
                $item->telf_fijo = $row['telf_fijo'];
                $item->telf_movil = $row['telf_movil'];
                $item->direccion = $row['direccion'];
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function actualizar($estudiante)
    {
        $id = $estudiante->id;
        $query = $this->db->connect()->prepare("UPDATE estudiante SET p_nombre = :p_nombre, s_nombre = :s_nombre, p_apellido = :p_apellido, s_apellido = :s_apellido,
        codigo = :codigo, tipo_identificacion = :tipo_identificacion, identificacion = :identificacion, fecha_expedicion = :fecha_expedicion, 
        genero = :genero, fecha_nacimiento = :fecha_nacimiento, semestre = :semestre, dpto = :dpto, ciudad = :ciudad, email = :email, 
        telf_fijo = :telf_fijo, telf_movil = :telf_movil, direccion = :direccion WHERE id = :id_estudiante");
        try{
            $query->execute([
                'id_estudiante' => $id,
                'p_nombre' => $estudiante->p_nombre,
                's_nombre' =>  $estudiante->s_nombre,
                'p_apellido' =>  $estudiante->p_apellido,
                's_apellido' =>  $estudiante->s_apellido,
                'codigo' =>  $estudiante->codigo,
                'tipo_identificacion' =>  $estudiante->tipo_identificacion,
                'identificacion' =>  $estudiante->identificacion,
                'fecha_expedicion' =>  $estudiante->fecha_expedicion,
                'genero' =>  $estudiante->genero,
                'fecha_nacimiento' => $estudiante->fecha_nacimiento,
                'semestre' =>  $estudiante->semestre,
                'dpto' =>  $estudiante->dpto,
                'ciudad' =>  $estudiante->ciudad,
                'email' =>  $estudiante->email,
                'telf_fijo' =>  $estudiante->telf_fijo,
                'telf_movil' =>  $estudiante->telf_movil,
                'direccion' =>  $estudiante->direccion
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}
