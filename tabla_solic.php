<?php
session_start();

$opcion = $_REQUEST['q'];
$mysqli;

function conectarBd(){
$mysqli = new mysqli("localhost", "root", "", "palomas_mensajeras");

	if(!$mysqli->connect_errno){
		echo "Conectado a BD exitosamente";
	}else{
		echo "Error al conectar</br>";
	}
}

function conectar(){
$mysqli = new mysqli("localhost", "root", "", "palomas_mensajeras");

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
            $sql = "SELECT * FROM solicitante";
            $consulta = $conexion->query($sql);
            echo "<table class='table table-responsive'>";
            echo "<tr>";
            echo "<tr>";
            echo "<th>";echo "Id";echo "</th>";
            echo "<th>";echo "Nombre(s)";echo "</th>";
            echo "<th>";echo "Apellido Paterno";echo "</th>";
            echo "<th>";echo "Apellido Materno";echo "</th>";
            echo "<th>";echo "CURP";echo "</th>";
            echo "<th>";echo "Fecha de Nacimiento";echo "</th>";
            echo "<th>";echo "Estado de Solicitud";echo "</th>";
            echo "<th>";echo "Avance de Solicitud";echo "</th>";
            echo "<th>";echo "Opciones";echo "</th>";
            echo "</tr>";
            while($filas=$consulta->fetch_assoc()){
                echo "<tr>";
                echo "<td>";echo "".$filas['id_solic'];echo "</td>";
                echo "<td>";echo "".$filas['nombre'];echo "</td>";
                echo "<td>";echo "".$filas['appat'];echo "</td>";
                echo "<td>";echo "".$filas['apmat'];echo "</td>";
                echo "<td>";echo "".$filas['curp'];echo "</td>";
                echo "<td>";echo "".$filas['fecha_nac'];echo "</td>";
                echo "<td>";echo "".$filas['estado_solicitud'];echo "</td>";
                echo "<td>";echo "".$filas['avance_solicitud'];echo "</td>";                
                echo "<td>";echo "<a href='php/nueva_cita.php?id=".$filas['id_solic']."'><button class='btn btn-primary' title=\"Agregar cita\"><i class=\"fas fa-calendar-check\"></i></button></a>
                <a href='php/modificar_solic.php?id=".$filas['id_solic']."'>
           <button type='button' class='btn btn-success'  title=\"Modificar solicitante\">
               <i class='fas fa-user-edit'></i>
           </button>
       </a><a href='php/eliminar_solic.php?id=".$filas['id_solic']."'>
           <button type='button' class='btn btn-danger'  title=\"Eliminar solicitante\">
               <i class='fas fa-trash-alt'></i>
           </button>
       </a>
       </td>";
                echo "</tr>";
            }
            echo "</table>";
		}else{
			echo "Sin acceso";
		}
	}else if(3==$opcion){
			echo "Invalido..";
	}
?>