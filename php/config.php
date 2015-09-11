<?php
/*
@Ian
ian.neiman@gmail.com
*/
session_start(); //comentar esta linea si no se trabaja con sesiones
if(!isset($_SESSION['carro']))
{
    $_SESSION['carro'] = array(); //variable de session que lleva los artículos del carrito.           
}
$localhost = true; //define si se esta trabajando a modo local o no
$proyecto = "Nekon";
define("URL_PRODUCCION", "http://www.nekonmuebles.com.ar/");
define("URL_LOCAL", "http://localhost/nekon/");

//Credenciales MP
define("CLIENT_ID","8290593425858947");
define("CLIENT_SECRET","f3LnUBQA9aSktM48MlDEZoC59mKwSI8f");

if (!$localhost)
{
	define("REDIRECT_PATH" , URL_PRODUCCION); //URL absoluta a donde redirige luego de iniciar o cerrar sesion
	define("PATH_HOME", URL_PRODUCCION);
	define("PATH_CSS", URL_PRODUCCION."css/");
	define("PATH_PHP", URL_PRODUCCION."php/");
	define("PATH_HTML", URL_PRODUCCION."html/");
	define("PATH_JS", URL_PRODUCCION."js/");
	define("PATH_ADMIN", URL_PRODUCCION."admin/");
	define("PATH_IMAGES", URL_PRODUCCION."images/");
        define("PATH_IMAGES_MENU", URL_PRODUCCION."images/menu/");
        define("PATH_IMAGES_MINI", URL_PRODUCCION."images/miniaturas/");
        define("PATH_IMAGES_CHICA", URL_PRODUCCION."images/chica/");
        define("PATH_IMAGES_CARRITO", URL_PRODUCCION."images/carrito/");
        define("PATH_IMAGES_AMPLIACION", URL_PRODUCCION."images/ampliacion/");
        define("PATH_IMAGES_FABRICA", URL_PRODUCCION."images/fabrica/");
        define("PATH_IMAGES_TARJETAS", URL_PRODUCCION."images/tarjetas/");
}
else
{
	define("REDIRECT_PATH" , URL_LOCAL); //URL absoluta a donde redirige luego de iniciar o cerrar sesion
	define("PATH_HOME", URL_LOCAL);
	define("PATH_CSS", URL_LOCAL."css/");
	define("PATH_PHP", URL_LOCAL."php/");
	define("PATH_HTML", URL_LOCAL."html/");
	define("PATH_JS", URL_LOCAL."js/");
	define("PATH_ADMIN", URL_LOCAL."admin/");
	define("PATH_IMAGES", URL_LOCAL."images/");
        define("PATH_IMAGES_MENU", URL_LOCAL."images/menu/");
        define("PATH_IMAGES_MINI", URL_LOCAL."images/miniaturas/");
        define("PATH_IMAGES_CHICA", URL_LOCAL."images/chica/");
        define("PATH_IMAGES_CARRITO", URL_LOCAL."images/carrito/");
        define("PATH_IMAGES_AMPLIACION", URL_LOCAL."images/ampliacion/");
        define("PATH_IMAGES_FABRICA", URL_LOCAL."images/fabrica/");
        define("PATH_IMAGES_TARJETAS", URL_LOCAL."images/tarjetas/");
}

define("PAGO_ADELANTADO", "10"); //el porcentaje de la seña
$aDb = array(
				'secciones' => array(
											"idSeccion" => "INT (11)",
											"nombreSeccion" => "VARCHAR(200)"
											
				),
				
				'muebles' => array(
											"idMueble" => "INT (11)",
											"nombreMueble" => "VARCHAR(200)",
											"idSeccion" => "INT (11)"
											
				),
				'articulos' => array(
											"idArticulo" => "INT (11)",
											"idMueble" => "INT (11)",
											"Medidas" => "VARCHAR(200)",
											"Descripcion" => "VARCHAR(200)",
											"Precio" => "REAL",
											"Stock" => "CHAR(1)",
											"Codigo" => "VARCHAR(6)",
											
				),
				'imagenes' => array(
											"idImagen" => "INT (11)",
											"idMueble" => "INT (11)",
											"Tipo" => "CHAR(1)",
											"Epigrafe" => "VARCHAR(200)",
											"nombreImagen" => "VARCHAR(200)"
											
											
				),
				'zonas_envios' => array(
											"idZona" => "INT (11)",
											"nombreZona" => "VARCHAR(200)",
											"Costo" => "REAL"
											
				),
				'usuarios' => array(
											"idUsuario" => "INT (11)",
											"NombreUsuario" => "VARCHAR(200)",
											"Clave" => "VARCHAR(200)"
											
				)

);

$aConfig = array(
					
				//CONFIG BASE DE DATOS
				'usuario_db' => 'root',
				'clave_usuario_db' => '',
				'db_seleccionada' => 'nekon',
				
				//CONFIG FORMULARIOS
				'campos_form' => array(
									"nombre" => "text",
									"imagen" => "file"
									
									
				),
				'secciones' => array(
									"Mesas" => 1,
									"Sillas" => 2,
									"Sillones" => 3,
									"Bancos" => 4,
									"Reposeras" => 5,
									"Varios" => 6
				),
				'zonas_envios' => array( 
									"1" => array(0,0), //el primer campo es el costo el segundo es el tope
									"2" => array(200,5000),
									"3" => array(400,9000),
									"4" => array(0,0),
									"5" => array(200,5000)
				)
				
);

require_once 'textos.php';


?>