<?php
	header('Content-Type: text/html; charset=utf-8');
	require_once ("../php/funciones.php");
	$res = selectFromTable("muebles", " idMueble, nombreMueble", "WHERE idSeccion = ".$_GET['id']);
	if (!$res)
	{
		die("error");
	}
	$count = mysql_num_rows($res);
	if ($count == 0)
	{
		echo '<option value="-" selected="selected">- No hay muebles en esta sección -</option>';
	}
	else
	{
		echo '<option value="-" selected="selected">- Elija un mueble de esta lista -</option>';
	}
	$conexion = conectar();
	while ($row = mysql_fetch_array($res)) {
		echo '<option value="'.$row['idMueble'].'">';
		echo $row['nombreMueble'].'</option>';
	}
	
	
?>
