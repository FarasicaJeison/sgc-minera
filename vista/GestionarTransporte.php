<?php
session_start();
if (empty( $_SESSION['ide_usua'])){
    
    header("Location: login.php");
}
require("../modelo/Transportedecarga.php") ?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Transportedecarga</title>
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
                    <br> <br> <br><br><br><br><br>         </div>
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
                                    <b><font color="Gray" face="Times New Roman" size=5 >
                                    Gestionar Transporte</font></b>
                                                              
                                    <p> </p>

                                        
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


                                                    <th>Usuario</th>
                                                    <th>Codigo puerta</th>
                                                    <th>Acciones</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $arrayTransportedecarga = Transportedecarga::getAll();
                                                foreach ($arrayTransportedecarga as $Transportedecarga) {

                                                    ?>
                                                    <tr>

                                                        <td><?php echo $Transportedecarga->getNombUsua(), "--" . $Transportedecarga->getIde_usua(); ?></td>
                                                        <td><?php echo $Transportedecarga->getCod_puer(); ?></td>
                                                        <td>
                                                            <a href="editarTransporteCoche.php?idTransporte=<?php echo $Transportedecarga->getcod_trans(); ?>" title="Eliminar" class="btn btn-primary btn-circle btn-sm"> <span class="fas fa-pencil-alt " style='color:white'></span></a>
                                                            <a href="../controlador/transporteController.php?action=inactivarTransporte&idtransporte=<?php echo $Transportedecarga->getcod_trans(); ?>" title="Eliminar" class="btn btn-danger btn-circle btn-sm"> <span class="fas fa-trash" style='color:white'></span></a>
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
                <div class="modal-content">
                    <form method="post" action="../controlador/transporteController.php?action=crear">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Transporte Carga</h5>
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

                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Usuario</label>
                                                            </div>
                                                            <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
                                                                <div class="form-select-list">
                                                                    <?php Transportedecarga::selectUsuario(true, "new-todo", "new-todo", "form-control"); ?>
                                                                </div>
                                                                <br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="all-form-element-inner">
                                                    <div class="col-lg-12 ">
                                                        <div class="form-group-inner col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                                    <label class="login2 pull-right pull-right-pro">Puerta Inicial</label>
                                                                </div>
                                                                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
                                                                    <div class="form-select-list">
                                                                        <?php Transportedecarga::selectPuerta(true, "new-todo", "new-todo", "form-control"); ?>
                                                                    </div>
                                                                    <br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner"></div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                </div>
                </form>
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

</html>