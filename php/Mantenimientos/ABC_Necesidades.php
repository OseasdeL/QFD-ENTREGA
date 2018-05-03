<?php
    
    if(isset($_POST['inN'])){

        include_once("../clases.php");
    
        $nomN = $_POST["nombreN"];
        $prioridad = $_POST["prioridad"];
        $codigoPS = $_POST["codPS"];
        $descN = $_POST["desN"];    
        
        $AErequerimientos = new Necesidades();   

        $AErequerimientos->insercion_N($nomN,$prioridad,$codigoPS,$descN); 

    }elseif(isset($_POST['upN'])){

        include_once("../clases.php");

        $codigoN = $_POST["codigoN"];
        $nomN = $_POST["nombreN"];
        $prioridad = $_POST["prioridad"];
        $codigoPS = $_POST["codPS"];
        $descN = $_POST["desN"];    
    
        $AErequerimientos = new Necesidades();  
        $AErequerimientos->actualizacion_N($codigoN,$nomN,$prioridad,$codigoPS,$descN); 

    } elseif(isset($_POST['delN'])){

        include_once("../clases.php");

        $codigoN = $_POST["codigoN"];        
        
        $AErequerimientos = new Necesidades();  

        $AErequerimientos->eliminacion_N($codigoN); 

    }else{

        header('Location: ../../pages/forms/FormNecesidades.php');

    }
?> 