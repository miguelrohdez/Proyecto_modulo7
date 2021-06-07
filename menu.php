

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
		<title>Menu</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
	</head>
    <body>
    <!-- Aqui  empieza la barra de menus y logo -->
		<div class="container-menu">
			<nav class="nav-main">
				<a class="logoNav" href="index.php">
					<img id="logo" src="img/logoFinal.png" alt="Imagen Logo">
				</a>
				<ul class="nav-menu">
					<li>
						<a href="index.php">Inicio</a>
					</li>
				</ul>
			</nav>
			<hr>
		</div>
			
		<!-- Aqui  empieza la caja principal -->
		<div class="container">
			<header>
				<h1 class="tituloPrincipal">MENU DE HAMBURGUESAS Y BEBIDAS</h1>
			</header>	
		<!-- Aqui  empieza la seccion del formulario o datos a mostrar -->
		<div class="pedidoActual">
				<!-- COMBOS
					IMAGEN
					DESCRI
					PRECIO AGREGAR(IR A CARRITO) -->
			<!--	Se inicia form, para enviar datos de pedido -->
            <form method="POST" name = "pedido" Onsubmit = "return Validation(this)" action="./php/carrito.php">

            	<?php
            		$link = mysqli_connect("localhost", "root", "usbw");
					mysqli_select_db($link, "lalos_burger");
					$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las 	tildes correctamente
					$result = mysqli_query($link, "SELECT * FROM menu");
	
					echo "<table class='menuH'>";
					$num = 0;
					$ban = 0;
					while ($fila = mysqli_fetch_array($result)) {
						# code...
						$num = $num + 1;
						$ban = $ban + 1;
						if ($ban == 1) {
							echo "<tr>";
						}
                    		echo "<td>";
                    				echo "<h3> ".$fila['menu_nombre']." </h3>";
                        		echo "<p> ".$fila['menu_descripcion']." Precio: ".$fila['menu_precio']." </p>";
                        		echo "<input type='radio' name='orden' value='".$num."' id='o".$num."' >";
                        		echo "<label for='o".$num."'>Orden '".$num."'</label><br>";
                        		echo "<img src= ".$fila['menu_imagen']." width='100px' >";
                    		echo "</td>";
                    	if ($ban == 3) {
							echo "</tr>";
							$ban = 0;
						}

					}
					echo "</table>";

					mysqli_free_result($result);
					mysqli_close($link);
		            
            	?>
            	

                <input type="number" name="cantidad" min="1" max="50" step="1"  required="required">

                <input type="submit" value="Confirmar Cantidad" name="confirmar">
            </form>
                
		</div>
		
		
		<div class="clear"></div>
		</div>
		<footer>
			<h1 class="text-footer"> Ⓒ 2021 Lalo's Burger ALGUNOS PRODUCTOS ESTAN SUJETOS A DISPONIBILIDAD</h1>
		</footer>
</body>
</html>
