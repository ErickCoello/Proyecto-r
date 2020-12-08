<!DOCTYPE html>
<html>
<head>
	<title></title>
        <script type="txt/javascript" src="../node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
        <script type='text/javascript' src='../node_modules/sweetalert2/dist/sweetalert2.all.min.js'></script>
        <script type='text/javascript' src='../node_modules/sweetalert2/dist/sweetalert2.js'></script>
        <script type='text/javascript' src='../node_modules/sweetalert2/dist/sweetalert2.min.js'></script>

        <link rel='stylesheet' type='text/css' href='../node_modules/sweetalert2/dist/sweetalert2.css'>
        <link rel='stylesheet' type='text/css' href='../node_modules/sweetalert2/dist/sweetalert2.min.css'>

<script language="javascript" type='text/javascript'>
     
    function confirmacionDialogo(proceso) {
        if(proceso == 'guardar'){
            console.log('Forma guardar');
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '¡Correcto!',
                text: 'Los datos fueron guardados de forma exitosa.',
                showConfirmButton: false,
                timer: 2500
              });
        }
        
        if(proceso == 'update') {
            console.log('Forma update');
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '¡Correcto!',
                text: 'Registro actualizado.',
                showConfirmButton: false,
                timer: 2500
              });
        }
        
        if(proceso == 'eliminar') {
            console.log('Forma delete');
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '¡Correcto!',
                text: 'Registro eliminado.',
                showConfirmButton: false,
                timer: 2500
              });
        }
    }
    
    function errorDialogo() {
        Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: '¡Error!',
                text: 'El proceso ha fallado, reintente.',
                showConfirmButton: false,
                timer: 2500
              });
    }
</script>
</head>
<body>

</body>
</html>
<?php 
class Dialogo {
    function ventanaDialog($valor) {
        echo "<script> confirmacionDialogo('".$valor."'); </script>";
    }
    
    function errorDialog() {
        echo "<script> errorDialogo(); </script>";
    }
}
?>