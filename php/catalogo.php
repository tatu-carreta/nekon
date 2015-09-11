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

if (isset($_GET['id'])) {

    switch (trim($_GET['id'])) {
        case "mesas":
            $idSeccion = 1;
            break;
        case "sillas":
            $idSeccion = 2;
            break;

        case "sillones":
            $idSeccion = 3;
            break;
        case "bancos":
            $idSeccion = 4;
            break;
        case "reposeras":
            $idSeccion = 5;
            break;
        case "muebles":
            $idSeccion = 6;
            break;
        default:
            $idSeccion = 1;
            break;
    }

    ?>

    <section>
        <!-- serie de productos -->

        <div class="catalogo"> 
            <?php
            $muebles = obtenerMueblesPorSeccion($idSeccion);

            switch ($muebles) {
                case -1: echo "Hubo un error en la BD.";
                    break;
                case 0: echo "No hay muebles cargados.";
                    break;
                default :
                    while ($mue = mysql_fetch_array($muebles)) {
                        $imagenMueble = obtenerUltimaImagenChicaPorMueble($mue['idMueble']);
                        ?>
                        <div class="fotoCatalogo"><img src="<?php echo PATH_IMAGES_CHICA.$imagenMueble['nombreImagen'] ?>" alt="Nekon Muebles"><a class="nombreSobreFoto" href="<?php if ($localhost) { ?><?php echo PATH_PHP; ?>detalleProducto.php?id=<?php echo $mue['idMueble']; ?><?php } else { ?><?php echo PATH_HOME.trim($_GET['id']); ?>-de-jardin/detalle-producto/<?php echo $mue['idMueble'] ?><?php } ?>"><?php echo $mue['nombreMueble'] ?></a></div> 
                        <?php
                    }
            }
            ?>
            <div class="clear"></div>
        </div>		
    </section>

    <?php
} else {
    echo "Hubo un error en el sistema. Vuelva a intentarlo.";
}
require_once('../html/footer.php');
?>