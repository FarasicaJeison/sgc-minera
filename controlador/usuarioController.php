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
        if ($action == "crear") {
            UsuarioController::crear();
        }else{
            echo "hola";
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

    /*  static public function selectEspecialista ($isRequired=true, $id="idPedidos", $nombre="idPeidos", $class=""){
    $arrEspecialistas = Pedidos::getAll(); 
    $htmlSelect = "<select ".(($isRequired) ? "required" : "")." id= '".$id."' name='".$nombre."' class='".$class."'>";
    $htmlSelect .= "<option >Seleccione</option>";
    if(count($arrEspecialistas) > 0){
        foreach ($arrEspecialistas as $especialista)
            $htmlSelect .= "<option value='".$especialista->getIdPedidos()."'>".$especialista->getCantidad()." ".$especialista->getTransporte()." ".$especialista->getCliente()."</option>";
    }
    $htmlSelect .= "</select>";
    return $htmlSelect;
}*/


    static public function editar()
    {
        try {
            $arrayEspecialidad = array();
            $arrayEspecialidad['Nombre'] = $_POST['Nombres'];
            $arrayEspecialidad['Valor'] = $_POST['Valor'];
            $arrayEspecialidad['idTipoArena'] = $_POST['idTipoArena'];
            $especial = new Arena($arrayEspecialidad);
            //var_dump($arrayEspecialidad);
            $especial->editar();
            header("Location: ../Vista/indexA.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/editarArena.php?respuesta=error");
        }
    }


    static public function ActivarEspecialidad()
    {
        try {
            $ObjEspecialidad = Pedidos::buscarForId($_GET['IdPedidos']);
            $ObjEspecialidad->setEstado("Activo");
            $ObjEspecialidad->editar();
            header("Location: ../Vista/gestionarPedidos.php");
        } catch (Exception $e) {
            header("Location: ../Vista/gestionarPedidos.php?respuestaA=error");
        }
    }

    static public function InactivarEspecialidad()
    {
        try {
            $ObjEspecialidad = Especialidad::buscarForId($_GET['idPedidos']);
            $ObjEspecialidad->setEstado("Inactivo");
            $ObjEspecialidad->editar();
            header("Location: ../Vista/gestionarPedidos.php");
        } catch (Exception $e) {
            header("Location: ../Vista/gestionarPedidos.php?respuestaD=error");
        }
    }

    static public function buscarID($id)
    {
        try {
            return Arena::buscarForId($id);
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
