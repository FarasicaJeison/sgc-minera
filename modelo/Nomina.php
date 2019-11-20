<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 16/6/2017
 * Time: 16:47
 */

require_once('db_abstract_class.php');
require("../modelo/Usuario.php");

class Nomina extends db_abstract_class
{
    private $cod_nom;
    private $ide_usua;
    private $cod_anti;
    private $fecha_nom;
    private $cod_act;
    private $precio;
    private $desde;
    private $hasta;
    private $nomUsua;
    private $pago;
    private $totalAnticipo;



    /**
     * Especialidad constructor.
     * @param $idEspacialidad
     * @param $Nombre
     * @param $Estado
     */
    public function __construct($Nomina_data = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if (count($Nomina_data) > 1) { //
            foreach ($Nomina_data as $campo => $valor) {
                $this->$campo = $valor;
            }
        } else {
            $this->cod_nom = "";
            $this->ide_usua = "";
            $this->cod_anti = "";
            $this->fecha_nom = "";
            $this->cod_act = "";
            $this->precio = "";
            $this->desde = "";
            $this->hasta = "";
            $this->pago = "";
            $this->totalAnticipo = "";
        }
    }
    public static function selectUsuario($isRequired = true, $id, $nombre, $class)
    {
        echo Usuario::selectUsuario($isRequired = true, $id, $nombre, $class);
    }

    public static function buscarForId($id)
    {
        /*$Especial = new Clientes();
        if ($id > 0){
            $getrow = $Especial->getRow("SELECT * FROM clientes FROM idClientes =?", array($id));
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
        }*/ }

 

    public static function buscarprecio($fechaInicial, $fechafical, $usuaio)
    {
      
        $Especial = new Nomina();
        if ($usuaio > 0) {
            $getrow = $Especial->getRow("SELECT sum(pago) as pago FROM actividades where fecha>=? and fecha<=? and ide_usua=?", array($fechaInicial,$fechafical,$usuaio));
            $Especial = new Nomina();
            $Especial->pago = $getrow['pago'];
            $Especial->Disconnect();
            return $Especial;
        } else {
            return NULL;
        }
    }
    public static function buscardescuento($fechaInicial, $fechafical, $usuaio)
    {
      
        $Especial = new Nomina();
        if ($usuaio > 0) {
            $getrow = $Especial->getRow("SELECT sum(precio_anti) as totalAnticipo FROM anticipos where fecha_anti>=? and fecha_anti<=? and ide_usua=?", array($fechaInicial,$fechafical,$usuaio));
            $Especial = new Nomina();
            $Especial->totalAnticipo = $getrow['totalAnticipo'];
            $Especial->Disconnect();
            return $Especial;
        } else {
            return NULL;
        }
    }

    public static function buscar($query)
    {

        $arrayNomina = array();
        $tmp = new Nomina();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Nomina = new Nomina();
            $Nomina->cod_nom = $valor['cod_nom'];
            $Nomina->ide_usua = $valor['ide_usua'];
            $Nomina->precio = $valor['precio'];
            $Nomina->desde = $valor['desde'];
            $Nomina->hasta = $valor['hasta'];
            $Nomina->nomUsua = $valor['nombUsua'];

            array_push($arrayNomina, $Nomina);
        }
        $tmp->Disconnect();
        return $arrayNomina;
    }

    static function getAll()
    {

        return Nomina::buscar("SELECT u.nombUsua, cod_nom, n.ide_usua, precio, desde, hasta FROM nomina n join usuario u on n.ide_usua=u.ide_usua");
    }
    


    public function insertar()
    {
        $this->insertRow(
            "INSERT INTO sgc_minera.nomina VALUES (NULL, ?, ?, ?, ?)",
            array(
                $this->ide_usua,
                $this->precio,
                $this->desde,
                $this->hasta,
            )
        );
        $this->Disconnect();
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
        $this->Disconnect();*/ }

    protected function eliminar($id)
    {
        /*  return Clientes::buscar("delete from clientes where idCliente=?");*/ }




    /**
     * Get the value of cod_nom
     */
    public function getCod_nom()
    {
        return $this->cod_nom;
    }

    /**
     * Set the value of cod_nom
     *
     * @return  self
     */
    public function setCod_nom($cod_nom)
    {
        $this->cod_nom = $cod_nom;

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
     * Get the value of cod_anti
     */
    public function getCod_anti()
    {
        return $this->cod_anti;
    }

    /**
     * Set the value of cod_anti
     *
     * @return  self
     */
    public function setCod_anti($cod_anti)
    {
        $this->cod_anti = $cod_anti;

        return $this;
    }

    /**
     * Get the value of fecha_nom
     */
    public function getFecha_nom()
    {
        return $this->fecha_nom;
    }

    /**
     * Set the value of fecha_nom
     *
     * @return  self
     */
    public function setFecha_nom($fecha_nom)
    {
        $this->fecha_nom = $fecha_nom;

        return $this;
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
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

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
     * Get the value of nomUsua
     */
    public function getNomUsua()
    {
        return $this->nomUsua;
    }

    /**
     * Set the value of nomUsua
     *
     * @return  self
     */
    public function setNomUsua($nomUsua)
    {
        $this->nomUsua = $nomUsua;

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
     * Get the value of totalAnticipo
     */
    public function getTotalAnticipo()
    {
        return $this->totalAnticipo;
    }

    /**
     * Set the value of totalAnticipo
     *
     * @return  self
     */
    public function setTotalAnticipo($totalAnticipo)
    {
        $this->totalAnticipo = $totalAnticipo;

        return $this;
    }
}
