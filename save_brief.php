<?php

use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';

session_start();

if ($_SESSION["s_usuario"] === null) {
    header("Location: ../index.php");
}
$userlogin = $_SESSION["s_usuario"];
$useridRol = $_SESSION["s_idRol"];

include_once "../bd/conect_db.php";

$fecha_ent = $_POST['fecha_entrega'];
$fecha_solicitud = $_POST['fecha_solicitud'];
$nombre_proyecto = $_POST['nombre_proyecto'];
$contexto = $_POST['contexto'];
$objetivo = $_POST['objetivo'];
$public_objetivo = $_POST['public_objetivo'];
$necesidad = $_POST['necesidad'];
$promesa = $_POST['promesa'];
$propuesta = $_POST['propuesta'];
$justificacion = $_POST['justificacion'];
$competencia = $_POST['competencia'];
$entregables = $_POST['entregables'];
$medios = $_POST['medios'];
$presupuesto = $_POST['presupuesto'];
$observaciones = $_POST['observaciones'];
$marca = $_POST['marca'];
$cliente = $_POST['cliente'];
$areas = $_POST['areas'];
$personas = $_POST['personas'];
$ejecutiva = $_POST['ejecutiva'];
$marca_c = $_POST['marca_c'];
$cliente_c = $_POST['cliente_c'];

//< Get images from the database
$nombre_archivo = $_FILES["file"]["name"];
$tipo_archivo = $_FILES["file"]["type"];
$tam_archivo = $_FILES["file"]["size"];
$folder = $_SERVER['DOCUMENT_ROOT'] .'../uploads/';
$ruta = $_FILES['file']['tmp_name'];
$destino = "../uploads/" . $nombre_archivo;

$array_areas = array_unique($areas);
$lista_areas = implode(", ", $array_areas);
$array_personas = array_unique($personas);
$lista_personas = implode(", ", $array_personas);

$fichero = $_FILES["file"];
$targetFilePath = $folder . $nombre_archivo;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

date_default_timezone_set('America/Mexico_City');
$hora = date('H:i:s', time());
$fecha = substr($fecha_ent, 0, 10);
$fecha_entrega = $fecha . " " . $hora;
//echo "<script type='text/javascript'>alert('$fecha_entrega');</script>";

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

$cadena = $cliente;
$nombre_cliente = eliminar_acentos($cadena);


