<?php
require_once('../modelo/Anticipos.php');

if (!empty($_GET['action'])) {
   
    anticiposController::main($_GET['action']);
} else {
    echo "No se encontro ninguna accion...";
}

class anticiposController
{

    static function main($action)
    {
        if ($action == "crear") {
            anticiposController::crear();
        }else{
            echo "hola";
        }
    }
    

    static public function crear()
    {
        
        try {
            $arrayAnticipos = array();
           
            $arrayAnticipos['ide_usua'] = $_POST['usuario'];
            $arrayAnticipos['precioAnticipo'] = $_POST['precioAnticipo'];
            
            $anticipos = new Anticipos($arrayAnticipos);
            
            $anticipos->insertar();
            header("Location: ../vista/GestionarAnticipos.php");
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
