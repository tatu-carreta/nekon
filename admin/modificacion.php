<?php
	/*
	@Ian
	ian.neiman@gmail.com
	*/

	require_once('../php/config.php'); 
        require_once ('seguridad.php'); //Controla que sea administrador..
	require_once('../html/headAdmin.php');
	$currentPage = 3 //indica que esta en la pagina 3, editar mueble

 ?>
<?php
	require_once('../html/headerAdmin.php'); 
?>
<div id="container">

<?php
	require_once ('../html/menuAdmin.php');
?>

<div class="formularios">
<h2>Editar mueble</h2>
	<div class="formOculto">
		<div class="recuadroForm">
		<form action="editarProducto()" method="get" style="margin-bottom:0 !important">
		<table>
			<tr>
				<td>Sección </td>
				<td class="radios">
				<?php
					foreach ( $aConfig['secciones'] as $key =>$value)
					{
						echo '
							<input class="botonRadio" type="radio" name="seccion" value="'.$value.'" id="'.$value.'"><label for="'.$value.'" class="labelRadio">'.$key.'</label>
						';
					}
				?>
				</td>
			</tr>
			<tr>
				<td>Mueble:</td>
				<td>
					<select class="seleccionaMueble" id="" name="seleccionaMueble">
						<option value="-" selected="selected">- Elija una sección arriba -</option>
					</select>
				</td>
                        </tr>
		</table>
		</form>
		</div>
		<div id="formularioFotos">
			<!-- aca carga el formulario para editar fotos -->
		</div>
	</div>
	</div>
	
	<div id="divOculta" style="display:none"></div>
</div>

<div id="results"></div>
</body>
</html>
