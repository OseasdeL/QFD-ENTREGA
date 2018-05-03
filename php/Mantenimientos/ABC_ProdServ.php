<?php

    if(isset($_POST['inPS'])){

        include_once("../clases.php");
    
        $nomP = $_POST["nombreP"];
        $clienteP = $_POST["clienteP"];
        $precioP = $_POST["precioP"];
        $desP = $_POST["desP"];    
        
        $AEproductos = new Productos();       
    
        $AEproductos->insercion_PS($nomP,$precioP,$desP,$clienteP);

    }elseif(isset($_POST['upPS'])){

        include_once("../clases.php");

        $codigoP = $_POST["codigoPS"];
        $nomP = $_POST["nombreP"];
        $clienteP = $_POST["clienteP"];
        $precioP = $_POST["precioP"];
        $desP = $_POST["desP"];    
        
        $AEproductos = new Productos();

        $AEproductos->actualizacion_PS($codigoP,$nomP,$precioP,$desP,$clienteP);

    }elseif(isset($_POST['delPS'])){

        include_once("../clases.php");

        $codigoP = $_POST["codigoPS"];       
        
        $AEproductos = new Productos(); 

        $AEproductos->eliminacion_PS($codigoP);

    }else{

        header('Location: ../../pages/forms/FormProdServ.php');

    }
?> 