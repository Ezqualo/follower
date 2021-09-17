<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	require_once "conexion.php";
	$conexion=conexion();
    $id=$_POST['id'];
    $n=$_POST['nombre'];
	$e=$_POST['empresa'];
	$mar=$_POST['marca'];
	$d=$_POST['direccion'];
    $p=$_POST['puesto'];
	$m=$_POST['mail'];
	$ma=$_POST['mailalt'];
	$t=$_POST['telefono'];
	$w=$_POST['whatsapp'];
    $ej=$_POST['ejecutivas'];
	$txt=",";
	$folder = '../../img/clientes/';
	if(!file_exists($folder)){
		mkdir($folder, 0777) or die("Hubo un error al crear el directorio de almacenamiento");	
	}
    if(!empty($_FILES["foto1"] )){
		if($_FILES["foto1"]["name"]) {
			// Nombres de archivos de temporales
			$n1 = $_FILES["foto1"]["name"]; 
			$ruta = $_FILES["foto1"]["tmp_name"]; 
			$tam_archivo = $_FILES["foto1"]["size"];

			//anexar hora de creacion para evitar errores.
			$aux1 = explode('.',$n1);
			$aux2=array_pop($aux1);
			$aux1 = implode('.',$aux1);
			$n1 = $aux1."-".time().".".$aux2;
			
			if($tam_archivo > 5242880){
			}
			else{
				$dir=opendir($folder);
				if(move_uploaded_file($ruta,$folder.'/'.$n1)) {	
					$txt=$txt." foto1='".$n1."',";
				}
				closedir($dir);
			}
		}
	}

	if(!empty($_FILES["foto2"])){
		if($_FILES["foto2"]["name"]) {
			// Nombres de archivos de temporales
			$n2 = $_FILES["foto2"]["name"]; 
			$ruta = $_FILES["foto2"]["tmp_name"]; 
			$tam_archivo = $_FILES["foto2"]["size"];

			//anexar hora de creacion para evitar errores.
			$aux1 = explode('.',$n2);
			$aux2=array_pop($aux1);
			$aux1 = implode('.',$aux1);
			$n2 = $aux1."-".time().".".$aux2;
			
			if($tam_archivo > 5242880){
			}
			else{
				$dir=opendir($folder);

				if(move_uploaded_file($ruta,$folder.'/'.$n2)) {	
					$txt=$txt." foto2='".$n2."',";
				}
				closedir($dir);
			}
		}
	}

	if(!empty($_FILES["foto3"])){
		if($_FILES["foto3"]["name"]) {
			// Nombres de archivos de temporales
			$n3 = $_FILES["foto3"]["name"]; 
			$ruta = $_FILES["foto3"]["tmp_name"]; 
			$tam_archivo = $_FILES["foto3"]["size"];

			//anexar hora de creacion para evitar errores.
			$aux1 = explode('.',$n3);
			$aux2=array_pop($aux1);
			$aux1 = implode('.',$aux1);
			$n3 = $aux1."-".time().".".$aux2;
			
			if($tam_archivo > 5242880){
			}
			else{
				$dir=opendir($folder);
				if(move_uploaded_file($ruta,$folder.'/'.$n3)) {	
					$txt=$txt." foto3='".$n3."',";
				}
				closedir($dir);
			}
		}
	}
	$txt=substr($txt, 0, -1);
	$sql="UPDATE clientes SET nombreCliente='$n', puestoCliente='$p', empresaCliente='$e', marcaCliente='$mar', direccion='$d', mailCliente='$m', mailalternoCliente='$ma', telCliente='$t', waCliente='$w', ejecutivasCliente='$ej'".$txt." WHERE idCliente='$id'";
	echo $result=mysqli_query($conexion,$sql);

 ?>
