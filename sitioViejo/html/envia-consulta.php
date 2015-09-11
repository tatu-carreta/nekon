<?php

$remitente = $_GET['email'];
$destinatario = 'ventas@nekonmuebles.com.ar'; // en esta línea va el mail del destinatario, puede ser una cuenta de hotmail, yahoo, gmail, etc
$asunto = 'Consulta'; // acá se puede modificar el asunto del mail
if (!$_GET){
?>

<?php
}else{
	 
    $cuerpo = "Nombre: " . $_GET["realname"] . "\r \n"; 
    $cuerpo .= "Email: " . $_GET["email"] . "\r \n";
	$cuerpo .= "Teléfono: " . $_GET["telefono"] . "\r \n";
	$cuerpo .= "Localidad: " . $_GET["localidad"] . "\r \n";
	$cuerpo .= "Consulta: " . $_GET["consulta"] . "\r\n";
	//las líneas de arriba definen el contenido del mail. Las palabras que están dentro de $_GET[""] deben coincidir con el "name" de cada campo. 
	// Si se agrega un campo al formulario, hay que agregarlo acá.

    $headers  = "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/plain; charset=utf-8\n";
    $headers .= "X-Priority: 3\n";
    $headers .= "X-MSMail-Priority: Normal\n";
    $headers .= "X-Mailer: php\n";
    $headers .= "From: \"".$_GET['nombre']." ".$_GET['apellido']."\" <".$remitente.">\n";

    if(mail($destinatario, $asunto, $cuerpo, $headers))
	{
		?>
		<script type="text/javascript">
			alert("El mensaje ha sido enviado.")
		</script>
		 <?php
	}
	else
	{
		?>
		<script type="text/javascript">
			alert("Hubo un error en el envío del mensaje.")
		</script>
		 <?php
	}
    
   
}
?>
