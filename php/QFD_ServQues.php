<?php 

	require_once("conexion.php");
	$conex = conectar();
	
	if(isset($_POST['id_servqfd'])){

		$id_municipio = $_POST['id_servqfd'];
	
		$query = "SELECT id_que, nom_que FROM ques WHERE id_ps = '$id_municipio'";
		$resultado=mysqli_query($conex,$query);
		
		echo "<select class='form-control show-tick' name='Cques' id='Cques'>";
		echo "<option value='0'>Seleccione Necesidades</option>";
		
		while($row = mysqli_fetch_assoc($resultado))
		{
			$html= "<option value='".$row['id_que']."'>".$row['nom_que']."</option>";
		}
		echo $html;

	}elseif(isset($_POST['id_servqfdM'])){

		$id_municipio = $_POST['id_servqfdM'];
	
		$query = "SELECT id_que, nom_que FROM ques WHERE id_ps = '$id_municipio'";
		$resultado=mysqli_query($conex,$query);
		
		echo "<select class='form-control show-tick' name='Cques' id='CquesM'>";
		echo "<option value='0'>Seleccione Necesidades</option>";
		
		while($row = mysqli_fetch_assoc($resultado))
		{
			$html= "<option value='".$row['id_que']."'>".$row['nom_que']."</option>";
		}
		echo $html;

	}
	
	
?>
