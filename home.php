<?php
include './config/bd.php';
include './controladores/Conector.php';
include './controladores/CRUD.php';

$onector_user = new Conectar();
$operado_usuario = new Operaciones('', $onector_user);
$datos_user = $operado_usuario->getRelacional('id,name_u,email,id_puesto,puesto', 'users, puestos', 'id = '.$_GET['r'].' AND id_p = id_puesto', true);

?>
<!DOCTYPE html>
<html>
    <head>
    <title> Escuela Secundaria Del Estado </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale-1, shrink-to-fit-=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.14.0-web/css/solid.css">
    <link rel="stylesheet" type="text/css" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
</head>
<body><nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#uno">
      <span class="navbar-toggler-icon"></span>
    </button>
            
        <div class="navbar-collapse collapse" id="uno">
            <ul class="navbar-nav mr-auto nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active text-dark font-weight-bold">Home.</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark font-weight-bold" href="#">Registrar.</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark font-weight-bold" href="datos.php">Datos.</a>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav ml-auto navbar-brand">
            <li class="nav-item">
               <a class="nav-link text-dark font-a-a" href="img/info-circle-solid.svg"> <i class="fas fa-info-circle" aria-hidden="true"></i>  </a>
            </li>
        </ul></nav>
    <form>
        <h1 class="h1 text-dark text-center mt-h1"> Bienvenido. </h1><br>
        <h2 class="h2 text-dark text-center mt-h1"><?php echo $datos_user[1]; ?></h2>
        <br><br>
        <h4 class="h4 text-center text-dark mt-h1"> Cargo: </h4>
        <h3 class="h3 text-center text-dark mt-h1"> <?php echo $datos_user[4]; ?> </h3>
    </form>
    
    
<script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
<script type="text/javascript" src="js/principal.js"></script>          
<script type="text/javascript" src="js/popper.min.js"> </script>
<script type="text/javascript" src="js/bootstrap.min.js"> </script>
<script type="text/javascript" src="fontawesome-free-5.14.0-web/js/all.js"></script>
<script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
</body>
</html>