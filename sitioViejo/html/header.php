<body><!-- el body de la pagina -->
    <?php require_once("analyticstracking.php"); ?>
<div class="menuSup">
	<div id="nav-outer">
		<div id="navigation">
			<div id="menu">
				<ul>
					<li><a href="<?php echo PATH_HOME?>">Inicio</a></li>
					<li><a href="<?php echo PATH_HOME?>la-fabrica">Fotos de la fábrica</a></li>
					<li><a href="<?php echo PATH_HOME?>acerca-calidad">Acerca de la calidad</a></li>
					<li><a href="<?php echo PATH_HOME?>formas-de-pago-y-envio">Formas de pago y envío</a></li>
					<li><a href="<?php echo PATH_HOME?>consultas">Consultas</a></li>
                                        <li><a href="<?php echo PATH_HOME?>carrito" class="btnMenuCarrito">Carrito (<?php if(isset($_SESSION['carro'])&&(sizeof($_SESSION['carro'])>0)){echo sizeof($_SESSION['carro']);}else{echo 0;} ?>)</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>