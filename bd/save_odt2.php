<?php
//execute your query

session_start();

if ($_SESSION["s_usuario"] === null) {
    header("Location: ../index.php");
}
//header('Content-Type: text/html; charset=UTF-8');

$userlogin = $_SESSION["s_usuario"];
$useridRol = $_SESSION["s_idRol"];

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
/*$mysqli = new mysqli('localhost','ezqualof_adminfollower','3zqu4l0++','ezqualof_follower');
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: "
        . $mysqli->connect_error);
}*/


$id_odt = $_POST['id_odt'];
$marca = $_POST['marca'];
$nom_proyecto = $_POST['nom_proyecto'];
$cliente_odt = $_POST['cliente_odt'];
$areas = $_POST['areas'];
$personas = $_POST['personas'];
$objetivo = $_POST['objetivo'];
$dummy = $_POST['dummy'];
$artes_ezqualo = $_POST['artes_ezqualo'];
$artes_separados = $_POST['artes_separados'];
$fecha_soli = $_POST['fecha_solicitud'];
$fecha_entrega = $_POST['fecha_entrega'];
$digital = $_POST['digital'];
$impreso = $_POST['impreso'];
$formato = $_POST['formato'];
$medidas = $_POST['medidas'];
$acabados = $_POST['acabados'];
//$archivo = 2;

$array_areas = array_unique($areas);
$lista_areas = implode(", ", $array_areas);
$array_personas = array_unique($personas);
$lista_personas = implode(", ", $array_personas);

date_default_timezone_set('America/Mexico_City');  
$hora = date('H:i:s', time());  
$fecha = substr($fecha_soli, 0, 10);
$fecha_solicitud = $fecha . " " . $hora;
//echo "<script type='text/javascript'>alert('$fecha_solicitud');</script>";

$mysqli = new mysqli('localhost','ezqualof_adminfollower','3zqu4l0++','ezqualof_follower');
//$mysqli = new mysqli('localhost', 'root', 'password', 'ezqualof_follower');
function eliminar_acentos($cadena){
		
		//Reemplazamos la A y a
		$cadena = str_replace(
		array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
		array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
		$cadena
		);
 
		//Reemplazamos la E y e
		$cadena = str_replace(
		array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
		array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
		$cadena );
 
		//Reemplazamos la I y i
		$cadena = str_replace(
		array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
		array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
		$cadena );
 
		//Reemplazamos la O y o
		$cadena = str_replace(
		array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
		array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
		$cadena );
 
		//Reemplazamos la U y u
		$cadena = str_replace(
		array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
		array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
		$cadena );
 
		//Reemplazamos la N, n, C y c
		$cadena = str_replace(
		array('Ñ', 'ñ', 'Ç', 'ç'),
		array('N', 'n', 'C', 'c'),
		$cadena
		);
		
		return $cadena;
	}
	
$cadena = $cliente_odt;
$nombre_cliente = eliminar_acentos($cadena);

$odt_mail_cliente = $mysqli -> query("SELECT DISTINCT mailCliente FROM clientes WHERE nombreCliente = '$nombre_cliente'");

while($mailObt=mysqli_fetch_array($odt_mail_cliente)) {
    $cliente_mail = $mailObt[0];
}


require_once "../tablas/php/conexion.php";
$conexion=conexion();

if (empty($id_odt)){
    echo ("aber");
} else {

	$array = array();
	$arrayE = array();
	$a=0;
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if($_FILES["file"]){
	
		foreach($_FILES["file"]['tmp_name'] as $key => $tmp_name)
		{
			//condicional si el fichero existe
			if($_FILES["file"]["name"][$key]) {
				
				
				// Nombres de archivos de temporales
				$nombre_archivo =utf8_decode($_FILES["file"]["name"][$key]);
				$ruta = $_FILES["file"]["tmp_name"][$key]; 
				$tam_archivo = $_FILES["file"]["size"][$key];
				$folder = '../uploads/';
				//anexar hora de creacion para evitar errores.
				$aux1 = explode('.',$nombre_archivo);
				$aux2=array_pop($aux1);
				$aux1 = implode('.',$aux1);
				$nombre_archivo = $aux1."-".time().".".$aux2;
				if($tam_archivo > 41943040){
				//if($tam_archivo > 1048576){ para poner archivos de mas de 1mb
					//alert($tam_archivo);
					$a=$nombre_archivo;
					array_push($arrayE,$nombre_archivo);
				}
				else{
					$dir=opendir($folder);
					if(move_uploaded_file($ruta,$folder.'/'.$nombre_archivo)) {	
					//if(1){
						$nombre_archivo =utf8_encode($nombre_archivo);
						array_push($array,$nombre_archivo);
						echo '<script language="javascript">alert("guardo: '.$nombre_archivo.'");</script>'; 
					}
					else{
						$nombre_archivo =utf8_encode($nombre_archivo);
						array_push($arrayE,$nombre_archivo);
					}
					closedir($dir);
				}
			}
		}
	}
	if(count($arrayE)==0){
		$json=json_encode($array,JSON_UNESCAPED_UNICODE);
		$sql = "INSERT INTO odts (idOdt, marca, proyecto, cliente, areasAgregadas, responsablesAreas,
                        objetivo, dummy, artesEzqualo, artesSeparados, fechaSolicitud, fechaEntrega,
                        digital, impreso, granFormato, medidas, acabados, archivo, semaforo, ejecutivaCuenta, mail_cliente, fechaAnterior) VALUES ('$id_odt',
                        '$marca', '$nom_proyecto', '$cliente_odt', '$lista_areas', '$lista_personas', '$objetivo', '$dummy',
                        '$artes_ezqualo', '$artes_separados', '$fecha_solicitud','$fecha_entrega', '$digital',
                        '$impreso', '$formato', '$medidas', '$acabados', '$json', '#FFC500', '$userlogin', '$cliente_mail', '')";
		if ($sql==1){
echo '<script language="javascript">alert("nunca saldra esta opcion");</script>';
		} else {
			echo '<script language="javascript">alert("todo bien");</script>';
		}
	}else{
		
		echo '<script language="javascript">alert("error en archivos");</script>';
		$json=json_encode($arrayE,JSON_UNESCAPED_UNICODE);
		echo '<script language="javascript">alert("'.$json.'");</script>';
		
	}
}


?>

