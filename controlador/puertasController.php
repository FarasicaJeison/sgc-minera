<?php
require_once('../modelo/Puertas.php');

if (!empty($_GET['action'])) {
   
    puertasController::main($_GET['action']);
} else {
    echo "No se encontro ninguna accion...";
}

class puertasController
{

    static function main($action)
    {
        if ($action == "crear") {
           
            puertasController::crear();
        }else if($action == 'inactivarPuertas'){
            puertasController::inactivarPuertas();
        }
    }

    static public function inactivarPuertas()
    {
        try {
           
            $ObjEspecialidad = puertas::buscarForId($_GET['idPuerta']);
            $ObjEspecialidad->setEstado(0);
            $ObjEspecialidad->editar();
            header("Location: ../vista/Gestionarpuertas.php");
        } catch (Exception $e) {
            header("Location: ../vista/gestionarPedidos.php?respuest=error");
        }
    }

    static public function crear()
    {
        try {
            $arrayPuertas = array();
            $arrayPuertas['precio'] = $_POST['precio'];
            $arrayPuertas['tramo'] = $_POST['tramo'];
            $puertas = new puertas($arrayPuertas);
            $puertas->insertar();
            header("Location: ../vista/Gestionarpuertas.php");
        } catch (Exception $e) {
            echo $e;
        }
    }

    static public function editar()
    {
        try {
            $arrayEspecialidad = array();
            $arrayEspecialidad['Nombre'] = $_POST['Nombres'];
            $arrayEspecialidad['Valor'] = $_POST['Valor'];
            $arrayEspecialidad['idTipoArena'] = $_POST['idTipoArena'];
            $especial = new puertas($arrayEspecialidad);
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
