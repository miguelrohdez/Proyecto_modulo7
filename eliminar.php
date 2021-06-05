<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php         
        include("nav_login.html");
    ?>
    <div class="container">
		<header>
			<h1 class="tituloPrincipal">Bienvenido a Lalo's Burgues</h1>
		</header>	
		<!-- Aqui  empieza la seccion del formulario o datos a mostrar -->
		<div class="caja principal">

		<?php 
       
            $idCliente = $_SESSION["id"];
            $conexion = new mysqli($db_host, $db_admin,$db_pass,$db_data,$db_port);
            if ($conexion -> connect_errno) {
                echo "Fallo la conexion ".$conexion -> connect_errno;
            }else{
                $conexion -> set_charset("utf8");
                $consulta = "call SP_BorrarCliente(?)";
                $stmt = $conexion->prepare($consulta);
                $stmt->bind_param("i", $idCliente);
                $stmt->execute();	
                //$stmt->bind_result($idUsuario, $nombre_cliente);
                if ($stmt->affected_rows>0) {
                    echo "Correcto";
                }else{
                    echo "Hubo error";
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