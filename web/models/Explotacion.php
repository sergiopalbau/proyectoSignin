<?php
require_once 'ModeloBase.php';
class Explotacion extends ModeloBase {

    private $id;
    private $municipio;
  
    
     public function __construct() {
        parent::__construct();
            
    }
    
    function getId() {
        return $this->id;
    }

    function getMunicipio() {
        return $this->municipio;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }
    
    function add() {
        $sql = "INSERT INTO explotacion VALUES ('{$this->id}','{$this->municipio}')";
        $this->db->query($sql);
        echo $sql;
        return true;
    }
    
    function edit ()
    {
        $sql= "UPDATE explotacion SET id_explotacion = '{$this->id}', municipio = '{$this->municipio}' WHERE id_explotacion = '{$this->id}'";
        $this->db->query($sql);
        echo  $sql;
        return true;
    }
    
    
    public function conseguirId (){
        $query = $this->db->query ("SELECT * FROM explotacion WHERE id_explotacion = '{$this->id}'");
        if ($query->num_rows === 1)
        {
            $this->datos= $query->fetch_assoc();
            
        }
        return $this->datos;
    }

}// fin clase