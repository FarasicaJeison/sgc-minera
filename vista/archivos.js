function guardarAnticipos(e) {
    //
    e.stopPropagation();
    e.preventDefault();
    var nom = $('#usuario').val();
    var ced = $('#precioAnticipo').val();
    var opcion = confirm("Esta seguro de hacer el anticipo al usuario "+nom);
    if(opcion == true){

            if (nom != '' && ced != '' ) {
            $.ajax({
                url: '../controlador/anticiposController.php',
                type: 'POST',
                data: {
                    usuario: nom,
                    precioAnticipo: ced,
                    action: 'crear'
                },
                dataType: 'json',
                success: function(response) {
                
                location.href="GestionarAnticipos.php";
                },
                error: function(e) {
                    console.error(e);
                    location.href="GestionarAnticipos.php";
                
                }
            });
        } else {
            $('#resultado').append('<p>No se llenaron los datos</p>');
        }
    }else{

    }
    return

}

function guardarNomina(e) {
    //
    e.stopPropagation();
    e.preventDefault();
    var nom = $('#usuario').val();
    var fechaInicial=$('#inicio').val();
    var fechaFinal=$('#final').val();
  
    var opcion = confirm("Esta seguro de hacer el pago de nomina al usuario "+nom);
    if(opcion == true){

            if (nom != '' ) {
            $.ajax({
                url: '../controlador/nominaController.php',
                type: 'POST',
                data: {
                    usuario: nom,
                    inicio: fechaInicial,
                    final: fechaFinal,
                  
                    action: 'crear'
                },
                dataType: 'json',
                success: function(response) {
                
                location.href="GestionarNomina.php";
                },
                error: function(e) {
                    console.error(e);
                    location.href="GestionarNomina.php";
                
                }
            });
        } else {
            $('#resultado').append('<p>No se llenaron los datos</p>');
        }
    }else{

    }
    return

}