<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 16/6/2017
 * Time: 16:47
 */

require_once('db_abstract_class.php');

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
    
    

    /**
     * Especialidad constructor.
     * @param $idEspacialidad
     * @param $Nombre
     * @param $Estado
     */
    public function __construct($Nomina_data = array())
    {
        
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Nomina_data)>1){ //
            foreach ($Nomina_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->cod_nom = "";
            $this->ide_usua = "";
            $this->cod_anti = "";
            $this->fecha_nom = "";
            $this->cod_act = "";
            $this->precio = "";
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

   public static function buscar($query)
    {
        
        $arrayNomina = array();
        $tmp = new Nomina();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Nomina = new Nomina();
            $Nomina->cod_nom = $valor['cod_nom'];
            $Nomina->ide_usua = $valor['ide_usua'];
            $Nomina->cod_anti = $valor['cod_anti'];
            $Nomina->fecha_nom = $valor['fecha_nom'];
            $Nomina->cod_act = $valor['cod_act'];
            $Nomina->precio = $valor['precio'];
            $Nomina->desde = $valor['desde'];
            $Nomina->hasta = $valor['hasta'];

            
            

            array_push($arrayNomina, $Nomina);
                      
        }
        $tmp->Disconnect();
        return $arrayNomina;
    }

     static function getAll()
    {
        
        return Nomina::buscar("SELECT cod_nom, ide_usua, cod_anti, fecha_nom, cod_act, precio, desde, hasta FROM nomina");
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
}