<?php
require_once('config.php');
require_once('../html/head.php');
require_once('../html/header.php');

require_once ('funciones.php');
if ($_SERVER['HTTP_REFERER'] != PATH_HOME . "carrito") {
    $path_anterior = $_SERVER['HTTP_REFERER'];
} else {
    $path_anterior = PATH_HOME . "mesas-de-jardin";
}
?>
<!-- FancyBox -->

<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="<?php echo PATH_JS ?>fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- Add fancyBox -->
<link rel="stylesheet" href="<?php echo PATH_JS ?>fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo PATH_JS ?>fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="<?php echo PATH_JS ?>fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo PATH_JS ?>fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo PATH_JS ?>fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<link rel="stylesheet" href="<?php echo PATH_JS ?>fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo PATH_JS ?>fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<!-- funcion -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox();
    });
</script>
<!-- / FancyBox -->

<!-- abre section -->
<section>
    <div id="loading" style="display:none"><img src="<?php echo PATH_IMAGES?>loading.gif" /> <br>Espere un momento por favor...</div>
    <div class="container contentCarrito">
        <h2>Carrito de compras</h2>

        <h3 class="h3Plus">Productos seleccionados</h3>
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
            if (isset($_SESSION['carro'])) {
                if (sizeof($_SESSION['carro']) != 0) {
                    foreach ($_SESSION['carro'] as $tablaCarrito => $cant) {
                        $articuloCarrito = obtenerArticuloParaCarritoPorId($tablaCarrito);
                        $imagenCarro = obtenerImagenCarritoParaArticulo($articuloCarrito['idMueble']);

                        switch ($imagenCarro) {
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
                                <img class="imgCarrito" src="<?php echo PATH_IMAGES_CARRITO . $src ?>" alt="Nekon Muebles">
                            </td>
                            <td>
                                <?php
                                echo $articuloCarrito['nombreMueble'];
                                ?><br>
                                art: <?php echo $articuloCarrito['Codigo'] ?><br>
                                medida: <?php echo $articuloCarrito['Medidas'] ?>
                            </td>
                            <?php
                            switch ($articuloCarrito['Stock']) {
                                case "S": $tilde = PATH_IMAGES . "tildeVerde.png";
                                    $tildeText = "1 semana";
                                    break;
                                case "M": $tilde = PATH_IMAGES . "tildeAmarillo.png";
                                    $tildeText = "2 a 3 semanas";
                                    break;
                                case "C": $tilde = PATH_IMAGES . "tildeNaranja.png";
                                    $tildeText = "1 mes";
                                    break;
                                case "D": $tilde = PATH_IMAGES . "consulte.png";
                                    $tildeText = "Consulte";
                                    break;
                            }
                            ?>
                            <td><img src="<?php echo $tilde ?>" alt="" class="imgStock"><?php echo $tildeText ?></td>
                            <td><input type="text" name="cantidad" class="inputCantidad" maxlength="3" value="<?php echo $cant ?>" data="<?php echo $tablaCarrito ?>"></td>
                            <td class="<?php echo $articuloCarrito['Precio'] ?>">$<span class="importe"><?php echo $articuloCarrito['Precio'] * $cant ?></span></td>
                            <td><img src="<?php echo PATH_IMAGES ?>eliminar.png" alt="Eliminar" class="eliminarCarrito" data="<?php echo $tablaCarrito ?>"></td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="5"><p>El carrito está vacío. Lo invitamos a ver nuestros productos.</p></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>

        <!-- Form-->
        <form class="formFinalCarrito" method="post">
            <table class="tablaTotalCarrito">
                <tr>
                    <td><span class="total">Total de Productos</span></td>
                    <td class="totalproductos">$10000</td>
                </tr>
            </table>
            <input class="btnAgregarProd btn agregar" style="float:right;" type="button" value="agregar productos" data="<?php echo $path_anterior; ?>">
            <div class="clear"></div>

            <h3 class="h3Plus">Detalle de envío y total de compra</h3>
            <table class="tablaCuentaCarrito">
                <tr>
                    <td colspan="2">
                        <div class="colZonas">
                            <h3>Seleccione una opción de envío</h3>
                            <p>El costo de envío varía según el monto de su compra.</p>
                            <div class="zonas">

                                <p><strong>Envío a domicilio</strong><br>
                                    Si reside dentro de nuestras zonas de envío, elija una opción. Ver zonas en el mapa.</p>
                                <?php
                                $result = selectFromTable("zonas_envios"); //trae todo zonas_envios
                                while ($row = mysql_fetch_assoc($result)) {
                                    ?>
                                    <p><input class="select selectCarrito" type="radio" name="zonaEnvio2" id="<?php echo $row['idZona']; ?>" value="<?php echo $row['Costo']; ?>" data="<?php echo $row['presupuestoTope']; ?>"><label for="<?php echo $row['idZona']; ?>" ><?php echo $row['nombreZona']; ?></label></input></p>
                                    <?php
                                    if ($row['idZona'] == '2') {
                                        $costo2 = $row['Costo'];
                                        $presupuestoTope2 = $row['presupuestoTope'];
                                    } elseif ($row['idZona'] == '3') {
                                        ?>
                                        <p><strong>Envío con transporte</strong><br>
                                            Si reside fuera de nuestras zonas de envío, despachamos el pedido en el transporte que usted elija.</p>
                                        <p><input class="select selectCarrito" type="radio" name="zonaEnvio2" id="4" value="0" data="0"><label for="4">Transporte con salida desde La Plata</label></p>
                                        <p><input class="select selectCarrito" type="radio" name="zonaEnvio2" id="5" value="<?php echo $costo2; ?>" data="<?php echo $presupuestoTope2; ?>"><label for="5">Transporte con salida desde CABA</label></p>
                                        <?php
                                    }
                                }
                                ?>
                                <input id="zonaOculta" type="hidden" name="zonaEnvio" value=""/>
                            </div>
                        </div>
                        <div class="mapaZonas"><a class="fancybox" href="<?php echo PATH_IMAGES ?>mapa-nuevo.png"><img src="<?php echo PATH_IMAGES ?>mapa-nuevo-chico.png" alt="Mapa zonas de envío"></a></div>
                    </td>
                </tr>
                <tr>
                    <td><span class="total">Costo de envío</span></td>
                    <td><span class="total envios">$10000</span></td>
                </tr>
                <tr>
                    <td><span class="total">Total productos del Carrito</span></td>
                    <td><span class="totalproductos">$10000</span></td>
                </tr>
                <tr>
                    <td><span class="total">Total de esta compra</span></td>
                    <td><span class="total pasta">$15000</span></td>
                </tr>
            </table>

            <h3 class="h3Plus">Datos del comprador</h3>
            <table  class="tablaCuentaCarrito">
                <tr>
                    <td colspan="2">
                        <h3>Ingrese sus datos</h3>
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
            </table>

            <h3 class="h3Plus">Finalizar la compra</h3>
            <table  class="tablaCuentaCarrito">
                <tr>
                    <td colspan="2">
                        <h3>Seleccione el monto que desea abonar por este medio.</h3>
                        <p>Usted puede pagar una seña para confirmar el pedido y el saldo lo paga contraentrega de los productos.</p>
                        <div class="zonas">
                            <input type="radio" name="montoAPagar" class="tipoDePago" data="1" id="pagoTotal" value="total"><label for="pagoTotal">Pago total</label><br>
                            <input type="radio" name="montoAPagar" class="tipoDePago" data="0.1" id="pagoSenia" value="senia"><label for="pagoSenia">Pago de seña (10%)</label>
                        </div>
                    </td>
                </tr>
            </table>


            <table class="tiposPago">
                <tr>
                    <td>
                        <div class="formaPago pagoTarjetas">

                            <h3>Pago con tarjetas de crédito<br>
                                Pagofácil, Rapipago y Link</h3>
                            <p class="aPagar">Usted deberá pagar ...</p>
                            <input id="pagarBanco" class="btn" type="button" value="Confirmar y Pagar">
                            <p>Al confirmar recibirá un mail con el detalle de este pedido y se abrirá una ventana para transacciones seguras de MERCADOPAGO</p>
                            <img src="http://www.nekonmuebles.com.ar/images/tarjetas/todas_las_tarjetas.png" alt="Con todas las tarjetas de CrÃ©dito">

                        </div>
                        <div class="formaPago pagoBanco">

                            <h3>Pago con transferencia<br>
                                o depósito bancario</h3>
                            <p class="aPagar">Usted deberá pagar ...</p>
                            <input id="depositar" class="btn" type="button" value="Confirmar pedido">
                            <p>Al confirmar recibirá un mail con el detalle de este pedido y datos necesarios para realizar la transferencia o depósito a nuestra cuenta.</p>

                        </div>
                    </td>	
                </tr>
            </table>

    </div>
</form>

</div>
</section>

<div style="display:none" id="actualizarCarrito"></div>
<div style="display:none" id="borrarSCarrito"></div>
<iframe style="display:none" id="checkout"></iframe>

<?php
require_once('../html/footer.php');
?>