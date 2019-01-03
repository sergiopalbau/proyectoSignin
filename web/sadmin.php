<?php 
    session_start();
    require_once 'config/parameters.php';
    require_once 'autoload.php';
    // comprobamos que se ha logeado y no esta intentando entrar por otro lado.
    /*if (!isset($_SESSION['login']) || !$_SESSION['login']){
        echo " <h1>Espacio reservado a usuarios LOGEADOS, ingrese por favor...</h1>" ;
        header ("refresh: 5; index.php");
        exit;
    }*/
    /*prueba git */
    if (isset($_GET['controller']))
    {
        if (!isset ($_SESSION['login']) && ($_GET['controller'] !='Login')){
            $_SESSION['msg']='Espacio Reservado, ingrese credenciales';
             header ("location:". base_url);
        }

        $nombre_controlador = $_GET ['controller'].'Controller';
    }else{
        echo " Lo que buscas no se encuentra aqui!!!";
        exit();
    }
    
    if (class_exists ($nombre_controlador)){
        $controlador = new $nombre_controlador();
        
        if (isset ($_GET['action']) && method_exists($controlador, $_GET['action'])){
            $action = $_GET['action'];
            $controlador->$action();
        }else {
            echo "La clase que buscas no existe";
            exit;
        }
    }else {
        echo "La pagina que buscas no existe";
        exit;
    }


