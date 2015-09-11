<?php

$remitente = $_POST['mail'];
$destinatario = 'ventas@nekonmuebles.com.ar'; // en esta línea va el mail del destinatario, puede ser una cuenta de hotmail, yahoo, gmail, etc
$asunto = 'Consulta'; // acá se puede modificar el asunto del mail
if (!$_POST) {
    ?>
    <script type="text/javascript">
        alert("Hubo un error en el envío del mensaje.");
        window.history.back();
    </script>
    <?php

} else {

    $cuerpo = "Nombre: " . $_POST["realname"] . "\r \n";
    $cuerpo .= "Email: " . $_POST["mail"] . "\r \n";
    $cuerpo .= "Teléfono: " . $_POST["tel"] . "\r \n";
    $cuerpo .= "Consulta: " . $_POST["consulta"] . "\r\n";
    //las líneas de arriba definen el contenido del mail. Las palabras que están dentro de $_GET[""] deben coincidir con el "name" de cada campo. 
    // Si se agrega un campo al formulario, hay que agregarlo acá.

    $headers = "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/plain; charset=utf-8\n";
    $headers .= "X-Priority: 3\n";
    $headers .= "X-MSMail-Priority: Normal\n";
    $headers .= "X-Mailer: php\n";
    $headers .= "From: \"" . $_POST['realname'] . "\" <" . $remitente . ">\n";

    if (mail($destinatario, $asunto, $cuerpo, $headers)) {
        ?>
        <script type="text/javascript">
            alert("El mensaje ha sido enviado.");
            window.history.back();
        </script>
        <?php

    } else {
        ?>
        <script type="text/javascript">
            alert("Hubo un error en el envío del mensaje.");
            window.history.back();
        </script>
        <?php

    }
}
?>
