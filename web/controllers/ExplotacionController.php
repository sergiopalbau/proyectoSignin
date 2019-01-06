<?php

class ExplotacionController {
        
    // metodo por defecto, muestra una tabla con todos los valores de la bbdd
    function index () {
        
        require 'models/Explotacion.php';
        
        $explotacion = new Explotacion();
        if ($_SESSION['rol']=='superAdmin') {
             $datos =$explotacion->conseguirTodos ('explotacion');
        }else {
            $explotacion->setId("{$_SESSION['explotacion']}");
            $datos[] = $explotacion->conseguirId ();
            // var_dump($datos);
            // exit;
        }
        
        require_once 'views/explotacion/index.phtml';
        
        
    }
    
    function nuevo () {
       require_once 'views/explotacion/nuevo.phtml';
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
                        header ("location: ?controller=Explotacion&action=index");
                    }
             }else {
                echo "no hay envio post, nada que hacer";
                exit;
            }
        }
    }
    
    // abrir ventana editar...
    function nuevoeditar () {
        if ( isset($_GET['dato']) ){
            include_once 'models/Explotacion.php';
            if ($_SESSION['rol']== 'admin'){
                header ("location: ?controller=Explotacion&action=index");
            }
            $explotacion = new Explotacion;   
            $explotacion->setId ($_GET['dato']);
            $consulta= $explotacion->conseguirId();
            require_once 'views/explotacion/nuevo.phtml';
        }else{
            Echo "No tiene suficientes privilegios para llevar a cabo esta operacion";
        }
        
    }
    // llamada a model edit
    function edit (){
        if ($_POST){
            var_dump ($_POST);

            include_once 'models/Explotacion.php';
            $explotacion = new Explotacion; 
            $explotacion->setId ($_POST['id_explotacion']);
            $explotacion->setMunicipio($_POST['municipio']);
            $explotacion->setIdAntigua($_POST['idAntigua']);
            //var_dump($explotacion);exit;
            if ($explotacion->edit()){
                
                header ("location: ?controller=Explotacion&action=index");
            }else{
                echo "no se pudo completar la operacion.";
                header ("Refresh:5; url=?controller=Explotacion&action=index");
            }
        }else {
            echo "Faltan datos.";
        }
        
        
    }
    
    function eliminar () {
        if ($_SESSION['rol'] =='admin'){
                //si alguin intenta entrar por parametros al id de un superAdmin le mandamos al index
                
                    header ("location: ?controller=Explotacion&action=index");
                    echo "donde vas pajaro??";
                    exit;
                }
        if ( isset($_GET['dato']) ){
            include_once 'models/Explotacion.php';
            $explotacion = new Explotacion;   
            $explotacion->setId ($_GET['dato']);
            $consulta= $explotacion->conseguirId();
              require_once 'views/explotacion/eliminar.phtml';
        }else{
            Echo "No tiene suficientes privilegios para llevar a cabo esta operacion";
        }
        
    }
    
    function delete () {
        if ($_POST){
            var_dump ($_POST);
            include_once 'models/Explotacion.php';
            $explotacion = new Explotacion;   
            $explotacion->setId ($_POST['id_explotacion']);
            $explotacion->setMunicipio($_POST['municipio']);
            if ($explotacion->delete()){
                        header ("location: ?controller=Explotacion&action=index");
                    }
        }else {
            echo "Faltan datos.";
        }
    }
} //fin class

