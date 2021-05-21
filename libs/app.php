<?php
require_once 'controllers/errores.php';
class App
{

    function __construct()
    {
        $url = isset($_GET['view']) ? $_GET['view'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        //cuando se ingresa sin indicar controlador
        if (empty($url[0])) {
            $archivoController = 'controllers/inicio.php';
            require_once $archivoController;
            $controller = new Inicio();
            $controller->loadModel('inicio');
            $controller->render();
        }else{
            $archivoController = 'controllers/' . $url[0] . '.php';

            if (file_exists($archivoController)) {
                require_once $archivoController;
    
                $controller = new $url[0];
                $controller->loadModel($url[0]);
    
                $nparam = sizeof($url);
    
                if ($nparam > 1) {
                    if ($nparam > 2) {
                        $param = [];
                        for ($i = 2; $i < $nparam; $i++) {
                            array_push($param, $url[$i]);
                        }
                        $controller->{$url[1]}($param);
                    } else {
                        $controller->{$url[1]}();
                    }
                } else {
                    $controller->render();
                }
            } else {
                $controller = new Errores();
            }
        }
        
    }
}
