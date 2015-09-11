<?php

    require_once '../php/funciones.php';
    conectar();

    if(isset($_POST['idFoto']))
    {
        $idFoto = $_POST['idFoto'];
        
        $epigrafe = $_POST['epigrafe'];
        
        $estadoModificacion = realizarModificacionFoto($idFoto, $epigrafe);
            
            switch ($estadoModificacion)
            {
                case -1: echo "La imagen no se pudo modificar. Intente nuevamente.";
                    break;
                case 1: echo "La imagen se modificó correctamente.";
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
