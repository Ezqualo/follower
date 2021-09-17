<?php 
session_start();
if ($_SESSION["s_usuario"] === null) {
    header("Location: ../index.php");
}
$userlogin = $_SESSION["s_usuario"];
$useridRol = $_SESSION["s_idRol"];

////////////////////////////actualizacion

if($tabla == "odt"){
    //echo "tabla odt en c ";
    $subject = $_GET['nom_proy'];
    $subject2 = $_GET['nom_pieza'];
    $id = $_GET['id'];
    $Nombre_Proyecto = $id . '-' . $subject . '-ODT';
    $Nombre_Pieza = $id . '-' . $subject2 . '-ODT';
    //echo " " . $Nombre_Proyecto;
} else{
    //echo "tabla brief";
    $subject = $_GET['nom_proy'];
    $subject2 = $_GET['nom_pieza'];
    $id = $_GET['id'];
    $Nombre_Proyecto = $id . '-' . $subject . '-BRIEF';
    $Nombre_Pieza = $id . '-' . $subject2 . '-BRIEF';
    //echo " " . $Nombre_Pieza;
}
////////////////////////////actualizacion


//echo "INICIA CODIGO DE DOS MESES :::::: " . $subject;
if(empty($subject2) == false){
    //echo "Busco proyecto y pieza";
    if(isset($_SESSION['consulta'])){
        if($_SESSION['consulta'] > 0){
            $idp=$_SESSION['consulta'];
            $sql="SELECT * FROM comentarios where id='$idp' AND proyecto = '$Nombre_Proyecto' AND pieza = '$Nombre_Pieza'";
        }else{
            $sql="SELECT * FROM comentarios WHERE proyecto = '$Nombre_Proyecto' AND pieza = '$Nombre_Pieza'";
        }
    }else{
        $sql="SELECT * FROM comentarios WHERE proyecto = '$Nombre_Proyecto' AND pieza = '$Nombre_Pieza'";
    }
}else{
    if(isset($_SESSION['consulta'])){
        if($_SESSION['consulta'] > 0){
            $idp=$_SESSION['consulta'];
            $sql="SELECT * FROM comentarios where id='$idp' AND proyecto = '$Nombre_Proyecto' AND pieza = '$Nombre_Proyecto'";
        }else{
            $sql="SELECT * FROM comentarios WHERE proyecto = '$Nombre_Proyecto' AND pieza = '$Nombre_Proyecto'";
        }
    }else{
        $sql="SELECT * FROM comentarios WHERE proyecto = '$Nombre_Proyecto' AND pieza = '$Nombre_Proyecto'";
    }
}

