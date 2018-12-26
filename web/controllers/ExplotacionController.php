<?php

class ExplotacionController {
        
    // metodo por defecto, muestra una tabla con todos los valores de la bbdd
    function index () {
        
        require 'models/Explotacion.php';
        
        $explotacion = new Explotacion();
        $datos =$explotacion->conseguirTodos ('explotacion');
        
        require_once 'views/explotacion/index.phtml';
        
        
    }
    
    function add () {
        echo "añadir explotacion";
    }
    
} //fin class

