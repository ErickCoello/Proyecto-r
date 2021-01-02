<?php

include './config/bd.php';
include './controladores/Conector.php';
include './controladores/CRUD.php';

session_start();
if(isset($_SESSION['id'])) {

$id_alumno = $_GET['id'];

$conectarID = new Conectar();
$operacionId = new Operaciones('', $conectarID);
$row = $operacionId->getID('datos_alumnos', 'id = '.$id_alumno);
$consulta_ciclos = $operacionId->getData('ciclos_e');
?>
<html>
    <head>
        <title>Escuela Secundaria del Estado</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale-1, shrink-to-fit-=no">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <link rel="stylesheet" type="text/css" href="fontawesome-free-5.14.0-web/css/solid.css">
        <script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
        <script type="text/javascript" src="js/principal.js"></script>
    </head>
    <body class="">
        <ul class="nav justify-content-center bg-primary">
            <li class="nav-item">
                <h2 class="nav-link active text-dark font-weight-bold">Modifique los datos correspondientes.</h2>
            </li>
        </ul>
        <form name="update-data" id="update-form" method="POST" enctype="multipart/form-data" class="mt-auto mb-5 ml-5 mr-5">
            <!-- Datos del estudiante -->
            <h3 class="text-center h3 mt-h1">Datos de alumnos.</h3>
            <div class="form-row mt-E1"> 
                <div class="for col-md-2">
                    <input type="hidden" name="id_al" value="<?php echo $row[0]; ?>">
                </div>
                <div class="form-group col-md-5">
                    <label class="font-weight-bold">Nombre (s) y apellidos: </label>
                    <input type="text" class="form-control font-weight-light" name="apellido" value="<?php echo $row[2]; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label class="font-weight-bold">Ciclo escolar:</label>
                    <select class="custom-select mb-3" name="menu">
                        <?php
                        for ($i = 0; $i < sizeof($consulta_ciclos); $i++) {
                            if($consulta_ciclos[$i]['id_ciclo'] == $row[1]){
                               echo "<option value='".$consulta_ciclos[$i]['id_ciclo']."' selected>".$consulta_ciclos[$i]['ciclo_e']."</option>"; 
                            } else{
                                echo "<option value='".$consulta_ciclos[$i]['id_ciclo']."'>".$consulta_ciclos[$i]['ciclo_e']."</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            
            <!-- ----------------------Grados Cursados----------------------- -->
           <h3 class="text-center h3 mt-h2">Grados cursados.</h3>
           <div style="margin-left: 250px;" class="mt-E2">
           <div class="form-check form-check-inline col-md-4">
               <input type="checkbox" class="form-check-input" name="gr1" value="option1" <?php if($row[3] == 'X'){echo 'checked="checked"';} ?> >
               <label class="form-check-label font-weight-bold">1 Grado</label>
           </div>
           <div class="form-check form-check-inline col-md-4">
               <input type="checkbox" class="form-check-input" name="gr2" value="option2" <?php if($row[4] == 'X'){echo 'checked="checked"';} ?> >
               <label class="form-check-label font-weight-bold">2 Grado</label>
           </div>
           <div class="form-check form-check-inline col-md-3">
               <input type="checkbox" class="form-check-input" name="gr3" value="option3" <?php if($row[5] == 'X'){echo 'checked="checked"';} ?> >
               <label class="form-check-label font-weight-bold">3 Grado</label>
           </div>
           </div>
           
           <!-- ---------------------Documentos encontrados---------------------------- -->
           <h3 class="text-center h3 mt-h2">Documentos existentes.</h3>
           <div style="margin-left: 100px;">
           <div class="form-check form-check-inline col-md-2 mt-E2">
               <input type="checkbox" class="form-check-input" name="cp" value="option1" <?php if($row[6] == 'X'){echo 'checked="checked"';} ?> >
               <label class="form-check-label font-weight-bold">Certificado de primaria.</label>
           </div>
           <div class="form-check form-check-inline col-md-2">
               <input type="checkbox" class="form-check-input" name="b1" value="option2" <?php if($row[7] == 'X'){echo 'checked="checked"';} ?> >
               <label class="form-check-label font-weight-bold">Boleta 1 Grado.</label>
           </div>
           <div class="form-check form-check-inline col-md-2">
               <input type="checkbox" class="form-check-input" name="b2" value="option3" <?php if($row[8] == 'X'){echo 'checked="checked"';} ?> >
               <label class="form-check-label font-weight-bold">Boleta 2 Grado.</label>
           </div>
            <div class="form-check form-check-inline col-md-2">
                <input type="checkbox" class="form-check-input" name="b3" value="option4" <?php if($row[9] == 'X'){echo 'checked="checked"';} ?> >
               <label class="form-check-label font-weight-bold">Boleta 3 Grado.</label>
           </div>
            <div class="form-check form-check-inline col-md-2">
                <input type="checkbox" class="form-check-input" name="cs" value="option5" <?php if($row[10] == 'X'){echo 'checked="checked"';} ?> >
               <label class="form-check-label font-weight-bold">Certificado Secundaria.</label>
           </div>
           <div class="form-check form-check-inline col-md-1">
                <input type="checkbox" class="form-check-input" name="curp" value="option6" <?php if($row[11] == 'X'){echo 'checked="checked"';} ?> >
               <label class="form-check-label font-weight-bold">CURP.</label>
           </div>
           </div>
           
           <!-- Caja de texto para la descripsión -->
           <div class="form-group mt-E2">
               <label class="font-weight-bold">Descripci&oacute;n:</label>
               <textarea class="form-control" name="description"> <?php echo $row[12]; ?> </textarea>
           </div>
           
           <div class="text-center">
               <button type="button" onclick="actualizar()" class="btn btn-outline-secondary col-md-2">Guardar cambios.</button>
           </div>
           
           <div id="updateRes"></div>
           
           
        </form> </body> </html>
<?php 
} else {
    echo '<script> location.href="http://localhost/EscuelaSecundaria/index.php" </script>';
}

?>