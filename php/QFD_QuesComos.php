<?php 

require_once("conexion.php");
$conex = conectar();
	
	if(isset($_POST['id_queqfd'])){

		$id_municipio = $_POST['id_queqfd'];
	
		$query = "SELECT id_s, nom_s FROM comos WHERE id_que = '$id_municipio'";
		$resultado=mysqli_query($conex,$query);
		
		echo "<select class='form-control show-tick' name='Ccomos' id='Ccomos'>";
		echo "<option value='0'>Seleccione las Soluciones</option>";
		
		while($row = mysqli_fetch_assoc($resultado))
		{
			$html= "<option value='".$row['id_s']."'>".$row['nom_s']."</option>";
		}
		echo $html;

	}elseif(isset($_POST['id_queqfdM'])){

		$id_municipio = $_POST['id_queqfdM'];
	
		$query = "SELECT id_s, nom_s FROM comos WHERE id_que = '$id_municipio'";
		$resultado=mysqli_query($conex,$query);
		
		echo "<select class='form-control show-tick' name='Ccomos' id='CcomosM'>";
		echo "<option value='0'>Seleccione las Soluciones</option>";
		
		while($row = mysqli_fetch_assoc($resultado))
		{
			$html= "<option value='".$row['id_s']."'>".$row['nom_s']."</option>";
		}
		echo $html;

	}
	
?>