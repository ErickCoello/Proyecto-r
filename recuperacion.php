<?php
include './controladores/otherOperations.php';

$generacion_c = new other();

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
<body class="bg-dark">
<div class="container">
  <form class="section-r" id="form-recuperar" method="POST" enctype="multipart/form-data">
    <h2 class="text-center h2 text-light"> Recuperaci&oacute;n de cuenta. </h2>
        <div class="form-row">
            <div class="form-group col-md-4"><input type="hidden" name="tipo-operacion" value="3"></div>
              <div class="form-group col-md-4">
                <label class="font-weight-bold text-light"> Nombre de usuario: </label>
                <input type="email" name="e-recuperacion" id="rec" class="form-control font-weight-light" placeholder="Escriba el nombre de usuario">
               </div>
        </div>
        
    <div class="form-row">
        <div class="form-group col-md-5"></div>
        <div class="form-group col-md-2 text-center">
            <button type="button" class="btn btn-primary mb-button" onclick="enviarCorreo()">Verificar.</button>
            </div>
    </div>
    <div id="mensaje-user"></div>
    </form>
</div>
    
<script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
<script type="text/javascript" src="js/principal.js"></script>          
<script type="text/javascript" src="js/popper.min.js"> </script>
<script type="text/javascript" src="js/bootstrap.min.js"> </script>
<script type="text/javascript" src="fontawesome-free-5.14.0-web/js/all.js"></script>
<script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
</body></html>