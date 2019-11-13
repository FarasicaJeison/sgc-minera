<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 16/6/2017
 * Time: 16:47
 */

require_once('db_abstract_class.php');
require("../modelo/Usuario.php");


class Anticipos extends db_abstract_class
{
    private $cod_anti;
    private $ide_usua;
    private $motivo_anti;
    private $precio_anti;
    private $fecha_anti;
       
    

    /**
     * Especialidad constructor.
     * @param $idEspacialidad
     * @param $Nombre
     * @param $Estado
     */
    public function __construct($Anticipos_data = array())
    {
        
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Anticipos_data)>1){ //
            foreach ($Anticipos_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->cod_anti = "";
            $this->ide_usua = "";
            $this->motivo_anti = "";
            $this->precio_anti = "";
            $this->fecha_anti = "";
                      
        }
    }

    public static function selectUsuario($isRequired=true, $id, $nombre, $class){
        echo Usuario::selectUsuario($isRequired=true, $id, $nombre, $class);
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
        
        $arrayAnticipos = array();
        $tmp = new Anticipos();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Anticipos = new Anticipos();
            $Anticipos->cod_anti = $valor['cod_anti'];
            $Anticipos->ide_usua = $valor['ide_usua'];
            $Anticipos->motivo_anti = $valor['motivo_anti'];
            $Anticipos->precio_anti = $valor['precio_anti'];
            $Anticipos->fecha_anti = $valor['fecha_anti'];
            
            array_push($arrayAnticipos, $Anticipos);
                      
        }
        $tmp->Disconnect();
        return $arrayAnticipos;
    }

     static function getAll()
    {
        
        return Anticipos::buscar("SELECT cod_anti, ide_usua, motivo_anti, precio_anti, fecha_anti FROM anticipos");
    }

    public function insertar()
    {
        // echo "lorena";
        //ecambiar nombre a la tabla que se le hara el registro
       /* $this->insertRow("INSERT INTO mydb.despacho VALUES (NULL, ?, ?, ?)", array(
                $this->idPedidos,
                $this->idClientes,
                $this->idTipoArena,

                //colocar nombres de la base de datos
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
     * Get the value of motivo_anti
     */ 
    public function getMotivo_anti()
    {
        return $this->motivo_anti;
    }

    /**
     * Set the value of motivo_anti
     *
     * @return  self
     */ 
    public function setMotivo_anti($motivo_anti)
    {
        $this->motivo_anti = $motivo_anti;

        return $this;
    }

    /**
     * Get the value of precio_anti
     */ 
    public function getPrecio_anti()
    {
        return $this->precio_anti;
    }

    /**
     * Set the value of precio_anti
     *
     * @return  self
     */ 
    public function setPrecio_anti($precio_anti)
    {
        $this->precio_anti = $precio_anti;

        return $this;
    }

    /**
     * Get the value of fecha_anti
     */ 
    public function getFecha_anti()
    {
        return $this->fecha_anti;
    }

    /**
     * Set the value of fecha_anti
     *
     * @return  self
     */ 
    public function setFecha_anti($fecha_anti)
    {
        $this->fecha_anti = $fecha_anti;

        return $this;
    }
}