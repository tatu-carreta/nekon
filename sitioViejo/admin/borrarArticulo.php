<?php

    require_once '../php/funciones.php';
    conectar();

    if(isset($_GET['idArticulo']))
    {
        
        $idArticulo = $_GET['idArticulo'];
        
        $estadoBaja = realizarBajaArticulo($idArticulo);
            
        switch ($estadoBaja)
        {
            case -1: echo "El artículo no se pudo eliminar. Intente nuevamente.";
                break;
            case 1: echo "El artículo se eliminó correctamente.";
                break;
            default : echo "Hubo un error al hacer la query.";
                break;
        }
    }
    else
    {
        echo "Hubo un error en el sistema. Vuelva a intentarlo.";
    }
    
?>
