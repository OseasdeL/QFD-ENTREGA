<?php

    if(isset($_POST['inEval'])){
        
        include_once("../clases.php");

        $idQFD= $_POST["codQfdEvaluacion"];
        $detalleComos = $_POST["codComoEval"];
        $puntajeEvaluacion = $_POST["evalComo"];
        
        $evaluacion = new EV_INGENIERIA();
        $evaluacion->insercion_EVINGENIERIA($idQFD,$detalleComos,$puntajeEvaluacion); 

    }elseif(isset($_POST['upEval'])){

        include_once("../clases.php");
    
        $codEval = $_POST["codEval"];
        $idQFD = $_POST["codQfdEvaluacion"];
        $detalleComos = $_POST["codComoEval"];
        $puntajeEvaluacion = $_POST["evalComo"];
        
        $evaluacion = new EV_INGENIERIA();
        $evaluacion->actualizacion_EVINGENIERIA($codEval,$idQFD,$detalleComos,$puntajeEvaluacion);  

    }elseif(isset($_POST['delEval'])){

        include_once("../clases.php");

        $codEval = $_POST["codEval"];   
        
        $evaluacion = new EV_INGENIERIA();

        $evaluacion->eliminacion_EVINGENIERIA($codEval);  

    }else{

        header('Location: ../../pages/forms/FormQFDEvaluacionI.php');

    }
?> 