<?php 
	require_once "conexion.php";
	$conexion=conexion();

	$id_pieza=$_POST['id_pieza'];
	$horas=$_POST['horas'];
	$cambios=$_POST['cambios'];
	$recursos=$_POST['recursos'];
	$salida=$_POST['salida'];
	
	$folder = '../../img/vistaPrevia/';
	
    
	//$mysqli = new mysqli('localhost','root','password','ezqualof_follower');
	$mysqli = new mysqli('localhost', 'ezqualof_adminfollower', '3zqu4l0++', 'ezqualof_follower');
	$sql_pieza = $mysqli -> query("SELECT * FROM previaPiezas WHERE idPiezaOdt = '$id_pieza' AND fechafinal = '$salida'");
	$row_cnt = mysqli_num_rows($sql_pieza);
	
	//echo " num rows ".$row_cnt;

	if($row_cnt == 0){
		if(!file_exists($folder)){
			mkdir($folder, 0777) or die("Hubo un error al crear el directorio de almacenamiento");	
		}
	
			
			if($_FILES["imagen1"]){
				
				if($_FILES["imagen1"]["name"]) {
					// Nombres de archivos de temporales
					$n1 = $_FILES["imagen1"]["name"]; 
					//echo $n;
					$ruta = $_FILES["imagen1"]["tmp_name"]; 
					$tam_archivo = $_FILES["imagen1"]["size"];
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
	
						}
						closedir($dir);
					}
				}
			}
			if($_FILES["imagen2"]){
				

				if($_FILES["imagen2"]["name"]) {
					// Nombres de archivos de temporales
					$n2 = $_FILES["imagen2"]["name"]; 
					//echo $n;
					$ruta = $_FILES["imagen2"]["tmp_name"]; 
					$tam_archivo = $_FILES["imagen2"]["size"];
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
	
						}
						closedir($dir);
					}
				}
			}
			if($_FILES["imagen3"]){
				

				if($_FILES["imagen3"]["name"]) {
					// Nombres de archivos de temporales
					$n3 = $_FILES["imagen3"]["name"]; 
					//echo $n;
					$ruta = $_FILES["imagen3"]["tmp_name"]; 
					$tam_archivo = $_FILES["imagen3"]["size"];
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
	
						}
						closedir($dir);
					}
				}
			}
			if($_FILES["archivo"]){
				

				if($_FILES["archivo"]["name"]) {
					// Nombres de archivos de temporales
					$a = $_FILES["archivo"]["name"]; 
					//echo $n;
					$ruta = $_FILES["archivo"]["tmp_name"]; 
					$tam_archivo = $_FILES["archivo"]["size"];
					//anexar hora de creacion para evitar errores.
					$aux1 = explode('.',$a);
					$aux2=array_pop($aux1);
					$aux1 = implode('.',$aux1);
					$a = $aux1."-".time().".".$aux2;
					
					if($tam_archivo > 5242880){
					}
					else{
						$dir=opendir($folder);
						if(move_uploaded_file($ruta,$folder.'/'.$a)) {	
	
						}
						closedir($dir);
					}
				}
			}
				$sql="INSERT INTO previaPiezas (idPiezaOdt,fechafinal,horas,recursos,cambios,imagen1,imagen2, imagen3,archivo) VALUES ('$id_pieza','$salida','$horas','$recursos','$cambios','$n1','$n2','$n3','$a')";

		
		echo $result=mysqli_query($conexion,$sql);
		
	} else{
		while ($row_pieza = mysqli_fetch_array($sql_pieza)) {
			$id = $row_pieza[0];
		}

		$txt=",";

		if($_FILES["imagen1"] ){
			if($_FILES["imagen1"]["name"]) {
				// Nombres de archivos de temporales
				$n1 = $_FILES["imagen1"]["name"]; 
				$ruta = $_FILES["imagen1"]["tmp_name"]; 
				$tam_archivo = $_FILES["imagen1"]["size"];
				$aux1 = explode('.',$n1);
				$aux2=array_pop($aux1);
				$aux1 = implode('.',$aux1);
				$n1 = $aux1."-".time().".".$aux2;
				
				if($tam_archivo > 5242880){
				}
				else{
					$dir=opendir($folder);
					if(move_uploaded_file($ruta,$folder.'/'.$n1)) {	
						$txt=$txt."imagen1='".$n1."',";
					}
					closedir($dir);
				}
			}
		}
		if($_FILES["imagen2"] ){
			if($_FILES["imagen2"]["name"]) {
				// Nombres de archivos de temporales
				$n1 = $_FILES["imagen2"]["name"]; 
				$ruta = $_FILES["imagen2"]["tmp_name"]; 
				$tam_archivo = $_FILES["imagen2"]["size"];
				$aux1 = explode('.',$n1);
				$aux2=array_pop($aux1);
				$aux1 = implode('.',$aux1);
				$n1 = $aux1."-".time().".".$aux2;
				
				if($tam_archivo > 5242880){
				}
				else{
					$dir=opendir($folder);
					if(move_uploaded_file($ruta,$folder.'/'.$n1)) {	
						$txt=$txt."imagen2='".$n1."',";
					}
					closedir($dir);
				}
			}
		}
		if($_FILES["imagen3"] ){
			if($_FILES["imagen3"]["name"]) {
				// Nombres de archivos de temporales
				$n1 = $_FILES["imagen3"]["name"]; 
				$ruta = $_FILES["imagen3"]["tmp_name"]; 
				$tam_archivo = $_FILES["imagen3"]["size"];
				$aux1 = explode('.',$n1);
				$aux2=array_pop($aux1);
				$aux1 = implode('.',$aux1);
				$n1 = $aux1."-".time().".".$aux2;
				
				if($tam_archivo > 5242880){
				}
				else{
					$dir=opendir($folder);
					if(move_uploaded_file($ruta,$folder.'/'.$n1)) {	
						$txt=$txt."imagen3='".$n1."',";
					}
					closedir($dir);
				}
			}
		}

		$txt2=",";

		if($_FILES["archivo"] ){
			
			if($_FILES["archivo"]["name"]) {
				// Nombres de archivos de temporales

				$a1 = $_FILES["archivo"]["name"];
				
				$ruta = $_FILES["archivo"]["tmp_name"]; 
				$tam_archivo = $_FILES["archivo"]["size"];
				$aux1 = explode('.',$a1);
				$aux2=array_pop($aux1);
				$aux1 = implode('.',$aux1);
				$a1 = $aux1."-".time().".".$aux2;
				
				if($tam_archivo > 5242880){
				}
				else{
					$dir=opendir($folder);
					if(move_uploaded_file($ruta,$folder.'/'.$a1)) {	
						$txt2=$txt2."archivo='".$a1."',";
					}
					closedir($dir);
				}
			}
		}

		
		$txt=substr($txt, 0, -1);
		$txt2=substr($txt2, 0, -1);
		//echo($txt);$salida=$_POST['salida'];
		$sql="UPDATE previaPiezas SET idPiezaOdt='$id_pieza', horas='$horas', recursos='$recursos', cambios='$cambios',fechafinal='$salida' $txt $txt2 WHERE id='$id'";
		echo $result=mysqli_query($conexion,$sql);
		//echo $sql;
	}
	//echo $sql;
 ?>
