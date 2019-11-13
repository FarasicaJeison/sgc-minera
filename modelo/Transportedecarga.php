<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 16/6/2017
 * Time: 16:47
 */

require_once('db_abstract_class.php');

require("../modelo/Puertas.php");

class Transportedecarga extends db_abstract_class
{
    private $cod_trans;
    private $ide_usua;
    private $cod_puer;
    private $nombUsua;
    private $estado;
      

    /**
     * Especialidad constructor.
     * @param $idEspacialidad
     * @param $Nombre
     * @param $Estado
     */
    public function __construct($Transportedecarga_data = array())
    {
        
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Transportedecarga_data)>1){ //
            foreach ($Transportedecarga_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->cod_trans = "";
            $this->ide_usua = "";
            $this->cod_puer = "";
            $this->nombUsua = "";
            $this->estado = "";
                                
        }
    }

    public static function buscarForId($id)
    {   
        $Transportedecarga = new Transportedecarga();
        if ($id > 0){
            $getrow = $Transportedecarga->getRow("SELECT * FROM transportedecarga WHERE cod_trans =?", array($id));
            
            $Transportedecarga->cod_trans = $getrow['cod_trans'];
            $Transportedecarga->ide_usua = $getrow['ide_usua'];
            $Transportedecarga->cod_puer = $getrow['cod_puer'];
            $Transportedecarga->estado = $getrow['estado'];
            $Transportedecarga->Disconnect();
            return $Transportedecarga;
        }else{
            return NULL;
        }
    }

   public static function buscar($query)
    {
        
        $arrayTransportedecarga = array();
        $tmp = new Transportedecarga();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
           
            $Transportedecarga = new Transportedecarga();
            $Transportedecarga->cod_trans = $valor['cod_trans'];
            $Transportedecarga->ide_usua = $valor['ide_usua'];
            $Transportedecarga->cod_puer = $valor['cod_puer'];
            $Transportedecarga->nombUsua = $valor['nombUsua'];
                       
            array_push($arrayTransportedecarga, $Transportedecarga);
                   
        }
        $tmp->Disconnect();
       
       return $arrayTransportedecarga;
    }

    public static function selectUsuario($isRequired=true, $id, $nombre, $class){
        echo Usuario::selectUsuario($isRequired=true, $id, $nombre, $class);
    }

    public static function selectPuerta($isRequired=true, $id, $nombre, $class){
        echo Puertas::selectPuerta($isRequired=true, $id, $nombre, $class);
     }

     static function getAll()
    {
        
        return Transportedecarga::buscar("SELECT nombUsua, cod_trans, tc.ide_usua, cod_puer, tc.estado FROM transportedecarga tc join usuario u on u.ide_usua=tc.ide_usua where tc.estado=1 order by cod_trans desc");
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO sgc_minera.transportedecarga VALUES (NULL, ?, ?, ?)", array(
                $this->usuario,
                $this->puertaInicial,
                $this->estado=1,
                
            )
        );
        $this->Disconnect();
    }

    public function editar()
    {

       $this->updateRow("UPDATE sgc_minera.transportedecarga SET ide_usua = ?, 
       cod_puer = ?, estado = ?
       
        WHERE cod_trans = ?", array(
            $this->usuario,
            $this->puertaInicial,
            $this->estado,
            $this->cod_trans,
        ));
        $this->Disconnect();
    }

    protected function eliminar($id)
    {
      /*  return Clientes::buscar("delete from clientes where idCliente=?");*/
    }

    

    /**
     * Get the value of ide_usua
     */ 
    public function getIde_usua()
    {
        return $this->ide_usua;
    }

    /**
     * Set the value of ide_usua
     *
     * @return  self
     */ 
    public function setIde_usua($ide_usua)
    {
        $this->ide_usua = $ide_usua;

        return $this;
    }

    /**
     * Get the value of cod_puer
     */ 
    public function getCod_puer()
    {
        return $this->cod_puer;
    }

    /**
     * Set the value of cod_puer
     *
     * @return  self
     */ 
    public function setCod_puer($cod_puer)
    {
        $this->cod_puer = $cod_puer;

        return $this;
    }

    /**
     * Get the value of nombUsua
     */ 
    public function getNombUsua()
    {
        return $this->nombUsua;
    }

    /**
     * Set the value of nombUsua
     *
     * @return  self
     */ 
    public function setNombUsua($nombUsua)
    {
        $this->nombUsua = $nombUsua;

        return $this;
    }

    /**
     * Get the value of cod_trans
     */ 
    public function getCod_trans()
    {
        return $this->cod_trans;
    }

    /**
     * Set the value of cod_trans
     *
     * @return  self
     */ 
    public function setCod_trans($cod_trans)
    {
        $this->cod_trans = $cod_trans;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }
}