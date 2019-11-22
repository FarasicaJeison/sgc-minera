<?php
session_start();
$modal = "";

if(!empty($_GET['respuesta'])){
    $modal = "$('#DangerModalalert').show();";

    echo "jeiison ".$_GET['respuesta'];
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login </title>
    <?php require("head.php"); ?>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <div class="error-pagewrap">
        <div class="error-page-int">
            <div class="text-center m-b-md custom-login">

                <img src="img/logo/logosgcminera.jpeg">

            </div>
            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                        <form method="post" action="../controlador/usuarioController.php?action=Login">
                            <div class="form-group">
                                <label class="control-label" for="username">Usuario</label>
                                <input type="text" placeholder="" title="Please enter you username" name="usuario" id="usuario" class="form-control">

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Contraseña</label>
                                <input type="password" title="Please enter your password" placeholder="******" name="contrasena" id="contrasena" class="form-control">

                            </div>
                            <div class="checkbox login-checkbox">
                                <label>


                            </div>

                            <button id="aceptar" type="submit" class="btn btn-primary">Aceptar</button>
                            <a class="Danger danger-color" href="#" data-toggle="modal" data-target="#DangerModalalert">Danger</a>

                        </form>
                    </div>
                </div>
            </div>
            <div class="text-center login-footer">
                <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
            </div>
        </div>
    </div>
    <?php require("footer.php"); ?>


    <div id="DangerModalalert" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
                <div class="modal-body">
                    <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                    <h2>Danger!</h2>
                    <p>The Modal plugin is a dialog box/popup window that is displayed on top of the current page</p>
                </div>
                <div class="modal-footer danger-md">

                </div>
            </div>
        </div>
    </div>
</body>
<script>
        $("#aceptar").click(function(e) {
            $modal = "";
		$.ajax({
			async:false,
			type: $("#formulario").attr("method"),
			url: $("#formulario").attr("action"),
            data: $("#formulario").serialize()
			})
			.done(function( msg ) {
                console.log("jeiison ballesteros");
				$modal = "$('#DangerModalalert').show();";
			});
	});
 
</script>

</html>