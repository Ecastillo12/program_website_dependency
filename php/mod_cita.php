<?php
session_start();
$idCita=$_GET['id'];
require_once "transacciones.php";
include("conexion.php");
$estado = "CUMPLIDA";

$sql = "UPDATE citas SET estado = '$estado' WHERE id_cita = '$idCita'";
$x         = consultarSQL($sql);
    if ($x == 1) {
        ?>
    <script>
        alert('ACTUALIZADO CORRECTAMENTE');
        window.location.href='../aux_admin.php';
    </script>
    <?php
} else {
        ?>
    <script>
        alert('HA OCURRIDO UN ERROR');
        window.location.href='modificar_solic.php';
    </script>
    <?php
}
