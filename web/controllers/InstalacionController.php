<?php

class InstalacionController {
        
    // metodo por defecto, muestra una tabla con todos los valores de la bbdd
    function index () {
        
        require 'models/Instalacion.php';
        
        $instalacion = new Instalacion();
        if ($_SESSION['rol']=='superAdmin') {
            $datos =$instalacion->conseguirTodos ('instalacion');
         }else {
            
            $datos = $instalacion->conseguirExplotacion ($_SESSION['explotacion']);
            //var_dump($datos);
            // exit;
        }
        
        require_once 'views/instalacion/index2.phtml';
        
        
    }
    
    function nuevo () {
       require 'models/Instalacion.php';
       $instalacion = new Instalacion();
       $explotaciones =$instalacion->conseguirTodos ('explotacion');
       require_once 'views/instalacion/nuevo.phtml';

    }

    function add () {
    
        if ($_POST){
           
            include_once 'models/Instalacion.php';
            if (isset($_POST['nombre']) && isset ($_POST['explotacion'])){

                    $instalacion = new Instalacion;
                    $instalacion->setInstalacion ($_POST['nombre']);
                    $instalacion->setId_explotacion($_POST['explotacion']);
                    
                    if ($instalacion->add()){
                        header ("location: ?controller=instalacion&action=index");
                    }
             }else {
                echo "no hay envio post, nada que hacer";
                exit;
            }
        }
    }
    
    // abrir ventana editar...
    function editar () {
    	
        if (isset($_GET['dato']) ){
            include_once 'models/Instalacion.php';
            $instalacion = new Instalacion;   
            $instalacion->setId ($_GET['dato']);
            $consulta= $instalacion->conseguirId();
            if ($_SESSION['rol'] =='superAdmin'){
                $explotaciones =$instalacion->conseguirTodos ('explotacion');
            }else{
                $explotaciones =$instalacion->conseguirTodos ('explotacion');
                var_dump($explotaciones);
                exit;
            }
            
            require_once 'views/instalacion/nuevo.phtml';
        }else{
            Echo "No tiene suficientes privilegios para llevar a cabo esta operacion";
        }
        
    }
    // llamada a model edit
    function edit (){
        if ($_POST){
            var_dump ($_POST);
            include_once 'models/Instalacion.php';
            $instalacion = new Instalacion;   
            $instalacion->setId ($_POST['id_instalacion']);
            $instalacion->setInstalacion($_POST['nombre']);
            $instalacion->setId_explotacion($_POST['explotacion']);
            if ($instalacion->edit()){
                header ("location: ?controller=instalacion&action=index");
            }else{
                echo "no se pudo completar la operacion.";
                header ("Refresh:5; url=?controller=instalacion&action=index");
            }
        }else {
            echo "Faltan datos.";
        }
        
        
    }
    
    function eliminar () {
        if ( isset($_GET['dato']) ){
            include_once 'models/Instalacion.php';
            $instalacion = new Instalacion;   
            $instalacion->setId ($_GET['dato']);
            $consulta= $instalacion->conseguirId();
            $explotaciones =$instalacion->conseguirTodos ('explotacion');
              require_once 'views/instalacion/eliminar.phtml';
        }else{
            Echo "No tiene suficientes privilegios para llevar a cabo esta operacion";
        }
        
    }
    
    function delete () {
        if ($_POST){
            var_dump ($_POST);
            include_once 'models/Instalacion.php';
            $instalacion = new Instalacion;   
            $instalacion->setId ($_POST['id_instalacion']);
            if ($instalacion->delete()){
                        header ("location: ?controller=instalacion&action=index");
                    }
        }else {
            echo "Faltan datos.";
        }
    }
} //fin class

