<head>
    <link rel="stylesheet" type="text/css" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
</head>
<?php
include '../config/bd.php';
include '../controladores/Conector.php';
include '../controladores/CRUD.php';
include '../controladores/otherOperations.php';

$connetc_l = new Conectar();
$objeto_n = new other();

if($_POST['tipo-operacion'] == 1) {
    $operacionn1 = new Operaciones('users', $connetc_l);
    
    $insertar_datos = array($_POST['names'], $_POST['correo'], md5($_POST['psss']));
    $ejecucion1 = $operacionn1->addData('users', '', $_POST['puesto-select'], $insertar_datos);
    
    if($ejecucion1 != null) {
        echo "<script type='text/javascript'>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Se ha registrado de forma exitosa, a continuación inicie sesión.',
                showConfirmButton: false,
                timer: 2800
              });
              </script>";
        sleep(10);
        $objeto_n->paginacion('http://localhost/EscuelaSecundaria/');
        
    } else {
        echo "<script type='text/javascript'>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Ocurrió un error al registrarse, reintente...',
                showConfirmButton: false,
                timer: 2800
              });</script>";
    }
}

if($_POST['tipo-operacion'] == 2) {
    $operacion2 = new Operaciones('', $connetc_l);
    $name_u = $_POST['user'];
    $pas_u = md5($_POST['pss']);
    
    $consulta_acceso = $operacion2->getID('users', 'email = "'.$name_u.'" AND password = "'.$pas_u.'"');
    
    if(sizeof($consulta_acceso) != 0) {
    if($name_u == $consulta_acceso[3] && $pas_u == $consulta_acceso[4]) {
        echo '<script> location.href="http://localhost/EscuelaSecundaria/home.php?r='.$consulta_acceso[0].'"; </script>';
    } else {
        echo "<script type='text/javascript'>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'El nombre del usurio o contraseña no son correctos.',
                showConfirmButton: false,
                timer: 2500
              });</script>";
    }
    } else {
        echo "<script type='text/javascript'>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Sin datos guardados.',
                showConfirmButton: false,
                timer: 2500
              });</script>";
    }
}