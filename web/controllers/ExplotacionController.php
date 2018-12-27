<?php

class ExplotacionController {
        
    // metodo por defecto, muestra una tabla con todos los valores de la bbdd
    function index () {
        
        require 'models/Explotacion.php';
        
        $explotacion = new Explotacion();
        $datos =$explotacion->conseguirTodos ('explotacion');
        
        require_once 'views/explotacion/index.phtml';
        
        
    }
    
    function nuevo () {
       require_once 'views/explotacion/add.phtml';
    }

    function add () {
    
        if ($_POST){
            var_dump($_POST);
            include_once 'models/Explotacion.php';
            if (isset($_POST['id_explotacion']) && isset ($_POST['municipio'])){

                    $explotacion = new Explotacion;
                    $explotacion->setId ($_POST['id_explotacion']);
                    $explotacion->setMunicipio($_POST['municipio']);
                    
                    if ($explotacion->add()){

                        header ("location: ?controller=explotacion&action=index");
                    }
                    



            }else {
                echo "no hay envio post, nada que hacer";
                exit;
            }
        }
    }
    
} //fin class

