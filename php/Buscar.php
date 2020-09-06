<?php
$conexion=mysqli_connect('localhost', 'root', '', 'palomas_mensajeras') or die('Conexión fallida');

//ESTA CONSULTA MUESTRA TODOS LOS REGISTROS DE LA TABLA O VISTA
$con="SELECT * FROM solicitante";


//Y AQUI ENTRA EN CUANTO COMINENZA A ESCRIBIR EN LA CAJA DE BUSQUEDA
if(isset($_POST['consul'])){
    
    //ESTA VARIABLE GUARDA LO QUE SE VA ESCRIBIENDO EN LA CAJA DE BUSCAR
    $q = $_POST['consul'];
    
    //ESTA SERÁ LA NUEVA CONSULTA QUE VA A BUSCAR EN LOS DISTINTOS CAMPOS CON EL LIKE PARA QUE BUSQUE EN CUALQUIER PARTE DEL REGISTRO LO QUE SE VAYA INTRODUCIENDO --LEE LA CONSULTA-- 
    $con="SELECT * FROM solicitante WHERE nombre LIKE '%".$q."%' OR appat LIKE '%".$q."%' OR apmat LIKE '%".$q."%' OR curp LIKE '%".$q."%';";
}
$resultado=mysqli_query($conexion, $con);
$fila=mysqli_num_rows($resultado);

if($fila>0){
    echo "<table class='table table-responsive'>";
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
            while($filas=$resultado->fetch_assoc()){
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
}
else{
    echo "NO HAY COINCIDENCIAS";
}
?>