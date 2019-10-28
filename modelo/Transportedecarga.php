<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 16/6/2017
 * Time: 16:47
 */

require_once('db_abstract_class.php');

class Transportedecarga extends db_abstract_class
{
    private $cod_trans;
    private $ide_usua;
    private $cod_puer;
      

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
                                
        }
    }

    public static function buscarForId($id)
    {
        /*$Especial = new Clientes();
        if ($id > 0){
            $getrow = $Especial->getRow("SELECT * FROM clientes WHERE idClientes =?", array($id));
            $Especial->idClientes = $getrow['idClientes'];
            $Especial->Nombres = $getrow['Nombres'];
            $Especial->Apellidos = $getrow['Apellidos'];
            $Especial->TipoDoc = $getrow['TipoDoc'];
            $Especial->Cedula = $getrow['Cedula'];
            $Especial->Telefono = $getrow['Telefono'];
            $Especial->Contraseña = $getrow['Contraseña'];
            $Especial->Disconnect();
            return $Especial;
        }else{
            return NULL;
        }*/
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
                       
            array_push($arrayTransportedecarga, $Transportedecarga);
                   
        }
        $tmp->Disconnect();
        
        return $arrayTransportedecarga;
    }

     static function getAll()
    {
        
        return Transportedecarga::buscar("SELECT cod_trans, ide_usua, cod_puer FROM transportedecarga");
    }

    public function insertar()
    {
       /* $this->insertRow("INSERT INTO mydb.despacho VALUES (NULL, ?, ?, ?, ?)", array(
                $this->idTransporte,
                $this->idPedidos,
                $this->idClientes,
                $this->idTipoArena,
            )
        );
        $this->Disconnect();*/
    }

    public function editar()
    {

      /*  $this->updateRow("UPDATE mydb.clientes SET Nombres = ?, Apellidos = ?, TipoDoc = ?, Cedula = ?, Telefono = ?, Contraseña = ? WHERE idClientes = ?", array(
            $this->Nombres,
            $this->Apellidos,
            $this->TipoDoc,
            $this->Cedula,
            $this->Telefono,
            $this->Contraseña,
            $this->idClientes,
        ));
        $this->Disconnect();*/
    }

    protected function eliminar($id)
    {
      /*  return Clientes::buscar("delete from clientes where idCliente=?");*/
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
}