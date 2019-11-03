<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 16/6/2017
 * Time: 16:47
 */

require_once('db_abstract_class.php');
require("../modelo/Usuario.php");

class Actividades extends db_abstract_class
{
    private $cod_act;
    private $ide_usua;
    private $actividad;
    private $pago;
    private $fecha;
    private $desde;
    private $hasta;
    

    /**
     * Especialidad constructor.
     * @param $idEspacialidad
     * @param $Nombre
     * @param $Estado
     */
    public function __construct($Actividades_data = array())
    {
        
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Actividades_data)>1){ //
            foreach ($Actividades_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->cod_act = "";
            $this->ide_usua = "";
            $this->actividad = "";
            $this->pago = "";
            $this->fecha = "";
            $this->desde = "";
            $this->hasta = "";
           
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
    public static function selectUsuario($isRequired=true, $id, $nombre, $class){
        echo Usuario::selectUsuario($isRequired=true, $id, $nombre, $class);
    }

   public static function buscar($query)
    {
       
        $arrayActividades = array();
        $tmp = new Actividades();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Actividades = new Actividades();
            $Actividades->cod_act = $valor['cod_act'];
            $Actividades->ide_usua = $valor['ide_usua'];
            $Actividades->actividad = $valor['actividad'];
            $Actividades->pago = $valor['pago'];
            $Actividades->fecha = $valor['fecha'];
            $Actividades->desde = $valor['desde'];
            $Actividades->hasta = $valor['hasta'];
            

            array_push($arrayActividades, $Actividades);

        }
        $tmp->Disconnect();
        return $arrayActividades;
    }

     static function getAll()
    {
        return Actividades::buscar("SELECT cod_act, ide_usua, actividad, pago, fecha, desde, hasta FROM actividades");
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
     * Get the value of cod_act
     */ 
    public function getCod_act()
    {
        return $this->cod_act;
    }

    /**
     * Set the value of cod_act
     *
     * @return  self
     */ 
    public function setCod_act($cod_act)
    {
        $this->cod_act = $cod_act;

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
     * Get the value of actividad
     */ 
    public function getActividad()
    {
        return $this->actividad;
    }

    /**
     * Set the value of actividad
     *
     * @return  self
     */ 
    public function setActividad($actividad)
    {
        $this->actividad = $actividad;

        return $this;
    }

    /**
     * Get the value of pago
     */ 
    public function getPago()
    {
        return $this->pago;
    }

    /**
     * Set the value of pago
     *
     * @return  self
     */ 
    public function setPago($pago)
    {
        $this->pago = $pago;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of desde
     */ 
    public function getDesde()
    {
        return $this->desde;
    }

    /**
     * Set the value of desde
     *
     * @return  self
     */ 
    public function setDesde($desde)
    {
        $this->desde = $desde;

        return $this;
    }

    /**
     * Get the value of hasta
     */ 
    public function getHasta()
    {
        return $this->hasta;
    }

    /**
     * Set the value of hasta
     *
     * @return  self
     */ 
    public function setHasta($hasta)
    {
        $this->hasta = $hasta;

        return $this;
    }
}