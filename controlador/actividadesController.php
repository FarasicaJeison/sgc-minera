<?php
require_once('../modelo/Actividades.php');

if (!empty($_GET['action'])) {
    ActividadesController::main($_GET['action']);
} else {
    echo "No se encontro ninguna accion...";
}

class ActividadesController
{

    static function main($action)
    {
        if ($action == "crear") {
            ActividadesController::crear();
        }else if($action=="inactivarActividad"){
            ActividadesController::inactivarActividad();
        }
    }
    static public function inactivarActividad()
    {
        
        try {
           
            $ObjEspecialidad = Actividades::buscarForId($_GET['idActividiad']);
            $ObjEspecialidad->setEstado(0);
            $ObjEspecialidad->editar();
            header("Location: ../vista/GestionarACtividades.php");
        } catch (Exception $e) {
            header("Location: ../vista/gestionarPedidos.php?respuest=error");
        }
    }
    static public function crear()
    {

        try {
            $arrayActividades = array();
            $arrayActividades['Cod_act'] = "";
            $arrayActividades['fecha'] = "";
            $arrayActividades['ide_usua'] = $_POST['usuario'];
            $arrayActividades['actividad'] = $_POST['actividad'];
            $arrayActividades['pago'] = $_POST['pago'];
            $arrayActividades['desde'] = $_POST['puertaInicial'];
            $arrayActividades['hasta'] = $_POST['puertaFinal'];
            $actividad = new Actividades($arrayActividades);
            $actividad->insertar();
            header("Location: ../vista/GestionarACtividades.php");
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
            $especial = new Arena($arrayEspecialidad);
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
