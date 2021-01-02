/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
*/

function verificarEmail() {
        $('#correo').keyup(function (){
        var email = $('#correo').val();
        var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
        
        if(email.search(patron) == 0) {
            $('#correo1').fadeIn(1000).html('<i class="fas fa-check-circle text-success font-weight-bold"></i>');
            var a = 'correo='+email;
            $.ajax({
                url: "php/correo.php",
                type: 'POST',
                data: a,
                success: function (data) {
                    $('#btn-correo_verificator').fadeIn(1000).html(data);
                }
            });
        } else {
            $('#correo1').fadeIn(1000).html('<i class="fas fa-exclamation-triangle text-danger font-weight-bold"></i>');
        }
    });
}

function verificacionCorreo() {
    var nombre = $('#names').val();
    var correo = $('#correo').val();
    
    var datos = 'names='+nombre+'&mail='+correo;
    $.ajax({
        url: "php/verificador.php",
        type: 'POST',
        data: datos,
        success: function (data) {
            //console.log(data);
            $('#resultado_user').fadeIn(1000).html(data);
        }
    });
}

function enviarCorreo() {
    console.log('Entra al else');
        var recuperacion = new FormData($('#form-recuperar')[0]);
        $.ajax({
            url: "php/accesso.php",
            type: 'POST',
            data: recuperacion,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#mensaje-user').fadeIn(1000).html(data);
            }
        });
}

function verificacionPassword(valor) {
    if(valor == true) {
        var conn = $('#pss1').val();
    $('#pss2').keyup(function () {
        var conres = $('#pss2').val();
        if(conres == conn) {
            $('#advertencia_pss').fadeIn(1000).html('<i class="bg-light fas fa-check-circle text-success font-weight-bold icon-warning"></i>');
        } else {
            $('#advertencia_pss').fadeIn(1000).html('<i class="bg-dark fas fa-exclamation-triangle text-danger font-weight-bold icon-warning"></i>');
        }
    });
    }
    
    if(valor == null) {
        var conn = $('#new-pss1').val();
        $('#new-pss2').keyup(function () {
        var conres = $('#new-pss2').val();
        if(conres == conn) {
            $('#msj-pss').fadeIn(1000).html('<i class="fas fa-check-circle text-success font-weight-bold icon-warning"></i>');
        } else {
            $('#msj-pss').fadeIn(1000).html('<i class="fas fa-exclamation-triangle text-danger font-weight-bold icon-warning"></i>');
        }
    });

    }
}

function userSesion(cod_operation) {
    if(cod_operation == 1) {
        var form_user = new FormData($('#form-user-r')[0]);
        $.ajax({
            url: "php/accesso.php",
            type: 'POST',
            data: form_user,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#resultado_user').fadeIn(1000).html(data);
            }
        });
    }
    if(cod_operation == 2) {
            var form_dato = new FormData($('#form-login')[0]);
            $.ajax({
                url: "php/accesso.php",
                type: 'POST',
                data: form_dato,
                contentType: false,
                processData: false,
                success: function (data) {
                    $('#login-rest').fadeIn(1000).html(data);
                }
            });
    }
}

function recuperarUsuario() {
    console.log('metodo recuperarusuario');
    var recuperacion_form = new FormData($('#form-user-recuperacion')[0]);
    $.ajax({
        url: "php/accesso.php",
        type: 'POST',
        data: recuperacion_form,
        contentType: false,
        processData: false,
        success: function (data) {
            $('#recuperacion').fadeIn(1000).html(data);
        }
    });
}

function addDate() {
    var formulario = new FormData($('#form-dato')[0]);
    $.ajax({
        url: "php/add.php",
        type: 'POST',
        data: formulario,
        contentType: false,
        processData: false,
        success: function (data) {
            $('#rest').fadeIn(1000).html(data);
        }
    });
}

function consultar() {
    var dat = new FormData($('#form-search')[0]);
    $.ajax({
        url: "php/get.php",
        type: 'POST',
        data: dat,
        contentType: false,
        processData: false,
        success: function (data) {
            $('#table_content').fadeIn(1000).html(data);
        }
    });
}

function actualizar() {
    var form_actualizado = new FormData($('#update-form')[0]);
    
    $.ajax({
       url: 'php/update.php',
        type: 'POST',
        data: form_actualizado,
        contentType: false,
        processData: false,
        success: function (data) {
            $('#updateRes').fadeIn(1000).html(data);
        }
    });
}

function eliminar(id) {
    Swal.fire({
        title: '¿Desea realizar esta operación?',
        text: 'Al confirmar, no podra revertir los cambios',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
        if(result.isConfirmed){
            var dato = 'deleteid=' + id;
    
            $.ajax({
                type: 'POST',
                url: "php/delete.php",
                data: dato,
                success: function (data) {
                    $('#optionc').fadeIn(1000).html(data);
                }
            });
        }
    });
}


// Register Script

function FontAwesome() {

	wp_register_script( 'FontAwesomeBrands', 'fontawesome-free-5.14.0-web/js/brands.min.js', false, false, true );
	wp_enqueue_script( 'FontAwesomeBrands' );

	wp_register_script( 'FontAwesomeSolid', 'fontawesome-free-5.14.0-web/js/solid.min.js', false, false, true );
	wp_enqueue_script( 'FontAwesomeSolid' );

	wp_register_script( 'FontAwesomeShims', 'fontawesome-free-5.14.0-web/js/v4-shims.min.js', false, false, true );
	wp_enqueue_script( 'FontAwesomeShims' );

	wp_register_script( 'FontAwesomeFA', 'fontawesome-free-5.14.0-web/js/fontawesome.min.js', false, false, true );
	wp_enqueue_script( 'FontAwesomeFA' );
        
        add_action( 'wp_enqueue_scripts', 'FontAwesome' );
}