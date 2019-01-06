<?php 

class RegistroController {

	 // metodo por defecto, muestra una tabla con todos los valores de la bbdd
    function index () {
    	 include_once 'models/Registro.php';
    	$registro = new Registro;
        $registro->inicializa();
        $inst = $registro->conseguirTodos ('instalacion');

        if ($_SESSION['rol'] == 'superAdmin'){
            if (isset($_POST['finicio']) && isset($_POST['ffin'])){
                $datos = $registro->conseguirFecha ($_POST['finicio'],$_POST['ffin']); 
            }else { 
                 $datos = $registro->conseguirTodos ('registro');
            }
           
        }else{
            if (isset($_POST['finicio']) && isset($_POST['ffin'])){
                $datos = $registro->conseguirExplotacionFecha ($_POST['finicio'], $_POST['ffin']);
            }else{
                 $datos = $registro->conseguirExplotacion ();
                 
            }
            
        }
        //------------------------------------------------------------------
        // preparamos el indice. de las instalacioens.
                $indice = array();
               // var_dump($inst);
                foreach ($inst as $dd) {
                  $indice [$dd['id_instalacion']]= $dd['id_explotacion2'] ."-". $dd['nombre'];
                }
                  
        //------------------------------------------------------------------

        	require_once 'views/Registro/index.phtml';
        }
    

    function ver () {
    	include_once 'models/Registro.php';
    	$registro = new Registro;
        $registro->inicializa();
    	$registro->setId_registro($_GET['dato']);
    	$datos = $registro->conseguirId ();
    	$inst = $registro->conseguirTodos ('instalacion');
        $operario=$registro->conseguirTodos('usuario');
        // preparamos el indice. de las instalacioens.
        $indice = array();
        $indOperario = array();

       // var_dump($inst);
        foreach ($inst as $dd) {
          $indice [$dd['id_instalacion']]= $dd['nombre'];
        }

         foreach ($operario as $dd) {
          $indOperario [$dd['id_usuario']]= $dd['nombre'];
        }
        // procesar la img guardada en formato base30
        require_once 'lib/base30_to_jpeg.php';
              
        base30_to_jpeg($datos['firma'], 'assets/firma/tmp.png');






		require_once 'views/Registro/ver.phtml';
    }
}// fin de clase