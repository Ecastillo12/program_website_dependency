<?php
modificarSol($_POST['inputCurp'], $_POST['inputName'], $_POST['inputLast1'], $_POST['inputLast2'], $_POST['inputFecha'], $_POST['inputCalle'], $_POST['inputNum'], $_POST['inputColonia'], $_POST['inputCP'], $_POST['inputState'], $_POST['inputProgress'], $_POST['inputStatus'], $_POST['id_sol']);

function modificarSol($curp, $nombre, $appat, $apmat, $fecha_nac, $calle, $numero, $colonia, $cp, $state, $avance, $estado, $idSol)
{
    require_once "transacciones.php";
    include "conexion.php";
    $sentencia = "UPDATE solicitante SET curp='$curp', nombre='$nombre', appat='$appat', apmat='$apmat', fecha_nac='$fecha_nac', calle='$calle', numero='$numero', colonia='$colonia', cp='$cp', state='$state', avance_solicitud ='$avance', estado_solicitud='$estado'  WHERE id_solic='$idSol';";
    $x         = consultarSQL($sentencia);
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

}
?>