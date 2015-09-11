<div class="borderPuntos">
<?php
	require_once '../php/config.php';
        require_once ('seguridad.php'); //Controla que sea administrador..
    require_once '../php/funciones.php';

    if(isset($_GET['idM']))
    {
        if(($_GET['idM'] == "-") || (is_null($_GET['idM'])))
        {
            die();
        }
		
        $idMueble = $_GET['idM'];
        
        $mueble = obtenerInfoMueblePorId($idMueble);
        
?>
    <h2><?php echo $mueble['nombreMueble'] ?></h2>
    <h3>Artículos publicados</h3>
<?php
        $articulos = obtenerArticulosPorMueble($idMueble);
		
        switch ($articulos)
        {
            case -1: echo "Hubo un error en el sistema.";
                break;
            case 0: echo "El mueble no cuenta con artículos cargados.";
                break;
            default :
                ?>
                <table  class="mueblesTabla artPublicado acordeon2">
                    <tr>
                        <th>Art.</th>
                        <th>Medidas</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th></th>
                        <th>Editar</th>
			<th>Eliminar</th>
                    </tr>
                    <?php
                        while($art = mysql_fetch_array($articulos))
                        {
                            echo "<tr >";
                            echo "<td><a class='medidas' >".$art['Codigo']."</a></td>";
                            echo "<td>".$art['Medidas']."</td>";
                            echo "<td>$".$art['Precio']."</td>";
                           // S -> Sin Stock
							// C -> Con Stock 1 semana
							// D -> Con Stock 2 semanas
							// M -> Con Stock 1 mes
							switch ($art['Stock'])
							{
								case "S": $tilde = "<img src='".PATH_IMAGES."tildeVerde.png' alt=''>";
									break;
								case "M": $tilde = "<img src='".PATH_IMAGES."tildeAmarillo.png' alt='Entrega de 2 a 3 semanas'>";
									break;
								case "C": $tilde = " <img src='".PATH_IMAGES."tildeNaranja.png' alt='Entrega en un mes'> ";
									break;
								case "D": $tilde = "<img src='".PATH_IMAGES."consulte.png' alt='Entrega Consulte'>";
									break;
							}
                            echo "<td>".$tilde."</td>";
                            echo "<td></td>";
                            echo "<td><a class='editor' onclick='editar(".$art['idArticulo'].")' id='".$art['idArticulo']."'><img src='".PATH_IMAGES."editar.png' alt=''></a></td>";
                            echo "<td><a id='".$art['idArticulo']."' onclick='eliminarArticulo(this.id)'><img src='".PATH_IMAGES."eliminar.png' alt=''></a></td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
<?php
        }
    }
    else
    {
        echo "Problema con GET.";
    }
?>        
</div>
<h3>Agregar nuevo artículo</h3>
<div id="formularioArticulos">
    <script type="text/javascript">
        cargarFormVacio(<?php echo $idMueble ?>);
    </script>
</div>