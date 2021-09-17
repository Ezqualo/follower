
<?php 
	require_once "conexion.php";
	$conexion=conexion();
	
	$nombreTabla=$_POST['nombreTabla'];
	if($nombreTabla == "piezas"){
		$id=$_POST['id'];

		$sql="DELETE from piezas where id='$id'";
		echo $result=mysqli_query($conexion,$sql);

	}elseif($nombreTabla == "piezasBrief"){
		$id=$_POST['id'];

		$sql="DELETE from piezasBrief where id='$id'";
		echo $result=mysqli_query($conexion,$sql);

	}else{
		$id=$_POST['id'];

		$sql="DELETE from comentarios where id='$id'";
		echo $result=mysqli_query($conexion,$sql);
	}
	
 ?>
