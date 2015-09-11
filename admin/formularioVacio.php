<?php 
    require_once '../php/config.php';
    require_once ('seguridad.php'); //Controla que sea administrador..
?>

<?php
		
    if(isset($_GET['idM']))
    {
        $idMueble = $_GET['idM'];
    }
?>
<form id="formArticulo"  >
    <table class="mueblesTabla artNuevo">
        <tr>
            <th><label for="cargarArt">Art.</label></th>
            <th><label for="medidasArt">Medidas</label></th>
            <th><label for="precioArt">Precio</label></th>
            <th><label for="stockArt">Stock</label></th>
        </tr>
        <tr>
            <td><input type="text" name="codigo" id="cargarArt"></td>
            <td><input type="text" name="medidas" id="medidasArt"></td>
            <td><input type="text" name="precio" id="precioArt"></td>
            <td class="stock">
                <img src='<?php echo PATH_IMAGES ?>tildeVerde.png' alt='Entrega en 1 semana' />
                <input type="hidden" name="stock" value="S"/>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align:left;">Más info:</td>
        </tr>
        <tr>
            <td colspan="4" style="text-align:left;"><textarea name="descripcion"></textarea></td>
        </tr>
        <tr>
            <td colspan="4">
                <input type="hidden" name="idMueble" value="<?php if(isset($idMueble)){ echo $idMueble; } ?>" />
            </td>
        </tr>
        <tr>
            <td colspan="4" style="vertical-align:top; text-align:right">
                <input type="button" name="" value="Limpiar Formulario" class="btnForm limpiarForm" onclick="cargarFormVacio(<?php echo $idMueble ?>)"/>
				<input type="button" name="" value="Guardar" class="btnForm" onclick="submitVacio()"/>
            </td>
        </tr>
    </table>
</form>
<div class="divOculta" style="display:none"></div>