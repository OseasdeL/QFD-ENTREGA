<?php          

    if(isset($_POST['inQFD'])){

        include_once("../clases.php");

        $fechaQFD = $_POST["fechaQFD"];
        $nomQFD = $_POST["nomQFD"];
        $idnomC = $_POST["idnomC"];
        $idnomPS = $_POST["idnomPS"];
        $descQFD = $_POST["descQFD"];   
    
        $detalleQFD = new DETALLESQFD();
        $detalleQFD->insercion_QFD($fechaQFD,$nomQFD,$idnomC,$idnomPS,$descQFD); 

    }elseif(isset($_POST['upQFD'])){

        include_once("../clases.php");

        $codQFD = $_POST["codQFD"];
        $fechaQFD = $_POST["fechaQFD"];
        $nomQFD = $_POST["nomQFD"];
        $idnomC = $_POST["idnomC"];
        $idnomPS = $_POST["idnomPS"];
        $descQFD = $_POST["descQFD"];   
        
        $detalleQFD = new DETALLESQFD();
        $detalleQFD->actualizacion_QFD($codQFD,$fechaQFD,$nomQFD,$idnomC,$idnomPS,$descQFD); 

    }elseif(isset($_POST['delQFD'])){

        include_once("../clases.php");

        $codQFD = $_POST["codQFD"];
        
        $detalleQFD = new DETALLESQFD();
        $detalleQFD->eliminacion_QFD($codQFD);   

    }else{

        header('Location: ../../pages/forms/FormQFDDetalle.php');

    }
?> 