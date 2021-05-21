<?php
include_once 'entities/empresa.php';

class EmpresaModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function registrar($nombre, $nit, $email, $telefono,
     $direccion, $tipo_empresa, $naturaleza_juridica, $actividad_economica, $r_legal_nombres, $r_legal_apellidos,
     $r_legal_identificacion, $r_legal_lugar_exp_id, $superv_nombres,
     $superv_apellidos, $superv_identificacion, $superv_lugar_exp_id,$supervisor_cargo)
    {
        $query = $this->db->connect()->prepare(
            'INSERT INTO empresa (nombre, nit, email, telefono, direccion, tipo_empresa, naturaleza_juridica, actividad_economica,
         r_legal_nombres, r_legal_apellidos, r_legal_identificacion, r_legal_lugar_exp_id, superv_nombres, superv_apellidos, superv_identificacion, superv_lugar_exp_id, supervisor_cargo)
         VALUES(:nombre, :nit, :email, :telefono, :direccion, :tipo_empresa, :naturaleza_juridica, :actividad_economica,
         :r_legal_nombres, :r_legal_apellidos, :r_legal_identificacion, :r_legal_lugar_exp_id, :superv_nombres, :superv_apellidos, :superv_identificacion, :superv_lugar_exp_id, :supervisor_cargo)'
        );
        try {
            $query->execute([
                'nombre' => $nombre,
                'nit' => $nit,
                'email' => $email,
                'telefono' => $telefono,
                'direccion' => $direccion,
                'tipo_empresa' => $tipo_empresa,
                'naturaleza_juridica' => $naturaleza_juridica,
                'actividad_economica' => $actividad_economica,
                'r_legal_nombres' => $r_legal_nombres,
                'r_legal_apellidos' => $r_legal_apellidos,
                'r_legal_identificacion' => $r_legal_identificacion,
                'r_legal_lugar_exp_id' => $r_legal_lugar_exp_id,
                'superv_nombres' => $superv_nombres,
                'superv_apellidos' => $superv_apellidos,
                'superv_identificacion' => $superv_identificacion,
                'superv_lugar_exp_id' => $superv_lugar_exp_id,
                'supervisor_cargo' => $supervisor_cargo
            ]); 
            
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function obtenerUltimoId(){
        $id="";
        $query = $this->db->connect()->prepare('SELECT MAX(id) AS id FROM empresa');
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

    public function obtenerPorId($id){
        $item = new Empresa();
        $query = $this->db->connect()->prepare("SELECT * FROM empresa WHERE id = :id");
        try{
            $query->execute(['id' => $id]);

            while($row = $query->fetch()){
                $item->id = $row['id'];
                $item->nombre = $row['nombre'];
                $item->nit = $row['nit'];
                $item->email = $row['email'];
                $item->telefono = $row['telefono'];
                $item->direccion = $row['direccion'];
                $item->tipo_empresa = $row['tipo_empresa'];
                $item->naturaleza_juridica = $row['naturaleza_juridica'];
                $item->actividad_economica = $row['actividad_economica'];
                $item->r_legal_nombres = $row['r_legal_nombres'];
                $item->r_legal_apellidos = $row['r_legal_apellidos'];
                $item->r_legal_identificacion = $row['r_legal_identificacion'];
                $item->r_legal_lugar_exp_id = $row['r_legal_lugar_exp_id'];
                $item->superv_nombres = $row['superv_nombres'];
                $item->superv_apellidos = $row['superv_apellidos'];
                $item->superv_identificacion = $row['superv_identificacion'];
                $item->superv_lugar_exp_id = $row['superv_lugar_exp_id'];
                $item->supervisor_cargo = $row['supervisor_cargo'];
            }
            return $item;
        }catch(PDOException $e){
            return null;
        }
    }
    public function actualizar($empresa)
    {
        $query = $this->db->connect()->prepare("UPDATE empresa SET nombre = :nombre, nit = :nit, email = :email, telefono = :telefono,
        direccion = :direccion, tipo_empresa = :tipo_empresa, naturaleza_juridica = :naturaleza_juridica, actividad_economica = :actividad_economica, 
        r_legal_nombres = :r_legal_nombres, r_legal_apellidos = :r_legal_apellidos, r_legal_identificacion = :r_legal_identificacion, r_legal_lugar_exp_id = :r_legal_lugar_exp_id,
        superv_nombres = :superv_nombres, superv_apellidos = :superv_apellidos, superv_identificacion = :superv_identificacion, superv_lugar_exp_id = :superv_lugar_exp_id, supervisor_cargo = :supervisor_cargo WHERE id = :id_empresa");
        try{
            $query->execute([
                'id_empresa' => $empresa->id,
                'nombre' => $empresa->nombre,
                'nit' =>  $empresa->nit,
                'email' =>  $empresa->email,
                'telefono' =>  $empresa->telefono,
                'direccion' =>  $empresa->direccion,
                'tipo_empresa' =>  $empresa->tipo_empresa,
                'naturaleza_juridica' =>  $empresa->naturaleza_juridica,
                'actividad_economica' =>  $empresa->actividad_economica,
                'r_legal_nombres' =>  $empresa->r_legal_nombres,
                'r_legal_apellidos' => $empresa->r_legal_apellidos,
                'r_legal_identificacion' => $empresa->r_legal_identificacion,
                'r_legal_lugar_exp_id' => $empresa->r_legal_lugar_exp_id,
                'superv_nombres' =>  $empresa->superv_nombres,
                'superv_apellidos' =>  $empresa->superv_apellidos,
                'superv_identificacion' =>  $empresa->superv_identificacion,
                'superv_lugar_exp_id' =>  $empresa->superv_lugar_exp_id,
                'supervisor_cargo' =>  $empresa->supervisor_cargo
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

}
