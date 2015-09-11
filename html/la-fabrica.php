<?php

require_once('../php/config.php');
require_once('head.php');
require_once('header.php');

?>

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
        <div class="item"><img src="<?php echo PATH_IMAGES ?>slideFabrica/fabrica1.jpg" alt="Fábrica de muebles de jardín" ></div>
        <div class="item"><img src="<?php echo PATH_IMAGES ?>slideFabrica/fabrica2.jpg" alt="Fábrica de muebles de jardín" ></div>
        <div class="item"><img src="<?php echo PATH_IMAGES ?>slideFabrica/fabrica3.jpg" alt="Fábrica de muebles de jardín" ></div>
        <div class="item"><img src="<?php echo PATH_IMAGES ?>slideFabrica/fabrica4.jpg" alt="Fábrica de muebles de jardín" ></div>
        <div class="item"><img src="<?php echo PATH_IMAGES ?>slideFabrica/fabrica5.jpg" alt="Fábrica de muebles de jardín" ></div>
        <div class="item"><img src="<?php echo PATH_IMAGES ?>slideFabrica/fabrica6.jpg" alt="Fábrica de muebles de jardín" ></div>

    </div>


    <div class="container">
        <!-- info detalle producto -->
        <h2>Fábrica de muebles de jardín</h2>
        <div class="mapa">
            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.ar/maps?f=d&source=embed&saddr=Au.+Buenos+Aires+-+la+Plata&daddr=N%C2%B04436+16,+Berisso,+Buenos+Aires+(Nekon+Muebles+de+jard%C3%ADn)&hl=es&geocode=FT7K6_0dxYOL_A%3BFdTi6_0dudqM_CEgDGiLBKy9tSmHbLkYrOWilTEgDGiLBKy9tQ&mra=dme&mrsp=0&sz=13&sll=-34.882833,-57.91975&sspn=0.058439,0.109692&ie=UTF8&t=m&ll=-34.882833,-57.919579&spn=0.070409,0.32959&z=12&output=embed"></iframe><a href="https://maps.google.com.ar/maps?f=d&source=embed&saddr=Au.+Buenos+Aires+-+la+Plata&daddr=N%C2%B04436+16,+Berisso,+Buenos+Aires+(Nekon+Muebles+de+jard%C3%ADn)&hl=es&geocode=FT7K6_0dxYOL_A%3BFdTi6_0dudqM_CEgDGiLBKy9tSmHbLkYrOWilTEgDGiLBKy9tQ&mra=dme&mrsp=0&sz=13&sll=-34.882833,-57.91975&sspn=0.058439,0.109692&ie=UTF8&t=m&ll=-34.882833,-57.919579&spn=0.070409,0.32959&z=12" class="ver-mapa">Ver mapa más grande</a>
        </div>

        <?php
            $tituloFormConsulta = "Comuníquese con nosotros:";
            
            require_once 'form-consulta.php';
        ?>

        <h3>Video de la fábrica</h3>
        <iframe class="video-fabrica" width="980" height="550" src="http://www.youtube.com/embed/Snfsg1P66Bk" frameborder="0" allowfullscreen></iframe>


    </div>
</section>
<?php

require_once('footer.php');
?>