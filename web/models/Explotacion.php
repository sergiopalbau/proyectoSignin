<?php
require_once 'ModeloBase.php';
class Explotacion extends ModeloBase {

    private $id;
    private $municipio;
    private $idAntigua; 
    
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
    function setIdAntigua ($id){
        $this->id = $id;

    }

    function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }
    /**
     * añade el objeto a la bbdd
     * @return boolean
     */
    function add() {
        $sql = "INSERT INTO explotacion VALUES ('{$this->id}','{$this->municipio}')";
        $query= $this->db->query($sql);
        return $query;
    }
    /**
     * edit -- Edita el objeto pasado.
     * @return boolean
     */
    function edit ()
    {
        $sql= "UPDATE explotacion SET id_explotacion = '{$this->id}', municipio = '{$this->municipio}' WHERE id_explotacion = '{$this->idAntigua}'";
        $query=$this->db->query($sql);
        echo  $sql;
        return $query;
    }
    /**
     * borra el elemento objeto.
     * @return boolean
     */
    function delete (){
        $sql= "DELETE FROM explotacion WHERE id_explotacion = '{$this->id}'";
        $query=$this->db->query($sql);
        echo  $sql;
        return $query;
    }
    
    /**
     * obtiene de la bbdd el id marcado, devuelve  un array con los datos del mismo.
     * @return array()
     */
    public function conseguirId (){
        $query = $this->db->query ("SELECT * FROM explotacion WHERE id_explotacion = '{$this->id}'");
        if ($query->num_rows === 1)
        {
            $this->datos= $query->fetch_assoc();
            
        }
        return $this->datos;
    }

}// fin clase