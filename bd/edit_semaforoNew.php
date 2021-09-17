<?php 
	require_once "../tablas/php/conexion.php";
	$conexion=conexion();

	$tabla=$_POST['tabla'];

    if($tabla == "odt"){
        $n=$_POST['id'];
        $c=$_POST['codigo'];

        $sql="UPDATE odts SET semaforo='$c' WHERE id='$n'";
        echo $result=mysqli_query($conexion,$sql);

    } elseif($tabla == "odt_pieza"){
        $n=$_POST['id'];
        $c=$_POST['codigo'];

        $sql="UPDATE piezas SET semaforo='$c' WHERE id='$n'";
        echo $result=mysqli_query($conexion,$sql);

    } elseif($tabla == "brief"){
        $n=$_POST['id'];
        $c=$_POST['codigo'];

        $sql="UPDATE briefs SET semaforo='$c' WHERE id='$n'";
        echo $result=mysqli_query($conexion,$sql);

    } elseif($tabla == "brief_pieza"){
        $n=$_POST['id'];
        $c=$_POST['codigo'];

        $sql="UPDATE piezasBrief SET semaforo='$c' WHERE id='$n'";
        echo $result=mysqli_query($conexion,$sql);

    } elseif($tabla == "comentarios"){
        $c=$_POST['codigo'];
        $n=$_POST['id'];

        $sql="UPDATE comentarios SET semaforo='$c' WHERE id = '$n'";
        echo $result=mysqli_query($conexion,$sql);

    } 
	
 ?>
