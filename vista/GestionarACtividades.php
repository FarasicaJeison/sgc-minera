<?php
session_start();
if (empty( $_SESSION['ide_usua'])){
    
    header("Location: login.php");
}
require("../modelo/Actividades.php") ?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Actividades</title>
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
                    <br> <br> <br><br><br><br><br>      </div>
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




        <div class="courses-area mg-b-15">
            <div class="data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="sparkline13-list">
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd ">
                                    <b><font color="Gray" face="Times New Roman" size=5 >
                                    Gestionar Actividades</font></b>
                                                              
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


                                                    <th>Empleado</th>
                                                    <th>Actividad</th>
                                                    <th>Pago</th>
                                                    <th>Fecha</th>
                                                    <th>Desde</th>
                                                    <th>Hasta</th>
                                                    <th>acciones</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $arrayActividades = Actividades::getAll();
                                                foreach ($arrayActividades as $Actividades) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $Actividades->getNombUsua(); ?></td>

                                                        <td><?php echo $Actividades->getActividad(); ?></td>
                                                        <td><?php echo $Actividades->getPago(); ?></td>
                                                        <td><?php echo $Actividades->getFecha(); ?></td>
                                                        <td><?php echo $Actividades->getDesde(); ?></td>
                                                        <td><?php echo $Actividades->getHasta(); ?></td>
                                                        <td>
                                                            <a href="editarActividad.php?idActividad=<?php echo $Actividades->getcod_act(); ?>" title="Actualizar" class="btn btn-primary btn-circle btn-sm"> <span class="fas fa-pencil-alt " style='color:white'></span></a>
                                                            <a href="../controlador/actividadesController.php?action=inactivarActividad&idActividiad=<?php echo $Actividades->getcod_act(); ?>" title="Eliminar" class="btn btn-danger btn-circle btn-sm"> <span class="fas fa-trash" style='color:white'></span></a>
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
                <form method="post" action="../controlador/actividadesController.php?action=crear">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Actividad</h5>
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
                                                    <div class="form-group-inner col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Usuario</label>
                                                            </div>
                                                            <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
                                                                <div class="form-select-list">
                                                                    <?php Actividades::selectUsuario(true, "new-todo", "new-todo", "form-control"); ?>
                                                                </div>
                                                                <br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner"></div>
                                                <br>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group-inner col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Actividad</label>
                                                        </div>
                                                        <div class="col-lg-8 col-md-9 col-sm-9 col-xs-12">
                                                            <div class="form-select-list">
                                                                <select class="form-control custom-select-value" name="actividad" required>
                                                                    <option value="">Seleccione</option>
                                                                    <option value="Picada">Picada</option>
                                                                    <option value="Embasada">Embasada</option>
                                                                    <option value="Malacateada">Malacateada</option>
                                                                    <option value="Arrumo">Arrumo</option>
                                                                    <option value="Puerta">Puerta</option>
                                                                    <option value="Cargue Volqueta">Cargue Volqueta</option>
                                                                    <option value="Laja">Laja</option>
                                                                    <option value="Ministra">Ministra</option>
                                                                    <option value="Rieles">Rieles</option>
                                                                    <option value="Tramos">Tramos</option>
                                                                    <option value="Palancas">Palancas</option>
                                                                    <option value="Tapas">Tapas</option>
                                                                    <option value="Descargo">Descargo</option>
                                                                    <option value="Tacos">Tacos</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Pago
                                                            </label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
                                                            <input type="text" class="form-control" name="pago" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="all-form-element-inner">
                                                    <div class="col-lg-12 ">
                                                        <div class="form-group-inner col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                                    <label class="login2 pull-right pull-right-pro">Puerta Inicial</label>
                                                                </div>
                                                                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
                                                                    <div class="form-select-list">
                                                                        <?php Actividades::selectPuerta(true,  "new-todo", "new-todo", "form-control"); ?> 
                                                                    </div>
                                                                    <br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner"></div> 
                                                    <br>
                                                </div>
                                                <div class="all-form-element-inner">
                                                    <div class="col-lg-12 ">
                                                        <div class="form-group-inner col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                                    <label class="login2 pull-right pull-right-pro">Puerta Final</label>
                                                                </div>
                                                                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
                                                                    <div class="form-select-list">
                                                                        <?php Actividades::selectPuertafinal(true, "new-todo", "new-todo", "form-control"); ?>
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
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

</body>

</html>