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
                        <br> <br> <br><br><br><br><br>
                    </div>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <p> </p>

        <div class="courses-area mg-b-15">
            <div class="data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="sparkline13-list">


                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd ">
                                        <b>
                                            <font color="Gray" face="Times New Roman" size=5>
                                                Datos Empleados</font>
                                        </b>

                                        <p> </p>

                                        <div class="breadcome-area">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <p> </p>
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                                            Nuevo
                                        </button>
                                        <br> <br>
                                    </div>
                                </div>
                                <div class="sparkline13-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">

                                        <table id="table" data-toggle="table" data-pagination="true" data-search="true">
                                            <thead>
                                                <tr>
                                                    <th>Documento</th>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>

                                                    <th>Celular</th>
                                                    <th>Telefono Familiar</th>
                                                    <th>Riesgos</th>
                                                    <th>Eps</th>
                                                    <th>Pension</th>
                                                    <th>Rh</th>

                                                    <th>Usuario</th>
                                                    <th>Acciones</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                              
                                                <?php
                                                $arrayUsuarios = Usuario::getAll();
                                                foreach ($arrayUsuarios as $Usuarios) {
                                                    ?>
                                                    <tr>


                                                        <td><?php echo $Usuarios->getIde_usua(); ?></td>
                                                        <td><?php echo $Usuarios->getNombUsua(); ?></td>
                                                        <td><?php echo $Usuarios->getApeUsua(); ?></td>

                                                        <td><?php echo $Usuarios->getTelefono(); ?></td>
                                                        <td><?php echo $Usuarios->getTelFamiliar(); ?></td>
                                                        <td><?php echo $Usuarios->getRiesgos(); ?></td>
                                                        <td><?php echo $Usuarios->getEps(); ?></td>
                                                        <td><?php echo $Usuarios->getPension(); ?></td>
                                                        <td><?php echo $Usuarios->getRh(); ?></td>

                                                        <td><?php echo $Usuarios->getUsuario(); ?></td>
                                                        <td>
                                                            <a href="editarUsuario.php?idUsuario=<?php echo $Usuarios->getIde_usua(); ?>" title="Eliminar" class="btn btn-primary btn-circle btn-sm"> <span class="fas fa-pencil-alt " style='color:white'></span></a>
                                                            <a href="../controlador/usuarioController.php?action=inactivarUsuario&idUsuario=<?php echo $Usuarios->getIde_usua(); ?>" title="Eliminar" class="btn btn-danger btn-circle btn-sm"> <span class="fas fa-trash" style='color:white'></span></a>
                                                        </td>


                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <form method="post" action="../controlador/usuarioController.php?action=registro">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar persona</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"></span>
                            </button>
                        </div>
                        <div class="modal-body">
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
                                                                <input id="documento" name="documento" type="text" class="form-control" value="" required/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner col-lg-6">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Nombres</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input id="nombUsua" name="nombUsua" type="text" class="form-control" required/>
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
                                                                <input id="apeUsua" name="apeUsua" type="text" class="form-control" required/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner col-lg-6">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Telefono</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input id="telefono" name="telefono" type="number" class="form-control" required/>
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
                                                                <input name="direccion" type="text" class="form-control" required/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner col-lg-6">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Nombre Familiar</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input id="nomFamiliar" name="nomFamiliar" type="text" class="form-control" required/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group-inner col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Telefono
                                                                    Familiar</label>
                                                            </div>
                                                            <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
                                                                <input name="telFamiliar" id="telFamiliar" type="number" class="form-control" required/>
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
                                                                    <select name="eps" id="eps" class="form-control custom-select-value" required>
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
                                                                    <select name="rh" id="rh" class="form-control custom-select-value" name="account" required>
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
                                                                    <select name="rol" id="rol" class="form-control custom-select-value" onchange="esconderMostrar(this)">
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
                                                                <input name="usuario" id="usuario" type="TEXT" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner col-lg-6">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Contraseña</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input name="contrasena" id="contrasena" type="password" class="form-control" />
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
                        <div class="modal-footer">

                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    &nbsp;
    <p> </p>
    &nbsp;

    &nbsp;
    <p> </p>
    &nbsp;

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