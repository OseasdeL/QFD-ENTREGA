<?php 

 require_once("conexion.php");
 $conex = conectar();

    if(isset($_POST['id_codqfdcomo'])){

        $id_qfdcod = $_POST['id_codqfdcomo'];
	
        $query = "SELECT id_como, nom_como FROM a_como WHERE id_qfd = '$id_qfdcod'";
        $resultado=mysqli_query($conex,$query);
        
        echo "<select class='form-control show-tick' name='codigoComo' id='codigoComo'>";
        echo "<option value='0'>Seleccione un Como</option>";
        
        while($row = mysqli_fetch_assoc($resultado))
        {
            $html= "<option value='".$row['id_como']."'>".$row['nom_como']."</option>";
        }
        echo $html;

    }elseif(isset($_POST['id_codqfdcomoM'])){

        $id_qfdcod = $_POST['id_codqfdcomoM'];
	
        $query = "SELECT id_como, nom_como FROM a_como WHERE id_qfd = '$id_qfdcod'";
        $resultado=mysqli_query($conex,$query);
        
        echo "<select class='form-control show-tick' name='codigoComo' id='codigoComoM'>";
        echo "<option value='0'>Seleccione un Como</option>";
        
        while($row = mysqli_fetch_assoc($resultado))
        {
            $html= "<option value='".$row['id_como']."'>".$row['nom_como']."</option>";
        }
        echo $html;

    }
 
?>
