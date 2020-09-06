<?php
session_start();
$pariente = $_SESSION['inputCURP'];
echo $pariente;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Registrar aspirante</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="icon" href="../img/LogoPalomas.png">
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
                <a id="palomas" class="navbar-brand" href=""><span class="fas fa-dove"></span> Palomas Mensajeras</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><img id="logo-menu" src="img/Logo-menu.png" alt=""></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="text-center navbar-nav ml-md-auto">
                        <a class="nav-item nav-link active-1" href="cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i> Salir</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <div class="container mb-3 mt-2">
       <h3>Agregar Aspirante</h3>
        <form method="post" action="agregar_solic.php" class="form text-dark">
                        <div class="form-row">
                            <div class="col">
                              <label for="nombre">Nombre(s)</label>
                              <input onkeyup="mayus(this);" id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre(s)" required="">
                            </div>
                            <div class="col">
                              <label for="appat">Apellido paterno</label>
                              <input onkeyup="mayus(this);" id="appat" name="appat" type="text" class="form-control" placeholder="Paterno" required="">
                            </div>
                            <div class="col">
                              <label for="apmat">Apellido materno</label>
                              <input onkeyup="mayus(this);" id="apmat" name="apmat" type="text" class="form-control" placeholder="Materno" required="">
                            </div>
                        </div>
                        <div class="mt-3 form-row">
                              <div class="form-group col">
                                <label for="calle">Domicilio</label>
                                <input onkeyup="mayus(this);" type="text" class="form-control w-100" id="calle" name="calle" placeholder="Calle" required>
                              </div>
                              <div class="form-group col">
                                <label for="num">*</label>
                                <input onkeyup="mayus(this);" type="text" class="form-control w-100" id="num" name="num" placeholder="Número">
                              </div>
                              <div class="form-group col">
                                <label for="colonia">*</label>
                                <input onkeyup="mayus(this);" type="text" class="form-control w-100" id="colonia" name="colonia" placeholder="Colonia" required>
                              </div>
                              <div class="form-group col">
                                <label for="cp">*</label>
                                <input type="text" maxlength="5" class="form-control w-100" id="cp" name="cp" placeholder="CP" required >
                              </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                            <label for="curp">Curp</label>
                            <input onkeyup="mayus(this);" type="text" id="curp" name="curp" class="form-control" placeholder="CURP" required="" maxlength="18">
                            </div>
                            <div class="col-4">
                              <label for="fecha">Fecha de nacimiento</label>
                              <input type="date" name="fecha" id="fecha" class="form-control">
                            </div>
                        </div>
                        <div class="mt-3 form-group">
                            <label for="estado">Estado de Estados Unidos en el cual radican sus familiares</label>
                            <select class="form-control" id="estado" name="estado">
                              <option>CALIFORNIA</option>
                              <option>TEXAS</option>
                              <option>GEORGIA</option>
                              <option>CHICAGO</option>
                            </select>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Registrar aspirante</button>
                    </form>
    </div><div class="container-fluid separador">
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
    <!-- SCRIPTS -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
        function mayus(e) {
            e.value = e.value.toUpperCase();
        }    
    </script>
</body>
</html>