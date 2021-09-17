<?php 
session_start();
if ($_SESSION["s_usuario"] === null) {
    header("Location: ../index.php");
}
$userlogin = $_SESSION["s_usuario"];
$useridRol = $_SESSION["s_idRol"];

if($tabla == "odt"){
    //echo "tabla mismo mes odt";
    $subject = $_GET['nom_proy'];
    $subject2 = $_GET['nom_pieza'];
    $id = $_GET['id'];
    $Nombre_Proyecto = $id . '-' . $subject . '-ODT';
    $Nombre_Pieza = $id . '-' . $subject2 . '-ODT';
    //echo " sdfsdfsdf " . $Nombre_Proyecto;
} else{
    //echo "tabla brief";
}
////////////////////////////actualizacion

//echo "HOLA MUNDO PIEZAS :::::: " . $subject;
$sql_ids = "SELECT id FROM odts WHERE proyecto = '$subject'";
$resultos = mysqli_query($mysqli,$sql_ids);

while($ver_id = mysqli_fetch_row($resultos)){
    $id_piezas = $ver_id[0];
    //echo " id de cada pieza : " . $id_piezas;
}


if(empty($subject2) == false){
    //echo "Busco proyecto y pieza";
    if(isset($_SESSION['consulta'])){
        if($_SESSION['consulta'] > 0){
            $idp=$_SESSION['consulta'];
            $sql="SELECT * FROM piezas where id='$idp' AND idPieza='$id_piezas'";
        }else{
            $sql="SELECT * FROM piezas where idPieza='$id_piezas'";
        }
    }else{
        $sql="SELECT * FROM piezas where idPieza='$id_piezas'";
    }
}else{
    if(isset($_SESSION['consulta'])){
        if($_SESSION['consulta'] > 0){
            $idp=$_SESSION['consulta'];
            $sql="SELECT * FROM piezas where id='$idp' AND idPieza='$id'";
        }else{
            $sql="SELECT * FROM piezas where idPieza='$id'";
        }
    }else{
        $sql="SELECT * FROM piezas where idPieza='$id'";
    }
}

$idSemcoment = 1;
$result=mysqli_query($mysqli,$sql);
$num_rows = mysqli_num_rows($result);
//echo " numero de filas de la pieza es " . $num_rows;

