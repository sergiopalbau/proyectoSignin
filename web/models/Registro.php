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
    public  $explotaciones = array();
    public $usuarios= array();

    

    public function __construct() {
        parent::__construct();
            
    }
    
    function setId_registro ($id){
       $this->id_registro = $id;

    }

        /**
     * edit -- Edita el objeto pasado.
     * @return boolean
     */
   
   function conseguirFecha (){

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

}// fin clase

