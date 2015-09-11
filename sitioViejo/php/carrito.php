<?php
	require_once('config.php');
	require_once('../html/head.php');
	require_once('../html/header.php');
	require_once('../html/menu.php');
        
        require_once ('funciones.php');
        if($_SERVER['HTTP_REFERER'] != PATH_HOME."carrito"){
            $path_anterior = $_SERVER['HTTP_REFERER'];
        }
        else
        {
            $path_anterior = PATH_HOME."mesas-de-jardin";
        }
?>
<div id="loading" style="display:none"><img src="<?php echo PATH_IMAGES?>loading.gif" /> <br>Espere un momento por favor...</div>
<div id="container">
	<h2>Carrito de compras</h2>
	<div class="content">
			<table class="tablaCarrito">
				<tr>
					<th>Producto</th>
					<th></th>
					<th>Stock / Entrega</th>
					<th>Cantidad</th>
					<th>Importe</th>
					<th>Eliminar</th>
				</tr>
                                <?php
                                    if(isset($_SESSION['carro']))
                                    {
                                        if(sizeof($_SESSION['carro']) != 0)
                                        {
                                        foreach ($_SESSION['carro'] as $tablaCarrito => $cant)
                                        {
                                            $articuloCarrito = obtenerArticuloParaCarritoPorId($tablaCarrito);
                                            $imagenCarro = obtenerImagenCarritoParaArticulo($articuloCarrito['idMueble']);
                                            
                                            switch ($imagenCarro)
                                            {
                                                case -1:
                                                    $src = "";
                                                    break;
                                                case 0:
                                                    $src = "";
                                                    break;
                                                default :
                                                    $src = $imagenCarro['nombreImagen'];
                                                    break;
                                            }
                                            ?>
                                <tr>
                                    <td>
                                        <img class="imgCarrito" src="<?php echo PATH_IMAGES_CARRITO.$src ?>" alt="Nekon Muebles">
                                    </td>
                                    <td>
                                        <?php
                                            echo $articuloCarrito['nombreMueble'];
                                        ?><br>
                                            art: <?php echo $articuloCarrito['Codigo'] ?><br>
                                            medida: <?php echo $articuloCarrito['Medidas'] ?>
                                    </td>
                                    <?php
                                        switch ($articuloCarrito['Stock'])
                                        {
                                            case "S": $tilde = PATH_IMAGES."tildeVerde.png";
                                                      $tildeText = "1 semana";
                                                break;
                                            case "M": $tilde = PATH_IMAGES."tildeAmarillo.png";
                                                      $tildeText = "2 a 3 semanas";
                                                break;
											case "C": $tilde = PATH_IMAGES."tildeNaranja.png";
                                                      $tildeText = "1 mes";
                                                break;
                                            case "D": $tilde = PATH_IMAGES."consulte.png";
                                                      $tildeText = "Consulte";
                                                break;
                                        }
                                    ?>
                                    <td><img src="<?php echo $tilde ?>" alt="" class="imgStock"><?php echo $tildeText ?></td>
                                    <td><input type="text" name="cantidad" class="inputCantidad" maxlength="3" value="<?php echo $cant ?>" data="<?php echo $tablaCarrito ?>"></td>
                                    <td class="<?php echo $articuloCarrito['Precio'] ?>">$<span class="importe"><?php echo $articuloCarrito['Precio']*$cant ?></span></td>
                                    <td><img src="<?php echo PATH_IMAGES ?>eliminar.png" alt="Eliminar" class="eliminarCarrito" data="<?php echo $tablaCarrito ?>"></td>
				</tr>
                                            <?php
                                        }
                                        }
                                        else
                                        {
                                            ?>
                                <tr>
                                    <td colspan="5"><h1>El carrito está vacío. Lo invitamos a ver nuestros productos.</h1></td>
                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
			</table>
            		
		<form class="formFinalCarrito" method="post">
            <table class="tablaTotalCarrito">
				<tr>
					<td><strong>Total de Productos</strong></td>
					<td class="totalproductos">$10000</td>
				</tr>
			</table>
                        <input class="btnAgregarProd" style="float:right; margin-bottom:30px" type="button" value="Agregar Productos" data="<?php echo $path_anterior; ?>">
			
			<div class="clear"></div>
			<h2>Detalle de envío y pago</h2>
			<table class="tablaCuentaCarrito">
				<tr>
					<td colspan="2">
						<div class="colZonas">
						<p><strong class="total consigna">Seleccione una opción de envío</strong>
						<br>El costo de envío varía según el monto de su compra.</p>
							<div class="zonas">
								<p><strong>Envío a domicilio</strong><br>
								Si reside dentro de nuestras zonas de envío, elija una opción. Ver zonas en el mapa.</p>
								<?php
								$result = selectFromTable("zonas_envios"); //trae todo zonas_envios
								while( $row = mysql_fetch_assoc($result)){
									echo '<p><input class="select selectCarrito" type="radio" name="zonaEnvio2" id="'.$row['idZona'].'" value="'.$row['Costo'].'" data="'.$row['presupuestoTope'].'"><label for="'.$row['idZona'].'" >'.$row['nombreZona'].'</label></input>';
									if ($row['idZona'] == '2')
									{
										$costo2 = $row['Costo'];
										$presupuestoTope2 = $row['presupuestoTope'];
									}
									elseif ($row['idZona'] == '3')
									{
										echo '
											<p><strong>Envío con transporte</strong><br>
											Si reside fuera de nuestras zonas de envío, despachamos el pedido en el transporte que usted elija.</p>
															<p><input class="select selectCarrito" type="radio" name="zonaEnvio2" id="4" value="0" data="0"><label for="4">Transporte con salida desde La Plata</label></p>
															<p><input class="select selectCarrito" type="radio" name="zonaEnvio2" id="5" value="'.$costo2.'" data="'.$presupuestoTope2.'"><label for="5">Transporte con salida desde CABA</label></p>
										';
									}
								}	
								?>
								 <input id="zonaOculta" type="hidden" name="zonaEnvio" value=""/>                          
							</div>
						</div>
						<div class="mapaZonas"><img src="<?php echo PATH_IMAGES ?>zonas-de-envio.png" alt="Mapa zonas de envío"></div>
					</td>
				</tr>
				<tr>
					<td><strong class="total">Costo de envío</strong></td>
					<td><strong class="total envios">$10000</strong></td>
				</tr>
				<tr>
					<td><strong class="total">Total productos del Carrito</strong></td>
					<td><strong class="totalproductos">$10000</strong></td>
				</tr>
				<tr>
					<td><strong class="total">Total de esta compra</strong></td>
					<td><strong class="total pasta">$15000</strong></td>
				</tr>
				<tr>
					<td colspan="2">
						<p><strong class="total consigna">Ingrese sus datos</strong></p>
						<div class="datosComprador">
							<div class="colDatosComprador">
								<label for="nombreComprador">Nombre y Apellido</label>
								<input type="text" name="nombreApellido" id="nombreComprador" required>
								<label for="telefonoComprador">Teléfono</label>
								<input type="text" name="telefono" id="telefonoComprador" required>
							</div>
							<div class="colDatosComprador">
								<label for="mailComprador">Mail</label>
								<input type="text" name="email" id="mailComprador" required>
								<label for="direccionComprador">Dirección</label>
								<input type="text" name="direccion" id="direccionComprador" required>
							</div>
							<div class="colDatosComprador">
								<label for="comentario">Comentarios</label>
								<textarea id="comentariosComprador" name="comentario"></textarea>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<p><strong class="total consigna">Seleccione el monto que desea abonar por este medio.</strong></p>
						<p>Usted puede pagar una seña para confirmar el pedido y el saldo lo paga contraentrega de los productos.</p>
						<div class="zonas">
							<input type="radio" name="montoAPagar" class="tipoDePago" data="1" id="pagoTotal" value="total"><label for="pagoTotal">Pago total</label><br>
							<input type="radio" name="montoAPagar" class="tipoDePago" data="0.1" id="pagoSenia" value="senia"><label for="pagoSenia">Pago de seña (<?php echo PAGO_ADELANTADO ?>%)</label>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<table class="tiposPago">
							<tr>
								<td>
									<div class="formaPago">
										<h3>Pago con tarjetas de crédito<br>
										Pagofácil, Rapipago y Link</h3>
										<p class="aPagar total "></p>
										<input id="pagarBanco" class="btnVerdeCarrito" type="button" value="Confirmar y Pagar">
										<p class="aclaracion">Al confirmar recibirá un mail con el detalle de este pedido y se abrirá una ventana para transacciones seguras de MERCADOPAGO</p>
										<img src="<?php echo PATH_IMAGES_TARJETAS ?>todas_las_tarjetas.png" alt="Con todas las tarjetas de Crédito">
									</div>
								</td>
								<td>
								<div class="formaPago">
										<h3>Pago con transferencia<br>
										o depósito bancario</h3>
										<p class="aPagar total "></p>
										<input id="depositar" class="btnVerdeCarrito" type="button" value="Confirmar pedido">
										<p class="aclaracion">Al confirmar recibirá un mail con el detalle de este pedido y datos necesarios para realizar la transferencia o depósito a nuestra cuenta.</p>
									</div>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
                        
            </div>
		</form>
	</div>
        <div style="display:none" id="actualizarCarrito"></div>
        <div style="display:none" id="borrarSCarrito"></div>
        <iframe style="display:none" id="checkout"></iframe>

</div>

<?php
	require_once('../html/footer.php');
?>
