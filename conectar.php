<?php
session_start();
$pariente = $_SESSION['inputCURP'];

$opcion = $_REQUEST['q'];
$mysqli;

function conectarBd()
{
    $mysqli = new mysqli("localhost", "root", "", "palomas_mensajeras");

    if (!$mysqli->connect_errno) {
        echo "Conectado a BD exitosamente";
    } else {
        echo "Error al conectar</br>";
    }
}

function conectar()
{
    $mysqli = new mysqli("localhost", "root", "", "palomas_mensajeras");

    if (!$mysqli->connect_errno) {
        return $mysqli;
    } else {
        echo "Error al conectar</br>";
        return null;
    }
} //fin metodo conectar

if (1 == $opcion) {
//CONECTAR
    conectarBd();
} else if (2 == $opcion) {
//CONECTAR Y CONSULTAR

    $conexion = conectar();
    if ($conexion) {
        //codigo para consultar y mostrar datos
        //serán recibidos en la pagina html a traves de ajax
        $pariente = $_SESSION['inputCURP'];
        include "php/conexionInvitado.php";
        $sql  = "SELECT id_pariente from pariente WHERE curp = '$pariente'";
        $cons = $conexion->query($sql);
        while ($filas = $cons->fetch_assoc()) {
            $idPariente = "" . $filas['id_pariente'];
        }
        $sql      = "SELECT * FROM solicitante WHERE id_pariente = '$idPariente'";
        $consulta = $conexion->query($sql);
        echo "<table class='table table-striped table-sm'>";
        echo "<tr>";
        echo "<tr>";
        echo "<th>";
        echo "ESTADO DE SOLICITUD";
        echo "</th>";
        echo "<th>";
        echo "AVANCE";
        echo "</th>";
        echo "</tr>";
        while ($filas = $consulta->fetch_assoc()) {
            $avance = "" . $filas['avance_solicitud'];
            echo "<tr>";
            echo "<td>";
            echo "" . $filas['estado_solicitud'];
            echo "</td>";
            echo "<td>";
            echo "<meter min='0' max='100'low='25' high='75'optimum='100' value='$avance'></meter> " . $filas['avance_solicitud'] . " %";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Sin acceso";
    }
} else if (3 == $opcion) {
    $conexion = conectar();
    if ($conexion) {
        $sql      = "SELECT * FROM vsolic WHERE curpPA = '$pariente'";
        $consulta = $conexion->query($sql);
        echo "<table class='table table-striped table-sm'>";
        echo "<tr>";
        echo "<tr>";
        echo "<th>";
        echo "ID SOLICITUD";
        echo "</th>";
        echo "<th>";
        echo "NOMBRE SOLICITANTE";
        echo "</th>";
        echo "<th>";
        echo "APELLIDO PATERNO SOLICITANTE";
        echo "</th>";
        echo "<th>";
        echo "APELLIDO MATERNO SOLICITANTE";
        echo "</th>";
        echo "<th>";
        echo "CURP SOLICITANTE";
        echo "</th>";
        echo "<th>";
        echo "NOMBRE PARIENTE";
        echo "</th>";
        echo "<th>";
        echo "APELLIDO PATERNO PARIENTE";
        echo "</th>";
        echo "<th>";
        echo "APELLIDO MATERNO PARIENTE";
        echo "</th>";
        echo "<th>";
        echo "PARENTEZCO";
        echo "</th>";
        echo "<th>";
        echo "TELÉFONO";
        echo "</th>";
        echo "</tr>";
        while ($filas = $consulta->fetch_assoc()) {
            echo "<tr>";
            echo "<td>";
            echo "" . $filas['id_solic'];
            echo "</td>";
            echo "<td>";
            echo "" . $filas['nombre'];
            echo "</td>";
            echo "<td>";
            echo "" . $filas['appat'];
            echo "</td>";
            echo "<td>";
            echo "" . $filas['apmat'];
            echo "</td>";
            echo "<td>";
            echo "" . $filas['curp'];
            echo "</td>";
            echo "<td>";
            echo "" . $filas['nombrePa'];
            echo "</td>";
            echo "<td>";
            echo "" . $filas['ApPa'];
            echo "</td>";
            echo "<td>";
            echo "" . $filas['ApMa'];
            echo "</td>";
            echo "<td>";
            echo "" . $filas['parentezco'];
            echo "</td>";
            echo "<td>";
            echo "" . $filas['tel'];
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Sin acceso";
    }
} else if (4 == $opcion) {
    $conexion = conectar();
    if ($conexion) {
        $pariente = $_SESSION['inputCURP'];
        include "php/conexion.php";
        $sql  = "SELECT id_pariente from pariente WHERE curp = '$pariente'";
        $cons = $conexion->query($sql);
        while ($filas = $cons->fetch_assoc()) {
            $idPariente = "" . $filas['id_pariente'];
        }
        
        $sql  = "SELECT id_solic from solicitante WHERE id_pariente = '$idPariente'";
        $idSolic="";
        $cons = $conexion->query($sql);
        while ($filas = $cons->fetch_assoc()) {
            $idSolic = "" . $filas['id_solic'];
            }
        }
        echo $idSolic;
        $sql      = "SELECT * FROM citas WHERE id_solic = '$idSolic'";
        $consulta = $conexion->query($sql);
        echo "<table class='table table-striped table-sm'>";
        echo "<tr>";
        echo "<tr>";
        echo "<th>";
        echo "ID CITA";
        echo "</th>";
        echo "<th>";
        echo "DESCRIPCIÓN";
        echo "</th>";
        echo "<th>";
        echo "FECHA";
        echo "</th>";
        echo "<th>";
        echo "HORA";
        echo "</th>";
        echo "<th>";
        echo "ESTADO";
        echo "</th>";
        echo "</tr>";
        while ($filas = $consulta->fetch_assoc()) {
            echo "<tr>";
            echo "<td>";
            echo "" . $filas['id_cita'];
            echo "</td>";
            echo "<td>";
            echo "" . $filas['descripcion'];
            echo "</td>";
            echo "<td>";
            echo "" . $filas['fecha'];
            echo "</td>";
            echo "<td>";
            echo "" . $filas['hora'];
            echo "</td>";
            echo "<td>";
            echo "" . $filas['estado'];
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    
        echo "</table>";
    
    } else {
        echo "Sin acceso";
    }

