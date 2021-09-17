<?php 
	require_once "conexion.php";
	$conexion=conexion();
	$id=$_POST['id'];
    $id_odt=$_POST['id_odt'];
    $nombre=$_POST['nombre'];
    $caracteristicas=$_POST['caracteristicas'];
    $medidas=$_POST['medidas'];
    $fechaSalida=$_POST['fechaSalida'];
    $fechaAnt=$_POST['fechaAnt'];

    $sql="UPDATE piezas SET nombre='$nombre',caracteristicas='$caracteristicas',medidas='$medidas',fechaSalida='$fechaSalida', fechaAnterior = '$fechaAnt' WHERE id='$id' and idPieza='$id_odt'";
    echo $result=mysqli_query($conexion,$sql);
 ?>
