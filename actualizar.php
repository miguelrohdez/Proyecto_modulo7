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
			<h1 class="tituloPrincipal">Actualizar datos</h1>
		</header>	
		<!-- Aqui  empieza la seccion del formulario o datos a mostrar -->
		<div class="caja principal">
        
            <form action="btn_actualizar.php" method="POST">
            <table class="t_registro">
                <tr>
                    <td>Nombre </td><td><input type="text" name="txt_nombre" placeholder="Escribe tu nombre..."></td>
                </tr>
                <tr>
                    <td>Apellido Paterno </td><td><input type="text" name="txt_apaterno" placeholder="Escribe tu apellido paterno..."></td>
                </tr>
                <tr>
                    <td>Apellido Materno </td><td><input type="text" name="txt_amaterno" placeholder="Escribe tu apellido materno..."></td>
                </tr>
                <tr>
                    <td>Dirección </td><td><input type="text" name="txt_dir" placeholder="Escribe tu dirección..."></td>
                </tr>
                <tr>
                    <td>Telefono </td><td><input type="tel" name="txt_tel" placeholder="Escribe tu telefono..."></td>
                </tr>
                <tr>
                    <td>E-mail </td><td><input type="email" name="txt_email" placeholder="Escribe tu correo..."></td>
                </tr>
                <tr>
                    <td>Contraseña </td><td><input type="password" name="txt_pass" placeholder="Escribe tu contraseña..."></td>
                </tr>
                <tr>
                    <td>Fecha de nacimiento </td><td><input type="date" name="txt_fecnac" placeholder="Escribe tu fecha de nacimiento..."></td>
                </tr>
                <tr>
                    <td class="btn_registro"><input  type="reset" name="btn_borrar" value="Reiniciar"></td>
                    <td class="btn_registro"><input  type="submit" name="btn_actualizar" value="Registrarse"></td>
                </tr>
            </table>
        </form>
		<?php 

            if (isset($_POST["btn_entrar"]){
                $conexion = new mysqli($db_host, $db_admin,$db_pass,$db_data,$db_port);
                if ($conexion -> connect_errno) {
                    echo "Fallo la conexion ".$conexion -> connect_errno;
                }else{
                    $conexion -> set_charset("utf8");
                    $contrasenia_enc = password_hash($contrasenia, PASSWORD_DEFAULT);
                    $idCliente = $_SESSION["id"];
                    $consulta = "call SP_ActualizarCliente(?,?,?,?,?,?,?,?,?)";
                    $stmt = $conexion->prepare($consulta);
                    $stmt->bind_param("issssisss",$idCliente, $nombre, $apaterno, $amaterno,$direccion,$telefono,$correo,$contrasenia_enc,$fecha);
                    $stmt->execute();	
                    //$stmt->bind_result($idUsuario, $nombre_cliente);
                    if ($stmt->affected_rows>0) {
                        echo "Correcto";
                    }else{
                        echo "Hubo error";
                    }
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