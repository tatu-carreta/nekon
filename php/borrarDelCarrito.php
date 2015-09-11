<?php
session_start();
//SCRIPT PARA QUITAR LOS ARTICULOS SELECCIONADOS    
//DEL AREA DE PRESUPUESTO    
if(isset($_SESSION['carro'])){       
   if(isset($_GET['idArt'])){
        $conid = $_GET['idArt'];    
        unset($_SESSION['carro'][$conid]) ;
   }else{
       $_SESSION['carro'] = array();
   }
}  
?>