<?php

    require_once '../php/config.php';
    require_once ('seguridad.php'); //Controla que sea administrador..
    require_once '../php/funciones.php';
    conectar();
?>
<?php
if(isset($_GET['idM']))
    {
        if(($_GET['idM'] == "-") || (is_null($_GET['idM'])))
        {
            die();
        }
        $idMueble = $_GET['idM'];
        
        $fotosMueble = obtenerImagenesPorMueble($idMueble);
        
        switch ($fotosMueble)
        {
            case -1: echo "Hubo un error en la Base de Datos.";
                break;
            case 0: echo "El mueble no cuenta con imágenes aún.";
                break;
            default :
                    while($imagenes = mysql_fetch_array($fotosMueble))
                    {
                        if($imagenes['Tipo'] == "C")
                        {
                        if(!is_null($imagenes['Grupo']))
                        {
                            $imagenesGrupo = obtenerImagenesPorGrupo($imagenes['Grupo']);
                            
                            switch ($imagenesGrupo)
                            {
                                case -1: echo "Hubo error en la Base de Datos";
                                    break;
                                case 0: echo "El mueble no posee estas imágenes.";
                                    break;
                                default :
                                        while($fotos = mysql_fetch_array($imagenesGrupo))
                                        {
                                            if($fotos['Tipo'] == "C")
                                            {
                                                ?>
<div class="fotoChica">
    <a class="eliminarFoto eliminarFotoChica" onclick="eliminarGenerico(<?php echo $fotos['Grupo'] ?>, 'borrarFotos.php?grupo=', '#formularioFotos', 'formularioFotos.php?idM=<?php echo $idMueble ?>', '¿Está seguro que desea eliminar las imágenes?');">Eliminar foto</a>
    <form class="formFotosCargadas" onsubmit="fotosCargadas($(this), <?php echo $idMueble ?>); return false;" data="<?php echo $idMueble ?>">
        <div class="col1Foto">
            <p><strong>Foto chica</strong>  (altura 245px)</p>
            <div class="fotoChicaImg"><img src="<?php echo PATH_IMAGES_CHICA.$fotos['nombreImagen']; ?>" alt="Muebles Nekon"></div>
            <input type="submit" value="Modificar Foto" class="btnEditar">
        </div>
                                                <?php
                                            }
                                            if($fotos['Tipo'] == "G")
                                            {
                                                $epigrafe = obtenerEpigrafeFoto($fotos['idImagen']);
                                                ?>
        <div class="col2Foto">
            <p><strong>Foto ampliada</strong> </p>
            <div class="fotoGdeImg"><img src="<?php echo PATH_IMAGES_AMPLIACION.$fotos['nombreImagen']; ?>" alt="Muebles Nekon"></div>
            <label for="epigrafe" class="epig">Epígrafe para foto ampliada</label>
            <input type="hidden" name="idFoto" value="<?php echo $fotos['idImagen'] ?>" />
            <input type="text" name="epigrafe" class="inputEpigrafe" value="<?php echo $epigrafe['Epigrafe'] ?>">
        </div>
        <div class="clear"></div>
    </form>
</div>
        <?php
                                            }
                                        }
                                    
                                    break;
                            }
                        }
                    }
                    }
                break;
        }
    }
    else
    {
        echo "Error al elegir mueble.";
    }
?>