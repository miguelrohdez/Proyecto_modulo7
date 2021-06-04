<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <?php 

        require("datos_con.php");
        $usuario =   $_POST["txt_email"];
        $password = $_POST["txt_contra"];
        $conexion = mysqli_connect("localhost", "root", "usbw");
        mysqli_select_db($conexion, "lalos_buger");
        
        if ($conexion -> connect_errno) {
            echo "Fallo la conexion ".$conexion -> connect_errno;
        }else{
            $conexion -> set_charset("utf8");
            $consulta = "SELECT * FROM cliente WHERE cliente_correo = '$usuario' AND cliente_contrasenia = '$password'";
            $resultado = mysqli_query($conexion, $consulta);
            $registros = $conexion -> affected_rows;
            //echo $conexion -> fied_count;
            if ($registros > 0) {
                echo "Es valido";
                $fila = mysqli_fetch_array($resultado); 
                echo "<br>- Nombre: ". $fila['cliente_nombre']. "<br>";
                echo "- Correo: ". $fila['cliente_correo']. "<br>";
            }else{
                echo "<h3>Error de autentifiacion</h3>";
                echo "<a href='/Proyecto/login.html'>Volver </a>"; //Posiblemente agrege una loginErro.html con el mensaje de error
            }
            mysqli_free_result($resultado);
            $conexion -> close();
        }            
    
    ?>
</body>
</html>
