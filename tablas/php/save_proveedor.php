<?php 

	require_once "conexion.php";
	$conexion=conexion();

	$pro = $_POST['proveedor'];
	$direc = $_POST['direccion'];
	$rfc = $_POST['rfc'];
	$ban = $_POST['banco'];
    	$cla = $_POST['clabe'];
	$cue = $_POST['cuenta'];
	$pag = $_POST['pagina'];
	$per = $_POST['persona'];
	$cor = $_POST['correo'];
    	$tel = $_POST['telefono'];
    	$cel = $_POST['celular'];
    	$des = $_POST['descripcion'];
    	$red = $_POST['redes'];
    	
	
	$folder = '../../img/proveedores/';
	
	
	if(!file_exists($folder)){
		mkdir($folder, 0777) or die("Hubo un error al crear el directorio de almacenamiento");	
	}

		if($_FILES["foto1"]){
			if($_FILES["foto1"]["name"]) {
				// Nombres de archivos de temporales
				$n1 = $_FILES["foto1"]["name"]; 
				$ruta = $_FILES["foto1"]["tmp_name"]; 
				$tam_archivo = $_FILES["foto1"]["size"];
				//anexar hora de creacion para evitar errores.
				$aux1 = explode('.',$n1);
				$aux2 = array_pop($aux1);
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

		if($_FILES["foto2"]){
			if($_FILES["foto2"]["name"]) {
				// Nombres de archivos de temporales
				$n2 = $_FILES["foto2"]["name"]; 
				$ruta = $_FILES["foto2"]["tmp_name"]; 
				$tam_archivo = $_FILES["foto2"]["size"];
				//anexar hora de creacion para evitar errores.
				$aux1 = explode('.',$n2);
				$aux2 = array_pop($aux1);
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

		if($_FILES["foto3"]){
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
					}
					closedir($dir);
				}
			}
		}
	$sql="INSERT INTO proveedores (proveedor,direccion,rfc,banco,clabe,cuenta,paginaweb,nombrePersona,correoPersona,telefono,celular,descripcion,foto1,foto2,foto3,redesSociales)
	VALUES ('$pro','$direc','$rfc','$ban','$cla','$cue','$pag','$per','$cor','$tel','$cel','$des','$n1','$n2','$n3','$red')";
	//echo $sql;
	echo $result=mysqli_query($conexion,$sql);

 ?>
