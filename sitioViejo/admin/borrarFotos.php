<?php

    require_once '../php/funciones.php';
    conectar();

    if(isset($_GET['grupo']))
    {
        
        $grupo = $_GET['grupo'];
        
        $estadoBaja = realizarBajaImagenes($grupo);
    }
    else
    if(isset ($_GET['idImagen']))
    {
    
        $idImagen = $_GET['idImagen'];
        
        $estadoBaja = realizarBajaImagenCarrito($idImagen);
        
    }
    
        switch ($estadoBaja)
        {
            case -1: echo "La imagen no se pudo eliminar. Intente nuevamente.";
                break;
            case 1: echo "La imagen se eliminó correctamente.";
                break;
            default : echo "Hubo un error al hacer la query.";
                break;
        }
?>
