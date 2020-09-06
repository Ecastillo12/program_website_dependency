<?php
session_start();
$idSolic=$_GET['id'];
echo $idSolic;
$res=ConsultarSolic($idSolic);
function ConsultarSolic($id_so){
    include("conexion.php");
    $sql="SELECT * FROM solicitante WHERE id_solic = '$id_so' ";
    $consulta = $conexion->query($sql);
    $filas = $consulta->fetch_assoc();
    return[
        $filas['curp'],
        $filas['nombre'],
        $filas['appat'],
        $filas['apmat'],
        $filas['fecha_nac'],
        $filas['calle'],
        $filas['numero'],
        $filas['colonia'],
        $filas['cp'],
        $filas['state'],
        $filas['avance_solicitud'],
        $filas['estado_solicitud']
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modificar Solicitante</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="icon" href="../img/LogoPalomas.png">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#slider" ).slider({
      value:0,
      min: 0,
      max: 100,
      step: 10,
      slide: function( event, ui ) {
        $( "#amount" ).val( ui.value+"%" );
      }
    });
    $( "#amount" ).val( $( "#slider" ).slider( "value" )+"%" );
  } );
  </script>
  <script>
    function consultarBD(){
    var xhttp;
    if(window.XMLHttpRequest){
        xhttp = new XMLHttpRequest();
    } else {
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            document.getElementById("citas").innerHTML = xhttp.responseText;
        }
    };

    xhttp.open("GET","citas.php?q="+2, true);
    xhttp.send();
}



window.onLoad=consultarBD();
    </script>
  
