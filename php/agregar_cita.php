<?php
session_start();
require_once "transacciones.php";

$idSolic=$_GET['id'];
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$desc=$_POST['desc'];
$estado="PENDIENTE";

$consulta="INSERT INTO citas(fecha, hora, descripcion, id_solic, estado) VALUES ('$fecha', '$hora', '$desc', '$idSolic', '$estado')";
$x=consultarSQL($consulta);
if($x==1){
    ?>
        <script>            
            alert(' CITA REGISTRADA EXITOSAMENTE');
            window.location.href='../aux_admin.php';
        </script>
    <?php
}else{
    
    ?>
        <script>
            alert('NO SE REGISTRÓ LA CITA');
            window.location.href='../aux_admin.php';
        </script>
    <?php
}
?>