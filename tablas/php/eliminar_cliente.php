<?php 
	require_once "conexion.php";
	$conexion=conexion();
	$id=$_POST['idCliente'];

	$sql="DELETE from clientes where idCliente='$id'";
	echo $result=mysqli_query($conexion,$sql);
 ?>