<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 16/6/2017
 * Time: 16:47
 */

require_once('db_abstract_class.php');

class Usuario extends db_abstract_class
{
    private $nomb_usua;
    private $ape_usua;
    private $direccion;
    private $telefono;
    private $tel_familiar;
    private $riesgos;
    private $eps;
    private $pension;
    private $rh;
    private $rol;
    private $usuario;

    /**
     * Especialidad constructor.
     * @param $idEspacialidad
     * @param $Nombre
     * @param $Estado
     */
    public function __construct($Usuario_data = array())
    {
        
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Usuario_data)>1){ //
            foreach ($Usuario_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->nomb_usua = "";
            $this->ape_usua= "";
            $this->direccion = "";
            $this->telefono = "";
            $this->tel_familiar = "";
            $this->riesgos = "";
            $this->eps = "";
            $this->pension = "";
            $this->rh = "";
            $this->rol = "";
            $this->usuario = "";

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
       
        $arrayUsuarios = array();
        $tmp = new Usuario();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Usuarios = new Usuario();
            $Usuarios->nomb_usua = $valor['nomb_usua'];
            $Usuarios->ape_usua = $valor['ape_usua'];
            $Usuarios->direccion = $valor['direccion'];
            $Usuarios->telefono = $valor['telefono'];
            $Usuarios->tel_familiar = $valor['tel_familiar'];
            $Usuarios->riesgos = $valor['riesgos'];
            $Usuarios->eps = $valor['eps'];
            $Usuarios->pension = $valor['pension'];
            $Usuarios->rh = $valor['rh'];
            $Usuarios->rol = $valor['rol'];
            $Usuarios->usuario = $valor['usuario'];
            

            array_push($arrayUsuarios, $Usuarios);

        }
        $tmp->Disconnect();
        return $arrayUsuarios;
    }

     static function getAll()
    {
        return Usuario::buscar("SELECT nomb_usua, ape_usua, direccion, telefono, riesgos, eps, pension, rh, rol, usuario, tel_familiar FROM usuario");
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO usuario VALUES (NULL, ?, ?, ?, ?, ?,? , ?, ? , ?, ?, ?, ?, ?)", array(
                $this->ide_usua,
                $this->nomb_usua,
                $this->ape_usua,
                $this->direccion,
                $this->telefono,
                $this->tel_familiar,
                $this->nom_familiar,
                $this->riesgos,
                $this->eps,
                $this->pension,
                $this->rh,
                $this->rol,
                $this->usuario,
                $this->contrasena
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
        $this->Disconnect();*/
    }

    protected function eliminar($id)
    {
      /*  return Clientes::buscar("delete from clientes where idCliente=?");*/
    }

    

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get the value of ape_usua
     */ 
    public function getApe_usua()
    {
        return $this->ape_usua;
    }

    /**
     * Set the value of ape_usua
     *
     * @return  self
     */ 
    public function setApe_usua($ape_usua)
    {
        $this->ape_usua = $ape_usua;

        return $this;
    }

    /**
     * Get the value of nomb_usua
     */ 
    public function getNomb_usua()
    {
        return $this->nomb_usua;
    }

    /**
     * Set the value of nomb_usua
     *
     * @return  self
     */ 
    public function setNomb_usua($nomb_usua)
    {
        $this->nomb_usua = $nomb_usua;

        return $this;
    }

    /**
     * Get the value of tel_familiar
     */ 
    public function getTel_familiar()
    {
        return $this->tel_familiar;
    }

    /**
     * Set the value of tel_familiar
     *
     * @return  self
     */ 
    public function setTel_familiar($tel_familiar)
    {
        $this->tel_familiar = $tel_familiar;

        return $this;
    }

    /**
     * Get the value of riesgos
     */ 
    public function getRiesgos()
    {
        return $this->riesgos;
    }

    /**
     * Set the value of riesgos
     *
     * @return  self
     */ 
    public function setRiesgos($riesgos)
    {
        $this->riesgos = $riesgos;

        return $this;
    }

    /**
     * Get the value of eps
     */ 
    public function getEps()
    {
        return $this->eps;
    }

    /**
     * Set the value of eps
     *
     * @return  self
     */ 
    public function setEps($eps)
    {
        $this->eps = $eps;

        return $this;
    }

    /**
     * Get the value of pension
     */ 
    public function getPension()
    {
        return $this->pension;
    }

    /**
     * Set the value of pension
     *
     * @return  self
     */ 
    public function setPension($pension)
    {
        $this->pension = $pension;

        return $this;
    }

    /**
     * Get the value of rh
     */ 
    public function getRh()
    {
        return $this->rh;
    }

    /**
     * Set the value of rh
     *
     * @return  self
     */ 
    public function setRh($rh)
    {
        $this->rh = $rh;

        return $this;
    }

    /**
     * Get the value of rol
     */ 
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set the value of rol
     *
     * @return  self
     */ 
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get the value of usuario
     */ 
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     *
     * @return  self
     */ 
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }
}