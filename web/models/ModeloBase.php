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
        
       // var_dump($query);
        if ($query && $query->num_rows !=0)
        {
            while ($filas= $query->fetch_assoc()){
                $this->datos[] = $filas;                
            }
        }else {
            echo " No se puede realizar la consulta <br>";
            if ( $query->num_rows ===0)
            {
                echo "<h1>Tabla Vacia.<h1>";
            }
            exit;
        }
        return $this->datos;
       
    }
               

 }//fin clase

