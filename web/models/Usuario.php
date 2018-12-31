<?php
require_once 'ModeloBase.php';
class Usuario extends ModeloBase {

    private $id_usuario;
    private $id_explotacion2;
    private $nombre;
  
    
     public function __construct() {
        parent::__construct();
            
    }
    
    function getId_usuario() {
        return $this->id_usuario;
    }

    function getId_explotacion2() {
        return $this->id_explotacion2;
    }

    function getNnombre (){
        return $this->nombre;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setId_explotacion2($id_explotacion2) {
        $this->id_explotacion2 = $id_explotacion2;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    /**
     * añade el objeto a la bbdd
     * @return boolean
     */
    function add() {

        $sql = "INSERT INTO usuario VALUES ('{$this->id_usuario}','{$this->id_explotacion2}','{$this->nombre}')";
        echo $sql;
        $query= $this->db->query($sql);
        var_dump($this->db);
        return $query;
    }
    /**
     * edit -- Edita el objeto pasado.
     * @return boolean
     */
    function edit ()
    {
        $sql= "UPDATE usuario SET id_usuario = '{$this->id_usuario}', nombre = '{$this->nombre}', id_explotacion2 = '{$this->id_explotacion2}' WHERE id_usuario = '{$this->id_usuario}'";
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
        $sql= "DELETE FROM usuario WHERE id_usuario = '{$this->id_usuario}'";
        $query=$this->db->query($sql);
        echo  $sql;
        return $query;
    }
    
    /**
     * obtiene de la bbdd el id marcado, devuelve  un array con los datos del mismo.
     * @return array()
     */
    public function conseguirId (){
        $query = $this->db->query ("SELECT * FROM usuario WHERE id_usuario = '{$this->id_usuario}'");
        if ($query->num_rows === 1)
        {
            $this->datos= $query->fetch_assoc();
            
        }
        return $this->datos;
    }

}// fin clase