<?php
include './config/bd.php';
include './controladores/Conector.php';
include './controladores/CRUD.php';

$conectorDatos = new Conectar();
$operacionDatos = new Operaciones('', $conectorDatos);
$arreglo_dato = $operacionDatos->getData('datos_alumnos');
$arreglo_ciclos = $operacionDatos->getData('ciclos_e');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Escuela Secundaria del Estado</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale-1, shrink-to-fit-=no">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <script type="text/javascript" src="js/principal.js"></script>
    </head>
    <body>
        
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
                        <a class="nav-link text-dark font-weight-bold" href="registrar.php">Registrar.</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-dark font-weight-bold" href="datos.php">Datos.</a>
                    </li>
                </ul>
            </div>
            <form class="form-inline sm-2 my-sm-0 navbar-brand" id="form-search">
                    <select class="custom-select" name="menu">
                        <?php
                        for($j = 0; $j < sizeof($arreglo_ciclos); $j++){
                            echo "<option value='".$arreglo_ciclos[$j]['id_ciclo']."'>".$arreglo_ciclos[$j]['ciclo_e']."</option>";
                        }
                        ?>
                    </select>
                     <button class="btn btn-dark my-2 my-sm-0" type="button" onclick="consultar()">Buscar.</button>
            </form>
        </nav>
        
        <form class="mt-from mb-5 ml-5 mr-5">
            <div id="table_content">
                <table class="table table-responsive mt-auto">
                <thead>
                <tr>
                    <td colspan="13" scope="col" class="table-dark text-center font-weight-bold">Registros de alumnos.</td>
                </tr>
                <tr>
                    <th rowspan="2" scope="col" class="table-dark text-center font-weight-bold">Nombre:</th>
                    <td colspan="3" scope="col" class="table-dark text-center font-weight-bold">Grados cursados.</td>
                    <td colspan="6" scope="col" class="table-dark text-center font-weight-bold">Documentos existentes.</td>
                    <th rowspan="2" class="text-center table-dark" scope="col">Observaciones:</th>
                    <th rowspan="2" colspan="2" scope="col" class="text-center font-weight-bold table-dark">Opciones:</th>
                </tr>
          
                <tr>
                    <th class="table-dark text-center" scope="col">1 Grado:</th>
                    <th class="table-dark text-center" scope="col">2 Grado:</th>
                    <th class="table-dark text-center" scope="col">3 Grado:</th>
                    <th class="text-center table-dark" scope="col">Certificado Primaria:</th>
                    <th class="text-center table-dark" scope="col">Boleta 1G:</th>
                    <th class="text-center table-dark" scope="col">Boleta 2G:</th>
                    <th class="text-center table-dark" scope="col">Boleta 3G:</th>
                    <th class="text-center table-dark" scope="col">Certificado Secundaria:</th>
                    <th class="text-center table-dark" scope="col">CURP:</th>
                </tr> </thead>
                <tbody class="table-active">
                    <?php for($i = 0; $i < sizeof($arreglo_dato); $i++) {
                        echo "
                        <tr>
                        <td class='text-left font-italic'>".$arreglo_dato[$i]['nombre']."</td>
                        <td class='text-center font-italic'>".$arreglo_dato[$i]['Gr1']."</td>
                        <td class='text-center font-italic'>".$arreglo_dato[$i]['Gr2']."</td>
                        <td class='text-center font-italic'>".$arreglo_dato[$i]['Gr3']."</td>
                        <td class='text-center font-italic'>".$arreglo_dato[$i]['cp']."</td>
                        <td class='text-center font-italic'>".$arreglo_dato[$i]['boleta1']."</td>
                        <td class='text-center font-italic'>".$arreglo_dato[$i]['boleta2']."</td>
                        <td class='text-center font-italic'>".$arreglo_dato[$i]['boleta3']."</td>
                        <td class='text-center font-italic'>".$arreglo_dato[$i]['cs']."</td>
                        <td class='text-center font-italic'>".$arreglo_dato[$i]['curp']."</td>
                        <td class='text-left font-italic'>".$arreglo_dato[$i]['observaciones']."</td>
                        <td><button class='btn btn-link' type='button' onclick=\"window.open('editar.php?id=".$arreglo_dato[$i]['id']."','_self')\" href='javascript:void(0);'>Actualizar.</button></td>
                        <td><button type='button' class='btn btn-link' onclick='eliminar(".$arreglo_dato[$i]['id'].")'>Eliminar.</button></td> </tr>";
                    } ?>
                </tbody>
            </table>
            </div>
            <div id="optionc"></div>
        </form>
        
        
        <script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
    <script type="text/javascript" src="js/popper.min.js"> </script>
    <script type="text/javascript" src="js/bootstrap.min.js"> </script>
    </body>
</html>