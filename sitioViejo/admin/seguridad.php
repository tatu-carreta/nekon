<?php
    //Script que se encarga de mantener la sesión del administrador.

    if(isset($_SESSION['Usuario']))
    {
        if($_SESSION['Usuario'] != "checked")
        {
            header("Location:index.php");
        }
    }
    else
    {
        header("Location:index.php");
    }
?>
