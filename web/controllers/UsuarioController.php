<?php

class UsuarioController {
        
    // metodo por defecto, muestra una tabla con todos los valores de la bbdd
    function index () {
        
        require 'models/Usuario.php';
        $usuario = new Usuario;
        $datos =$usuario->conseguirTodos ('usuario');
        
         require_once 'views/usuario/index.phtml'
        ;
        
        
    }
    
    function nuevo () {
       require 'models/Usuario.php';
       $usuario = new Usuario;
       $explotaciones =$usuario->conseguirTodos ('explotacion');
       require_once 'views/usuario/nuevo.phtml';

    }

    function add () {
    
        if ($_POST){
           
            include_once 'models/Usuario.php';
            if (isset($_POST['nombre']) && isset ($_POST['explotacion'])){
                    var_dump($_POST);
                    $usuario = new Usuario;
                    $usuario->setNombre ($_POST['nombre']);
                    $usuario->setId_explotacion2($_POST['explotacion']);
                    
                    if ($usuario->add()){
                        header ("location: ?controller=Usuario&action=index");
                    }else{
                        Echo "no se pudo completar.";
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
            include_once 'models/Usuario.php';
            $usuario = new Usuario;   
            $usuario->setId_usuario ($_GET['dato']);
            $consulta= $usuario->conseguirId();
            $explotaciones =$usuario->conseguirTodos ('explotacion');
            require_once 'views/usuario/nuevo.phtml';
        }else{
            Echo "No tiene suficientes privilegios para llevar a cabo esta operacion";
        }
        
    }
    // llamada a model edit
    function edit (){
        if ($_POST){
            var_dump ($_POST);
            include_once 'models/Usuario.php';
            $usuario = new Usuario;   
            $usuario->setId_usuario ($_POST['id_instalacion']);
            $usuario->setId_explotacion2($_POST['explotacion']);
            $usuario->setNombre($_POST['nombre']);
            if ($usuario->edit()){
                header ("location: ?controller=usuario&action=index");
            }else{
                echo "no se pudo completar la operacion.";
                header ("Refresh:5; url=?controller=usuario&action=index");
            }
        }else {
            echo "Faltan datos.";
        }
        
        
    }
    
    function eliminar () {
        if ( isset($_GET['dato']) ){
            include_once 'models/Usuario.php';
            $usuario = new Usuario;   
            $usuario->setId_usuario ($_GET['dato']);
            $consulta= $usuario->conseguirId();
            $explotaciones =$usuario->conseguirTodos ('explotacion');
              require_once 'views/usuario/eliminar.phtml';
        }else{
            Echo "No tiene suficientes privilegios para llevar a cabo esta operacion";
        }
        
    }
    
    function delete () {
        if ($_POST){
            var_dump ($_POST);
            include_once 'models/Usuario.php';
            $usuario = new Usuario;   
            $usuario->setId_usuario ($_POST['id_instalacion']);
            if ($usuario->delete()){
                        header ("location: ?controller=usuario&action=index");
                    }
        }else {
            echo "Faltan datos.";
        }
    }
} //fin class

