<?php
    require_once '../php/funciones.php';
    conectar();


    if(isset($_POST['codigo']))
    {
        $codigo = $_POST['codigo'];
        if($codigo != "")
        {
            $medidas = $_POST['medidas'];
            
            if(isset($_POST['precio']))
            {
                $precio = $_POST['precio'];
            }
            else
            {
                $precio = 0;
            }
            
            $stock = $_POST['stock'];
            
            $descripcion = $_POST['descripcion'];
            
            $idArticulo = $_POST['idArticulo'];
            //$idMueble = '1';
            
            $estadoModificacion = realizarModificacionArticulo($idArticulo, $codigo, $medidas, $precio, $descripcion, $stock);
            
            switch ($estadoModificacion)
            {
                case -1: echo "El artículo no se pudo modificar. Intente nuevamente.";
                    break;
                case 1: echo "El artículo se modificó correctamente.";
                    break;
                default : echo "Hubo un error al hacer la query.";
                    break;
            }
        }
        else
        {
            echo "Usted se olvidó de cargar el nombre del artículo.";
        }
    }
    else
    {
        echo "Hubo un error en el sistema. Vuelva a intentarlo.";
    }

?>
