<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Lalo's Burgers</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <title>Actualizar</title>
</head>
<body>
    <?php
            session_start();
            if (!isset($_SESSION["usuario"])) {
                include("nav_nologin.html");
            }else{
                include("nav_login.html");
            }
            $correo1=  $_GET["var"];
            require("./php/datos_con.php");

            $conexion = new mysqli($db_host, $db_admin,$db_pass,$db_data,$db_port);
            $conexion -> set_charset("utf8");
            
            //$consul = $conexion -> query("SELECT * FROM cliente WHERE cliente_correo = '".$correo1."'");
            $consul = $conexion -> query("SELECT * FROM cliente WHERE NoCliente = '".$_SESSION['id']."'");
            $fila = mysqli_fetch_assoc($consul);
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
                    <td>Nombre </td><td><input type="text" name="txt_nombre" value= <?php echo $fila['cliente_nombre'];?>></td>
                </tr>
                <tr>
                    <td>Apellido Paterno </td><td><input type="text" name="txt_apaterno" value= <?php echo $fila['cliente_apaterno'];?>></td>
                </tr>
                <tr>
                    <td>Apellido Materno </td><td><input type="text" name="txt_amaterno" value= <?php echo $fila['cliente_amaterno'];?>></td>
                </tr>
                <tr>
                    <td>Dirección </td><td><input type="text" name="txt_dir" value= <?php echo $fila['cliente_direccion'];?>></td>
                </tr>
                <tr>
                    <td>Telefono </td><td><input type="tel" name="txt_tel" value= <?php echo $fila['cliente_telefono'];?>></td>
                </tr>
                <tr>
                    <td>E-mail </td><td><input type="email" name="txt_email" value= <?php echo $fila['cliente_correo'];?>></td>
                </tr>
                <tr>
                    <td>Contraseña </td><td><input type="password" name="txt_pass" value= <?php echo $fila['cliente_contrasenia'];?>></td>
                </tr>
                <tr>
                    <td>Fecha de nacimiento </td><td><input type="text" name="txt_fecnac" value= <?php echo $fila['cliente_fechaNac'];?>></td>
                </tr>
                <tr>
                    <input type="hidden" type="text" name="id" value=<?php echo $fila['NoCliente'];?>>
                    <td class="btn_registro"><input  type="submit" name="btn_actualizar" value="Actualizar"></td>
                </tr>

            </table>
        </form>
		
        </div>
        <div class="clear"></div>
        </div>
        <footer>
            <h1 class="text-footer"> Ⓒ 2021 Lalo s Burger ALGUNOS PRODUCTOS ESTAN SUJETOS A DISPONIBILIDAD</h1>
        </footer>
    </body>
</html>