<header>
	<div class="content" id="menuPrincipal">
		<h1><a href="<?php echo PATH_HOME?>index.php"><img src="<?php echo PATH_IMAGES ?>nekon.png" alt="Nekon"><span>nekon</span></a></h1>
		<h2>Muebles de jardín construídos en madera de robinia (teca europea) de alta resistencia a la intemperie y herrajes de acero inoxidable con diseños ergonómicos.<br><span>Venta online directo de fábrica. Envíos a todo el país.</span></h2>
		<div class="clear"></div>
		<!-- abre  menu sección -->
		<nav>
		<ul class="menuFotos">
			<li><a href="<?php if($localhost){ ?><?php echo PATH_PHP ?>catalogo.php?id=mesas<?php }else{ ?><?php echo PATH_HOME?>mesas-de-jardin<?php } ?>" ><span>Mesas</span><img src="<?php echo PATH_IMAGES_MENU ?>mesas.jpg" alt="Mesas"></a></li>
			<li><a href="<?php if($localhost){ ?><?php echo PATH_PHP ?>catalogo.php?id=sillas<?php }else{ ?><?php echo PATH_HOME?>sillas-de-jardin<?php } ?>"><span>Sillas</span><img src="<?php echo PATH_IMAGES_MENU ?>sillas.jpg" alt="Sillas"></a></li>
			<li><a href="<?php if($localhost){ ?><?php echo PATH_PHP ?>catalogo.php?id=sillones<?php }else{ ?><?php echo PATH_HOME?>sillones-de-jardin<?php } ?>"><span>Sillones</span><img src="<?php echo PATH_IMAGES_MENU ?>sillones.jpg" alt="Sillones"></a></li>
			<li><a href="<?php if($localhost){ ?><?php echo PATH_PHP ?>catalogo.php?id=bancos<?php }else{ ?><?php echo PATH_HOME?>bancos-de-jardin<?php } ?>"><span>Bancos</span><img src="<?php echo PATH_IMAGES_MENU ?>bancos.jpg" alt="Bancos"></a></li>
			<li><a href="<?php if($localhost){ ?><?php echo PATH_PHP ?>catalogo.php?id=reposeras<?php }else{ ?><?php echo PATH_HOME?>reposeras-de-jardin<?php } ?>"><span>Reposeras</span><img src="<?php echo PATH_IMAGES_MENU ?>reposeras.jpg" alt="Reposeras"></a></li>
			<li><a href="<?php if($localhost){ ?><?php echo PATH_PHP ?>catalogo.php?id=muebles<?php }else{ ?><?php echo PATH_HOME?>muebles-de-jardin<?php } ?>"><span>Varios</span><img src="<?php echo PATH_IMAGES_MENU ?>varios.jpg" alt="Varios"></a></li>
		</ul>
		</nav>
	</div>
</header>