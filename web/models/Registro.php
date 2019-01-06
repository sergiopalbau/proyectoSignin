<?php
//
require_once 'ModeloBase.php';
class Registro extends ModeloBase {

    private $id_registro;
    private $id_explotacion3;
    private $id_instalacion2;
    private $fecha; 
    private $hora_inicio;
    private $hora_fin;
    private $nombre_visita;
    private $dni_visita;
    private $id_usuario;
    private $observaciones;
    private $firma;
    private $condiciones;
    private $prl;
   
    //-----------------------------
    public  $instalaciones = array();
    public $usuarios= array();

    

    public function __construct() {
        parent::__construct();
    }
    
    function setId_registro ($id){
       $this->id_registro = $id;

    }

    function inicializa () {
         $this->instalaciones= $this->conseguirTodos('instalacion');
         $this->usuarios= $this->conseguirTodos('usuario');
         unset($this->datos);
        
       
    }



    
    /**
     * obtiene de la bbdd el id marcado, devuelve  un array con los datos del mismo.
     * @return array()
     */
    public function conseguirId (){
        $query = $this->db->query ("SELECT * FROM registro WHERE id_registro = '{$this->id_registro}'");
        if ($query->num_rows === 1)
        {
            $this->datos= $query->fetch_assoc();
            
        }
        return $this->datos;
    }

    public function conseguirExplotacion (){
         unset($this->datos);
        $query = $this->db->query ("SELECT * FROM registro WHERE id_explotacion3 = '{$_SESSION['explotacion']}'");
        if ($query->num_rows >0)
        {
            while ($row = $query->fetch_assoc() )
            $this->datos [] =$row; 
            
        }
        return $this->datos;
    }

     public function conseguirExplotacionFecha ($inicio, $fin){
        unset($this->datos);
        $query = $this->db->query ("SELECT * FROM registro WHERE (id_explotacion3 = '{$_SESSION['explotacion']}') AND (fecha BETWEEN '{$inicio}' AND '{$fin}')");
        if ($query->num_rows >0)
        {
            while ($row = $query->fetch_assoc() )
            $this->datos [] =$row; 
            
        }
        return $this->datos;
    }


     public function conseguirFecha ($inicio, $fin){
         unset($this->datos);
        $query = $this->db->query ("SELECT * FROM registro WHERE fecha BETWEEN '{$inicio}' AND '{$fin}'");
        if ($query->num_rows >0)
        {
            while ($row = $query->fetch_assoc() )
            $this->datos [] =$row; 
            
        }
        return $this->datos;
    }   




}// fin clase

