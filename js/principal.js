/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
*/
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