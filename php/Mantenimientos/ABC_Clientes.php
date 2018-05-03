<?php

    if(isset($_POST['inC'])){

        include_once("../clases.php"); 
    
        $nomE = $_POST["nombreE"];
        $dirE = $_POST["direccionE"];
        $telE = $_POST["telefonoE"];
        $conE = $_POST["contactoE"];
        $telCE = $_POST["telefonoCE"];
        $emailE = $_POST["correoE"];
        
        $AEclientes = new Clientes();   
        $AEclientes->insercion_C($nomE,$dirE,$telE,$conE,$telCE,$emailE);

    }elseif(isset($_POST['upC'])){

        include_once("../clases.php");

        $codigoE = $_POST["codigoE"];
        $nomE = $_POST["nombreE"];
        $dirE = $_POST["direccionE"];
        $telE = $_POST["telefonoE"];
        $conE = $_POST["contactoE"];
        $telCE = $_POST["telefonoCE"];
        $emailE = $_POST["correoE"];
        
        $AEclientes = new Clientes();     
        
        $AEclientes->actualizacion_C($codigoE,$nomE,$dirE,$telE,$conE,$telCE,$emailE); 

    }elseif(isset($_POST['delC'])){

        include_once("../clases.php");

        $codigoE = $_POST["codigoE"];    
        
        $AEclientes = new Clientes();  

        $AEclientes->eliminacion_C($codigoE);

    }else{

        header('Location: ../../pages/forms/FormClientes.php');

    }
?> 