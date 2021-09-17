<?php 
	require_once "conexion.php";
	$conexion=conexion();
    
	$c=$_POST['comentario'];
	$co=$_POST['color_event'];
	$d=$_POST['dia_event'];
	$com=$_POST['coment_asig'];
	$pro=$_POST['proyectoe'];
	$pieza=$_POST['piezae'];
	$m="";

	$findme   = 'cod951';
	$pos = strpos($pro, $findme);

	if ($pos === false) {
		$p = $pro;
	} else {
		$resultado = str_replace("cod951", "&", $pro);
		$p = $resultado;
	}
	
	$pos2 = strpos($pieza, $findme);
	if ($pos2 === false) {
		$pi = $pieza;
	} else {
		$resultado2 = str_replace("cod951", "&", $pieza);
		$pi = $resultado2;
	}

    $sql="INSERT into eventos (comentario,dia,color,comentarioAsignado,pieza,proyecto,motivo)
                 values ('$c','$d','$co','$com','$pi','$p','')";
    echo $result=mysqli_query($conexion,$sql);

 ?>

