<?php 
	require_once "conexion.php";
	$conexion=conexion();
	$id=$_POST['id'];
    $id_brief=$_POST['id_brief'];
    $nombre=$_POST['nombre'];
    $caracteristicas=$_POST['caracteristicas'];
    $medidas=$_POST['medidas'];
    $fechaSalida=$_POST['fechaSalida'];
    $fechaAnterior=$_POST['fechaAnterior'];

    $sql="UPDATE piezasBrief SET nombre='$nombre',caracteristicas='$caracteristicas',medidas='$medidas',fechaSalida='$fechaSalida', fechaAnterior='$fechaAnterior' WHERE id='$id' and idPieza='$id_brief'";
    echo $result=mysqli_query($conexion,$sql);
 ?>