if (empty($cliente_c)){

    $obt_mail_cliente = $mysqli -> query("SELECT mailCliente FROM clientes WHERE nombreCliente = '$nombre_cliente'");
    while($mailObt=mysqli_fetch_array($obt_mail_cliente)) {
        $cliente_mail = $mailObt[mailCliente];
    }

    require_once "../tablas/php/conexion.php";
    $conexion=conexion();

	if( empty($fecha_entrega) || empty($fecha_solicitud) || empty($nombre_proyecto)){

		echo '<script>
				Swal.fire({
				type: "Error",
				title: "Datos incompletos",
				text: "Rellene todos los campos!"
				});
			</script>';
	} else {
		$array = array();
		$arrayE = array();
		$a=0;
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

					if($tam_archivo > 5242880){
					//if($tam_archivo > 5242880){ para poner archivos de mas de 5mb
						//alert($tam_archivo);
						$a=$nombre_archivo;
						array_push($arrayE,$nombre_archivo);
					}
					else{
						$dir=opendir($folder);
						if(copy($ruta,$folder.'/'.$nombre_archivo)) {
							$nombre_archivo =utf8_encode($nombre_archivo);
							array_push($array,$nombre_archivo);
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
			$sql = "INSERT INTO briefs (fechaEntrega, fechaSalida, nombre, marca, cliente, areasAgregadas, responsablesAreas, contexto, objetivo, publicObjetivo,
                            necesidad, promesa, propuesta, justificacion, competencia, entregables,
                            medios, presupuesto, observaciones, archivo, semaforo, ejecutiva, mail_cliente, fechaAnterior) VALUES ('$fecha_entrega',
                            '$fecha_solicitud', '$nombre_proyecto', '$marca', '$cliente', '$lista_areas', '$lista_personas', '$contexto', '$objetivo', '$public_objetivo', '$necesidad', '$promesa',
                            '$propuesta', '$justificacion', '$competencia','$entregables', '$medios', '$presupuesto',
                            '$observaciones', '$json', '#FFC500', '$userlogin', '$cliente_mail', '')";
			if (!mysqli_query($conexion,$sql)){
				echo '<script>
						Swal.fire({
							type: "Error",
							title: "Error de Datos",
							text: "Hubo un error al guardar los datos!"
						});
					</script>';
			} else {

				foo($personas,$userlogin,$cliente_mail,$fecha_entrega,$fecha_solicitud,$nombre_proyecto,$marca,$cliente,$lista_areas,$lista_personas,$contexto,$objetivo,$public_objetivo,$necesidad,$promesa,$propuesta,$justificacion,$competencia,$entregables,$medios,$presupuesto,$observaciones,$json);
				echo '<script>
					Swal.fire({
						type: "success",
						title: "Datos correctos",
						text: "BRIEF registrada correctamente!",
						background: "#febe10",
						confirmButtonColor: "#000000"
					});
				</script>';
			}
		}else{
			echo '<script>
						Swal.fire({
							type: "Error",
							title: "Problema en archivos",
							text: "Uno o mas Archivos presentaron problemas"
						});
					</script>';
		}
	}

} else{
	if( empty($fecha_entrega) || empty($fecha_solicitud) || empty($nombre_proyecto)){

		echo '<script>
				Swal.fire({
				type: "Error",
				title: "Datos incompletos",
				text: "Rellene todos los campos!"
				});
			</script>';
	} else {
		$array = array();
		$arrayE = array();
		$a=0;
		if($_FILES["file"]){
			foreach($_FILES["file"]['tmp_name'] as $key => $tmp_name)
			{
				//condicional si el fichero existe
				if($_FILES["file"]["name"][$key]) {
					// Nombres de archivos de temporales
					$nombre_archivo = $_FILES["file"]["name"][$key];
					$ruta = $_FILES["file"]["tmp_name"][$key];
					$tam_archivo = $_FILES["file"]["size"][$key];
					$folder = '../uploads/';

					if($tam_archivo > 5242880){
					//if($tam_archivo > 5242880){ para poner archivos de mas de 5mb
						//alert($tam_archivo);
						$a=$nombre_archivo;
						array_push($arrayE,$nombre_archivo);
					}
					else{
						$dir=opendir($folder);
						if(copy($ruta,$folder.'/'.$nombre_archivo)) {
							array_push($array,$nombre_archivo);
						}
						else{
							array_push($arrayE,$nombre_archivo);
						}
						closedir($dir);
					}
				}
			}
		}
		if(count($arrayE)==0){
			$json=json_encode($array,JSON_UNESCAPED_UNICODE);
			$sql = "INSERT INTO briefs (fechaEntrega, fechaSalida, nombre, marca, cliente, areasAgregadas, responsablesAreas, contexto, objetivo, publicObjetivo,
                            necesidad, promesa, propuesta, justificacion, competencia, entregables,
                            medios, presupuesto, observaciones, archivo, semaforo, ejecutiva, mail_cliente, fechaAnterior) VALUES ('$fecha_entrega',
                            '$fecha_solicitud', '$nombre_proyecto', '$marca', '$cliente', '$lista_areas', '$lista_personas', '$contexto', '$objetivo', '$public_objetivo', '$necesidad', '$promesa',
                            '$propuesta', '$justificacion', '$competencia','$entregables', '$medios', '$presupuesto',
                            '$observaciones', '$json', '#FFC500', '$userlogin', '$cliente_mail', '')";
			if (!mysqli_query($conexion,$sql)){
				echo '<script>
						Swal.fire({
							type: "Error",
							title: "Error de Datos",
							text: "Hubo un error al guardar los datos!"
						});
					</script>';
			} else {
				enviarCorreo_cliente($personas,$userlogin,$ejecutiva,$cliente_mail,$fecha_entrega,$fecha_solicitud,$nombre_proyecto,$marca,$cliente,$lista_areas,$lista_personas,$contexto,$objetivo,$public_objetivo,$necesidad,$promesa,$propuesta,$justificacion,$competencia,$entregables,$medios,$presupuesto,$observaciones,$json);
				echo '<script>
					Swal.fire({
						type: "success",
						title: "Datos correctos",
						text: "BRIEF registrada correctamente!",
						background: "#febe10",
						confirmButtonColor: "#000000"
					});
				</script>';
			}
		}else{
			echo '<script>
						Swal.fire({
							type: "Error",
							title: "Problema en archivos",
							text: "Uno o mas Archivos presentaron problemas"
						});
					</script>';
		}
	}
}



