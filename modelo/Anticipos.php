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
    private $nombUsua;
       
    

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
       
        $Anticipos = new Anticipos();
        if ($id > 0){
            $getrow = $Anticipos->getRow("SELECT * FROM anticipos WHERE cod_anti =?", array($id));
            $Anticipos = new Anticipos();
            $Anticipos->cod_anti = $getrow['cod_anti'];
            $Anticipos->ide_usua = $getrow['ide_usua'];
            
            $Anticipos->precio_anti = $getrow['precio_anti'];
            $Anticipos->fecha_anti = $getrow['fecha_anti'];
          
            $Anticipos->Disconnect();
            return $Anticipos;
        }else{
            return NULL;
        }
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
            $Anticipos->nombUsua = $valor['nombUsua'];
            $Anticipos->precio_anti = $valor['precio_anti'];
            $Anticipos->fecha_anti = $valor['fecha_anti'];
            
            array_push($arrayAnticipos, $Anticipos);
                      
        }
        $tmp->Disconnect();
        return $arrayAnticipos;
    }

     static function getAll()
    {
        
        return Anticipos::buscar("SELECT u.nombUsua,cod_anti, a.ide_usua, precio_anti, fecha_anti FROM anticipos a join usuario u on u.ide_usua=a.ide_usua");
    }

    public function insertar()  
    {
        
        $time = time();
        $this->insertRow("INSERT INTO sgc_minera.anticipos VALUES (NULL, ?, ?, ?,?)", array(
                $this->ide_usua,
                $this->precioAnticipo,
                $this->fecha_anti=date("Y-m-d ", $time),
                $this->estado=1,

                //colocar nombres de la base de datos
            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        $time = time();
        $this->updateRow("UPDATE sgc_minera.anticipos SET precio_anti = ?, 
        fecha_anti = ?, estado = ?, ide_usua=?
          WHERE cod_anti = ?", array(
           $this->precio_anti,
           $this->fecha_anti=date("Y-m-d ", $time),
           $this->estado,
           $this->ide_usua,
           $this->cod_anti,

        ));
        $this->Disconnect();
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