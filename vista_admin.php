<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Administración</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="icon" href="img/LogoPalomas.png">
    <script>
    function pestana(){
        $('ul.tabs li a:first').addClass('active');
	   $('.secciones article').hide();
	   $('.secciones article:first').show();

	   $('ul.tabs li a').click(function(){
		$('ul.tabs li a').removeClass('active');
		$(this).addClass('active');
		$('.secciones article').hide();

		var activeTab = $(this).attr('href');
		$(activeTab).show();
		return false;
	});
    }
        window.onload(pestana());
    </script>
</head>
<body>
    <div class="logos container-fluid d-none d-md-block d-lg-block d-xl-block">
        <div class="row justify-content-between cabeza">
            <div class="col">
                <img src="img/LogoPalomas.png" alt="Palomas Mensajeras">
            </div>
            <div class="col text-center">
                <img src="img/Semigrante2.png" alt="Secretaría del Migrante del estado de Michoacán">
            </div>
            <div class="col d-flex justify-content-end">
                <img src="img/logo_patzcuaro_web.jpg" alt="H. Ayuntamiento de Pátzcuaro">
            </div>
        </div>
    </div>
    <header>
        <div class="sticky-top">
            <nav class="menu navbar navbar-expand-md">
                <a id="palomas" class="navbar-brand" href=""><span class="fas fa-dove"></span> Grupos</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><img id="logo-menu" src="img/Logo-menu.png" alt=""></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="text-center navbar-nav ml-md-auto">
                       <a class="nav-item nav-link" href="php/cerrar_sesion.php">Administradores</a>
                        <a class="nav-item nav-link active-1" href="php/cerrar_sesion.php">Cerrar Sesión</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <hr>
    <div class="wrap container">
        <ul class="tabs">
            <li><a id="list" href="#tab1" onclick="pestana()"><span class="fas fa-film"></span><span class="tabs-text"  > California</span></a></li>
            <li><a id="list" href="#tab2" onclick="pestana()"><span class="fas fa-school"></span><span class="tabs-text"> Texas</span></a></li>
            <li><a id="list" href="#tab3" onclick="pestana()"><span class="fas fa-notes-medical"></span><span class="tabs-text"> Georgia</span></a></li>
            <li><a id="list" href="#tab4" onclick="pestana()"><span class="fas fa-building"></span><span class="tabs-text"> Chicago</span></a></li>
        </ul>
        <div class="secciones">
            <article id="tab1">
                <li>
                    <a id="lista" href="">California 1</a><br>
                    <a id="lista" href="">California 2</a><br>
                    <a id="lista" href="">California 3</a><br>
                    <a id="lista" href="">California 4</a><br>
                    <a id="lista" href="">California 5</a>
                </li>
            </article>
            <article id="tab2">
                <li>
                    <a id="lista" href="">Texas 1</a>
                </li>
            </article>
            <article id="tab3">
                <li>
                    <a id="lista" href="">Georgia 1</a>
                </li>
            </article>
            <article id="tab4">
                <li>
                    <a id="lista" href="">Chicago 1</a>
                </li>
            </article>
        </div>
    </div>
    <hr>
    <footer class="footers">
        <div class="container-fluid row">
        <div class="col-md-3 col-sm-3">
           <p style="text-align: center">               
            <img src="img/escudo-Gray.png" alt="Estado de Michoacán" style="width: 100px">
           </p>
        </div>            
        <br>
        <div class="col-md-3 col-sm-3">
           <br>
            <h6>Información y Trámites</h6>
            <a href="">Historial de publicaciones</a><br>
            <a href="">Aviso de proteccion de datos</a><br>
            <a href="">Correo institucional</a>
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
           <p style="text-align: center"><br>
                 <img id="escudoPeque" src="img/escudo-Gray.png" style="width: 50px" alt="">
               <br>
		            	<a class="icono" href="https://twitter.com/gobmichoacan" data-toggle="tooltip" title="Twitter"><i class="fab fa-twitter fa-w-14 fa-lg"></i></a>
						<a class="icono" href="https://facebook.com/gobmichoacan" data-toggle="tooltip" title="Facebook"><i class="fab fa-facebook fa-w-14 fa-lg"></i></a>
						<a class="icono" href="https://www.youtube.com/channel/UC_uaIRgMrAl91qewRt17v5g" data-toggle="tooltip" title="YouTube"><i class="fab fa-youtube fa-w-14 fa-lg" ></i></a>
						<a class="icono" href="https://www.instagram.com/GobMichoacan/" data-toggle="tooltip" title="Instagram"><i class="fab fa-instagram fa-w-20 fa-lg "></i></a>
		            
           </p>
        </div>
        </div>
        <p style="text-align: center">&copy; 2018  |  Desarrollado por Eduardo Castillo y Carlos Ramos  | <a id="tec" href="">Instituto Tecnológico Superior de Pátzcuaro</a></p>
    </footer>
    <!-- SCRIPTS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>