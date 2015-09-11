<?php



/*
 * INFORMACIÓN DE CLIENTE
*/
    $nombreApellido = $_POST['nombreApellido'];
    $mail = $_POST['email'];
    $tel = $_POST['telefono'];
    $dir = $_POST['direccion'];
    $coments = $_POST['comentario'];
    
    $nPedido = realizarAltaCliente($nombreApellido, $mail, $tel, $dir, $coments);
    
    switch ($nPedido)
    {
        case -1:
            $numPedido = 145;
            break;
        default :
            $numPedido = $nPedido+135;
            break;
    }
    
    $envio = obtenerEntregaPorId($idEntrega);
                                
    switch ($envio)
    {
        case -1:
            break;
        case 0:
            if($idEntrega == 4)
            {
               $nombreEntrega = "Transporte con salida desde La Plata";
            }
            else
            {
                if($idEntrega == 5)
                {
                    $nombreEntrega = "Transporte con salida desde CABA";
                }
            }
            break;
        default :
            $nombreEntrega = $envio['nombreZona'];
            break;
    }
    

/*
 * CABECERA DEL MAIL
*/
    $header = "From: ventas@nekonmuebles.com.ar \r\n";
    //$header = "From: max.angletti@gmail.com \r\n";
    $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
    $header .= "Mime-Version: 1.0 \r\n";
    $header .= "Content-Type: text/html; charset=\"utf8\"\n";
/*
 * CUERPO DEL MAIL
*/
$mensaje = "<!DOCTYPE html>
            <html lang='es'>
            <head>
            <meta charset='UTF-8'>
            <title>Nekon - Muebles de jard&iacute;n</title>
            </head>";
