<div class="contentFormContacto">
    <h3><?php echo $tituloFormConsulta; ?></h3>
    <div class="infoContacto">
        <h3>Teléfonos:</h3>
        <p>Tel/Fax: <strong>(54) 0221 461-3486</strong><br>
            Móvil: <strong>0221 15 5970777</strong></p>
        <h3>Email:</h3>
        <p>nekon.muebles@hotmail.com<br>
        <h3>Horario de atención:</h3>
        <p>Lunes a viernes de 8 a 12 hs y de 14 a 18 hs<br>
            Sábados de 8 a 14 hs</p>
        <h3>Showroom y fábrica:</h3>
        <p>Calle 16 (Aschieri) N°4436<br>
            Berisso - Buenos Aires - Argentina</p>
    </div>
    <form class="formConsulta" action="<?php echo PATH_HTML ?>envia-consulta.php" method="post" name="form1">
        <input name="realname" type="text" placeholder="Nombre y apellido" required>
        <input name="tel" type="text" placeholder="Teléfono" required>
        <input name="mail" type="email" placeholder="Email" required>

        <textarea name="consulta" id="consulta" placeholder="Mensaje"></textarea>

        <input type="submit" value="consultar" class="btn">

    </form>
    <div class="clear"></div>
     <div class="divOculta"></div>
</div>

