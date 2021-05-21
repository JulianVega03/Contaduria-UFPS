<?php

include_once 'userSession.php';
include_once 'models/userModel.php';

class UserController extends Controller
{
    private $userSession;
    private $user;

    function __construct()
    {
        parent::__construct();
    }


    function render()
    {
        $this->view->render('login/index');
    }


    function login()
    {
        $userSession = new UserSession();
        $user = new userModel();

        if (isset($_POST['username']) && isset($_POST['password'])) {

            $userForm = $_POST['username'];
            $passForm = $_POST['password'];

            if ($user->userExists($userForm, $passForm)) {
                $userSession->setCurrentUser($userForm);
                $user->setUser($userForm);
                header("Location:".constant('URL')."home");
               // include_once 'views/administrador/home/index.php';
            } else {
                $errorLogin = "Nombre de usuario y/o password es incorrecto";
                include_once 'views/login/index.php';
            }
        }
    }


    function logout()
    {
        $userSession = new UserSession();
        $userSession->closeSession();

        header("location:" . constant('URL') . "userController");
    }
}
