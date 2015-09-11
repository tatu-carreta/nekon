<?php
/*
  funcion conectar
 */

$localhost = true;
if ($localhost) {

    function conectar() {
        $conexion = mysql_connect('localhost', 'root', '') or die(mysql_error());
        mysql_set_charset('utf8');
        mysql_select_db('nekon', $conexion) or die(mysql_error());
        return $conexion;
    }

} else {

    function conectar() {
        $conexion = mysql_connect('localhost', 'chubur01', 'Nekonm01') or die(mysql_error());
        mysql_set_charset('utf8');
        mysql_select_db('chubur01_nekon_db_access', $conexion) or die(mysql_error());
        return $conexion;
    }

}

///////////////////////////////////////SQL///////////////////////////////////



/*
  trae el contenido de una tabla con o sin filtro
  la variable filtro debe incluir JOIN, WHERE, ORDER BY, etc..
  si el filtro no esta seteado y no estan seteados los campos trae todo
  html es la estructura html en la que se desea imprimir, si es null no se imprime nada
 */
function selectFromTable($tabla, $campos = "*", $filtros = "", $html = "") {
    $conexion = conectar();
    if (!(isset($campos)) or $campos == '') {
        $campos = "*";
    }
    $query = "SELECT " . $campos . " FROM " . $tabla;
    if ($filtros != "") {// si esta seteado algun filtro u orden lo agrega a la consulta
        $query .= " " . $filtros;
    }
    $result = mysql_query($query, $conexion);
    if (!$result) {
        echo 'no se realizo la consulta';
    }
    echo $html;

    if ($html != "") {// si esta seteada alguna estructura html la imprime
        imprimir($result, $html);
    }

    if (isset($_GET['debug'])) {
        echo $query;
    }
    return $result;
}

////////////////////////////////////////////////////////////////////////////////////////////////


/*
  imprime producto en html
 */
