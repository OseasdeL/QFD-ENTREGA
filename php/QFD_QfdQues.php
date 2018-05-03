<?php 

require_once("conexion.php");
$conex = conectar();

    if(isset($_POST['id_codqfdque'])){

        $id_qfdcod = $_POST['id_codqfdque'];
   
        $query = "SELECT id_que, nom_que FROM a_que WHERE id_qfd = '$id_qfdcod'";
        $resultado=mysqli_query($conex,$query);
        
        echo "<select class='form-control show-tick' name='codQueBench' id='codQueBench'>";
        echo "<option value='0'>Seleccione un Que</option>";
        
        while($row = mysqli_fetch_assoc($resultado))
        {
            $html= "<option value='".$row['id_que']."'>".$row['nom_que']."</option>";
        }
        echo $html;

    }elseif(isset($_POST['id_codqfdqueM'])){

        $id_qfdcod = $_POST['id_codqfdqueM'];
   
        $query = "SELECT id_que, nom_que FROM a_que WHERE id_qfd = '$id_qfdcod'";
        $resultado=mysqli_query($conex,$query);
        
        echo "<select class='form-control show-tick' name='codQueBench' id='codQueBenchM'>";
        echo "<option value='0'>Seleccione un Que</option>";
        
        while($row = mysqli_fetch_assoc($resultado))
        {
            $html= "<option value='".$row['id_que']."'>".$row['nom_que']."</option>";
        }
        echo $html;

    }

    
?>