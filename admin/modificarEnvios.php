<?php
    require_once('../php/config.php'); 
    require_once ('seguridad.php'); //Controla que sea administrador..
    require_once('../html/headAdmin.php');
    $currentPage = 4 //indica que esta en la pagina 4, modificar zonas

?>
<?php
    require_once('../html/headerAdmin.php'); 
?>
<div id="container">
<?php
	require_once ('../html/menuAdmin.php');
        require_once ('../php/funciones.php');
        
        $zonas = obtenerZonasEnvio();
        
        switch ($zonas)
        {
            case -1:
                echo "Hubo un error en el sistema.";
                break;
            case 0:
                echo "No hay cargadas zonas de envío en el sistema.";
                break;
            default :
                ?>
				
				
<div class="formularios2">
<h2>Modificar envíos</h2>
	<form id="formZonasEnvio">
		<table class="modificarEnvios">
			<tr>
				<th>Zona</th>
				<th>Presupuesto Tope</th>
				<th>Costo de Envío</th>
			</tr>
			<?php
				while($z = mysql_fetch_array($zonas))
				{
					?>
			<tr>
				<td><input type="text" name="nombreZona[]" value="<?php echo $z['nombreZona'] ?>" style="background: none;border:none; color:grey"/></td>
				<td><input type="text" class="precio" name="presupuestoTope[]" value="$<?php echo $z['presupuestoTope'] ?>" style="background: none;border:none; color:grey"/></td>
				<td><input type="text" class="precio" name="costo[]" value="$<?php echo $z['Costo'] ?>" style="background : none;border:none; color:grey"/></td>
			</tr>
					<?php
				}
			?>
		</table>
		<div style="margin-top:20px;">
			<input type="button" class="btnForm" value="Cancelar" onclick="location.reload()" />
			<input type="submit" class="btnForm" value="Confirmar" />
		</div>
	</form>
</div>
                <?php
                break;
        }
?>
    
</div>
<div class="divOculta" style="display:none"></div>
</body>
</html>