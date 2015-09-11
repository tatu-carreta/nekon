<?php
	/*
	@Ian
	ian.neiman@gmail.com
	*/

	require_once('../php/config.php'); 
        require_once ('seguridad.php'); //Controla que sea administrador..
	require_once('../html/headAdmin.php'); 
	$currentPage = 2 //indica que esta en la pagina 2, agregar muebles
?>

<body>

<?php
	require_once('../html/headerAdmin.php'); 
?>

<div id="container">

<?php
	require_once ('../html/menuAdmin.php');
?>


	<div class="formularios">

	<h2>Agregar nuevo mueble</h2>
        <div class="recuadroForm">
		<form id="formAlta">
		<table>
			<tr>
				<td>Sección </td>
				<td class="radios">
				<?php
					foreach ( $aConfig['secciones'] as $key =>$value)
					{
						echo '
							<input class="botonRadio" required type="radio" name="seccion" value="'.$value.'" id="'.$value.'"><label for="'.$value.'" class="labelRadio">'.$key.'</label>
						';
					}
				?>
				</td>
			</tr>
			<tr>
				<td>Nuevo mueble:</td>
				<td><input type="text" required name="nuevoMueble" class="nuevoMueble"><input type="submit" id="agregarMueble" name="" value="Agregar" class="btnForm"></td>
			</tr>
		</table>
		</form>
        </div>

	</div>
	
	<div class="divOculta" style="display:none"></div>
</div>
</div>
</div>
</body>
</html>
