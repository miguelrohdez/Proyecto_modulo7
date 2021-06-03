<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Datos registrados</title>
	</head>
	<body>
		<?php 
			$nombre = $_POST['txt_nombre'];
			$apaterno = $_POST['txt_apaterno'];
			$amaterno = $_POST['txt_amaterno'];
			$dir = $_POST['txt_dir'];
			$tel = $_POST['txt_tel'];
			$email = $_POST['txt_email'];
			$fecnac = $_POST['txt_fecnac'];

			echo "Hola <b>".$Nombre."</b><br>";
			echo "Te apellidas ".$Apellido."<br>";
			echo "Tu direccion es ".$Dir."<br>";
			echo "Tu telefono es ".$Tel."<br>";
			echo "Tu edad es ".$Age."<br>";
			echo "Tu estatura es ".$Size."m<br><hr>";

			echo "Insertando datos en la base de datos <br><br>";
			//Insercion metodo
			$link = mysqli_connect("localhost","root","usbw");
			mysqli_select_db($link, "prueba");
			mysqli_query($link, "INSERT INTO personales VALUES ('$Nombre', '$Apellido', '$Dir', $Tel, $Age, $Size,'' ) ");


			function mostrarDatos($resultados)
			{
				if ($resultados != NULL) {
					echo "·Nombre: ".$resultados['Nombre']."<br>";
					echo "·Apellido: ".$resultados['Apellidos']."<br>";
					echo "·Direccion: ".$resultados['Direccion']."<br>";
					echo "·Telefono: ".$resultados['Telefono']."<br>";
					echo "·Edad: ".$resultados['Nombre']."<br>";
					echo "<hr>";
				}else{
					echo "No hay mas datos".$resultados;
				}
			}

			$tildes = $link->query("SET NAMES 'utf8'");
			$result = mysqli_query($link, "SELECT * from personales");

			while ($fila = mysqli_fetch_array($result)) {
				mostrarDatos($fila);
			}

			$extraido2 = mysqli_fetch_array($result);
			mostrarDatos($extraido2);

			mysqli_free_result($result);
			mysqli_close($link);

			echo '<a href="formulario_clss3"> Volver al formulario</a>';
		?>
	</body>
</html>