<?php 

    
    $url = "http://localhost/proyectoSignin/web/index.php";
    $url2 = "http://localhost/proyectoSignin/web/sadmin.php";

    class loginController {
      public function consultarIndex ($email, $pwd){
          $url = "http://localhost/proyectoSignin/web/index.php";
          $url2 = "http://localhost/proyectoSignin/web/sadmin.php";
          include_once 'models/login.php';
          $sql = "SELECT * FROM acceso WHERE email = '$email' AND password = '$pwd'";
          $login = new Login();
          $resultado = $login->db->query($sql);
          
          if ($resultado->num_rows === 1) {
             $datos = $resultado->fetch_assoc();
             if ($datos['id_rol3'] == 0){
                 $_SESSION['rol'] = "superAdmin"; 
             } elseif ($datos['id_rol3'] == 1) {
                 $_SESSION['rol'] = "admin";
             } elseif ($datos['id_rol3'] == 2){
              $_SESSION['msg'] = "usuario sin acceso a la web";
              $cad = 'Location: '. base_url . 'sadmin.php/?controller=Logout&action=logout';
              echo $cad;
              var_dump($_SESSION);
              $login->db->close();
             header ("location:". base_url);
             exit;

 
             }
                  $_SESSION['msg'] = "";
                 $_SESSION['login']= true;
                 $_SESSION['nombre'] = $datos['nombre'];
                 $_SESSION['explotacion'] = $datos['id_explotacion3'];
                 
             header("Location: $url2"."/?controller=Login&action=index");
           }else{
              $_SESSION['msg'] = "Credenciales no validos.";
              echo $url;
               header("location: $url");
          }
          
      }

      public function index (){
          require 'views/inicio/index.phtml';
      }       
      
      public function acceso ()
      {
          
           if ($_POST){
                var_dump($_POST);

                if(isset($_POST['email'])&& isset($_POST['pass']) && isset($_POST['acceder'])){

                    $consulta = new loginController ();
                    $consulta->consultarIndex($_POST['email'], $_POST['pass']);
                }else{
                    echo " no llega post que tocan";
                    var_dump($_POST);
                    header("Refresh: 5; $url");
                    }
                }else {
                    if (!isset($_SESSION['login']))
                {
                    echo " Sin post";
                    header("Refresh: 5; $url");
                }

            }
          
      }
       
               
     
        
        
    }//fin class
  
   