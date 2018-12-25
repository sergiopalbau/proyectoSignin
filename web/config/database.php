<?php

 class database {
     public static function conectar () {
         $conexion = new mysqli ("localhost", "root", "","signin");
         $conexion->query("SET NAMES 'utf8'");
         if ($conexion->connect_errno) {
            echo "Lo sentimos, este sitio web está experimentando problemas.";
            echo "Error: Fallo al conectarse a MySQL debido a: \n";
            echo "Errno: " . $conexion->connect_errno . "\n";
            echo "Error: " . $conexion->connect_error . "\n";
            exit;
        }
         return $conexion;
     }
 }
