<?php
require_once('config.php');
/* el config es el archivo donde esta la configuracion particular de cada sitio
  todos los archivos que trabajen con sesion deben incluirlo */

////////HTML//////////////////
require_once('../html/head.php');
require_once ('../html/header.php');
//require_once ('../html/menu.php');

require_once '../php/funciones.php';

conectar();

$idMueble = $_GET['id'];

$mue = obtenerMueblePorId($idMueble);
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
<script>
    $(document).ready(function() {
        $("#owl").owlCarousel({
            autoPlay: 5000,
            items: 3,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3]
        });
    });
</script>
<section>
    <!-- slide del producto -->
    <div id="owl" class="owl-carousel">
        <?php
        $imagenes = obtenerImagenesChicasPorMueble($mue['idMueble']);
        switch ($imagenes) {
            case -1: echo "Hubo un error en la BD.";
                break;
            case 0: echo "No hay imágenes para este mueble.";
                break;
            default :
                while ($img = mysql_fetch_array($imagenes)) {
                    $fotoGrande = obtenerImagenGrandePorGrupo($img['Grupo']);
                    ?>
                    <div class="item"><a class="fancybox" rel="group" href="<?php echo PATH_IMAGES_AMPLIACION . $fotoGrande['nombreImagen']; ?>" title="<?php echo $fotoGrande['Epigrafe']; ?>"><img src="<?php echo PATH_IMAGES_CHICA . $img['nombreImagen']; ?>" alt="<?php echo $fotoGrande['Epigrafe']; ?>" ></a></div>
                    <?php
                }
        }
        ?>	
        <?php
        $imagenes = obtenerImagenesChicasPorMueble($mue['idMueble']);
        switch ($imagenes) {
            case -1: echo "Hubo un error en la BD.";
                break;
            case 0: echo "No hay imágenes para este mueble.";
                break;
            default :
                while ($img = mysql_fetch_array($imagenes)) {
                    $fotoGrande = obtenerImagenGrandePorGrupo($img['Grupo']);
                    ?>
                    <div class="item"><a class="fancybox" rel="group" href="<?php echo PATH_IMAGES_AMPLIACION . $fotoGrande['nombreImagen']; ?>" title="<?php echo $fotoGrande['Epigrafe']; ?>"><img src="<?php echo PATH_IMAGES_CHICA . $img['nombreImagen']; ?>" alt="<?php echo $fotoGrande['Epigrafe']; ?>" ></a></div>
                    <?php
                }
        }
        ?>	
    </div>


    <div class="container">
        <!-- info detalle producto -->
        <h2><?php echo $mue['nombreMueble'] ?></h2>
        <form class="mueblesDetalle detalleProducto">

            <div class="muebleArticulos">
                <div class="infoArticulo">
                    <span class="artic th">art.</span>
                    <span class="medidas th">MEDIDAS</span>
                    <span class="precio th">PRECIO</span>
                    <span class="_stock th">STOCK</span>
                </div>

                <?php
                $articulos = obtenerArticulosPorMueble($mue['idMueble']);
                switch ($articulos) {
                    case -1: echo "Hubo un error en la base de datos";
                        break;
                    case 0:
                        ?>
                        <span>Sin artículos</span>
                        <?php
                        break;
                    default :
                        while ($art = mysql_fetch_array($articulos)) {
                            ?>
                            <div class="infoArticulo">
                                <div class="acordeon">
                                    <div <?php if (isset($art['Descripcion']) and ($art['Descripcion'] != '')) { ?> class="category"<?php } ?>>
                                        <span class="artic"><?php echo $art['Codigo'] ?></span>
                                        <span class="medidas"><?php echo $art['Medidas'] ?></span>
                                        <span class="precio">$<?php echo $art['Precio'] ?></span>
                                        <?php
                                        // S -> Sin Stock
                                        // C -> Con Stock 1 semana
                                        // D -> Con Stock 2 semanas
                                        switch ($art['Stock']) {
                                            case "S": $tilde = "<img src='" . PATH_IMAGES . "tildeVerde.png' alt=''>";
                                                break;
                                            case "M": $tilde = "<img src='" . PATH_IMAGES . "tildeAmarillo.png' alt='Entrega de 2 a 3 semanas'>";
                                                break;
                                            case "C": $tilde = " <img src='" . PATH_IMAGES . "tildeNaranja.png' alt='Entrega en un mes'> ";
                                                break;
                                            case "D": $tilde = "<img src='" . PATH_IMAGES . "consulte.png' alt='Entrega Consulte'>";
                                                break;
                                        }
                                        echo "<span class='_stock'>" . $tilde . "</span>";
                                        ?>
                                    </div> <!--- cierra div category--->
                                    <div <?php if (isset($art['Descripcion']) and ($art['Descripcion'] != '')) { ?>class="detalle"<?php } ?>>

                                        <?php
                                        echo str_replace("\n", "<br>", $art['Descripcion']);
                                        ?>
                                    </div>

                                </div> <!--- cierra div acordeon--->
                                <div class="check"><input class="selection" type='checkbox' name="carrito[]" value="<?php
                                    $cod = substr_replace($art['idArticulo'], '161', 0, 0);
                                    echo $cod;
                                    ?>"/></div>
                            </div><!--- cierra div infoArticulo--->
                            <?php
                        }
                        break;
                }
                ?>
            </div><!--- cierra div muebleArticulos--->
            <div class="tablaComprar">
                <div style="height:40px; padding-top:10px;"><p class="error">Debe seleccionar un artículo.</p></div>
                <input class="btn agregar" type="submit" value="agregar a carrito">
            </div>

        </form>
        <!-- info detalle producto -->

        <?php 
            $tituloFormConsulta = "Tiene dudas? Consúltenos";
            
            require_once '../html/form-consulta.php';
        ?>
        
        <h3>Acerca de la calidad</h3>

        <p><strong>Los muebles son construídos en madera de robinia (también llamada teca europea) de alta resistencia a la intemperie y herrajes de acero inoxidable con diseños ergonómicos.</strong></p>

        <p>La Robinia es un árbol de unos 20 metros de altura y su diámetro no supera los 60 centímetros. Su atrayente color castaño-dorado sumado al pronunciado lustre natural, le otorgan a la robinia un <strong>elevado valor estético</strong>.</p>

        <p>Los poros se hallan totalmente obturados por tilides y esto le confiere una gran durabilidad natural. Es una madera de alta calidad tecnológica, resulta tan tenáz como el fresno y tan dura como el roble (europeo). <strong>Es muy resistente a la intemperie.</strong></p>

        <h3>Envíos a todo el país</h3>
        <p>Si se encuentra en nuestras zonas de envío dentro de la Provincia de Buenos Aires le enviaremos los productos
            a su domicilio, si se encuentra en el resto del país nos encargaremos de despacharlos en el transporte que usted
            nos indique (con salida de La Plata o de Buenos Aires). <a href="">Ver mapa</a></p>

        <!-- tarjetas de crédito -->
        <h3>Formas de pago</h3>
        <div class="tarjetas">
            <img src="<?php echo PATH_IMAGES_TARJETAS; ?>visa.jpg" alt="Tarjeta Visa">
            <img src="<?php echo PATH_IMAGES_TARJETAS; ?>mastercard.jpg" alt="Tarjeta Mastercard">
            <img src="<?php echo PATH_IMAGES_TARJETAS; ?>american.jpg" alt="Tarjeta American Sxpress">
            <img src="<?php echo PATH_IMAGES_TARJETAS; ?>naranja.jpg" alt="Tarjeta Naranja">
            <img src="<?php echo PATH_IMAGES_TARJETAS; ?>nativa.jpg" alt="Tarjeta Nativa">
            <img src="<?php echo PATH_IMAGES_TARJETAS; ?>shopping.jpg" alt="Tarjeta Shopping">
            <img src="<?php echo PATH_IMAGES_TARJETAS; ?>cencosud.jpg" alt="Tarjeta Cencosud">
            <img src="<?php echo PATH_IMAGES_TARJETAS; ?>argencard.jpg" alt="Tarjeta Argencard">
            <img src="<?php echo PATH_IMAGES_TARJETAS; ?>cabal.jpg" alt="Tarjeta Cabal">
            <img src="<?php echo PATH_IMAGES_TARJETAS; ?>mercado_pago.jpg" alt="Mercado Pago">
            <!--data fiscal -->
            <a  class="data-fiscal" href="http://qr.afip.gob.ar/?qr=Z1mUv3_E1N05GEehbty3ew,," target="_F960AFIPInfo"><img src="http://www.afip.gob.ar/images/f960/DATAWEB.jpg" border="0"></a>
            <!--/data fiscal -->
            <div class="clear"></div>
        </div>
    </div>
</section>
<?php
require_once('../html/footer.php');