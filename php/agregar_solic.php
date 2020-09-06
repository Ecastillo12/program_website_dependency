<?php
session_start();
$pariente = $_SESSION['inputCURP'];
require_once "transacciones.php";
include("conexionInvitado.php");
$sql="SELECT id_pariente FROM pariente WHERE curp ='$pariente';";
        $cons = $conexion->query($sql);
        while ($filas = $cons->fetch_assoc()) {
        $idPariente = "" . $filas['id_pariente'];
        }

$nombre=$_POST['nombre'];
$appat=$_POST['appat'];
$apmat=$_POST['apmat'];
$calle=$_POST['calle'];
$num=$_POST['num'];
$colonia=$_POST['colonia'];
$cp=$_POST['cp'];
$curp=$_POST['curp'];
$fecha=$_POST['fecha'];
$estado=$_POST['estado'];


$consulta="INSERT INTO solicitante(nombre, appat, apmat, calle, numero, colonia, cp, curp, fecha_nac, state, id_pariente) VALUES ('$nombre', '$appat', '$apmat', '$calle', $num, '$colonia', $cp, '$curp', '$fecha', '$estado', '$idPariente')";
$x=consultarSQL($consulta);
if($x==1){
    ?>
        <script>            
            alert('REGISTRADO EXITOSAMENTE');
            window.location.href='../vista_usuario.php';
        </script>
    <?php
}else{
    ?>
        <script>
            alert('NO SE REGISTRÓ EL ASPIRANTE');
            window.location.href='../vista_usuario.php';
        </script>
    <?php
}
?>