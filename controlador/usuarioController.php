<?php
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
        if ($action == "registro") {
            UsuarioController::registro();
        }else if($action=="ActivarUsuario"){
            UsuarioController::ActivarUsuario();
        }else if($action=="llenardatos"){
            UsuarioController::llenardatos();
        }
    }
    static public function llenardatos(){
        $llenarDatos = UsuarioController::buscarID($_GET["id"]);
        
    }

    static public function registro(){
        if(!is_null($_POST['usuarioEditar'])){
            UsuarioController::crear();
        }else{
            UsuarioController::editarUsuario();
        }
    }
    static public function Usuario($id)
    {

        $arrPerson = Arena::buscarForId($id);
        $htmlInput = "";
        // var_dump($arrPerson);
        $htmlInput .= $arrPerson->getNombre();
        return $htmlInput;
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
            $arrayUsuarios['riesgos'] = $_POST['riesgos'];
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

    static public function editarUsuario()
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
            $Usuarios = new Usuario($arrayUsuarios);
           
            $Usuarios->editar();
            header("Location: ../Vista/indexA.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/editarArena.php?respuesta=error");
        }
       return UsuarioController::buscarID($_GET["id"]);
    }


    static public function ActivarUsuario()
    {
        
        try {
           
            $ObjEspecialidad = Usuario::buscarForId($_GET['idUsuario']);
            $ObjEspecialidad->setEstado(1);
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
