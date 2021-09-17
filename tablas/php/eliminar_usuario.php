<?php 
	require_once "conexion.php";
	$conexion=conexion();
	$id=$_POST['id'];

	$sql="DELETE from usuarios where id='$id'";
	echo $result=mysqli_query($conexion,$sql);
 ?>