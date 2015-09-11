<?php
    require_once '../php/config.php';
    require_once ('seguridad.php'); //Controla que sea administrador..
    require_once '../php/funciones.php';
    conectar();
?>
<script type="text/javascript" src="<?php echo PATH_JS?>funcs.js"></script>
<?php
		
    
    if(isset($_GET['idArticulo']))
    {
        $articulo = obtenerArticuloPorId($_GET['idArticulo']);
        
        switch ($articulo)
        {
            case -1: echo "Error en la Base de Datos.";
                break;
            default :
                ?>
                <form data="<?php echo $articulo['idMueble'] ?>" id="formArticulo" class="formArticuloModificar">
                    <table class="mueblesTabla artNuevo">
                        <tr>
                            <th><label for="cargarArt">Art.</label></th>
                            <th><label for="medidasArt">Medidas</label></th>
                            <th><label for="precioArt">Precio</label></th>
                            <th><label for="stockArt">Stock</label></th>
                        </tr>
                        <tr>
                            <td><input type="text" name="codigo" id="cargarArt" value="<?php echo $articulo['Codigo'] ?>"></td>
                            <td><input type="text" name="medidas" id="medidasArt" value="<?php echo $articulo['Medidas'] ?>"></td>
                            <td><input type="text" name="precio" id="precioArt" value="<?php echo $articulo['Precio'] ?>"></td>
                            <td class="stock">
                                <?php
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
                                ?>
                                <img <?php echo $tilde; ?> />
                                <input type="hidden" name="stock" value="<?php echo $articulo['Stock']; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align:left;">Más info:</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align:left;"><textarea name="descripcion"><?php echo $articulo['Descripcion'] ?></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <input type="hidden" name="idArticulo" value="<?php echo $articulo['idArticulo'] ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="vertical-align:top; text-align:right">
                                <input type="button" name="" value="Limpiar Formulario" class="btnForm limpiarForm" onclick="cargarFormVacio(<?php echo $articulo['idMueble'] ?>)"/>
                                <input type="button" name="" value="Guardar" class="btnForm" onclick="submitModificarArticulo()"/>
                            </td>
                        </tr>
                    </table>
                </form>
				<div class="divOculta" style="display:none"></div>
<?php
            break;
        }
    }
?>

