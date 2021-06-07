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
				if (!isset($_SESSION["usuario"])) {
					include("nav_nologin.html");
				}else{
					include("nav_login.html");
				}
		?>
	<!-- Aqui  empieza la caja principal -->
	<div class="container">
		<header>
			<h1 class="tituloPrincipal">Advertencia!!</h1>
		</header>	
		<!-- Aqui  empieza la seccion del formulario o datos a mostrar -->
		<div class="caja principal">
		
					<table class="t_registro">
					<tr>
					<td id="txt_advertencia" colspan="2"> ¿Desea eliminar el perfil? </td>
					</tr>
					<tr>
						<td class='btn_registro'><a href='eliminar.php'><button>Aceptar</button></a></td>
						<td class='btn_registro'><a href='index.php'><button>Cancelar</button></a></td>
					</tr>
				</table>";
		</div>
		
		
		<div class="clear"></div>
		</div>
		<footer>
			<h1 class="text-footer"> Ⓒ 2021 Lalo's Burger ALGUNOS PRODUCTOS ESTAN SUJETOS A DISPONIBILIDAD</h1>
		</footer>
	</body>
</html>