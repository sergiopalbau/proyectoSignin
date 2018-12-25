<?php

class logoutController{
     public function logout (){
        echo "Sesion cerrada.";
        session_destroy();
        header ("Location:".base_url);
    }
}// fin de class

