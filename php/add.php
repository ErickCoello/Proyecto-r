<head>
    <link rel="stylesheet" type="text/css" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
</head>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../config/bd.php';
include '../controladores/Conector.php';
include '../controladores/CRUD.php';
include '../controladores/Ventanas.php';

$grado1 = '';
$grado2 = '';
$grado3 = '';

$cpri = '';
$b1 = '';
$b2 = '';
$b3 = '';
$csec = '';
$curp = '';
// --------------------Variables de Grdos cursados-----------------------------------
if(!empty($_POST['gr1'])){
    $grado1 = 'X';
} else {
    $grado1 = '-';
}

if(!empty($_POST['gr2'])){
    $grado2 = 'X';
} else {
    $grado2 = '-';
}

if(!empty($_POST['gr3'])){
    $grado3 = 'X';
} else {
    $grado3 = '-';
}

// ------------------------ Documentos existentes ------------------------
if(!empty($_POST['cp'])){
    $cpri = 'X';
} else {
    $cpri = '-';
}

if(!empty($_POST['b1'])){
    $b1 = 'X';
} else {
    $b1 = '-';
}

if(!empty($_POST['b2'])){
    $b2 = 'X';
} else {
    $b2 = '-';
}

if(!empty($_POST['b3'])){
    $b3 = 'X';
} else {
    $b3 = '-';
}

if(!empty($_POST['cs'])){
    $csec = 'X';
} else {
    $csec = '-';
}

if(!empty($_POST['curp'])){
    $curp = 'X';
} else {
    $curp = '-';
}

$datos_save = array($_POST['nombres'], $grado1, $grado2, $grado3, $cpri, $b1, $b2, $b3, $csec, $curp, $_POST['description']);

$conectionAdd = new Conectar();
$operacionSave = new Operaciones('datos_alumnos', $conectionAdd);
$ejecucion = $operacionSave->addData('datos_alumnos', '', $_POST['menu'], $datos_save);


if($ejecucion != null){
    echo "
    <script type='text/javascript'>
        Swal.fire({
            icon: 'success',
            title: '¡Exelente!',
            text: 'Los datos fueron guardados correctamente.'
        }).then((result) => {
            location.href='http://localhost/EscuelaSecundaria/registrar.php';
        });
    </script>";
} else {
    echo "
    <script type='text/javascript'>
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: '¡Ups, que mal!',
            text: 'El proceso de guardar datos ha fallado, reintente...',
            showConfirmButton: false,
            timer: 2500
        });
    </script>";
}