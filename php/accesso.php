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
$operacion_form = $_POST['tipo-operacion'];

if($operacion_form == 1) {
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

if($operacion_form == 2) {
    $operacion2 = new Operaciones('', $connetc_l);
    $name_u = $_POST['user'];
    $pas_u = md5($_POST['pss']);
    
    $consulta_acceso = $operacion2->getID('users', 'email = "'.$name_u.'" AND password = "'.$pas_u.'"');
    
    if($name_u == $consulta_acceso[3] && $pas_u == $consulta_acceso[4]) {
        session_start();
        $_SESSION['id'] = $consulta_acceso[0];
        echo '<script> location.href="http://localhost/EscuelaSecundaria/home.php"; </script>';
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
}

if($operacion_form == 3) {
    $link = 'http://localhost/EscuelaSecundaria/verify.php?user='.$_POST['e-recuperacion'];
    $texto = 'Ingrese al siguiente link: \n'.$link;
    
    $objeto_n->enviarEmail($_POST['e-recuperacion'], '', 'Verificador de e-mail', $texto);
    echo '<script type="text/javascript">location.href="http://localhost/EscuelaSecundaria/"</script>';
}

if($operacion_form == 4) {
    echo '<script> console.log("metodo recuperarusuario aaaa"); </script>';
    
    $operacionn4 = new Operaciones('', $connetc_l);
    
    $datos = 'id_p='.$_POST['puesto-select'].',name_u="'.$_POST['names'].'",email="'.$_POST['correo'].'",password="'. md5($_POST['new-pss2']).'"';
    
    $actualizar_user = $operacionn4->updateData('users', $datos, 'id = '.$_POST['id_user']);
    
    if($actualizar_user != null){
        echo "<script type='text/javascript'>
            Swal.fire({
                icon: 'success',
                title: '¡Bien!',
                text: 'Inicie sesión con su nueva contraseña.'
             }).then((result) => {
                location.href='http://localhost/EscuelaSecundaria/';
             });
             </script>";
    } else {
        echo "<script type='text/javascript'>
            Swal.fire({
                icon: 'error',
                title: '¡Alg salió mal!',
                text: 'Reintente.'
             });
             </script>";
    }
}