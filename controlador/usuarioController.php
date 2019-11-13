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
            UsuarioController::crear();
        } else if ($action == "inactivarUsuario") {
            UsuarioController::inactivarUsuario();
        } else if ($action == "buscarID") {
            UsuarioController::buscarID($_GET['idUsuario']);
        }else if ($action == "Login") {
            UsuarioController::Login();
        }
    }
    public function Login()
    {  
        echo "jeiison entro";
        try {
         
            $User = $_POST['usuario'];
            $Password = $_POST['contrasena'];

            if (!empty($User) && !empty($Password)) {
                $respuesta = Usuario::Login($User, $Password);
                if (is_array($respuesta)) {
                    $_SESSION['ide_usua'] = $respuesta['ide_usua'];
                    $_SESSION['nombUsua'] = $respuesta['nombUsua'];
                    $_SESSION['apeUsua'] = $respuesta['apeUsua'];
                    echo TRUE;
                } else if ($respuesta == "Password Incorrecto") {
                    echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                    echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                    echo "<strong>Error!</strong> La Contraseña No Coincide Con El Usuario</p>";
                    echo "</div>";
                } else if ($respuesta == "No existe el usuario") {
                    echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                    echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                    echo "<strong>Error!</strong> No Existe Un Usuario Con Estos Datos</p>";
                    echo "</div>";
                }
            } else {
                echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                echo "<strong>Error!</strong> Datos Vacios</p>";
                echo "</div>";
            }
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
