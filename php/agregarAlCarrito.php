<?php
session_start();    
//SCRIPT PARA LLEVAR UN ARREGLO CON LOS    
//ARTICULOS SELECCIONADOS POR EL USUARIO    
//PARA PEDIR PRESUPUESTO 
//Agrego en una variable de Sesion, los articulos que agregó el usuario        
if(isset($_POST))
{
    if(isset($_SESSION['carro'])){
        foreach ($_POST['carrito'] as $key => $conid){
            $conid = substr_replace($conid, '', 0, 3);
            if($_SESSION['carro'][$conid] >= 1)
            {
                $_SESSION['carro'][$conid]++;
            }
            else
            {
                $_SESSION['carro'][$conid] = 1;
            }
        }
    }else{        
        echo "No hay session";
    }
}
else
{
    echo "NO HAY CARRITO";
}


?>