</head>
<body>
    <div class="logos container-fluid d-none d-md-block d-lg-block d-xl-block">
        <div class="row justify-content-between cabeza">
            <div class="col">
                <img src="../img/LogoPalomas.png" alt="Palomas Mensajeras">
            </div>
            <div class="col text-center">
                <img src="../img/Semigrante2.png" alt="Secretaría del Migrante del estado de Michoacán">
            </div>
            <div class="col d-flex justify-content-end">
                <img src="../img/logo_patzcuaro_web.jpg" alt="H. Ayuntamiento de Pátzcuaro">
            </div>
        </div>
    </div>
    <header>
        <div class="sticky-top">
            <nav class="menu navbar navbar-expand-md">
                <a id="palomas" class="navbar-brand" href="#"><span class="fas fa-dove"></span> Palomas Mensajeras</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><img id="logo-menu" src="img/Logo-menu.png" alt=""></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="text-center navbar-nav ml-md-auto">
                        <a class="nav-item nav-link active-1" href="../aux_admin.php"><i class="fas fa-sign-out-alt"></i> Regresar</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <div class="container-fluid">
        <h1><strong>Modificar Solicitante:</strong></h1>
        <hr>
        <div class="container">
            <form action="mod_sol.php" method="post">
                  <h6><strong>DATOS PERSONALES:</strong></h6>
               <div class="form-row">
                   <div class="col">
                      <input type="hidden" name="id_sol" value=" <?php echo$idSolic; ?> ">
                       <label for="inputCurp">CURP</label>
                <input type="text" name="inputCurp" id="inputCurp" maxlength="18" class="form-control" value="<?php echo $res[0] ?>">
                   </div>
                   <div class="col">
                       <label for="inputName">Nombre:</label>
                <input type="text" name="inputName" id="inputName" class="form-control" value="<?php echo $res[1] ?>">
                   </div>
                   <div class="col">
                       <label for="inputLast1">Apellido paterno:</label>
                <input type="text" name="inputLast1" id="inputLast1" class="form-control" value="<?php echo $res[2] ?>">
                   </div>
                   <div class="col">
                       <label for="inputLast2">Apellido materno:</label>
                <input type="text" name="inputLast2" id="inputLast2" class="form-control" value="<?php echo $res[3] ?>">
                   </div>
                   <div class="col">
                        <label for="inputFecha">Fecha de Nacimiento:</label>
                <input type="date" name="inputFecha" id="inputFecha" class="form-control" value="<?php echo $res[4] ?>">
                   </div>
               </div>          
                <hr>
                <h6><strong>DOMICILIO</strong></h6>
                <hr>
                <div class="form-row">
                    <div class="col">
                <label for="inputCalle">Calle:</label>
                <input type="text" name="inputCalle" id="inputCalle" class="form-control" value="<?php echo $res[5] ?>"></div>
                    <div class="col">
                <label for="inputNum">Número:</label>
                <input type="text" name="inputNum" id="inputNum" class="form-control" value="<?php echo $res[6] ?>"></div>
                </div>
                <div class="form-row">
                    <div class="col">
                <label for="inputColonia">Colonia:</label>
                <input type="text" name="inputColonia" id="inputColonia" class="form-control" value="<?php echo $res[7] ?>"></div>
                    <div class="col">
                <label for="inputCP">Código Postal:</label>
                <input type="text" name="inputCP" id="inputCP" class="form-control" value="<?php echo $res[8] ?>"></div>
                    <div class="col">
                <label for="inputState">Estado de destino:</label>
                <input type="text" name="inputState" id="inputState" class="form-control" value="<?php echo $res[9] ?>"></div>
                </div>
                <hr>
                <h6><strong>CAMBIOS DE SOLICITUD</strong></h6>
                <hr>
                <div class="form-row">
                    <div class="col">                        
                    <label for="inputProgress">Avance de solicitud:</label>
                    <input type="text" id="amount" readonly style="border:0; color:green; font-weight:bold;" name="inputProgress">
                    <!--<meter id="amount" min="0" max="100" low="25" high="75" optimum="100"></meter>-->
                    
                     <div id="slider"></div>
                   
                    </div>
                    <div class="col">
                        <label for="inputStatus">Estado de solicitud:</label>
                        <select name="inputStatus" id="inputStatus" class="form-control">
                            <option value="INACTIVO" class="form-control">INACTIVO</option>
                            <option value="ACTIVO" class="form-control">ACTIVO</option>
                            <option value="EXPULSADO" class="form-control">EXPULSADO</option>
                            <option value="COMPLETADO" class="form-control">COMPLETADO</option>
                        </select>
                    </div>
                    <hr>
                </div>
                <hr>
                <center><input type="submit" value="Guardar" class="btn btn-success"></center>                
            </form>
        </div>
    </div>
    <hr><div class="container-fluid separador">
    <div class="row">
        
			<div class="col-xs-2 col-sm-2 col-md-2 azul"></div>
			<div class="col-xs-2 col-sm-2 col-md-2 morado"></div>
			<div class="col-xs-2 col-sm-2 col-md-2 amarillo"></div>
			<div class="col-xs-2 col-sm-2 col-md-2 vino"></div>
			<div class="col-xs-2 col-sm-2 col-md-2 verde"></div>
			<div class="col-xs-2 col-sm-2 col-md-2 magenta"></div>
    </div>
    </div>
    <footer class="footers">
        <div class="container-fluid row">
            <div class="col-md-3 col-sm-3">
               <p style="text-align: center"><img src="../img/escudo-Gray.png" alt="Estado de Michoacán" style="width: 100px"></p>
            </div>            
            <br>
            <div class="col-md-3 col-sm-3">
               <br>
                <h6>Información y Trámites</h6>
                <a href="http://michoacan.gob.mx/archivo">Historial de publicaciones</a><br>
                <a href="http://michoacan.gob.mx/aviso-proteccion-datos">Aviso de proteccion de datos</a><br>
                <a href="http://smo.michoacan.gob.mx/">Correo institucional</a>
            </div>
            <div class="col-md-3 col-sm-3">
               <br>
                <h6>Asistencia y Emergencia</h6>
                <a href="">01(800) 455 4500</a><br>
                <a href="">070</a><br>
                <a href="">065 Cruz Roja</a><br>
                <a href="">066 Emergencias</a><br>
                <a href="">089 Denuncia anónima</a><br>
            </div>
            <br>
            <br>
            <div class="col-md-3 col-sm-3">
              <p style="text-align: center"><img id="escudoPeque" src="../img/escudo-Gray.png" style="width: 50px" alt=""></p>
              <div class="iconos">
                   <p style="text-align: center">
                   <a class="icono" href="https://twitter.com/gobmichoacan" data-toggle="tooltip" title="Twitter"><i class="fab fa-twitter fa-w-14 fa-lg"></i></a>
                    <a class="icono" href="https://facebook.com/gobmichoacan" data-toggle="tooltip" title="Facebook"><i class="fab fa-facebook fa-w-14 fa-lg"></i></a>
                    <a class="icono" href="https://www.youtube.com/channel/UC_uaIRgMrAl91qewRt17v5g" data-toggle="tooltip" title="YouTube"><i class="fab fa-youtube fa-w-14 fa-lg" ></i></a>
                    <a class="icono" href="https://www.instagram.com/GobMichoacan/" data-toggle="tooltip" title="Instagram"><i class="fab fa-instagram fa-w-20 fa-lg "></i></a>
               </p>
              </div>
            </div>
        </div>
        <p style="text-align: center">&copy; 2018  |  Desarrollado por Eduardo Castillo y Carlos Ramos  | <a id="tec" href="http://www.itspa.edu.mx/">Instituto Tecnológico Superior de Pátzcuaro</a></p>
    </footer>
</body>
</html>