<?php
include '../config/bd.php';
include '../controladores/Conector.php';
include '../controladores/CRUD.php';

$id_cc = $_POST['menu'];

$atribtos = array('id', 'nombre', 'Gr1', 'Gr2', 'Gr3', 'cp', 'boleta1', 'boleta2', 'boleta3',  'cs', 'curp', 'observaciones');
$tables = array('ciclos_e', 'datos_alumnos');
$condition = 'id_c = '.$id_cc.' AND id_ciclo = id_c';

$conn = new Conectar();
$opp = new Operaciones('', $conn);
$ciclo_row = $opp->getID('ciclos_e', 'id_ciclo = '.$id_cc);
$registros = $opp->getRelacional($atribtos, $tables, $condition);
?>

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
                    <?php
                    echo '<h3 class="text-center h3 mt-h1">Datos de alumnos del ciclo escolar '.$ciclo_row[1].'</h3>';
                    
                    for($i = 0; $i < sizeof($registros); $i++){
                        echo "
                        <tr>
                        <td class='text-left font-italic'>".$registros[$i]['nombre']."</td>
                        <td class='text-center font-italic'>".$registros[$i]['Gr1']."</td>
                        <td class='text-center font-italic'>".$registros[$i]['Gr2']."</td>
                        <td class='text-center font-italic'>".$registros[$i]['Gr3']."</td>
                        <td class='text-center font-italic'>".$registros[$i]['cp']."</td>
                        <td class='text-center font-italic'>".$registros[$i]['boleta1']."</td>
                        <td class='text-center font-italic'>".$registros[$i]['boleta2']."</td>
                        <td class='text-center font-italic'>".$registros[$i]['boleta3']."</td>
                        <td class='text-center font-italic'>".$registros[$i]['cs']."</td>
                        <td class='text-center font-italic'>".$registros[$i]['curp']."</td>
                        <td class='text-left font-italic'>".$registros[$i]['observaciones']."</td>
                        <td><button class='btn btn-link' type='button' onclick=\"window.open('editar.php?id=".$registros[$i]['id']."','_self')\" href='javascript:void(0);'>Actualizar.</button></td>
                        <td><button type='button' class='btn btn-link' onclick='eliminar(".$registros[$i]['id'].")'>Eliminar.</button></td> </tr>";
                    }
                    ?>
                </tbody> </table>