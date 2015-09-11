<!DOCTYPE html>
<html lang="ES">
<head>
<meta charset="UTF-8">
<?php
	$uri = $_SERVER['REQUEST_URI'];
	switch ($uri)
	{
		case "/index.php":
			$title = "Muebles de jardín en madera | Venta online directo de fábrica";
		break;
		
		case "/mesas-de-jardin":
			$title = "Mesas de jardín en madera | Nekon Muebles";
		break;
		
		case "/sillas-de-jardin":
			$title = "Sillas de jardín en madera | Nekon Muebles";
		break;
		
		case "/sillones-de-jardin":
			$title = "Sillones de jardín en madera | Nekon Muebles";
		break;
		
		case "/bancos-de-jardin":
			$title = "Bancos de jardín en madera | Nekon Muebles";
		break;
		
		case "/reposeras-de-jardin":
			$title = "Reposeras de jardín en madera | Nekon Muebles";
		break;
		
		case "/muebles-de-jardin":
			$title = "Muebles de jardín en madera | Nekon Muebles";
		break;
		
		case "/lafabrica":
			$title = "Fotos de la fábrica | Nekon Muebles";
		break;
		
		case "/acerca-calidad":
			$title = "Acerca de la calidad | Nekon Muebles";
		break;
		
		case "/detallesdecalidad":
			$title = "Muebles de jardín | Nekon Muebles | Detalles de fabricación";
		break;
		
		case "/formas-de-pago-y-envio":
			$title = "Formas de pago y envío| Nekon Muebles";
		break;
		
		case "/consultas":
			$title = "Consultas | Nekon Muebles";
		break;
		
		case "/carrito":
			$title = "Carrito de compras| Nekon Muebles";
		break;
		
		default:
			$title = "Muebles de jardín en madera | Venta online directo de fábrica";
		break;
	}	
	
?>
<title><?php echo $title ?></title>
<meta name="description" content="Muebles de jardín fabricados en madera de robinia (teca europea) y herrajes de acero inoxidable con diseños ergonómicos." >
<meta name="keywords" content="muebles, muebles de jardin, muebles de madera">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="shortcut icon" href="<?php echo PATH_IMAGES ?>nekon.ico" type="image/x-icon">
<!--<link href="<?php echo PATH_CSS ?>estilos.css" rel="stylesheet">-->
<link rel="stylesheet" type="text/css" href="<?php echo PATH_CSS ?>styles.css">	
<link rel="stylesheet" type="text/css" href="<?php echo PATH_CSS ?>stylesMenu.css">
<!--<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700|Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>-->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>

<!--
<link href="<?php echo PATH_CSS ?>bg_slide.css" rel="stylesheet">
<link href="<?php echo PATH_CSS ?>jquery.fancybox.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Ruda:400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
<script type="text/javascript" src="<?php echo PATH_JS ?>jquery-1.11.0.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<!--<script src="<?php echo PATH_JS ?>jquery.fancybox.js"></script>-->

<!--[if IE 7]>
<link href="<?php echo PATH_CSS ?>ie7.css" rel="stylesheet" />
<![endif]-->
<!--[if IE 8]>
<link href="<?php echo PATH_CSS ?>ie8.css" rel="stylesheet" />
<![endif]-->

<script type="text/javascript">
		var PATH_HOME = <?php echo json_encode (PATH_HOME)?>;
		var PATH_HTML = <?php echo json_encode (PATH_HTML)?>;
		var PATH_PHP = <?php echo json_encode (PATH_PHP)?>;
		var PATH_IMAGES = <?php echo json_encode (PATH_IMAGES)?>;
		var PATH_ADMIN = <?php echo json_encode (PATH_ADMIN)?>;
		var PATH_IMAGES_MENU = <?php echo json_encode (PATH_IMAGES_MENU)?>;
		var REDIRECT_PATH = <?php echo json_encode (REDIRECT_PATH)?>;	
		var PAGO_ADELANTADO = <?php echo json_encode (PAGO_ADELANTADO)?>;	
		
</script>


<!--<script type="text/javascript" src="<?php echo PATH_JS ?>modernizr-2.5.3.js"></script>-->
<script src="<?php echo PATH_JS ?>modernizr.custom.98616.js"></script>
<script type="text/javascript" src="<?php echo PATH_JS ?>jquery.previewInputFileImage.js"></script>
<script type="text/javascript" src="<?php echo PATH_JS ?>script.js"></script>
<script type="text/javascript" src="<?php echo PATH_JS ?>funcs.js?i=<?php echo rand(0,999)?>"></script>
<script type="text/javascript" src="<?php echo PATH_JS ?>responsiveslides.min.js"></script>
<script type="text/javascript" src="<?php echo PATH_JS ?>menuFuncs.js"></script>
<script type="text/javascript" src="<?php echo PATH_JS ?>jquery.easing.min.js"></script>
<!--
-->
<link href="<?php echo PATH_CSS ?>owl.carousel.css" rel="stylesheet">
<link href="<?php echo PATH_CSS ?>owl.theme.css" rel="stylesheet">
<script src="<?php echo PATH_JS ?>owl.carousel.min.js"></script>

<!-- bxSlider Javascript file -->
<script type="text/javascript" src="<?php echo PATH_JS ?>jquery.bxslider.min.js"></script>
<script type="text/javascript" src="https://www.mercadopago.com/org-img/jsapi/mptools/buttons/render.js"></script>

</head>
