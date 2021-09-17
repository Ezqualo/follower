<?php 
	require_once "conexion.php";
	$conexion=conexion();

	$id=$_POST['id'];
	$c=$_POST['comentario'];
	$d=$_POST['dia'];
	$co=$_POST['color'];
	$com=$_POST['coment_asig'];
	$m=$_POST['motivo'];
	$p=$_POST['proyecto'];
	$pi=$_POST['pieza'];

	$sql="UPDATE eventos SET comentario='$c', dia='$d', color='$co', comentarioAsignado='$com', motivo='$m', proyecto='$p', pieza='$pi' WHERE id='$id'";
	echo $result=mysqli_query($conexion,$sql);

 ?>
