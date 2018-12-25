<?php 
   // session_start();
    
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
          $login->db->close();
          if ($resultado->num_rows === 1) {
             $datos = $resultado->fetch_assoc();
             if ($datos['id_rol3'] == 0){
                 $_SESSION['rol'] = "superAdmin"; 
             } elseif ($datos['id_rol3'] == 1) {
                 $_SESSION['rol'] = "admin";
             }
                 $_SESSION['login']= true;
                 $_SESSION['nombre'] = $datos['nombre'];
                 $_SESSION['explotacion'] = $datos['explotacion'];
             header("Location: $url2"."/?controller=Login&action=index");
           }else{
              $_SESSION['msg'] = "Credenciales no validos.";
              echo $url;
               header("location: $url");
          }
          
      }

      public function index (){
          require 'views/layaout/header.php';
          require 'views/layaout/footer.php';
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
  
   