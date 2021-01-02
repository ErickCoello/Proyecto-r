<?php
include '../controladores/otherOperations.php';
$objeto_email = new other();

$nombre = $_POST['names'];
$mail = $_POST['mail'];

$link = 'http://localhost/EscuelaSecundaria/user.php?o=0&name='.$nombre.'&email='.$mail;

$objeto_email->enviarEmail($mail, $nombre, 'Verificación de correo.', 'Hola '.$nombre.', el link de verificacion es: '.$link);