function imprimir($result, $html) {

    while ($row = mysql_fetch_assoc($result)) {
        echo $html; //html contiene la estructura html en la que se deben insertar los resultados
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////


/*
  Dar de alta en la tabla



  devuelve boolean si la consulta se realizo o no

  el arreglo de datos debe llegar con los datos en el mismo orden que deben ser insertados en la tabla
  el arreglo atributos son los campos de la tabla, tiene que tener el mismo orden que datos
  tabla es la tabla donde se insertan los datos
 */
function alta($datos = array(), $tabla, $atributos = array()) {
    $conexion = conectar();
    $query = "INSERT INTO " . $tabla . " (";
    $i = count($atributos) - 1;
    for ($j = 0; $j <= $i; $j++) {
        if ($j == $i) {
            $query .= " " . $atributos[$j] . " ";
        } else {
            $query .= " " . $atributos[$j] . " , ";
        }
    }
    $query .= ") VALUES (";

    $i = count($datos) - 1;
    for ($j = 0; $j <= $i; $j++) {
        if ($j == $i) {
            $query .= " '" . $datos[$j] . "' ";
        } else {
            $query .= " '" . $datos[$j] . "' , ";
        }
    }

    $query .= " )";


    $result = mysql_query($query, $conexion);

    return ($result);
}

////////////////////////////////////////////////////////////////////////////////////////////////


/*
  elimina de la tabla segun el id
  devuelve true or false segun si se llevo a cabo o no la consulta
 */
function eliminarDeterminado($id, $tabla) {
    $conexion = conectar();
    $query = " DELETE FROM " . $tabla . " WHERE id='" . $id . "'";
    $result = mysql_query($query, $conexion);
    return ($result);
}

////////////////////////////////////////////////////////////////////////////////////////////////

/*
  inicia sesion para el administrador
 */
function iniciar_sesion() {
    /*
      en algun futuro
     */
}

////////////////////////////////////////////////////////////////////////////////////////////////

/*
  cierra sesion para el administrador


 */
function cerrar_sesion() {
    session_start();
    session_unset();
    session_destroy();
    ?>
    <script type="text/javascript">
        alert("Se ha cerrado la sesión");
        window.location.href = <?php echo REDIRECT_PATH ?>;
    </script>
    <?php
}

////////////////////////////////////////////////////////////////////////////////////////////////

/*
  crea un formulario de alta o de modificacion
 */
function crearFormulario($campos = array(), $modificacion = false, $method = "GET", $action = "form.php") {
    echo '<form method="' . $method . '" action="' . $action . '" >';
    foreach ($campos as $a) {
        switch ($a['type']) {
            case "select": //si el input es de tipo select debe imprimir las opciones
                echo '<select id="' . $a['name'] . '">';
                foreach ($a['select'] as $options) {
                    echo '<option value="' . $option['value'] . '">' . $options['option'] . '</option>';
                }
                echo '</select>';
                break;

            case "textarea":
                echo '<textarea rows="4" cols="50">';
                break;

            default:
                echo '<label for="' . $a['name'] . '" >' . $a['name'] . '</form>';
                echo '<input type="' . $a['type'] . '" name="' . $a['name'] . '" id="' . $a['name'] . '" />';
        }
    }
    echo '</form>';
}

////////////////////////////////////////////////////////////////////////////////////////////////

/*
 * obtiene un arreglo con todos los articulos de la BD
 */

function obtenerArticulos() {
    $conexion = conectar();

    $sql = "SELECT * 
                    FROM articulos as a 
                    INNER JOIN muebles as m ON (m.idMueble = a.idMueble)";
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        if (mysql_num_rows($res) == 0) {
            return 0;
        } else {
            return $res;
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////

function obtenerArticulosPorMueble($idMueble) {
    $conexion = conectar();
    $sql = "SELECT * 
                    FROM articulos as a 
                    INNER JOIN muebles as m ON (m.idMueble = a.idMueble)
                    WHERE a.idMueble = " . $idMueble;
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        if (mysql_num_rows($res) == 0) {
            return 0;
        } else {
            return $res;
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////

function obtenerArticuloPorId($idArticulo) {
    $conexion = conectar();
    $sql = "SELECT *
                    FROM articulos
                    WHERE idArticulo = " . $idArticulo;
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        return mysql_fetch_array($res);
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////

function obtenerMueblesPorSeccion($idSeccion) {
    $conexion = conectar();
    $sql = "SELECT * 
                    FROM muebles as m 
                    INNER JOIN secciones as s ON (s.idSeccion = m.idSeccion)
                    WHERE m.idSeccion = " . $idSeccion . "
                    ORDER BY Orden";
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        if (mysql_num_rows($res) == 0) {
            return 0;
        } else {
            return $res;
        }
    }
}

function obtenerMueblePorId($idMueble) {
    $conexion = conectar();
    $sql = "SELECT * 
                    FROM muebles
                    WHERE idMueble = " . $idMueble;
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        if (mysql_num_rows($res) == 0) {
            return 0;
        } else {
            $row = mysql_fetch_array($res);
            return $row;
        }
    }
}

function obtenerSecciones() {
    $conexion = conectar();
    $sql = "SELECT *
                    FROM secciones";
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        if (mysql_num_rows($res) == 0) {
            return 0;
        } else {
            return $res;
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////

function obtenerImagenesPorMueble($idMueble) {
    $conexion = conectar();
    $sql = "SELECT *
                    FROM imagenes
                    WHERE idMueble = " . $idMueble . "
                    ORDER BY Grupo DESC";
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        if (mysql_num_rows($res) == 0) {
            return 0;
        } else {
            return $res;
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////

function obtenerImagenesChicasPorMueble($idMueble) {
    $conexion = conectar();
    $sql = "SELECT *
                    FROM imagenes
                    WHERE idMueble = " . $idMueble . "
                    AND Tipo = 'C'";
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        if (mysql_num_rows($res) == 0) {
            return 0;
        } else {
            return $res;
        }
    }
}

function obtenerUltimaImagenChicaPorMueble($idMueble)
{
    $conexion = conectar();
    $sql = "SELECT *
                    FROM imagenes
                    WHERE idMueble = " . $idMueble . "
                    AND Tipo = 'C'
                    LIMIT 1";
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        $row = mysql_fetch_array($res);
        return $row;
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////

function obtenerImagenGrandePorGrupo($grupo) {
    $conexion = conectar();
    $sql = "SELECT *
                    FROM imagenes
                    WHERE Grupo = " . $grupo . "
                    AND Tipo = 'G'";
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        if (mysql_num_rows($res) == 0) {
            return 0;
        } else {
            $row = mysql_fetch_array($res);
            return $row;
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////

function obtenerImagenesPorGrupo($grupo) {
    $conexion = conectar();
    $sql = "SELECT *
                    FROM imagenes
                    WHERE Grupo = " . $grupo;
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        if (mysql_num_rows($res) == 0) {
            return 0;
        } else {
            return $res;
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////

function obtenerGrupoParaUltimasImagenes() {
    $conexion = conectar();
    $sql = "SELECT MAX(Grupo) as Grupo
                    FROM imagenes";
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        $row = mysql_fetch_array($res);
        return $row;
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////

function obtenerImagenCarritoPorIdMueble($idMueble) {
    $conexion = conectar();
    $sql = "SELECT * 
                    FROM imagenes
                    WHERE Tipo = 'M' AND idMueble = " . $idMueble;
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        if (mysql_num_rows($res) == 0) {
            return -1;
        } else {
            $row = mysql_fetch_array($res);
            return $row;
        }
    }
}

function obtenerArticuloParaCarritoPorId($idArticulo) {
    $conexion = conectar();
    $sql = "SELECT * 
                    FROM articulos
                    INNER JOIN muebles ON ( muebles.idMueble = articulos.idMueble ) 
                    WHERE articulos.idArticulo = " . $idArticulo;
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        if (mysql_num_rows($res) == 0) {
            return 0;
        } else {
            $row = mysql_fetch_array($res);
            return $row;
        }
    }
}

function obtenerImagenCarritoParaArticulo($idMueble) {
    $conexion = conectar();
    $sql = "SELECT * 
                    FROM imagenes
                    INNER JOIN muebles ON ( muebles.idMueble = imagenes.idMueble ) 
                    WHERE imagenes.Tipo =  'M'
                    AND imagenes.idMueble = " . $idMueble;
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        if (mysql_num_rows($res) == 0) {
            return 0;
        } else {
            $row = mysql_fetch_array($res);
            return $row;
        }
    }
}

function obtenerUltimoOrdenPorIdSeccion($idSeccion) {
    $conexion = conectar();
    $sql = "SELECT MAX(Orden) as Orden
                    FROM muebles
                    WHERE idSeccion = " . $idSeccion;
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        $row = mysql_fetch_array($res);
        return $row;
    }
}

function obtenerInfoMueblePorId($idMueble) {
    $conexion = conectar();
    $sql = "SELECT *
                    FROM muebles
                    WHERE idMueble = " . $idMueble;
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        if (mysql_num_rows($res) == 0) {
            return 0;
        } else {
            $row = mysql_fetch_array($res);
            return $row;
        }
    }
}

function obtenerEntregaPorId($idEntrega) {
    $conexion = conectar();
    $sql = "SELECT *
                    FROM zonas_envios
                    WHERE idZona = " . $idEntrega;
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        if (mysql_num_rows($res) == 0) {
            return 0;
        } else {
            $row = mysql_fetch_array($res);
            return $row;
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////

function realizarAltaImagenes($idMueble, $nameImageChica, $nameImageGrande, $grupo, $epigrafe) {
    $stChica = realizarAltaImagenChica($idMueble, $nameImageChica, $grupo);
    $stGrande = realizarAltaImagenGrande($idMueble, $nameImageGrande, $grupo, $epigrafe);

    if ($stChica && $stGrande) {
        return 1;
    } else {
        return -1;
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////

function realizarAltaImagenGrande($idMueble, $nameImageGrande, $grupo, $epigrafe) {
    $conexion = conectar();
    $sql = "INSERT INTO imagenes (idMueble, Tipo, nombreImagen, Grupo, Epigrafe) VALUES('" . $idMueble . "','G','" . $nameImageGrande . "','" . $grupo . "','" . $epigrafe . "')";
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return false;
    } else {
        return true;
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////

function realizarAltaImagenChica($idMueble, $nameImageChica, $grupo) {
    $conexion = conectar();
    $sql = "INSERT INTO imagenes (idMueble, Tipo, nombreImagen, Grupo) VALUES('" . $idMueble . "','C','" . $nameImageChica . "','" . $grupo . "')";
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return false;
    } else {
        return true;
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////

function realizarAltaImagenCarrito($idMueble, $nameImageCarrito) {
    $conexion = conectar();
    $sql = "INSERT INTO imagenes (idMueble, Tipo, nombreImagen) VALUES('" . $idMueble . "','M','" . $nameImageCarrito . "')";
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        return 1;
    }
}

function realizarAltaCliente($nombreApellido, $mail, $tel, $dir, $coments) {
    $conexion = conectar();
    $sql = "INSERT INTO clientes (nombreApellido, Comentarios, Telefono, Email, Direccion) 
                    VALUES('" . $nombreApellido . "','" . $coments . "','" . $tel . "','" . $mail . "','" . $dir . "')";
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        $id = mysql_insert_id();
        return $id;
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////

function obtenerEpigrafeFoto($idImagen) {
    $conexion = conectar();
    $sql = "SELECT Epigrafe
                    FROM imagenes
                    WHERE idImagen = " . $idImagen;
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        $row = mysql_fetch_array($res);
        return $row;
    }
}

function obtenerZonasEnvio() {
    $conexion = conectar();
    $sql = "SELECT *
                    FROM zonas_envios";
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        if (mysql_num_rows($res) == 0) {
            return 0;
        } else {
            return $res;
        }
    }
}

function obtenerZonasEnvioPorId($idZona) {
    $conexion = conectar();
    $sql = "SELECT *
                    FROM zonas_envios
                    WHERE idZona = " . $idZona;
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        if (mysql_num_rows($res) == 0) {
            return 0;
        } else {
            return $res;
        }
    }
}

function obtenerSeccionPorId($idSeccion) {
    $conexion = conectar();
    $sql = "SELECT *
                    FROM secciones
                    WHERE idSeccion = " . $idSeccion;
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        if (mysql_num_rows($res) == 0) {
            return 0;
        } else {
            $row = mysql_fetch_array($res);
            return $row;
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////

function realizarAltaArticulo($idMueble, $codigo, $medidas, $precio, $descripcion, $stock) {
    $conexion = conectar();
    $sql = "INSERT INTO articulos (Medidas, Descripcion, Precio, Stock, Codigo, idMueble) VALUES('" . $medidas . "','" . $descripcion . "','" . $precio . "','" . $stock . "','" . $codigo . "','" . $idMueble . "')";
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        return 1;
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////

function realizarModificacionArticulo($idArticulo, $codigo, $medidas, $precio, $descripcion, $stock) {
    $conexion = conectar();
    $sql = "UPDATE articulos SET Medidas = '" . $medidas . "', Descripcion = '" . $descripcion . "', Precio = '" . $precio . "', Stock = '" . $stock . "', Codigo = '" . $codigo . "' WHERE idArticulo = " . $idArticulo;
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        return 1;
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////

function realizarModificacionFoto($idFoto, $epigrafe) {
    $conexion = conectar();
    $sql = "UPDATE imagenes SET Epigrafe = '" . $epigrafe . "' WHERE idImagen = " . $idFoto;
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        return 1;
    }
}

function realizarBajaImagenes($grupo) {
    $conexion = conectar();
    $sql = "DELETE FROM imagenes WHERE Grupo = " . $grupo;
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        return 1;
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////

function realizarBajaImagenCarrito($idImagen) {
    $conexion = conectar();
    $sql = "DELETE FROM imagenes WHERE idImagen = " . $idImagen;
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        return 1;
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////

function realizarBajaArticulo($idArticulo) {
    $conexion = conectar();
    if (isset($_GET['debug'])) {
        echo "idArticulo= " . $idArticulo;
    }
    $sql = "DELETE FROM articulos WHERE idArticulo = " . $idArticulo;
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        return 1;
    }
}

function realizarModificacionZonasEnvio($idZona, $nombreZona, $presupuestoTope, $costo) {
    $conexion = conectar();
    $sql = "UPDATE zonas_envios SET nombreZona = '" . $nombreZona . "', presupuestoTope = '" . $presupuestoTope . "', Costo = " . $costo . " WHERE idZona = " . $idZona;
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        return 1;
    }
}

////////////////////////////////////////////////////////////////////////

function obtenerUsuario($us, $cl) {
    $conexion = conectar();
    $sql = "SELECT *
                    FROM usuarios
                    WHERE NombreUsuario = '" . encriptado($us) . "' 
                    AND Clave = '" . encriptado($cl) . "'";
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return " ";
    } else {
        if (mysql_num_rows($res) == 0) {
            return "  ";
        } else {
            return 9;
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////

function encriptado($texto) {
    return str_pad($texto, 30, "uyqwnp9231902ohzsxcb_:;_PQWBD)!", STR_PAD_BOTH);
}

////////////////////////////////////////////////////////////////////////////////////////////////

function realizarBajaMueble($idMueble) {
    $conexion = conectar();

    $bajaImagenes = realizarBajaImagenesPorMueble($idMueble);
    if ($bajaImagenes == 1) {
        $bajaArticulos = realizarBajaArticuloPorMueble($idMueble);
        if ($bajaArticulos == 1) {
            $sql = "DELETE FROM muebles WHERE idMueble = " . $idMueble;
            $res = mysql_query($sql, $conexion);

            if (!$res) {
                return -1;
            } else {
                return 1;
            }
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////

function realizarBajaImagenesPorMueble($idMueble) {
    $conexion = conectar();
    $sql = "DELETE FROM imagenes WHERE idMueble = " . $idMueble;
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        return 1;
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////

function realizarBajaArticuloPorMueble($idMueble) {
    $conexion = conectar();
    $sql = "DELETE FROM articulos WHERE idMueble = " . $idMueble;
    $res = mysql_query($sql, $conexion);

    if (!$res) {
        return -1;
    } else {
        return 1;
    }
}

function ordenarMuebles($orden, $idMueble) {
    $conexion = conectar();
    $sql = "UPDATE muebles SET Orden = " . $orden . "
                    WHERE idMueble = " . $idMueble;
    $res = mysql_query($sql, $conexion);
}
?>