<?php
	if ( !isset($currentPage))
	{
		$currentPage = 0;
	}

?>
<ul class="menuAdmin">
	<li <?php if ($currentPage == 1) echo 'id="current"'; ?>><a href="<?php echo PATH_ADMIN ?>listaArticulos.php">Lista de artículos</a></li>
	<li <?php if ($currentPage == 2) echo 'id="current"'; ?>><a href="<?php echo PATH_ADMIN ?>alta.php">Agregar muebles</a></li>
	<li <?php if ($currentPage == 3) echo 'id="current"'; ?>><a href="<?php echo PATH_ADMIN ?>modificacion.php">Editar muebles</a></li>
        <li <?php if ($currentPage == 6) echo 'id="current"'; ?>><a href="<?php echo PATH_ADMIN ?>ordenarMuebles.php">Ordenar muebles</a></li>
	<li <?php if ($currentPage == 4) echo 'id="current"'; ?>><a href="<?php echo PATH_ADMIN ?>modificarEnvios.php">Modificar envíos</a></li>
        <li <?php if ($currentPage == 5) echo 'id="current"'; ?>><a href="<?php echo PATH_ADMIN ?>cerrarSesion.php" onclick="return confirm('¿Está seguro que desear salir? ');">Salir</a></li>
</ul>
