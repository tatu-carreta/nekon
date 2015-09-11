<?php
	require_once("../php/funciones.php");

	if ( isset($_GET['seleccion'])  )
	{
		foreach($_GET['seleccion'] as $key => $value)
		{
			$arrayRow = explode("%",$value); //obtiene el numero de row de el articulo a modificar
			$realId = $arrayRow[1];// corta el % y se queda con el id del articulo.
			if(isset($_GET['stock']))
			{
				$stock = $_GET['stock'][$arrayRow[0]];
			}
			if(isset($_GET['precio']))
			{
				$precioConSigno = $_GET['precio'][$arrayRow[0]];
				$precio = ltrim($precioConSigno, '$');
			}
			
			$query = "UPDATE articulos SET Precio = ".$precio.", Stock = '".$stock."' WHERE idArticulo = ".$realId;
			$conexion= conectar();
			$result = mysql_query($query, $conexion);
			if (!$result)
			{
				$success = false;
				break;
			}
			else
			{
				$success = true;
			}
			
		}
		if (!$success)
		{
			echo '<span>No se realizo la consulta</span>';
		}
		else
		{
		?>
		<script type="text/javascript">
			alert ('Los articulos se modificaron correctamente');
			location.reload();
		</script>
		<?php
		}
	}
	
	?>