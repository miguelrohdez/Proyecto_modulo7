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
        require("./php/datos_con.php");
        $conexion = new mysqli($db_host, $db_admin,$db_pass,$db_data,$db_port);
			if ($conexion -> connect_errno) {
				echo "Fallo la conexion ".$conexion -> connect_errno;
			}else{
				$conexion -> set_charset("utf8");
                $consulta = "SELECT cliente_nombre FROM cliente WHERE cliente_correo = ? AND cliente_contrasenia = ?";
                $stmt = $conexion->prepare($consulta);
            	$stmt->bind_param("ss", $usuario, $password);
            	$stmt->execute();
                $stmt->bind_result($nombre_cliente);
                
                    echo "<p>".$nombre_cliente."</p>";
                
                $conexion -> close();
            }
            
    ?>
</body>
</html>