<?php 

require_once("conexion.php");
$conex = conectar();

    if(isset($_POST['id_codqfdcomp'])){

        $id_qfdcodcomp = $_POST['id_codqfdcomp'];
   
        $query = "SELECT id_competencia, nombre FROM competencia WHERE id_c = '$id_qfdcodcomp'";
        $resultado=mysqli_query($conex,$query);
        
        echo "<select class='form-control show-tick' name='codCompBench' id='codCompBench'>";
        echo "<option value='0'>Seleccione Competencia</option>";
        
        while($row = mysqli_fetch_assoc($resultado))
        {
            $html= "<option value='".$row['id_competencia']."'>".$row['nombre']."</option>";
        }
        echo $html;

    }elseif(isset($_POST['id_codqfdcompM'])){

        $id_qfdcodcomp = $_POST['id_codqfdcompM'];
   
        $query = "SELECT id_competencia, nombre FROM competencia WHERE id_c = '$id_qfdcodcomp'";
        $resultado=mysqli_query($conex,$query);
        
        echo "<select class='form-control show-tick' name='codCompBench' id='codCompBenchM'>";
        echo "<option value='0'>Seleccione Competencia</option>";
        
        while($row = mysqli_fetch_assoc($resultado))
        {
            $html= "<option value='".$row['id_competencia']."'>".$row['nombre']."</option>";
        }
        echo $html;

    }

   
?>