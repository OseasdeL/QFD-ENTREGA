<?php 
require_once("conexion.php");
$conex = conectar();

    if(isset($_POST['id_codqfcliente'])){

        $id_qfdcodcliente = $_POST['id_codqfcliente'];
   
        $query = "SELECT id_ps, nom_ps FROM prod_serv WHERE id_c = '$id_qfdcodcliente'";
        $resultado=mysqli_query($conex,$query);
        
        echo "<select class='form-control show-tick' name='idnomPS' id='idnomPS'>";
        echo "<option value='0'>Seleccione Producto/Servicio</option>";
        
        while($row = mysqli_fetch_assoc($resultado))
        {
            $html= "<option value='".$row['id_ps']."'>".$row['nom_ps']."</option>";
        }
        echo $html;

    }elseif(isset($_POST['id_codqfclienteM'])){

        $id_qfdcodcliente = $_POST['id_codqfclienteM'];
   
        $query = "SELECT id_ps, nom_ps FROM prod_serv WHERE id_c = '$id_qfdcodcliente'";
        $resultado=mysqli_query($conex,$query);
        
        echo "<select class='form-control show-tick' name='idnomPS' id='idnomPSM'>";
        echo "<option value='0'>Seleccione Producto/Servicio</option>";
        
        while($row = mysqli_fetch_assoc($resultado))
        {
            $html= "<option value='".$row['id_ps']."'>".$row['nom_ps']."</option>";
        }
        echo $html;

    }
?>