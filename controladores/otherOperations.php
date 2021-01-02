<head>
    <link type="text/css" rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="js/principal.js"></script>
</head>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include '../PHPMailer-master/src/Exception.php';
include '../PHPMailer-master/src/PHPMailer.php';
include '../PHPMailer-master/src/SMTP.php';

class other {
function enviarEmail($correo, $nombre, $asunto, $texto) {
    $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.office365.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'erick_coello1998@hotmail.com';                     // SMTP username
    $mail->Password   = '01/10/1998';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('erick_coello1998@hotmail.com', 'Escuela Secundaria Venustiano Carranza.');
    $mail->addAddress($correo, $nombre);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $texto;

    $a = $mail->send();
    
    if($a != null) {
        echo '
        <script type="text/javascript">
        Swal.fire({
        icon: "success",
        title: "¡Bien!",
        text: "El enlace fue enviado a su correo."
        });
        </script>
    ';
    }
    
    } catch (Exception $e) {
        echo "
            Swal.fire({
                icon: 'error',
                title: '¡Algó salió mal!,
                text: 'El menaje no fue enviado a su correo.'
              });
         ";
    }
}

function generadorCodigo($recorrido) {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ#$%&/!¡¿?';
        $max = strlen($pattern)-1;
        for($i=0;$i < $recorrido;$i++) $key .= $pattern{mt_rand(0,$max)};
        return $key;
}

function paginacion($ruta) {
    echo '<script type="text/javascript"> location.href="'.$ruta.'"; </script>';
}
}

/*Nombre de servidor: smtp.office365.com
Puerto: 587
Método de cifrado: STARTTLS
