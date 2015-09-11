<?php
require_once ("../php/funciones.php");
    if($_POST)
    {
        if(isset($_POST['user']))
        {
            if(!empty($_POST['user']))
            {
                $usuario = md5(encriptado($_POST['user']));
                
                if(isset($_POST['pass']))
                {
                    if(!empty($_POST['pass']))
                    {
                        $password = md5(encriptado($_POST['pass']));
                        
                        require_once '../php/funciones.php';
                        
                        $usuarioOk = obtenerUsuario(trim($usuario),trim($password));
                        
                        echo $usuarioOk;
                        
                        switch ($usuarioOk)
                        {
                            case " ":
                                echo "Hubo un error en la base de datos.";
                                break;
                            case "  ": echo "No corresponde a un usuario administrador.";
                                break;
                            case 9 :
                                session_start();
                                $_SESSION['Usuario'] = "checked";
                                echo "okey";
                                break;
                            default :
                                echo "No corresponde a un usuario administrador.";
                                break;
                        }
                    }
                    else
                    {
                        echo "La contraseña está vacía.";
                    }
                }
                else
                {
                    echo "Error con la contraseña.";
                }
            }
            else
            {
                echo "El nombre de usuario quedó vacío.";
            }
        }
    }
    else
    {
        echo "Error con el nombre de usuario";
    }


?>