<?php

    if(isset($_POST['inComp'])){

        include_once("../clases.php"); 

        $codCliente = $_POST["codCliente"];
        $nCompetencia = $_POST["nCompetencia"];
       
        $AEcompetencia = new Competencias();   
        $AEcompetencia->insercion_Comp($codCliente,$nCompetencia);

    }elseif(isset($_POST['delComp'])){

        include_once("../clases.php"); 

        $codCompetencia = $_POST["cCompetencia"];
               
        $AEcompetencia = new Competencias();   
        $AEcompetencia->eliminacion_Comp($codCompetencia);

    }elseif(isset($_POST['upComp'])){

        include_once("../clases.php"); 

        $codCompetencia = $_POST["cCompetencia"];
        $codCliente = $_POST["codCliente"];
        $nCompetencia = $_POST["nCompetencia"];
       
        $AEcompetencia = new Competencias();   
        $AEcompetencia->actualizacion_Comp($codCompetencia,$codCliente,$nCompetencia);

    }else{

        header('Location: ../../pages/forms/FormCompetencias.php');

    }

?>