$idSemcoment = 1;
$result=mysqli_query($mysqli,$sql);
while($ver=mysqli_fetch_row($result)){

    $datos=$ver[0]."||".
        $ver[1]."||".
        $ver[2]."||".
        $ver[3]."||".
        $ver[4]."||".
        $ver[5]."||".
        $ver[6];

    
    $semaforocomentario = $ver[9];
    ?>

    <tr class="tt-wrapper">
        <?php

        //echo "FECHA $ver[2] ";
        $lista_dias = array(0 => "Sunday", 1 => "Monday", 2 => "Tuesday", 3 => "Wednesday", 4 => "Thursday", 5 => "Friday", 6 => "Saturday");
        //$lista_dias = array(0 => "Sun", 1 => "Mon", 2 => "Tue", 3 => "Wed", 4 => "Thu", 5 => "Fri", 6 => "Sat");
        $clave_dia = array_search($dia_semana, $lista_dias);
        $n = $clave_dia;
        $fecha_ini_coment = $ver[2];
        $fecha_fin_coment = $ver[3];
        
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
        
        //echo(utf8_encode($datos));
        

        if ($useridRol == 1 || $useridRol == 2){
        ?>

        <td>
            <button id="modificar_datos" class="btn" data-toggle="modal" data-target="#modalEdicion" onclick="form_actualizar('<?php echo utf8_encode($datos) ?>')">
            
                <img src="../img/edit.png" alt="" style="max-width: 20px; color:white;">
            </button>
            
        </td>
        <td>
            <button class="btn" onclick="preguntarSiNo('<?php echo $ver[0] ?>')">
                <img src="../img/delete.png" alt="" style="max-width: 20px; color:white;">
            </button>
        </td>

        <?php
        } else{
        ?> 
        <td>
            <button id="modificar_datos" class="btn" data-toggle="modal" data-target="#modalEdicion" onclick="form_actualizar('<?php echo utf8_encode($datos) ?>')" disabled="true">
                <img src="../img/edit.png" alt="" style="max-width: 20px; color:white;">
            </button>
        </td>
        <td>
            <button class="btn" onclick="preguntarSiNo('<?php echo $ver[0] ?>')" disabled="true">
                <img src="../img/delete.png" alt="" style="max-width: 20px; color:white;">
            </button>
        </td>

        <?php
        }
        
        echo utf8_encode('<td class="">'.$ver[1].'</p><small>'.$ver[5].'</small></td>');
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
                    
                    //echo " el valor de fecha dia es " . $fecha_dia; 
                    $str = $fecha_dia;
                    $str_corregido = strlen($str);
                   // echo " hola " . strlen($str);

                    if($str_corregido == 3){
                        $fecha_dia_buena = substr($str,1);
                        //echo " mundo " . $fecha_dia_buena; 
                        $inicia_evento = $fecha_mes . "-" . $fecha_dia_buena; //VARIABLE CON VALOR DE INICIO DE EVENTO
                    } else{
                        $inicia_evento = $fecha_mes . "-" . $fecha_dia; //VARIABLE CON VALOR DE INICIO DE EVENTO
                    }
                    
                    //echo "Inicia evento: " . $inicia_evento;
                    if ($fecha_inicial_p == $inicia_evento){//CONDICION PARA CUANDO EL EVENTO ES IGUAL A LA FECHA INICIAL 
                        //echo "--FECHA CAL INI " . $dias_contados2 . "--/";
                        //if($fecha_cal_ini < $days_C){
                            //echo "valor de mes es: " . $mes_C;
                            while($contador_2meses <= $dias_contados2){
                                if(empty($subject2) == false){//CONDICION PARA CUANDO HAY UNA PIEZA
                                    //CICLO PARA COLOREAR LAS TAREAS QUE ESTAN EN UNA PIEZA DE 2 O MAS MESES Y LA TAREA SE ENCUENTRA DENTRO DE UN SOLO MES 
                                    $sql_comentarios2 = $mysqli -> query("SELECT id,dia,color,comentario,motivo FROM eventos WHERE comentarioAsignado = '$ver[1]' AND proyecto = '$Nombre_Proyecto' AND pieza = '$Nombre_Pieza'");
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
                                            <td class="tt-gplus" id="<?php echo $avanzar_mes."-".$cont ?>" style="background-color: <?php echo $color ?>" class="Evento" data-toggle="modal" data-target="#modaleditarevento" onclick="editarE('<?php echo utf8_encode($datos) ?>')"> <span class=""><?php echo utf8_encode($tooltip) ?></span></td>
                                            <?php
                                            } else{
                                            ?>
                                            <td class="tt-gplus" id="<?php echo $avanzar_mes."-".$cont ?>" style="background-color: <?php echo $color ?>" class="Evento" data-toggle="modal" data-target="#modaleditarevento" onclick="editarE('<?php echo utf8_encode($datos) ?>')"> <span class=""><?php echo utf8_encode($tooltip) ?></span></td>
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
                                                $fecha_Ant = $ver[10];
                                                $fechaAnteriorOdt = substr($fecha_Ant, 5, 5);
                                                $fecha_final_comentario = $ver[3];
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
                                                    echo '<td class="tt-gplus" id="'.$avanzar_mes."-".$cont.'" name="fech_ini" class="Evento" data-toggle="modal" data-target="#modalevento" onclick=borrar(this)></td>';
                                                } 
                                                //echo '<td class="tt-gplus" id="'.$avanzar_mes."-".$cont.'" name="fech_ini" class="Evento" data-toggle="modal" data-target="#modalevento" onclick=borrar(this)></td>';
                                            } else{
                                                echo '<td class="tt-gplus" id="'.$avanzar_mes."-".$cont.'" name="fech_ini" class="Evento" data-toggle="modal" data-target="" onclick=borrar(this)></td>';
                                            }
                                        }

                                        $n = $n + 1;
                                        if ($n == 7) {
                                            $n = 0;
                                        }

                                        $cont = $cont + 1;
                                        if($contador_2meses == $dias_contados2){
                                            //echo "Entre a la condicion de el ultimo dia";
                                            echo '<td class="tt-gplus" id="'.$avanzar_mes."-".$cont.'" name="fech_fin"> <span class="">' . utf8_encode($ver[4]) . '</span></td>';

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

                                }else{ // cuando es
                                    
                                    $sql_comentarios2 = $mysqli -> query("SELECT id,dia,color,comentario,motivo FROM eventos WHERE comentarioAsignado = '$ver[1]' AND proyecto = '$Nombre_Proyecto'");
                                    $num_projects = mysqli_num_rows($sql_comentarios2);
                                    //echo $num_projects;
                                    
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
                                            <td class="tt-gplus" id="<?php echo $avanzar_mes."-".$cont ?>" style="background-color: <?php echo $color ?>" class="Evento" data-toggle="modal" data-target="#modaleditarevento" onclick="editarE('<?php echo utf8_encode($datos) ?>')"> <span class=""><?php echo utf8_encode($tooltip) ?></span></td>
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
                                                $fecha_Ant = $ver[10];
                                                $fechaAnteriorOdt = substr($fecha_Ant, 5, 5);
                                                $fecha_final_comentario = $ver[3];
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
                                                    echo '<td class="tt-gplus" id="'.$avanzar_mes."-".$cont.'" name="fech_ini" class="Evento" data-toggle="modal" data-target="#modalevento" onclick=borrar(this)></td>';
                                                } 

                                                //echo '<td class="tt-gplus" id="'.$avanzar_mes."-".$cont.'" name="fech_ini" class="Evento" data-toggle="modal" data-target="#modalevento" onclick=borrar(this)></td>';
                                            } else{
                                                $fecha_Ant = $ver[10];
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
                                                echo '<td class="tt-gplus" id="'.$aux_mes."-".$aux_cont.'" name="fech_fin"> <span class="">' . utf8_encode($ver[4]) . '</span></td>';
                                                $aux_cont = 2;
                                            } else{
                                                echo '<td class="tt-gplus" id="'.$avanzar_mes."-".$cont.'" name="fech_fin"> <span class="">' . utf8_encode($ver[4]) . '</span></td>';
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
        	$co=$ver[0];
		//codigo para semaforo por medio de radio buttons
		echo '<td> 
			
			<div class="radio-item">';
			    if( $semaforocomentario=="#FFC500" ){

			        echo '<input onclick="act_comentario('.$co.',value)" type="radio" id="Inicio'.$idSemcoment.'" name="drone'.$idSemcoment.'" checked value="#FFC500">';
			    }else{
			        echo '<input onclick="act_comentario('.$co.',value)" type="radio" id="Inicio'.$idSemcoment.'" name="drone'.$idSemcoment.'" value="#FFC500">';
			    }
			    echo '<label id="iniciolabel" for="Inicio'.$idSemcoment.'"></label>
			</div>
			<div class="radio-item">';
			    if($semaforocomentario=="#1CB707"){
			        echo '<input onclick="act_comentario('.$co.',value)" type="radio" id="Enviado'.$idSemcoment.'" name="drone'.$idSemcoment.'" checked value="#1CB707">';
			    }else{
			        echo '<input onclick="act_comentario('.$co.',value)" type="radio" id="Enviado'.$idSemcoment.'" name="drone'.$idSemcoment.'" value="#1CB707">';
			    }

			    echo '<label id="enviadolabel" for="Enviado'.$idSemcoment.'"></label>
			</div>
			<div class="radio-item">';
			if($semaforocomentario=="#FF0C00"){
			    echo '<input onclick="act_comentario('.$co.',value)" type="radio" id="Pausado'.$idSemcoment.'" name="drone'.$idSemcoment.'" checked value="#FF0C00">';
			}else{
			    echo '<input onclick="act_comentario('.$co.',value)" type="radio" id="Pausado'.$idSemcoment.'" name="drone'.$idSemcoment.'" value="#FF0C00">';
			}
			
			echo '<label id="pausadolabel" for="Pausado'.$idSemcoment.'"></label>
			</div>
			<div class="radio-item">';
			    if($semaforocomentario=="#6900D1"){
			        echo '<input onclick="act_comentario('.$co.',value)" type="radio" id="Cerrado'.$idSemcoment.'" name="drone'.$idSemcoment.'" checked value="#6900D1">';
			    }else{
			        echo '<input onclick="act_comentario('.$co.',value)" type="radio" id="Cerrado'.$idSemcoment.'" name="drone'.$idSemcoment.'" value="#6900D1">';
			    }
			    
			    echo '<label id="cerradolabel" for="Cerrado'.$idSemcoment.'"></label>
			</div>
			

		    </td>';	
        }
        else{
        	echo '<td> 
			
			<div class="radio-item">';
			    if( $semaforocomentario=="#FFC500" ){

			        echo '<input  type="radio" id="Inicio'.$idSemcoment.'" name="drone'.$idSemcoment.'" checked value="#FFC500" disabled>';
			    }else{
			        echo '<input  type="radio" id="Inicio'.$idSemcoment.'" name="drone'.$idSemcoment.'" value="#FFC500" disabled>';
			    }
			    echo '<label id="iniciolabel" for="Inicio'.$idSemcoment.'"></label>
			</div>
			<div class="radio-item">';
			    if($semaforocomentario=="#1CB707"){
			        echo '<input  type="radio" id="Enviado'.$idSemcoment.'" name="drone'.$idSemcoment.'" checked value="#1CB707" disabled>';
			    }else{
			        echo '<input  type="radio" id="Enviado'.$idSemcoment.'" name="drone'.$idSemcoment.'" value="#1CB707" disabled>';
			    }

			    echo '<label id="enviadolabel" for="Enviado'.$idSemcoment.'"></label>
			</div>
			<div class="radio-item">';
			if($semaforocomentario=="#FF0C00"){
			    echo '<input  type="radio" id="Pausado'.$idSemcoment.'" name="drone'.$idSemcoment.'" checked value="#FF0C00" disabled>';
			}else{
			    echo '<input  type="radio" id="Pausado'.$idSemcoment.'" name="drone'.$idSemcoment.'" value="#FF0C00" disabled>';
			}
			
			echo '<label id="pausadolabel" for="Pausado'.$idSemcoment.'"></label>
			</div>
			<div class="radio-item">';
			    if($semaforocomentario=="#6900D1"){
			        echo '<input  type="radio" id="Cerrado'.$idSemcoment.'" name="drone'.$idSemcoment.'" checked value="#6900D1" disabled>';
			    }else{
			        echo '<input  type="radio" id="Cerrado'.$idSemcoment.'" name="drone'.$idSemcoment.'" value="#6900D1" disabled>';
			    }
			    
			    echo '<label id="cerradolabel" for="Cerrado'.$idSemcoment.'"></label>
			</div>
			

		    </td>';	
        }
        
        

        ?>

    </tr>
    <?php
    $idSemcoment++;
    
}// TERMINA WHILE PRINCIPAL 

?>
