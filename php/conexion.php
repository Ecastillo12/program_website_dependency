<?php
function conexion(){
    $con=mysqli_connect('localhost', 'admin1', '123','palomas_mensajeras') or die('Falló la conexión al servidor');
    return $con;
}
$conexion=conexion();
?>