<?php
       
    if(isset($_POST['inBenchC'])){

        include_once("../clases.php");

        $codQfdB = $_POST["codQfdBenchC"];
        $codQueB = $_POST["codQueBenchC"];        
        $codCompetenciaB = $_POST["codClienteBenchC"];  
        $evaluacionB = $_POST["evaluacionBenchC"];
       
        
        $benchmarking = new BENCHMARKINGC();
        $benchmarking->insercion_BENCHC($codQfdB,$codQueB,$codCompetenciaB,$evaluacionB);

    }elseif(isset($_POST['delBenchC'])){

        include_once("../clases.php");

        $codBen = $_POST["codBenchC"];    
        
        $benchmarking = new BENCHMARKINGC();
        
        $benchmarking->eliminacion_BENCHC($codBen);  

    }elseif(isset($_POST['upBenchC'])){

        include_once("../clases.php");

        $codBen = $_POST["codBenchC"];  
        $codQfdB = $_POST["codQfdBenchC"];
        $codQueB = $_POST["codQueBenchC"];        
        $codCompetenciaB = $_POST["codClienteBenchC"];  
        $evaluacionB = $_POST["evaluacionBenchC"];

        $benchmarking = new BENCHMARKINGC();
        
        $benchmarking->actualizacion_BENCHC($codBen,$codQfdB,$codQueB,$codCompetenciaB,$evaluacionB);  
        
    }
?> 