while($ver=mysqli_fetch_row($result)){
    /*$break = 0;
    $romper_ciclo = 0;
    $avanzar_cont = 0;
    $remplazo_cont = $cont;
    $romperciclo_2meses = 0;*/

    $datos=$ver[0]."||".
        $ver[1]."||".
        $ver[2]."||".
        $ver[3]."||".
        $ver[4]."||".
        $ver[5]."||".
        $ver[6]."||".
        $ver[7];

    $semaforocomentario = $ver[7];
    ?>

    <tr class="tt-wrapper">
        <?php

        //echo "FECHA $ver[2] ";
        $lista_dias = array(0 => "Sunday", 1 => "Monday", 2 => "Tuesday", 3 => "Wednesday", 4 => "Thursday", 5 => "Friday", 6 => "Saturday");
        //$lista_dias = array(0 => "Sun", 1 => "Mon", 2 => "Tue", 3 => "Wed", 4 => "Thu", 5 => "Fri", 6 => "Sat");
        $clave_dia = array_search($dia_semana, $lista_dias);
        $n = $clave_dia;
        $fecha_ini_coment = $ver[5];
        $fecha_fin_coment = $ver[6];
        
        $fecha_inicial_p = substr($fecha_ini_coment, 5,5);
        //echo "****fecha_inicial: " . $fecha_ini_coment;

        $fecha_cal_fin = substr($fecha_fin_coment, 8, 2);
        $fecha_cal_fin2 = substr($fecha_fin_coment, 5, 5);
        
        $fecha_cal_ini = substr($fecha_ini_coment, 8, 2);
        $fecha_cal_ini2 = substr($fecha_ini_coment, 5, 5);

        $mes_cal_ini = substr($fecha_ini_coment, 5, 2);
        $mes_cal_fin = substr($fecha_fin_coment, 5, 2);
        $mes = substr($fecha_ini_coment, 5, 2);

        $year3 = substr($fecha_ini_coment, 0, 4);
        $mes3 = substr($fecha_ini_coment, 5, 2);
        $dia3 = substr($fecha_ini_coment, 8, 2);
        $year4 = substr($fecha_fin_coment, 0, 4);
        $mes4 = substr($fecha_fin_coment, 5, 2);
        $dia4 = substr($fecha_fin_coment, 8, 2);
        //calculo timestam de las dos fechas
        $timestamp3 = mktime(0,0,0,$mes3,$dia3,$year3);
        $timestamp4 = mktime(4,12,0,$mes4,$dia4,$year4);
        //resto a una fecha la otra
        $segundos_diferencia2 = $timestamp3 - $timestamp4;
        //echo $segundos_diferencia;
        //convierto segundos en días
        $dias_diferencia2 = $segundos_diferencia2 / (60 * 60 * 24);
        //obtengo el valor absoulto de los días (quito el posible signo negativo)
        $dias_diferencia2 = abs($dias_diferencia2);
        //quito los decimales a los días de diferencia
        $dias_diferencia2 = floor($dias_diferencia2);
        $dias_contados2 = $dias_diferencia2;  
        //echo " Dias---- " . $dias_contados2;

        if ($useridRol == 1 || $useridRol == 2){
        ?>

        <td>
            <button id="modificar_datos" class="btn" data-toggle="modal" data-target="#modalPiezaEdit" onclick="form_actualizarPieza('<?php echo utf8_encode($datos) ?>')">
                <img src="../img/edit.png" alt="" style="max-width: 20px; color:white;">
            </button>
        </td>
        <td>
            <button class="btn" onclick="preguntarSiNoPieza('<?php echo $ver[0] ?>')">
                <img src="../img/delete.png" alt="" style="max-width: 20px; color:white;">
            </button>
        </td>

        <?php
        } else{
        ?> 
        <td>
            <button id="modificar_datos" class="btn" data-toggle="modal" data-target="#modalPiezaEdit" onclick="form_actualizarPieza('<?php echo utf8_encode($datos) ?>')" disabled="true">
                <img src="../img/edit.png" alt="" style="max-width: 20px; color:white;">
            </button>
        </td>
        <td>
            <button class="btn" onclick="preguntarSiNoPieza('<?php echo $ver[0] ?>')" disabled="true">
                <img src="../img/delete.png" alt="" style="max-width: 20px; color:white;">
            </button>
        </td>

        <?php
        }

        echo utf8_encode('<td class="">'.$ver[2].'</td>');
        $cont = $dia1;
        
        $array_num = count($output);
        
        for ($i = 0; $i < $array_num; ++$i){
            //print $output[$i];
            $mes_ciclo_fechas = substr($output[$i], 0, 3);
            //echo " mes ciclo " . $mes_ciclo_fechas; 
            $mes_C = array_search($mes_ciclo_fechas, $lista_meses);
            //echo " dias del mes ciclo : " . $mes_C;
                                
            if($mes_C == 1){
                $days_C = 31;
            } elseif($mes_C == 2){
                $days_C = 28;
            } elseif($mes_C == 3){
                $days_C = 31;
            } elseif($mes_C == 4){
                $days_C = 30;
            } elseif($mes_C == 5){
                $days_C = 31;
            } elseif($mes_C == 6){
                $days_C = 30;
            } elseif($mes_C == 7){
                $days_C = 31;
            } elseif($mes_C == 8){
                $days_C = 31;
            } elseif($mes_C == 9){
                $days_C = 30;
            } elseif($mes_C == 10){
                $days_C = 31;
            } elseif($mes_C == 11){
                $days_C = 30;
            } elseif($mes_C == 12){
                $days_C = 31;
            }
            $contador_2meses = 1;
            $avanzar_mes = $mes_C;
            $contador_dias = $fecha_cal_ini;
            //$dias_contados2 = $dias_contados2 + 1;
            //echo "***DIAS CONTADOS ES: " . $dias_contados;
            $avanzar_contador = 1;
            while($avanzar_contador <= $dias_contados2){ //INICIA CREACION DE CELDAS
                if($n == 0 || $n == 6){// CONDICION PARA SABER SI ES FIN DE SEMANA 
                    if($cont > $days_C){
                        $cont = 1;
                        $mes_C++;
                        if($mes_C == 1){
                            $days_C = 31;
                        } elseif($mes_C == 2){
                            $days_C = 28;
                        } elseif($mes_C == 3){
                            $days_C = 31;
                        } elseif($mes_C == 4){
                            $days_C = 30;
                        } elseif($mes_C == 5){
                            $days_C = 31;
                        } elseif($mes_C == 6){
                            $days_C = 30;
                        } elseif($mes_C == 7){
                            $days_C = 31;
                        } elseif($mes_C == 8){
                            $days_C = 31;
                        } elseif($mes_C == 9){
                            $days_C = 30;
                        } elseif($mes_C == 10){
                            $days_C = 31;
                        } elseif($mes_C == 11){
                            $days_C = 30;
                        } elseif($mes_C == 12){
                            $days_C = 31;
                        }
                        $avanzar_mes = $mes_C;
                    }

                    echo '<td name="'.$n.'" id="'.$avanzar_mes. "-".$cont.'"></td>';

                    $n = $n + 1;
                    if($n == 7){
                        $n = 0;
                    }
                    
                }else{//INICIA CODIGO PARA CUANDO N0 ES FIN DE SEMANA
                     //CODIGO PARA CREAR CELDAS QUE NO ESTEN DENTRO DE LAS FECHAS DE EVENTOS 
                    if($cont < 10){
                        $fecha_dia = "0" . $cont;
                    }else{
                        $fecha_dia = $cont;
                    }
                    if($mes_C < 10){
                        $fecha_mes = "0" . $mes_C;
                    }else{
                        $fecha_mes = $mes_C;
                    }
                    
                    /*$str = $fecha_dia;
                    $str_corregido = strlen($str);
                    echo " hola " . strlen($str);

                    if($str_corregido == 3){
                        $fecha_dia_buena = substr($str,1);
                        echo " mundo:" . $fecha_dia_buena; 
                        $inicia_evento = $fecha_mes . "-" . $fecha_dia_buena; //VARIABLE CON VALOR DE INICIO DE EVENTO
                        echo "Inicia evento: " . $inicia_evento;
                    } else{
                        $inicia_evento = $fecha_mes . "-" . $fecha_dia; //VARIABLE CON VALOR DE INICIO DE EVENTO
                        //echo "Inicia evento: " . $inicia_evento;
                    }*/

                    $inicia_evento = $fecha_mes . "-" . $fecha_dia; //VARIABLE CON VALOR DE INICIO DE EVENTO
                    //echo "Inicia evento: " . $inicia_evento;
                    if ($fecha_inicial_p == $inicia_evento){//CONDICION PARA CUANDO EL EVENTO ES IGUAL A LA FECHA INICIAL 
                        //echo "--FECHA CAL INI " . $dias_contados2 . "--/";
                        //if($fecha_cal_ini < $days_C){
                            //echo "valor de mes es: " . $mes_C;
                            while($contador_2meses <= $dias_contados2){
                                if(empty($subject2) == false){//CONDICION PARA CUANDO HAY UNA PIEZA
                                    //CICLO PARA COLOREAR LAS TAREAS QUE ESTAN EN UNA PIEZA DE 2 O MAS MESES Y LA TAREA SE ENCUENTRA DENTRO DE UN SOLO MES 
                                }else{ // CONDICION CUANDO EL PROYECTO ESTA DENTRO DEL MISMO MES Y ES UNA PROYECTO
                                    //echo " VALOR DE VER 2 ES: " . $ver[2];
                                    
                                    $sql_comentarios2 = $mysqli -> query("SELECT id,dia,color,comentario,motivo FROM eventos WHERE comentarioAsignado = '$ver[2]' AND pieza = '$ver[2]' AND proyecto = '$Nombre_Proyecto'");
                                    while($coment_encontrado = mysqli_fetch_array($sql_comentarios2)){
                                        $color = "$coment_encontrado[color]";
                                        if(empty($coment_encontrado[motivo] == false)){
                                            $tooltip = $coment_encontrado[comentario] . " Motivo: " . $coment_encontrado[motivo];
                                        }else{
                                            $tooltip = $coment_encontrado[comentario];
                                        }
    
                                        $datos =$coment_encontrado[0]."||".
                                                $coment_encontrado[1]."||".
                                                $coment_encontrado[2]."||".
                                                $coment_encontrado[3];

                                        $aux_dia = $cont;
                                        $aux_mes = $mes_C;
                                        $cont_concatenado = $aux_mes . "-" . $aux_dia;
                                        
                                        //echo " comentario encontrado " . $coment_encontrado[dia];
                                        //echo " cont concatenado " . $cont_concatenado;
                                        if($cont_concatenado == $coment_encontrado[dia]){
                                            if ($useridRol == 1 || $useridRol == 2){
                                            ?>
                                            <td class="tt-gplus" id="<?php echo $avanzar_mes."-".$cont ?>" style="background-color: <?php echo $color ?>" class="Evento" data-toggle="modal" data-target="#modaleditareventopieza" onclick="editarEpieza('<?php echo utf8_encode($datos) ?>')"> <span class=""><?php echo utf8_encode($tooltip) ?></span></td>
                                            <?php
                                            } else{
                                            ?>
                                            <td class="tt-gplus" id="<?php echo $avanzar_mes."-".$cont ?>" style="background-color: <?php echo $color ?>" class="Evento" data-toggle="modal" data-target="" onclick="editarE('<?php echo utf8_encode($datos) ?>')"> <span class=""><?php echo utf8_encode($tooltip) ?></span></td>
                                            <?php    
                                            }

                                            $n = $n + 1;
                                            if ($n == 7) {
                                                $n = 0;
                                            }
                                            $cont = $cont + 1;
                                            if($cont == $fecha_cal_fin){
                                                echo '<td class="tt-gplus" id="'.$avanzar_mes."-".$cont.'" name="fech_fin"> <span class="">' . utf8_encode($ver[4]) . '</span></td>';
                                                
                                                if($cont < 10){
                                                    $aux_dia = "0" . $cont;
                                                }else{
                                                    $aux_dia = $cont;
                                                }
                                                if($mes_C < 10){
                                                    //$mes_C ++;
                                                    $aux_mes = "0" . $mes_C;
                                                }else{
                                                    $aux_mes = $mes_C;
                                                }

                                                
                                                $romper_ciclo_final = $aux_mes . "-" . $aux_dia;

                                                //echo " valores de romper_ciclo_final ". $romper_ciclo_final;
                                                if($fecha_final_p == $romper_ciclo_final){
                                                    $var_aux = 1;
                                                    $cont++;
                                                    break;
                                                }else{
                                                    $var_aux = 1; // SOLUCION
                                                    //echo " ENTRE AL ELSE ";
                                                    
                                                    $n = $n + 1;
                                                    if ($n == 7) {
                                                        $n = 0;
                                                    }

                                                }
                                            }
                                            $contador_2meses++;     
                                        }
                                        //$cont = $cont + 1;
                                        //break;
                                    }
                                    if($var_aux == 1){ //SOLUCION DE CELDAS COLOREADAS DE MAS
                                        $var_aux = 2;
                                        if($cont > $fecha_cal_fin){
                                            $break = 1;
                                        }
                                        break;

                                    } else {
                                        if($cont > $days_C){
                                            $cont = 1;
                                            $mes_C++;
                                            if($mes_C == 1){
                                                $days_C = 31;
                                            } elseif($mes_C == 2){
                                                $days_C = 28;
                                            } elseif($mes_C == 3){
                                                $days_C = 31;
                                            } elseif($mes_C == 4){
                                                $days_C = 30;
                                            } elseif($mes_C == 5){
                                                $days_C = 31;
                                            } elseif($mes_C == 6){
                                                $days_C = 30;
                                            } elseif($mes_C == 7){
                                                $days_C = 31;
                                            } elseif($mes_C == 8){
                                                $days_C = 31;
                                            } elseif($mes_C == 9){
                                                $days_C = 30;
                                            } elseif($mes_C == 10){
                                                $days_C = 31;
                                            } elseif($mes_C == 11){
                                                $days_C = 30;
                                            } elseif($mes_C == 12){
                                                $days_C = 31;
                                            }
                                            $avanzar_mes = $mes_C;
                                            //echo " Ente al if de dias";
                                        }

                                        if ($n == 0 || $n == 6) {
                                            echo '<td name="fines" id="'.$avanzar_mes."-".$cont.'"></td>';
                                        }else{
                                            $salto = 12;
                                            if ($useridRol == 1 || $useridRol == 2){
                                                $fecha_Ant = $ver[8];
                                                $fechaAnteriorOdt = substr($fecha_Ant, 5, 5);
                                                $fecha_final_comentario = $ver[6];
                                                $fechafinalOdt = substr($fecha_final_comentario, 8, 2);
                                                if($cont < 10){
                                                    $aux_dia = "0" . $cont;
                                                }else{
                                                    $aux_dia = $cont;
                                                }
                                                if($mes_C < 10){
                                                    $aux_mes = "0" . $mes_C;
                                                }else{
                                                    $aux_mes = $mes_C;
                                                }
                                                
                                                $finalizar_ciclo = $aux_mes . "-" . $aux_dia;
                                                //echo " La fecha anterior es: " . $fechaAnteriorOdt;
                                                if($fechaAnteriorOdt == $finalizar_ciclo){
                                                    $nombres_semana = array_search($n, $nombres_dias);
                                                    echo '<td class="tt-gplus" id="'.$avanzar_mes."-".$cont.'" name="fech_ant"> <span class="">Fecha de Entrega Anterior</span></td>';   
                                                    if($cont == $days_C && $fechafinalOdt == 01){
                                                        $salto = 0;
                                                    }else{
                                                        $salto = 10;
                                                    }
                                                }else{
                                                    echo '<td class="tt-gplus" id="'.$avanzar_mes."-".$cont.'" name="fech_ini" class="Evento" data-toggle="modal" data-target="#modaleventopieza" onclick=borrarpieza(this)></td>';
                                                }        
                                                
                                            } else{
                                                $fecha_Ant = $ver[8];
                                                $fechaAnteriorOdt = substr($fecha_Ant, 5, 5);
                                                if($cont < 10){
                                                    $aux_dia = "0" . $cont;
                                                }else{
                                                    $aux_dia = $cont;
                                                }
                                                if($mes_C < 10){
                                                    $aux_mes = "0" . $mes_C;
                                                }else{
                                                    $aux_mes = $mes_C;
                                                }
                                                
                                                $finalizar_ciclo = $aux_mes . "-" . $aux_dia;
                                                //echo " La fecha anterior es: " . $fechaAnteriorOdt;
                                                if($fechaAnteriorOdt == $finalizar_ciclo){
                                                    $nombres_semana = array_search($n, $nombres_dias);
                                                    echo '<td class="tt-gplus" id="'.$avanzar_mes."-".$cont.'" name="fech_ant"> <span class="">Fecha de Entrega Anterior</span></td>';   
                                                    
                                                }else{
                                                    echo '<td class="tt-gplus" id="'.$avanzar_mes."-".$cont.'" name="fech_ini" class="Evento" data-toggle="modal" data-target="" onclick=borrar(this)></td>';
                                                }
                                            }
                                        }

                                        $n = $n + 1;
                                        if ($n == 7) {
                                            $n = 0;
                                        }

                                        if($salto == 0){
                                            $salto = 1;
                                            $aux_cont = 1;
                                            $aux_mes = $avanzar_mes+1;
                                            $cont++;
                                        } else{
                                            $cont = $cont + 1;                                            
                                        }

                                        if($contador_2meses == $dias_contados2){
                                            if($salto == 1){
                                                if($aux_cont == 1){
                                                    $variable = 2;
                                                    $salto = 2;
                                                }else{
                                                    $variable = 3;
                                                    $salto = 3;
                                                }
                                                
                                                echo '<td class="tt-gplus" id="'.$aux_mes."-".$aux_cont.'" name="fech_fin"> <span class="">' . utf8_encode($ver[2]) . '</span></td>';
                                                $aux_cont = 2;
                                            } else{
                                                echo '<td class="tt-gplus" id="'.$avanzar_mes."-".$cont.'" name="fech_fin"> <span class="">' . utf8_encode($ver[2]) . '</span></td>';
                                            }
                                            

                                            if($cont < 10){
                                                $aux_dia = "0" . $cont;
                                            }else{
                                                $aux_dia = $cont ;
                                            }
                                            if($mes_C < 10){
                                                //$mes_C ;
                                                $aux_mes = "0" . $mes_C;
                                            }else{
                                                $aux_mes = $mes_C;
                                            }

                                            $terminar_ciclo_final = $aux_mes . "-" . $aux_dia;

                                            if($fecha_final_p == $terminar_ciclo_final){
                                                //echo " la fecha final de la tarea es el ultimo dia de la odt /*/*/*/* ";
                                                $break = 1;
                                                break;
                                            }else{
                                                $n = $n + 1;
                                                if ($n == 7) {
                                                    $n = 0;
                                                }  
                                            } 
                                            
                                        }
                                    }
                                    $contador_2meses++;
                                }
                            }//cierra while  
                            //$cont--; 
                        //}
                    }else{
                        if($break == 1){
                            $break = 2;
                            break;
                        }
                        if($cont > $days_C){
                            $cont = 1;
                            $mes_C++;
                            if($mes_C == 1){
                                $days_C = 31;
                            } elseif($mes_C == 2){
                                $days_C = 28;
                            } elseif($mes_C == 3){
                                $days_C = 31;
                            } elseif($mes_C == 4){
                                $days_C = 30;
                            } elseif($mes_C == 5){
                                $days_C = 31;
                            } elseif($mes_C == 6){
                                $days_C = 30;
                            } elseif($mes_C == 7){
                                $days_C = 31;
                            } elseif($mes_C == 8){
                                $days_C = 31;
                            } elseif($mes_C == 9){
                                $days_C = 30;
                            } elseif($mes_C == 10){
                                $days_C = 31;
                            } elseif($mes_C == 11){
                                $days_C = 30;
                            } elseif($mes_C == 12){
                                $days_C = 31;
                            }
                            $avanzar_mes = $mes_C;
                        }

                        if($salto == 2){
                            //echo "entre ala ultima condicion y salto es igual a: " . $salto;
                            $salto = 4;
                            $cont++;
                        }

                        echo '<td id="'.$avanzar_mes."-".$cont.'"></td>';
                        
                        $n = $n + 1;
                        if ($n == 7) {
                            $n = 0;
                        }                        
    
                        if($cont < 10){
                            $aux_dia = "0" . $cont;
                        }else{
                            $aux_dia = $cont;
                        }
                        if($mes_C < 10){
                            $aux_mes = "0" . $mes_C;
                        }else{
                            $aux_mes = $mes_C;
                        }
    
                        $finalizar_ciclo = $aux_mes . "-" . $aux_dia;
                        //echo " terminar_ciclo_final " . $terminar_ciclo_final ." fecha_final_p : " . $fecha_final_p;
                        if($fecha_final_p == $finalizar_ciclo){
                            //echo "Termine";
                            $n = $n + 1;
                            if ($n == 7) {
                                $n = 0;
                            } 
                            break;
                        }
                    }  
                }
                
                $cont++;
                
                //echo " contador: " . $avanzar_contador;
                //$avanzar_contador++;  Solucion de cuando no se creaban las celdas en algunas tareas de menos de dos semanas
            }
            break;
        }
        if ($useridRol == 1 || $useridRol == 2){
	$po=$ver[0];
        echo '<td> 
					
					<div class="radio-item">';
					    if( $semaforocomentario=="#FFC500" ){

					        echo '<input onclick="act_semaforo_p('.$po.',value)" type="radio" id="InicioPO'.$idSemcoment.'" name="dronePO'.$idSemcoment.'" checked value="#FFC500">';
					    }else{
					        echo '<input onclick="act_semaforo_p('.$po.',value)" type="radio" id="InicioPO'.$idSemcoment.'" name="dronePO'.$idSemcoment.'" value="#FFC500">';
					    }
					    echo '<label id="iniciolabel" for="InicioPO'.$idSemcoment.'"></label>
					</div>
					<div class="radio-item">';
					    if($semaforocomentario=="#1CB707"){
					        echo '<input onclick="act_semaforo_p('.$po.',value)" type="radio" id="EnviadoPO'.$idSemcoment.'" name="dronePO'.$idSemcoment.'" checked value="#1CB707">';
					    }else{
					        echo '<input onclick="act_semaforo_p('.$po.',value)" type="radio" id="EnviadoPO'.$idSemcoment.'" name="dronePO'.$idSemcoment.'" value="#1CB707">';
					    }

					    echo '<label id="enviadolabel" for="EnviadoPO'.$idSemcoment.'"></label>
					</div>
					<div class="radio-item">';
					if($semaforocomentario=="#FF0C00"){
					    echo '<input onclick="act_semaforo_p('.$po.',value)" type="radio" id="PausadoPO'.$idSemcoment.'" name="dronePO'.$idSemcoment.'" checked value="#FF0C00">';
					}else{
					    echo '<input onclick="act_semaforo_p('.$po.',value)" type="radio" id="PausadoPO'.$idSemcoment.'" name="dronePO'.$idSemcoment.'" value="#FF0C00">';
					}
					
					echo '<label id="pausadolabel" for="PausadoPO'.$idSemcoment.'"></label>
					</div>
					<div class="radio-item">';
					    if($semaforocomentario=="#6900D1"){
					        echo '<input onclick="act_semaforo_p('.$po.',value)" type="radio" id="CerradoPO'.$idSemcoment.'" name="dronePO'.$idSemcoment.'" checked value="#6900D1">';
					    }else{
					        echo '<input onclick="act_semaforo_p('.$po.',value)" type="radio" id="CerradoPO'.$idSemcoment.'" name="dronePO'.$idSemcoment.'" value="#6900D1">';
					    }
					    
					    echo '<label id="cerradolabel" for="CerradoPO'.$idSemcoment.'"></label>
					</div>
					

				    </td>';
	}
	else{
	echo '<td> 
					
					<div class="radio-item">';
					    if( $semaforocomentario=="#FFC500" ){

					        echo '<input type="radio" id="InicioPO'.$idSemcoment.'" name="dronePO'.$idSemcoment.'" checked value="#FFC500" disabled>';
					    }else{
					        echo '<input  type="radio" id="InicioPO'.$idSemcoment.'" name="dronePO'.$idSemcoment.'" value="#FFC500" disabled>';
					    }
					    echo '<label id="iniciolabel" for="InicioPO'.$idSemcoment.'"></label>
					</div>
					<div class="radio-item">';
					    if($semaforocomentario=="#1CB707"){
					        echo '<input  type="radio" id="EnviadoPO'.$idSemcoment.'" name="dronePO'.$idSemcoment.'" checked value="#1CB707" disabled>';
					    }else{
					        echo '<input  type="radio" id="EnviadoPO'.$idSemcoment.'" name="dronePO'.$idSemcoment.'" value="#1CB707" disabled>';
					    }

					    echo '<label id="enviadolabel" for="EnviadoPO'.$idSemcoment.'"></label>
					</div>
					<div class="radio-item">';
					if($semaforocomentario=="#FF0C00"){
					    echo '<input  type="radio" id="PausadoPO'.$idSemcoment.'" name="dronePO'.$idSemcoment.'" checked value="#FF0C00" disabled>';
					}else{
					    echo '<input type="radio" id="PausadoPO'.$idSemcoment.'" name="dronePO'.$idSemcoment.'" value="#FF0C00" disabled>';
					}
					
					echo '<label id="pausadolabel" for="PausadoPO'.$idSemcoment.'"></label>
					</div>
					<div class="radio-item">';
					    if($semaforocomentario=="#6900D1"){
					        echo '<input  type="radio" id="CerradoPO'.$idSemcoment.'" name="dronePO'.$idSemcoment.'" checked value="#6900D1" disabled>';
					    }else{
					        echo '<input  type="radio" id="CerradoPO'.$idSemcoment.'" name="dronePO'.$idSemcoment.'" value="#6900D1" disabled>';
					    }
					    
					    echo '<label id="cerradolabel" for="CerradoPO'.$idSemcoment.'"></label>
					</div>
					

				    </td>';
	}

        ?>

    </tr>
    <?php
    $idSemcoment++;
}// TERMINA WHILE PRINCIPAL 
?>


