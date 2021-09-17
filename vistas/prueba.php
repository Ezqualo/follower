<?php

//defino fecha 1
$year1 = 2021;
$mes1 = 4;
$dia1 = 12;
//defino fecha 2
$year2 = 2021;
$mes2 = 6;
$dia2 = 25;
//calculo timestam de las dos fechas
$timestamp1 = mktime(0,0,0,$mes1,$dia1,$year1);
$timestamp2 = mktime(4,12,0,$mes2,$dia2,$year2);
//resto a una fecha la otra
$segundos_diferencia = $timestamp1 - $timestamp2;
//echo $segundos_diferencia;
//convierto segundos en días
$dias_diferencia = $segundos_diferencia / (60 * 60 * 24);
//obtengo el valor absoulto de los días (quito el posible signo negativo)
$dias_diferencia = abs($dias_diferencia);
//quito los decimales a los días de diferencia
$dias_diferencia = floor($dias_diferencia);
$dias_contados = $dias_diferencia + 1;  
echo $dias_contados;







$date1  = '2021-01-15';
$date2  = '2021-08-15';
$output = [];
$time   = strtotime($date1);
$last   = date('M-Y', strtotime($date2));

do {
$month = date('M-Y', $time);
$total = date('t', $time);

$output[] = $month;

$time = strtotime('+1 month', $time);
} while ($month != $last);

echo implode(",", $output);
?>