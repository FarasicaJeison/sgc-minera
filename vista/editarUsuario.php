<?php
session_start();
if (empty($_SESSION['ide_usua'])) {

    header("Location: login.php");
}
require("../modelo/Usuario.php");
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Usuarios</title>
    <?php require("head.php"); ?>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <?php require("menuizquierda.php"); ?>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                    <br> <br> <br><br><br><br><br>    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">

            <!-- Mobile Menu start -->
            <?php require("menuSuperior.php"); ?>
            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php

        $DataUsuarios = Usuario::buscarForId($_GET["idUsuario"]);

        ?>

        <div class="content">

            <form method="post" action="../controlador/usuarioController.php?action=editar">
                <div class="content">

                    <div class="body">
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <div class="all-form-element-inner">
                                            <div class="col-lg-12 ">
                                                <div class="form-group-inner col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Documento</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <input id="documento" name="documento" type="text" class="form-control" value="<?php echo $DataUsuarios->getIde_usua(); ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Nombres</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <input id="nombUsua" name="nombUsua" type="text" class="form-control" value="<?php echo $DataUsuarios->getNombUsua(); ?>" />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-12 ">

                                                <div class="form-group-inner col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Apellidos</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <input id="apeUsua" name="apeUsua" type="text" class="form-control" value="<?php echo $DataUsuarios->getApeUsua(); ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Telefono</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <input id="telefono" name="telefono" type="text" class="form-control" value="<?php echo $DataUsuarios->getTelefono(); ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 ">
                                                <div class="form-group-inner col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Direccion</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <input name="direccion" type="text" class="form-control" value="<?php echo $DataUsuarios->getDireccion(); ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Nombre Familiar</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <input id="nomFamiliar" name="nomFamiliar" type="text" class="form-control" value="<?php echo $DataUsuarios->getNomFamiliar(); ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group-inner col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Telefono Familiar</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <input name="telFamiliar" id="telFamiliar" type="text" class="form-control" value="<?php echo $DataUsuarios->getTelFamiliar(); ?>" />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group-inner col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Eps</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <div class="form-select-list">
                                                                <select name="eps" id="eps" class="form-control custom-select-value" value="<?php echo $DataUsuarios->getEps(); ?>">
                                                                    <option>Sanitas</option>
                                                                    <option>Nueva eps</option>
                                                                    <option>Medimas</option>
                                                                    <option>Coomeva</option>
                                                                    <option>Eps Familiar</option>
                                                                    <option>Comparta</option>
                                                                    <option>Famisanar</option>


                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Pension</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <div class="form-select-list">
                                                                <select name="pension" id="pension" class="form-control custom-select-value" required>
                                                                    <option>Colpensiones</option>
                                                                    <option>Porvenir</option>



                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 ">
                                                <div class="form-group-inner col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">RH</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <div class="form-select-list">
                                                                <select name="rh" id="rh" class="form-control custom-select-value" name="account" value="<?php echo $DataUsuarios->getRh(); ?>">
                                                                    <option>A+</option>
                                                                    <option>A-</option>
                                                                    <option>B+</option>
                                                                    <option>B-</option>
                                                                    <option>O+</option>
                                                                    <option>O-</option>
                                                                    <option>AB+</option>
                                                                    <option>AB-</option>


                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">rol</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <div class="form-select-list">
                                                                <select name="rol" id="rol" class="form-control custom-select-value" onchange="esconderMostrar(this)" value="<?php echo $DataUsuarios->getRol(); ?>">
                                                                    <option value="Admin">Admin</option>
                                                                    <option value="Empleado">Empleado</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="camposUsuCon" class="form-group-inner col-lg-12">

                                                <div class="form-group-inner col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Usuario</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <input name="usuario" id="usuario" type="TEXT" class="form-control" value="<?php echo $DataUsuarios->getUsuario(); ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Contraseña</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <input name="contrasena" id="contrasena" type="password" class="form-control" value="<?php echo $DataUsuarios->getContrasena(); ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input id="documentowhere" name="documentowhere" type="text" class="form-control" value="<?php echo $DataUsuarios->getIde_usua(); ?>" />

                        <input name="estado" id="estado" type="text" class="form-control hidden" value="<?php echo $DataUsuarios->getEstado(); ?>" />
                        <button type="submit" class="btn btn-primary float-right">Agregar</button>
                        <button type="submit" class="btn btn-secondary float-right" data-dismiss="modal">Cancelar</button>

                    </div>
            </form>

            <br><br>
        </div>
    </div>
    <div class="footer-copyright-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php require("footer.php"); ?>
</body>
<script>
    function esconderMostrar(valor) {
        var camposContraseñaUsuario = document.getElementById("camposUsuCon");
        var camposContraseñaUsuarios = $("#rol").val();

        if (camposContraseñaUsuarios == 'Empleado') {
            camposContraseñaUsuario.style.display = 'none';
        } else {
            camposContraseñaUsuario.style.display = 'block';

        }

    }
</script>

</html>