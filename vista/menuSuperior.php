<?php
session_start();

?>
<div class="header-advance-area">
    <div class="header-top-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="header-top-wraper">
                        <div class="row">
                            <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                <div class="menu-switcher-pro">
                                    <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                        <i class="educate-icon educate-nav"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">

                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <div class="header-right-info float-center">
                                    <br>
                                        <span class="">
                                            <font color="White" face="Times New Roman,arial" size=5> <?php echo $_SESSION['nombUsua']; ?>
                                            </font>
                                        </span>
                                        <div class="float-right">
                                            <a href="../controlador/usuarioController.php?action=CerrarSession" class="btn btn-default btn-flat" style="border-color: #00a1dc">Cerrar Sesión</a>

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