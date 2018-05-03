<?php 

require_once("conexion.php");
$conex = conectar();


if(isset($_POST['id_codcomo'])){

    $id_qfde2 = $_POST['id_codcomo'];

    $query = "SELECT id_matriz, nom_como FROM mat_r WHERE id_qfd = '$id_qfde2' GROUP BY NOM_COMO";
    $resultado=mysqli_query($conex,$query);
    
    echo "<select class='form-control show-tick' name='codigoComo' id='codigoComo'>";
    echo "<option value='0'>Seleccione Como</option>";
    
    while($row = mysqli_fetch_assoc($resultado))
    {
        $html= "<option value='".$row['id_matriz']."'>".$row['nom_como']."</option>";
    }
    echo $html;

}
?>