<?php

include '../config/bd.php';
include '../controladores/Conector.php';
include '../controladores/CRUD.php';

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


$dats = "id_c = ".$_POST['menu'].", nombre = '".$_POST['apellido']."', Gr1 = '".$grado1."',"
        . " Gr2 = '".$grado2."', Gr3 = '".$grado3."', cp = '".$cpri."', boleta1 = '".$b1."', "
        . "boleta2 = '".$b2."', boleta3 = '".$b3."', cs = '".$csec."', curp = '".$curp."', "
        . "observaciones = '".$_POST['description']."'";

$cc = new Conectar();
$oo = new Operaciones('', $cc);
$update = $oo->updateData('datos_alumnos', $dats, 'id = '.$_POST['id_al']);

if($update != null) {
    echo "
    <script type='text/javascript'>
        Swal.fire({
            icon: 'success',
            title: '¡Exelente!',
            text: 'Los datos fueron actualizados correctamente.'
        }).then((result) => {
            location.href='http://localhost/EscuelaSecundaria/datos.php';
        });
    </script>";
} else {
    echo "
    <script type='text/javascript'>
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: '¡Ups, que mal!',
            text: 'Ocurrió un error al actualizar los datos, reintente..',
            showConfirmButton: false,
            timer: 2500
        });
    </script>";
}