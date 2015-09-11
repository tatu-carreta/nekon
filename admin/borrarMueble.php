<?php

    require_once '../php/funciones.php';
    conectar();

    if(isset($_GET['idMueble']))
    {
        
        $idMueble = $_GET['idMueble'];
        
        $estadoBaja = realizarBajaMueble($idMueble);
            
        switch ($estadoBaja)
        {
            case -1: echo "El mueble no se pudo eliminar. Intente nuevamente.";
                break;
            case 1: echo "El mueble se eliminó correctamente.";
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
