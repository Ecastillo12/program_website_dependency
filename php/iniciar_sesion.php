<?php
include("conexion.php");
$pariente = $_POST["inputCURP"];
$password = $_POST["inputPassword"];
$consulta="SELECT * FROM usuario WHERE curp='".$pariente."' AND pass='".$password."';";
$resultados=mysqli_query($conexion, $consulta);
$filas=mysqli_num_rows($resultados);
if ($filas>0) {
    session_start();
    $_SESSION['inputCURP'] = $pariente;
	header("location:../vista_usuario.php");
}
else{
    $consulta="SELECT * FROM admins WHERE usuario='".$_POST["inputCURP"]."' AND pass='".$_POST["inputPassword"]."';";
    $resultados=mysqli_query($conexion, $consulta);
    $filas=mysqli_num_rows($resultados);
    
    if($filas>0){
        session_start();
        $_SESSION['admin'];
        header("location:../aux_admin.php");
    }
    else{
        ?>
        <script>
            window.location.href='../index.html';
            alert('Datos incorrectos');
        </script>
        <?php
    }
}


mysqli_free_result($resultados);
mysqli_close($conexion);
?>