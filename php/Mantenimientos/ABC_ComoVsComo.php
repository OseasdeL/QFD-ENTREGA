<?php

    if(isset($_POST['inCvsC'])){

        include_once("../clases.php");

        $codQFDCC = $_POST["codQFDCC"];
        $codComoACC = $_POST["codComoA"];
        $codComoBCC = $_POST["codComoB"];
        $evaluacionCC = $_POST["evaluacionCC"];

        $comovscomo = new COMOVSCOMO();

        $comovscomo->insercion_CVC($codQFDCC,$codComoACC,$codComoBCC,$evaluacionCC);

    }elseif(isset($_POST['upCvsC'])){

        include_once("../clases.php");

        $codCvsC = $_POST["codCC"];
        $codQFDCC = $_POST["codQFDCC"];
        $codComoACC = $_POST["codComoA"];
        $codComoBCC = $_POST["codComoB"];
        $evaluacionCC = $_POST["evaluacionCC"];

        $comovscomo = new COMOVSCOMO();

        $comovscomo->actualizacion_CVC($codCvsC,$codQFDCC,$codComoACC,$codComoBCC,$evaluacionCC);

    }elseif(isset($_POST['delCvsC'])){

        include_once("../clases.php");

        $codCvsC = $_POST["codCC"];

        $comovscomo = new COMOVSCOMO();

        $comovscomo->eliminacion_CVC($codCvsC);

    }else{

        header('Location: ../../pages/forms/FormQFDCvC.php');

    }
?>