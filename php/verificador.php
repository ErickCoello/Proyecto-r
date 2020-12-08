<?php
include '../controladores/otherOperations.php';
$objeto_email = new other();

$nombre = $_POST['name'];
$mail = $_POST['mail'];
$codigo = $_POST['codigo'];

$objeto_email->enviarEmail($mail, $nombre, 'Verificación de correo.', $codigo);