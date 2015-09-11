<body>
    <?php require_once("analyticstracking.php"); ?>
    <header>
        <a href="<?php echo PATH_HOME ?>"><img class="logo" src="<?php echo PATH_IMAGES ?>nekon.png" alt="Nekon Muebles de Jardín"></a>
        <nav id='cssmenu'>
            <ul>
                <li class='active has-sub'><a class="btnMuebles" href='#'>los muebles</a>
                    <ul>
                        <li><a href='<?php if ($localhost) { ?><?php echo PATH_PHP ?>catalogo.php?id=mesas<?php } else { ?><?php echo PATH_HOME ?>mesas-de-jardin<?php } ?>'>mesas</a></li>
                        <li><a href='<?php if ($localhost) { ?><?php echo PATH_PHP ?>catalogo.php?id=sillas<?php } else { ?><?php echo PATH_HOME ?>sillas-de-jardin<?php } ?>'>sillas</a></li>
                        <li><a href='<?php if ($localhost) { ?><?php echo PATH_PHP ?>catalogo.php?id=sillones<?php } else { ?><?php echo PATH_HOME ?>sillones-de-jardin<?php } ?>'>sillones</a></li>
                        <li><a href='<?php if ($localhost) { ?><?php echo PATH_PHP ?>catalogo.php?id=reposeras<?php } else { ?><?php echo PATH_HOME ?>reposeras-de-jardin<?php } ?>'>reposeras</a></li>
                        <li><a href='<?php if ($localhost) { ?><?php echo PATH_PHP ?>catalogo.php?id=bancos<?php } else { ?><?php echo PATH_HOME ?>bancos-de-jardin<?php } ?>'>bancos</a></li>
                        <li><a href='<?php if ($localhost) { ?><?php echo PATH_PHP ?>catalogo.php?id=muebles<?php } else { ?><?php echo PATH_HOME ?>muebles-de-jardin<?php } ?>'>varios</a></li>
                    </ul>
                </li>
                <li><a class="btnFabrica" href='<?php if ($localhost) { ?><?php echo PATH_HTML ?>la-fabrica.php<?php } else { ?><?php echo PATH_HOME ?>la-fabrica<?php } ?>'>la fábrica</a></li>
                <li><a class="btnCarrito" href='<?php if ($localhost) { ?><?php echo PATH_PHP ?>carrito.php<?php } else { ?><?php echo PATH_HOME ?>carrito<?php } ?>'>carrito (<?php
                        if (isset($_SESSION['carro']) && (sizeof($_SESSION['carro']) > 0)) {
                            echo sizeof($_SESSION['carro']);
                        } else {
                            echo 0;
                        }
                        ?>)</a></li>
            </ul>
        </nav>
        <div class="clear"></div>

    </header>