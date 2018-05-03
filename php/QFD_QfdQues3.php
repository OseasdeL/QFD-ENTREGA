<?php 

require_once("conexion.php");
$conex = conectar();

   
    if(isset($_POST['id_codqfevaluacion'])){

        $id_qfdevaluacion = $_POST['id_codqfevaluacion'];
   
        $query = "SELECT id_como, nom_como FROM a_como WHERE id_qfd = '$id_qfdevaluacion'";
        $resultado=mysqli_query($conex,$query);
        
        echo "<select class='form-control show-tick' name='codComoEval' id='codComoEval'>";
        echo "<option value='0'>Seleccione un Como</option>";
        
        while($row = mysqli_fetch_assoc($resultado))
        {
            $html= "<option value='".$row['id_como']."'>".$row['nom_como']."</option>";
        }
        echo $html;

    }elseif(isset($_POST['id_codqfevaluacionM'])){

        $id_qfdevaluacion = $_POST['id_codqfevaluacionM'];
   
        $query = "SELECT id_como, nom_como FROM a_como WHERE id_qfd = '$id_qfdevaluacion'";
        $resultado=mysqli_query($conex,$query);
        
        echo "<select class='form-control show-tick' name='codComoEval' id='codComoEvalM'>";
        echo "<option value='0'>Seleccione un Como</option>";
        
        while($row = mysqli_fetch_assoc($resultado))
        {
            $html= "<option value='".$row['id_como']."'>".$row['nom_como']."</option>";
        }
        echo $html;

    }
    
?>