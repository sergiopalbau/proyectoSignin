<?php

/*
 $this->set () = $_POST['nombre'];
                
                $this->set () = $_POST['password'];
                $this->set () = $_POST['email'];
                $this->set () = $_POST['telefono'];
                $this->set () = $_POST['explotacion'];
                $this->set () = $_POST['rol'];
                */

class AccesoController {
    function recuperaReferencias () {
        include_once 'models/Acceso.php';
        $consulta = new Acceso();
        $this->explotaciones = $consulta->conseguirTodos('explotacion');
        $this->roles= $consulta->conseguirTodos('rol');
        

    }    

     // metodo por defecto, muestra una tabla con todos los valores de la bbdd
    function index () {
       require 'models/Acceso.php';
        
        $acceso = new Acceso();
        $datos =$acceso->conseguirTodos ('acceso');
        $roles = $acceso->conseguirTodos ('rol');
        $acceso->db->close();     
        require_once 'views/acceso/index.phtml';
       
        
    }
    
    function nuevo () {
        require 'models/Acceso.php';
        $acceso = new Acceso();
        $explotaciones =$acceso->conseguirTodos ('explotacion');
        $roles = $acceso->conseguirTodos ('rol');
        $acceso->db->close();    
        // var_dump($explotaciones);
        // var_dump($roles);
        require_once 'views/acceso/nuevo.phtml';
    }

    function add () {
    
        if ($_POST){
            //var_dump($_POST);
            echo "<br><hr><br>";
            include_once 'models/Acceso.php';
            if (isset($_POST['nombre'])  && isset ($_POST['password']) && isset ($_POST['email']) && isset ($_POST['telefono']) && isset ($_POST['explotacion']) && isset ($_POST['rol']) ){
                    $acceso = new Acceso ();

                    $acceso->setNombre ($_POST['nombre']);
                    $acceso->setPassword ($_POST['password']);
                    $acceso->setEmail ($_POST['email']);
                    $acceso->setTelefono ($_POST['telefono']);
                    $acceso->setId_explotacion3 ($_POST['explotacion']);
                    $acceso->setId_rol3 ($_POST['rol']);
                        
                    //var_dump($acceso);
                    $consulta = $acceso->add();
                    if ($consulta){
                        header ("location: ?controller=Acceso&action=index");
                    }else{
                        echo "<a href='?controller=Acceso&action=index'>[ VOLVER ] </a>";
                        Echo "<br> <h1> No se pudo completar la operacion.</h1>";
                        echo "<h2>" . $acceso->db->error . "</h2>";
                        var_dump($acceso->db);
                    }
                    $acceso->db->close();
             }else {
                echo "no hay envio post, nada que hacer";
                exit;
            }
        }
    }
    
    // abrir ventana editar...
    function ver () {
        if ( (($_SESSION['rol'] == 'superAdmin') || ($_SESSION['rol'] == 'Admin')) && isset($_GET['dato']) ){
            include_once 'models/Acceso.php';
            $acceso = new Acceso;   
            $acceso->setId_acceso ($_GET['dato']);
            $consulta= $acceso->conseguirId();
            $roles = $acceso->conseguirTodos ('rol');

            require_once 'views/acceso/ver.phtml';
        }else{
            Echo "No tiene suficientes privilegios para llevar a cabo esta operacion";
        }
        
    }
    // // llamada a model edit
    // function see (){
    //     if ($_POST){
    //         var_dump ($_POST);
    //         include_once 'models/Acceso.php';
    //         $acceso = new Acceso;   
    //         $acceso->setId_acceso ($_POST['id_explotacion']);
    //         $acceso->setMunicipio($_POST['municipio']);
    //         if ($acceso->edit()){
    //             header ("location: ?controller=explotacion&action=index");
    //         }else{
    //             echo "no se pudo completar la operacion.";
    //             header ("Refresh:5; url=?controller=explotacion&action=index");
    //         }
    //     }else {
    //         echo "Faltan datos.";
    //     }
        
        
    // }

    // abrir ventana editar...
    function editar () {
        if ( (($_SESSION['rol'] == 'superAdmin') || ($_SESSION['rol'] == 'Admin')) && isset($_GET['dato']) ){
            include_once 'models/Acceso.php';
            $acceso = new Acceso;   
            $acceso->setId_acceso ($_GET['dato']);
            $consulta= $acceso->conseguirId();

            $explotaciones =$acceso->conseguirTodos ('explotacion');
            $roles = $acceso->conseguirTodos ('rol');

            require_once 'views/acceso/editar.phtml';
        }else{
            Echo "No tiene suficientes privilegios para llevar a cabo esta operacion";
        }
        
    }


    // llamada a model edit
    function edit (){
        if ($_POST){
            var_dump ($_POST);
          
            include_once 'models/Acceso.php';
            
            $acceso = new Acceso ();
            $acceso->setId_acceso ($_POST['id_acceso']);
            $acceso->setNombre ($_POST['nombre']);
            $acceso->setPassword ($_POST['password']);
            $acceso->setEmail ($_POST['email']);
            $acceso->setTelefono ($_POST['telefono']);
            $acceso->setId_explotacion3 ($_POST['explotacion']);
            $acceso->setId_rol3 ($_POST['rol']);
                
            if ($acceso->edit()){
                header ("location: ?controller=Acceso&action=index");
            }else{
                echo "no se pudo completar la operacion.";
                header ("Refresh:5; url=?controller=Acceso&action=index");
            }
        }else {
            echo "Faltan datos.";
        }
        
        
    }
    
    function eliminar () {
        if ( (($_SESSION['rol'] == 'superAdmin') || ($_SESSION['rol'] == 'Admin')) && isset($_GET['dato']) ){
           include_once 'models/Acceso.php';
            $acceso = new Acceso;   
            $acceso->setId_acceso ($_GET['dato']);
            $consulta= $acceso->conseguirId();

            $explotaciones =$acceso->conseguirTodos ('explotacion');
            $roles = $acceso->conseguirTodos ('rol');
              require_once 'views/acceso/eliminar.phtml';
        }else{
            Echo "No tiene suficientes privilegios para llevar a cabo esta operacion";
        }
        
    }
    
    function delete () {
        if ($_POST){
            include_once 'models/Acceso.php';
            $acceso = new Acceso;   
            $acceso->setId_acceso ($_POST['id_acceso']);
         
            if ($acceso->delete()){
                        header ("location: ?controller=Acceso&action=index");
             }else {
                Echo "no se pudo eliminar";

                ecit;
             }
        }else {
            echo "Faltan datos.";
        }
    }
} //fin class