<!-- Modal para eventos -->
<div class="modal fade" id="modaleventopieza" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title" id="myModalLabel">Agregar nuevo evento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>Comentario</label>
                <input type="text" name="" id="comentario" class="form-control input-sm" required>
                <label>Color</label>
                <input type="color" id="color_event" class="form-control input-sm" required>
                <input type="text" id="dia_event" class="form-control input-sm" hidden>
                <input type="text" id="coment_asig" class="form-control input-sm" hidden>
                <input type="text" id="proyectoe" class="form-control input-sm" hidden>
                <input type="text" id="piezae" class="form-control input-sm" hidden>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardareventopieza">
                    Agregar
                </button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
//var boton = document.getElementById('guardar_evento');
    function borrarpieza( cel ) {
        var id_td = $(cel).attr("id");
    	
        var project = '<?php echo utf8_encode($Nombre_Proyecto);?>';
        var pieza_rec = '<?php echo utf8_encode($subject2);?>';
        
        $("#tabla tbody tr").on("click", function(event){
            var nombre = $(this).find("td:eq(2)").text();   
		    $("#coment_asig").val(nombre);
		    $("#piezae").val(nombre);
        });

        if(pieza_rec === ''){
            $("#proyectoe").val(project);
            //$("#piezae").val(project);
            $("#dia_event").val(id_td);
        }else{
            $("#proyectoe").val(project);
            //var piezas = '<?php echo utf8_encode($Nombre_Pieza);?>';
            //$("#piezae").val(project);
            $("#dia_event").val(id_td);
        }
    };
