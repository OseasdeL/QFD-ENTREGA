<?php  
    class Clientes{

        public function insercion_C($nomE,$dirE,$telE,$conE,$telC,$emailC){

            require_once("conexion.php"); 
            $conexion_insercionC = conectar();
            
            if($conexion_insercionC){                 
                                
                $selectQueryVerifica = "SELECT id_c FROM clientes ";
                $registros = $conexion_insercionC->query($selectQueryVerifica);
                
                if ($registros->num_rows == 0){
                                 
                    $insertQueryC = "INSERT INTO Clientes  VALUES (1,'$nomE','$dirE','$telE','$conE','$telC','$emailC')";
                    
                    if($conexion_insercionC->query($insertQueryC) === TRUE){  

                        header('Location: ../../pages/forms/FormClientes.php');

                    }else{
                        //echo "Error: " . $sql . "<br>" . $conn->error; 
                    } 

                }elseif($registros->num_rows > 0){

                    $selectQueryMax = "SELECT MAX(id_c) AS maximo FROM clientes ";
                    $resultadoMax = mysqli_query($conexion_insercionC,$selectQueryMax);   
                  
                    $filaMax = mysqli_fetch_array($resultadoMax);
                    $codigoMax =  $filaMax["maximo"];
                    $nuevoCodigo = $codigoMax + 1;                    
                    
                    $insertQueryC = "INSERT INTO Clientes  VALUES ($nuevoCodigo,'$nomE','$dirE','$telE','$conE','$telC','$emailC')";
                    
                    if($conexion_insercionC->query($insertQueryC) === TRUE){

                        header('Location: ../../pages/forms/FormClientes.php');

                    }else{
                        //echo "Error: " . $sql . "<br>" . $conn->error; 
                    }
                }

            }else{
                    
                header('Location: ../../error_conexion.html');
                    
            } 
        }
            
        public function eliminacion_C($codigoE){

            require_once("conexion.php"); 
            $conexion_eliminacionC = conectar(); 

            if($conexion_eliminacionC){

                $selectQuery = "SELECT id_c, nom_emp FROM clientes WHERE id_c "."= ".$codigoE;
                $resultados = $conexion_eliminacionC->query($selectQuery);

                if ($resultados->num_rows > 0){

                    $deleteQuery = "DELETE FROM clientes WHERE id_c"." = ".$codigoE;
                    
                    if($conexion_eliminacionC->query($deleteQuery) === TRUE){
    
                        header('Location: ../../pages/forms/FormClientes.php');
    
                    }else{
    
                    }
    
                }else{
                    echo "0 results";
                }

            }else{
                header('Location: ../../error_conexion.html');
            }         
        }

        public function actualizacion_C($codigoE,$nomE,$dirE,$telE,$conE,$telCE,$emailE){

            require_once("conexion.php"); 
            $conexion_actualizacionC = conectar(); 
             
            if($conexion_actualizacionC){

                $selectQuery = "SELECT id_c, nom_emp FROM clientes WHERE id_c "."= ".$codigoE;
                $resultados = $conexion_actualizacionC->query($selectQuery);           

                if($resultados->num_rows > 0){

                    $updateQuery = "UPDATE clientes SET NOM_EMP = '".$nomE."' , DIR_EMP = '".$dirE."' , TEL_EMP = '".$telE."' , C_EMP = '".$conE."' , TEL_C = '".$telCE."' , EMAIL_EMP = '".$emailE."' WHERE id_c = ".$codigoE;
                
                    if($conexion_actualizacionC->query($updateQuery) === TRUE){

                        header('Location: ../../pages/forms/FormClientes.php');

                    }else{

                    }

                }else{
                    echo "0 results";
                }

            }else{

                header('Location: ../../error_conexion.html');

            }
        }
    }

    class Productos{

        public function insercion_PS($nomP,$precio,$descP,$idC){  

            require_once("conexion.php"); 
            $conexion_insercionPS = conectar(); 

            if($conexion_insercionPS){

                $selectQuery = "SELECT nom_emp FROM clientes WHERE ".$idC." = id_c";
                $rs = mysqli_query($conexion_insercionPS,$selectQuery);                           
    
                $fila = mysqli_fetch_array($rs);
                $nomC =  $fila["nom_emp"];

                $selectQueryVerifica = "SELECT id_ps FROM prod_serv";
                $registros = $conexion_insercionPS->query($selectQueryVerifica);

                if ($registros->num_rows == 0){

                    $insertQuery = "INSERT INTO prod_serv  VALUES (1,'$nomP','$precio','$descP','$idC','$nomC')";
                                
                    if ($conexion_insercionPS->query($insertQuery) === TRUE){

                        header('Location: ../../pages/forms/FormProdServ.php');

                    }else{
                        //echo "Error: " . $sql . "<br>" . $conn->error;
                    }  

                }elseif ($registros->num_rows > 0){

                    $selectQueryMax = "SELECT MAX(id_ps) AS maximo FROM prod_serv ";
                    $resultadoMax = mysqli_query($conexion_insercionPS,$selectQueryMax);        
        
                    $filaMax = mysqli_fetch_array($resultadoMax);
                    $codigoMax =  $filaMax["maximo"];

                    $nuevoCodigo = $codigoMax + 1;
                    
                    $insertQuery = "INSERT INTO prod_serv VALUES ($nuevoCodigo,'$nomP','$precio','$descP','$idC','$nomC')";
                                
                    if ($conexion_insercionPS->query($insertQuery) === TRUE){

                        header('Location: ../../pages/forms/FormProdServ.php');

                    }else{
                        //echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } 

            }else{
                    
                header('Location: ../../error_conexion.html');
                    
            }  
        } 
            
        public function eliminacion_PS($codigoP){

            require_once("conexion.php"); 
            $conexion_eliminacionPS = conectar();

            if($conexion_eliminacionPS){
                
                $selectQuery = "SELECT id_ps FROM prod_serv WHERE id_ps = ".$codigoP;
                $resultado = $conexion_eliminacionPS->query($selectQuery);            
            
                if($resultado->num_rows > 0){

                    $deleteQuery = "DELETE FROM prod_serv WHERE id_ps = ".$codigoP;

                    if($conexion_eliminacionPS->query($deleteQuery) === TRUE){

                        header('Location: ../../pages/forms/FormProdServ.php');

                    }else{

                    }

                }else{
                    echo "0 results";
                }

            }else{
                header('Location: ../../error_conexion.html');
            }
        }

        public function actualizacion_PS($codigoP,$nomP,$precioP,$desP,$clienteP)
        {
            require_once("conexion.php"); 
            $conexion_actualizacionPS = conectar();

            if($conexion_actualizacionPS){

                $selectQueryA = "SELECT nom_emp FROM clientes WHERE ".$clienteP." = id_c";
                $rs = mysqli_query($conexion_actualizacionPS,$selectQueryA);                           

                $fila = mysqli_fetch_array($rs);
                $nomC =  $fila["nom_emp"];

                $selectQueryB = "SELECT id_ps FROM prod_serv WHERE id_ps "."= ".$codigoP;
                $resultados = $conexion_actualizacionPS->query($selectQueryB);
            
                if($resultados->num_rows > 0){

                    $updateQuery = "UPDATE prod_serv SET NOM_PS = '".$nomP."' , PRECIO = '".$precioP."' , DES_PS = '".$desP."' , ID_C = '".$clienteP."' , NOM_EMP = '".$nomC."' WHERE id_ps = ".$codigoP;

                    if($conexion_actualizacionPS->query($updateQuery) === TRUE){

                        header('Location: ../../pages/forms/FormProdServ.php');

                    }else{

                    }

                }else{
                    echo "0 results";
                }

            }else{
                header('Location: ../../error_conexion.html');   
            }
        }
    }

    class Necesidades{

        public function insercion_N($nomN,$prioridad,$codigoPS,$descN){  

            require_once("conexion.php"); 
            $conexion_insercionN = conectar();          
                
            if($conexion_insercionN){

                $selectQuery = "SELECT nom_ps FROM prod_serv WHERE ".$codigoPS." = id_ps";
                $rs = mysqli_query($conexion_insercionN,$selectQuery);                           

                $fila = mysqli_fetch_array($rs);
                $nomPS =  $fila["nom_ps"];

                $selectQueryVerifica = "SELECT id_que FROM ques";
                $registros = $conexion_insercionN->query($selectQueryVerifica);

                if ($registros->num_rows == 0){

                    $insertQuery = "INSERT INTO ques  VALUES (1,'$nomN','$prioridad','$codigoPS','$nomPS','$descN')";
                    
                    if ($conexion_insercionN->query($insertQuery) === TRUE){

                        header('Location: ../../pages/forms/FormNecesidades.php');

                    }else{

                        //echo "Error: " . $sql . "<br>" . $conn->error;

                    }

                }elseif ($registros->num_rows > 0){

                    $selectQueryMax = "SELECT MAX(id_que) AS maximo FROM ques ";
                    $resultadoMax = mysqli_query($conexion_insercionN,$selectQueryMax);        
        
                    $filaMax = mysqli_fetch_array($resultadoMax);
                    $codigoMax =  $filaMax["maximo"];

                    $nuevoCodigo = $codigoMax + 1;
                    
                    $insertQuery = "INSERT INTO ques  VALUES ($nuevoCodigo,'$nomN','$prioridad','$codigoPS','$nomPS','$descN')";
                    
                    if ($conexion_insercionN->query($insertQuery) === TRUE){

                        header('Location: ../../pages/forms/FormNecesidades.php');

                    }else{

                        //echo "Error: " . $sql . "<br>" . $conn->error;

                    }
                }

            }else{

                header('Location: ../../error_conexion.html');

            }                
                                        
        }

        public function eliminacion_N($codigoN){

            require_once("conexion.php"); 
            $conexion_eliminacionN = conectar();  
            
            if($conexion_eliminacionN){

                $selectQuery = "SELECT id_que FROM ques WHERE id_que = ".$codigoN;
                $resultados = $conexion_eliminacionN->query($selectQuery);
          
                if($resultados->num_rows > 0){

                    $deleteQuery = "DELETE FROM ques WHERE id_que = ".$codigoN;

                    if($conexion_eliminacionN->query($deleteQuery) === TRUE){

                        header('Location: ../../pages/forms/FormNecesidades.php');

                    }else{

                    }

                }else{
                    echo "0 results";
                }

            }else{

                header('Location: ../../error_conexion.html');

            }
        }

        public function actualizacion_N($codigoN,$nomN,$prioridad,$codigoPS,$descN){

            require_once("conexion.php"); 
            $conexion_actualizacionN = conectar();

            if($conexion_actualizacionN){

                $selectQueryA = "SELECT nom_ps FROM prod_serv WHERE ".$codigoPS." = id_ps";
                $rs = mysqli_query($conexion_actualizacionN,$selectQueryA);                           
    
                $fila = mysqli_fetch_array($rs);
                $nomP =  $fila["nom_ps"];
               
                $selectQueryB = "SELECT nom_que FROM ques WHERE id_que = ".$codigoN;
                $resultados = $conexion_actualizacionN->query($selectQueryB);
    
                if($resultados->num_rows > 0){
    
                    $updateQuery = "UPDATE ques SET NOM_QUE = '".$nomN."' , PRIORIDAD = '".$prioridad."' , ID_PS = '".$codigoPS."' , NOM_PS = '".$nomP."' , DESC_QUE = '".$descN."' WHERE id_que = ".$codigoN;
    
                    if($conexion_actualizacionN->query($updateQuery) === TRUE){
    
                        header('Location: ../../pages/forms/FormNecesidades.php');
    
                    }else{
    
                    }
    
                }else{
                    echo "0 results";
                }

            }else{

                header('Location: ../../error_conexion.html');
                
            }
        }
    }

    class Soluciones{

        public function insercion_S($nomS,$viabS,$idN,$descS){

            require_once("conexion.php"); 
            $conexion_insercionS = conectar(); 
                
            if($conexion_insercionS){

                $selectQuery = "SELECT nom_que FROM ques WHERE ".$idN." = id_que";
                $rs = mysqli_query($conexion_insercionS,$selectQuery);                           

                $fila = mysqli_fetch_array($rs);
                $nomN =  $fila["nom_que"];

                $selectQueryVerifica = "SELECT id_s FROM comos";
                $registros = $conexion_insercionS->query($selectQueryVerifica);

                if ($registros->num_rows == 0){

                    $insertQuery = "INSERT INTO comos VALUES (1,'$nomS','$viabS','$idN','$nomN','$descS')";
                    
                    if ($conexion_insercionS->query($insertQuery) === TRUE){

                        header('Location: ../../pages/forms/FormSoluciones.php');

                    }else{
                        //echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                }elseif ($registros->num_rows > 0){

                    $selectQueryMax = "SELECT MAX(id_s) AS maximo FROM comos ";
                    $resultadoMax = mysqli_query($conexion_insercionS,$selectQueryMax);        
        
                    $filaMax = mysqli_fetch_array($resultadoMax);
                    $codigoMax =  $filaMax["maximo"];

                    $nuevoCodigo = $codigoMax + 1;
                    
                    $insertQuery = "INSERT INTO comos VALUES ($nuevoCodigo,'$nomS','$viabS','$idN','$nomN','$descS')";
                    
                    if ($conexion_insercionS->query($insertQuery) === TRUE){

                        header('Location: ../../pages/forms/FormSoluciones.php');

                    }else{
                        //echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }

            }else{

                header('Location: ../../error_conexion.html');

            }                         
        }
        
        public function eliminacion_S($codigoS){
            
            require_once("conexion.php"); 
            $conexion_eliminacionS = conectar(); 

            if($conexion_eliminacionS){

                $selectQuery = "SELECT id_s FROM comos WHERE id_s = ".$codigoS;
                $resultados = $conexion_eliminacionS->query($selectQuery);

                if($resultados->num_rows > 0){

                    $deleteQuery = "DELETE FROM comos WHERE id_s = ".$codigoS;

                    if($conexion_eliminacionS->query($deleteQuery) === TRUE){

                        header('Location: ../../pages/forms/FormSoluciones.php');

                    }else{

                    }

                }else{
                    echo "0 results";
                }

            }else{

                header('Location: ../../error_conexion.html');

            }
        }

        public function actualizacion_S($codigoS,$nombreSS,$viabilidadS,$codrequerimientos,$desSol){

            require_once("conexion.php"); 
            $conexion_actualizacionS = conectar();

            if($conexion_actualizacionS){

                $selectQueryA = "SELECT nom_que FROM ques WHERE ".$codrequerimientos." = id_que";
                $rs = mysqli_query($conexion_actualizacionS,$selectQueryA);                           

                $fila = mysqli_fetch_array($rs);
                $nomrequerimiento =  $fila["nom_que"];

                $selectQueryB = "SELECT id_s FROM comos WHERE id_s = ".$codigoS;
                $resultados = $conexion_actualizacionS->query($selectQueryB);

                if($resultados->num_rows > 0){

                    $updateQuery = "UPDATE comos SET NOM_S = '".$nombreSS."' , VIAB_S = '".$viabilidadS."' , ID_QUE = '".$codrequerimientos."' , NOM_QUE = '".$nomrequerimiento."' , DESC_S = '".$desSol."' WHERE id_s = ".$codigoS;

                    if($conexion_actualizacionS->query($updateQuery) === TRUE){

                        header('Location: ../../pages/forms/FormSoluciones.php');

                    }else{
                    
                    }

                }else{
                    echo "0 results";
                }

            }else{

                header('Location: ../../error_conexion.html');
                
            }
        }        
    }   

    class Competencias{

        public function insercion_Comp($codCliente,$nCompetencia){

            require_once("conexion.php"); 
            $conexion_insercionComp = conectar(); 

            if($conexion_insercionComp){

                $selectQuery = "SELECT nom_emp FROM clientes WHERE ".$codCliente." = id_c";
                $rs = mysqli_query($conexion_insercionComp,$selectQuery);                           

                $fila = mysqli_fetch_array($rs);
                $nomC =  $fila["nom_emp"];

                $selectQueryVerifica = "SELECT id_competencia FROM competencia";
                $registros = $conexion_insercionComp->query($selectQueryVerifica);
                
                if($registros->num_rows == 0){

                    $insertQuery = "INSERT INTO competencia VALUES (1,'$nCompetencia','$codCliente','$nomC')";
                    
                    if ($conexion_insercionComp->query($insertQuery) === TRUE){

                        header('Location: ../../pages/forms/FormCompetencias.php');

                    }else{
                        //echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                }elseif($registros->num_rows > 0){

                    $selectQueryMax = "SELECT MAX(id_competencia) AS maximo FROM competencia ";
                    $resultadoMax = mysqli_query($conexion_insercionComp,$selectQueryMax);        
        
                    $filaMax = mysqli_fetch_array($resultadoMax);
                    $codigoMax =  $filaMax["maximo"];

                    $nuevoCodigo = $codigoMax + 1;
                    
                    $insertQuery = "INSERT INTO competencia VALUES ($nuevoCodigo,'$nCompetencia','$codCliente','$nomC')";
                    
                    if ($conexion_insercionComp->query($insertQuery) === TRUE){

                        header('Location: ../../pages/forms/FormCompetencias.php');

                    }else{
                        //echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                }

            }else{

                header('Location: ../../error_conexion.html');

            }

        }

        public function eliminacion_Comp($codCompetencia){

            require_once("conexion.php"); 
            $conexion_eliminacionComp = conectar(); 

            if($conexion_eliminacionComp){

                $selectQuery = "SELECT id_competencia FROM competencia WHERE id_competencia = ".$codCompetencia;
                $resultados = $conexion_eliminacionComp->query($selectQuery);

                if($resultados->num_rows > 0){

                    $deleteQuery = "DELETE FROM competencia WHERE id_competencia = ".$codCompetencia;

                    if($conexion_eliminacionComp->query($deleteQuery) === TRUE){

                        header('Location: ../../pages/forms/FormCompetencias.php');

                    }else{

                    }

                }else{



                }

            }else{

                header('Location: ../../error_conexion.html');

            }

        }

        public function actualizacion_Comp($codCompetencia,$codCliente,$nCompetencia){

            require_once("conexion.php"); 
            $conexion_actualizacionComp = conectar();

            if($conexion_actualizacionComp){

                $selectQueryA = "SELECT nom_emp FROM clientes WHERE ".$codCliente." = id_c";
                $rs = mysqli_query($conexion_actualizacionComp,$selectQueryA);                           

                $fila = mysqli_fetch_array($rs);
                $nomC =  $fila["nom_emp"];

                $selectQueryB = "SELECT id_competencia FROM competencia WHERE id_competencia = ".$codCompetencia;
                $resultados = $conexion_actualizacionComp->query($selectQueryB);

                if($resultados->num_rows > 0){

                    $updateQuery = "UPDATE competencia SET NOMBRE = '".$nCompetencia."' , ID_C = '".$codCliente."' , NOM_C = '".$nomC."' WHERE id_competencia = ".$codCompetencia;

                    if($conexion_actualizacionComp->query($updateQuery) === TRUE){

                        header('Location: ../../pages/forms/FormCompetencias.php');

                    }else{
                    
                    }

                }else{



                }

            }else{

                header('Location: ../../error_conexion.html');

            }

        }        

    }

    class DETALLESQFD{

        public function insercion_QFD($fechaQFD,$nomQFD,$idnomC,$idnomPS,$descQFD){
                 
            require_once("conexion.php"); 
            $conexion_insercionQFD = conectar();
                
            if($conexion_insercionQFD){

                $selectQueryA = "SELECT nom_emp FROM clientes WHERE ".$idnomC." = id_c";
                $rs = mysqli_query($conexion_insercionQFD,$selectQueryA);                           

                $fila = mysqli_fetch_array($rs);
                $nomC =  $fila["nom_emp"];

                $selectQueryB = "SELECT nom_ps FROM prod_serv WHERE ".$idnomPS." = id_ps";
                $rs = mysqli_query($conexion_insercionQFD,$selectQueryB);                           

                $fila = mysqli_fetch_array($rs);
                $nomPS =  $fila["nom_ps"];

                $selectQueryVerifica = "SELECT id_qfd FROM qfd";
                $registros = $conexion_insercionQFD->query($selectQueryVerifica);

                if ($registros->num_rows == 0){

                    $insertQuery = "INSERT INTO qfd  VALUES (1,'$nomQFD','$fechaQFD','$idnomC','$nomC','$idnomPS','$nomPS','$descQFD')";
                    
                    if ($conexion_insercionQFD->query($insertQuery) === TRUE){

                        header('Location: ../../pages/forms/FormQFDDetalle.php');

                    }else{
                        //echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                }elseif ($registros->num_rows > 0){

                    $selectQueryMax = "SELECT MAX(id_qfd) AS maximo FROM qfd";
                    $resultadoMax = mysqli_query($conexion_insercionQFD,$selectQueryMax);        
        
                    $filaMax = mysqli_fetch_array($resultadoMax);
                    $codigoMax =  $filaMax["maximo"];

                    $nuevoCodigo = $codigoMax + 1;
                    
                    $insertQuery = "INSERT INTO qfd  VALUES ($nuevoCodigo,'$nomQFD','$fechaQFD','$idnomC','$nomC','$idnomPS','$nomPS','$descQFD')";
                    
                    if ($conexion_insercionQFD->query($insertQuery) === TRUE){

                        header('Location: ../../pages/forms/FormQFDDetalle.php');

                    }else{
                        //echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }  

            }else{      

                header('Location: ../../error_conexion.html');      

            }  
        }
        
        public function eliminacion_QFD($codQFD){

            require_once("conexion.php"); 
            $conexion_eliminacionQFD = conectar();

            if($conexion_eliminacionQFD){

                $selectQuery = "SELECT id_qfd FROM qfd WHERE id_qfd = ".$codQFD;
                $resultados = $conexion_eliminacionQFD->query($selectQuery);

                if($resultados->num_rows > 0){

                    $deleteQuery = "DELETE FROM qfd WHERE id_qfd = ".$codQFD;

                    if($conexion_eliminacionQFD->query($deleteQuery) === TRUE){

                        header('Location: ../../pages/forms/FormQFDDetalle.php');

                    }else{

                    }

                }else{
                    echo "0 results";
                }

            }else{

                header('Location: ../../error_conexion.html');
            }
        }

        public function actualizacion_QFD($codQFD,$fechaQFD,$nomQFD,$idnomC,$idnomPS,$descQFD){

            require_once("conexion.php"); 
            $conexion_actualizacionQFD = conectar();

            if($conexion_actualizacionQFD){

                $selectQueryA = "SELECT nom_emp FROM clientes WHERE ".$idnomC." = id_c";
                $rs = mysqli_query($conexion_actualizacionQFD,$selectQueryA);                           

                $fila = mysqli_fetch_array($rs);
                $nomC =  $fila["nom_emp"];
            
                $selectQueryB = "SELECT nom_ps FROM prod_serv WHERE ".$idnomPS." = id_ps";
                $rs = mysqli_query($conexion_actualizacionQFD,$selectQueryB);                           

                $fila = mysqli_fetch_array($rs);
                $nomPS =  $fila["nom_ps"];

                $selectQuery = "SELECT id_qfd, nom_qfd FROM qfd WHERE id_qfd "."= ".$codQFD;
                $resultados = $conexion_actualizacionQFD->query($selectQuery);

                if($resultados->num_rows > 0){

                    $updateQuery = "UPDATE qfd SET FECHA = '".$fechaQFD."' , NOM_QFD = '".$nomQFD."' , ID_C = '".$idnomC."' , NOM_C = '".$nomC."' , ID_PS = '".$idnomPS."' , NOM_PS = '".$nomPS."' , DES_QFD = '".$descQFD."' WHERE id_qfd = ".$codQFD;
                    
                    if($conexion_actualizacionQFD->query($updateQuery) === TRUE){
    
                        header('Location: ../../pages/forms/FormQFDDetalle.php');
    
                    }else{
    
                    }
    
                }else{
                    echo "0 results";
                }

            }else{

                header('Location: ../../error_conexion.html');

            }
        }
    }

    class ASIGNACION{

        public function insercion_A($codQFD,$codServ,$codQue,$codcomo){

            require_once("conexion.php"); 
            $conexion_insercionA = conectar();

            if($conexion_insercionA){

                $selectQueryQue = "SELECT nom_que, prioridad FROM ques WHERE id_que =".$codQue;
                $QueRs = mysqli_query($conexion_insercionA,$selectQueryQue);

                $Quefila = mysqli_fetch_array($QueRs);
                $nomQue =  $Quefila["nom_que"];
                $prioridadQue =  $Quefila["prioridad"];

                $selectQueryComo = "SELECT nom_s FROM comos WHERE id_s =".$codcomo;
                $ComoRs = mysqli_query($conexion_insercionA,$selectQueryComo);

                $Comofila = mysqli_fetch_array($ComoRs);
                $nomComo =  $Comofila["nom_s"];

                $selectQueryPS = "SELECT nom_ps FROM prod_serv WHERE id_ps =".$codServ;
                $ProdServRs = mysqli_query($conexion_insercionA,$selectQueryPS);

                $ProdServfila = mysqli_fetch_array($ProdServRs);
                $nomPS =  $ProdServfila["nom_ps"];

                $selectQueryVerificaA = "SELECT id_detc FROM a_como";
                $registrosA = $conexion_insercionA->query($selectQueryVerificaA);

                $selectQueryVerificaB = "SELECT id_detq FROM a_que";
                $registrosB = $conexion_insercionA->query($selectQueryVerificaB);

                if(($registrosA->num_rows == 0) && ($registrosB->num_rows == 0)){

                    $insertQueryC = "INSERT INTO a_como VALUES (1,'$codcomo','$nomComo','$codQFD','$nomPS')";

                    $insertQueryQ = "INSERT INTO a_que VALUES (1,'$codQue','$nomQue','$codQFD','$prioridadQue','$nomPS')";

                    if ($conexion_insercionA->query($insertQueryC) === TRUE && $conexion_insercionA->query($insertQueryQ) === TRUE){

                        header('Location: ../../pages/forms/FormQFDAsignacion.php');

                    }else{
                        //echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                            //tabla como                        tabla que
                }elseif(($registrosA->num_rows > 0) && ($registrosB->num_rows > 0)){

                    $selectQueryMaxQ = "SELECT MAX(id_detq) AS maximoQ FROM a_que";
                    $resultadoMaxQ = mysqli_query($conexion_insercionA,$selectQueryMaxQ);        
        
                    $filaMaxQ = mysqli_fetch_array($resultadoMaxQ);
                    $codigoMaxQ =  $filaMaxQ["maximoQ"];

                    $nuevoCodigoQ = $codigoMaxQ + 1;
                    
                    $insertQueryQ = "INSERT INTO a_que VALUES ($nuevoCodigoQ,'$codQue','$nomQue','$codQFD','$prioridadQue','$nomPS')";
                    
                    $selectQueryMaxC = "SELECT MAX(id_detc) AS maximoC FROM a_como";
                    $resultadoMaxC = mysqli_query($conexion_insercionA,$selectQueryMaxC);        
        
                    $filaMaxC = mysqli_fetch_array($resultadoMaxC);
                    $codigoMaxC =  $filaMaxC["maximoC"];

                    $nuevoCodigoC = $codigoMaxC + 1;

                    $insertQueryC = "INSERT INTO a_como VALUES ($nuevoCodigoC,'$codcomo','$nomComo','$codQFD','$nomPS')";
                    
                    if ($conexion_insercionA->query($insertQueryC) === TRUE && $conexion_insercionA->query($insertQueryQ) === TRUE){

                        header('Location: ../../pages/forms/FormQFDAsignacion.php');

                    }else{
                        //echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                }elseif(($registrosA->num_rows > 0) && ($registrosB->num_rows == 0)){

                    $insertQueryQ = "INSERT INTO a_que VALUES (1,'$codQue','$nomQue','$codQFD','$prioridadQue','$nomPS')";

                    $selectQueryMaxC = "SELECT MAX(id_detc) AS maximoC FROM a_como";
                    $resultadoMaxC = mysqli_query($conexion_insercionA,$selectQueryMaxC);        
        
                    $filaMaxC = mysqli_fetch_array($resultadoMaxC);
                    $codigoMaxC =  $filaMaxC["maximoC"];

                    $nuevoCodigoC = $codigoMaxC + 1;

                    $insertQueryC = "INSERT INTO a_como VALUES ($nuevoCodigoC,'$codcomo','$nomComo','$codQFD','$nomPS')";

                    if ($conexion_insercionA->query($insertQueryC) === TRUE && $conexion_insercionA->query($insertQueryQ) === TRUE){

                        header('Location: ../../pages/forms/FormQFDAsignacion.php');

                    }else{
                        //echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                }elseif(($registrosA->num_rows == 0) && ($registrosB->num_rows > 0)){

                    $insertQueryC = "INSERT INTO a_como VALUES (1,'$codcomo','$nomComo','$codQFD','$nomPS')";

                    $selectQueryMaxQ = "SELECT MAX(id_detq) AS maximoQ FROM a_que";
                    $resultadoMaxQ = mysqli_query($conexion_insercionA,$selectQueryMaxQ);        
        
                    $filaMaxQ = mysqli_fetch_array($resultadoMaxQ);
                    $codigoMaxQ =  $filaMaxQ["maximoQ"];

                    $nuevoCodigoQ = $codigoMaxQ + 1;
                    
                    $insertQueryQ = "INSERT INTO a_que VALUES ($nuevoCodigoQ,'$codQue','$nomQue','$codQFD','$prioridadQue','$nomPS')";

                    if ($conexion_insercionA->query($insertQueryC) === TRUE && $conexion_insercionA->query($insertQueryQ) === TRUE){

                        header('Location: ../../pages/forms/FormQFDAsignacion.php');

                    }else{
                        //echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                }

            }else{

                header('Location: ../../error_conexion.html');

            }

        }

        public function eliminacion_A($codA){

            require_once("conexion.php"); 
            $conexion_eliminacionA = conectar();

            if($conexion_eliminacionA){

                $selectQueryVerificaA = "SELECT id_detc FROM a_como WHERE id_detc =".$codA;
                $registrosA = $conexion_eliminacionA->query($selectQueryVerificaA);

                $selectQueryVerificaB = "SELECT id_detq FROM a_que WHERE id_detq =".$codA;
                $registrosB = $conexion_eliminacionA->query($selectQueryVerificaB);

                if($registrosA->num_rows > 0 && $registrosB->num_rows > 0){

                    $deleteQueryA = "DELETE FROM a_como WHERE id_detc = ".$codA;

                    $deleteQueryB = "DELETE FROM a_que WHERE id_detq = ".$codA;

                    if($conexion_eliminacionA->query($deleteQueryA) === TRUE && $conexion_eliminacionA->query($deleteQueryB) === TRUE){

                        header('Location: ../../pages/forms/FormQFDAsignacion.php');

                    }else{



                    }

                }else{

                    echo "No hay registros";

                }

            }else{

                header('Location: ../../error_conexion.html');

            }

        }

        public function actualizacion_A($codA,$codQFD,$codServ,$codQue,$codcomo){

            require_once("conexion.php"); 
            $conexion_actualizacionA = conectar();

            if($conexion_actualizacionA){

                $selectQueryQue = "SELECT nom_que, prioridad FROM ques WHERE id_que =".$codQue;
                $QueRs = mysqli_query($conexion_actualizacionA,$selectQueryQue);

                $Quefila = mysqli_fetch_array($QueRs);
                $nomQue =  $Quefila["nom_que"];
                $prioridadQue =  $Quefila["prioridad"];

                $selectQueryComo = "SELECT nom_s FROM comos WHERE id_s =".$codcomo;
                $ComoRs = mysqli_query($conexion_actualizacionA,$selectQueryComo);

                $Comofila = mysqli_fetch_array($ComoRs);
                $nomComo =  $Comofila["nom_s"];

                $selectQueryPS = "SELECT nom_ps FROM prod_serv WHERE id_ps =".$codServ;
                $ProdServRs = mysqli_query($conexion_actualizacionA,$selectQueryPS);

                $ProdServfila = mysqli_fetch_array($ProdServRs);
                $nomPS =  $ProdServfila["nom_ps"];

                $selectQueryVerificaA = "SELECT id_detc FROM a_como WHERE id_detc =".$codA;
                $registrosA = $conexion_actualizacionA->query($selectQueryVerificaA);

                $selectQueryVerificaB = "SELECT id_detq FROM a_que WHERE id_detq =".$codA;
                $registrosB = $conexion_actualizacionA->query($selectQueryVerificaB);

                if($registrosA->num_rows > 0 && $registrosB->num_rows > 0){

                    $updateQueryQ = "UPDATE a_que SET ID_QUE = '".$codQue."' , NOM_QUE = '".$nomQue."' , ID_QFD = '".$codQFD."' , PRIORIDAD = '".$prioridadQue."' , SERVICIO = '".$nomPS."' WHERE id_detq = ".$codA;

                    $updateQueryC = "UPDATE a_como SET ID_COMO = '".$codcomo."' , NOM_COMO = '".$nomComo."' , ID_QFD = '".$codQFD."' , SERVICIO = '".$nomPS."' WHERE id_detc = ".$codA;

                    if($conexion_actualizacionA->query($updateQueryQ) === TRUE && $conexion_actualizacionA->query($updateQueryC) === TRUE){
    
                        header('Location: ../../pages/forms/FormQFDAsignacion.php');
    
                    }else{
    
                    }
    
                    
                }else{

                    echo "No hay reultados";

                }

            }else{

                header('Location: ../../error_conexion.html');

            }

        }
    }

    class MATRIZ{

        public function insercion_MAT($idqfd,$idque,$idcomo,$relacion){

            require_once("conexion.php"); 
            $conexion_insercionM = conectar();           

            if($conexion_insercionM){

                $selectQueryA = "SELECT nom_qfd FROM qfd WHERE ".$idqfd." = id_qfd";
                $ResultadoQFD = mysqli_query($conexion_insercionM,$selectQueryA);                           

                $filaQFD = mysqli_fetch_array($ResultadoQFD);
                $nomqfd =  $filaQFD["nom_qfd"];
          
                $selectQueryB = "SELECT nom_que, prioridad FROM ques WHERE ".$idque." = id_que";
                $ResultadoQUE = mysqli_query($conexion_insercionM,$selectQueryB);                           

                $filaQUE = mysqli_fetch_array($ResultadoQUE);
                $nomQUE =   $filaQUE["nom_que"];

                $priQUE =   $filaQUE["prioridad"];

                $total = $relacion * $priQUE;

                $selectQueryC = "SELECT nom_s FROM comos WHERE ".$idcomo." = id_s";
                $ResultadoComo = mysqli_query($conexion_insercionM,$selectQueryC);                           

                $filaCOMO = mysqli_fetch_array($ResultadoComo);
                $nomCOMO =  $filaCOMO["nom_s"];

                $selectQueryVerifica = "SELECT id_matriz FROM mat_r";
                $registros = $conexion_insercionM->query($selectQueryVerifica);

                if ($registros->num_rows == 0){

                    $insertQuery = "INSERT INTO mat_r  VALUES (1,'$idqfd','$nomqfd','$idque','$nomQUE','$idcomo','$nomCOMO','$relacion','$priQUE','$total')";
                    
                    if ($conexion_insercionM->query($insertQuery) === TRUE){

                        header('Location: ../../pages/forms/FormQFDMatriz.php');

                    }else{
                        //echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                }elseif ($registros->num_rows > 0){

                    $selectQueryMax = "SELECT MAX(id_matriz) AS maximo FROM mat_r";
                    $resultadoMax = mysqli_query($conexion_insercionM,$selectQueryMax);        
        
                    $filaMax = mysqli_fetch_array($resultadoMax);
                    $codigoMax =  $filaMax["maximo"];

                    $nuevoCodigo = $codigoMax + 1;
                    
                    $insertQuery = "INSERT INTO mat_r  VALUES ($nuevoCodigo,'$idqfd','$nomqfd','$idque','$nomQUE','$idcomo','$nomCOMO','$relacion','$priQUe','$total')";
                    
                    if ($conexion_insercionM->query($insertQuery) === TRUE){

                        header('Location: ../../pages/forms/FormQFDMatriz.php');

                    }else{
                        //echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } 

            }else{
                    
                header('Location: ../../error_conexion.html');
                    
            } 
        }
        
        public function eliminacion_MAT($codMatriz){

            require_once("conexion.php"); 
            $conexion_eliminacionM = conectar();
            
            if($conexion_eliminacionM){

                $selectQuery = "SELECT id_qfd FROM mat_r WHERE id_qfd = ".$codMatriz;
                $resultados = $conexion_eliminacionM->query($selectQuery);

                if($resultados->num_rows > 0){

                    $deleteQuery = "DELETE FROM mat_r WHERE id_qfd = ".$codMatriz;

                    if($conexion_eliminacionM->query($deleteQuery) === TRUE){

                        header('Location: ../../pages/forms/FormQFDMatriz.php');

                    }else{

                    }

                }else{
                    echo "0 results";
                }                

            }else{

                header('Location: ../../error_conexion.html');

            }
        }

        public function eliminacion_EMAT($codEMatriz){

            require_once("conexion.php"); 
            $conexion_eliminacionM = conectar();
            
            if($conexion_eliminacionM){

                $selectQuery = "SELECT id_matriz FROM mat_r WHERE id_matriz = ".$codEMatriz;
                $resultados = $conexion_eliminacionM->query($selectQuery);

                if($resultados->num_rows > 0){

                    $deleteQuery = "DELETE FROM mat_r WHERE id_matriz = ".$codEMatriz;

                    if($conexion_eliminacionM->query($deleteQuery) === TRUE){

                        header('Location: ../../pages/forms/FormQFDMatriz.php');

                    }else{

                    }

                }else{
                    echo "0 results";
                }                

            }else{

                header('Location: ../../error_conexion.html');

            }
        }

        public function actualizacion_MAT($codMatriz,$idqfd,$idque,$idcomo,$relacion){

            require_once("conexion.php"); 
            $conexion_actualizacionM = conectar(); 

            if($conexion_actualizacionM){

                $selectQueryA = "SELECT nom_qfd FROM qfd WHERE ".$idqfd." = id_qfd";
                $rs = mysqli_query($conexion_actualizacionM,$selectQueryA);                           

                $fila = mysqli_fetch_array($rs);
                $nomqfd =  $fila["nom_qfd"];
           
                $selectQueryB = "SELECT nom_que, prioridad FROM ques WHERE ".$idque." = id_que";
                $rs = mysqli_query($conexion_actualizacionM,$selectQueryB);                           

                $fila = mysqli_fetch_array($rs);
                $nomQUE =  $fila["nom_que"];

                $priQUE =  $fila["prioridad"];

                $total = $relacion * $priQUE;

                $selectQueryC = "SELECT nom_s FROM comos WHERE ".$idcomo." = id_s";
                $rs = mysqli_query($conexion_actualizacionM,$selectQueryC);                           
    
                $fila = mysqli_fetch_array($rs);
                $nomCOMO =  $fila["nom_s"];
    
                $selectQuery = "SELECT id_matriz FROM mat_r WHERE id_matriz "."= ".$codMatriz;
                $resultados = $conexion_actualizacionM->query($selectQuery);

                if($resultados->num_rows > 0){

                    $updateQuery = "UPDATE mat_r SET ID_QFD = '".$idqfd."' , NOMB_QFD = '".$nomqfd."' , ID_QUE = '".$idque."' , NOM_QUE = '".$nomQUE."' , ID_COMO = '".$idcomo."' , NOM_COMO = '".$nomCOMO."' , RELACION = '".$relacion."' , PRIORIDAD = '".$priQUE."' , TOTAL = '".$total."' WHERE id_matriz = ".$codMatriz;
                    
                    if($conexion_actualizacionM->query($updateQuery) === TRUE){
    
                        header('Location: ../../pages/forms/FormQFDMatriz.php');
    
                    }else{
    
                    }
    
                }else{
                    echo "0 results";
                }

            }else{

                header('Location: ../../error_conexion.html');

            }
        }
    }

    class BENCHMARKING{

        public function insercion_BENCH($codQfdB,$codQueB,$codCompetenciaB,$evaluacionB){

            require_once("conexion.php"); 
            $conexion_insercionB = conectar();
                
            if($conexion_insercionB){   

                $selectQueryQFD = "SELECT nom_qfd FROM qfd WHERE id_qfd"." = ".$codQfdB;
                $ResultQFD = mysqli_query($conexion_insercionB,$selectQueryQFD);                           

                $filaQFD = mysqli_fetch_array($ResultQFD);
                $nomQFD =  $filaQFD["nom_qfd"];

                $selectQueryQUE = "SELECT nom_que FROM ques WHERE id_que"." = ".$codQueB;
                $ResultQUE = mysqli_query($conexion_insercionB,$selectQueryQUE);                           

                $filaQUE = mysqli_fetch_array($ResultQUE);
                $nomQUE =  $filaQUE["nom_que"];

                $selectQueryComp = "SELECT nombre FROM competencia WHERE id_competencia"." = ".$codCompetenciaB;
                $ResultComp = mysqli_query($conexion_insercionB,$selectQueryComp);                           

                $filaComp = mysqli_fetch_array($ResultComp);
                $nomComp =  $filaComp["nombre"];

                $selectQueryVerifica = "SELECT id_bench FROM benchmarking";
                $registros = $conexion_insercionB->query($selectQueryVerifica);

                if ($registros->num_rows == 0){

                    $insertQuery = "INSERT INTO benchmarking  VALUES (1,'$codQfdB','$nomQFD','$codQueB','$nomQUE','$nomComp','$evaluacionB')";
                    
                    if ($conexion_insercionB->query($insertQuery) === TRUE){

                        header('Location: ../../pages/forms/FormQFDBenchmarking.php');

                    }else{
                        //echo "Error: " . $sql . "<br>" . $conn->error;
                    } 

                }elseif ($registros->num_rows > 0){

                    $selectQueryMax = "SELECT MAX(id_bench) AS maximo FROM benchmarking";
                    $resultadoMax = mysqli_query($conexion_insercionB,$selectQueryMax);        
        
                    $filaMax = mysqli_fetch_array($resultadoMax);
                    $codigoMax =  $filaMax["maximo"];

                    $nuevoCodigo = $codigoMax + 1;
                    
                    $insertQuery = "INSERT INTO benchmarking  VALUES ($nuevoCodigo,'$codQfdB','$nomQFD','$codQueB','$nomQUE','$nomComp','$evaluacionB')";
                    
                    if ($conexion_insercionB->query($insertQuery) === TRUE){

                        header('Location: ../../pages/forms/FormQFDBenchmarking.php');

                    }else{
                        //echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } 

            }else{
                    
                header('Location: ../../error_conexion.html');
                    
            }                                          

        }
        
        public function eliminacion_BENCH($codBench){

            require_once("conexion.php"); 
            $conexion_eliminacionB = conectar();

            if($conexion_eliminacionB){

                $selectQuery = "SELECT id_bench FROM benchmarking WHERE id_bench = ".$codBench;
                $resultados = $conexion_eliminacionB->query($selectQuery);

                if($resultados->num_rows > 0){

                    $deleteQuery = "DELETE FROM benchmarking WHERE id_bench = ".$codBench;

                    if($conexion_eliminacionB->query($deleteQuery) === TRUE){

                        header('Location: ../../pages/forms/FormQFDBenchmarking.php');

                    }else{

                    }

                }else{
                    echo "0 results";
                }

            }else{

                header('Location: ../../error_conexion.html');

            }
        }

        public function actualizacion_BENCH($codBench,$codQfdB,$codQueB,$codCompetenciaB,$evaluacionB){

            require_once("conexion.php"); 
            $conexion_actualizacionB = conectar();

            if($conexion_actualizacionB){

                $selectQueryQFD = "SELECT nom_qfd FROM qfd WHERE id_qfd"." = ".$codQfdB;
                $ResultQFD = mysqli_query($conexion_actualizacionB,$selectQueryQFD);                           

                $filaQFD = mysqli_fetch_array($ResultQFD);
                $nomQFD =  $filaQFD["nom_qfd"];

                $selectQueryQUE = "SELECT nom_que FROM ques WHERE id_que"." = ".$codQueB;
                $ResultQUE = mysqli_query($conexion_actualizacionB,$selectQueryQUE);                           

                $filaQUE = mysqli_fetch_array($ResultQUE);
                $nomQUE =  $filaQUE["nom_que"];

                $selectQueryComp = "SELECT nombre FROM competencia WHERE id_competencia"." = ".$codCompetenciaB;
                $ResultComp = mysqli_query($conexion_actualizacionB,$selectQueryComp);                           

                $filaComp = mysqli_fetch_array($ResultComp);
                $nomComp =  $filaComp["nombre"];
               
                $selectQuery = "SELECT id_bench FROM benchmarking WHERE id_bench "."= ".$codBench;
                $resultados = $conexion_actualizacionB->query($selectQuery);

                if($resultados->num_rows > 0){

                    $updateQuery = "UPDATE benchmarking SET ID_QFD = '".$codQfdB."' , NOM_QFD = '". $nomQFD."' , ID_QUE = '".$codQueB."' , NOM_QUE = '".$nomQUE."' , COMPETENCIA = '".$nomComp."' , EVALUACION = '".$evaluacionB."' WHERE id_bench = ".$codBench;
                    
                    if($conexion_actualizacionB->query($updateQuery) === TRUE){
    
                        header('Location: ../../pages/forms/FormQFDBenchmarking.php');
    
                    }else{
    
                    }

                }else{
                    echo "0 results";
                }

            }else{

                header('Location: ../../error_conexion.html');

            }
        }
    }

    class BENCHMARKINGC{

        public function insercion_BENCHC($codQfdB,$codQueB,$codCompetenciaB,$evaluacionB){

            require_once("conexion.php"); 
            $conexion_insercionB = conectar();
                
            if($conexion_insercionB){   

                $selectQueryQFD = "SELECT nom_qfd FROM qfd WHERE id_qfd"." = ".$codQfdB;
                $ResultQFD = mysqli_query($conexion_insercionB,$selectQueryQFD);                           

                $filaQFD = mysqli_fetch_array($ResultQFD);
                $nomQFD =  $filaQFD["nom_qfd"];

                $selectQueryQUE = "SELECT nom_que FROM ques WHERE id_que"." = ".$codQueB;
                $ResultQUE = mysqli_query($conexion_insercionB,$selectQueryQUE);                           

                $filaQUE = mysqli_fetch_array($ResultQUE);
                $nomQUE =  $filaQUE["nom_que"];

                $selectQueryComp = "SELECT nom_emp FROM clientes WHERE id_c"." = ".$codCompetenciaB;
                $ResultComp = mysqli_query($conexion_insercionB,$selectQueryComp);                           

                $filaComp = mysqli_fetch_array($ResultComp);
                $nomComp =  $filaComp["nom_emp"];

                $selectQueryVerifica = "SELECT id_bench FROM benchmarking";
                $registros = $conexion_insercionB->query($selectQueryVerifica);

                if ($registros->num_rows == 0){

                    $insertQuery = "INSERT INTO benchmarking  VALUES (1,'$codQfdB','$nomQFD','$codQueB','$nomQUE','$nomComp','$evaluacionB')";
                    
                    if ($conexion_insercionB->query($insertQuery) === TRUE){

                        header('Location: ../../pages/forms/FormQFDBenchmarkingC.php');

                    }else{
                        //echo "Error: " . $sql . "<br>" . $conn->error;
                    } 

                }elseif ($registros->num_rows > 0){

                    $selectQueryMax = "SELECT MAX(id_bench) AS maximo FROM benchmarking";
                    $resultadoMax = mysqli_query($conexion_insercionB,$selectQueryMax);        
        
                    $filaMax = mysqli_fetch_array($resultadoMax);
                    $codigoMax =  $filaMax["maximo"];

                    $nuevoCodigo = $codigoMax + 1;
                    
                    $insertQuery = "INSERT INTO benchmarking  VALUES ($nuevoCodigo,'$codQfdB','$nomQFD','$codQueB','$nomQUE','$nomComp','$evaluacionB')";
                    
                    if ($conexion_insercionB->query($insertQuery) === TRUE){

                        header('Location: ../../pages/forms/FormQFDBenchmarkingC.php');

                    }else{
                        //echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } 

            }else{
                    
                header('Location: ../../error_conexion.html');
                    
            }                                          

        }
        
        public function eliminacion_BENCHC($codBen){

            require_once("conexion.php"); 
            $conexion_eliminacionB = conectar();

            if($conexion_eliminacionB){

                $selectQuery = "SELECT id_bench FROM benchmarking WHERE id_bench = ".$codBen;
                $resultados = $conexion_eliminacionB->query($selectQuery);

                if($resultados->num_rows > 0){

                    $deleteQuery = "DELETE FROM benchmarking WHERE id_bench = ".$codBen;

                    if($conexion_eliminacionB->query($deleteQuery) === TRUE){

                        header('Location: ../../pages/forms/FormQFDBenchmarkingC.php');

                    }else{

                    }

                }else{
                    echo "0 results";
                }

            }else{

                header('Location: ../../error_conexion.html');

            }
        }

        public function actualizacion_BENCHC($codBen,$codQfdB,$codQueB,$codCompetenciaB,$evaluacionB){

            require_once("conexion.php"); 
            $conexion_actualizacionB = conectar();

            if($conexion_actualizacionB){

                $selectQueryQFD = "SELECT nom_qfd FROM qfd WHERE id_qfd"." = ".$codQfdB;
                $ResultQFD = mysqli_query($conexion_actualizacionB,$selectQueryQFD);                           

                $filaQFD = mysqli_fetch_array($ResultQFD);
                $nomQFD =  $filaQFD["nom_qfd"];

                $selectQueryQUE = "SELECT nom_que FROM ques WHERE id_que"." = ".$codQueB;
                $ResultQUE = mysqli_query($conexion_actualizacionB,$selectQueryQUE);                           

                $filaQUE = mysqli_fetch_array($ResultQUE);
                $nomQUE =  $filaQUE["nom_que"];

                $selectQueryComp = "SELECT nom_emp FROM clientes WHERE id_c"." = ".$codCompetenciaB;
                $ResultComp = mysqli_query($conexion_actualizacionB,$selectQueryComp);                           

                $filaComp = mysqli_fetch_array($ResultComp);
                $nomComp =  $filaComp["nom_emp"];
               
                $selectQuery = "SELECT id_bench FROM benchmarking WHERE id_bench "."= ".$codBen;
                $resultados = $conexion_actualizacionB->query($selectQuery);

                if($resultados->num_rows > 0){

                    $updateQuery = "UPDATE benchmarking SET ID_QFD = '".$codQfdB."' , NOM_QFD = '". $nomQFD."' , ID_QUE = '".$codQueB."' , NOM_QUE = '".$nomQUE."' , COMPETENCIA = '".$nomComp."' , EVALUACION = '".$evaluacionB."' WHERE id_bench = ".$codBen;
                    
                    if($conexion_actualizacionB->query($updateQuery) === TRUE){
    
                        header('Location: ../../pages/forms/FormQFDBenchmarkingC.php');
    
                    }else{
    
                    }

                }else{
                    echo "0 results";
                }

            }else{

               header('Location: ../../error_conexion.html');

            }
        }
    }

    class EV_INGENIERIA{
        
        public function insercion_EVINGENIERIA($idQFD,$detalleComos,$puntajeEvaluacion){

            require_once("conexion.php"); 
            $conexion_insercionEV = conectar();
                
            if($conexion_insercionEV){

                $selectQueryA = "SELECT nom_qfd FROM qfd WHERE id_qfd"." = ".$idQFD;
                $rs = mysqli_query($conexion_insercionEV,$selectQueryA);                           

                $fila = mysqli_fetch_array($rs);
                $nomQFD =  $fila["nom_qfd"];

                $selectQueryB = "SELECT nom_s FROM comos WHERE id_s"." = ".$detalleComos;
                $rs = mysqli_query($conexion_insercionEV,$selectQueryB);                           

                $fila = mysqli_fetch_array($rs);
                $nomSolucion =  $fila["nom_s"];

                $selectQueryVerifica = "SELECT id_ei FROM ev_ing";
                $registros = $conexion_insercionEV->query($selectQueryVerifica);

                if ($registros->num_rows == 0){

                    $insertQuery = "INSERT INTO ev_ing VALUES (1,'$idQFD','$nomQFD','$detalleComos','$nomSolucion','$puntajeEvaluacion')";
                    
                    if ($conexion_insercionEV->query($insertQuery) === TRUE){

                        header('Location: ../../pages/forms/FormQFDEvaluacionI.php');

                    }else{

                        //echo "Error: " . $sql . "<br>" . $conn->error;
                    } 

                }elseif ($registros->num_rows > 0){

                    $selectQueryMax = "SELECT MAX(id_ei) AS maximo FROM ev_ing";
                    $resultadoMax = mysqli_query($conexion_insercionEV,$selectQueryMax);        
        
                    $filaMax = mysqli_fetch_array($resultadoMax);
                    $codigoMax =  $filaMax["maximo"];

                    $nuevoCodigo = $codigoMax + 1;
                    
                    $insertQuery = "INSERT INTO ev_ing VALUES ($nuevoCodigo,'$idQFD','$nomQFD','$detalleComos','$nomSolucion','$puntajeEvaluacion')";
                    
                    if ($conexion_insercionEV->query($insertQuery) === TRUE){

                        header('Location: ../../pages/forms/FormQFDEvaluacionI.php');

                    }else{
                        //echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }  

            }else{
                    
                header('Location: ../../error_conexion.html');
                    
            }       
        }

        public function eliminacion_EVINGENIERIA($codEval){

            require_once("conexion.php"); 
            $conexion_eliminacionEV = conectar();

            if($conexion_eliminacionEV){

                $selectQuery = "SELECT id_ei FROM ev_ing WHERE id_ei = ".$codEval;
                $resultados = $conexion_eliminacionEV->query($selectQuery);

                if($resultados->num_rows > 0){

                    $deleteQuery = "DELETE FROM ev_ing WHERE id_ei = ".$codEval;

                    if($conexion_eliminacionEV->query($deleteQuery) === TRUE){

                        header('Location: ../../pages/forms/FormQFDEvaluacionI.php');

                    }else{

                    }

                }else{
                    echo "0 results";
                }

            }else{
                header('Location: ../../error_conexion.html');
            }
        }

        public function actualizacion_EVINGENIERIA($codEval,$idQFD,$detalleComos,$puntajeEvaluacion){

            require_once("conexion.php"); 
            $conexion_actualizacionEV = conectar();

            if($conexion_actualizacionEV){

                $selectQueryA = "SELECT nom_qfd FROM qfd WHERE id_qfd"." = ".$idQFD;
                $rs = mysqli_query($conexion_actualizacionEV,$selectQueryA);                           

                $fila = mysqli_fetch_array($rs);
                $nomQFD =  $fila["nom_qfd"];

                $selectQueryB = "SELECT nom_s FROM comos WHERE id_s"." = ".$detalleComos;
                $rs = mysqli_query($conexion_actualizacionEV,$selectQueryB);                           

                $fila = mysqli_fetch_array($rs);
                $nomSolucion =  $fila["nom_s"];

                $selectQuery = "SELECT id_ei FROM ev_ing WHERE id_ei "."= ".$codEval;
                $resultados = $conexion_actualizacionEV->query($selectQuery);

                if($resultados->num_rows > 0){

                    $updateQuery = "UPDATE ev_ing SET ID_QFD = '".$idQFD."' , NOM_QFD = '".$nomQFD."' , ID_COMO = '".$detalleComos."' , NOM_COMO = '".$nomSolucion."' , VIAB = '".$puntajeEvaluacion."' WHERE id_ei = ". $codEval ;
                
                    if($conexion_actualizacionEV->query($updateQuery) === TRUE){

                        header('Location: ../../pages/forms/FormQFDEvaluacionI.php');

                    }else{

                    }

                }else{
                    echo "0 results";
                }

            }else{

                header('Location: ../../error_conexion.html');

            }
        }
    }

    class COMOVSCOMO{

        public function insercion_CVC($codQFDCC,$codComoACC,$codComoBCC,$evaluacionCC){

            require_once("conexion.php"); 
            $conexion_insercionCVC = conectar();

            if($conexion_insercionCVC){

                $selectQueryQFD = "SELECT nom_qfd FROM qfd WHERE id_qfd =".$codQFDCC;
                $resultadoQFD = mysqli_query($conexion_insercionCVC,$selectQueryQFD);
                
                $filaQFD = mysqli_fetch_array($resultadoQFD);
                $nomQFD = $filaQFD["nom_qfd"];

                $selectQueryComoA = "SELECT nom_s FROM comos WHERE id_s =".$codComoACC;
                $resultadoComoA = mysqli_query($conexion_insercionCVC,$selectQueryComoA);
                
                $filaComoA = mysqli_fetch_array($resultadoComoA);
                $nomComoA = $filaComoA["nom_s"];

                $selectQueryComoB = "SELECT nom_s FROM comos WHERE id_s =".$codComoBCC;
                $resultadoComoB = mysqli_query($conexion_insercionCVC,$selectQueryComoB);
                
                $filaComoB = mysqli_fetch_array($resultadoComoB);
                $nomComoB = $filaComoB["nom_s"];

                $selectQuery = "SELECT id_ec FROM e_como ";
                $filasTotal = $conexion_insercionCVC->query($selectQuery);

                if($filasTotal->num_rows == 0){

                    $insertQuery = "INSERT INTO e_como VALUES(1,'$codQFDCC','$nomQFD','$nomComoA','$nomComoB','$evaluacionCC')";

                    if($conexion_insercionCVC->query($insertQuery) === TRUE){

                        header('Location: ../../pages/forms/FormQFDCvC.php');

                    }else{



                    }

                }elseif($filasTotal->num_rows > 0){

                    $selectQuery  = "SELECT MAX(id_ec) AS maximo FROM e_como ";
                    $resultadoQuery = mysqli_query($conexion_insercionCVC,$selectQuery);

                    $filasQuery = mysqli_fetch_array($resultadoQuery);
                    $codigoMayor = $filasQuery["maximo"];

                    $nuevoCodigo = $codigoMayor + 1;

                    $insertQuery = "INSERT INTO e_como VALUES($nuevoCodigo,'$codQFDCC','$nomQFD','$nomComoA','$nomComoB','$evaluacionCC')";

                    if($conexion_insercionCVC->query($insertQuery) === TRUE){

                        header('Location: ../../pages/forms/FormQFDCvC.php');

                    }else{



                    }

                }

            }else{

                header('Location: ../../error_conexion.html');

            }

        }

        public function eliminacion_CVC($codCvsC){

            require_once("conexion.php"); 
            $conexion_eliminacionCVC = conectar();

            if($conexion_eliminacionCVC){

                $selectQuery = "SELECT id_ec FROM e_como WHERE id_ec =".$codCvsC;
                $filasQuery = $conexion_eliminacionCVC->query($selectQuery);

                if($filasQuery->num_rows > 0){

                    $deleteQuery = "DELETE FROM e_como WHERE id_ec =".$codCvsC;

                    if($conexion_eliminacionCVC->query($deleteQuery) === TRUE){

                        header('Location: ../../pages/forms/FormQFDCvC.php');

                    }else{



                    }

                }else{

                    echo "0 resultados";

                }

            }else{

                header('Location: ../../error_conexion.html');

            }

        }

        public function actualizacion_CVC($codCvsC,$codQFDCC,$codComoACC,$codComoBCC,$evaluacionCC){

            require_once("conexion.php"); 
            $conexion_actualizacionCVC = conectar();

            if($conexion_actualizacionCVC){

                $selectQueryQFD = "SELECT nom_qfd FROM qfd WHERE id_qfd =".$codQFDCC;
                $resultadoQFD = mysqli_query($conexion_actualizacionCVC,$selectQueryQFD);
                
                $filaQFD = mysqli_fetch_array($resultadoQFD);
                $nomQFD = $filaQFD["nom_qfd"];

                $selectQueryComoA = "SELECT nom_como FROM a_como WHERE id_qfd =".$codComoACC;
                $resultadoComoA = mysqli_query($conexion_actualizacionCVC,$selectQueryComoA);
                
                $filaComoA = mysqli_fetch_array($resultadoComoA);
                $nomComoA = $filaComoA["nom_como"];

                $selectQueryComoB = "SELECT nom_como FROM a_como WHERE id_qfd =".$codComoBCC;
                $resultadoComoB = mysqli_query($conexion_actualizacionCVC,$selectQueryComoB);
                
                $filaComoB = mysqli_fetch_array($resultadoComoB);
                $nomComoB = $filaComoB["nom_como"];

                $selectQuery = "SELECT id_ec FROM e_como WHERE id_ec =".$codCvsC;
                $filasQuery = $conexion_actualizacionCVC->query($selectQuery);

                if($filasQuery->num_rows > 0){

                    $updateQuery = "UPDATE e_como SET ID_QFD = '".$codQFDCC."' , NOM_QFD = '".$nomQFD."' , COMOP = '".$nomComoA."' , COMOS = '".$nomComoB."' , EVALUACION = '".$evaluacionCC."' WHERE id_ec = ".$codCvsC ;
                
                    if($conexion_actualizacionCVC->query($updateQuery) === TRUE){

                        header('Location: ../../pages/forms/FormQFDCvC.php');

                    }else{

                    }

                }else{

                    echo "0 resultados";

                }


            }else{

                header('Location: ../../error_conexion.html');
                
            }

        }

    }

    class USUARIOS{

        public function insercion_USUARIOS($nombres,$apellidos,$nickname,$telefono,$celular,$ocupacion,$email,$contra){

            require_once("conexion.php"); 
            $conexion_insercionU = conectar();

            if($conexion_insercionU){

                $selectQueryVerifica = "SELECT id_usuario FROM usuarios";
                $registros = $conexion_insercionU->query($selectQueryVerifica);

                if ($registros->num_rows == 0){
                                 
                    $nuevaContra = password_hash($contra,PASSWORD_DEFAULT);

                    $insertQuery = "INSERT INTO usuarios  VALUES (1,'$nombres','$apellidos','$nickname','$telefono','$celular','$ocupacion','$email','$nuevaContra')";
                    
                    if($conexion_insercionU->query($insertQuery) === TRUE){  

                        header('Location: ../../index.php');

                    }else{
                        //echo "Error: " . $sql . "<br>" . $conn->error; 
                        echo "error1";
                    } 

                }elseif($registros->num_rows > 0){

                    $selectQueryMax = "SELECT MAX(id_usuario) AS maximo FROM usuarios ";
                    $resultadoMax = mysqli_query($conexion_insercionU,$selectQueryMax);   
                  
                    $filaMax = mysqli_fetch_array($resultadoMax);
                    $codigoMax =  $filaMax["maximo"];
                    $nuevoCodigo = $codigoMax + 1;

                    $nuevaContra = password_hash($contra,PASSWORD_DEFAULT);
                    
                    $insertQuery = "INSERT INTO usuarios  VALUES ($nuevoCodigo,'$nombres','$apellidos','$nickname','$telefono','$celular','$ocupacion','$email','$nuevaContra')";
                    
                    if($conexion_insercionU->query($insertQuery) === TRUE){

                        header('Location: ../../index.php');                        
                    
                    }else{
                        //echo "Error: " . $sql . "<br>" . $conn->error; 
                        echo "error 2";
                    }
                }

            }else{

                echo "No hay conexión";
                echo "error 3";

            }

        }

    }

    class EVALTECNICA{

        public function insercion_EVALTECNICA(){

            require_once("conexion.php"); 
            $conexion_insercionET = conectar();

        }

        public function eliminacion_EVALTECNICA(){

            require_once("conexion.php"); 
            $conexion_eliminacionET = conectar();

        }

        public function actualizacion_EVALTECNICA(){

            require_once("conexion.php"); 
            $conexion_actualizacionET = conectar();

        }

    }
?>
