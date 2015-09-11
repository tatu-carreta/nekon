<?php
	require_once('../php/config.php'); 
        //require_once ('seguridad.php'); //Controla que sea administrador..
	require_once('../php/funciones.php'); 
	require_once('../html/headAdmin.php'); 
	$currentPage = 1 //indica que esta en la pagina 1, listado de articulos
?>

<body>
<?php
	require_once('../html/headerAdmin.php'); 
?>
<div id="container">

<?php
	require_once('../html/menuAdmin.php'); 
	
	if( isset($_POST['stock'] ) and isset($_POST['precio']))
	{
		
	}
	else
	{
	?>

	
	<div class="formularios2">
		<h2>Lista de Artículos</h2>
		<form id="listaArticulos" style="display:block !important">
			<table class="listaProductos">
				<tr>
					<th class="alignLeft art">Art.</th>
					<th class="alignLeft artMedida">Nombre y Medida</th>
					<th class="alignRight artSeleccion">Selección <input type="checkbox" id="seleccionarTodos" name="seleccionarTodos"></th>
					<th class="alignRight artPrecio">Precio</th>
					<th>Stock</th>
				</tr>
		<?php
		
		$filter = " INNER JOIN muebles ON ( articulos.idMueble = muebles.idMueble) ORDER BY muebles.idSeccion, muebles.Orden, articulos.Codigo";
		$result = selectFromTable('articulos','',$filter);

		$i = 0;
		while ($row = mysql_fetch_assoc($result))
		{
                    if($row['Medidas'] == "ver detalle")
                    {
                        $medida = "";
                    }
                    else
                    {
                        $medida = $row['Medidas'];
                    }
			echo '
				<tr class="rowMueble">
					<td class="alignLeft">'.$row['Codigo'].'</td>
					<td class="alignLeft">'.$row['nombreMueble'].' '.$medida.'</td>
					<td class="alignRight"><input class="seleccion" name="seleccion[]" type="checkbox" id="'.$row['idArticulo'].'" value="'.$i."%".$row['idArticulo'].'"></td>
					<td class="alignRight"><input class="precio" name="precio[]" type="text" value="$'.$row['Precio'].'" id="$'.$row['Precio'].'" style="background : none;border:none; text-align:right; color:grey"></td>
					<td class="stock"><img ';
					switch ($row['Stock'])
                    {
                        case "S": $tilde = " src='".PATH_IMAGES."tildeVerde.png' alt='Entrega en 1 semana'";
                            break;
                        case "M": $tilde = " src='".PATH_IMAGES."tildeAmarillo.png' alt='Entrega de 2 a 3 semanas'";
                            break;
                        case "C": $tilde = " src='".PATH_IMAGES."tildeNaranja.png' alt='Entrega en un mes'";
                            break;
						case "D": $tilde = " src='".PATH_IMAGES."consulte.png' alt='Entrega Consulte'";
                            break;
                    }
			echo	$tilde.' /><input type="hidden" name="stock[]" value="'.$row['Stock'].'"/></td>
				</tr>'; 
			$i++;
				}
			?>
			<!----
			EJEMPLO HTML
				<tr>
					<td class="alignLeft">BRX01</td>
					<td class="alignLeft">Banco Romano 0,91 cm</td>
					<td class="alignRight"><input type="checkbox" name=""></td>
					<td class="alignRight">$898</td>
					<td><img src="../images/tildeVerde.png" alt="Stock"></td>
				</tr>
				<tr>
					<td class="alignLeft">BRX01</td>
					<td class="alignLeft">Banco Romano 0,91 cm</td>
					<td class="alignRight"><input type="checkbox" name=""></td>
					<td class="alignRight">$898</td>
					<td><img src="../images/tildeVerde.png" alt="Stock"></td>
				</tr>
				
			------>
				<tr>
					<td colspan="5" class="porcentajeProductos">
						<p>Modificar porcentajes a los productos seleccionados <input type="text" name="porcentaje" class="porcentaje" value="100"> %</p>
						<div class="btnPorcentajes">
							<input type="submit" name="calcular" value="Calcular" class="btnForm" id="calcular">
							<span style="font-size:13px;">*</span></br>
							<input type="submit" name="publicar" value="Publicar" class="btnForm">
						</div>
					</td>
				</tr>

						
					</table>
					<span class="observaciones">* Colocando el valor 100 restaura el precio original del artículo</span>
					<p class="tiempoEntrega">Tiempo de entrega: <span><img src="<?php echo PATH_IMAGES ?>tildeVerde.png" alt="Entrega 1 semana"></span> 1 semana<span><img src="<?php echo PATH_IMAGES ?>tildeAmarillo.png" alt="Entrega 2 semana"></span> 2 semana<span><img src="<?php echo PATH_IMAGES ?>consulte.png" alt="Entrega Consulte"></span> Consulte</p>
		</form>
			</div>

		</div>
		<div class="divOculta" style="display:none"></div>
		</body>
		</html>

	<?php
	}
	?>
