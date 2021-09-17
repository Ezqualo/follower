<?php 

	require_once "conexion.php";
	$conexion=conexion();
	
	$u=$_POST['usuario'];
	$g=$_POST['genero'];
	$n=$_POST['nombre'];
	$p=$_POST['password'];
	$i=$_POST['idRol'];
	$e=$_POST['estatus'];

	$sql="INSERT into usuarios (usuario,genero,nombre,password,idRol,estatus)
								values ('$u','$g','$n','$p','$i','$e')";
	echo $result=mysqli_query($conexion,$sql);

 ?>