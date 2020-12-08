/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
*/
var condition = null;

function verificarEmail() {
    console.log('Metodo verificar');
    $('#correo').keyup(function (){
        var email = $('#correo').val();
        var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
        
        if(email.search(patron) == 0) {
            $('#correo1').fadeIn(1000).html('<i class="fas fa-check-circle text-success font-weight-bold"></i>');
        } else {
            $('#correo1').fadeIn(1000).html('<i class="fas fa-exclamation-triangle text-danger font-weight-bold"></i>');
        }
    });
}

function verificacionCorreo(codigo) {
    var nombre = $('#names').val();
    var correo = $('#correo').val();
    
    var datos = 'name='+nombre+'&mail='+correo+'&codigo='+codigo;
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

function verificacionPassword() {
    var conn = $('#pss1').val();
    $('#pss2').keyup(function () {
        var conres = $('#pss2').val();
        if(conres == conn) {
            condition = true;
        } else {
            condition = false;
        }
    });
}

function comprobacion(code) {
    $('#comp-c').keyup(function () {
       var a = $('#comp-c').val();
       if(code == a && condition == true) {
           document.getElementById('btn-registro').disabled=false;
       } 
    });
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
    if(cod_operation == 3) {
        
    }
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
            location.href="http://localhost/EscuelaSecundaria/registrar.php";
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
            location.href="http://localhost/EscuelaSecundaria/datos.php";
        }
    });
}

function eliminar(id) {
    var dato = 'deleteid=' + id;
    
    $.ajax({
        type: 'POST',
        url: "php/delete.php",
        data: dato,
        success: function (data) {
            $('#optionc').fadeIn(1000).html(data);
            location.href='http://localhost/EscuelaSecundaria/datos.php';
        }
    });
}

