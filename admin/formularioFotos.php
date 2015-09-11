<?php
    require_once '../php/config.php';
    require_once ('seguridad.php'); //Controla que sea administrador..
    require_once '../php/funciones.php';
    conectar();
    
    if(isset($_GET['idM']))
    {
        if(($_GET['idM'] == "-") || (is_null($_GET['idM'])))
        {
            die();
        }
        $idMueble = $_GET['idM'];
    }
    
    $fotoCarrito = obtenerImagenCarritoPorIdMueble($idMueble);
    switch ($fotoCarrito)
    {
        case -1: $srcCarrito = "";
            break;
        default : $srcCarrito = PATH_IMAGES_CARRITO.$fotoCarrito['nombreImagen'];
            break;
    }
?>
<script type="text/javascript" src="<?php echo PATH_JS ?>jquery.form.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
       $("#formAltaImagenes").ajaxForm(function(msg){
               alert(msg);
               $("#formularioFotos").load('<?php echo PATH_ADMIN ?>formularioFotos.php?idM=<?php echo $idMueble ?>');
       });
       $("#formAltaCarrito").ajaxForm(function(msg){
               alert(msg);
               $("#formularioFotos").load('<?php echo PATH_ADMIN ?>formularioFotos.php?idM=<?php echo $idMueble ?>');
       });
    });
</script>
<div id="container">
    <a class="eliminarMueble" onclick="eliminarMueble(this);" data="<?php echo $idMueble ?>">Eliminar Mueble</a>

        <div class="formularioArticulosMini" id="<?php echo $idMueble?>">
        <?php
            require_once ("formularioArticulos.php");
        ?>
        </div>
		<h2>Agregue, elimine o modifique fotos</h2>
		<h3>Fotos Catálogo</h3>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#fotoMediana").previewInputFileImage();
            });
        </script>

        <div class="recuadroForm">
            <div class="fotoChicaAgregar">
            <form id="formAltaImagenes" enctype="multipart/form-data" action="<?php echo PATH_ADMIN ?>agregarFoto.php" method="post">
                <script type="text/javascript">
                    $(document).ready(function(){
                        $("#fotoChica").previewInputFileImage();
                    });
                </script>
                <div class="col1Foto">
                    <p><strong>Foto chica</strong>  (altura 245px)</p>
                    <div class="fotoChicaImg vacio">
                        <img src="" id="imChica" />
                    </div>
                                                <input type="file" name="fotoChica" id="fotoChica" class="examinar" data-previewer="#imChica">
                </div>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $("#fotoGrande").previewInputFileImage();
                    });
                </script>
                <div class="col2Foto">
                    <p><strong>Foto ampliada</strong> </p>
                    <div class="fotoGdeImg vacio">
                        <img src="" id="imGrande" />
                    </div>
                                                <input type="file" name="fotoGrande" id="fotoGrande" class="examinar" data-previewer="#imGrande">

                                                <label for="epigrafe" class="epig">Epígrafe para foto ampliada</label>
                    <input type="text" name="epigrafe"  class="inputEpigrafe">
                </div>
                        <div class="clear"></div>
                        <input type="hidden" name="idMueble" value="<?php echo $idMueble ?>" />
                        <input type="submit" value="Guardar Foto" class="btnGuardar" >
                </form>
        </div>
         <div id="fotosCargadas">
                    <script type="text/javascript">
                        cargarFotosCargadas(<?php echo $idMueble ?>);
                    </script>
         </div>
	</div>
			<h3>Foto para Carrito</h3>
		    <div class="fotoCarrito recuadroForm">
            <p>(110 x 110px)</p>
            <form action="<?php echo PATH_ADMIN ?>agregarFotoCarrito.php" id="formAltaCarrito" enctype="multipart/form-data" method="post">
			<a class="eliminarFotoCarrito" onclick="eliminarGenerico(<?php echo $fotoCarrito['idImagen'] ?>, 'borrarFotos.php?idImagen=', '#formularioFotos', 'formularioFotos.php?idM=<?php echo $idMueble ?>', '¿Está seguro que desea eliminar la imagen?');">Eliminar foto</a>
            <div class="fotoCarritoImg vacio">
                <img src="<?php echo $srcCarrito ?>" alt="Muebles Nekon" class="fotoCarritoImg" id="imMediana">
            </div>
            <input type="file" name="fotoMediana" id="fotoMediana" class="examinar" data-previewer="#imMediana">
            <input type="hidden" name="idMueble" value="<?php echo $idMueble ?>" />
            <input type="submit" value="Guardar Foto" class="btnGuardarCarrito">
            </form>
        </div>
       
</div>