function foo($personas,$userlogin,$cliente_mail,$fecha_entrega,$fecha_solicitud,$nombre_proyecto,$marca,$cliente,$lista_areas,$lista_personas,$contexto,$objetivo,$public_objetivo,$necesidad,$promesa,$propuesta,$justificacion,$competencia,$entregables,$medios,$presupuesto,$observaciones,$json){

	//INICIA PROCESO DE ENVIAR NOTIFICIONES VIA MAIL
	$mysqli = new mysqli('localhost', 'ezqualof_adminfollower', '3zqu4l0++', 'ezqualof_follower');

    $lista_correos = array();

    for ($x=0;$x<count($personas); $x++){

        $cadena = $personas[$x];
		            $nombres_sa = eliminar_acentos($cadena);
		            //echo "<script type='text/javascript'>alert('$cadena');</script>";
			    // OBTENER TODOS LOS NOMBRES DE LOS EQUIPOS
			    $query_arte = $mysqli -> query("SELECT DISTINCT nombre,apellido FROM equipoArte");
				while ($valores_arte = mysqli_fetch_array($query_arte)) {
					$equipoArte[] = utf8_encode($valores_arte[0]." ".$valores_arte[1]);
				}
				$query_post = $mysqli -> query("SELECT DISTINCT nombre,apellido FROM equipoPostProduccion");
				while ($valores_post = mysqli_fetch_array($query_post)) {
					$postphp[] = utf8_encode($valores_post[0]." ".$valores_post[1]);
				}
				$query_estrategia = $mysqli -> query("SELECT DISTINCT nombre,apellido FROM equipoEstrategia");
				while ($valores_estrategia = mysqli_fetch_array($query_estrategia)) {
					$estrategiaphp[] = utf8_encode($valores_estrategia[0]." ".$valores_estrategia[1]);
				}
				$query_ilustracion = $mysqli -> query("SELECT DISTINCT nombre,apellido FROM equipoIlustracion");
				while ($valores_ilustracion = mysqli_fetch_array($query_ilustracion)) {
					$ilustracionphp[] = utf8_encode($valores_ilustracion[0]." ".$valores_ilustracion[1]);
				}
				$query_copy = $mysqli -> query("SELECT DISTINCT nombre,apellido FROM equipoCopyCorreccion");
				while ($valores_copy = mysqli_fetch_array($query_copy)) {
					$copyphp[] = utf8_encode($valores_copy[0]." ".$valores_copy[1]);
				}
				$query_programacion = $mysqli -> query("SELECT DISTINCT nombre,apellido FROM equipoProgramacion");
				while ($valores_programacion = mysqli_fetch_array($query_programacion)) {
					$programacionphp[] = utf8_encode($valores_programacion[0]." ".$valores_programacion[1]);
				}
				$query_admin = $mysqli -> query("SELECT DISTINCT nombre,apellido FROM equipoAdministracion");
				while ($valores_admin = mysqli_fetch_array($query_admin)) {
					$adminphp[] = utf8_encode($valores_admin[0]." ".$valores_admin[1]);
				}


	if (in_array($cadena, $equipoArte)) {
					$correo_arte = $mysqli -> query("SELECT correo,CONCAT_WS(' ', nombre, apellido)nombreC FROM equipoArte");
					while ($correos_arte = mysqli_fetch_array($correo_arte)) {
            if($correos_arte[1]==$nombres_sa){
						$correoArte = utf8_encode($correos_arte[0]);
            }
					}
					//echo "<script type='text/javascript'>alert('$correoArte');</script>";
					$lista_correos[] = $correoArte;

				} else if (in_array($cadena, $postphp)) {
					$correo_post = $mysqli -> query("SELECT correo,CONCAT_WS(' ', nombre, apellido)nombreC FROM equipoPostProduccion");
					while ($correos_post = mysqli_fetch_array($correo_post)) {
            if($correos_post[1]==$nombres_sa){
						$correoPost = utf8_encode($correos_post[0]);
					  }
          }
					//echo "<script type='text/javascript'>alert('$correoPost');</script>";
					$lista_correos[] = $correoPost;

				} else if (in_array($cadena, $estrategiaphp)) {
					$correo_estrategia = $mysqli -> query("SELECT correo,CONCAT_WS(' ', nombre, apellido)nombreC FROM equipoEstrategia");
					while ($correos_estrategia = mysqli_fetch_array($correo_estrategia)) {
            if($correos_estrategia[1]==$nombres_sa){
						$correoEstrategia = utf8_encode($correos_estrategia[0]);
					}
        }
					//echo "<script type='text/javascript'>alert('$correoEstrategia');</script>";
					$lista_correos[] = $correoEstrategia;

				} else if (in_array($cadena, $ilustracionphp)) {
					$correo_ilustracion = $mysqli -> query("SELECT correo,CONCAT_WS(' ', nombre, apellido)nombreC FROM equipoIlustracion");
					while ($correos_ilustracion = mysqli_fetch_array($correo_ilustracion)) {
            if($correos_ilustracion[1]==$nombres_sa){
						$correoIlustracion = utf8_encode($correos_ilustracion[0]);
					}
        }
					//echo "<script type='text/javascript'>alert('$correoIlustracion');</script>";
					$lista_correos[] = $correoIlustracion;

				} else if (in_array($cadena, $copyphp)) {
					$correo_copy = $mysqli -> query("SELECT correo,CONCAT_WS(' ', nombre, apellido)nombreC FROM equipoCopyCorreccion");
					while ($correos_copy = mysqli_fetch_array($correo_copy)) {
            if($correos_copy[1]==$nombres_sa){
						$correoCopy = utf8_encode($correos_copy[0]);
					}
        }
					//echo "<script type='text/javascript'>alert('$correoCopy');</script>";
					$lista_correos[] = $correoCopy;

				} else if (in_array($cadena, $programacionphp)) {
					$correo_programacion = $mysqli -> query("SELECT correo,CONCAT_WS(' ', nombre, apellido)nombreC FROM equipoProgramacion");
					while ($correos_programacion = mysqli_fetch_array($correo_programacion)) {
            if($correos_programacion[1]==$nombres_sa){
						$correoProgramacion = utf8_encode($correos_programacion[0]);
					}
        }
					//echo "<script type='text/javascript'>alert('$correoProgramacion');</script>";
					$lista_correos[] = $correoProgramacion;

				} else if (in_array($cadena, $adminphp)) {
					$correo_admin = $mysqli -> query("SELECT correo,CONCAT_WS(' ', nombre, apellido)nombreC FROM equipoAdministracion");
					while ($correos_admin = mysqli_fetch_array($correo_admin)) {
            if($correos_admin[1]==$nombres_sa){
						$correoAdmin = utf8_encode($correos_admin[0]);
					}
        }
					//echo "<script type='text/javascript'>alert('$correoAdmin');</script>";
					$lista_correos[] = $correoAdmin;

				}
	}

	$mail = new PHPMailer(true);
	try {
		$mail->CharSet = 'UTF-8';
		$mail->setFrom('notificaciones@followerezqualo.com', 'Notificaciones BRIEF');
		
		array_push($lista_correos, 'antonio@ezqualo.com');
		array_push($lista_correos, 'eduardo@ezqualo.com');
		array_push($lista_correos);
		foreach($lista_correos as &$correo) {
			$mail->addAddress($correo);
		}

		// Archivos adjuntos
		if($_FILES["file"]) {
			foreach($_FILES["file"]['tmp_name'] as $key => $tmp_name) {
				if($_FILES["file"]["name"][$key]) {
					$path = $_FILES["file"]["tmp_name"][$key];
					$mail->addAttachment($path, utf8_decode($_FILES["file"]["name"][$key]));
				}
			}
		}

		// Contenido HTML del correo
		$mail->isHTML(true);
		$mail->Subject = '¡Notificacion BRIEF'.' - '. $nombre_proyecto .'!';

		$message  = "<html><body>";
		$message .= "<table width='100%' bgcolor='#000000' cellpadding='0' cellspacing='0' border='0'>";
		$message .= "<tr><td>";
		$message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:641px; background-color:#000000; font-family:Verdana, Geneva, sans-serif;'>";
		$message .= "<tbody >
			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td>
				<img src='https://followerezqualo.com/img/notificaciones/mail-brief-header.png' alt='ezq-mail-header' />
			</td>
			</tr>
			<tr>
			<td style='background-color: #000000; color: #ffffff; text-align:center;'>
				<h5>Nombre del Proyecto:</h5><h1>". $nombre_proyecto ."</h1>
			</td>
			</tr>
			<tr>
			<td>
			<img src='https://followerezqualo.com/img/notificaciones/lineas-amarillas.png' alt='ezq-mail-header' />
			</td>
			</tr>
				<br>
				<div>
			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'>Fecha de Solicitud: <h5 style='color: #00ff00;'>".$fecha_solicitud."</h5></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'>Fecha de Entrega: <h5 style='color: #ff0000;'>".$fecha_entrega."</h5></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
					<td style='background-color: #000000; color: #808080; text-align:center;'>Marca: <h2 style='color: #ffffff;'>".$marca."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Cliente: </h5><h2 style='color: #ffffff;'>".$cliente."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #febe10; text-align:center;'><h5>Areas: </h5><h3 color: #febe10;>".$lista_areas."</h3>
			</td>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #febe10; text-align:center;'><h5>Persona Asignada: </h5><h2 color: #febe10;>".$lista_personas."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Contexto: </h5><h2 style='color: #ffffff;'>".$contexto."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Objetivo del proyecto: </h5><h2 style='color: #ffffff;'>".$objetivo."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Publico objetivo: </h5><h2 style='color: #ffffff;'>".$public_objetivo."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Necesidad: </h5><h2 style='color: #ffffff;'>".$necesidad."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Promesa / oferta a comunicar: </h5><h2 style='color: #ffffff;'>".$promesa."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Propuesta de valor: </h5><h2 style='color: #ffffff;'>".$propuesta."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Justificación del beneficio: </h5><h2 style='color: #ffffff;'>".$justificacion."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Competencia: </h5><h2 style='color: #ffffff;'>".$competencia."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Medios a utilizar: </h5><h2 style='color: #ffffff;'>".$medios."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Entregables: </h5><h2 style='color: #ffffff;'>".$entregables."</h2></td>
			<tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Presupuesto: </h5><h2 style='color: #ffffff;'>".$presupuesto."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Observaciones: </h5><h2 style='color: #ffffff;'>".$observaciones."</h2></td>
			</tr>
			</div>
			<tr>
				<td>
				<img src='https://followerezqualo.com/img/notificaciones/formato-mail-follower-foot.png' alt='ezq-mail-footer' />
				</td>
			</tr>

			</tbody>";

		$message .= "</table>";
		$message .= "</td></tr>";
		$message .= "</table>";
		$message .= "</body></html>";

		$mail->Body = $message;
		$mail->send();
	} catch (Exception $e) {
		echo '<script>
			Swal.fire({
				type: "Error",
				title: "Problema en correo interno",
				text: "Hubo un problema al enviar el correo interno"
			});
		</script>';
		die();
	}
	
	$mail = new PHPMailer(true);
	try {
		$mail->CharSet = 'UTF-8';
		$mail->setFrom('notificaciones@followerezqualo.com', 'Notificaciones BRIEF');
	
		$mail->addAddress($userlogin);
				
		// Archivos adjuntos
		if($_FILES["file"]) {
			foreach($_FILES["file"]['tmp_name'] as $key => $tmp_name) {
				if($_FILES["file"]["name"][$key]) {
					$path = $_FILES["file"]["tmp_name"][$key];
					$mail->addAttachment($path, utf8_decode($_FILES["file"]["name"][$key]));
				}
			}
		}

		// Contenido HTML del correo
		$mail->isHTML(true);
		$mail->Subject = '¡Notificacion BRIEF'.' - '. $nombre_proyecto .'!';

		$message  = "<html><body>";
		$message .= "<table width='100%' bgcolor='#000000' cellpadding='0' cellspacing='0' border='0'>";
		$message .= "<tr><td>";
		$message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:641px; background-color:#000000; font-family:Verdana, Geneva, sans-serif;'>";
		$message .= "<tbody >
			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td>
				<img src='https://followerezqualo.com/img/notificaciones/mail-brief-header.png' alt='ezq-mail-header' />
			</td>
			</tr>
			<tr>
			<td style='background-color: #000000; color: #ffffff; text-align:center;'>
				<h5>Nombre del Proyecto:</h5><h1>". $nombre_proyecto ."</h1>
			</td>
			</tr>
			<tr>
			<td>
			<img src='https://followerezqualo.com/img/notificaciones/lineas-amarillas.png' alt='ezq-mail-header' />
			</td>
			</tr>
				<br>
				<div>
			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'>Fecha de Solicitud: <h5 style='color: #00ff00;'>".$fecha_solicitud."</h5></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'>Fecha de Entrega: <h5 style='color: #ff0000;'>".$fecha_entrega."</h5></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
					<td style='background-color: #000000; color: #808080; text-align:center;'>Marca: <h2 style='color: #ffffff;'>".$marca."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Cliente: </h5><h2 style='color: #ffffff;'>".$cliente."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #febe10; text-align:center;'><h5>Areas: </h5><h3 color: #febe10;>".$lista_areas."</h3>
			</td>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #febe10; text-align:center;'><h5>Persona Asignada: </h5><h2 color: #febe10;>".$lista_personas."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Contexto: </h5><h2 style='color: #ffffff;'>".$contexto."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Objetivo del proyecto: </h5><h2 style='color: #ffffff;'>".$objetivo."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Publico objetivo: </h5><h2 style='color: #ffffff;'>".$public_objetivo."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Necesidad: </h5><h2 style='color: #ffffff;'>".$necesidad."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Promesa / oferta a comunicar: </h5><h2 style='color: #ffffff;'>".$promesa."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Propuesta de valor: </h5><h2 style='color: #ffffff;'>".$propuesta."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Justificación del beneficio: </h5><h2 style='color: #ffffff;'>".$justificacion."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Competencia: </h5><h2 style='color: #ffffff;'>".$competencia."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Medios a utilizar: </h5><h2 style='color: #ffffff;'>".$medios."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Entregables: </h5><h2 style='color: #ffffff;'>".$entregables."</h2></td>
			<tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Presupuesto: </h5><h2 style='color: #ffffff;'>".$presupuesto."</h2></td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Observaciones: </h5><h2 style='color: #ffffff;'>".$observaciones."</h2></td>
			</tr>
			</div>
			<tr>
				<td>
				<img src='https://followerezqualo.com/img/notificaciones/formato-mail-follower-foot.png' alt='ezq-mail-footer' />
				</td>
			</tr>

			</tbody>";

		$message .= "</table>";
		$message .= "</td></tr>";
		$message .= "</table>";
		$message .= "</body></html>";

		$mail->Body = $message;
		$mail->send();
	} catch (Exception $e) {
		echo '<script>
			Swal.fire({
				type: "Error",
				title: "Problema en correo interno",
				text: "Hubo un problema al enviar el correo interno"
			});
		</script>';
		die();
	}

	$mail = new PHPMailer(true);
	try {
		$mail->CharSet = 'UTF-8';
		$mail->setFrom('notificaciones@followerezqualo.com', 'Notificaciones BRIEF');
		$mail->addAddress($cliente_mail);

		// Archivos adjuntos
		if($_FILES["file"]) {
			foreach($_FILES["file"]['tmp_name'] as $key => $tmp_name) {
				if($_FILES["file"]["name"][$key]) {
					$path = $_FILES["file"]["tmp_name"][$key];
					$mail->addAttachment($path, utf8_decode($_FILES["file"]["name"][$key]));
				}
			}
		}

		// Contenido HTML del correo
		$mail->isHTML(true);
		$mail->Subject = '¡Notificacion BRIEF'.' - '. $nombre_proyecto .'!';

		$message  = "<html><body>";
		$message .= "<table width='100%' bgcolor='#000000' cellpadding='0' cellspacing='0' border='0'>";
		$message .= "<tr><td>";
		$message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:641px; background-color:#000000; font-family:Verdana, Geneva, sans-serif;'>";
		$message .= "<tbody >
		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td>
				<img src='https://followerezqualo.com/img/notificaciones/mail-brief-header.png' alt='ezq-mail-header' />
			</td>
		   </tr>
		   <tr>
			<td style='background-color: #000000; color: #ffffff; text-align:center;'>
			   <h5>Nombre del Proyecto:</h5><h1>". $nombre_proyecto ."</h1>
			</td>
		   </tr>
		   <tr>
			<td>
			<img src='https://followerezqualo.com/img/notificaciones/lineas-amarillas.png' alt='ezq-mail-header' />
			</td>
		   </tr>
			   <br>
			   <div>
		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'>Fecha de Solicitud: <h5 style='color: #00ff00;'>".$fecha_solicitud."</h5></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'>Fecha de Entrega: <h5 style='color: #ff0000;'>".$fecha_entrega."</h5></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
				  <td style='background-color: #000000; color: #808080; text-align:center;'>Marca: <h2 style='color: #ffffff;'>".$marca."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Cliente: </h5><h2 style='color: #ffffff;'>".$cliente."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Contexto: </h5><h2 style='color: #ffffff;'>".$contexto."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Objetivo del proyecto: </h5><h2 style='color: #ffffff;'>".$objetivo."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Publico objetivo: </h5><h2 style='color: #ffffff;'>".$public_objetivo."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Necesidad: </h5><h2 style='color: #ffffff;'>".$necesidad."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Promesa / oferta a comunicar: </h5><h2 style='color: #ffffff;'>".$promesa."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Propuesta de valor: </h5><h2 style='color: #ffffff;'>".$propuesta."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Justificación del beneficio: </h5><h2 style='color: #ffffff;'>".$justificacion."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Competencia: </h5><h2 style='color: #ffffff;'>".$competencia."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Medios a utilizar: </h5><h2 style='color: #ffffff;'>".$medios."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Entregables: </h5><h2 style='color: #ffffff;'>".$entregables."</h2></td>
		   <tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Presupuesto: </h5><h2 style='color: #ffffff;'>".$presupuesto."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Observaciones: </h5><h2 style='color: #ffffff;'>".$observaciones."</h2></td>
		   </tr>
		 </div>
		   <tr>
			   <td>
			   <img src='https://followerezqualo.com/img/notificaciones/formato-mail-follower-foot.png' alt='ezq-mail-footer' />
			 </td>
		   </tr>

		   </tbody>";
		$message .= "</table>";
		$message .= "</td></tr>";
		$message .= "</table>";
		$message .= "</body></html>";

		$mail->Body = $message;
		$mail->send();
	} catch(Exception $e) {
		echo '<script>
			Swal.fire({
				type: "Error",
				title: "Problema en correo de cliente",
				text: "Hubo un problema al enviar el correo para el cliente"
			});
		</script>';
		die();
	}
}


