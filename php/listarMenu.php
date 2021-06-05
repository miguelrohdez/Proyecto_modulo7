<?php
    
    function listarMenu($resultados){
		if ($resultados != NULL){
			echo "<br/>****************************<br/><br/>";
			echo "- Codigo: ". $resultados['codigo']."<br/> ";
			echo "- Nombre: ". $resultados['menu_nombre']."<br/> ";
			echo "- Precio: ". $resultados['menu_precio']."<br/> ";
            echo "- Tipo: ". $resultados['menu_tipo']."<br/> ";
			echo "- Descripcion: ". $resultados['menu_descripcion']."<br/> ";
            echo "- Imagen: ". $resultados['menu_imagen']."<br/> ";
			echo "<br/>****************************<br/><br/>";
		}
		else {echo "<br/> No hay mas datos: <br/>".$resultados; }
	}


?>