$mensaje .= "
            <body>
            <table width='650' border='0' cellpadding='0' cellspacing='0' style='font-family:arial, sans-serif; font-size:14px; color:#333; border:1px solid #CCC; margin-left:auto; margin-right:auto; margin-bottom:30px'>
            <!-- cabecera -->
                    <tr><td><img src=".PATH_IMAGES."nekon_muebles.png alt='NEKON Muebles de Jard&iacute;n'></td></tr>


            <!-- cuerpo -->
                    <tr>
                    <td>
                            <!-- tabla cuerpo 2 filas -->
                            <table width='650' border='0' cellpadding='0' cellspacing='0' style='font-family:arial, sans-serif; font-size:14px; padding:10px 50px'>
                                    <tr>
										<td style='border-bottom:1px solid #CCC'>
											<p><strong>NOTA DE PEDIDO</strong><br>
											<strong>Nro: </strong>".$numPedido."<br>
											<strong>Fecha: </strong>".date("d/m/Y")."</p>
										</td>
                                    </tr>
                                    <tr>
                                    <td>

                                    <p style='margin:20px 0 10px 0'><strong>DATOS DEL COMPRADOR</strong></p>

                                            <table width='550' border='0' style='font-family:arial, sans-serif; font-size:14px'>
												<tr>
													<td style='background:#EDEBEC; width:150px; padding:5px 10px'>Nombre y apellido:</td>
													<td style='background:#EDEBEC; padding:5px 10px'>".$nombreApellido."</td>
												</tr>
												<tr>
													<td style='background:#EDEBEC; padding:5px 10px'>Email:</td>
													<td style='background:#EDEBEC; padding:5px 10px'>".$mail."</td>
												</tr>
												<tr>
													<td style='background:#EDEBEC; padding:5px 10px'>Tel&eacute;fono:</td>
													<td style='background:#EDEBEC; padding:5px 10px'>".$tel."</td>
												</tr>
												<tr>
													<td style='background:#EDEBEC; padding:5px 10px'>Direcci&oacute;n:</td>
													<td style='background:#EDEBEC; padding:5px 10px'>".$dir."</td>
												</tr>
												<tr>
													<td style='background:#EDEBEC; padding:5px 10px'>Comentarios:</td>
													<td style='background:#EDEBEC; padding:5px 10px'>".  $coments."</td>
												</tr>
                                            </table> 
									
                                    <p style='margin:20px 0 10px 0'><strong>DETALLES DEL PEDIDO</strong></p>
                                            <!-- tabla productos -->
                                            <table width='550' border='0' style='font-family:arial, sans-serif; font-size:14px; margin-bottom:20px'>";
                                            if(isset($_SESSION['carro']))
                                            {
                                                if(sizeof($_SESSION['carro'])>0)
                                                {
                                                    $i = 0;
                                                    foreach($_SESSION['carro'] as $key => $value)
                                                    {
                                                        $articulo = obtenerArticuloParaCarritoPorId($key);
                                                        $img = obtenerImagenCarritoParaArticulo($articulo['idMueble']);
                                                        if($i == 0)
                                                        {
                                                            $mensaje .= "<tr>";
                                                        }
                                                        $mensaje .= "<td><img style='border:1px solid #666' src='".PATH_IMAGES_CARRITO.$img['nombreImagen']."' alt='imagen de producto'></td>";
                                                        $mensaje .= "<td style=''><strong>".$articulo['nombreMueble']."</strong><br>Art: ".$articulo['Codigo']."<br>Cant: ".$value."<br>Precio: ".$articulo['Precio']."</td>";
                                                        if($i == 1)
                                                        {
                                                            $mensaje .= "</tr>";
                                                            $i = 0;
                                                        }
                                                        else
                                                        {
                                                            $i ++;
                                                        }
                                                    }
                                                    if($i == 1)
                                                    {
                                                        $mensaje .= "</tr>";
                                                    }
                                                }                                                    
                                            }
                                            
                                            $mensaje .= "
                                            </table> 
                                            <!-- tabla costos -->
                                            <table width='550' border='0' style='font-family:arial, sans-serif; font-size:14px'>
                                            <tr>
												<td style='background:#EDEBEC; padding:5px 10px'>Total productos:</td>
												<td style='background:#EDEBEC; padding:5px 10px; text-align:right; width:150px'>$".$importeProductos."</td>
											</tr>
                                            <tr>
												<td style='background:#EDEBEC; padding:5px 10px'>Gastos de env&iacute;o (".$nombreEntrega."):</td>
												<td style='background:#EDEBEC; padding:5px 10px; text-align:right'>$".$importeEntrega."</td>
											</tr>
                                            <tr>
												<td style='background:#EDEBEC; padding:5px 10px'><strong>TOTAL DE ESTA COMPRA</strong>:</td>
												<td style='background:#EDEBEC; padding:5px 10px; text-align:right'>$".$importeParcial."</td>
											</tr>
                                            </table> 
											
                                            <!-- forma de pago -->
                                            <p style='margin:20px 0 10px 0'><strong>Modo de pago:</strong> ";
                                            if($f == "w%w")
                                            {
                                                $mensaje .= "Tarjetas de cr&eacute;dito, Pagof&aacute;cil, Rapipago<br>";
                                            }
                                            else
                                            {
                                                if($f == "k%k")
                                                {
                                                    $mensaje .= "transferencia o dep&oacute;sito bancario<br>";
                                                }
                                            }
                                            $mensaje .= "
                                            <strong>Eligi&oacute; pagar:</strong> ";
                                            if($quePagar == "senia")
                                            {
                                                $mensaje .= "se&ntilde;a";
                                            }
                                            else
                                            {
                                                if($quePagar == "total")
                                                {
                                                    $mensaje .= "total";
                                                }
                                            }
                                            $mensaje .= "<br>
                                            <strong>Deber&aacute; abonar:</strong> $".$importeTotal."</p>";
                                            if($f == "k%k")
                                            {
                                                $mensaje .= "
                                                            <!-- datos para transferencia -->
                                                            <table width='550' border='0' style='font-family:arial, sans-serif; font-size:14px; background:#EDEBEC; margin-bottom:10px;'>
                                                            <tr>
                                                            <td style='padding:0 30px; line-height:20px'>
                                                            <p><strong>Datos para realizar transferencias:</strong><br>Cuenta Corriente Nro 191-236-002952/3<br>Banco Credicoop a nombre de Nykon e Hijos SRL<br>CBU: 1910236655023600295232<br>CUIT: 30-67720330-3</p>
                                                            <p style='font-size:12px'>Env&iacute;enos un comprobante de pago de la transferencia a nekon.muebles@hotmail.com</p>
                                                            </td>
                                                            </tr>
                                                            </table> ";
                                            }
                                            $mensaje .= "
                                            <p>Nos comunicaremos con usted para acordar el modo y la fecha de env&iacute;o<br>
                                            <strong>Muchas gracias por su compra</strong></p><br>

                                    </td>
                                    </tr>
                            </table> 
                    </td>
                    </tr>

            <!-- pie -->
					<tr>
						<td style='text-align:center; line-height:10px;'><p style='margin:10px 0'>Esta NOTA DE PEDIDO no es un comprobante de pago.</p></td>
					</tr>
				
                    <tr>
						<td style='background:#EDEBEC; text-align:center; line-height:20px;'>
							<p style='margin:10px 0'><strong>SI TIENE DUDAS CONS&Uacute;LTENOS:</strong><br>
							Tel.Fax: (54) 0221 <strong>461-3486</strong> / Movil: 0221 <strong>15 5970777</strong> <br>
							email: <strong>nekon.muebles@hotmail.com</strong></p>
						</td>
                    </tr>
            </table>
            </body>
            </html>";
/*
 * DESTINATARIO DEL MAIL
*/
    $para = ''.$mail.', ventas@nekonmuebles.com.ar';
    $asunto = 'Constancia de Pedido - Nekon Muebles.';
    
    
if(mail($para, $asunto, $mensaje, $header))
{
    $text = "Mensaje enviado correctamente.";
}
else
{
    $text = 'El mensaje no pudo ser enviado.';
}


?>
