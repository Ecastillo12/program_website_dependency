<?php
function conexion(){
    $con=mysqli_connect('localhost', 'invitado', '','palomas_mensajeras') or die('Falló la conexión al servidor');
    return $con;
}
$conexion=conexion();
?>