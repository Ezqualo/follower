<?php
	require_once "conexion.php";
	$conexion=conexion();
	$sql="SELECT * FROM historial";
	$result=mysqli_query($conexion,$sql);
	echo("inicio de consulta<br>");
	while ($row = mysqli_fetch_array($result)) {
		echo ("id=".$row[0]." personal=".$row[1]." departamento=".$row[2]." responsable=".$row[3]." fecha=".$row[4]." registro=".$row[5]);
		echo("<br>");
	}
	echo("Fin de consulta");
?>
