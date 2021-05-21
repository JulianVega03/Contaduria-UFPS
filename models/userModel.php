<?php
include_once 'entities/user.php';
include_once 'libs/model.php';

class userModel extends Model{

    public $usuario;

    public function __construct(){
        parent::__construct();
        $this->usuario = new User();
    }

    public function userExists($user, $pass){

        $query = $this->db->connect()->prepare('SELECT * FROM usuarios WHERE username = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->db->connect()->prepare('SELECT * FROM usuarios WHERE username = :user');
        $query->execute(['user' => $user]);

        foreach ($query as $currentUser) {
            $this->usuario->id = $currentUser['id'];
            $this->usuario->nombre = $currentUser['nombre'];
            $this->usuario->username = $currentUser['username'];
            $this->usuario->password = $currentUser['password'];
        }
    }

    public function getNombre(){
        return $this->usuario->nombre;
    }

}