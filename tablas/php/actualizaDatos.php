<?php 
	require_once "conexion.php";
	$conexion=conexion();

	$nombreTabla=$_POST['nombreTabla'];

	if($nombreTabla == "piezas"){
		$id=$_POST['id'];
		$n=$_POST['nombre'];
		$c=$_POST['caracteristicas'];
		$m=$_POST['medidas'];
		$fi=$_POST['fechaInicio'];
		$fa=$_POST['fechaSalida'];
		$fAn=$_POST['fechaAnterior'];

		$sql="UPDATE piezas SET nombre='$n', caracteristicas='$c', medidas='$m', fechaInicio='$fi', fechaSalida='$fa', fechaAnterior= '$fAn' WHERE id='$id'";
		echo $result=mysqli_query($conexion,$sql);

		//$sql2 = "UPDATE piezas SET comentarioAsignado = '$n', pieza = '$n' WHERE id='$id'";

	} elseif($nombreTabla == "piezasBrief"){
		$id=$_POST['id'];
		$n=$_POST['nombre'];
		$c=$_POST['caracteristicas'];
		$m=$_POST['medidas'];
		$fi=$_POST['fechaInicio'];
		$fa=$_POST['fechaSalida'];
		$fAn=$_POST['fechaAnterior'];

		$sql="UPDATE piezasBrief SET nombre='$n', caracteristicas='$c', medidas='$m', fechaInicio='$fi', fechaSalida='$fa', fechaAnterior= '$fAn' WHERE id='$id'";
		echo $result=mysqli_query($conexion,$sql);

		//$sql2 = "UPDATE piezas SET comentarioAsignado = '$n', pieza = '$n' WHERE id='$id'";

	} else {
		$id=$_POST['id'];
		$n=$_POST['nombre'];
		$a=$_POST['apellido'];
		$e=$_POST['email'];
		$t=$_POST['telefono'];
		$ar=$_POST['area'];
		$per=$_POST['persona'];
		$p=$_POST['proyecto'];
		$pi=$_POST['pieza'];
		$fechaAnterior=$_POST['fechaAnterior'];
	
		$sql="UPDATE comentarios SET nombre='$n', fechaInicio='$a', fechaFinal='$e', comentario='$t', area='$ar', persona='$per', proyecto='$p', pieza='$pi', fechaAnterior='$fechaAnterior' WHERE id='$id'";
		echo $result=mysqli_query($conexion,$sql);
	}


	

 ?>


