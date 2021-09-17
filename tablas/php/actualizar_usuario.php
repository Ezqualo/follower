<?php 
	require_once "conexion.php";
	$conexion=conexion();
	$id=$_POST['id'];
	$u=$_POST['usuario'];
	$g=$_POST['genero'];
	$n=$_POST['nombre'];
	$p=$_POST['password'];
	$i=$_POST['idRol'];
	$e=$_POST['estatus'];

	$sql="UPDATE usuarios SET usuario='$u', genero='$g', nombre='$n', password='$p', idRol='$i', estatus='$e' WHERE id='$id'";
	echo $result=mysqli_query($conexion,$sql);

 ?>