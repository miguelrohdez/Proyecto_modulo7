<?php
    /*session_start();    
    $varSesion = $_SESSION['usuario'];


    if($varSesion == null || $varSesion== ""){
        echo "No tiene acceso a esta pagina";
        die();
    }*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- mostrar direccion del cliente, pedido y costo
            btn finalizar( regresa al menu) -->
    <?php
            /****************************************************************** 
				Se intenta listar los datos del usuario para almacenarlo en tabla pedido.
			*/
            $cantidadProd = $_POST['cantidad'];
            $productoID = $_POST['numOrden'];
            $usuario = $_POST['correo'];
            require("datos_con.php");
            require("consultaFinal.php");

            /************Informacion del cliente  */
			$conexion2 = new mysqli($db_host, $db_admin,$db_pass,$db_data);

			if ($conexion2 -> connect_errno) {
				echo "Fallo la conexion ".$conexion2 -> connect_errno;
			}else{
                echo 'conectado';
				$consulta2 = "SELECT NoCliente FROM cliente WHERE cliente_correo = '$usuario' ";
				$aux = $conexion2 -> query($consulta2);
				$row = mysqli_fetch_assoc($aux);
                $idCliente = $row['NoCliente'];

				$conexion2 -> close();
			}
			////#################################################################################################////
			// Se lista el precio del producto seleccionado
			$conexion3 = new mysqli($db_host, $db_admin,$db_pass,$db_data);

			if ($conexion3 -> connect_errno) {
				echo "Fallo la conexion ".$conexion3 -> connect_errno;
			}else{
				$consulta3 = "SELECT menu_precio FROM menu WHERE codigo = '$productoID' ";
                $aux2 = $conexion3 -> query($consulta3);
                $row2 = mysqli_fetch_assoc($aux2);
				
                $precio = $row2['menu_precio'];
                $total = $precio * $cantidadProd;
				$conexion3 -> close();
			}
        	////#################################################################################################////
			// Se intenta insertar en tabla pedido detalle
			$conexion4 = new mysqli($db_host, $db_admin,$db_pass,$db_data);
            //$idCliente = 1;

			if ($conexion4 -> connect_errno) {
				echo "Fallo la conexion ".$conexion4 -> connect_errno;
			}else{
                $consulta4 = "CALL lb_addPedido('" . $idCliente . "',
												'" . $productoID . "',
												'" . $cantidadProd . "',
												'" . $total . "'
												)";

                
				$conexion4 -> query($consulta4);
				$conexion4 -> close();
			}

            /**************************SE LISTA EL PEDIDO********************* */
            $conexion5 = new mysqli($db_host, $db_admin,$db_pass,$db_data);

			if ($conexion5 -> connect_errno) {
				echo "Fallo la conexion ".$conexion5 -> connect_errno;
			}else{
				echo 'Conexion exitosa';
				$conexion5 -> set_charset("utf8");
				/*$consulta5 = " SELECT p.NoPedido, p.pedido_fecha, p.cantidad, p.precioTotal,
                                     c.cliente_nombre, c.cliente_paterno, c.cliente_direccion,
                                     m.menu_nombre, m.menu_precio, m.menu_tipo, m.menu_descripcion
                               FROM cliente c NATURAL JOIN menu m NATURAL JOIN pedidoDetalle p 
                               WHERE p.NoPedido = '$productoID' AND c.cliente_correo = '$usuario'";
                */
                $consultaPedido = " SELECT NoPedido, pedido_fecha, cantidad, precioTotal
                                    FROM pedidoDetalle WHERE cliente = '$idCliente' AND codigo = '$productoID'";
                $consultaCliente = " SELECT cliente_nombre, cliente_apaterno, cliente_direccion
                                     FROM cliente WHERE cliente_correo = '$usuario' ";
                $consultaMenu = " SELECT menu_nombre, menu_precio, menu_tipo, menu_descripcion
                                  FROM menu WHERE codigo = '$productoID'  ";

				$res1 = mysqli_query($conexion5, $consultaPedido);
                $res2 = mysqli_query($conexion5, $consultaCliente);
                $res3 = mysqli_query($conexion5, $consultaMenu);

                
                while($fila = mysqli_fetch_array($res3)){
					muestraMenu($fila);
				}

				while($fila = mysqli_fetch_array($res1)){
					muestraPedido($fila);
				}

                while($fila = mysqli_fetch_array($res2)){
					muestraCliente($fila);
				}
                

				mysqli_free_result($res1);
                mysqli_free_result($res2);
                mysqli_free_result($res3);
				$conexion5 -> close();
			}
			

    ?>

    <div class="caja principal">
					<!-- DESCRICOPN PRODUCTO COMPRADO
						BOTON FINALIZAR(PAGINA PEDIDOFINAL)  O REGRESAR(mENU O PROMOCIONES) 
					-->					
                <p>Su pedido se ha realizado con exito. Espere la llegada del repartidor</p>
				<a href="../index.html"><button>Finalizar</button></a>
				

		</div>


</body>
</html>
