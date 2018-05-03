<?php 

require_once("conexion.php");
$conex = conectar();

   if(isset($_POST['id_codqfcomo1'])){

        $id_qfde1 = $_POST['id_codqfcomo1'];
    
        $query = "SELECT id_como, nom_como FROM a_como WHERE id_qfd = '$id_qfde1'";
        $resultado=mysqli_query($conex,$query);
        
        echo "<select class='form-control show-tick' name='codComoA' id='codComoA'>";
        echo "<option value='0'>Seleccione Como 1</option>";
        
        while($row = mysqli_fetch_assoc($resultado))
        {
            $html= "<option value='".$row['id_como']."'>".$row['nom_como']."</option>";
        }
        echo $html;

   }elseif(isset($_POST['id_codqfcomo1M'])){

        $id_qfde1 = $_POST['id_codqfcomo1M'];
        
        $query = "SELECT id_como, nom_como FROM a_como WHERE id_qfd = '$id_qfde1'";
        $resultado=mysqli_query($conex,$query);
        
        echo "<select class='form-control show-tick' name='codComoA' id='codComoAM'>";
        echo "<option value='0'>Seleccione Como 1</option>";
        
        while($row = mysqli_fetch_assoc($resultado))
        {
            $html= "<option value='".$row['id_como']."'>".$row['nom_como']."</option>";
        }
        echo $html;

   }

    
?>
