
<!DOCTYPE html>
<html>
<head><meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/main.css">
		<title>Datos actualizados</title>
</head>
<body>
    
    <?php include("nav_login.html");?>
    <div class="container">
		<header>
            <h1 class="tituloPrincipal">Datos actualizados!</h1>
		</header>	
		<!-- Aqui  empieza la seccion del formulario o datos a mostrar -->
		<div class="caja principal">
    <?php 
       session_start();
        $nombre = $_POST['txt_nombre'];
        $apaterno = $_POST['txt_apaterno'];
        $amaterno = $_POST['txt_amaterno'];
        $direccion = $_POST['txt_dir'];
        $telefono = $_POST['txt_tel'];
        $correo = $_POST['txt_email'];
        $contrasenia = $_POST['txt_pass'];
        $fecha = $_POST['txt_fecnac'];
        $idCliente = $_SESSION['id'];
        echo "<table class='t_registro'>
        <tr>
            <td><b>Nombre</b></td><td>".$nombre."</td>
        </tr>
        <tr>
            <td><b>Apellido Paterno</b></td><td>".$apaterno."</td>
        </tr>
        <tr>
            <td><b>Apellido Materno</b></td><td>".$amaterno."</td>
        </tr>
        <tr>
            <td><b>Dirección</b></td><td>".$direccion."</td>
        </tr>
        <tr>
            <td><b>Telefono</b></td><td>".$telefono."</td>
        </tr>
        <tr>
            <td><b>E-mail</b></td><td>".$correo."</td>
        </tr>
        <tr>
            <td><b>Contraseña</b></td><td>".$contrasenia."</td>
        </tr>
        <tr>
            <td><b>Fecha de nacimiento</b></td><td>".$fecha."</td>
        </tr>
        <tr>
            <td class='btn_registro' colspan='2'><a href='index.php'><button>Regresar</button></a></td>
        </tr>
    </table>";
    	$link = mysqli_connect("localhost", "root", "usbw");
		mysqli_select_db($link, "lalos_burger");
        $sql = "call SP_ActualizarCliente('".$idCliente."','".$_POST['txt_nombre']."','".$_POST['txt_apaterno']."','".$_POST['txt_amaterno']."','".$_POST['txt_dir']."','".$_POST['txt_email']."','".$_POST['txt_pass']."','".$_POST['txt_tel']."','".$_POST['txt_fecnac']."')";
		mysqli_query($link, $sql);
		mysqli_close($link); //Cerramos la conexion a la base de datos
    	?>
</div>
		<div class="clear"></div>
	</div>
		<footer>
			<h1 class="text-footer"> Ⓒ 2021 Lalo's Burger ALGUNOS PRODUCTOS ESTAN SUJETOS A DISPONIBILIDAD</h1>
		</footer>
	</body>
</html>