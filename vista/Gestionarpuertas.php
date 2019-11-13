<?php
require("../modelo/Puertas.php") ?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Gestionar Puertas</title>
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
                        <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
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
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="courses-area mg-b-15">
            <div class="data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="sparkline13-list">
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd ">
                                        Gestionar Puertas
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                                            Nuevo
                                        </button>
                                        <br><br>
                                    </div>
                                </div>
                                <div class="sparkline13-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">

                                        <table id="table" data-toggle="table" data-pagination="true" data-search="true">
                                            <thead>
                                                <tr>


                                                    <th>Codigo Puerta</th>
                                                    <th>Fecha</th>
                                                    <th>Precio</th>
                                                    <th>Tramo</th>
                                                    <th>Acciones</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $arrayPuertas = Puertas::getAll();
                                                foreach ($arrayPuertas as $puertas) {

                                                    ?>
                                                    <tr>

                                                        <td><?php echo $puertas->getCod_puer(); ?></td>
                                                        <td><?php echo $puertas->getFecha_creacion(); ?></td>
                                                        <td><?php echo $puertas->getPrecio_puer(); ?></td>
                                                        <td><?php echo $puertas->getTramo(); ?></td>
                                                        <td>
                                                            <a href="editarpuerta.php?idpuerta=<?php echo $puertas->getCod_puer(); ?>" title="Eliminar" class="btn btn-primary btn-circle btn-sm"> <span class="fas fa-pencil-alt " style='color:white'></span></a>
                                                            <a href="../controlador/puertasController.php?action=inactivarPuertas&idPuerta=<?php echo $puertas->getCod_puer(); ?>" title="Eliminar" class="btn btn-danger btn-circle btn-sm"> <span class="fas fa-trash" style='color:white'></span></a>
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
            <div class="modal-dialog" role="document">
                <form method="post" action="../controlador/puertasController.php?action=crear">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Puerta</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 ">
                                            <div class="all-form-element-inner">


                                                <div class="form-group-inner col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Precio</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
                                                            <input id="precio" name="precio" type="text" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group-inner col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Tramo</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
                                                            <input id="tramo" name="tramo" type="text" class="form-control" />
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
                    </div>
                </form>
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

</html>