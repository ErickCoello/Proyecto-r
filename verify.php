<?php
$usuario = $_GET['user'];

include './config/bd.php';
include './controladores/Conector.php';
include './controladores/CRUD.php';
$onector_user = new Conectar();
$operado_usuario = new Operaciones('', $onector_user);
$datos_user = $operado_usuario->getRelacional('id,name_u,email,id_puesto', 'users, puestos', 'email = "'.$usuario.'" AND id_p = id_puesto', true);
$puestos = $operado_usuario->getData('puestos');
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
    <form class="section-l" id="form-user-recuperacion" method="POST" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-2"> <input type="hidden" name="tipo-operacion" value="4"> </div>
            <div class="form-group col-md-4">
                <label class="font-weight-bold text-light"> Nombre (s): </label>
                <input type="text" name="names" id="names" class="form-control font-weight-light" value="<?php echo $datos_user[1]; ?>" >
            </div>
            <div class="form-group col-md-4">
                <label class="font-weight-bold text-light"> E-mail: </label>
                <input type="email" name="correo" id="correo" class="form-control font-weight-light" value="<?php echo $datos_user[2]; ?>">
            </div>
            <div class="form-group col-md-2"> <input type="hidden" name="id_user" value="<?php echo $datos_user[0]; ?>"> </div>
        </div>
                
                <div class="form-row">
                    <div class="form-group col-md-3"></div>
                    <div class="form-group col-md-3">
                        <label class="font-weight-bold text-light">Ingrese una nueva contrase&ntilde;a</label>
                        <input type="password" name="new-pss1" id="new-pss1" class="form-control font-weight-light" placeholder="Nueva Contraseña">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="font-weight-bold text-light">Confirme su nueva contrase&ntilde;a</label>
                        <input type="password" name="new-pss2" id="new-pss2" onclick="verificacionPassword(null)" class="form-control font-weight-light" placeholder="Confirme su contraseña">
                    </div>
                    <div class="form-group col-md-2" id="msj-pss"></div>
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
                                    if($puestos[$i]['id_puesto'] == $datos_user[3]) {
                                        echo "<option value='".$puestos[$i]['id_puesto']."' selected>".$puestos[$i]['puesto']."</option>";
                                    } else {
                                        echo "<option value='".$puestos[$i]['id_puesto']."'>".$puestos[$i]['puesto']."</option>";
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            <div class="text-center">
                <button type="button" onclick="recuperarUsuario()" class="btn btn-primary font-weight-bold"> Registrar </button>
            </div>
        <div id="recuperacion"></div>
    </form>    
<script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
<script type="text/javascript" src="js/principal.js"></script>          
<script type="text/javascript" src="js/popper.min.js"> </script>
<script type="text/javascript" src="js/bootstrap.min.js"> </script>
<script type="text/javascript" src="fontawesome-free-5.14.0-web/js/all.js"></script>
<script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
</body></html>