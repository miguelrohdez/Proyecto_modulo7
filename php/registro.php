<!DOCTYPE html>
<html lang="es-ES">
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
			
			echo '<a href="../registro.html"></a>';
		?>
		
	</body>
</html>