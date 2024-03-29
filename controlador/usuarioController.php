<?php
session_start();
require_once('../modelo/Usuario.php');

if (!empty($_GET['action'])) {
    UsuarioController::main($_GET['action']);
} else {
    echo "No se encontro ninguna accion...";
}

class UsuarioController
{

    static function main($action)
    {
        if ($action == "registro") { //va a este menu 
            UsuarioController::crear();
        }else if($action=="inactivarUsuario"){
            UsuarioController::inactivarUsuario();
        }else if($action=="llenardatos"){
            UsuarioController::llenardatos();
        }else if($action=="Login"){
            UsuarioController::Login();
        }else if($action == "CerrarSession"){
            UsuarioController::CerrarSession();
        }else if($action == "editar"){
            UsuarioController::editar();
        }
    }

    public function CerrarSession (){
      
        session_destroy();
        header("Location: ../vista/login.php");
    }


    public function Login (){
       
        try {
            $response = [];
            $User = $_POST['usuario'];
            $Password = $_POST['contrasena'];

            if(!empty($User) && !empty($Password)){
                $respuesta = Usuario::Login($User, $Password);
                if (is_array($respuesta)) {
                    $_SESSION['ide_usua'] = $respuesta['ide_usua'];
                   
                   // $_SESSION['TipoUsuario'] = $respuesta['Tipo'];
                    $_SESSION['nombUsua'] = $respuesta['nombUsua'];
                    header("Location: ../vista/gestionarUsuario.php");
                }else if($respuesta == "Password Incorrecto"){
                  // echo "incorrecta";
                  header("Location: ../vista/login.php");
                    
                }else if($respuesta == "No existe el usuario"){
                   // echo "usuario no existe";
                   header("Location: ../vista/login.php");
                }
            }else{
               // echo "datos vacios";
               header("Location: ../vista/login.php");
            }
            //echo json_encode($response);

        } catch (Exception $e) {
           header("Location: ../vista/index.php?respuesta=error");
        }
    }
    


    static public function crear()
    {

        try {
            $arrayUsuarios = array();
            $arrayUsuarios['ide_usua'] = $_POST['documento'];
            $arrayUsuarios['nombUsua'] = $_POST['nombUsua'];
            $arrayUsuarios['apeUsua'] = $_POST['apeUsua'];
            $arrayUsuarios['direccion'] = $_POST['direccion'];
            $arrayUsuarios['telefono'] = $_POST['telefono'];
            $arrayUsuarios['telFamiliar'] = $_POST['telFamiliar'];
            $arrayUsuarios['nomFamiliar'] = $_POST['nomFamiliar'];
            
            $arrayUsuarios['eps'] = $_POST['eps'];
            $arrayUsuarios['pension'] = $_POST['pension'];
            $arrayUsuarios['rh'] = $_POST['rh'];
            $arrayUsuarios['rol'] = $_POST['rol'];
            $arrayUsuarios['usuario'] = $_POST['usuario'];
            $arrayUsuarios['contrasena'] = $_POST['contrasena'];
            $Usuarios = new Usuario($arrayUsuarios);

            $Usuarios->insertar();
            header("Location: ../vista/gestionarUsuario.php");
        } catch (Exception $e) {
            echo $e;
        }
    }

    static public function editar()
    {
        try {
            $arrayUsuarios['ide_usua'] = $_POST['documento'];
            $arrayUsuarios['nombUsua'] = $_POST['nombUsua'];
            $arrayUsuarios['apeUsua'] = $_POST['apeUsua'];
            $arrayUsuarios['direccion'] = $_POST['direccion'];
            $arrayUsuarios['telefono'] = $_POST['telefono'];
            $arrayUsuarios['telFamiliar'] = $_POST['telFamiliar'];
            $arrayUsuarios['nomFamiliar'] = $_POST['nomFamiliar'];
            $arrayUsuarios['riesgos'] = $_POST['riesgos'];
            $arrayUsuarios['eps'] = $_POST['eps'];
            $arrayUsuarios['pension'] = $_POST['pension'];
            $arrayUsuarios['rh'] = $_POST['rh'];
            $arrayUsuarios['rol'] = $_POST['rol'];
            $arrayUsuarios['usuario'] = $_POST['usuario'];
            $arrayUsuarios['contrasena'] = $_POST['contrasena'];
            $arrayUsuarios['estado'] = $_POST['estado'];
            $arrayUsuarios['documentowhere'] = $_POST['documentowhere'];
            $Usuarios = new Usuario($arrayUsuarios);
            
            $Usuarios->editar();
            header("Location: ../vista/gestionarUsuario.php");
        } catch (Exception $e) {
            echo $e;
            //header("Location: ../Vista/editarArena.php?respuesta=errorr");
        }
       
    }


    static public function inactivarUsuario()
    {

        try {

            $ObjEspecialidad = Usuario::buscarForId($_GET['idUsuario']);
            $ObjEspecialidad->setEstado(0);
            $ObjEspecialidad->editar();
            header("Location: ../vista/gestionarUsuario.php");
        } catch (Exception $e) {
            header("Location: ../vista/gestionarPedidos.php?respuest=error");
        }
    }



    static public function buscarID($id)
    {
        try {
            return Usuario::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../gestionarArena.php?respuesta=error");
        }
    }

    public function buscarAll()
    {
        try {
            return Pedidos::getAll();
        } catch (Exception $e) {
            header("Location: ../gestionarPedidos.php?respuesta=error");
        }
    }

    public function buscar($Query)
    {
        try {
            return Especialidad::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../gestionarPedidos.php?respuesta=error");
        }
    }
}
