<?php
require_once('../php/config.php'); 
        require_once ('seguridad.php'); //Controla que sea administrador..
	require_once('../html/headAdmin.php');
        $currentPage = 6 //indica que esta en la pagina 6, ordenar mueble

 ?>
<?php
	require_once('../html/headerAdmin.php'); 
?>
<div id="container">

<?php
	require_once ('../html/menuAdmin.php');
        require_once ('../php/funciones.php');
        
if ($_POST) 
{  
    $i=1;  
    foreach ($_POST['order'] as $order_id) {    
        ordenarMuebles($i, mysql_real_escape_string($order_id));
        $i++;  

    }
}
?>
<script type="text/javascript">

    
   $(function(){  
       $('.sortable').sortable({
			update: function( event, ui ) {
			$(this).parent().submit();
		  }
		});
          });
</script>
<div>
    <?php
        $secciones = obtenerSecciones();
        
        switch ($secciones)
        {
            case -1: echo "Hubo un error en el sistema.";
                break;
            case 0: echo "No existen muebles.";
                break;
            default :
                while($sec = mysql_fetch_array($secciones))
                {
                ?>
    <h2><?php echo $sec['nombreSeccion'] ?></h2>
    <form class="target" action="<?php echo PATH_ADMIN ?>ordenarMuebles.php" method="post" target="prueba">
        <ul class="sortable">
        <?php
            $muebles = obtenerMueblesPorSeccion($sec['idSeccion']);
            
            switch ($muebles)
            {
                case -1: 
				?>
					<span class="observacion">Hubo un error en el sistema.</span>
				<?php
                    break;
                case 0: 
				?>
					<span class="observacion">No hay muebles en el sistema.</span>
				<?php
                    break;
                default :
                    while($row = mysql_fetch_array($muebles))
                {
                    ?>
        <li><span><?php echo $row['nombreMueble']?></span><input type="hidden" name="order[]" value="<?php echo $row['idMueble'] ?>" /></li>
        
                    <?php
                }
                    break;
            }
        ?>
        </ul>
    </form>
                <?php
                }
                break;
        }
    ?>
<iframe id="prueba" name="prueba" style="display: none">
</div>