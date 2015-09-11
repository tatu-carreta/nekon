<?php
	require_once 'config.php';
        require_once 'funciones.php';
        if(isset($_GET))
        {
            if(isset($_GET['f']))
            {
                $f = $_GET['f'];

                if($f == "w%w")
                {
                    require_once '../lib/mercadopago.php';
                    $mp = new MP(CLIENT_ID, CLIENT_SECRET);
                }
            }
        }
	
        if(isset($_POST))
        {
            if(isset($_POST['zonaEnvio']))
            {
                $idEntrega = $_POST['zonaEnvio'];
                if($idEntrega != "")
                {
                    if(isset($_POST['montoAPagar']))
                    {
                        $quePagar = $_POST['montoAPagar'];
                        if (isset($_SESSION['carro']))
                        {
                            if(sizeof($_SESSION['carro'])>0)
                            {
                                $importeProductos = 0;

                                foreach($_SESSION['carro'] as $key => $value)
                                {

                                    $datosArticulo = obtenerArticuloParaCarritoPorId($key);

                                    $importeProductos += $datosArticulo['Precio']*$value;
                                }
                                /*
                                 * $aConfig["zonas_envios"][$idEntrega][0] -> Costo
                                 * $aConfig["zonas_envios"][$idEntrega][1] -> Tope
                                 */
                                
                                $entrega = obtenerEntregaPorId($idEntrega);
                                
                                switch ($entrega)
                                {
                                    case -1:
                                        break;
                                    case 0:
                                        if($idEntrega == 4 || $idEntrega == 5)
                                        {
                                            if($importeProductos < $aConfig["zonas_envios"][$idEntrega][1])
                                            {
                                                $importeEntrega = $aConfig['zonas_envios'][$idEntrega][0];
                                            }
                                            else
                                            {
                                                $importeEntrega = 0;
                                            }
                                        }
                                        break;
                                    default :
                                        if($importeProductos < $entrega['presupuestoTope'])
                                        {
                                            $importeEntrega = $entrega['Costo'];
                                        }
                                        else
                                        {
                                            $importeEntrega = 0;
                                        }
                                        break;
                                }
                                
                                $importeParcial = $importeProductos + $importeEntrega;
                                switch ($quePagar)
                                {
                                    case "total": $importeTotal = $importeParcial;
                                        break;
                                    case "senia": $importeTotal = round(($importeParcial * PAGO_ADELANTADO) / 100);
                                }
                                if(isset($mp))
                                {
                                    $preference = array (
                                        "items" => array (
                                            array (
                                                "title" => "Nekon Muebles",
                                                "quantity" => 1,
                                                "currency_id" => "ARS",
                                                "unit_price" => $importeTotal
                                            )
                                        ),
                                        "back_urls" => array(
                                            "success" => PATH_PHP."ponerCeroCarrito.php",
                                            "failure" => PATH_PHP."carrito.php"
                                        )
                                    );

                                    $preferenceResult = $mp->create_preference($preference);

                                    $url_mercado_pago = $preferenceResult['response']['init_point'];
                                    //$url_mercado_pago = $preferenceResult['response']['sandbox_init_point'];
                                }


                                if(isset($_GET))
                                {
                                    if(isset($_GET['f']))
                                    {
                                        $f = $_GET['f'];

                                        require_once 'comprobante.php';
                                    }
                                }
                                else
                                {
                                    $text = "NO LLEGO EL GET";
                                }
                            }
                            else
                            {
                                $text = "Debe seleccionar al menos un artículo.";
                            }
                        }
                        else
                        {
                            $text = "No hay productos en el carrito.";
                        }
                    }
                    else
                    {
                        $text = "Debe elegir el monto a pagar.";
                    }
                }
                else
                {
                    $text = "Debe elegir una zona de envío.";
                }
            }
        }
        $data = array(
            "texto" => $text,
            "url" => $url_mercado_pago,
            "mpc" => $mp
        );
	echo json_encode($data);
?>