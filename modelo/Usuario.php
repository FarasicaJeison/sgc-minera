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
    private $ide_usua;
    private $nombUsua;
    private $apeUsua;
    private $direccion;
    private $telefono;
    private $telFamiliar;
    private $nomFamiliar;
    private $riesgos;
    private $eps;
    private $pension;
    private $rh;
    private $rol;
    private $usuario;
    private $contrasena;
    private $estado;

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

            $this->nomUsua = "";
            $this->apeUsua= "";
            $this->direccion = "";
            $this->telefono = "";
            $this->telFamiliar = "";
            $this->nomFamiliar="";
            $this->riesgos = "";
            $this->eps = "";
            $this->pension = "";
            $this->rh = "";
            $this->rol = "";
            $this->usuario = "";
            $this->contrasena = "";

        }
    }

    public static function Login($User, $Password){
        echo "entro";
        $arrUsuarios = array();
        $tmp = new Usuario();
        $getTempUser = $tmp->getRows("SELECT * FROM usuario WHERE usuario = '$User'");
        if(count($getTempUser) >= 1){
            $getrows = $tmp->getRows("SELECT * FROM usuario WHERE usuario = '$User' AND contrasena = '$Password' AND rol='Admin'");
            if(count($getrows) >= 1){
                foreach ($getrows as $valor) {
                    return $valor;
                }
            }else{
                return "Password Incorrecto";
            }
        }else{
            return "No existe el usuario";
        }

        $tmp->Disconnect();
        return $arrUsuarios;
    }

    public static function buscarForId($id)
    {   
        
        $Usuarios = new Usuario();
        if ($id > 0){
            $getrow = $Usuarios->getRow("SELECT * FROM usuario WHERE ide_usua =?", array($id));
            $Usuarios = new Usuario();
            $Usuarios->ide_usua= $getrow['ide_usua'];
            $Usuarios->nombUsua = $getrow['nombUsua'];
            $Usuarios->apeUsua = $getrow['apeUsua'];
            $Usuarios->direccion = $getrow['direccion'];
            $Usuarios->telefono = $getrow['telefono'];
            $Usuarios->telFamiliar = $getrow['telFamiliar'];
            $Usuarios->riesgos = $getrow['riesgos'];
            $Usuarios->eps = $getrow['eps'];
            $Usuarios->pension = $getrow['pension'];
            $Usuarios->rh = $getrow['rh'];
            $Usuarios->rol = $getrow['rol'];
            $Usuarios->usuario = $getrow['usuario'];
            $Usuarios->usuario = $getrow['contrasena'];
            $Usuarios->usuario = $getrow['estado'];
            $Usuarios->Disconnect();
            return $Usuarios;
        }else{
            return NULL;
        }
    }
    static public function selectUsuario ($isRequired=true, $id, $nombre, $class){
       
        $arrayUsuarios = Usuario::getAll();
       
        $htmlSelect = '<select name="usuario" class="form-control custom-select-value" >';
        $htmlSelect .= "<option value=''>Seleccione</option> ";
        if(count($arrayUsuarios)>0){
            foreach ($arrayUsuarios as $usuario){
                $htmlSelect .= "<option value='".$usuario->getIde_usua()."'>".$usuario->getNombUsua()." -- ".$usuario->getIde_usua()." "."</option>";
            }
            $htmlSelect .= "</select>";
        }
        else
        {
            $htmlSelect = '<select>';
            $htmlSelect .= "<option value='nada'>Seleccione</option>";
            $htmlSelect .= "</select>";
        }
        return $htmlSelect;
    }


   public static function buscar($query)
    {
       
        $arrayUsuarios = array();
        $tmp = new Usuario();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Usuarios = new Usuario();
            $Usuarios->ide_usua= $valor['ide_usua'];
            $Usuarios->nombUsua = $valor['nombUsua'];
            $Usuarios->apeUsua = $valor['apeUsua'];
            $Usuarios->direccion = $valor['direccion'];
            $Usuarios->telefono = $valor['telefono'];
            $Usuarios->telFamiliar = $valor['telFamiliar'];
            $Usuarios->riesgos = $valor['riesgos'];
            $Usuarios->eps = $valor['eps'];
            $Usuarios->pension = $valor['pension'];
            $Usuarios->rh = $valor['rh'];
            $Usuarios->rol = $valor['rol'];
            $Usuarios->usuario = $valor['usuario'];
            $Usuarios->contrasena = $valor['contrasena'];
            $Usuarios->estado = $valor['estado'];


            array_push($arrayUsuarios, $Usuarios);

        }
        $tmp->Disconnect();
        return $arrayUsuarios;
    }

     static function getAll()
    {
        return Usuario::buscar("SELECT contrasena, estado, ide_usua,nombUsua, apeUsua, direccion, telefono, riesgos, eps, pension, rh, rol, usuario, telFamiliar FROM usuario order by 1 desc");
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO sgc_minera.usuario VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", array(
            $this->ide_usua,
            $this->nombUsua,
            $this->apeUsua,
            $this->direccion,
            $this->telefono,
            $this->telFamiliar,
            $this->nomFamiliar,
            $this->riesgos,
            $this->eps,
            $this->pension,
            $this->rh,
            $this->rol,
            $this->usuario,
            $this->contrasena,
            $this->estado=1,
            )
        );  
        $this->Disconnect();
    }

    public function editar()
    {

       $this->updateRow("UPDATE sgc_minera.usuario SET nombUsua = ?, apeUsua = ?, direccion = ?, telefono = ?, 
       telFamiliar = ?, nomFamiliar = ?,
       riesgos = ?, eps = ?, pension = ?, rh = ?, rol = ?, usuario = ?, 
       contrasena=?, estado=?
       
       WHERE ide_usua = ?", array(
       
        $this->nombUsua,
        $this->apeUsua,
        $this->direccion,
        $this->telefono,
        $this->telFamiliar,
        $this->nomFamiliar,
        $this->riesgos,
        $this->eps,
        $this->pension,
        $this->rh,
        $this->rol,
        $this->usuario,
        $this->contrasena,
        $this->estado,
        $this->ide_usua,
        ));
        $this->Disconnect();
    }

    protected function eliminar($id)
    {
      /*  return Clientes::buscar("delete from clientes where idCliente=?");*/
    }

    

    

    /**
     * Get the value of apeUsua
     */ 
    public function getApeUsua()
    {
        return $this->apeUsua;
    }

    /**
     * Set the value of apeUsua
     *
     * @return  self
     */ 
    public function setApeUsua($apeUsua)
    {
        $this->apeUsua = $apeUsua;

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
     * Get the value of telFamiliar
     */ 
    public function getTelFamiliar()
    {
        return $this->telFamiliar;
    }

    /**
     * Set the value of telFamiliar
     *
     * @return  self
     */ 
    public function setTelFamiliar($telFamiliar)
    {
        $this->telFamiliar = $telFamiliar;

        return $this;
    }

    /**
     * Get the value of nomFamiliar
     */ 
    public function getNomFamiliar()
    {
        return $this->nomFamiliar;
    }

    /**
     * Set the value of nomFamiliar
     *
     * @return  self
     */ 
    public function setNomFamiliar($nomFamiliar)
    {
        $this->nomFamiliar = $nomFamiliar;

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

    /**
     * Get the value of contrasena
     */ 
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * Set the value of contrasena
     *
     * @return  self
     */ 
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;

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