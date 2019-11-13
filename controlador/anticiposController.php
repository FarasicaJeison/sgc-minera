<?php
require("../modelo/Anticipos.php");

if (!empty($_GET['action'])) {
    anticiposController::main($_GET['action']);
} else {
    echo "No se encontro ninguna accion...";
}

class anticiposController //cambiar nombre a anticipos
{

    static function main($action)
    {
        if ($action == "crear") { //va a este menu 
            anticiposController::crear();
        }else if($action=="ActivarUsuario"){
            anticiposController::ActivarUsuario();
        }else if($action=="llenardatos"){
            anticiposController::llenardatos();
        }
    }
    static public function llenardatos(){
        $llenarDatos = anticiposController::buscarID($_GET["id"]);
        
    }

    static public function crear()
    {
     
        try {
         
            $arrayUsuarios = array();
            $arrayUsuarios['ide_usua'] = $_POST['usuario'];//nombre del input de la vista
            $arrayUsuarios['precioAnticipo'] = $_POST['precioAnticipo'];
           
            
            $Usuarios = new Anticipos($arrayUsuarios);//lnombre del modelo en este caso es anticipos
           
            $Usuarios->insertar();
            header("Location: ../vista/GestionarAnticipos.php");
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
