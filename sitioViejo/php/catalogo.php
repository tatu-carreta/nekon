<?php
        require_once('config.php'); 
	/*el config es el archivo donde esta la configuracion particular de cada sitio
	todos los archivos que trabajen con sesion deben incluirlo*/
	
	////////HTML//////////////////
	require_once('../html/head.php');
        require_once ('../html/header.php');
        require_once ('../html/menu.php');
        
        require_once '../php/funciones.php';
    
        conectar();
        
        if(isset($_GET['id']))
        {

		switch(trim($_GET['id']))
		{
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
		
                
        $nombreSeccion = obtenerSeccionPorId($idSeccion);

        }
?>
<div id="container">
<section>
        <h2><?php if(isset($nombreSeccion)){echo $nombreSeccion['nombreSeccion'];} ?></h2>
		<p class="tiempoEntrega">Tiempo de entrega: 
		<span><img src="<?php echo PATH_IMAGES ?>tildeVerde.png" alt="Entrega en 1 semana"></span> 1 semana
		<span><img src="<?php echo PATH_IMAGES ?>tildeAmarillo.png" alt="Entrega de 2 a 3 semana"></span> 2 a 3 semanas
		<span><img src="<?php echo PATH_IMAGES ?>tildeNaranja.png" alt="Entrega en 1 mes"></span> 1 mes
		<span><img src="<?php echo PATH_IMAGES ?>consulte.png" alt="Entrega Consulte"></span> Consulte</p>
	<!-- abre muebles -->
        
	<div class="mueblesDiv">
<?php

/*
 * PARA EL USO DE URL AMIGABLE, TENEMOS QUE CAMBIAR EL PASAJE DE PARÁMETRO
 * DE ID -> MUEBLE, Y QUE CADA UNO TENGA UN TEXTO ASOCIADO A LA SECCIÓN CORRESPONDIENTE
 * DONDE SERÁ ATENDIDO POR UN SWITCH PARA LA POSTERIOR CONSULTA A LA BD.
 */

    if(isset($_GET['id']))
    {

		switch(trim($_GET['id']))
		{
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
		
                
    $muebles = obtenerMueblesPorSeccion($idSeccion);
    
    switch ($muebles)
    {
        case -1: echo "Hubo un error en la BD.";
            break;
        case 0: echo "No hay muebles cargados.";
            break;
        default :
            while($mue = mysql_fetch_array($muebles))
            {
            ?>
<div class="envelope">
	<div class="mueblesSlideContent">
		<h3><?php echo $mue['nombreMueble'] ?></h3>
		<div class="mueblesSlide">
			<ul class="sliderCatalogo">
				<?php
					$imagenes = obtenerImagenesChicasPorMueble($mue['idMueble']);
					switch ($imagenes)
					{
						case -1: echo "Hubo un error en la BD.";
							break;
						case 0: echo "No hay imágenes para este mueble.";
							break;
						default :
								while ($img = mysql_fetch_array($imagenes))
								{
									$fotoGrande = obtenerImagenGrandePorGrupo($img['Grupo']);
									echo "<li class='slideCat'><a class='fancybox' rel='group".$mue['idMueble']."'  href='".PATH_IMAGES_AMPLIACION.$fotoGrande['nombreImagen']."' title='".$fotoGrande['Epigrafe']."'><img src='".PATH_IMAGES_CHICA.$img['nombreImagen']."' alt='".$fotoGrande['Epigrafe']."'></a></li>";
								}
					}
				?>
			</ul>
		</div>
	</div>




	<form  class="mueblesDetalle">
	<div class="muebleArticulos">
		<div class="infoArticulo">
			<span class="artic th">art.</span>
			<span class="medidas th">MEDIDAS</span>
			<span class="precio th">PRECIO</span>
			<span class="_stock th">STOCK</span>
		</div>

		<?php
		$articulos = obtenerArticulosPorMueble($mue['idMueble']);
		switch ($articulos)
		{
			case -1: echo "Hubo un error en la base de datos";
				break;
			case 0: 
				?>
				<span>Sin artículos</span>
				<?php
				break;
			default :
				while($art = mysql_fetch_array($articulos))
				{
					?>
		<div class="infoArticulo">
			<div class="acordeon">
				<div <?php if (isset ($art['Descripcion']) and ($art['Descripcion'] != '')){?> class="category"<?php }?>>
					<span class="artic"><?php echo $art['Codigo']?></span>
					<span class="medidas"><?php echo $art['Medidas']?></span>
					<span class="precio">$<?php echo $art['Precio']?></span>
							<?php
							// S -> Sin Stock
							// C -> Con Stock 1 semana
							// D -> Con Stock 2 semanas
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
							echo "<span class='_stock'>".$tilde."</span>";
							?>
				</div> <!--- cierra div category--->
				<div <?php if (isset ($art['Descripcion']) and ($art['Descripcion'] != '')){?>class="detalle"<?php }?>>
									
							<?php
								echo str_replace("\n", "<br>", $art['Descripcion']);
							?>
				</div>
							
			</div> <!--- cierra div acordeon--->
					<div class="check"><input class="selection" type='checkbox' name="carrito[]" value="<?php $cod = substr_replace($art['idArticulo'], '161', 0, 0); echo $cod; ?>"/></div>
		</div><!--- cierra div infoArticulo--->
							<?php
						}
						break;
				}
				
			?>
	</div><!--- cierra div muebleArticulos--->
					<div class="tablaComprar">
						<div style="height:40px; padding-top:10px;"><p class="error">Debe seleccionar un artículo.</p></div>
						<input type="submit" value="Añadir a carrito" class="btnVerdeCarrito comprar">     
					</div>
				
	</form>
	<div class="clear"></div>
</div>
<?php
            }
        }
    }
    else
    {
        echo "Hubo un error en el sistema. Vuelva a intentarlo.";
    }
?>
            <div class="clear"></div>
        </div>
</section>
</div>
<?php
        require_once('../html/footer.php');

?>