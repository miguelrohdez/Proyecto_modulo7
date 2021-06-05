<!DOCTYPE html>
<html lang="es-ES">
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/main.css">
		<title>Datos registrados</title>
	</head>
	<body>
    <?php         
        include("nav_nologin.html");
    ?>
    <div class="container">
		<header>
			<h1 class="tituloPrincipal">Bienvenido a Lalo's Burgues</h1>
		</header>	
		<!-- Aqui  empieza la seccion del formulario o datos a mostrar -->
		<div class="caja principal">

		<?php 
       
			$nombre = $_POST['txt_nombre'];
			$apaterno = $_POST['txt_apaterno'];
			$amaterno = $_POST['txt_amaterno'];
			$direccion = $_POST['txt_dir'];
			$telefono = $_POST['txt_tel'];
			$correo = $_POST['txt_email'];
			$contrasenia = $_POST['txt_pass'];
			$fecha = $_POST['txt_fecnac'];
            echo "<h2>Se registraron los siguientes datos</h2>";
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
							</table>";
            $conexion = new mysqli($db_host, $db_admin,$db_pass,$db_data,$db_port);
            if ($conexion -> connect_errno) {
                echo "Fallo la conexion ".$conexion -> connect_errno;
            }else{
                $conexion -> set_charset("utf8");
                $contrasenia_enc = password_hash($contrasenia, PASSWORD_DEFAULT);
                $consulta = "call SP_AltaCliente(?,?,?,?,?,?,?,?)";
                $stmt = $conexion->prepare($consulta);
                $stmt->bind_param("ssssisss", $nombre, $apaterno, $amaterno,$direccion,$telefono,$correo,$contrasenia_enc,$fecha);
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