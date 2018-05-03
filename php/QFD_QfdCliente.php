<?php 
require_once("conexion.php");
$conex = conectar();

    if(isset($_POST['id_codqfdcliente'])){

        $id_qfdcodcliente = $_POST['id_codqfdcliente'];
   
        $query = "SELECT id_c, nom_c FROM qfd WHERE id_qfd = '$id_qfdcodcliente'";
        $resultado=mysqli_query($conex,$query);
        
        echo "<select class='form-control show-tick' name='codClienteBench' id='codClienteBench'>";
        echo "<option value='0'>Seleccione un Cliente</option>";
        
        while($row = mysqli_fetch_assoc($resultado))
        {
            $html= "<option value='".$row['id_c']."'>".$row['nom_c']."</option>";
        }
        echo $html;

    }elseif(isset($_POST['id_codqfdclienteM'])){

        $id_qfdcodcliente = $_POST['id_codqfdclienteM'];
   
        $query = "SELECT id_c, nom_c FROM qfd WHERE id_qfd = '$id_qfdcodcliente'";
        $resultado=mysqli_query($conex,$query);
        
        echo "<select class='form-control show-tick' name='codClienteBench' id='codClienteBenchM'>";
        echo "<option value='0'>Seleccione un Cliente</option>";
        
        while($row = mysqli_fetch_assoc($resultado))
        {
            $html= "<option value='".$row['id_c']."'>".$row['nom_c']."</option>";
        }
        echo $html;

    }
?>