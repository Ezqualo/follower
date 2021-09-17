<?php 
	require_once "conexion.php";
	$conexion=conexion();
	$id=$_POST['id'];
    $fechaF=$_POST['fechaF'];
    $fechaAnt=$_POST['fechaAnt'];
    $sql="UPDATE odts SET fechaEntrega='$fechaF', fechaAnterior = '$fechaAnt' WHERE id='$id'";
    $result=mysqli_query($conexion,$sql);
    echo($result);
    if($result){
    	$correos=array();

        $sql="SELECT * from odts WHERE id='$id'";
        $result2=mysqli_query($conexion,$sql);
        while($consulta = mysqli_fetch_array($result2)) {
		$proyecto=''.($consulta['proyecto']).'';
		$fechaEntrega=$consulta['fechaEntrega'];
		$fechaAnterior=$consulta['fechaAnterior'];
		$correoCliente=$consulta['mail_cliente'];
		$correoEjecutiva=$consulta['ejecutivaCuenta'];
		}
	array_push($correos, $correoCliente);
	//array_push($correos,"enrique.correa@ezqualo.com")
	array_push($correos, $correoEjecutiva);

	$sql="SELECT correo from equipoDireccion ";
        $result3=mysqli_query($conexion,$sql);
        while($consulta = mysqli_fetch_array($result3)) {
		array_push($correos, $consulta['correo']);
	}
		
		//print_r($correos);
		enviarCorreo($correos,$proyecto,$fechaEntrega,$fechaAnterior);
    }
    
    function enviarCorreo($correos,$proyecto,$fechaEntrega,$fechaAnterior){
		
		$cadenaCorreos = implode(",", $correos);
		$mailfrom = 'notificaciones@followerezqualo.com';
		$mailsubject = '¡Cambio de Fecha ODT'.' - '. $proyecto .'!';
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

		$to = $cadenaCorreos;
		//$to= "enrique.correa@ezqualo.com";
		$from = $mailfrom;
		$subject = $mailsubject;
		
		// HTML email starts here

		$message  = "<html><body>";
		
		$message .= "<table width='100%' bgcolor='#000000' cellpadding='0' cellspacing='0' border='0'>";
		
		$message .= "<tr><td>";
		
		$message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:641px; background-color:#000000; font-family:Verdana, Geneva, sans-serif;'>";
		
		$message .= "<tbody >
			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td>
				<img src='https://followerezqualo.com/img/notificaciones/mail-odt-header.png' alt='ezq-mail-header' />
			</td>
			</tr>

			<tr>
			<td style='background-color: #000000; color: #ffffff; text-align:center;'>
			<h5>Nombre del Proyecto:</h5><h1>". $proyecto ."</h1>
			</td>
			</tr>

			<tr>
			<td>
			<img src='https://followerezqualo.com/img/notificaciones/lineas-amarillas.png' alt='lineas-amarillas' />
			</td>
			</tr>

			<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
			<td style='background-color: #000000; color: #808080; text-align:center;'>
			<br><br>
			La fecha de entrega de este proyecto ha cambiado,<br> pasa de <b style='color: #ff0000;'>".$fechaAnterior."</b> a <b style='color: #00ff00;'>".$fechaEntrega."</b>.<br><br><br><br>
			</td>
			</tr>
						
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
		
		// HTML email ends here
				
		$separator = md5(time());
		$eol = PHP_EOL;
		$headers = "From: " . $from . $eol;
		$headers .= "MIME-Version: 1.0" . $eol;
		$headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol . $eol;

		$body = '';
		$body .= "Content-type: text/html; charset=UTF-8" . $eol;
		$body .= "This is a MIME encoded message." . $eol; //had one more .$eol
		$body .= "--" . $separator . $eol;
		$body .= "Content-type: text/html; charset=UTF-8" . $eol;
		$body .= "Content-type: text/html; charset=UTF-8" . $eol . $eol;
		$body .= $message . $eol;
		$body .= "--" . $separator . $eol;
		$body .= "Content-Transfer-Encoding: base64" . $eol;
		$body .= "--" . $separator . "--";

		if (mail($to, $subject, $body, $headers)) {
		$msgsuccess = 'Mail Send Successfully';
		} else {
		$msgerror = 'Main not send';
		}
	}
 ?>