</script>

<script type="text/javascript">
//funcion para enviar valores al modal de editar evento 
    function editarEpieza(datos) {
        //var id_td = $(cel).attr("id");
        var project = '<?php echo utf8_encode($Nombre_Proyecto);?>';
        var pieza_rec = '<?php echo utf8_encode($subject2);?>';

        var idevento = "<?php echo utf8_encode($id_evento);?>";
        var comentario = "<?php echo utf8_encode($comentario_event);?>";
        var color = "<?php echo utf8_encode($color_event);?>";
        
        $("#tabla tbody tr").on("click", function(event){
            var nombre = $(this).find("td:eq(2)").text();   
		    $("#coment_asig_up").val(nombre);
            $("#piezae_up").val(nombre);
        });
        

        d=datos.split('||');

        if(pieza_rec === ''){
            $('#ideventop').val(d[0]);
            //$("#idevento").val(idevento);
            $("#color_event_up").val(d[2]);
            $("#comentario_up").val(d[3]);
            $("#proyectoe_up").val(project);
            $("#dia_event_up").val(d[1]);
        }else{
            $('#ideventop').val(d[0]);
            //$("#idevento").val(idevento);
            $("#color_event_up").val(d[2]);
            $("#comentario_up").val(d[3]);
            $("#proyectoe_up").val(project);
            //var pieza_rec = '<?php echo utf8_encode($Nombre_Pieza);?>';
            //$("#piezae_up").val(pieza_rec);
            $("#dia_event_up").val(d[1]);
        }
    };
