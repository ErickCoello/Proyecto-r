<?php

include '../config/bd.php';
include '../controladores/Conector.php';
include '../controladores/CRUD.php';

$connec = new Conectar();
$opp = new Operaciones('', $connec);
$delete = $opp->deleteData('datos_alumnos', 'id', $_POST['deleteid']);