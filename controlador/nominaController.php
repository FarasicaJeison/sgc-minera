<?php
require_once('../modelo/Nomina.php');

if (!empty($_GET['action'])) {
    NominaController::main($_GET['action']);
} else {
    echo "No se encontro ninguna accion...";
}

class NominaController
{

    static function main($action)
    {
        if ($action == "crear") {
            NominaController::crear();
        }else if($action=="inactivarActividad"){
            NominaController::inactivarActividad();
        }else if($action=="editar"){
            NominaController::editar();
        }
    }
    
   
    static public function calcularanticipostotal(){
        $arrayNomina = Nomina::descuento();
    }




    static public function crear()
    {
        $precionomina = Nomina::buscarprecio($_POST['inicio'],$_POST['final'],$_POST['usuario']);
        $preciodescuento= Nomina::buscardescuento($_POST['inicio'],$_POST['final'],$_POST['usuario']);
        try {
            
            $arrayActividades = array();
         
            $arrayActividades['ide_usua'] = $_POST['usuario'];
            $arrayActividades['precio'] = ($precionomina->getPago()-$preciodescuento->getTotalAnticipo());
            $arrayActividades['desde'] = $_POST['inicio'];
            $arrayActividades['hasta'] = $_POST['final'];
            $actividad = new Nomina($arrayActividades);
            $actividad->insertar();
            header("Location: ../vista/GestionarNomina.php");
        } catch (Exception $e) {
            echo $e;
        }
    }

    static public function editar()
    {
        try {
            $arrayActividades = array();
            $arrayActividades['cod_act']=$_POST['idactividad'];
            $arrayActividades['ide_usua'] = $_POST['usuario'];
            $arrayActividades['actividad'] = $_POST['actividad'];
            $arrayActividades['pago'] = $_POST['pago'];
            $arrayActividades['desde'] = $_POST['puertaInicial'];
            $arrayActividades['hasta'] = $_POST['puertaFinal'];
            $arrayActividades['estado'] = $_POST['estado'];
            $actividad = new Actividades($arrayActividades);
            //var_dump($arrayEspecialidad);
            $actividad->editar();
            header("Location: ../vista/GestionarACtividades.php");
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
