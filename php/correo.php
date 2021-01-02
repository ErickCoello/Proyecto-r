<head>
    <link rel="stylesheet" type="text/css" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="js/principal.js"></script>
</head>
<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Se inclyen los archivos necesarios
include '../config/bd.php';
include '../controladores/Conector.php';
include '../controladores/CRUD.php';

//Se intanacian las clases.
$objConnect =  new Conectar();
$onjOperation = new Operaciones('', $objConnect);
$consultaEmail = $onjOperation->getRelacional('email', 'users', 'email="'.$_POST['correo'].'"', true);

    if($consultaEmail[0] == $_POST['correo']){
        echo "<script type='text/javascript'>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'El correo ingresado ya existe.',
                showConfirmButton: false,
                timer: 2000
              });
              </script>";
    } else {
        echo '<button type="button" class="btn btn-primary mb-button" onclick="verificacionCorreo()">Enviar c&oacute;digo</button>';
    }