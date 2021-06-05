<?php
            function muestraPedido($resultados){
                if ($resultados != NULL){
                    echo "<br/>******** Datos del pedido ********<br/><br/>";
                    echo "- Numero de Pedido : ". $resultados['NoPedido']."<br/> ";
                    echo "- fecha del pedido : ". $resultados['pedido_fecha']."<br/> ";
                    echo "- Cantidad por pedido : ". $resultados['cantidad']."<br/> ";
                    echo "- Precio Total: ". $resultados['precioTotal']."<br/> ";
                    echo "<br/>**********************************<br/><br/>";
                }
                else {echo "<br/> No hay mas datos: <br/>".$resultados; }
            }

            function muestraCliente($resultados){
                if ($resultados != NULL){
                  
                    echo "<br/>******** Datos del cliente *********<br/><br/>";
                    echo "- Nombre : ". $resultados['cliente_nombre']."<br/> ";
                    echo "- Apellido : ". $resultados['cliente_apaterno']."<br/> ";
                    echo "- Direccion : ". $resultados['cliente_direccion']."<br/> ";
                    echo "<br/>************************************<br/><br/>";                
                }
                else {echo "<br/> No hay mas datos: <br/>".$resultados; }
            }

            function muestraMenu($resultados){
                if ($resultados != NULL){
                    echo "<br/>******** Datos del producto *********<br/><br/>";
                    echo "- Nombre del pedido : ". $resultados['menu_nombre']."<br/> ";
                    echo "- precio (por unidad) : ". $resultados['menu_precio']."<br/> ";
                    echo "- Tipo: ". $resultados['menu_tipo']."<br/> ";
                    echo "- Descripcion: ". $resultados['menu_descripcion']."<br/> ";
                    echo "<br/>*************************************<br/><br/>";
                }
                else {echo "<br/> No hay mas datos: <br/>".$resultados; }
            }		
?>