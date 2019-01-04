<?php 

class RegistroController {

	 // metodo por defecto, muestra una tabla con todos los valores de la bbdd
    function index () {
    	 include_once 'models/Registro.php';
    	$registro = new Registro;
    	$datos = $registro->conseguirTodos ('registro');
    	//var_dump($datos);


    	require_once 'views/Registro/index.phtml';
    }

    function ver () {
    	include_once 'models/Registro.php';
    	$registro = new Registro;
    	$registro->setId_registro($_GET['dato']);
    	$datos = $registro->conseguirId ();
    	//var_dump($datos);
		require_once 'views/Registro/ver.phtml';
    }
}// fin de clase