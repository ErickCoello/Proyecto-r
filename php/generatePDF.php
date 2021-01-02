<?php
include '../config/bd.php';
include '../controladores/Conector.php';
include '../controladores/CRUD.php';
include '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

session_start();
if(isset($_SESSION['id'])) {
    

$id_cc = $_GET['id'];
$atribtos = array('id', 'nombre', 'Gr1', 'Gr2', 'Gr3', 'cp', 'boleta1', 'boleta2', 'boleta3',  'cs', 'curp', 'observaciones');
$tables = array('ciclos_e', 'datos_alumnos');
$condition = 'id_c = '.$id_cc.' AND id_ciclo = id_c';

$conn = new Conectar();
$opp = new Operaciones('', $conn);
$ciclo_row = $opp->getID('ciclos_e', 'id_ciclo = '.$id_cc);
$registros = $opp->getRelacional($atribtos, $tables, $condition, false);
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Escuela Secundaria del Estado</title>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/principal.js"></script>
        <style type="text/css">
            
            h2 {
                font-family: Cambria;
                text-align: center;
                font-size: 2em;
            }
            
            table {
                margin: 0 auto;
                border-collapse: collapse 2px;
                text-align: center;
            }
            
            td, th {
                border-top: black 1px solid;
                border-bottom: black 1px solid;
                border-left: black 1px solid;
                border-right: black 1px solid;
            }
            
            th {
                font-family: arial helvetica;
                font-size: 1.3em;
                background-color:#1F2739;
                color: #ede4e2;
            }
            
            td {
                font-family: times new roman;
                font-size: 18px;
                background-color: rgba(0, 0, 0, 0.075);
            }
        </style>
    </head>
    <body>
                <h2> Registros de ex alumnos del ciclo escolar <?php echo $ciclo_row[1]; ?></h2>
                <table class="container">
                <thead>
                <tr>
                    <th colspan="12" style="text-align: center;">Registros de alumnos.</th>
                </tr>
                <tr>
                    <th rowspan="2">Nombre:</th>
                    <th colspan="3" >Grados cursados.</th>
                    <th colspan="6" >Documentos existentes.</th>
                    <th rowspan="2" >Observaciones:</th>
                </tr>
          
                <tr>
                    <th>1 Grado</th>
                    <th>2 Grado</th>
                    <th>3 Grado</th>
                    <th>Certificado <br> Primaria</th>
                    <th>Boleta 1G:</th>
                    <th>Boleta 2G:</th>
                    <th>Boleta 3G:</th>
                    <th>Certificado <br> Secundaria:</th>
                    <th>CURP:</th>
                </tr> </thead>
                <tbody>
                <?php
                for($i = 0; $i < sizeof($registros); $i++) { 
                    
                    echo "<tr>
                        <td>".$registros[$i]['nombre']."</td>
                        
                        <td>".$registros[$i]['Gr1']."</td>
                        
                        <td>".$registros[$i]['Gr2']."</td>
                        
                        <td>".$registros[$i]['Gr3']."</td>
                        
                        <td>".$registros[$i]['cp']."</td>
                        
                        <td>".$registros[$i]['boleta1']."</td>
                        
                        <td>".$registros[$i]['boleta2']."</td>
                        
                        <td>".$registros[$i]['boleta3']."</td>
                        
                        <td>".$registros[$i]['cs']."</td>
                        
                        <td>".$registros[$i]['curp']."</td>
                        
                        <td>".$registros[$i]['observaciones']."</td>
                </tr>";
            }?>
</tbody>
</table>        
<script type="text/javascript" src="js/jquery-3.5.1.min.js"> </script>
</body></html>

<?php
$dompdf = new Dompdf();
$dompdf->set_paper("Legal", 'landscape');
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$fil3name = $ciclo_row[1].'.pdf';
file_put_contents($fil3name, $pdf);
$dompdf->stream($fil3name, array('Attachment'=>0));
} else {
    echo '<script> location.href="http://localhost/EscuelaSecundaria/index.php" </script>';
}