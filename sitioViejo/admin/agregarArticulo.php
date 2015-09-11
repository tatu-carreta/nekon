<?php

    require_once '../php/funciones.php';
    conectar();

    if(isset($_GET['codigo']))
    {
        $codigo = $_GET['codigo'];
        if($codigo != "")
        {
            $medidas = $_GET['medidas'];
            
            if(isset($_GET['precio']))
            {
                $precio = $_GET['precio'];
            }
            else
            {
                $precio = 0;
            }
            
            $stock = $_GET['stock'];
            
            $descripcion = $_GET['descripcion'];
            
            $idMueble = $_GET['idMueble'];
            //$idMueble = '1';
            
            $estadoAlta = realizarAltaArticulo($idMueble, $codigo, $medidas, $precio, $descripcion, $stock);
            
            switch ($estadoAlta)
            {
                case -1: echo "El artículo no se pudo cargar. Intente nuevamente.";
                    break;
                case 1: echo "El artículo se dio de alta correctamente.";
                    break;
                default : echo "Hubo un error al hacer la query.";
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
