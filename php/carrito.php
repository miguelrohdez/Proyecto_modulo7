<?php
   /* session_start();    
    $varSesion = $_SESSION['usuario'];


    if($varSesion == null || $varSesion== ""){
        echo "No tiene acceso a esta pagina";
        die();
    }*/
?>

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
			//session_start();
			//if(!isset($_SESSION["usuario"])){
			//	header("location:../login.html");
			//}
		?>
		
		<div class="container-menu">
			<nav class="nav-main">
				<a class="logoNav" href="#./index.html">
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
						<a href="#login.html"><button>Entrar</button></a>
					</li>
					<li>
						<a href="#./registro.html"><button>Registrarse</button></a>
					</li>
				</ul>
			</nav>
			<hr>
		</div>
			
		<!-- Aqui  empieza la caja principal -->
		<div class="container">
			<header>
				<h1 class="tituloPrincipal">CONFIRMACION DE PEDIDO</h1>
			</header>	
		<!-- Aqui  empieza la seccion del formulario o datos a mostrar -->

		<?php
			require("datos_con.php");
			require("listarMenu.php");

			$productoID =   $_POST["orden"];
			$cantidadProd = $_POST["cantidad"];
			//$usuarioID = $_SESSION['usuario'];

			$conexion = new mysqli($db_host, $db_admin,$db_pass,$db_data);

			if ($conexion -> connect_errno) {
				echo "Fallo la conexion ".$conexion -> connect_errno;
			}else{
				echo 'Conexion exitosa';
				$conexion -> set_charset("utf8");
				$consulta = "SELECT * FROM menu WHERE  codigo = '$productoID' ";

				$resultado = mysqli_query($conexion, $consulta);

				while($fila = mysqli_fetch_array($resultado)){
					listarMenu($fila);
				}

				mysqli_free_result($resultado);
				$conexion -> close();
			}
			echo '<br>';
			echo 'Numero de menu: '. $productoID ."<br>";
			echo 'Cantidad : '. $cantidadProd . "<br>";
			
			
		?>


		<div class="caja principal">
					<!-- DESCRICOPN PRODUCTO COMPRADO
						BOTON FINALIZAR(PAGINA PEDIDOFINAL)  O REGRESAR(mENU O PROMOCIONES) 
					-->					
				<a href="../index.html"><button>Regresar</button></a>
				<form action="pedido_final.php" method="POST">
					<p>Confirme numero de Menu: <input type="number" name="numOrden" max="10"></p> 
					<p>Confirme cantidad: <input type="number" name="cantidad" max="50"></p> 
					<p>Confirme email: </p><input type="text" name="correo"> 
					<p></p><input type="submit" value="Confirmar" name="confirmar">
				</form>

		</div>
		
		
		<div class="clear"></div>
		</div>
		<footer>
			<h1 class="text-footer"> Ⓒ 2021 Lalo's Burger ALGUNOS PRODUCTOS ESTAN SUJETOS A DISPONIBILIDAD</h1>
		</footer>
	</body>
</html>