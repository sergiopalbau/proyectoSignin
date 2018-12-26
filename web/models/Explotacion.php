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
    
    function add () {
        $sql = "INSERT INTO explotacion VALUES ('{$this->id}','{$this->municipio}')";
        $this->db->query($sql);
        echo $sql;
    }

}// fin clase