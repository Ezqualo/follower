<?php 

	require_once "conexion.php";
	$conexion=conexion();
	$n=$_POST['nombre'];
	$a=$_POST['apellido'];
	$e=$_POST['email'];
	$t=$_POST['telefono'];
	$ar=$_POST['area'];
	$per=$_POST['persona'];
	$pro=$_POST['proyecto'];
	$pieza=$_POST['pieza'];
	$fechaAnterior=$_POST['fechaAnterior'];

	$mystring = 'abc';
	$findme   = 'cod951';
	$pos = strpos($pro, $findme);

	if ($pos === false) {
		//echo "The string '$findme' was not found in the string '$mystring'";
		$p = $pro;
	} else {
		//echo "The string '$findme' was found in the string '$mystring'";
		//echo " and exists at position $pos";
		$resultado = str_replace("cod951", "&", $pro);
		$p = $resultado;
	}
	
	$pos2 = strpos($pieza, $findme);
	if ($pos2 === false) {
		//echo "The string '$findme' was not found in the string '$mystring'";
		$pi = $pieza;
	} else {
		//echo "The string '$findme' was found in the string '$mystring'";
		//echo " and exists at position $pos";
		$resultado2 = str_replace("cod951", "&", $pieza);
		$pi = $resultado2;
	}
	
	$sql="INSERT into comentarios (nombre,fechaInicio,fechaFinal,comentario,area,persona,proyecto,pieza,semaforo,fechaAnterior)
								values ('$n','$a','$e','$t','$ar','$per','$p','$pi','#FFC500','$fechaAnterior')";
	echo $result=mysqli_query($conexion,$sql);
	//echo $sql;

 ?>

