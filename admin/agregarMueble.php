<?php
	header('Content-Type: text/html; charset=utf-8');
	require_once ("../php/funciones.php");
	
        
	if ( isset ($_GET['seccion']) and isset($_GET['nuevoMueble']))
	{
                $orden = obtenerUltimoOrdenPorIdSeccion($_GET['seccion']);
                $orden = $orden['Orden']+1;
                $datos = array($_GET['nuevoMueble'], $_GET['seccion'], $orden);
		$atributos = array ('nombreMueble', 'idSeccion','Orden');
		$result = alta($datos, 'muebles', $atributos);
		if (!$result)
		{
			echo '<span class="error">Hubo un error en la base de datos</span>';
		}
		else
		{
			echo '<span class="exito">El mueble ha sido agregado</span>';
		}
	}

?>
