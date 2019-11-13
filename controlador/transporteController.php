<?php
require_once('../modelo/Transportedecarga.php');

if (!empty($_GET['action'])) {
    transporteController::main($_GET['action']);
} else {
    echo "No se encontro ninguna accion...";
}

class transporteController
{

    static function main($action)
    {
        if ($action == "crear") {
            transporteController::crear();
        }else if($action=="inactivarTransporte"){
            transporteController::inactivarTransporte();
        }
    }
    static public function inactivarTransporte()
    {
        
        try {
          
            $ObjEspecialidad = Transportedecarga::buscarForId($_GET['idtransporte']);
            $ObjEspecialidad->setEstado(0);
            $ObjEspecialidad->editar();
            header("Location: ../vista/GestionarTransporte.php");
        } catch (Exception $e) {
           header("Location: ../vista/GestionarTransporte.php?respuest=error");
        }
    }

    static public function crear()
    {

        try {
            $arrayTransporte = array();
            $arrayTransporte['usuario'] = $_POST['usuario'];
            $arrayTransporte['puertaInicial'] = $_POST['puertaInicial'];
            $actividad = new Transportedecarga($arrayTransporte);
            $actividad->insertar();
            header("Location: ../vista/GestionarTransporte.php");
        } catch (Exception $e) {
            echo $e;
        }
    }

    static public function editar()
    {
        try {
            $arrayTransporte = array();
            $arrayTransporte['usuario'] = $_POST['usuario'];
            $arrayTransporte['puertaInicial'] = $_POST['puertaInicial'];
            $especial = new Transportedecarga($arrayTransporte);
            //var_dump($arrayEspecialidad);
            $especial->editar();
            header("Location: ../Vista/indexA.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/editarArena.php?respuesta=error");
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
