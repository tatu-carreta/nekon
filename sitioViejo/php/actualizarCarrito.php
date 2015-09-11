<?php
session_start();    
//SCRIPT PARA LLEVAR UN ARREGLO CON LOS    
//ARTICULOS SELECCIONADOS POR EL USUARIO    
//PARA PEDIR PRESUPUESTO 
//Agrego en una variable de Sesion, los articulos que agregó el usuario        
if(isset($_GET))
{
    if(isset($_GET['idArt']))
    {
        if(isset($_GET['cant']))
        {
            if(is_numeric($_GET['cant']))
            {
                if(isset($_SESSION['carro'])){
                    $conid = $_GET['idArt'];
                    $cant = $_GET['cant'];

                    $_SESSION['carro'][$conid] = $cant;
                }
                else
                {
                    echo "No hay session";
                }
            }
        }
    }
}
?>