<?php

    if(isset($_POST['inAsignacion'])){

        include_once("../clases.php");

        $codQFD = $_POST["codqfd"];
        $codServ = $_POST["Cservicios"];
        $codQue = $_POST["Cques"];
        $codcomo = $_POST["Ccomos"];

        $AsignacionQue = new ASIGNACION();

        $AsignacionQue->insercion_A($codQFD,$codServ,$codQue,$codcomo);

    }elseif(isset($_POST['upAsignacion'])){

        include_once("../clases.php");

        $codA = $_POST["codAs"];
        $codQFD = $_POST["codqfd"];
        $codServ = $_POST["Cservicios"];
        $codQue = $_POST["Cques"];
        $codcomo = $_POST["Ccomos"];

        $AsignacionQue = new ASIGNACION();

        $AsignacionQue->actualizacion_A($codA,$codQFD,$codServ,$codQue,$codcomo);

    }elseif(isset($_POST['delAsignacion'])){

        include_once("../clases.php");

        $codA = $_POST["codAs"];

        $AsignacionQue = new ASIGNACION();

        $AsignacionQue->eliminacion_A($codA);

    }else{

        header('Location: ../../pages/forms/FormQFDAsignacion.php');

    }
?>