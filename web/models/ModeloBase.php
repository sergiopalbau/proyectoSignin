<?php

require_once 'config/database.php';
class ModeloBase {
    public $db;
    public $datos;
    
    public function __construct() {
        $this->db = database::conectar();
        $this->datos = array();
    }
    public function conseguirTodos($tabla) {
        unset($this->datos);
        $query = $this->db->query ("SELECT * FROM $tabla");
        
      
        if ($query)
        {
            while ($filas= $query->fetch_assoc()){
                $this->datos[] = $filas;                
            }
        }else {
            echo " No se puede realizar la consulta <br>";
            var_dump($query);
            exit;
        }
        return $this->datos;
       
    }
               

 }//fin clase