</script>

<script>
    $( document ).ready(function() {

        $("#guardareventopieza").click(function(){
            var color_fondo_tabla = $("#color_event").val();

            //alert(color_fondo_tabla);
            dia_event = $('#dia_event').val();
            //
            //$("td").css("background-color", color_fondo_tabla);
            document.getElementById(dia_event).style.backgroundColor = color_fondo_tabla;

            comentario = $('#comentario').val();
            color_event = $('#color_event').val();
            dia_event = $('#dia_event').val();
            coment_asig = $('#coment_asig').val();
            proyectoe = $('#proyectoe').val();
            piezae = $('#piezae').val();
            //alert(coment_asig);
            agregarevento(comentario, color_event, dia_event, coment_asig, proyectoe, piezae);
        
        });

        $("#actualizaDatosEventoPieza").click(function () {
            //alert("click");
            actualizaDatosEventoPieza();
        });
    });

</script>
<!-- Modal para editar eventos -->
<div class="modal fade" id="modaleditareventopieza" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Editar evento </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>Comentario</label>
                <input type="text" name="" id="comentario_up" class="form-control input-sm" required>
                <label>Color</label>
                <input type="color" id="color_event_up" class="form-control input-sm" required>
                <label>Fecha: </label>
                <small>Mes - Día.</small>
                <input type="text" id="dia_event_up" class="form-control input-sm" required>
                <label>Motivo</label>
                <input type="text" id="motivo_up" class="form-control input-sm">
                <input type="text" id="ideventop" class="form-control input-sm" hidden>
                <input type="text" id="coment_asig_up" class="form-control input-sm" hidden>
                <input type="text" id="proyectoe_up" class="form-control input-sm" hidden>
                <input type="text" id="piezae_up" class="form-control input-sm" hidden>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="actualizaDatosEventoPieza">
                    Actualizar
                </button>
            </div>
        </div>
    </div>
