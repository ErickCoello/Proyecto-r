<?php
include './config/bd.php';
include './controladores/Conector.php';
include './controladores/CRUD.php';
include './controladores/otherOperations.php';

$conecto_datos = new Conectar();
$obejto_crud = new Operaciones('', $conecto_datos);
$puestos = $obejto_crud->getData('puestos');

$operacion = new other();
$codgo = $operacion->generadorCodigo(4); ?>

<!DOCTYPE html>
<html>
<head>
    <title> Escuela Secundaria Del Estado </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale-1, shrink-to-fit-=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.14.0-web/css/solid.css">
    <link rel="stylesheet" type="text/css" href="node_modules/sweetalert2/dist/sweetalert2.css">
    <link rel="stylesheet" type="text/css" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
</head>
<body class="body-user">
    <div class="container">
        <form class="section-l" id="form-user-r" method="POST" enctype="multipart/form-data">
            <h2 class="text-center h2 text-light"> Ingrese los datos correspondientes. </h2>
                <div class="form-row">
                    <div class="form-group col-md-2"> <input type="hidden" name="tipo-operacion" value="1"> </div>
                    <div class="form-group col-md-4">
                        <label class="font-weight-bold text-light"> Nombre (s): </label>
                        <input type="text" name="names" id="names" class="form-control font-weight-light" placeholder="Escriba sus nombres">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="font-weight-bold text-light"> E-mail: </label>
                        <input type="email" name="correo" id="correo" onclick="verificarEmail()" class="form-control font-weight-light" placeholder="Escriba su correo electronico">
                        <div id="correo1"></div>
                    </div>
                    <div class="form-group col-md-2">
                        <button type="button" class="btn btn-primary mb-button" onclick="verificacionCorreo('<?php echo $codgo; ?>')">Enviar c&oacute;digo</button>
                    </div>            
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-3"></div>
                    <div class="form-group col-md-3">
                        <label class="font-weight-bold text-light">Ingrese una contrase&ntilde;a</label>
                        <input type="password" name="pss" id="pss1" class="form-control font-weight-light" placeholder="Ingrese una contraseña">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="font-weight-bold text-light">Confirme su contrase&ntilde;a</label>
                        <input type="password" name="psss" id="pss2" onclick="verificacionPassword()" class="form-control font-weight-light" placeholder="Confirme su contraseña">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label class="font-weight-bold text-light">Puesto:</label>
                        <select class="custom-select md-3" name="puesto-select">
                            <?php
                            if(sizeof($puestos) == 0) {
                                echo '<option> A&uacute;n no hay datos guardados </option>';
                            } else {
                                for ($i = 0; $i < sizeof($puestos); $i++){
                                    echo "<option value='".$puestos[$i]['id_puesto']."'>".$puestos[$i]['puesto']."</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                
            <div class="form-row">
                <div class="form-group col-md-5"></div>
                <div class="form-group col-md-2">
                    <label class="font-weight-bold text-light"> Ingrese el codigo de verificaci&oacute;n enviado a su correo </label>
                    <input type="text" id="comp-c" class="form-control font-weight-light text-center" onclick="comprobacion('<?php echo $codgo; ?>')" name="numbre-v" placeholder="ejemplo: 0934">
                </div>
                <div class="form-group col-md-5"></div>
            </div>
            <div class="text-center">
                <button type="button" onclick="userSesion(1)" id="btn-registro" class="btn btn-primary font-weight-bold" disabled="true"> Registrar </button>
            </div>
            </form>
    </div>
    <div id="resultado_user"></div>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
<script type="text/javascript" src="js/principal.js"></script>          
<script type="text/javascript" src="js/popper.min.js"> </script>
<script type="text/javascript" src="js/bootstrap.min.js"> </script>
<script type="text/javascript" src="fontawesome-free-5.14.0-web/js/all.js"></script>
<script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
<script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.js"></script>
<script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
</body> </html>