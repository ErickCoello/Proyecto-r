<?php
include './config/bd.php';
include './controladores/Conector.php';
include './controladores/CRUD.php';

$conexion = new Conectar();
$operacion = new Operaciones('', $conexion);
$consulta = $operacion->getData('ciclos_e');
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Escuela Secundaria del Estado</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale-1, shrink-to-fit-=no">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <link rel="stylesheet" type="text/css" href="fontawesome-free-5.14.0-web/css/solid.css">
        <link rel="stylesheet" type="text/css" href="node_modules/sweetalert2/dist/sweetalert2.css">
        <link rel="stylesheet" type="text/css" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    
    </head>
    <body class="">
        <nav class="navbar navbar-expand-sm bg-primary navbar-dark fixed-top">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#uno">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="navbar-collapse collapse" id="uno">
                <ul class="navbar-nav mr-auto nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link text-dark font-weight-bold">Home.</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-dark font-weight-bold" href="#">Registrar.</a>
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
                </ul>
        </nav>
        <form class="mt-from mb-5 ml-5 mr-5" id="form-dato" enctype="multipart/form-data" method="post">
            <!-- Datos del estudiante -->
            <h3 class="text-center h3 mt-h1">Datos de alumnos.</h3>
            <div class="form-row mt-E1"> 
                <div class="for col-md-2"></div>
                <div class="form-group col-md-5">
                    <label class="font-weight-bold">Nombre (s) y apellidos: </label>
                    <input type="text" class="form-control font-weight-light" name="nombres" id="nombre" placeholder="Nombres y apellidos">
                </div>
                <div class="form-group col-md-3">
                    <label class="font-weight-bold">Ciclo escolar:</label>
                    <select class="custom-select mb-3" name="menu">
                        <?php
                        for ($i = 0; $i < sizeof($consulta); $i++) {
                            echo "<option value='".$consulta[$i]['id_ciclo']."'>".$consulta[$i]['ciclo_e']."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            
           <!-- Grados Cursados -->
           <h3 class="text-center h3 mt-h2">Grados cursados.</h3>
           <div style="margin-left: 250px;" class="mt-E2">
           <div class="form-check form-check-inline col-md-4">
               <input type="checkbox" class="form-check-input" name="gr1" value="option1">
               <label class="form-check-label font-weight-bold">1 Grado</label>
           </div>
           <div class="form-check form-check-inline col-md-4">
               <input type="checkbox" class="form-check-input" name="gr2" value="option2">
               <label class="form-check-label font-weight-bold">2 Grado</label>
           </div>
           <div class="form-check form-check-inline col-md-3">
               <input type="checkbox" class="form-check-input" name="gr3" value="option3">
               <label class="form-check-label font-weight-bold">3 Grado</label>
           </div>
           </div>
           
           <!-- Documentos encontrados -->
           <h3 class="text-center h3 mt-h2">Documentos existentes.</h3>
           <div style="margin-left: 100px;">
           <div class="form-check form-check-inline col-md-2 mt-E2">
               <input type="checkbox" class="form-check-input" name="cp" id="cp" value="option1">
               <label class="form-check-label font-weight-bold">Certificado de primaria.</label>
           </div>
           <div class="form-check form-check-inline col-md-2">
               <input type="checkbox" class="form-check-input" name="b1" value="option2">
               <label class="form-check-label font-weight-bold">Boleta 1 Grado.</label>
           </div>
           <div class="form-check form-check-inline col-md-2">
               <input type="checkbox" class="form-check-input" name="b2" value="option3">
               <label class="form-check-label font-weight-bold">Boleta 2 Grado.</label>
           </div>
            <div class="form-check form-check-inline col-md-2">
                <input type="checkbox" class="form-check-input" name="b3" value="option4">
               <label class="form-check-label font-weight-bold">Boleta 3 Grado.</label>
           </div>
            <div class="form-check form-check-inline col-md-2">
                <input type="checkbox" class="form-check-input" name="cs" value="option5">
               <label class="form-check-label font-weight-bold">Certificado Secundaria.</label>
           </div>
           <div class="form-check form-check-inline col-md-1">
                <input type="checkbox" class="form-check-input" name="curp" value="option6">
               <label class="form-check-label font-weight-bold">CURP.</label>
           </div>
           </div>
           
           <!-- Caja de texto para la descripsión -->
           <div class="form-group mt-E2">
               <label class="font-weight-bold">Descripci&oacute;n:</label>
               <textarea class="form-control" name="description" placeholder="Escriba algo..."></textarea>
           </div>
           <!-- Botones -->
           <div class="text-center">
               <button type="button" onclick="addDate()" class="btn btn-outline-secondary col-md-2">Registrar.</button>
           </div>
           
           <div id="rest"></div>
        </form>
        
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
    <script type="text/javascript" src="js/principal.js"></script>          
    <script type="text/javascript" src="js/popper.min.js"> </script>
    <script type="text/javascript" src="js/bootstrap.min.js"> </script>
    <script type="text/javascript" src="fontawesome-free-5.14.0-web/js/all.js"></script>
    <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
    <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.js"></script>
    <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    </body>
</html>