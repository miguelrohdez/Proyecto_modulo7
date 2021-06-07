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
						<a href="index.php">Volver</a>
					</li>
				</ul>
				<ul class="nav-sesion">
					<li>
						<a href="#login.html"><button>Entrar</button></a>
					</li>
					<li>
						<a href="#registro.html"><button>Registrarse</button></a>
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


                <table class="menuH">
                <tr>
                    <td>
                        <p> Hamburguesa sencilla </p>                    
                        <input type="radio" name="orden" value="1" id="o1">
                        <label for="o1">Orden 1</label><br>
                    </td>
                    <td>
                        <p>Hamburguesa con queso</p>                    
                        <input type="radio" name="orden" value="2" id="o2">
                        <label for="o2">Orden 2</label><br>
                    </td>
                    <td>
                        <p>Hamburguesa doble queso y papas</p>                    
                        <input type="radio" name="orden" value="3" id="o3">
                        <label for="o3">Orden 3</label><br>
                    </td>
                </tr><br>
                <tr>
                    <td>
                        <p>Hamburguesa con queso y tosino</p>                    
                        <input type="radio" name="orden" value="4" id="o4">
                        <label for="o4">Orden 4</label><br>
                    </td>
                    <td>
                        <p>Hamburguesa con papas</p>                    
                        <input type="radio" name="orden" value="5" id="o5">
                        <label for="o5">Orden 5</label><br>
                    </td>
                    <td>
                        <p>Hamburguesa con papas y refresco</p>                    
                        <input type="radio" name="orden" value="4" id="o6">
                        <label for="o6">Orden 6</label><br>
                    </td>
                </tr>
                </table>

                <br>
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
