<head>
    <link rel="stylesheet" type="text/css" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
</head>
<?php

include '../config/bd.php';
include '../controladores/Conector.php';
include '../controladores/CRUD.php';

$connec = new Conectar();
$opp = new Operaciones('', $connec);
$delete = $opp->deleteData('datos_alumnos', 'id', $_POST['deleteid']);

if($delete != null) {
    echo "
    <script type='text/javascript'>
        Swal.fire({
            icon: 'success',
            title: '¡Bien!',
            text: 'El registro fue eliminado correctamente.'
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
            title: '¡O, que mal!',
            text: 'El proceso de eliminación ha fallado, reintente...',
            showConfirmButton: false,
            timer: 2500
        });
    </script>";
}