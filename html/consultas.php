<?php
	require_once('../php/config.php');
	require_once('head.php');
	require_once('header.php');
	require_once('menu.php');
?>

<div id="container" class="txt-int">
    <h2>Consúltenos</h2>
	
	<div class="col-form-consulta">
	
	<form id="formConsulta" name="form1">
		<p><label>Nombre y apellido <br />
		  <input name="realname" type="text" class="campo-form" id="realname" required> *
		</label><p>

		<p><label>Correo electr&oacute;nico <br />
		  <input name="email" type="text" class="campo-form" id="email" required> *
		</label><p>

		<p><label>Tel&eacute;fono <br />
		  <input name="telefono" type="text" class="campo-form" id="telefono" required> *
		</label><p>

		<p><label>Localidad - Provincia<br />
		  <input name="localidad" type="text" class="campo-form" id="localidad" >
		</label><p>

		<p><label>Consulta o comentarios <br />
		  <textarea name="consulta" id="consulta" cols="50" rows="8"></textarea>
		</label><p>

		<label>
		  <input type="submit" name="button" id="button" value="Enviar" class="btnVerde btn-consulta" />
		</label>
	</form>
  
  </div>
  <div class="divOculta"></div>
  
  <div class="col-mapa-int">
  <iframe width="464" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.ar/maps?f=d&amp;source=embed&amp;saddr=Au.+Buenos+Aires+-+la+Plata&amp;daddr=N%C2%B04436+16,+Berisso,+Buenos+Aires+(Nekon+Muebles+de+jard%C3%ADn)&amp;hl=es&amp;geocode=FT7K6_0dxYOL_A%3BFdTi6_0dudqM_CEgDGiLBKy9tSmHbLkYrOWilTEgDGiLBKy9tQ&amp;mra=dme&amp;mrsp=0&amp;sz=13&amp;sll=-34.882833,-57.91975&amp;sspn=0.058439,0.109692&amp;ie=UTF8&amp;t=m&amp;ll=-34.882833,-57.919579&amp;spn=0.070409,0.32959&amp;z=12&amp;output=embed"></iframe><a href="https://maps.google.com.ar/maps?f=d&amp;source=embed&amp;saddr=Au.+Buenos+Aires+-+la+Plata&amp;daddr=N%C2%B04436+16,+Berisso,+Buenos+Aires+(Nekon+Muebles+de+jard%C3%ADn)&amp;hl=es&amp;geocode=FT7K6_0dxYOL_A%3BFdTi6_0dudqM_CEgDGiLBKy9tSmHbLkYrOWilTEgDGiLBKy9tQ&amp;mra=dme&amp;mrsp=0&amp;sz=13&amp;sll=-34.882833,-57.91975&amp;sspn=0.058439,0.109692&amp;ie=UTF8&amp;t=m&amp;ll=-34.882833,-57.919579&amp;spn=0.070409,0.32959&amp;z=12" class="flecha">Ver mapa más grande</a>
  </div>
  <div class="clear"></div>
</div>

<?php
	require_once('footer.php');
?>
