<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 16/6/2017
 * Time: 16:47
 */

require_once('db_abstract_class.php');
require("../modelo/Usuario.php");

class Puertas extends db_abstract_class
{
    private $cod_puer;
    private $fecha_creacion;
    private $precio_puer;
    private $tramo;
    private $estado;
    /**
     * Especialidad constructor.
     * @param $idEspacialidad
     * @param $Nombre
     * @param $Estado
     */
    public function __construct($Puertas_data = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if (count($Puertas_data) > 1) { //
            foreach ($Puertas_data as $campo => $valor) {
                $this->$campo = $valor;
            }
        } else {
            $this->cod_puer = "";
            $this->fecha_creacion = "";
            $this->precio_puer = "";
            $this->tramo = "";
        }
    }

    static public function selectPuerta ($isRequired=true, $id, $nombre, $class){
        
        $arrayPuertas = Puertas::getAll();
       
        $htmlSelect = '<select name="puertaInicial" class="form-control custom-select-value" >';
        $htmlSelect .= "<option value=''>Seleccione</option> ";
        if(count($arrayPuertas)>0){
            foreach ($arrayPuertas as $Puertas){
                $htmlSelect .= "<option value='".$Puertas->getcod_puer()."'>".$Puertas->getCod_puer()." -- ".$Puertas->getCod_puer()." "."</option>";
            }
            $htmlSelect .= "</select>";
        }
        else
        {
            $htmlSelect = '<select>';
            $htmlSelect .= "<option value='nada' class='form-control custom-select-value'>Seleccione</option>";
            $htmlSelect .= "</select>";
        }
        return $htmlSelect;
    }

    static public function selectPuertafinal ($isRequired=true, $id, $nombre, $class){
        
        $arrayPuertas = Puertas::getAll();
       
        $htmlSelect = '<select name="puertaFinal" class="form-control custom-select-value" >';
        $htmlSelect .= "<option value=''>Seleccione</option> ";
        if(count($arrayPuertas)>0){
            foreach ($arrayPuertas as $Puertas){
                $htmlSelect .= "<option value='".$Puertas->getcod_puer()."'>".$Puertas->getCod_puer()." -- ".$Puertas->getCod_puer()." "."</option>";
            }
            $htmlSelect .= "</select>";
        }
        else
        {
            $htmlSelect = '<select>';
            $htmlSelect .= "<option value='nada' class='form-control custom-select-value'>Seleccione</option>";
            $htmlSelect .= "</select>";
        }
        return $htmlSelect;
    }

    public static function buscarForId($id)
    {
        $puertas = new Puertas();
        if ($id > 0){
            $getrow = $puertas->getRow("SELECT * FROM puertas WHERE cod_puer =?", array($id));
            $puertas->cod_puer = $getrow['cod_puer'];
            $puertas->fecha_creacion = $getrow['fecha_creacion'];
            $puertas->precio_puer = $getrow['precio_puer'];
            $puertas->tramo = $getrow['tramo'];
            $puertas->estado = $getrow['estado'];
            $puertas->Disconnect();
           
            return $puertas;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {

        $arrayPuertas = array();
        $tmp = new Puertas();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $puertas = new Puertas();
            $puertas->cod_puer = $valor['cod_puer'];
            $puertas->fecha_creacion = $valor['fecha_creacion'];
            $puertas->precio_puer = $valor['precio_puer'];
            $puertas->tramo = $valor['tramo'];


            array_push($arrayPuertas, $puertas);
        }
        $tmp->Disconnect();

        return $arrayPuertas;
    }

    static function getAll()
    {
        return Puertas::buscar("SELECT cod_puer,fecha_creacion,precio_puer,tramo FROM puertas where estado=1 order by cod_puer desc");
    }

    public function insertar()
    {
        $time = time();
        $this->insertRow(
            "INSERT INTO sgc_minera.puertas VALUES (NULL, ?, ?, ?, ?)",
            array(
                $this->fecha_creacion = date("Y-m-d H:i", $time),
                $this->precio,
                $this->tramo,
                $this->estado=1,
               
            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        $time = time();
         $this->updateRow("UPDATE sgc_minera.puertas SET fecha_creacion = ?, precio_puer = ?, 
         tramo = ?, estado = ? 
         WHERE cod_puer = ?", array(
            $this->fecha_creacion = date("Y-m-d H:i", $time),
            $this->precio_puer,
            $this->tramo,
            $this->estado,
            $this->cod_puer,
        ));
        $this->Disconnect();
     }

    protected function eliminar($id)
    {
        /*  return Clientes::buscar("delete from clientes where idCliente=?");*/ }



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
     * Get the value of fecha_creacion
     */
    public function getFecha_creacion()
    {
        return $this->fecha_creacion;
    }

    /**
     * Set the value of fecha_creacion
     *
     * @return  self
     */
    public function setFecha_creacion($fecha_creacion)
    {
        $this->fecha_creacion = $fecha_creacion;

        return $this;
    }

    /**
     * Get the value of precio_puer
     */
    public function getPrecio_puer()
    {
        return $this->precio_puer;
    }

    /**
     * Set the value of precio_puer
     *
     * @return  self
     */
    public function setPrecio_puer($precio_puer)
    {
        $this->precio_puer = $precio_puer;

        return $this;
    }

    /**
     * Get the value of tramo
     */
    public function getTramo()
    {
        return $this->tramo;
    }

    /**
     * Set the value of tramo
     *
     * @return  self
     */
    public function setTramo($tramo)
    {
        $this->tramo = $tramo;

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
