<?php
    require_once("constantes.php");
    
    function conectar(){
        $conexion = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                
        if(!$conexion){
                
            echo "No Conectado";
                
        }else{            
                     
            return $conexion;
                        
        }
    }   
?>