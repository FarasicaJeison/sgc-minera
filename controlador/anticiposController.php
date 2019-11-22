<?php
require("../modelo/Anticipos.php");

if (!empty($_POST['action'])) {
    anticiposController::main($_POST['action']);
} else {
    echo "No se encontro ninguna accion...";
}

class anticiposController //cambiar nombre a anticipos
{
    
    static function main($action)
    {
        if ($action == "crear") { //va a este menu 
            
            anticiposController::crear();
        }
    }
   

    static public function crear()
    {
     
        try {
            $response = [];
            $arrayUsuarios['ide_usua'] = $_POST['usuario'];//nombre del input de la vista
            $arrayUsuarios['precioAnticipo'] = $_POST['precioAnticipo'];
           
            
            $Usuarios = new Anticipos($arrayUsuarios);//lnombre del modelo en este caso es anticipos
           
            $Usuarios->insertar();
            $response['idusuario']=$_POST['usuario'];
            echo json_encode($response);
            //header("Location: ../vista/GestionarAnticipos.php");
        } catch (Exception $e) {
            echo $e;
        }
    }

    static public function editar()
    {
        try {
            $arrayUsuarios['ide_usua'] = $_POST['usuario'];
            $arrayUsuarios['precio_anti'] = $_POST['precioAnticipo'];
            $arrayUsuarios['cod_anti'] = $_POST["ideanticipo"];
            $Usuarios = new Anticipos($arrayUsuarios);
           
            $Usuarios->editar();
          //  header("Location: ../vista/GestionarAnticipos.php");
        } catch (Exception $e) {
            header("Location: ../Vista/editarArena.php?respuesta=error");
        }
      // return UsuarioController::buscarID($_GET["id"]);
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
