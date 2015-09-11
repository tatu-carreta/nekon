<?php
	require_once('../php/config.php'); 
	/*el config es el archivo donde esta la configuracion particular de cada sitio
	todos los archivos que trabajen con sesion deben incluirlo*/
	
	////////HTML//////////////////
	require_once('../html/head.php');
?>

<body>
<header>
	<div id="nav-outer">
	</div>	
</header>

<div class="content" style="text-align:center">
<h1><img src="<?php echo PATH_IMAGES ?>nekon.png" alt="Nekon"></h1>
<form action="<?php echo PATH_ADMIN ?>iniciarSesion.php" method="post" class="formAdmin">
    <label for="user">Usuario</label>
    <input type="text" id="user" name="user">

    <label for="pass">Password</label>
    <input type="password" id="pass" name="pass" style="margin-bottom:20px !important">

    <input type="submit" value="ENTRAR" class="btnForm">
</form>

</div>
</body>
</html>