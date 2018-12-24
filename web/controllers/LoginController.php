<?php

    class loginController {
        
        private $usuario;
        private $password;
     
        function comprueba (){
            if (isset ($_POST)){
               require "views/layaout/header.php";
               require "views/layaout/footer.php";
            }else{
                header('index.php');
            }
        }
               
        
        
        
    }