</div>


<script>
    function form_actualizarPieza(datos){

        $('#areau option').remove();
        $('#persona_enc_u option').remove();

        var areas_a_select = ['Administración', 'Arte', 'Compras', 'Copy y Corrección de estilo', 'Estrategia', 'Post Producción', 'Ilustración', 'Programación'];
            var option = '';

        for (var i = 0; i < areas_a_select.length; i++){
            option += '<option value="'+ areas_a_select[i] + '">' + areas_a_select[i] + '</option>';
        }
        $('#areau').append(option);

        <?php
        //$mysqli = mysqli_connect('localhost', 'dbadmin_ezqualo', '3zqu4l0++', 'db_follower');
        $query = $mysqli->query("SELECT DISTINCT nombre, apellido FROM equipoArte");
        while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
            $artephp[] = $valores[nombre]." ".$valores[apellido];
        }

        $query = $mysqli->query("SELECT DISTINCT nombre, apellido FROM equipoProgramacion");
        while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
            $programacionphp[] = $valores[nombre]." ".$valores[apellido];
        }

        $query = $mysqli->query("SELECT DISTINCT nombre, apellido FROM equipoAdministracion");
        while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
            $administracionphp[] = $valores[nombre]." ".$valores[apellido];
        }

        $query = $mysqli->query("SELECT DISTINCT nombre, apellido FROM equipoCopyCorreccion");
        while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
            $copycorreccionphp[] = $valores[nombre]." ".$valores[apellido];
        }

        $query = $mysqli->query("SELECT DISTINCT nombre, apellido FROM equipoEstrategia");
        while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
            $estrategiaphp[] = $valores[nombre]." ".$valores[apellido];
        }

        $query = $mysqli->query("SELECT DISTINCT nombre, apellido FROM equipoIlustracion");
        while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
            $ilustracionphp[] = $valores[nombre]." ".$valores[apellido];
        }

        $query = $mysqli->query("SELECT DISTINCT nombre, apellido FROM equipoPostProduccion");
        while ($valores = mysqli_fetch_array($query)) {
            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
            $postproduccionphp[] = $valores[nombre]." ".$valores[apellido];
        }
        ?>

        var arte_php = ["<?php echo utf8_encode(implode('","', $artephp)); ?>"];
        var programacion_php = ["<?php echo utf8_encode(implode('","', $programacionphp)); ?>"];
        var administracion_php = ["<?php echo utf8_encode(implode('","', $administracionphp)); ?>"];
        var copy_correcion_php = ["<?php echo utf8_encode(implode('","', $copycorreccionphp)); ?>"];
        var estrategia_php = ["<?php echo utf8_encode(implode('","', $estrategiaphp)); ?>"];
        var ilustracion_php = ["<?php echo utf8_encode(implode('","', $ilustracionphp)); ?>"];
        var post_produccion_php = ["<?php echo utf8_encode(implode('","', $postproduccionphp)); ?>"];
        var list_personas = {
            'Arte': arte_php,
            'Programación': programacion_php,
            'Administración': administracion_php,
            'Copy y Corrección de estilo': copy_correcion_php,
            'Estrategia': estrategia_php,
            'Ilustración': ilustracion_php,
            'Post Producción': post_produccion_php,
            'Compras': ['Omar Coria']
        }

        var $list_personas = $('#persona_enc_u');
        $('#areau').change(function () {
            var allareas = $(this).val(), persona = list_personas[allareas] || [];
            var html = $.map(persona, function (t) {
                return '<option value="' + t + '">' + t + '</option>'
            }).join('');
            $list_personas.html(html)
        });

    
    d=datos.split('||');

    lista_vacia = [d[6]];
    var ddlItems = document.getElementById("persona_enc_u"),itemArray = lista_vacia;
    for (var i = 0; i < itemArray.length; i++) {
        var opt = itemArray[i];
        var el = document.createElement("option");
        el.textContent = opt;
        el.value = opt;
        ddlItems.appendChild(el);
    }
    var fechaInicialRango = d[5].slice(0, -9);
    //alert(fechaInicialRango);
        $('#idu').val(d[0]);
        $('#nameu').val(d[2]);
        $('#caracteristicasu').val(d[3]);
        $('#medidasu').val(d[4]);
        $('#fechaIniciou').val(fechaInicialRango);
        $('#fechaSalidau').val(d[6]);
        $('#fechaAnt_PiezaOdt').val(d[6]);

    }
