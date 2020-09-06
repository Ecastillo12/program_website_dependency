<?php
    require_once "transacciones.php";
    $nombre=$_POST["inputRegNombres"];
    $appat=$_POST["inputRegApPat"];
    $apmat=$_POST["inputRegApMat"];
    $tel=$_POST["inputTel"];
    $calle=$_POST["inputCalle"];
    $num=$_POST["inputNum"];
    $ZIP=$_POST["inputZip"];
    $curp=$_POST["inputRegCurp"];
    $pass=$_POST["inputRegPassword"];
    $status=$_POST["inputStatus"];
    $parentezco=$_POST["inputFam"];

    include("conexion.php");

    $consulta="INSERT INTO pariente(curp, nombre, appat, apmat, calle, numero, zip, tel, estatus, parentezco) VALUES(
    '".strtoupper($curp)."',
    '".strtoupper($nombre)."',
    '".strtoupper($appat)."',
    '".strtoupper($apmat)."',
    '".strtoupper($calle)."',
    '".($num)."',
    '".($ZIP)."',
    '".($tel)."',
    '".strtoupper($status)."',
    '".strtoupper($parentezco)."'
    );";
    $x=consultarSQL($consulta);
    
    if($x==1){
        $sql="SELECT id_pariente FROM pariente WHERE curp ='$curp';";
        $cons = $conexion->query($sql);
        while ($filas = $cons->fetch_assoc()) {
        $idPariente = "" . $filas['id_pariente'];
        }
        
        $consulta2="INSERT INTO usuario (curp, pass, id_pariente) VALUES(
        '".strtoupper($curp)."',
        '".($pass)."',
        '".($idPariente)."'
        );";
        
        $x2=consultarSQL($consulta2);
        
        if($x2==1){
            ?>
        <script>                
                alert('REGISTRADO EXITOSAMENTE');
                window.location.href='../index.html';
        </script>
        <?php
        }else{
            ?>
            <script>
                
                alert('NO SE REGISTRÓ EL ASPIRANTE');
                window.location.href='../index.html';
            </script>
        <?php
        }
    }else{
        ?>
            <script>
                
                alert('NO SE REGISTRÓ EL ASPIRANTE');
                window.location.href='../index.html';
            </script>
        <?php
    }
?>