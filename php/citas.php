<?php
session_start();
$opcion = $_REQUEST['q'];
$mysqli;

function conectarBd(){
$mysqli = new mysqli("localhost", "admin1", "123", "palomas_mensajeras");

	if(!$mysqli->connect_errno){
		echo "Conectado a BD exitosamente";
	}else{
		echo "Error al conectar</br>";
	}
}

function conectar(){
$mysqli = new mysqli("localhost", "admin1", "123", "palomas_mensajeras");

	if(!$mysqli->connect_errno){
		return $mysqli;
	}else{
		echo "Error al conectar</br>";
		return NULL;
	}
}//fin metodo conectar

	if(1==$opcion){//CONECTAR
		conectarBd();
	}else if(2==$opcion){//CONECTAR Y CONSULTAR
		$conexion = conectar();
		if($conexion){
			//codigo para consultar y mostrar datos
			//serán recibidos en la pagina html a traves de ajax
            $sql      = "SELECT * FROM citas";
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
        echo "<th>";
        echo "SOLICITANTE";
        echo "</th>";
        echo "<th>";
        echo "OPCIONES:";
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
            echo "<td>";
            echo "" . $filas['id_solic'];
            echo "</td>";
            echo "<td>";
            if($filas['estado']=="CUMPLIDA"){
                echo "";
            }else{
            echo "<a href='php/mod_cita.php?id=".$filas['id_cita']."'><button class='btn btn-primary' title=\"Cumplir Cita\"><i class=\"fas fa-calendar-check\"></i></button></a>";
            }
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
		}else{
			echo "Sin acceso";
		}
	}
?>