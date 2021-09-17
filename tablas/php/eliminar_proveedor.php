<?php 
	require_once "conexion.php";
	$conexion=conexion();
	$id=$_POST['idProveedor'];

	$sql="DELETE from proveedores where id='$id'";
	echo $result=mysqli_query($conexion,$sql);
 ?>