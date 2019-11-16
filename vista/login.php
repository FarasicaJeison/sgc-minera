<?php
session_start();

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
                                <input type="text" placeholder="example@gmail.com" title="Please enter you username"  name="usuario" id="usuario" class="form-control">
                              
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Contraseña</label>
                                <input type="password" title="Please enter your password" placeholder="******"  name="contrasena" id="contrasena" class="form-control">
                              
                            </div>
                            <div class="checkbox login-checkbox">
                                <label>
										
                                
                            </div>
                            <button type="submit" class="btn btn-secondary">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                           
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
</body>
<script>

    $("#frmLoginn").submit(function(e) {
        //alert("Hola Mundo Otro");
        e.preventDefault();
        var User = $("#usuario").val();
        var Password = $("#contrasena").val();
        
        $.ajax({
            method: "POST",
            url: "../controlador/usuarioController.php?action=Login",
            data: { User: User, Password: Password}
        })

        .done(function( msg ) {
            if(msg == 1){
                window.location.href = "gestionarUsuario.php";
            }else{
                $("#resultado").html(msg);
            }
        });
    });
</script>

</html>