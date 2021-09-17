<?php 
	require_once "../tablas/php/conexion.php";
	$conexion=conexion();

	$tabla=$_POST['tabla'];

    if($tabla == "odt"){
        $n=$_POST['nombre'];
        $c=$_POST['codigo'];

        $sql1="UPDATE odts SET semaforo='$c' WHERE proyecto='$n'";
        echo $result1=mysqli_query($conexion,$sql1);
        
    } elseif($tabla == "odt_pieza"){
        $n=$_POST['nombre'];
        $c=$_POST['codigo'];

        $sql2="UPDATE piezas SET semaforo='$c' WHERE nombre='$n'";
        echo $result2=mysqli_query($conexion,$sql2);

    } elseif($tabla == "brief"){
        $n=$_POST['nombre'];
        $c=$_POST['codigo'];

        $sql3="UPDATE briefs SET semaforo='$c' WHERE nombre='$n'";
        echo $result3=mysqli_query($conexion,$sql3);

    } elseif($tabla == "brief_pieza"){
        $n=$_POST['nombre'];
        $c=$_POST['codigo'];

        $sql4="UPDATE piezasBrief SET semaforo='$c' WHERE nombre='$n'";
        echo $result4=mysqli_query($conexion,$sql4);

    } elseif($tabla == "comentarios"){
        $p=$_POST['proyecto'];
        $pi=$_POST['pieza'];
        $c=$_POST['codigo'];
        $n=$_POST['nombre'];

        $sql5="UPDATE comentarios SET semaforo='$c' WHERE proyecto ='$p' AND pieza = '$pi' AND nombre = '$n'";
        echo $result5=mysqli_query($conexion,$sql5);

    } 
	
 ?>
