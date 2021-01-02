<?php
session_start();
if(isset($_SESSION['id'])) {
    echo '<script> location.href="http://localhost/EscuelaSecundaria/home.php" </script>';
} else {
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
<body class="body-login">
        
    <div class="modal-dialog text-center">
        <ul class="nav nav-tabs">
  <li class="nav-item">
      <h1 class="text-center h1 text-light">Ingrese los datos e inicie sesi&oacute;n.</h1>
  </li>
        </ul>
        
        <div class="col-md-8 section-p">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="img/user-solid.svg">
                </div>
                
                <form class="col-12" id="form-login" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="tipo-operacion" value="2">
                    <div class="form-group forma-l" id="user">
                        <input type="text" name="user" class="form-control" placeholder="Nombre de usuario">
                    </div>
                    <div class="form-group forma-l" id="password">
                        <input type="password" name="pss" class="form-control" placeholder="Contraseña">
                    </div>
                    
                    <button type="button" onclick="userSesion(2)" class="btn btn-primary c-boton"> <i class="fas fa-sign-in-alt"></i> Iniciar Sesi&oacute;n</button>
                </form>
                <div class="col-12 link-f">
                    <a href="user.php?o=1" class="text-light">Registrarse</a>
                </div>
                <div class="col-12 link-f">
                    <a href="recuperacion.php" class="text-light">Olvid&eacute; mi contrase&ntilde;a</a>
                </div>
                
            </div>
        </div>        
    </div>
    <br><br>
    <div id="login-rest"></div>
    
<script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
<script type="text/javascript" src="js/principal.js"></script>          
<script type="text/javascript" src="js/popper.min.js"> </script>
<script type="text/javascript" src="js/bootstrap.min.js"> </script>
<script type="text/javascript" src="fontawesome-free-5.14.0-web/js/all.js"></script>
<script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
</body>
</html>
<?php } ?>