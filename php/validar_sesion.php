<?php 
    
    session_start();

    if(isset($_POST['login'])){

        if((!empty($_POST['username'])) && (!empty($_POST['username']))){

            require_once('conexion.php');

            $nombre = $_POST['username'];
            $password = $_POST['password']; 
            
            $conectar = conectar();

            if($conectar){                

                $selectQuery = "SELECT nickname, pass FROM usuarios WHERE nickname = '".$nombre."'";  
                
                $resultadoSelectA = mysqli_query($conectar,$selectQuery); 
                $detalleRegistros = mysqli_fetch_array($resultadoSelectA);
                $nombreBD = $detalleRegistros["nickname"];
                $passwordBD = $detalleRegistros["pass"];

                $cantRegistros = $conectar->query($selectQuery);
                $cantidad = $cantRegistros->num_rows;

                if(($cantidad > 0) && (password_verify($password,$passwordBD) == TRUE)){

                    $_SESSION['usuario'] = $nombre;
                    $_SESSION['pass'] = $password; 
                    header('Location: ../menu.php');

                }else{

                    header('Location: ../index.php');

                }

            }else{

                echo "No hay conexion";

            }
            
        }else{

            header('Location: ../index.php');

        } 

    }else{

        header('Location: ../index.php');

    }
?>

 