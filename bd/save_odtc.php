<?php
//execute your query

session_start();

if ($_SESSION["s_usuario"] === null) {
    header("Location: ../index.php");
}
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

if (empty($id_odt) || empty($marca) || empty($nom_proyecto) || empty($cliente_odt) || empty($areas) || empty($personas) || empty($objetivo) || empty($dummy)
    || empty($artes_ezqualo) || empty($artes_separados) || empty($fecha_solicitud) || empty($fecha_entrega) || empty($digital) || empty($impreso) || empty($formato) || empty($medidas) || empty($acabados)){
    echo '<script>
    		alert("datos incompletos");
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
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
					if(move_uploaded_file($ruta,$folder.'/'.$nombre_archivo)) {
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
		$sql = "INSERT INTO odts (idOdt, marca, proyecto, cliente, areasAgregadas, responsablesAreas,
                        objetivo, dummy, artesEzqualo, artesSeparados, fechaSolicitud, fechaEntrega,
                        digital, impreso, granFormato, medidas, acabados, archivo, semaforo, ejecutivaCuenta, mail_cliente, fechaAnterior) VALUES ('$id_odt',
                        '$marca', '$nom_proyecto', '$cliente_odt', '$lista_areas', '$lista_personas', '$objetivo', '$dummy',
                        '$artes_ezqualo', '$artes_separados', '$fecha_solicitud','$fecha_entrega', '$digital',
                        '$impreso', '$formato', '$medidas', '$acabados', '$json', '#FFC500', '$userlogin', '$cliente_mail', '')";
		if (!mysqli_query($conexion,$sql)){
			echo '<script>
					Swal.fire({
						type: "Error",
						title: "Error de Datos",
						text: "Hubo un error al guardar los datos! "
					});
				</script>';
		} else {
			//insertar codigo para mandar correo
			//INICIA PROCESO DE ENVIAR EMAILS
			$lista_correos = array();
			//foreach($personas as &$value){
			for ($x=0;$x<count($personas); $x++){
			    //echo "<script type='text/javascript'>alert('$value');</script>";
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

			
			// Correos copia a Jefes
      			$correo_CEO = 'antonio@ezqualo.com';
      			$correo_CEO2 = 'eduardo@ezqualo.com';

      			array_push($lista_correos, $correo_CEO);
      			array_push($lista_correos, $correo_CEO2);
			array_push($lista_correos, $userlogin);
			foreach($lista_correos as &$values){


          //SE ENVIA EMAIL A USUARIO
			    $bgImagen = "http://followerezqualo.com/img/notificaciones/formato-mail-follower-Cuerpo_ODT.png";
			    //echo "<script type='text/javascript'>alert('$values');</script>";
			    $mailfrom = 'notificaciones@followerezqualo.com';
			    $mailsubject = '¡Notificacion ODT'.' - '. $id_odt .' - '. $nom_proyecto .'!';
			    $firstname = '';
			    $lastname = '';
			    $description = '';

			    $description = wordwrap($description, 100, "<br />");

			    $content = '';
			    $content .= '
			    <style>
				tbody{
				border-color: #000000;
				border-style: none;
				}

				tr{
				border-color: #000000;
				border-style: none;
				}
			    </style>
			    ';

			    $to = $values;
			    $from = $mailfrom;
			    $subject = $mailsubject;

          foreach ($array as $clave => $valor) {
  			$s="<p>".$valor."</p>";
  				$archivos=$archivos."".$s;
  			}

			    // HTML email starts here
			   			   
			   $message  = "<html><body>";

			   $message .= "<table width='100%' bgcolor='#000000' cellpadding='0' cellspacing='0' border='0'>";

			   $message .= "<tr><td>";

			   $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:641px; font-family:Verdana, Geneva, sans-serif;'>";

			   $message .= "<tbody>
			      <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			       <td>
			      	 <img src='https://followerezqualo.com/img/notificaciones/mail-odt-header.png' alt='ezq-mail-header' />
			       </td>
			      </tr>
			      <tr>
			       <td style='background-color: #000000; color: #ffffff; text-align:center;'>
			      	<h3 style='color: #808080'>ID ODT</h5><h1>". $id_odt ."</h3>
			       </td>
			      </tr>
			      <tr>
			       <td style='background-color: #000000; color: #ffffff; text-align:center;'>
			      	<h5>Nombre del Proyecto:</h5><h1>". $nom_proyecto ."</h1>
			       </td>
			      </tr>
			      <tr>
			       <td>
			       <img src='https://followerezqualo.com/img/notificaciones/lineas-amarillas.png' alt='lineas-amarillas' />
			       </td>
			      </tr>
			      </table>
			      <table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:641px; background-image: url($bgImagen); background-repeat:no-repeat; background-origin: content-box; font-family:Verdana, Geneva, sans-serif;'>
			      	<br>
			      <tr align='center' height='20' style='font-family:Verdana, Geneva, sans-serif;'>
			       <td style='color: #808080; text-align:center; font-size: 12px;'>Fecha de Solicitud: <h4 style='color: #00ff00;'>".$fecha_soli."</h4></td>
             <td style='color: #808080; text-align:center; font-size: 12px;'>Fecha de Entrega: <h4 style='color: #ff0000;'>".$fecha_entrega."</h4></td>
			      </tr>

			      <tr align='center' height='20' style='font-family:Verdana, Geneva, sans-serif;'>
	      		       <td style='color: #808080; text-align:center; font-size: 12px;'>Marca: <h2 style='color: #ffffff; margin-block-start: 0em;
      margin-block-end: 0.83em;'>".$marca."</h2></td>
                   <td style='color: #febe10; text-align:center; font-size: 12px;'><h5 style='margin-block-end: 0em;'>Areas: </h5><h3 style='color: #febe10; margin-block-start: 0em;'>".$lista_areas."</h3>
			      </tr>

            <tr align='center' height='20' style='font-family:Verdana, Geneva, sans-serif;'>
                   <td style='color: #808080; text-align:center; font-size: 12px;'><h5 style='margin-block-end: 0em;'>Cliente: </h5><h2 style='color: #ffffff; margin-block-start: 0em;
      margin-block-end: 0.83em;'>".$cliente_odt."</h2></td>
                   <td style='color: #febe10; text-align:center; font-size: 12px;'><h5 style='margin-block-end: 0em;'>Persona Asignada: </h5><h2 style='color: #febe10; margin-block-start: 0em;
      margin-block-end: 0em;'>".$lista_personas."</h2></td>
			      </tr>

			      <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			       <td style='color: #808080; text-align:center; font-size: 12px;'><h5 style='margin-block-end: 0em;'>Objetivo del proyecto: </h5><h2 style='color: #ffffff; margin-block-start: 0em;
      margin-block-end: 0.83em;'>".$objetivo."</h2></td>
             <td style='color: #808080; text-align:center; font-size: 12px;'><h5 style='margin-block-end: 0em;'>Dummy: </h5><h2 style='color: #ffffff; margin-block-start: 0em;
      margin-block-end: 0.83em;'>".$dummy."</h2></td>
			      </tr>

            <tr align='center' height='155' style='font-family:Verdana, Geneva, sans-serif;'></tr>

			      <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			       <td style='color: #808080; text-align:center; font-size: 12px;'><h5 style='margin-block-end: 0em;'>Arte Separados: </h5><h2 style='color: #ffffff; margin-block-start: 0em;
      margin-block-end: 0.83em;'>".$artes_separados."</h2></td>
             <td style='color: #808080; text-align:center; font-size: 12px;'><h5 style='margin-block-end: 0em;'>Arte ezqualo: </h5><h2 style='color: #ffffff; margin-block-start: 0em;
      margin-block-end: 0.83em;'>".$artes_ezqualo."</h2></td>
            </tr>

			      <tr align='center' height='105' style='font-family:Verdana, Geneva, sans-serif;'></tr>

			      <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			       <td style='color: #808080; text-align:center; font-size: 12px;'><h5 style='margin-block-end: 0em;'>Impreso: </h5><h2 style='color: #ffffff; margin-block-start: 0em;
      margin-block-end: 0.83em;'>".$impreso."</h2></td>
             <td style='color: #808080; text-align:center; font-size: 12px;'><h5 style='margin-block-end: 0em;'>Digital: </h5><h2 style='color: #ffffff; margin-block-start: 0em;
      margin-block-end: 0.83em;'>".$digital."</h2></td>
			      </tr>

            <tr align='center' height='125' style='font-family:Verdana, Geneva, sans-serif;'></tr>

			      <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			       <td style='color: #808080; text-align:center; font-size: 12px;'><h5 style='margin-block-end: 0em;'>Gran Formato: </h5><h2 style='color: #ffffff; margin-block-start: 0em;
      margin-block-end: 0.83em;'>".$formato."</h2></td>
			      </tr>

            <tr align='center' height='125' style='font-family:Verdana, Geneva, sans-serif;'></tr>

			      <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			       <td style='color: #808080; text-align:center; font-size: 12px;'><h5 style='margin-block-end: 0em;'>Medidas / Salidas: </h5><h2 style='color: #ffffff; margin-block-start: 0em;
      margin-block-end: 0.83em;'>".$medidas."</h2></td>
			      </tr>

            <tr align='center' height='20' style='font-family:Verdana, Geneva, sans-serif;'></tr>

			      <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			       <td style='color: #808080; text-align:center; font-size: 12px;'><h5 style='margin-block-end: 0em;'>Observaciones: </h5><h2 style='color: #ffffff; margin-block-start: 0em;
      margin-block-end: 0.83em;'>".$acabados."</h2></td>
			      </tr>
          </table>
          <table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:641px; font-family:Verdana, Geneva, sans-serif;'>
			      <tr>
			      	 <td>
				            <img src='https://followerezqualo.com/img/notificaciones/formato-mail-follower-foot.png' alt='ezq-mail-footer' />
				       </td>
			      </tr>
          </table>
			      </tbody>";

			   $message .= "</table>";

			   $message .= "</td></tr>";
			   $message .= "</table>";

			   $message .= "</body></html>";

			   //$message .= AddAttachment($archivos['tmp_name'], $archivos['name']);



			   // HTML email ends here

			    $separator = md5(time());
			    $eol = PHP_EOL;

          		    $filenames = $nombre_archivo;
                           $attachment = chunk_split(base64_encode($archivos));

			    $headers = "From: " . $from . $eol;
			    $headers .= "MIME-Version: 1.0" . $eol;
			    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol . $eol;

			    // Enviar Adjuntos en Correo
			    /*if($_FILES["file"])
				  {
				   foreach($_FILES["file"]['tmp_name'] as $key => $tmp_name)
						{
				        //condicional si el fichero existe
				        if($_FILES["file"]["name"][$key])
				        {
				        // Nombres de archivos de temporales
					$file_name = $_FILES["file"]["name"][$key];
					$file_type = $_FILES["file"]["type"][$key];
					$temp_name = $_FILES["file"]["tmp_name"][$key];
					$file = chunk_split(base64_encode(file_get_contents($temp_name)));
					//$uid = md5(uniqid(time()));
					//$headers .="Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n";
       				//$headers .="This is a multi-part message in MIME format." . $eol;

					//attch part
					$headers .= "--".$separator. $eol;
					$headers .= "Content-Type: ".$file_type."; name=\"".$file_name."\"" . $eol;
					$headers .= "Content-Transfer-Encoding: base64" . $eol;
					$headers .= "Content-Disposition: attachment; filename=\"".$file_name."\"" . $eol;
					$headers .= $file. $eol;  //chucked up 64 encoded attch
				      }
				    }
				  }*/

			    $body = '';
			    $body .= "Content-type: text/html; charset=UTF-8" . $eol;
          //$body .= "Content-Transfer-Encoding: 7bit" . $eol;
          //$body .= "This is a MIME encoded message." . $eol; //had one more .$eol
			    $body .= "--" . $separator . $eol;
			    $body .= "Content-type: text/html; charset=UTF-8" . $eol;
			    $body .= "Content-type: text/html; charset=UTF-8" . $eol . $eol;
			    $body .= $message . $eol;
			    $body .= "--" . $separator . $eol;

          //$body .= "Content-Type: application/octet-stream; name=\"" . $filenames . "\"" . $eol;

			    $body .= "Content-Transfer-Encoding: base64" . $eol;

          //$body .= "Content-Disposition: attachment" . $eol . $eol;
          //$body .= $attachment . $eol;

			    $body .= "--" . $separator . "--";

			    if (mail($to, $subject, $body, $headers)) {
				$msgsuccess = 'Mail Send Successfully';
			    } else {
				$msgerror = 'Main not send';
				echo error_get_last()['message'];
			    }
			}


/////////////////SE ENVIA EMAIL A CLIENTE//////////////////////////////////
			    $mailfrom = 'notificaciones@followerezqualo.com';
			    $mailsubject = '¡Notificacion ODT'.' - '. $id_odt .' - '. $nom_proyecto .'!';
			    $firstname = '';
			    $lastname = '';
			    $description = '';

			    $description = wordwrap($description, 100, "<br />");

			    $content = '';
			    $content .= '
			    <style>
				tbody{
				border-color: #000000;
				border-style: none;
				}

				tr{
				border-color: #000000;
				border-style: none;
				}
			    </style>
			    ';

			    $to = $cliente_mail;
			    $from = $mailfrom;
			    $subject = $mailsubject;
				  //foreach ($array as $clave => $valor) {
			       //$s="<p>".$valor."</p>";
				     //$archivos=$archivos."".$s;
			    //}

			    // HTML email starts here

			   $message  = "<html><body>";

			   $message .= "<table width='100%' bgcolor='#000000' cellpadding='0' cellspacing='0' border='0'>";

			   $message .= "<tr><td>";

			   $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:641px; font-family:Verdana, Geneva, sans-serif;'>";

			   $message .= "<tbody>
			      <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			       <td>
			      	 <img src='https://followerezqualo.com/img/notificaciones/mail-odt-header.png' alt='ezq-mail-header' />
			       </td>
			      </tr>
			      <tr>
			       <td style='background-color: #000000; color: #ffffff; text-align:center;'>
			      	<h3 style='color: #808080'>ID ODT</h5><h1>". $id_odt ."</h3>
			       </td>
			      </tr>
			      <tr>
			       <td style='background-color: #000000; color: #ffffff; text-align:center;'>
			      	<h5>Nombre del Proyecto:</h5><h1>". $nom_proyecto ."</h1>
			       </td>
			      </tr>
			      <tr>
			       <td>
			       <img src='https://followerezqualo.com/img/notificaciones/lineas-amarillas.png' alt='lineas-amarillas' />
			       </td>
			      </tr>
			      </table>
			      <table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:641px; background-image: url($bgImagen); background-repeat:no-repeat; background-origin: content-box; font-family:Verdana, Geneva, sans-serif;'>
			      	<br>
			      <tr align='center' height='20' style='font-family:Verdana, Geneva, sans-serif;'>
			       <td style='color: #808080; text-align:center; font-size: 12px;'>Fecha de Solicitud: <h4 style='color: #00ff00;'>".$fecha_soli."</h4></td>
             <td style='color: #808080; text-align:center; font-size: 12px;'>Fecha de Entrega: <h4 style='color: #ff0000;'>".$fecha_entrega."</h4></td>
			      </tr>

			      <tr align='center' height='20' style='font-family:Verdana, Geneva, sans-serif;'>
	      		       <td style='color: #808080; text-align:center; font-size: 12px;'>Marca: <h2 style='color: #ffffff; margin-block-start: 0em;
      margin-block-end: 0.83em;'>".$marca."</h2></td>
			      </tr>

            <tr align='center' height='20' style='font-family:Verdana, Geneva, sans-serif;'>
                   <td style='color: #808080; text-align:center; font-size: 12px;'><h5 style='margin-block-end: 0em;'>Cliente: </h5><h2 style='color: #ffffff; margin-block-start: 0em;
      margin-block-end: 0.83em;'>".$cliente_odt."</h2></td>
                   
			      </tr>

			      <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			       <td style='color: #808080; text-align:center; font-size: 12px;'><h5 style='margin-block-end: 0em;'>Objetivo del proyecto: </h5><h2 style='color: #ffffff; margin-block-start: 0em;
      margin-block-end: 0.83em;'>".$objetivo."</h2></td>
             <td style='color: #808080; text-align:center; font-size: 12px;'><h5 style='margin-block-end: 0em;'>Dummy: </h5><h2 style='color: #ffffff; margin-block-start: 0em;
      margin-block-end: 0.83em;'>".$dummy."</h2></td>
			      </tr>

            <tr align='center' height='155' style='font-family:Verdana, Geneva, sans-serif;'></tr>

			      <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			       <td style='color: #808080; text-align:center; font-size: 12px;'><h5 style='margin-block-end: 0em;'>Arte Separados: </h5><h2 style='color: #ffffff; margin-block-start: 0em;
      margin-block-end: 0.83em;'>".$artes_separados."</h2></td>
             <td style='color: #808080; text-align:center; font-size: 12px;'><h5 style='margin-block-end: 0em;'>Arte ezqualo: </h5><h2 style='color: #ffffff; margin-block-start: 0em;
      margin-block-end: 0.83em;'>".$artes_ezqualo."</h2></td>
            </tr>

			      <tr align='center' height='105' style='font-family:Verdana, Geneva, sans-serif;'></tr>

			      <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			       <td style='color: #808080; text-align:center; font-size: 12px;'><h5 style='margin-block-end: 0em;'>Impreso: </h5><h2 style='color: #ffffff; margin-block-start: 0em;
      margin-block-end: 0.83em;'>".$impreso."</h2></td>
             <td style='color: #808080; text-align:center; font-size: 12px;'><h5 style='margin-block-end: 0em;'>Digital: </h5><h2 style='color: #ffffff; margin-block-start: 0em;
      margin-block-end: 0.83em;'>".$digital."</h2></td>
			      </tr>

            <tr align='center' height='125' style='font-family:Verdana, Geneva, sans-serif;'></tr>

			      <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			       <td style='color: #808080; text-align:center; font-size: 12px;'><h5 style='margin-block-end: 0em;'>Gran Formato: </h5><h2 style='color: #ffffff; margin-block-start: 0em;
      margin-block-end: 0.83em;'>".$formato."</h2></td>
			      </tr>

            <tr align='center' height='125' style='font-family:Verdana, Geneva, sans-serif;'></tr>

			      <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			       <td style='color: #808080; text-align:center; font-size: 12px;'><h5 style='margin-block-end: 0em;'>Medidas / Salidas: </h5><h2 style='color: #ffffff; margin-block-start: 0em;
      margin-block-end: 0.83em;'>".$medidas."</h2></td>
			      </tr>

            <tr align='center' height='20' style='font-family:Verdana, Geneva, sans-serif;'></tr>

			      <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			       <td style='color: #808080; text-align:center; font-size: 12px;'><h5 style='margin-block-end: 0em;'>Observaciones: </h5><h2 style='color: #ffffff; margin-block-start: 0em;
      margin-block-end: 0.83em;'>".$acabados."</h2></td>
			      </tr>
          </table>
          <table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:641px; font-family:Verdana, Geneva, sans-serif;'>
			      <tr>
			      	 <td>
				            <img src='https://followerezqualo.com/img/notificaciones/formato-mail-follower-foot.png' alt='ezq-mail-footer' />
				       </td>
			      </tr>
          </table>
			      </tbody>";

			   $message .= "</table>";

			   $message .= "</td></tr>";
			   $message .= "</table>";

			   $message .= "</body></html>";

			   //$message .= AddAttachment($archivos['tmp_name'], $archivos['name']);

			   // HTML email ends here

			    $separator = md5(time());
			    $eol = PHP_EOL;

          $filename = $nombre_archivo;
          $attachment = chunk_split(base64_encode($archivos));

			    $headers = "From: " . $from . $eol;
			    $headers .= "MIME-Version: 1.0" . $eol;
			    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol . $eol;

			     // Enviar Adjuntos en Correo
		       /*     if($_FILES["file"])
				  {
				   foreach($_FILES["file"]['tmp_name'] as $key => $tmp_name)
						{
				        //condicional si el fichero existe
				        if($_FILES["file"]["name"][$key])
				        {
				        // Nombres de archivos de temporales
					$file_name = $_FILES["file"]["name"][$key];
					$file_type = $_FILES["file"]["type"][$key];
					$temp_name = $_FILES["file"]["tmp_name"][$key];
					$file = chunk_split(base64_encode(file_get_contents($temp_name)));
					//$uid = md5(uniqid(time()));
					//$headers .="Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n";
       				//$headers .="This is a multi-part message in MIME format." . $eol;

					//attch part
					$headers .= "--".$separator. $eol;
					$headers .= "Content-Type: ".$file_type."; name=\"".$file_name."\"" . $eol;
					$headers .= "Content-Transfer-Encoding: base64" . $eol;
					$headers .= "Content-Disposition: attachment; filename=\"".$file_name."\"" . $eol;
					$headers .= $file. $eol;  //chucked up 64 encoded attch
				      }
				    }
				  }*/

          $body = '';
			    $body .= "Content-type: text/html; charset=UTF-8" . $eol;
          $body .= "Content-Transfer-Encoding: 7bit" . $eol;
          $body .= "This is a MIME encoded message." . $eol; //had one more .$eol
			    $body .= "--" . $separator . $eol;
			    $body .= "Content-type: text/html; charset=UTF-8" . $eol;
			    $body .= "Content-type: text/html; charset=UTF-8" . $eol . $eol;
			    $body .= $message . $eol;
			    $body .= "--" . $separator . $eol;

          $body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
          $body .= "Content-Description: " . $filename . "\"" . $eol;

			    $body .= "Content-Transfer-Encoding: base64" . $eol;

          $body .= "Content-Disposition: attachment" . $eol . $eol;
          $body .= $attachment . $eol;

			    $body .= "--" . $separator . "--";

			    if (mail($to, $subject, $body, $headers)) {
				$msgsuccess = 'Mail Send Successfully';
			    } else {
				$msgerror = 'Mail not send';
				echo error_get_last()['message'];
			    }
			//TERMINA PROCESO DE ENVIAR EMAILS
			echo '<script>
				Swal.fire({
					type: "success",
					title: "Datos correctos",
					text: "ODT registrada correctamente!",
					background:"#febe10",
					confirmButtonColor:"#000000"
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


?>