</script>

<!-- Codigo de diseño de modal para piezas -->
<div class="modal fade" id="modalPiezaEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Editar piezas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="idu" name="idu" hidden>
                            <input type="text" class="form-control" id="nameu" name="nameu" required>
                        </div>
                        <div class="form-group">
                            <label for="caracteristicas" class="col-form-label">Caracteristicas:</label>
                            <input type="text" class="form-control" id="caracteristicasu" name="caracteristicasu" required>
                        </div>
                        <div class="form-group">
                            <label for="medidas" class="col-form-label">Medidas:</label>
                            <input type="text" class="form-control" id="medidasu" name="medidasu" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="fechaInicio" class="col-form-label">Fecha Inicio:</label>
                            <input type="date" class="form-control" id="fechaIniciou" name="fechaIniciou" required>
                        </div>
                        <div class="form-group">
                            <label for="fechaSalida" class="col-form-label">Fecha Salida:</label>
                            <input type="date" class="form-control"  id="fechaSalidau" name="fechaSalidau" required>
                        </div>
                        <input type="text" class="form-control"  id="nom_proyectou" name="nom_proyectou" class="nom_proyecto" value="<?php echo $subject; ?>" hidden>
                        <input type="text" class="form-control"  id="tabla_tiemposu" name="tabla_tiemposu" class="tabla_tiempos" value=1 hidden>
                        <input type="text" class="form-control"  id="fechaAnt_PiezaOdt" name="fechaAnt_PiezaOdt" class="fechaAnt_PiezaOdt" hidden>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-warning" id="actualizadatosPieza" > Actualizar
                </button>
                
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#actualizadatosPieza').click(function () {
            //alert("Actualizado con etsito");
            //var Hola="Hola mundo";
            f1 = document.getElementById('fechaIniciou').value;
            f2 = document.getElementById('fechaSalidau').value;
            if( f1>=f2) {
            alertify.error("Fecha Incorrectas");
            $('#fechaSalida').focus();
            return 0;
            }
            actualizadatosPieza(); 
        });
    });
</script>

<script type="text/javascript">
    
    function GuardarColorCometPieza(cel) {
        var id_td = $(cel).attr("id");
        var cod = document.getElementById(id_td).value;
        var tabla = "odt_pieza";

        $("#tabla tbody tr").on("click", function(event){
            var nombre = $(this).find("td:eq(2)").text();   
            //alert(cod);
		    actualizarSemaforoComet(cod, nombre, tabla);
        });
        
    };   
</script>

<script>
    var fechaI = <?php echo json_encode($fecha_inicial2);?>;
    var fechaF = <?php echo json_encode($fecha_final);?>;
    var fechaInicialRango = fechaI.slice(0, 10);
    var fechaFinalRango = fechaF.slice(0, 10);
    //alert(fechaFinalRango);
    $('#fechaIniciou').attr('min', fechaInicialRango);
    $('#fechaIniciou').attr('max', fechaFinalRango);
    $('#fechaSalidau').attr('min', fechaInicialRango);
    $('#fechaSalidau').attr('max', fechaFinalRango);
</script>


