<?php

session_start();

$to = "xavier.escamilla@ezqualo.com";
$from = "notificaciones@ezqualo.com";
$subject = "Prueba de Archivos Adjuntos";
				
// HTML email starts here

echo "inicio de envio";

$message  = "Correo enviado!";
$separator = md5(time());
$eol = PHP_EOL;
			    $headers = "From: " . $from . $eol;
			    $headers .= "MIME-Version: 1.0" . $eol;
			    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol . $eol;
/*
			    if($_FILES["file"])
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
				  }
*/				  
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
				echo "correo enviado";
			    } else {
				$msgerror = 'Main not send';
				echo error_get_last()['message'];
			    }
			}

echo "fin de envio";		   
?>
