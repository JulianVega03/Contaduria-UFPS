<?php
include_once 'controllers/userSession.php';
include_once 'models/userModel.php';
class View{

    private $user;
    public $userSession;

    function __construct(){
        $this->userSession = new UserSession();
        $this->userSession->startSession();
        $this->user = new User();
    }

    function render($nombre){

        $vista = "";

        if(isset($_SESSION['user'])){
           
            $vista = 'views/administrador/'.$nombre.'.php';

            if(!file_exists($vista)){
                $vista = 'views/administrador/home/index.php';
            }
            
        }else{
            $vista = 'views/'.$nombre.'.php';

            if(!file_exists($vista)){
                $vista = 'views/errores/index.php';
            }
           
        }

        require  $vista;
            
    }
}
