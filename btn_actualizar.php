
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1 align="center">Datos actualizados</h1>
    <table width="70%" border="1px" align="center">

    <tr align="center">
        <td>Codigo</td>
        <td>Identificacion</td>
        <td>Nombre</td>
        <td>Apellidos</td>
        <td>Especialidad</td>
        <td>Telefono</td>
        <td>Correo</td>
        <td>Correo</td>
        <td>Correo</td>
    </tr>
   
        
        <tr>
            <td><?php echo $_POST['txt_nombre'] ?></td>
            <td><?php echo $_POST['txt_apaterno']?></td>
            <td><?php echo $_POST['txt_amaterno']?></td>
            <td><?php echo $_POST['txt_dir']?></td>
            <td><?php echo $_POST['txt_tel']?></td>
            <td><?php echo $_POST['txt_email']?></td>
            <td><?php echo $_POST['txt_pass']?></td>
            <td><?php echo $_POST['txt_fecnac']?></td>
            <td><?php echo $_POST['id']?></td>

        </tr>
          
    </table>

    <?php 
    	$link = mysqli_connect("localhost", "root", "usbw");

		mysqli_select_db($link, "lalos_burger");

     
        $sql = "call SP_ActualizarCliente('".$_POST['id']."','".$_POST['txt_nombre']."','".$_POST['txt_apaterno']."','".$_POST['txt_amaterno']."','".$_POST['txt_dir']."','".$_POST['txt_email']."','".$_POST['txt_pass']."','".$_POST['txt_tel']."','".$_POST['txt_fecnac']."')";

		mysqli_query($link, $sql);
		mysqli_close($link); //Cerramos la conexion a la base de datos
       
    	echo "<a href='index.php'> Regresar </a>"; ?>
</body>
</html>