function enviarCorreo_Cliente($personas,$userlogin,$ejecutiva,$cliente_mail,$fecha_entrega,$fecha_solicitud,$nombre_proyecto,$marca_c,$cliente_c,$lista_areas,$lista_personas,$contexto,$objetivo,$public_objetivo,$necesidad,$promesa,$propuesta,$justificacion,$competencia,$entregables,$medios,$presupuesto,$observaciones,$json){
	$mysqli = new mysqli('localhost', 'ezqualof_adminfollower', '3zqu4l0++', 'ezqualof_follower');

	$lista_correos = array();
	array_push($lista_correos, $userlogin);
	array_push($lista_correos, $ejecutiva);

	$mail = new PHPMailer(true);
	try {
		$mail->CharSet = 'UTF-8';
		$mail->setFrom('notificaciones@followerezqualo.com', 'Notificaciones BIREF');

		foreach($lista_correos as &$correo) {
			$mail->addAddress($correo);
		}

		// Archivos adjuntos
		if($_FILES["file"]) {
			foreach($_FILES["file"]['tmp_name'] as $key => $tmp_name) {
				if($_FILES["file"]["name"][$key]) {
					$path = $_FILES["file"]["tmp_name"][$key];
					$mail->addAttachment($path, utf8_decode($_FILES["file"]["name"][$key]));
				}
			}
		}

		// Contenido HTML del correo
		$mail->isHTML(true);
		$mail->Subject = '¡Notificacion BRIEF'.' - '. $nombre_proyecto .'!';

		$message  = "<html><body>";
		$message .= "<table width='100%' bgcolor='#000000' cellpadding='0' cellspacing='0' border='0'>";
		$message .= "<tr><td>";
		$message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:641px; background-color:#000000; font-family:Verdana, Geneva, sans-serif;'>";
		$message .= "<tbody >
		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td>
				<img src='https://followerezqualo.com/img/notificaciones/mail-brief-header.png' alt='ezq-mail-header' />
			</td>
		   </tr>
		   <tr>
			<td style='background-color: #000000; color: #ffffff; text-align:center;'>
			   <h5>Nombre del Proyecto:</h5><h1>". $nombre_proyecto ."</h1>
			</td>
		   </tr>
		   <tr>
			<td>
			<img src='https://followerezqualo.com/img/notificaciones/lineas-amarillas.png' alt='ezq-mail-header' />
			</td>
		   </tr>
		   <div>
		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'>Fecha de Solicitud: <h5 style='color: #00ff00;'>".$fecha_solicitud."</h5></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'>Fecha de Entrega: <h5 style='color: #ff0000;'>".$fecha_entrega."</h5></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
				  <td style='background-color: #000000; color: #808080; text-align:center;'>Marca: <h2 style='color: #ffffff;'>".$marca."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Cliente: </h5><h2 style='color: #ffffff;'>".$cliente."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #febe10; text-align:center;'><h5>Areas: </h5><h3 color: #febe10;>".$areas."</h3>
		   </td>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #febe10; text-align:center;'><h5>Persona Asignada: </h5><h2 color: #febe10;>".$personas."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Contexto: </h5><h2 style='color: #ffffff;'>".$contexto."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Objetivo del proyecto: </h5><h2 style='color: #ffffff;'>".$objetivo."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Publico objetivo: </h5><h2 style='color: #ffffff;'>".$public_objetivo."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Necesidad: </h5><h2 style='color: #ffffff;'>".$necesidad."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Promesa / oferta a comunicar: </h5><h2 style='color: #ffffff;'>".$promesa."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Propuesta de valor: </h5><h2 style='color: #ffffff;'>".$propuesta."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Justificación del beneficio: </h5><h2 style='color: #ffffff;'>".$justificacion."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Competencia: </h5><h2 style='color: #ffffff;'>".$competencia."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Medios a utilizar: </h5><h2 style='color: #ffffff;'>".$medios."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'><h5>Entregables: </h5><h2 style='color: #ffffff;'>".$entregables."</h2></td>
		   <tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Presupuesto: </h5><h2 style='color: #ffffff;'>".$presupuesto."</h2></td>
		   </tr>

		   <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color:#000000; color: #808080; text-align:center;'><h5>Observaciones: </h5><h2 style='color: #ffffff;'>".$observaciones."</h2></td>
		   </tr>
		   </div>

		   <tr>
			   <td>
			   <img src='https://followerezqualo.com/img/notificaciones/formato-mail-follower-foot.png' alt='ezq-mail-footer' />
			 </td>
		   </tr>

		   </tbody>";
		$message .= "</table>";
		$message .= "</td></tr>";
		$message .= "</table>";
		$message .= "</body></html>";

		$mail->Body = $message;
		$mail->send();
	} catch(Exception $e) {
		echo '<script>
			Swal.fire({
				type: "Error",
				title: "Problema en correo de cliente",
				text: "Hubo un problema al enviar el correo para el cliente"
			});
		</script>';
		die();
	}
}
?>
