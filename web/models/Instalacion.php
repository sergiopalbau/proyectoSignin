<?php
require_once 'ModeloBase.php';
class Instalacion extends ModeloBase {

    private $id;
    private $instalacion;
    private $id_explotacion;
  
    
     public function __construct() {
        parent::__construct();
            
    }
    
    function getId() {
        return $this->id;
    }

    function getInstalacion() {
        return $this->instalacion;
    }

    function getId_explotacion (){
        return $this->id_explotacion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setInstalacion($instalacion) {
        $this->instalacion = $instalacion;
    }

    function setId_explotacion ($explotacion)
    {
        $this->id_explotacion = $explotacion;
    }
    /**
     * añade el objeto a la bbdd
     * @return boolean
     */
    function add() {

        $sql = "INSERT INTO instalacion VALUES ('{$this->id}','{$this->instalacion}','{$this->id_explotacion}')";
        echo $sql;
        $query= $this->db->query($sql);
        return $query;
    }
    /**
     * edit -- Edita el objeto pasado.
     * @return boolean
     */
    function edit ()
    {
        $sql= "UPDATE instalacion SET id_instalacion = '{$this->id}', nombre = '{$this->instalacion}', id_explotacion2 = '{$this->id_explotacion}' WHERE id_instalacion = '{$this->id}'";
        echo $sql;
        $query=$this->db->query($sql);
        var_dump($this->db);
        return $query;
    }
    /**
     * borra el elemento objeto.
     * @return boolean
     */
    function delete (){
        $sql= "DELETE FROM instalacion WHERE id_instalacion = '{$this->id}'";
        $query=$this->db->query($sql);
        echo  $sql;
        return $query;
    }
    
    /**
     * obtiene de la bbdd el id marcado, devuelve  un array con los datos del mismo.
     * @return array()
     */
    public function conseguirId (){
        $query = $this->db->query ("SELECT * FROM instalacion WHERE id_instalacion = '{$this->id}'");
        if ($query->num_rows === 1)
        {
            $this->datos= $query->fetch_assoc();
            
        }
        return $this->datos;
    }

}// fin clase