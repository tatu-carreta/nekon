<?php
	require_once('../php/config.php');
	require_once('head.php');
	require_once('header.php');
	require_once('menu.php');
?>

<div id="container" class="txt-int">
    <h2>Formas de pago y envío</h2>
	<p>Usted puede realizar el pago con tarjetas de crédito y otros medio de pago a través del sistema de pago seguro de Mercadopago, o realizando una transferencia o depósito bancario.</p>
	<p>Si elige pago con tarjetas, el sistema le enviará un mail con el detalle de su pedido y abrirá una ventana segura para que ingrese los datos de su tarjeta. Si elige pago por banco, el sistema le enviará un mail con el detalle de su pedido y los datos de la cuenta donde deberá realizar el dopósito.</p>
	<div class="tarjetas-int">
					<img src="<?php echo PATH_IMAGES_TARJETAS ?>visa.jpg" alt="Tarjeta Visa">
					<img src="<?php echo PATH_IMAGES_TARJETAS ?>mastercard.jpg" alt="Tarjeta Mastercard">
					<img src="<?php echo PATH_IMAGES_TARJETAS ?>american.jpg" alt="Tarjeta American Sxpress">
					<img src="<?php echo PATH_IMAGES_TARJETAS ?>naranja.jpg" alt="Tarjeta Naranja">
					<img src="<?php echo PATH_IMAGES_TARJETAS ?>nativa.jpg" alt="Tarjeta Nativa">
					<img src="<?php echo PATH_IMAGES_TARJETAS ?>shopping.jpg" alt="Tarjeta Shopping">
					<img src="<?php echo PATH_IMAGES_TARJETAS ?>cencosud.jpg" alt="Tarjeta Cencosud">
					<img src="<?php echo PATH_IMAGES_TARJETAS ?>argencard.jpg" alt="Tarjeta Argencard">
					<img src="<?php echo PATH_IMAGES_TARJETAS ?>cabal.jpg" alt="Tarjeta Cabal">
					<img src="<?php echo PATH_IMAGES_TARJETAS ?>mercado_pago.jpg" alt="Mercado Pago">
				</div>
				
	<h3>Pago total o parcial</h3>
	<p>Si usted se encuentra en la Provincia de Buenos Aires dentro de nuestras zonas de envío puede optar por el pago de una seña por este medio, y el saldo contraentrega de los productos.</p>
	<img class="mapa-zonas" src="<?php echo PATH_IMAGES ?>zonas-de-envio.png" alt="Mapa con zonas de envío dentro de la Provincia de Buenos Aires">
	
	<h3>Formas de envío</h3>
	<p>Si se encuentra en nuestras zonas de envío dentro de la Provincia de Buenos Aires le enviaremos los productos a su domicilio, si se encuentra en el resto del país nos encargaremos de despacharlos en el transporte que usted nos indique (con salida de La Plata o de Buenos Aires)</p>
	
	
</div>

<?php
	require_once('footer.php');
?>