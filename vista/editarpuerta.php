<?php
session_start();
if (empty( $_SESSION['ide_usua'])){
    
    header("Location: login.php");
}
require("../modelo/Puertas.php");
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Puertas</title>
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
       
        <?php
        
            $DataPuertas = Puertas::buscarForId($_GET["idpuerta"]);
          
        ?>
       
        <div class="content">
                        
        <form method="post" action="../controlador/puertasController.php?action=crear">

<div class="content">
   
    <div class="body">
        <div class="sparkline12-graph">
            <div class="basic-login-form-ad">
                <div class="row">
                    <div class="col-lg-11 ">
                        <div class="all-form-element-inner">


                            <div class="form-group-inner col-lg-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="login2 pull-right pull-right-pro">Precio</label>
                                    </div>
                                    <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
                                        <input id="precio" name="precio" type="text" class="form-control" value="<?php echo $DataPuertas->getPrecio_puer(); ?>" />
                                    </div>
                                </div>
                            </div>


                            <div class="form-group-inner col-lg-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="login2 pull-right pull-right-pro">Tramo</label>
                                    </div>
                                    <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
                                        <input id="tramo" name="tramo" type="text" class="form-control" value="<?php echo $DataPuertas->getTramo(); ?>"/>
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


</html>