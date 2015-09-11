<?php
	require_once("../php/funciones.php");

	
	if(isset($_POST))
	{
            if(isset($_POST['nombreZona']))
            {
                $estadoModificacion = -1;
                foreach ($_POST['nombreZona'] as $zonas => $nombre)
                {
                    $idZona = $zonas +1;
                    $nombreZona = $nombre;
                    if(isset($_POST['presupuestoTope']))
                    {
                        $precioConSigno = $_POST['presupuestoTope'][$zonas];
                        $presupuestoTope = ltrim($precioConSigno, '$');
                    }
                    else
                    {
                        $presupuestoTope = 0;
                    }
                    if(isset($_POST['costo']))
                    {
                        $precioConSigno = $_POST['costo'][$zonas];
                        $costo = ltrim($precioConSigno, '$');
                    }
                    else
                    {
                        $costo = 0;
                    }
                        
                    $estadoModificacion = realizarModificacionZonasEnvio($idZona, $nombreZona, $presupuestoTope, $costo);
                    
                }
                switch ($estadoModificacion)
                {
                    case -1:
                        echo "La modificación no pudo realizarse.";
                        break;
                    default :
                        echo "La modificación se realizó correctamente.";
                        break;
                }
                
            }
	}
        else
        {
            echo "Hubo un error al enviar el formulario.";
        }
	
?>