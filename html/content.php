<script type="text/javascript" src="<?php echo PATH_JS ?>supersized.3.2.7.min.js"></script>
<script type="text/javascript" src="<?php echo PATH_HOME ?>theme/supersized.shutter.min.js"></script>
<link rel="stylesheet" href="<?php echo PATH_CSS ?>supersized.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo PATH_HOME ?>theme/supersized.shutter.css" type="text/css" media="screen" />

<script type="text/javascript">	
	jQuery(function($){	
		$.supersized({
			// Functionality
			slide_interval		:   4000,		// Length between transitions
			transitions         :   1, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
			transition_speed	:	700,		// Speed of transition
													   
			// Components							
			slide_links			:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
			slides 				:  	[			// Slideshow Images
										{image : '<?php echo PATH_IMAGES ?>slideHome/home1.jpg', title : 'Nekon Muebles de Jardín'},
										{image : '<?php echo PATH_IMAGES ?>slideHome/home2.jpg', title : 'Nekon Muebles de Jardín'},
										{image : '<?php echo PATH_IMAGES ?>slideHome/home3.jpg', title : 'Nekon Muebles de Jardín'},
										{image : '<?php echo PATH_IMAGES ?>slideHome/home4.jpg', title : 'Nekon Muebles de Jardín'}	
									]
		});
    });  
</script>
<?php
/*
<div id="header">
	<!-- jQuery handles to place the header background images -->
	<div id="headerimgs">
		<div id="headerimg1" class="headerimg"></div>
		<div id="headerimg2" class="headerimg"></div>
	</div>
	<!-- Slideshow controls -->
	<div id="headernav-outer">
		<div id="headernav">
			<div id="back" class="btn"></div>
			<div id="control" class="btn"></div>
			<div id="next" class="btn"></div>
		</div>
	</div>
</div>

<?php
	require_once('menu.php');
?>

<div id="container">
	<div class="videoYoutube">
		<h2>Video de la fábrica</h2>
		<iframe width="478" height="359" src="//www.youtube.com/embed/Snfsg1P66Bk" frameborder="0" allowfullscreen></iframe>
                <a href="<?php if($localhost){ ?><?php echo PATH_HTML ?>la-fabrica.php<?php }else{ ?><?php echo PATH_HOME?>la-fabrica<?php } ?>" class="flecha">Fotos de la fábrica</a>
	</div>
	<div class="dos">
		<h2>Detalles de calidad y terminación</h2>
		<ul class="sliderHome">
			<li><img src="<?php echo PATH_IMAGES ?>slide_chico.jpg" alt="Detalle mesa extensible" /></li>
			<li><img src="<?php echo PATH_IMAGES ?>slide_chico2.jpg" alt="Detalle mesa redonda" /></li>
			<li><img src="<?php echo PATH_IMAGES ?>slide_chico3.jpg" alt="Detalle mesa plegable" /></li>
			<li><img src="<?php echo PATH_IMAGES ?>slide_chico4.jpg" alt="Detalle silla plegable" /></li>
			<li><img src="<?php echo PATH_IMAGES ?>slide_chico5.jpg" alt="Detalle sillón de un cuerpo" /></li>
			<li><img src="<?php echo PATH_IMAGES ?>slide_chico6.jpg" alt="Detalle mesita baja" /></li>
			<li><img src="<?php echo PATH_IMAGES ?>slide_chico7.jpg" alt="Detalle reposera con apoyabrazos" /></li>
			<li><img src="<?php echo PATH_IMAGES ?>slide_chico8.jpg" alt="Detalle colchoneta en reposera camastro" /></li>
		</ul>
		<a href="<?php echo PATH_HOME?>acerca-calidad" class="flecha">Acerca de la calidad</a>
	</div>

	<div class="clear"></div>
	<div class="mapaHome">
		<h2>Estamos en Berisso, Buenos Aires, Argentina</h2>
		<iframe width="954" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.ar/maps?f=d&amp;source=embed&amp;saddr=Au.+Buenos+Aires+-+la+Plata&amp;daddr=N%C2%B04436+16,+Berisso,+Buenos+Aires+(Nekon+Muebles+de+jard%C3%ADn)&amp;hl=es&amp;geocode=FT7K6_0dxYOL_A%3BFdTi6_0dudqM_CEgDGiLBKy9tSmHbLkYrOWilTEgDGiLBKy9tQ&amp;mra=dme&amp;mrsp=0&amp;sz=13&amp;sll=-34.882833,-57.91975&amp;sspn=0.058439,0.109692&amp;ie=UTF8&amp;t=m&amp;ll=-34.882833,-57.919579&amp;spn=0.070409,0.32959&amp;z=12&amp;output=embed"></iframe><a href="https://maps.google.com.ar/maps?f=d&amp;source=embed&amp;saddr=Au.+Buenos+Aires+-+la+Plata&amp;daddr=N%C2%B04436+16,+Berisso,+Buenos+Aires+(Nekon+Muebles+de+jard%C3%ADn)&amp;hl=es&amp;geocode=FT7K6_0dxYOL_A%3BFdTi6_0dudqM_CEgDGiLBKy9tSmHbLkYrOWilTEgDGiLBKy9tQ&amp;mra=dme&amp;mrsp=0&amp;sz=13&amp;sll=-34.882833,-57.91975&amp;sspn=0.058439,0.109692&amp;ie=UTF8&amp;t=m&amp;ll=-34.882833,-57.919579&amp;spn=0.070409,0.32959&amp;z=12" class="flecha">Ver mapa más grande</a>
		<div class="clear"></div>
	</div>
</div>
 * 
 */
?>
<section>
	<h1><div><span>Muebles de jardín</span></div>
		<div><span>con madera de alta resistencia</span></div>
		<div><span>y diseños ergonómicos</span></div></h1>
	
	<!--Arrow Navigation-->
	<a id="prevslide" class="load-item"></a>
	<a id="nextslide" class="load-item"></a>
	
	<!--Control Bar
	<div id="controls-wrapper" class="load-item">
		<div id="controls">
			<ul id="slide-list"></ul>
		</div>
	</div>-->
</section>
