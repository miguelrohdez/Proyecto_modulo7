<?php
    
    function listarMenu($resultados){
		if ($resultados != NULL){
			echo "<br/>***********************************************<br/><br/>";
			echo "- Numero Menu (Codigo): ". $resultados['codigo']."<br/> ";
			echo "- Nombre Pedido: ". $resultados['menu_nombre']."<br/> ";
			echo "- Precio Pedido: ". $resultados['menu_precio']."<br/> ";
            echo "- Tipo de pedido: ". $resultados['menu_tipo']."<br/> ";
			echo "- Descripcion del pedido: ". $resultados['menu_descripcion']."<br/> ";
            echo "- Img: ". $resultados['menu_imagen']."<br/> ";
			echo "<br/>***********************************************<br/><br/>";
		}
		else {echo "<br/> No hay mas datos: <br/>".$resultados; }
	}


?>