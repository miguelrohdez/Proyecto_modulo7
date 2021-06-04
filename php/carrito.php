<!DOCTYPE html>
<html lang="es-ES">
	<head>
		<meta charset="utf-8">
		<title>Lalo's Burgers</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
		
		
	</head>
	<body>
		<!-- Aqui  empieza la barra de menus y logo -->
		<?php
			session_start();
			if(!isset($_SESSION["usuario"])){
				header("location:../login.html");
			}
		?>
		<div class="container-menu">
			<nav class="nav-main">
				<a class="logoNav" href="./index.html">
					<img id="logo" src="img/logoFinal.png" alt="Imagen Logo">
				</a>
				<ul class="nav-menu">
					<li>
						<a href="./index.html">Inicio</a>
					</li>
					<li>
						<a href="#">Menu</a>
					</li>
					<li>
						<a href="#">Promociones</a>
					</li>
					<li>
						<a href="#">Mi orden</a>
					</li>
					<li>
						<a href="#">Contacto</a>
					</li>
				</ul>
				<ul class="nav-sesion">
					<li>
						<a href="login.html"><button>Entrar</button></a>
					</li>
					<li>
						<a href="./registro.html"><button>Registrarse</button></a>
					</li>
				</ul>
			</nav>
			<hr>
		</div>
			
		<!-- Aqui  empieza la caja principal -->
		<div class="container">
			<header>
				<h1 class="tituloPrincipal">INICIO</h1>
			</header>	
		<!-- Aqui  empieza la seccion del formulario o datos a mostrar -->
		<div class="caja principal">

		</div>
		
		
		<div class="clear"></div>
		</div>
		<footer>
			<h1 class="text-footer"> Ⓒ 2021 Lalo's Burger ALGUNOS PRODUCTOS ESTAN SUJETOS A DISPONIBILIDAD</h1>
		</footer>
	</body>
</html>