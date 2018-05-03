<?php
       
    if(isset($_POST['inBenchComp'])){

        include_once("../clases.php");

        $codQfdB = $_POST["codQfdBench"];
        $codQueB = $_POST["codQueBench"];        
        $codCompetenciaB = $_POST["codCompBench"];  
        $evaluacionB = $_POST["evaluacionBench"];
        
        $benchmarking = new BENCHMARKING();
        $benchmarking->insercion_BENCH($codQfdB,$codQueB,$codCompetenciaB,$evaluacionB);

    }elseif(isset($_POST['upBenchComp'])){

        include_once("../clases.php");

        $codBenchComp = $_POST["codBenchC"];
        $codQfdB = $_POST["codQfdBench"];
        $codQueB = $_POST["codQueBench"];        
        $codCompetenciaB = $_POST["codCompBench"];  
        $evaluacionB = $_POST["evaluacionBench"];

        $benchmarking = new BENCHMARKING();
        $benchmarking->actualizacion_BENCH($codBenchComp,$codQfdB,$codQueB,$codCompetenciaB,$evaluacionB);

    }elseif(isset($_POST['delBenchComp'])){

        include_once("../clases.php");

        $codBenchComp = $_POST["codBenchC"];

        $benchmarking = new BENCHMARKING();
        $benchmarking->eliminacion_BENCH($codBenchComp);

    }else{

        header('Location: ../../pages/forms/FormQFDBenchmarking.php');

    }
?> 