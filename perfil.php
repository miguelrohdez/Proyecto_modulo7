<!DOCTYPE html>
<html lang="es-ES">
	<head>
		<meta charset="utf-8">
		<title>Lalo's Burgers</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
		
		
	</head>
	<body>
	<!-- Parte que verifica el login -->
		
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
			<h1 class="tituloPrincipal">Perfil</h1>
		</header>	
		<!-- Aqui  empieza la seccion del formulario o datos a mostrar -->
		<div class="caja principal">
			
			<!-- LOGIN
			CORREO
					CONTRA
					BTN INGRESAR (VERIFICAR) Y BTN REGISTRAR (IR A REGISTRAR) -->
			<?php 
				if (!isset($_SESSION["usuario"])) {
					echo "<h2>Vuelve a iniciar sesion</h2>";
					echo "<h2>Tu sesion a expirado</h2>";
				}else{
					echo "<h2>Datos de perfil</h2>";
					echo $_SESSION["id"];
					require("./php/datos_con.php");
					$conexion = new mysqli($db_host, $db_admin,$db_pass,$db_data,$db_port);
					if ($conexion -> connect_errno) {
						echo "Fallo la conexion ".$conexion -> connect_errno;
					}
					$conexion -> set_charset("utf8");
					$consulta = "SELECT cliente_nombre, cliente_apaterno,cliente_amaterno, cliente_direccion, cliente_correo, cliente_telefono, cliente_fechaNac FROM cliente WHERE NoCliente = ?";
					$stmt = $conexion->prepare($consulta);
					$idCliente = $_SESSION["id"];
					$stmt->bind_param("i", $idCliente);
					$stmt->execute();	
					$stmt->bind_result($nombre,$apaterno,$amaterno,$direccion,$correo,$telefono,$fecha);
					$stmt->fetch();
					$hh = 'Hola';
					echo "<table class='t_registro'>
								<tr>
									<td>Nombre </td><td>".$nombre."</td>
								</tr>
								<tr>
									<td>Apellido Paterno </td><td>".$apaterno."</td>
								</tr>
								<tr>
									<td>Apellido Materno </td><td>".$amaterno."</td>
								</tr>
								<tr>
									<td>Dirección </td><td>".$direccion."</td>
								</tr>
								<tr>
									<td>Telefono </td><td>".$telefono."</td>
								</tr>
								<tr>
									<td>E-mail </td><td>".$correo."</td>
								</tr>
								<tr>
									<td>Fecha de nacimiento </td><td>".$fecha."</td>
								</tr>
								<tr>
									<td class='btn_registro'><a href='./actualizar.php?var=".$correo."'><button>Actualizar perfil</button></a></td>
									<td class='btn_registro'><a href='./eliminar.php'><button>Eliminar perfil</button></a></td>
								</tr>
							</table>";


						
				}
				
			?>
			
			
		</div>
		
		
		<div class="clear"></div>
		</div>
		<footer>
			<h1 class="text-footer"> Ⓒ 2021 Lalo's Burger ALGUNOS PRODUCTOS ESTAN SUJETOS A DISPONIBILIDAD</h1>
		</footer>
	</body>
</html>