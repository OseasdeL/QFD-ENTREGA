<?php          

    if(isset($_POST['inMat'])){

        include_once("../clases.php");

        $idqfd = $_POST["codigoQFD"];
        $idque = $_POST["codigoQue"];
        $idcomo = $_POST["codigoComo"];
        $relacion = $_POST["relacionM"];    
    
        $matriz = new MATRIZ();

        $matriz->insercion_MAT($idqfd,$idque,$idcomo,$relacion);  

    }elseif(isset($_POST['upMat'])){

        include_once("../clases.php");

        $codMatriz = $_POST["codMatriz"];
        $idqfd = $_POST["codigoQFD"];
        $idque = $_POST["codigoQue"];
        $idcomo = $_POST["codigoComo"];
        $relacion = $_POST["relacionM"];     
        
        $matriz = new MATRIZ();

        $matriz->actualizacion_MAT($codMatriz,$idqfd,$idque,$idcomo,$relacion);       

    }elseif(isset($_POST['delMat'])){

        include_once("../clases.php");
    
        $codMatriz = $_POST["codMatriz"];  
    
        $matriz = new MATRIZ();

        $matriz->eliminacion_MAT($codMatriz);  

    }elseif(isset($_POST['delEMat'])){

        include_once("../clases.php");
    
        $codEMatriz = $_POST["codEMatriz"];  
    
        $matriz = new MATRIZ();

        $matriz->eliminacion_EMAT($codEMatriz);  

    }else{

        header('Location: ../../pages/forms/FormQFDMatriz.php');

    }
?> 