<?php 

require_once("conexion.php");
$conex = conectar();

    if(isset($_POST['id_codqfcomo2'])){

        $id_qfde2 = $_POST['id_codqfcomo2'];
   
        $query = "SELECT id_como, nom_como FROM a_como WHERE id_qfd = '$id_qfde2'";
        $resultado=mysqli_query($conex,$query);
        
        echo "<select class='form-control show-tick' name='codComoB' id='codComoB'>";
        echo "<option value='0'>Seleccione Como 2</option>";
        
        while($row = mysqli_fetch_assoc($resultado))
        {
            $html= "<option value='".$row['id_como']."'>".$row['nom_como']."</option>";
        }
        echo $html;

    }elseif(isset($_POST['id_codqfcomo2M'])){

        $id_qfde2 = $_POST['id_codqfcomo2M'];
   
        $query = "SELECT id_como, nom_como FROM a_como WHERE id_qfd = '$id_qfde2'";
        $resultado=mysqli_query($conex,$query);
        
        echo "<select class='form-control show-tick' name='codComoB' id='codComoBM'>";
        echo "<option value='0'>Seleccione Como 2</option>";
        
        while($row = mysqli_fetch_assoc($resultado))
        {
            $html= "<option value='".$row['id_como']."'>".$row['nom_como']."</option>";
        }
        echo $html;

    }

?>
