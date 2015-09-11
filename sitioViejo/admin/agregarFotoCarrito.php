<?php

    require_once '../php/config.php';
    require_once ('seguridad.php'); //Controla que sea administrador..
    require_once '../php/funciones.php';
    conectar();

    if(isset($_POST))
    {
        if(isset($_POST['idMueble']))
        {
            $idMueble = $_POST['idMueble'];
        }
        
        $carrito = obtenerImagenCarritoPorIdMueble($idMueble);
        switch ($carrito)
        {
            case -1:
                $tieneCarrito = false;
                break;
            default :
                $tieneCarrito = true;
                break;
        }
        if(isset($_FILES['fotoMediana']))
        {
            if (basename( $_FILES['fotoMediana']['name'])=="")
            {		
                die("Se olvidó de cargar la imagen.");
                $ok = false;
            }else{	
                if(!$tieneCarrito)
                {
                    $tmp_carrito = $_FILES['fotoMediana']['tmp_name'];
                    $nameImageCarrito = basename($_FILES['fotoMediana']['name']);
                    $dirCarrito = '../images/carrito/'.basename( $_FILES['fotoMediana']['name']);	
		    copy($tmp_carrito, $dirCarrito); 
                    $ok = true;
                }
                else
                {
                    die("Ya posee imagen de carrito.");
                    $ok = false;
                }
            }
        }
        else
        {
            die("Se olvidó de cargar la imagen.");
            $ok = false;
        }
        if($ok)
        {
            $estadoAlta = realizarAltaImagenCarrito($idMueble, $nameImageCarrito);
        
            switch ($estadoAlta)
            {
                case -1: echo "No se pudo realizar el alta correctamente.";
                    break;
                case 1: echo "La imágenes se cargaron correctamente.";
                    break;
            }
        }

        else
        {
            echo "Se olvidó de cargar la foto.";
        }
    }
    else 
    {
        echo "Error en el pasaje de parámetros.";
    }
    
?>
