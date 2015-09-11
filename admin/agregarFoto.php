<?php

    require_once '../php/config.php';
    require_once ('seguridad.php'); //Controla que sea administrador..
    require_once '../php/funciones.php';
    conectar();

    if(isset($_POST))
    {
        if(isset($_POST['idMueble']))
        {
            $idMueble = $_POST['idMueble'];
        }
        
        $grupo = obtenerGrupoParaUltimasImagenes();
        
        if(is_null($grupo['Grupo']))
        {
            $grp = 1;
        }
        else
        {
            $grp = $grupo['Grupo'];
            $grp += 1;
        }
        
        $epigrafe = $_POST['epigrafe'];
        
        $ok = true;
        if((!isset($_FILES['fotoChica']))&&(!isset($_FILES['fotoGrande'])))
        {
            $ok = false;
        }
        
        if($ok)
        {
            if(isset($_FILES['fotoChica']))
            {
                if (basename( $_FILES['fotoChica']['name'])==""){

                        if(basename($_FILES['fotoGrande']['name']) != "")
                        {
                            $nameImageChica = basename($_FILES['fotoGrande']['name']);
                            $dirChica = '../images/chica/'.basename( $_FILES['fotoGrande']['name']);
                            $tmp_chica = $_FILES['fotoGrande']['tmp_name'];
                        }
                        $imageChica = false;
                }else{		
                        $imageChica = true;
                        $nameImageChica = basename($_FILES['fotoChica']['name']);
                        $dirChica = '../images/chica/'.basename( $_FILES['fotoChica']['name']);		
                        $tmp_chica = $_FILES['fotoChica']['tmp_name'];
                }
            }
            else
            {
                $imageChica = false;
                $nameImageChica = basename($_FILES['fotoGrande']['name']);
                $dirChica = '../images/chica/'.basename( $_FILES['fotoGrande']['name']);
                $tmp_chica = $_FILES['fotoGrande']['tmp_name'];
            }
            copy($tmp_chica, $dirChica);
            if(isset($_FILES['fotoGrande']))
            {
                if (basename( $_FILES['fotoGrande']['name'])==""){	
                        if($imageChica)
                        {
                            $nameImageGrande = basename($_FILES['fotoChica']['name']);
                            $dirGrande = '../images/ampliacion/'.$nameImageGrande;
                            $tmp_grande = $_FILES['fotoChica']['tmp_name'];
                        }
                        $imageGrande = false;
                }else{		
                        $imageGrande = true;
                        $nameImageGrande = basename($_FILES['fotoGrande']['name']);
                        $dirGrande = '../images/ampliacion/'.basename( $_FILES['fotoGrande']['name']);	
                        $tmp_grande = $_FILES['fotoGrande']['tmp_name'];

                }    
            }
            else
            {
                $imageGrande = false;
                $nameImageGrande = basename($_FILES['fotoChica']['name']);
                $dirGrande = '../images/ampliacion/'.$nameImageGrande;
                $tmp_grande = $_FILES['fotoChica']['tmp_name'];
            }
            copy($tmp_grande, $dirGrande);

        $estadoAlta = realizarAltaImagenes($idMueble, $nameImageChica, $nameImageGrande, $grp, $epigrafe);
        
        switch ($estadoAlta)
        {
            case -1: echo "No se pudo realizar el alta correctamente.";
                break;
            case 1: echo "La imágenes se cargaron correctamente.";
                break;
        }
        }
        else
        {
            echo "Se olvidó de cargar alguna foto.";
        }
    }
    else 
    {
        echo "Error en el pasaje de parámetros.";
    }
    
?>
