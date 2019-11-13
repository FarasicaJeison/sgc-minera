<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 16/6/2017
 * Time: 16:47
 */

require_once('db_abstract_class.php');

require("../modelo/Puertas.php");

class Actividades extends db_abstract_class
{
    private $cod_act;
    private $ide_usua;
    private $actividad;
    private $pago;
    private $fecha;
    private $desde;
    private $hasta;
    private $estado;
    private $nombUsua;
    

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
        $actividades = new actividades();
        if ($id > 0){
           
            $getrow = $actividades->getRow("SELECT * FROM actividades WHERE cod_act =?", array($id));
            $actividades->cod_act = $id;
            $actividades->ide_usua = $getrow['ide_usua'];
            $actividades->actividad = $getrow['actividad'];
            $actividades->pago = $getrow['pago'];
            $actividades->fecha = $getrow['fecha'];
            $actividades->desde = $getrow['desde'];
            $actividades->hasta = $getrow['hasta'];
            $actividades->Disconnect();
            return $actividades;
        }else{
            return NULL;
        }
    }
    public static function selectUsuario($isRequired=true, $id, $nombre, $class){
        echo Usuario::selectUsuario($isRequired=true, $id, $nombre, $class);
    }
    public static function selectPuerta($isRequired=true, $id, $nombre, $class){
       echo Puertas::selectPuerta($isRequired=true, $id, $nombre, $class);
    }
    public static function selectPuertafinal($isRequired=true, $id, $nombre, $class){
        echo Puertas::selectPuertafinal($isRequired=true, $id, $nombre, $class);
     }
   public static function buscar($query)
    {
       
        $arrayActividades = array();
        $tmp = new Actividades();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Actividades = new Actividades();
            $Actividades->cod_act = $valor['cod_act'];
            $Actividades->nombUsua = $valor['nombUsua'];
            $Actividades->ide_usua = $valor['ide_usua'];
            $Actividades->actividad = $valor['actividad'];
            $Actividades->pago = $valor['pago'];
            $Actividades->fecha = $valor['fecha'];
            $Actividades->desde = $valor['desde'];
            $Actividades->hasta = $valor['hasta'];
            $Actividades->estado = $valor['estado'];
            

            array_push($arrayActividades, $Actividades);

        }
        $tmp->Disconnect();
        return $arrayActividades;
    }

     static function getAll()
    {
        return Actividades::buscar("SELECT cod_act,nombUsua ,u.ide_usua, actividad, pago, fecha, desde, hasta, a.estado FROM actividades a join usuario u on u.ide_usua=a.ide_usua where a.estado=1 order by cod_act desc");
    }

    public function insertar()
    {
        $time = time();
        $this->insertRow("INSERT INTO sgc_minera.actividades VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)", array(
              
                $this->ide_usua,
                $this->actividad,
                $this->pago,
                $this->fecha=date("Y-m-d ", $time),
                $this->desde,
                $this->hasta,
                $this->estado=1,
            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
       
        $time = time();
        $this->updateRow("UPDATE sgc_minera.actividades SET ide_usua = ?, actividad = ?,
         pago = ?, fecha = ?, desde = ?, hasta = ?, estado = ?
         WHERE cod_act = ?", array(
                $this->ide_usua,
                $this->actividad,
                $this->pago,
                $this->fecha=date("Y-m-d ", $time),
                $this->desde,
                $this->hasta,
                $this->estado,
                $this->cod_act,
              
        ));
        $this->Disconnect();
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
}