<?php

require_once 'ModeloBase.php';
class Acceso extends ModeloBase {

    private $id_acceso;
    private $id_rol3;
    private $nombre;
    private $password;
    private $email;
    private $telefono;
    private $id_explotacion3;
    //-----------------------------
    public  $explotaciones = array();
    public $roles = array ();

    
   // '{$this->id_acceso}', '{$this->id_rol3}', '{$this->nombre}', '{$this->password}', '{$this->email}', '{$this->telefono}', '{$this->id_explotacion3}'
    public function __construct() {
        parent::__construct();
            
    }
    
    function getId_acceso() {
        return $this->id_acceso;
    }

    function getId_rol3() {
        return $this->id_rol3;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getId_explotacion3() {
        return $this->id_explotacion3;
    }

    function setId_acceso($id_acceso) {
        $this->id_acceso = $id_acceso;
    }

    function setId_rol3($id_rol3) {
        $this->id_rol3 = $id_rol3;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setId_explotacion3($id_explotacion3) {
        $this->id_explotacion3 = $id_explotacion3;
    }

       /**
     * añade el objeto a la bbdd
     * @return boolean
     */
    function add() {
        $sql = "INSERT INTO acceso VALUES ('{$this->id_acceso}', '{$this->id_rol3}', '{$this->nombre}', '{$this->password}', '{$this->email}', '{$this->telefono}',
    '{$this->id_explotacion3}')";
        $query= $this->db->query($sql);
        return $query;
    }
    /**
     * edit -- Edita el objeto pasado.
     * @return boolean
     */
    function edit ()
    {
        $sql= "UPDATE acceso SET id_acceso = '{$this->id_acceso}' , id_rol3 = '{$this->id_rol3}' , nombre ='{$this->nombre}' , password ='{$this->password}' , email= '{$this->email}', telefono ='{$this->telefono}', id_explotacion3 = '{$this->id_explotacion3}' WHERE id_acceso = '{$this->id_acceso}'";
        
        echo  $sql;
       
        $query=$this->db->query($sql);
       
        return $query;
    }

    /**
     * borra el elemento objeto.
     * @return boolean
     */
    function delete (){
        $sql= "DELETE FROM acceso WHERE id_acceso = '{$this->id_acceso}'";
        $query=$this->db->query($sql);
        echo  $sql;
        return $query;
    }
    
    /**
     * obtiene de la bbdd el id marcado, devuelve  un array con los datos del mismo.
     * @return array()
     */
    public function conseguirId (){
        $query = $this->db->query ("SELECT * FROM acceso WHERE id_acceso = '{$this->id_acceso}'");
        if ($query->num_rows === 1)
        {
            $this->datos= $query->fetch_assoc();
            
        }
        return $this->datos;
    }

}// fin clase

