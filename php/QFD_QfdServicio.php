<?php 
    require_once("conexion.php");
    $conex = conectar();

    if(isset($_POST['id_codqfd'])){

        $id_codqfd = $_POST['id_codqfd'];

        $queryM = "SELECT id_ps, nom_ps FROM qfd WHERE id_qfd = '$id_codqfd' ";
        $resultadoServicio = mysqli_query($conex,$queryM);

        echo"<select class='form-control show-tick' name='Cservicios' id='Cservicios'> ";

   
        echo "<option value='0'>Seleccione Producto/Servicio</option>";

        while($rowM = mysqli_fetch_assoc($resultadoServicio))
        {
            $html= "<option value='".$rowM['id_ps']."'>".$rowM['nom_ps']."</option>";
        }

        echo $html;

        echo "</select>";

    }elseif(isset($_POST['id_codqfdM'])){

        $id_codqfd = $_POST['id_codqfdM'];

        $queryM = "SELECT id_ps, nom_ps FROM qfd WHERE id_qfd = '$id_codqfd' ";
        $resultadoServicio = mysqli_query($conex,$queryM);

        echo"<select class='form-control show-tick' name='Cservicios' id='CserviciosM'> ";

   
        echo "<option value='0'>Seleccione Producto/Servicio</option>";

        while($rowM = mysqli_fetch_assoc($resultadoServicio))
        {
            $html= "<option value='".$rowM['id_ps']."'>".$rowM['nom_ps']."</option>";
        }

        echo $html;

        echo "</select>";

    }
        
?>