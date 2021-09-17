<?php
$arreglo=[];
array_push($arreglo, "enrique.correa@ezqualo.com");
array_push($arreglo,"ivan.salazar@ezqualo.com");
array_push($arreglo,"xavier.escamilla@ezqualo.com");
print_r($arreglo);

$para = implode(",", $arreglo);

$titulo = 'Enviando email desde PHP';
$mensaje = 'Este es un email que se envía a múltiples destinatarios prueba, y esto fue lo que habia en array: '.$para.' >:v' ;
$cabeceras = 'From: Línea de Código ';

$enviado = mail($para, $titulo, $mensaje, $cabeceras);
if ($enviado)
  echo 'Email enviado correctamente a '.$para;
else
  echo 'Error en el envío del email';
?>
