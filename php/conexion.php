<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <title>Conexion</title>
</head>
<body>
    <?php 
        require("datos_con.php");
        $conexion = new mysqli($db_host, $db_admin, $db_pass, $db_data);
        $conexion -> set_charset("utf8");
        if ($conexion -> connect_errno) {
            echo "Fallo al conectar con la base de datos".
            $conexion -> connect_errno;
        }

        
    
    
    ?>
    
</body>
</html>