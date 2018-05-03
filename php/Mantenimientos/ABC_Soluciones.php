<?php

    if(isset($_POST['inS'])){

        include_once("../clases.php");
    
        $nombreSS = $_POST["nombreSS"];
        $viabilidadS = $_POST["viabilidadS"];
        $codrequerimientos = $_POST["codrequerimientos"];
        $desSol = $_POST["descSol"];    
        
        $AEsoluciones = new Soluciones();  
        
        $AEsoluciones->insercion_S($nombreSS,$viabilidadS,$codrequerimientos,$desSol);

    }elseif(isset($_POST['upS'])){

        include_once("../clases.php");

        $codigoS = $_POST["codigoS"];
        $nombreSS = $_POST["nombreSS"];
        $viabilidadS = $_POST["viabilidadS"];
        $codrequerimientos = $_POST["codrequerimientos"];
        $desSol = $_POST["descSol"];    
        
        $AEsoluciones = new Soluciones();    

        $AEsoluciones->actualizacion_S($codigoS,$nombreSS,$viabilidadS,$codrequerimientos,$desSol);

    }elseif(isset($_POST['delS'])){

        include_once("../clases.php");

        $codigoS = $_POST["codigoS"];       
        
        $AEsoluciones = new Soluciones(); 

        $AEsoluciones->eliminacion_S($codigoS);

    }else{

        header('Location: ../../pages/forms/FormSoluciones.php');

    } 
?> 