<?php

    if(isset($_POST['inUsers'])){

        require_once('../conexion.php');
        include_once("../clases.php");

        $conectar = conectar();

        $nombres = $_POST["nombre"];
        $apellidos = $_POST["apellido"];
        $nickname = $_POST["nickname"];
        $telefono = $_POST["telefono"];
        $celular = $_POST["celular"];
        $ocupacion = $_POST["ocupacion"];
        $email = $_POST["email"];
        $contra = $_POST["contra"];
        $contraR = $_POST["contraR"];

        if($contra === $contraR){

           if($conectar){

                $selectQuery = "SELECT nickname FROM usuarios WHERE nickname = '".$nickname."'";

                $cantRegistros = $conectar->query($selectQuery);
                $cantidad = $cantRegistros->num_rows;

                if($cantidad > 0){

                    header('Location: ../../registro.php');

                }else{
                    
                    $usuarios = new USUARIOS();
                    $usuarios->insercion_USUARIOS($nombres,$apellidos,$nickname,$telefono,$celular,$ocupacion,$email,$contra);
                    
                }

           }else{

                header('Location: ../../registro.php');

           }

        }else{

            header('Location: ../../registro.php');

        }

    }else{

        header('Location: ../../registro.php');

    }

?>
