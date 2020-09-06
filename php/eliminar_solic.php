<?php
session_start();
$idSolic = $_GET['id'];
require_once "transacciones.php";
include "conexion.php";
$sentencia = "DELETE FROM solicitante WHERE id_solic = '$idSolic';";
$x         = consultarSQL($sentencia);
if ($x == 1) {
    ?>
    <script>
        alert('ELIMINADO CORRECTAMENTE');
        window.location.href='../aux_admin.php';
    </script>
    <?php
} else {
    ?>
    <script>
        alert('HA OCURRIDO UN ERROR');
        window.location.href='../aux_admin.php';
    </script>
    <?php
}
